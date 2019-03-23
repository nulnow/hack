@extends('layouts.app')

@section('content')

    <script src="http://js.api.here.com/v3/3.0/mapsjs-core.js" type="text/javascript" charset="utf-8"></script>
    <script src="http://js.api.here.com/v3/3.0/mapsjs-service.js" type="text/javascript" charset="utf-8"></script>
    <script src="https://js.cit.api.here.com/v3/3.0/mapsjs-mapevents.js" type="text/javascript" ></script>
    <script src="https://js.cit.api.here.com/v3/3.0/mapsjs-places.js" type="text/javascript" ></script>



    <style>
        #map {
            width: 100%;
            height: 600px;
        }
    </style>

    <script>



    </script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Карта</div>

                <div class="card-body">

                    <div id="map"></div>
                    <script>

                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
