@extends('layouts.app')

@section('content')


<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <div class="content" style="width: 100%; height: 100%; position: absolute; padding-top: 0">
                    <div style="height: 100%; width: 10%; float: left; ">
                        <?php
                            $i = 0;
                            $colors = array(
                              "0" => "#C9C321",
                              "1" => "#3A3A3A",
                              "2" => "#25AC22",
                              "3" => "#787878",
                              "4" => "#CB852B",
                              "5" => "#CB273B",
                              "6" => "#9A26CA",
                              "7" => "#277FCA",
                            );
                        ?>
                        <ul class="list-group">
                            @foreach($codes as $code)
                            <li class="list-group-item" style="background-color: <?php echo $colors[$i]; ?>">{{$code->Device}}</li>
                                <?php if($i<7){$i += 1;}else{$i = 0;};?>
                            @endforeach
                        </ul>

                    </div>


                   <!-- <div id="map" style="height: 100%; width: 90%; float: right"></div>-->
                    <div class="container-fluid main-content" ng-controller="TableController">
                        <p style="background-color: #343a40; color: white; position: absolute;top: 8px; right: 16px; z-index: 1;"> maps update: <span id="countdowntimer">20 </span> Sec</p>

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



<!--<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCg6pfni_ClNBey-lGKGv535Qb_GYIG-8&callback=initMap">
</script>-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="http://cdn.leafletjs.com/leaflet-0.7/leaflet.js"></script>
        <script src = "{!!asset('js/angular.min.js')!!}"></script>
        <script src = "{!!asset('js/loadmap.js')!!}"></script>
        <script type="text/javascript">
            var timeleft = 20;
            var downloadTimer = setInterval(function(){
                timeleft--;
                document.getElementById("countdowntimer").textContent = timeleft;
                if(timeleft <= 0)
                    timeleft = 20;
            },1000);
        </script>
@endsection
