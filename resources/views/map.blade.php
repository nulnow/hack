@extends('layouts.app')

@section('content')
<div class="meet">
            <div class="meet-wrapper">
                <div class="people you">
                    <div class="people-wrapper">
                        <div class="container">
                            <img
                                src="https://pp.userapi.com/c841537/v841537679/6c493/nNnZ4I7X3f4.jpg"
                                class="people-preview" />
                            <div class="people-name">Просто Андрей</div>
                            <div class="people-status">Поло 97%</div>
                            <div class="splitter"></div>
                            <h3>Пол</h3>
                            <div class="button gender">Мужской</div>
                            <div class="splitter"></div>
                            <h3>Интересы</h3>
                            <div class="people-interests">
                                <div class="people-interests-item">
                                    <div class="people-interests-item-title">Еда</div>
                                    <div class="interest-container">
                                        <div class="people-interests-scale">
                                            <div style="width: 70%"
                                                class="_active"></div>
                                        </div>
                                        <div class="persentage">70%</div>
                                    </div>
                                </div>
                                <div class="people-interests-item">
                                    <div class="people-interests-item-title">Кино</div>
                                    <div class="interest-container">
                                        <div class="people-interests-scale">
                                            <div style="width: 60%"
                                                class="_active"></div>
                                        </div>
                                        <div class="persentage">60%</div>
                                    </div>
                                </div>
                                <div class="people-interests-item">
                                    <div class="people-interests-item-title">Прогулки</div>
                                    <div class="interest-container">
                                        <div class="people-interests-scale">
                                            <div style="width: 90%"
                                                class="_active"></div>
                                        </div>
                                        <div class="persentage">90%</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="mapContainer" class="map map-area">
                    <div class="map-info">
                        <div class="map-info-wrapper">
                            <div class="container">
                                <div class="map-info-title">Lorem ipsum dolor
                                    sit.</div>
                                <div class="map-info-description">Lorem ipsum
                                    dolor sit amet consectetur, adipisicing
                                    elit.</div>
                            </div>
                            <div class="btn-container">
                                <!--<a href="#" class="button _no">Нет</a>-->
                                <a href="#" class="button _go">Иду!</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="people apponent">
                    <div class="people-wrapper">
                        <div class="container">
                            <img
                                src="https://pp.userapi.com/c847018/v847018047/1b00e0/z4csP_yABg4.jpg"
                                class="people-preview" />
                            <div class="people-name">Даня</div>
                            <div class="people-status">ЫЫЫы люблю с++</div>
                            <div class="splitter"></div>
                            <h3>Пол</h3>
                            <div class="button gender">Женский</div>
                            <div class="splitter"></div>
                            <h3>Интересы</h3>
                            <div class="people-interests">
                                <div class="people-interests-item">
                                    <div class="people-interests-item-title">Еда</div>
                                    <div class="interest-container">
                                        <div class="people-interests-scale">
                                            <div style="width: 100%"
                                                class="_active"></div>
                                        </div>
                                        <div class="persentage">100%</div>
                                    </div>
                                </div>
                                <div class="people-interests-item">
                                    <div class="people-interests-item-title">Кино</div>
                                    <div class="interest-container">
                                        <div class="people-interests-scale">
                                            <div style="width: 35%"
                                                class="_active"></div>
                                        </div>
                                        <div class="persentage">35%</div>
                                    </div>
                                </div>
                                <div class="people-interests-item">
                                    <div class="people-interests-item-title">Прогулки</div>
                                    <div class="interest-container">
                                        <div class="people-interests-scale">
                                            <div style="width: 40%"
                                                class="_active"></div>
                                        </div>
                                        <div class="persentage">90%</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection