<div class="modal fade" id="modal-leitura" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Nova requisição de leitura
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">
												&times;
											</span>
                </button>
            </div>
            <form action="{{route('requisicoes.leitura')}}" method="post">
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-6 form-group">
                            <input class="form-control" type="text" placeholder="Requerente" name="requerente">
                        </div>

                        <div class="col-12 col-md-6 form-group">
                            <input class="form-control" type="text" placeholder="Número do cartão" name="numero_cartao">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-4 form-group">
                            <select name="fundo" class="form-control">
                                <option value="">Escolher uma opção</option>
                                @foreach($registos as $item)
                                    <option value="{{$item->id}}">{{$item->nome}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 col-md-5 form-group">
                            <input class="form-control" type="text" placeholder="Título / Autor" name="titulo">
                        </div>

                        <div class="col-12 col-md-3 form-group">
                            <input class="form-control" type="text" placeholder="Cota" name="cota">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Fechar
                    </button>
                    <button type="submit" class="btn btn-success">
                        Guardar
                    </button>
                </div>
            </form>
        </div>

    </div>

</div>
</form>