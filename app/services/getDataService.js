/**
 * Created by stelm on 15.12.2015.
 */
'use strict';

app.factory('getDataService',['$http', function ($http) {
    var sectionsData = [];
    var personalData;
    var self=this;
    $http.post("app/model/controller.php",{getdata:true}).success(function(data, status, headers, config){
        self.personalData = data.personaldata;
        /*data.personaldata.forEach(function(test){
            personalData.push(test);
        });*/
        data.sections.forEach(function(cat){
            sectionsData.push(cat);

        });
    });
    console.log(self);
    return{
        personal:self,
        sections:sectionsData
    }

}]);