'use strict';

/**
 * @ngdoc function
 * @name project2App.controller:LogoutCtrl
 * @description
 * # LogoutCtrl
 * Controller of the project2App
 */
angular.module('choiceHelperApp')
  .controller('LogoutCtrl', function ($scope,$location,$http,serviceApi) {
   		serviceApi.logout(function(data) {
            console.log(data);
	   		connected = 'nop';
	  		$location.path('/');
	  		$scope.$apply();
   		});
 		//$scope.$apply();
  });
