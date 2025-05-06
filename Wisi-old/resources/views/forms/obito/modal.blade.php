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
                                <th>Paroquia:</th>
                                <td>{{$value->localparoquial->nome}}</td>
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
                                <th>N.º Registo:</th>
                                <td>{{$value->nRegisto}}</td>
                            </tr>
                            <tr>
                                <th>N.º Processo:</th>
                                <td>{{$value->numero_processo}}</td>
                            </tr>
                            <tr>
                                <th>Data:</th>
                                <td>{{$value->data}}</td>
                            </tr>
                            <tr>
                                <th>Nome:</th>
                                <td>{{$value->nome}}</td>
                            </tr>
                            <tr>
                                <th>Pai do falecido(a):</th>
                                <td>{{$value->pai}}</td>
                            </tr>
                            <tr>
                                <th>Mãe do falecido(a):</th>
                                <td>{{$value->mae}}</td>
                            </tr>
                            <tr>
                                <th>Estado civil:</th>
                                @if($value->estadoCivil == 1)
                                    <td>Solteiro(a)</td>
                                @elseif($value->estadoCivil ==2)
                                    <td >Casado(a)</td>
                                @elseif($value->estadoCivil ==3)
                                    <td >Divorciado(a)</td>
                                @elseif($value->estadoCivil ==4)
                                    <td >Viúvo(a)</td>
                                @elseif($value->estadoCivil ==5)
                                    <td >Separado(a) </td>
                                @endif
                            </tr>
                            <tr>
                                <th>Conjuge:</th>
                                <td>{{$value->conjuge}}</td>
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