@foreach($results as $value)
    <form action="" method="post">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <div class="modal fade " id="modal-view-{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header" >
                        <h5 class="modal-title" id="exampleModalLongTitle">
                          Registo..
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table style="width:100%" class="table table-hover">
                            <tr>
                                <th>NºCaixa</th>
                                <td>{{$value->caixa}}</td>
                            </tr>
                            <tr>
                                <th>Nº Capilha</th>
                                <td>{{$value->capilha}}</td>
                            </tr>
                            <tr>
                                <th>Nº Processo</th>
                                <td>{{$value->processo}}</td>
                            </tr>
                            <tr>
                                <th>Entidade</th>
                                <td>{{$value->entidade}}</td>
                            </tr>
                            <tr>
                                <th>Tipo processo</th>
                                <td>{{$value->tipoProcesso}}</td>
                            </tr>
                            <tr>
                                <th>Nome</th>
                                <td>{{$value->nome}}</td>
                            </tr>
                            <tr>
                                <th>Estado civil</th>
                                <td>{{$value->estadoCivil}}</td>
                            </tr>
                            <tr>
                                <th>Morada</th>
                                <td>{{$value->morada}}</td>
                            </tr>
                            <tr>
                                <th>Freguesia</th>
                                <td>{{$value->freguesia_id}}</td>
                            </tr>
                            <tr>
                                <th>Data óbito</th>
                                <td>{{$value->dataObito}}</td>
                            </tr>
                            <tr>
                                <th>Data inicial</th>
                                <td>{{$value->dataInicial}}</td>
                            </tr>
                            <tr>
                                <th>Data final</th>
                                <td>{{$value->dataFinal}}</td>
                            </tr>
                            <tr>
                                <th>Observação :</th>
                                @if(empty($value->observacao))
                                    <td class="text-info">Sem informação</td>
                                @else
                                    <td>{{$value->observacoes}}</td>
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