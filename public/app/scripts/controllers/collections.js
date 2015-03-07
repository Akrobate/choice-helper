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

        $scope.addcollection = {};
        $scope.addcollection.label = "";

        $scope.collections = [];
        $scope.showAddPanel = false;


        $scope.updateCollection = function() {
            serviceApi.getCollections({}, (response) => {
                console.log(response);
                $scope.collections = response.data.list;
                $scope.$apply();
            });
        };

        $scope.saveCollection = function() {
            let params = {};
            params.label = $scope.addcollection.label;
            serviceApi.saveCollection(params, (response) => {
                console.log(response);
                $scope.updateCollection();
                $scope.hideAddFormPannel();
                $scope.$apply();
            });
        };


        $scope.showAddFormPannel = function() {
            $scope.showAddPanel = true;
        };

        $scope.hideAddFormPannel = function() {
            $scope.showAddPanel = false;
            $scope.resetAddForm();
        };

        $scope.resetAddForm = function() {
            $scope.addcollection.label = "";
        };



        $scope.updateCollection();

        //		console.log($routeParams.id);
    });
