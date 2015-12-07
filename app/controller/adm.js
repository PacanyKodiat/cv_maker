/**
 * Created by stelmakh on 23.10.2015.
 */
var app = angular.module('myApp', ['ui.router', 'xeditable'])
    app.config(function($stateProvider, $urlRouterProvider) {
        
        $urlRouterProvider.otherwise('/');
        
        $stateProvider			
            .state('test', {
                url: '/',
                templateUrl: 'app/view/test.html',
				controller: 'adminCtrl'
            })
            .state('home', {
                url: '/home',
                templateUrl: 'app/view/home.html',
				controller: 'adminCtrl'
            })
            .state('admin', {
                url: '/admin',
                templateUrl: 'app/view/admin.html',
				controller: 'authCtrl'
            });
    })
    app.run(function(editableOptions){
        editableOptions.theme = 'bs3';
    })
    app.controller('adminCtrl', ['$scope','authService', '$http', function($scope, authService, $http){
    
        $http.get('app/model/cv-data.json')
            .success(function(response){
                $scope.myData = response;
            })
            .error(function(){
                alert("json error!");
            });
    
		$scope.updateData = function() {
			alert($scope.myData.name_surname);
			$http.put('app/model/cv-data.json', $scope.myData)
		};
		
		$scope.eyeSwitch = authService.isauth();
		$scope.toggle = authService.isauth();
    }]);
//    app.directive('editNav', function(){
//        return {
//            templateUrl: 'app/view/edit-nav.html'
//        }
//    });

    //sasha code authorization admin
    app.controller('authCtrl', ['$scope','authService', function ($scope,authService) {
        $scope.admin = {name:"",pass:"",error:""};
        authService.isauth();
        $scope.auth=function(data){
            authService.auth($scope.admin);
        };

    }]);
    //end auth

