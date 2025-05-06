@component('mail::message')
# Pedido de aprosionamento em processamento

Em baixo está a descrição do seu pedido :

@component('mail::table')
    | Produto       | Quantidade
    | ------------- |:-------------:|
    @for($i = 0, $iMax = \count($dados); $i < $iMax; $i++)
        | {{$dados[$i]->nome}} | {{$dados[$i]->quantidade}} |
    @endfor
@endcomponent


Obrigado,<br>
{{ config('app.name') }}
@endcomponent
