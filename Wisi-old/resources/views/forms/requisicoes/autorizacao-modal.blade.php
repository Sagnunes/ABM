<div class="modal fade" id="modal-autorizacao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Nova requisição de autorização temporária de leitura
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">
												&times;
											</span>
                </button>
            </div>
            <form action="{{route('requisicoes.autorizacao')}}" method="post">
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-6 form-group">
                            <input class="form-control" type="text" placeholder="Requerente" name="requerente">
                        </div>

                        <div class="col-12 col-md-6 form-group">
                            <input class="form-control" type="text" placeholder="Telefone" name="telefone">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-12 form-group">
                            <input class="form-control" type="text" placeholder="Morada" name="morada">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 form-group">
                            <input class="form-control" type="text" placeholder="Email" name="email">
                        </div>

                        <div class="col-12 col-md-6 form-group">
                            <input class="form-control" type="text" placeholder="N.º cartão de identificação" name="numero_cartao_identificacao">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 form-group">
                            <select name="tipo_cartao_identificacao" id="" class="form-control">
                                <option value="">Escolher a opção</option>
                                <option value="1">Cartão de cidadão</option>
                                <option value="2">Carta de condução</option>
                                <option value="3">Passaporte</option>
                                <option value="4">Outro</option>
                            </select>
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