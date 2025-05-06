@component('mail::message')
# Pedido de aprovisionamento

Em baixo está a descrição do seu pedido :

@component('mail::table')
    | Produto       | Quantidade
    | ------------- |:-------------:|
    @for($i = 0, $iMax = \count($dados); $i < $iMax; $i++)
        | {{$dados[$i]->nome}} | {{$dados[$i]->quantidade}} |
    @endfor
@endcomponent
<br>
<strong>O material já se encontra disponível para levantamento na secretaria.</strong>
<br>
<br>Obrigado,<br>
{{ config('app.name') }}
@endcomponent
