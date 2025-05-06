@foreach($results as $value)
    <form action="" method="post">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <div class="modal fade " id="modal-view-{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header" >
                        <h5 class="modal-title" id="exampleModalLongTitle">
                            Número do processo : {{$value->processo}}
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
                                <th>N.º Processo:</th>
                                <td>{{$value->processo}}</td>
                            </tr>
                            <tr>
                                <th>N.º Passaporte:</th>
                                <td>{{$value->passaporte}}</td>
                            </tr>
                            <tr>
                                <th>Folhas:</th>
                                <td>{{$value->folha}}</td>
                            </tr>
                            <tr>
                                <th>Carta de pessoal:</th>
                                <td>{{$value->cartaPessoal}}</td>
                            </tr>
                            <tr>
                                <th>Ano:</th>
                                <td>{{$value->ano}}</td>
                            </tr>
                            <tr>
                                <th>Mês:</th>
                                <td>{{$value->mes}}</td>
                            </tr>
                            <tr>
                                <th>Destino:</th>
                                <td>{{$value->destino}}</td>
                            </tr>
                            <tr>
                                <th>Requerente :</th>
                                <td>{{$value->requerente}}</td>
                            </tr>
                            <tr>
                                <th>BI do requerente:</th>
                                <td>{{$value->bi}}</td>
                            </tr>
                            <tr>
                                <th>Pai :</th>
                                <td>{{$value->requerentePai}}</td>
                            </tr>
                            <tr>
                                <th>Mãe :</th>
                                <td>{{$value->requerenteMae}}</td>
                            </tr>
                            <tr>
                                <th>Naturalidade:</th>
                                <td>{{$value->naturalidade}}</td>
                            </tr>
                            <tr>
                                <th>Idade :</th>
                                <td>{{$value->idade}}</td>
                            </tr>
                            <tr>
                                <th>Data nascimento:</th>
                                <td>{{$value->data}}</td>
                            </tr>

                            <tr>
                                <th>Cônjuge :</th>
                                <td>{{$value->conjuge}}</td>
                            </tr>
                            <tr>
                                <th>Pai do cônjuge :</th>
                                <td>{{$value->conjugePai}}</td>
                            </tr>
                            <tr>
                                <th>Mãe do cônjuge:</th>
                                <td>{{$value->conjugeMae}}</td>
                            </tr>
                            {{--<tr>--}}
                                {{--<th>Acompanhantes:</th>--}}
                                {{--<td>--}}

                                    {{--@foreach($value->acompanhantes as $acompanhante)--}}
                                        {{--{{$acompanhante->categoria_acompanhante->nome}} - {{$acompanhante->nome}} <br>--}}
                                    {{--@endforeach--}}

                                {{--</td>--}}
                            {{--</tr>--}}
                            <tr>
                                <th>Observações:</th>
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