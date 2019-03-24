@extends('layouts.app')

@section('content')
    <div class="container">
        <br>
        <h1>Вас приглашают:</h1>
        <div class="list-group">

            @if(!count($invites))
                <p>Вас пока ещё никто не пригласил</p>
            @endif

            @foreach($invites as $invite)
                <a href="{{ route('invite', ['invite' => $invite->id]) }}" class="list-group-item list-group-item-action"><span class="badge badge-secondary">New</span> {{ $invite->inviter->name }}</a>
            @endforeach
        </div>
    </div>
@endsection
