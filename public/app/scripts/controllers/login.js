'use strict';

/**
 * @ngdoc function
 * @name project2App.controller:LoginCtrl
 * @description
 * # LoginCtrl
 * Controller of the project2App
 */
angular.module('choiceHelperApp')
  .controller('LoginCtrl', function ($scope, $http, $location, serviceApi) {

    	//serviceApi.requestApi();
	    $scope.registration = {};
		$scope.registration.password = "";
		$scope.registration.password2 = "";
	    $scope.registration.disablesubmit = false;

    $scope.connect = function() {
		var connection = {
			login: $scope.connection.login,
			password: $scope.connection.password,
		};
    	console.log(connection);
        serviceApi.connect(connection.login, connection.password, function(data) {
	        console.log(data);
			if(data.data.status == 'connected') {
                console.log("USER AUTHENTIFICATED");
                // console.log(data);
                connected = 'ok';
                $scope.connected = 'ok';
                $location.path('/about');
                $scope.$apply();
			} else {
                console.log("USER DENIED");
                console.log(data);
                $scope.connected = 'nop';
                $scope.connected = 'nop';
                $location.path('/login');
                $scope.$apply();
			}
        });
    }


    $scope.$watch("registration.password2", function() {
    		console.log($scope);
    		if ($scope.registration.password2 != "") {
				if ($scope.registration.password == $scope.registration.password2) {
					$scope.registration.notidentical = "has-success";
					$scope.registration.disablesubmit = false;
				} else {
					$scope.registration.notidentical = "has-error";
					$scope.registration.disablesubmit = true;
				}
      		}
    });


  });
