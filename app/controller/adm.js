/**
 * Created by stelmakh on 23.10.2015.
 */
angular.module('myApp', ['ui.router'])
    .config(function($stateProvider, $urlRouterProvider) {
        
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
    .controller('adminCtrl', function($scope,$http){
        $http.get('app/model/cv-data.json')
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
            templateUrl: 'app/view/edit-nav.html'
        }
    });
