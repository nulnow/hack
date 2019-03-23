@extends('layouts.app')

@section('content')
    <style>
        .mform {
            /*width: 800px;*/
            /*height: 500px;*/
            padding: 60px;
            border-radius: 5px;

            background-color: white;

            box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
        }

        .mform h1 {
            font-size: 25px;
        }

        .faces {
            display: flex;
            flex-flow: row nowrap;
            justify-content: space-between;
            align-items: center;
        }

        .faces img {
            height: 60px;
            width: 60px;
        }
        
        .mbtn {
            color: white;

            background-color: rgba(233,30,99,1);

            box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
            transition: all 0.3s cubic-bezier(.25,.8,.25,1);
        }

        .mbtn:hover {
            color: white;
            box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
        }

        #map-me {
            width: 100%;
            height: 200px;
        }
    </style>

    <div class="container">

        <form action="{{ route('updatePreferences') }}" method="POST" class="mform" id="mform">
            <h1>Ваши предпочтения:</h1>
            <br>
            <div class="faces">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcToaYaGj8QWu2xnGvHkaIaRgEEfUwOhi4_A7cVJblO9xdHZv2cz" alt="">
                <img src="https://steamuserimages-a.akamaihd.net/ugc/849339809535353525/E7A6644B34E4A5508AEE560FBBCF8E6B2637637B/" alt="">
            </div>
            <br>
            <div class="form-group">
                <label for="formControlRange">Кино</label>
                <input type="range" name="cinema" id="cinema" class="form-control-range" value="{{ $preferences['cinema'] }}" min="-100" max="100">
            </div>
            <div class="form-group">
                <label for="formControlRange">Еда</label>
                <input type="range" name="food" id="food" class="form-control-range" value="{{ $preferences['food'] }}" min="-100" max="100">
            </div>
            <div class="form-group">
                <label for="formControlRange">Прогулки</label>
                <input type="range" name="walking" id="walking" class="form-control-range" value="{{ $preferences['walking'] }}" min="-100" max="100">
            </div>
            <div class="form-group">
                <label for="formControlRange">Ваше местоположение</label>
                <div id="map-me"></div>
                <br>
                <input type="text" class="form-control-range" id="real-coords-input" name="coords" value="<?php echo htmlspecialchars(\json_encode($preferences['coords'])) ?>">
                <br>
                <button class="btn mbtn" id="myPlace">Определить своё местоположение</button>
            </div>
            <br>
            <div class="form-group">
                <button type="submit" class="btn mbtn">Сохранить</button>
            </div>
        </form>


    </div>

@endsection
