/**
 * Created by stelmakh on 28.10.2015.
 */

'use strict';

app.factory('authService',function($http, $location, sessionService){
    return{
        auth:function(data){
            $http.post("app/model/controller.php",
                {
                    auth:data
                }
            ).success(function(msg){
                    if(!msg.error){
                        data.goodauth = msg.goodauth;
                        data.error = msg.error;
                        sessionService.set('id',msg.id);
                        sessionService.set('name',msg.name);
                        sessionService.set('pass',msg.pass);
                       	$location.path('/home');
                    }else{
                        data.error = msg.error;
                    }
            });
        },
        isauth:function(){
//            alert(sessionService.get('id'));
			return true;
//            console.log(sessionService.get('id'));
//            console.log(sessionService.get('name'));
//            console.log(sessionService.get('pass'));
        },
        logout:function(){
            sessionService.destroy('id');
            $location.path('/admin');
        }
    }

});