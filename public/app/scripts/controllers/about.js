'use strict';

/**
 * @ngdoc function
 * @name choiceHelperApp.controller:AboutCtrl
 * @description
 * # AboutCtrl
 * Controller of the choiceHelperApp
 */
angular.module('choiceHelperApp')
  .controller('AboutCtrl', function ($scope) {
    $scope.awesomeThings = [
      'HTML5 Boilerplate',
      'AngularJS',
      'Karma'
    ];
  });
