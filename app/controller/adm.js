/**
 * Created by stelmakh on 23.10.2015.
 */
var app = angular.module('myApp', ['ui.router', 'xeditable'])
    app.config(function($stateProvider, $urlRouterProvider) {
        
        $urlRouterProvider.otherwise('/');
        
        $stateProvider
            .state('home', {
                url: '/',
                templateUrl: 'app/view/home.html'
            })
            .state('admin', {
                url: '/admin',
                templateUrl: 'app/view/admin.html'
            });
    })
    app.run(function(editableOptions){
        editableOptions.theme = 'bs3';
    })
    app.controller('home', ['$http','$scope','authService', 'getDataService', 'setDataService', function($http, $scope, authService, getDataService, setDataService){
        $scope.myData = getDataService.data;

        $scope.newCat = {};
        $scope.addCategory = function(){
            $scope.myData.push($scope.newCat);
            setDataService.insert($scope.newCat,'addCat');
            $scope.newCat = {};
        };

		$scope.saveUser = function() {
            alert("assadasda");
			//$http.put('app/model/cv-data.json')
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
    app.controller('admauthCtrl', ['$scope','authService', function ($scope,authService){
        $scope.admin = {name:"",pass:"",error:""};
        authService.isauth();
        $scope.auth=function(data){
            authService.auth($scope.admin);
        };
    }]);
    //end auth

