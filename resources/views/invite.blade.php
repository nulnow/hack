@extends('layouts.app')

@section('content')

    <script>
        var whereToGo = <?php
            echo json_encode([
                'title' => $place->title,
                'lat' => $place->lat,
                'lng' => $place->lng
            ]);
            ?>;

        var pairLat = `<?php
            echo $pairOptions->coords->lat;
            ?>`;
        var pairLng = `<?php
            echo $pairOptions->coords->lng;
            ?>`;

        var userGettingInvitedId = <?php
            echo $pair->id;?>;
    </script>

    <div class="meet">
        <div class="meet-wrapper">
            <div class="people you">
                <div class="people-wrapper">
                    <div class="container">
                        <img
                            src="https://gladstoneentertainment.com/wp-content/uploads/2018/08/blank-portrait.png"
                            class="people-preview" />
                        <div class="people-name">{{ $user->name }}</div>
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
                <div id="map" style="width: 100%; height: 400px;"></div>
                <div class="map-info">
                    <div class="map-info-wrapper">
                        <div class="container">
                            <div class="map-info-title">Пользователь {{ $pair->name }} приглашает вас в <span id="place">{{ $place->title }}</span></div>
                            {{--<div class="map-info-description">Lorem ipsum--}}
                                {{--dolor sit amet consectetur, adipisicing--}}
                                {{--elit.</div>--}}
                        </div>
                        <div class="btn-container">
                            <a href="{{ route('rejectInvite', ['invite' => $invite->id]) }}" class="button _no">Нет</a>
                            <a href="{{ route('acceptInvite', ['invite' => $invite->id]) }}" class="button _go">Иду!</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="people apponent">
                <div class="people-wrapper">
                    <div class="container">
                        <img
                            src="https://gladstoneentertainment.com/wp-content/uploads/2018/08/blank-portrait.png"
                            class="people-preview" />
                        <div class="people-name">{{ $pair->name }}</div>
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
