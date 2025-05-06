@foreach($results as $value)
    <form action="" method="post">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <div class="modal fade " id="modal-view-{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header" >
                        <h5 class="modal-title" id="exampleModalLongTitle">
                            Número do registo : {{$value->numero}}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table style="width:100%" class="table table-hover">
                            <tr>
                                <th>N.º Caixa:</th>
                                <td>{{$value->caixa}}</td>
                            </tr>
                            <tr>
                                <th>N.º Doc:</th>
                                <td>{{$value->numero}}</td>
                            </tr>
                            <tr>
                                <th>N.º Processo :</th>
                                <td>{{$value->numeroProcesso}}</td>
                            </tr>
                            <tr>
                                <th>Data inicial:</th>
                                <td>{{$value->dataInicial}}</td>
                            </tr>
                            <tr>
                                <th>Data final:</th>
                                <td>{{$value->dataFinal}}</td>
                            </tr>
                            <tr>
                                <th>Tribunal :</th>
                                <td>{{$value->tribunal}}</td>
                            </tr>
                            <tr>
                                <th>Vara / Juizo :</th>
                                <td>{{$value->vara}}</td>
                            </tr>
                            <tr>
                                <th>Classificação:</th>
                                <td>{{$value->classificacao}}</td>
                            </tr>
                            <tr>
                                <th>Ofício:</th>
                                <td>{{$value->oficio}}</td>
                            </tr>
                            <tr>
                                <th>Tipologia:</th>
                                <td>{{$value->tipologia}}</td>
                            </tr>
                            <tr>
                                <th>Freguesia:</th>
                                <td>{{$value->freguesia}}</td>
                            </tr>
                            <tr>
                                <th> Interveniente 1:</th>
                                <td>{{$value->autor}}</td>
                            </tr>
                            <tr>
                                <th>Interveniente 2:</th>
                                <td>{{$value->reu}}</td>
                            </tr>
                            <tr>
                                <th>Ámbito e contéudo:</th>
                                <td>{{$value->assuntos}}</td>
                            </tr>
                            <tr>
                                <th>Apensos:</th>
                                <td>{{$value->anexo}}</td>
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
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endforeach