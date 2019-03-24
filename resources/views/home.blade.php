@extends('layouts.app')

@section('content')



    <style>
        #map {
            width: 100%;
            height: 600px;
        }
    </style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <br>
            <h1>Вы приглашаете:</h1>
            <br>
            <div class="card">
                <div class="card-header">Карта</div>

                <div class="card-body">
                    @if(Auth::user()->outcomingInvite)
                        <?php
                            $place = \json_decode(Auth::user()->outcomingInvite->place_json)
                        ?>
                        <div class="card" style="width: 18rem;">
                            {{--<img src="{{ Auth::user()->outcomingInvite->invited->img_src }}" class="card-img-top" alt="...">--}}
                            <div class="card-body">
                                <h5 class="card-title">{{ Auth::user()->outcomingInvite->invited->name }}</h5>
                                <p class="card-text">Место: {{ $place->title }}</p>
                                <a
                                    href="{{ route('deleteInvite', ['invite' => Auth::user()->outcomingInvite->id]) }}"
                                    class="btn btn-danger">Отменить приглашение</a>
                            </div>
                        </div>
                    @else
                        Вы ещё никого не пригласили
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
