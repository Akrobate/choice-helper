'use strict';

/**
 * @ngdoc function
 * @name choiceHelperApp.controller:AboutCtrl
 * @description
 * # AboutCtrl
 * Controller of the choiceHelperApp
 */
angular.module('choiceHelperApp')
    .controller('CollectionsCtrl', function ($scope, serviceApi) {
        $scope.collections = [];

        serviceApi.getCollections({}, (response) => {
            console.log(response);
            $scope.collections = response.data.list;
            $scope.$apply();
        });

        //		console.log($routeParams.id);
    });
