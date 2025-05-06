@foreach($results as $value)
    <form action="" method="post">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <div class="modal fade " id="modal-view-{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header" >
                        <h5 class="modal-title" id="exampleModalLongTitle">
                            Outorgante : {{$value->outorgante}}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table style="width:100%" class="table table-hover">
                            <tr>
                                <th>Data:</th>
                                <td>{{$value->data}}</td>
                            </tr>
                            <tr>
                                <th>Cota original:</th>
                                <td>{{$value->cotaAntiga}}</td>
                            </tr>
                            <tr>
                                <th>Cartório:</th>
                                <td>{{$value->cartorio}}</td>
                            </tr>
                            <tr>
                                <th>Notário:</th>
                                <td>{{$value->notario}}</td>
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
                                <th>Tipologia:</th>
                                <td>{{$value->tipologia}}</td>
                            </tr>
                            <tr>
                                <th>1º Outorgante:</th>
                                <td>{{$value->outorgante}}</td>
                            </tr>
                            <tr>
                                <th>Outros Outorgantes:</th>
                                <td>{{$value->outros}}</td>
                            </tr>
                            <tr>
                                <th>Obj Trans:</th>
                                <td>{{$value->objTrans}}</td>
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