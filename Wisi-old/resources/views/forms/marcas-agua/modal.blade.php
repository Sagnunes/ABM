@foreach($results as $value)
    <form action="" method="post">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <div class="modal fade " id="modal-view-{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header" >
                        <h5 class="modal-title" id="exampleModalLongTitle">
                            Tema : {{$value->tema}}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table style="width:100%" class="table table-hover">
                            <tr>
                                <th>Tema:</th>
                                <td>{{$value->tema}}</td>
                            </tr>
                            <tr>
                                <th>Sub Tema:</th>
                                <td>{{$value->subTema}}</td>
                            </tr>
                            <tr>
                                <th>Cota:</th>
                                <td>{{$value->cota}}</td>
                            </tr>
                            <tr>
                                <th>Fundo:</th>
                                <td>{{$value->fundo}}</td>
                            </tr>
                            <tr>
                                <th>Data:</th>
                                <td>{{$value->data}}</td>
                            </tr>
                            <tr>
                                <th>Fólio:</th>
                                <td>{{$value->folio}}</td>
                            </tr>
                            <tr>
                                <th>Descrição:</th>
                                <td>{{$value->descricao}}</td>
                            </tr>
                            <tr>
                                <th>Imagem:</th>
                                <td><img src="{{asset($value->imagem)}}" alt=""></td>
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