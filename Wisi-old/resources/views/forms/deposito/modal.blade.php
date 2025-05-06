@foreach($results as $value)
    <form action="" method="post">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <div class="modal fade " id="modal-view-{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header" >
                        <h5 class="modal-title" id="exampleModalLongTitle">
                            Título do registo : {{$value->titulo}}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table style="width:100%" class="table table-hover">
                            <tr>
                                <th>Requisitante:</th>
                                <td>{{$value->user->name}}</td>
                            </tr>
                            <tr>
                                <th>Fundo:</th>
                                <td>{{$value->fundo->nome}}</td>
                            </tr>
                            <tr>
                                <th>Título:</th>
                                @if(empty($value->titulo))
                                    <td class="text-info">Sem informação</td>
                                @else
                                    <td>{{$value->titulo}}</td>
                                @endif
                            </tr>
                            <tr>
                                <th>Cota:</th>
                                <td>{{$value->cotaI.' '.$value->cotaF}}</td>
                            </tr>
                            <tr>
                                <th>Localização:</th>
                                <td>{{$value->D.'-'.$value->B.'-'.$value->E.'-'.$value->P}}</td>
                            </tr>
                            <tr>
                                <th>Total ui :</th>
                                <td>{{$value->totalUI}}</td>
                            </tr>
                            <tr>
                                <th>Data prevista para devolução</th>
                                <td>{{$value->dataDevolucao}}</td>
                            </tr>
                            <tr>
                                <th>Observação:</th>
                                @if(empty($value->observacao))
                                    <td class="text-info">Sem informação</td>
                                @else
                                    <td>{{$value->observacao}}</td>
                                @endif
                            </tr>
                            <tr>
                                <th>Gestão de depósitos:</th>
                                @if(empty($value->gestor_informacao))
                                    <td class="text-info">Sem informação</td>
                                @else
                                    <td>{{$value->gestor_informacao}}</td>
                                @endif
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                       @if($value->estado == 1)
                            <a href="{{route('deposito.changeStatusOfDeposito',['id'=>$value->id,'status'=>2])}}" class="btn btn-outline-primary">Lido</a>
                        @endif
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endforeach