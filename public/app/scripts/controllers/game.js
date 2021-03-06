'use strict';

/**
 * @ngdoc function
 * @name choiceHelperApp.controller:GameCtrl
 * @description
 * # GameCtrl
 * Controller of the choiceHelperApp
 */

angular.module('choiceHelperApp')
    .controller('GameCtrl', function ($scope, serviceApi) {

        // $scope.awesomeThings = [ 'HTML5 Boilerplate', 'AngularJS', 'Karma' ];

        $scope.propositions = {};
        $scope.gameResults = [];
        $scope.gameResultsSort = '-rank';

        $scope.startNewGame = function() {
            serviceApi.getGameItems((response) => {
                $scope.propositions.itemA = response.data.itemA;
                $scope.propositions.itemB = response.data.itemB;
                this.updateResults();
                $scope.$apply();
            });
	    };


        $scope.playIteration = function(itemA, itemB, winner) {
            var params = {
                a: itemA,
                b: itemB,
                v: winner
            };
            console.log("play iteration");
            console.log(params);

            serviceApi.playGameIteration(params, function(response) {
                console.log("in api call game iteration");
                $scope.startNewGame();
            });
        }


        $scope.updateResults = function() {
            var params = {};
            console.log("play updateResults");
            serviceApi.getGameResults(params, function(response) {
                console.log("play updateResults => in call");
                console.log(response.data);
                console.log(response);
                $scope.gameResults = response.data.items;
                $scope.$apply();
            });
        }


        $scope.startNewGame();

});
