@component('mail::message')
    # Pedido ao deposito foi executado com sucesso.
@component('mail::table')
        | Fundo | Cota
        | ------------- |:-------------:|
        | {{$dados->fundo->nome}} | {{$dados->cotaI}} - {{$dados->cotaF}} |
@endcomponent
Obrigado,<br>
    <br>{{ config('app.name') }}
@endcomponent
