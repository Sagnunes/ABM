@component('mail::message')
# Pedido ao depósito.
@component('mail::table')
    | Data | Fundo | Cota
    | ------------- |:-------------:|
        | {{$dados->created_at->toDateString()}}|{{$dados->fundo->nome}} | {{$dados->cotaI}} - {{$dados->cotaF}} |
@endcomponent
<br>
<p>Data de devolução prevista : {{$dados->dataDevolucao}}</p>
<p>A gestão de depósitos informa que a documentação requisitada estará disponível e poderá ser levantada até as 11h30h.</p>
<br>Obrigado,<br>
{{ config('app.name') }}
@endcomponent
