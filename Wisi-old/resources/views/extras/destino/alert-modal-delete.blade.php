@foreach($results as $value)
<div class="modal fade" id="delete-view-{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title m--font-danger " id="exampleModalLabel">
                    Atenção!
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">
												&times;
											</span>
                </button>
            </div>
            <div class="modal-body m--font-bolder text-center">
                <h3>
                    Tem a certeza que deseja apagar?
                </h3> <h4>os dados serão eliminados de forma definitiva</h4>

            </div>
            <div class="modal-footer">
                {!! Form::open(array('route' => array('destino.destroy', $value->id), 'method' => 'delete')) !!}
                <button class='btn btn-danger btn-xs' type="submit">Apagar</button>
                {!! Form::close() !!}

                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Não
                </button>
            </div>
        </div>
    </div>
</div>
@endforeach