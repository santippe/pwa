<body ng-app="app">
    <div id="main" ng-controller="findPlaces">                        
        <div class="entry h1"><input type="text" placeholder="Aggiungi una location..." id="pac-input" ng-model="locale.x"></div>
        <h3>Lista Location</h3>            
        <h4 ng-show="locali2.length==0">Nessuna location scelta</h4>
        <div id="list2">
            <div class="entry h2" ng-repeat="item in locali2"><input type="text" ng-model="item.name"><div class="numvoti">{{item.numvoti}}</div></div>                
        </div>
        <h3>Last Inserted</h3>
        <div class="entry h2"><input type="text" ng-model="localizedScope"></div>                            
    </div>     
    <script>                        
        var locale ={x:""};
        var app = angular.module('app',[]);            
        app.controller('findPlaces',function($scope){                  
            $scope.locale = locale;
            $scope.localizedScope =null;
            //reading from database
            $scope.locali2 = [];
            let lngLat1 = new google.maps.LatLng(44.484917, 11.327566);
            let lngLat2 = new google.maps.LatLng(44.502073, 11.358370);
            var input = document.getElementById('pac-input');
            var searchBox = new google.maps.places.SearchBox(input);                           
            var bounds = new google.maps.LatLngBounds(lngLat1,lngLat2);                
            searchBox.setBounds(bounds);
            searchBox.addListener('places_changed', function() {
                var places = searchBox.getPlaces();
                if (places.length == 0) {
                    return;
                } else {                                       
                    let locationName = places[0].name;
                    $scope.localizedScope = places[0].name;
                    //test this                                                                       
                    $.post('/server.php',{
                        'cmd':'addVote', 'place': {'placeID' :places[0].place_id,'name':places[0].name}
                        },function(data){                            
                        //$scope.locali2.push(data);                             
                        //need a complete array to set
                        console.log(data);
                        $scope.$digest();
                    });
                    $scope.$digest();
                }
            });                                
        });
    </script>
    <script>
        function loadElements(){
            $.ajax('localhost:90/bandicotApi',{
                'cmd':'giveMeStoredLoc'
            },function(data){
                
            });
        }
        function addElement(){
            
        }
        function typeCheck(){

        }                 
    </script>
</body>
