@extends('layouts.app')

@section('content')

    <div class="meet">
        <div class="meet-wrapper">
            <div class="people you">
                <div class="people-wrapper">
                    <div class="container">
                        <img style="height: 120px"
                             src="{{ $user->img_src }}" />
                        <div class="people-name">{{ $user->name }}</div>
                        <div class="people-status">Статус пользователя</div>
                        <div class="splitter"></div>
                        <h3>Пол</h3>
                        <div class="button gender">{{ $genderText }}</div>
                        <div class="splitter"></div>
                        <h3>Интересы</h3>
                        <div class="people-interests">
                            <div class="people-interests-item">
                                <div class="people-interests-item-title">Кино</div>
                                <div class="interest-container">
                                    <div class="people-interests-scale">
                                        <div style="width: {{ round(($userOptions->cinema/2) + 50) }}%"
                                             class="_active"></div>
                                    </div>
                                    <div class="persentage">{{ round(($userOptions->cinema/2) + 50) }}%</div>
                                </div>
                            </div>
                            <div class="people-interests-item">
                                <div class="people-interests-item-title">Еда</div>
                                <div class="interest-container">
                                    <div class="people-interests-scale">
                                        <div style="width: {{ round(($userOptions->food/2) + 50) }}%"
                                             class="_active"></div>
                                    </div>
                                    <div class="persentage">{{ round(($userOptions->food/2) + 50) }}%</div>
                                </div>
                            </div>
                            <div class="people-interests-item">
                                <div class="people-interests-item-title">Прогулки</div>
                                <div class="interest-container">
                                    <div class="people-interests-scale">
                                        <div style="width: {{ round(($userOptions->walking/2) + 50) }}%"
                                             class="_active"></div>
                                    </div>
                                    <div class="persentage">{{ round(($userOptions->walking/2) + 50) }}%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="mapContainer" class="map map-area">
                <div id="map" style="width: 100%; height: 600px;"></div>
                <div class="map-info">
                    <div class="map-info-wrapper">
                        <div class="container">
                            <div class="map-info-title">Пара найдена</div>
                            <div class="map-info-description">Предложите {{ $pair->name }} посетить место [place].</div>
                        </div>
                        <div class="btn-container">
                            <a href="#" class="button _no">Нет</a>
                            <a href="{{ route('sendInvite', ['user' => $pair->id]) }}" class="button _go">Отправить запрос!</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="people apponent">
                <div class="people-wrapper">
                    <div class="container">
                        <img
                            style="height: 120px"
                            src="https://pp.userapi.com/c847018/v847018047/1b00e0/z4csP_yABg4.jpg"
                            class="people-preview" />
                        <div class="people-name">{{ $pair->name }}</div>
                        <div class="people-status">Pair status</div>
                        <div class="splitter"></div>
                        <h3>Пол</h3>
                        <div class="button gender">{{ $pairGenderText }}</div>
                        <div class="splitter"></div>
                        <h3>Интересы</h3>
                        <div class="people-interests">
                            <div class="people-interests-item">
                                <div class="people-interests-item-title">Кино</div>
                                <div class="interest-container">
                                    <div class="people-interests-scale">
                                        <div style="width: {{ round(($pairOptions->cinema/2) + 50) }}%"
                                             class="_active"></div>
                                    </div>
                                    <div class="persentage">{{ round(($pairOptions->cinema/2) + 50) }}%</div>
                                </div>
                            </div>
                            <div class="people-interests-item">
                                <div class="people-interests-item-title">Еда</div>
                                <div class="interest-container">
                                    <div class="people-interests-scale">
                                        <div style="width: {{ round(($pairOptions->food/2) + 50) }}%"
                                             class="_active"></div>
                                    </div>
                                    <div class="persentage">{{ round(($pairOptions->food/2) + 50) }}%</div>
                                </div>
                            </div>
                            <div class="people-interests-item">
                                <div class="people-interests-item-title">Прогулки</div>
                                <div class="interest-container">
                                    <div class="people-interests-scale">
                                        <div style="width: {{ round(($pairOptions->walking/2) + 50) }}%"
                                             class="_active"></div>
                                    </div>
                                    <div class="persentage">{{ round(($pairOptions->walking/2) + 50) }}%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
