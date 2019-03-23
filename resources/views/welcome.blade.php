@extends('layouts.app')

@section('content')
<div class="main">
            <div class="main-wrapper">
                <div class="body-render">
                    <div class="main-start-container">
                        <div id="menui" class="main-start-container-wrapper">
                            <div class="container">
                                <h1><b>Pinder.ru - как тиндер, только лучше</b></h1>
                                <h2>Поиск людей по интересам</h2>
                                <br>
                                <br>
                                <a href="#search" class="main-btn">Найти!</a>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div id="search" class="main-middle-container">
                        <div class="main-middle-container-wrapper">
                            <div class="main-middle-left">
                                <div class="choose-item">
                                    <img class="choose-item-image" />
                                    <br>
                                    <h4 class="choose-item-title">Lorem ipsum
                                        dolor
                                        sit.</h4>
                                    <h5 class="choose-item-description">Lorem
                                        ipsum
                                        dolor sit amet, consectetur adipisicing
                                        elit. A sapiente laboriosam numquam
                                        veniam
                                        consequatur, accusamus asperiores in
                                        voluptatem! Placeat, dicta.</h5>
                                </div>
                            </div>
                            <div class="main-middle-right">
                                <div class="choose-item">
                                    <img class="choose-item-image" />
                                    <br>
                                    <h4 class="choose-item-title">Поиск людей по интересам</h4>
                                    <h5 class="choose-item-description">Lorem
                                        ipsum
                                        dolor sit amet, consectetur adipisicing
                                        elit. A sapiente laboriosam numquam
                                        veniam
                                        consequatur, accusamus asperiores in
                                        voluptatem! Placeat, dicta.</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
@endsection
