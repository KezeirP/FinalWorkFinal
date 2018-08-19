var app = angular.module("app", []).controller("TableController", ['$scope','$http', function($scope, $http) {
    $scope.users = [];
    $scope.months = [];
    $scope.years = [];
    $scope.days = [];
    $scope.markers = new L.FeatureGroup();

    $scope.map = L.map('map').setView([50.958933, 4.243615], 7);
    L.tileLayer(
        'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://openstreetmap.org">OpenStreetMap</a> phil pilgrim',
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

    $scope.init = function () {
       $scope.refresh();
       $scope.interval = setInterval(() => {
           $scope.refresh();
        }, 20000);
    }

    $scope.refresh = function () {
        $scope.markers.clearLayers();


        $http.get('/map/status').success(function (data) {

            console.log(data);
            $scope.gpsdata = data;
            var j = 0;
            for (var i in $scope.gpsdata) {
                var date = new Date($scope.gpsdata[i].Time);
                console.log($scope.gpsdata[i].latitude)
                $scope.marker = new L.marker(new L.LatLng($scope.gpsdata[i].longitude, $scope.gpsdata[i].latitude), {icon: iconArray[j]})
                    .bindPopup(
                            "<li>Speed: " + $scope.gpsdata[i].speed + "km/h" + ", </li>"
                            + "<li>Temperature: " + $scope.gpsdata[i].Temperature + "°C"+"</li>"
                            + "<li> Longitude: " + $scope.gpsdata[i].longitude + "</li>"
                            + "<li> Latitude: " + $scope.gpsdata[i].latitude + "</li>"
                            + "<li> Part of device: " + $scope.gpsdata[i].Device + "</li>"
                            + "<li> Time: " + date.toLocaleString() + "</li>"
                        );

                $scope.markers.addLayer($scope.marker);
                if(j<7)
                {
                    j += 1;
                }
                else{
                    j = 0;
                }
            }
            $scope.map.addLayer($scope.markers);
        });
    }

    $scope.init();

    var greenIcon = new L.Icon({
        iconUrl: 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
    });
    var blackIcon = new L.Icon({
        iconUrl: 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-black.png',
        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
    });
    var greyIcon = new L.Icon({
        iconUrl: 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-grey.png',
        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
    });
    var orangeIcon = new L.Icon({
        iconUrl: 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-orange.png',
        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
    });
    var redIcon = new L.Icon({
        iconUrl: 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
    });
    var violetIcon = new L.Icon({
        iconUrl: 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-violet.png',
        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
    });
    var yellowIcon = new L.Icon({
        iconUrl: 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-yellow.png',
        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
    });
    var blueIcon = new L.Icon({
        iconUrl: 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-blue.png',
        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
    });

    var iconArray = [yellowIcon, blackIcon, greenIcon, greyIcon, orangeIcon, redIcon, violetIcon, blueIcon];



    }]);

