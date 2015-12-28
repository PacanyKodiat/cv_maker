/**
 * Created by stelm on 15.12.2015.
 */

'use strict';

app.factory('setDataService',function($http){
    return{
        insert:function(data,act){
            $http.put("app/model/controller.php",{setdata:act,data:data})
                .success(function(msg){
                    console.log(msg);
                });
        }
    }
});