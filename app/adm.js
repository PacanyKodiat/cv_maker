/**
 * Created by stelmakh on 23.10.2015.
 */
var test = angular.module('myApp', ['ui.router'])

    .config(['$urlRouterProvider', '$stateProvider', function($urlRouterProvider, $stateProvider) {

        $urlRouterProvider.otherwise('/home');

        $stateProvider.state('home', {
            url: '/home',
            templateUrl: 'views/home.html'
        });

        $stateProvider.state('admin', {
            url: '/admin',
            templateUrl: 'views/admin.html'
        });
    }]);
test.controller("adminCtrl", function($scope,$http){
    $scope.test = "HELLO";
    $scope.tempnum = 145.6;
});


