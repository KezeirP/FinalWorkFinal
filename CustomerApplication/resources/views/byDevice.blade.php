@extends('layouts.app')

@section('content')
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth

                    <div class="content" style="width: 100%; height: 100%; position: absolute; padding-top: 0">
                        <div  style="height: 100%; width: auto; float: left; " ng-controller="TableController">

                            <select ng-change="change()" ng-model="value" class="form-control" >
                                <option value="">choose your device</option>
                                @foreach($codes as $code)
                                    <option value="{{$code->code}}">{{$code->code}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="container-fluid main-content" ng-controller="TableController">
                            <div id="map" class="panel panel-default panel-success"></div>
                            <table-directive></table-directive>
                        </div>
                    </div>
                @else
                    <div class="container" style=" margin-top: 5em">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">Login status</div>

                                    <div class="card-body">
                                        Please log in
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endauth
            </div>
    @endif
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="http://cdn.leafletjs.com/leaflet-0.7/leaflet.js"></script>
        <script src = "{!!asset('js/angular.min.js')!!}"></script>
        <script src = "{!!asset('js/loadmapByDevice.js')!!}"></script>
@endsection
