'use strict';

/**
 * @ngdoc function
 * @name choiceHelperApp.controller:MainCtrl
 * @description
 * # MainCtrl
 * Controller of the choiceHelperApp
 */
angular.module('choiceHelperApp')
  .controller('MainCtrl', function ($scope) {
    $scope.awesomeThings = [
      'HTML5 Boilerplate',
      'AngularJS',
      'Karma'
    ];
  });
