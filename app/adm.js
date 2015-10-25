/**
 * Created by stelmakh on 23.10.2015.
 */
angular.module('myApp', ['ui.router'])
    .config(function($stateProvider, $urlRouterProvider) {
        
        $urlRouterProvider.otherwise('/');
        
        $stateProvider
            .state('home', {
                url: '/',
                templateUrl: 'views/home.html'
            })
            .state('admin', {
                url: '/admin',
                templateUrl: 'views/admin.html'
            });
    })
    .controller('adminCtrl', function($scope,$http){
        $http.get('data.json')
            .success(function(response){
                $scope.myData = response;
            })
            .error(function(){
                alert("json error!");
            });
        $scope.test = function(){
            $scope.yourName = "test";
        }
        $scope.toggle = false;
        $scope.removeble = true;
    })
    .directive('editNav', function(){
        return {
            templateUrl: 'views/edit-nav.html'
        }
    });
