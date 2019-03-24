@extends('layouts.app')

@section('content')
<div class="main">
            <div class="main-wrapper">
                <div class="body-render">
                    <div class="main-start-container">
                        <div id="menui" class="main-start-container-wrapper">
                            <div class="container" style="display: flex; flex-flow: column; justify-content: center; align-items: center">
                                <h1><b>Pinder.ru - как тиндер, только лучше</b></h1>
                                <h2>Поиск людей по интересам</h2>
                                <br>
                                <br>
                                <style>
                                    a.main-btn:hover {
                                        background-color: #fff;
                                        color: #212121 !important;
                                    }
                                </style>
                                <a style="width: 100%" href="{{ route('findPair') }}" class="main-btn">Найти!</a>
                                <br>
                                <a style="color: white; text-decoration: none" href="#search">Подробнее</a>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div id="search" class="main-middle-container">
                        <div class="main-middle-container-wrapper">
                            <div class="main-middle-left">
                                <div class="choose-item">
                                    <img style="background-color: rgba(0,0,0,0);" src="http://www.stickpng.com/assets/images/585e4ae9cb11b227491c3394.png" class="choose-item-image" />
                                    <br>
                                    <h4 class="choose-item-title">Поиск людей по интересам</h4>
                                    <h5 class="choose-item-description">Наш специальный
                                        метематический алгоритм подберет
                                        вам идеальную пару, основываясь на ваших общих интересах.</h5>
                                </div>
                            </div>
                            <div class="main-middle-right">
                                <div class="choose-item">
                                    <img style="background-color: rgba(0,0,0,0);" class="choose-item-image" src="https://image.flaticon.com/icons/png/512/33/33622.png" />
                                    <br>
                                    <h4 class="choose-item-title">Подбор подходящего места для встречи</h4>
                                    <h5 class="choose-item-description">Мы подскажем наиболее подходящее место для встречи
                                        и проложим до него маршрут.</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
@endsection
