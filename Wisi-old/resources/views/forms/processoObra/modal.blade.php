@foreach($results as $value)
    <form action="" method="post">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <div class="modal fade " id="modal-view-{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header" >
                        <h5 class="modal-title" id="exampleModalLongTitle">
                            Entidade : {{$value->entidade}}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table style="width:100%" class="table table-hover">
                            <tr>
                                <th>Cota:</th>
                                <td>{{$value->cota}}</td>
                            </tr>
                            <tr>
                                <th>Número do documento:</th>
                                <td>{{$value->documento}}</td>
                            </tr>
                            <tr>
                                <th>Número do volume:</th>
                                <td>{{$value->volume}}</td>
                            </tr>
                            <tr>
                                <th>Número do projeto:</th>
                                <td>{{$value->projeto}}</td>
                            </tr>
                            <tr>
                                <th>Entidade:</th>
                                <td>{{$value->entidade}}</td>
                            </tr>
                            <tr>
                                <th>Data:</th>
                                <td>{{$value->data}}</td>
                            </tr>
                            <tr>
                                <th>Tipo de Obra:</th>
                                <td>{{$value->tipo_obra}}</td>
                            </tr>
                            <tr>
                                <th>Objeto:</th>
                                <td>{{$value->objeto}}</td>
                            </tr>
                            <tr>
                                <th>Concelho:</th>
                                <td>{{$value->municipio_id}}</td>
                            </tr>
                            <tr>
                                <th>Freguesia:</th>
                                <td>{{$value->freguesia}}</td>
                            </tr>
                            <tr>
                                <th>Sítio:</th>
                                <td>{{$value->sitio}}</td>
                            </tr>
                            <tr>
                                <th>Localização:</th>
                                <td>{{$value->localizacao}}</td>
                            </tr>
                            <tr>
                                <th>Observação:</th>
                                @if(empty($value->observacao))
                                    <td class="text-info">Sem informação</td>
                                @else
                                    <td>{{$value->observacao}}</td>
                                @endif
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endforeach