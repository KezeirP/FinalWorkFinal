var app = angular.module("app", [])
    .controller("TableController", ['$scope','$http', function($scope, $http){
        $scope.users = [];
        $scope.months = [];
        $scope.years = [];
        $scope.days = [];
        $scope.markers = new L.FeatureGroup();

        $scope.map = L.map('map').setView([0, 0], 2);
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

        $scope.init = function(){
            $scope.refresh();
            /*$http.get('getuser').success(function(data){
                $scope.users = data;
                $scope.refresh();
            });*/
        }


        $scope.refresh = function(){
            /*$scope.markers.clearLayers();
            for (var i in $scope.users) {
                $scope.marker = new L.marker(new L.LatLng($scope.users[i].lat, $scope.users[i].lng))
                    .bindPopup($scope.users[i].name + ", " + $scope.users[i].birth + ", " + $scope.users[i].address);
                $scope.markers.addLayer($scope.marker);
            }

            $scope.map.addLayer($scope.markers);*/

            //test
            $scope.marker = new L.marker(new L.LatLng(50.965627, 4.229759));

            $scope.map.addLayer($scope.marker);
        }
        $scope.init();



        function downloadUrl(url, callback) {
            var request = window.ActiveXObject ?
                new ActiveXObject('Microsoft.XMLHTTP') :
                new XMLHttpRequest;
            request.onreadystatechange = function() {
                if (request.readyState == 4) {
                    request.onreadystatechange = doNothing;
                    callback(request, request.status);
                }
            };
            request.open('GET', url, true);
            request.send(null);
        }
        function doNothing() {}






    }])
   ;


/*
    var customLabel = {
        restaurant: {
            label: 'R'
        },
        bar: {
            label: 'B'
        }
    };



    function process(){
        location.reload(true)

        setTimeout(function(){
            process();
        },3000);
    }

    $("#refreshButton").click(function(){
        process()
    })

    function reloadmap(){
        setTimeout(function(){
            location.reload(true);
        },1000);
    }

    $('refreshButton').on('click',interval);
    function interval(){
        setTimeout(function(){
            location.reload();
        },1000);
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("demo").innerHTML =
                    this.responseText;
            }
        };
        xhttp.open("GET", initMap(), true);
        xhttp.send();
    }

    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: new google.maps.LatLng(50.958538, 4.232261),
            zoom: 12
        });
        var infoWindow = new google.maps.InfoWindow;
        // Change this depending on the name of your PHP or XML file
        var s = 'http://dtsl.ehb.be/~phil.pilgrim/FinalWork/getGpsData.php?'+ '{{ Auth::user()->id }}';
        console.log(s);
        downloadUrl('http://dtsl.ehb.be/~phil.pilgrim/FinalWork/getGpsData.php?', function(data) {
            var xml = data.responseXML;
            console.log(xml);
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
                var type = 'car';
                var point = new google.maps.LatLng(
                    parseFloat(markerElem.getAttribute('longitude')),
                    parseFloat(markerElem.getAttribute('latitude')));
                var infowincontent = document.createElement('div');
                var icon = customLabel[type] || {};
                var marker = new google.maps.Marker({
                    map: map,
                    position: point,
                    label: icon.label
                });
                marker.addListener('click', function() {
                    infoWindow.setContent(infowincontent);
                    infoWindow.open(map, marker);
                });
            });
        });
    }
    function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;
        request.onreadystatechange = function() {
            if (request.readyState == 4) {
                request.onreadystatechange = doNothing;
                callback(request, request.status);
            }
        };
        request.open('GET', url, true);
        request.send(null);
    }
    function doNothing() {}
*/