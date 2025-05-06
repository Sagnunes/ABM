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
                                <th>Fundo :</th>
                                <td>{{$value->fundo}}</td>
                            </tr>
                            <tr>
                                <th>Cota :</th>
                                <td>{{$value->cota}}</td>
                            </tr>
                            <tr>
                                <th>Código Referência :</th>
                                <td>{{$value->codRef}}</td>
                            </tr>
                            <tr>
                                <th>Dim e Suporte :</th>
                                <td>{{$value->dimSuporte}}</td>
                            </tr>
                            <tr>
                                <th>Nível descrição :</th>
                                <td>{{$value->nivelDescricao}}</td>
                            </tr>
                            <tr>
                                <th> Área :</th>
                                <td>{{$value->area}}</td>
                            </tr>
                            <tr>
                                <th>Série e Subsérie :</th>
                                <td>{{$value->serieSubserie}}</td>
                            </tr>
                            <tr>
                                <th>Título Original :</th>
                                <td>{{$value->tituloOriginal}}</td>
                            </tr>
                            <tr>
                                <th>Título :</th>
                                <td>{{$value->titulo}}</td>
                            </tr>
                            <tr>
                                <th>Estado de conservação :</th>
                                <td>{{$value->estadoConservacao}}</td>
                            </tr>
                            <tr>
                                <th>Âmbito e contêudo :</th>
                                <td>{{$value->ambitoConteudo}}</td>
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