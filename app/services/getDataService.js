/**
 * Created by stelm on 15.12.2015.
 */
'use strict';

app.factory('getDataService',['$http', function ($http) {
    var myData = [];

    $http.post("app/model/controller.php",{getdata:true}).success(function(data, status, headers, config){
        data.forEach(function(cat){
            myData.push(cat);
        });
    });

    return{
        data:myData
    }

}]);