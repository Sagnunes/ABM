<div class="modal fade" id="m_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Nova notícia
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">
												&times;
											</span>
                </button>
            </div>
            <form action="{{route('noticias.store')}}" method="post">
                <div class="modal-body">

                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">
                            Título:
                        </label>
                        <input type="text" class="form-control{{ $errors->has('titulo') ? ' is-invalid' : '' }}" id="recipient-name" name="titulo" value="{{old('titulo')}}">
                        @if ($errors->has('titulo'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('titulo') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="form-control-label">
                            Descrição:
                        </label>
                        <textarea class="form-control summernote {{ $errors->has('descricao') ? ' is-invalid' : '' }}" id="m_summernote_1" cols="10" rows="5" name="descricao">{{old('descricao')}}</textarea>
                        @if ($errors->has('descricao'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('descricao') }}</strong>
                                    </span>
                        @endif
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