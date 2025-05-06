<div class="modal fade" id="modal-documentos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Nova requisição de reprodução de documentos
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">
												&times;
											</span>
                </button>
            </div>
            <form action="{{route('requisicoes.reproducao.documentos')}}" method="post">
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-6 form-group">
                            <input class="form-control" type="text" placeholder="Requerente" name="requerente">
                        </div>

                        <div class="col-12 col-md-6 form-group">
                            <input class="form-control" type="text" placeholder="E-mail" name="email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 form-group">
                            <input class="form-control" type="text" placeholder="Número do cartão" name="numero_cartao">
                        </div>

                        <div class="col-12 col-md-6 form-group">
                            <select name="tipo" id="" class="form-control">
                                <option value="">Escolher como deseja o documento</option>
                                <option value="1">A3</option>
                                <option value="2">A4</option>
                                <option value="3">Cores</option>
                                <option value="4">Preto / Branco</option>
                                <option value="5">Digitilizações</option>
                            </select>
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
                        <div class="col-12 col-md-3 form-group">
                            <input class="form-control" type="text" placeholder="Título / Autor" name="titulo">
                        </div>
                        <div class="col-12 col-md-3 form-group">
                            <input class="form-control" type="text" placeholder="Cota" name="cota">
                        </div>
                        <div class="col-12 col-md-2 form-group">
                            <input class="form-control" type="text" placeholder="Quantidade" name="quantidade">
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