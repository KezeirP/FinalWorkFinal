var app = angular.module("app", [])
    .controller("TableController", ['$scope','$http', function($scope, $http){
        $scope.users = [];
        $scope.months = [];
        $scope.years = [];
        $scope.days = [];
        $scope.markers = new L.FeatureGroup();
        console.log($scope.count);
        $scope.map = L.map('map').setView([50.958933, 4.243615], 7);

        L.tileLayer(
            'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="http://openstreetmap.org">OpenStreetMap</a> Contributors',
                maxZoom: 30,
                minZoom: 1
            }).addTo($scope.map);

        for (var i = 1; i < 13; i++) {
            $scope.months.push(i);
        }
        for (var i = 1900; i < 2017; i++) {
            $scope.years.push(i);
        }
        for (var i = 1; i < 32; i++) {
            $scope.days.push(i);
        }

        $scope.change = function () {
            console.log($scope.value);
            $scope.refresh($scope.value);
        }
        $scope.init = function(){
            $scope.refresh('');
        }

        $scope.refresh = function($deviceCode){
            $scope.markers.clearLayers();
            var yellowIcon = new L.Icon({
                iconUrl: 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-yellow.png',
                shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
                iconSize: [25, 41],
                iconAnchor: [12, 41],
                popupAnchor: [1, -34],
                shadowSize: [41, 41]
            });

            var s = '/map/byDevice/' + $deviceCode;
            $http.get(s).success(function(data) {
                console.log(data);
                $scope.gpsdata = data;
                for(var i in $scope.gpsdata){
                    var date = new Date($scope.gpsdata[i].Time);
                    console.log($scope.gpsdata[i].latitude)
                    $scope.marker = new L.marker(new L.LatLng($scope.gpsdata[i].longitude, $scope.gpsdata[i].latitude),{icon: yellowIcon})
                        .bindPopup(
                            "<li>Speed: " + $scope.gpsdata[i].speed + "km/h"+ ", </li>"
                            + "<li>Temperature: " + $scope.gpsdata[i].Temperature + "</li>"
                            + "<li> Longitude: "+$scope.gpsdata[i].longitude +"</li>"
                            + "<li> Latitude: "+$scope.gpsdata[i].latitude +"</li>"
                            + "<li> Part of device: "+$scope.gpsdata[i].Device +"</li>"
                            + "<li> Time: "+date.toLocaleString()+"</li>"
                        );
                    $scope.markers.addLayer($scope.marker);
                }
                $scope.map.addLayer($scope.markers);
            });
        }
        $scope.init();

    }])
;


