/**
 * Created by stelmakh on 23.10.2015.
 */
angular.module('myApp', ['ui.router', 'xeditable'])
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
    .run(function(editableOptions){
        editableOptions.theme = 'bs3';
    })
    .controller('adminCtrl', function($scope,$http){
    
        $http.get('app/model/cv-data.json')
            .success(function(response){
                $scope.myData = response;
            })
            .error(function(){
                alert("json error!");
            });
    
            $scope.cvData = {
                "name_surname": "Igor Smyrnov",
                "position": "Front-end developer"
            };
    
            $scope.saveUser = function() {
                // $scope.user already updated!
                return $http.post('app/model/cv-data.json', $scope.cvData).error(function(err) {
                if(err.field && err.msg) {
                    // err like {field: "name", msg: "Server-side error for this username!"} 
                    $scope.editableForm.$setError(err.field, err.msg);
                } else { 
                    // unknown error
                        $scope.editableForm.$setError('name', 'Unknown error!');
                    }
                });
            };
            $scope.saveUser = function() {
                
            };
    
        $scope.toggle = false;
    
        $scope.removeble = true;

        //sasha code authorization admin
        $scope.test = "ppc";
        $scope.auth = function()
        {
            $http.post("app/model/admin.php",
                {
                    admin:$scope.admin
                }
            ).success(function(data){
                    $scope.admin = data;
                });
        };
        //end auth

    })
    .directive('editNav', function(){
        return {
            templateUrl: 'app/view/edit-nav.html'
        }
    });
