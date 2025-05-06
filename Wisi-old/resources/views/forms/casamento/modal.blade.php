@foreach($results as $value)
    <form action="" method="post">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <div class="modal fade " id="modal-view-{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header" >
                        <h5 class="modal-title" id="exampleModalLongTitle">
                            Detalhes do registo
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table style="width:100%" class="table table-hover">
                            <tr>
                                <th>Conservatória:</th>
                                <td>{{$value->paroquia}}</td>
                            </tr>

                            <tr>
                                <th>Livro:</th>
                                <td>{{$value->livro}}</td>
                            </tr>
                            <tr>
                                <th>Folha:</th>
                                <td>{{$value->folha}}</td>
                            </tr>
                            <tr>
                                <th> N.º de registo:</th>
                                <td>{{$value->nRegisto}}</td>
                            </tr>
                            <tr>
                                <th>Data :</th>
                                <td>{{$value->data}}</td>
                            </tr>
                            <tr>
                                <th> Nome do marido:</th>
                                <td>{{$value->marido}}</td>
                            </tr>
                            <tr>
                                <th>Nome do pai do marido :</th>
                                <td>{{$value->paiMarido}}</td>
                            </tr>
                            <tr>
                                <th>Nome da mãe do marido :</th>
                                <td>{{$value->maeMarido}}</td>
                            </tr>
                            <tr>
                                <th>Nome da mulher :</th>
                                <td>{{$value->mulher}}</td>
                            </tr>
                            <tr>
                                <th>Nome do pai da mulher :</th>
                                <td>{{$value->paiMulher}}</td>
                            </tr>
                            <tr>
                                <th>Nome da mãe do mulher :</th>
                                <td>{{$value->maeMulher}}</td>
                            </tr>
                            <tr>
                                <th>Observação :</th>
                                @if(empty($value->observacao))
                                    <td class="text-info">Sem informação</td>
                                @else
                                    <td>{{$value->observacao}}</td>
                                @endif
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        {{--<a href="{{route('casamento.pdf',['id'=>$value->id])}}" class="btn btn-outline-primary">Imprimir</a>--}}
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endforeach