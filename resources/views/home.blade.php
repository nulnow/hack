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
