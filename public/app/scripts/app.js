'use strict';

/**
 * @ngdoc overview
 * @name choiceHelperApp
 * @description
 * # choiceHelperApp
 *
 * Main module of the application.
 */

angular
  .module('choiceHelperApp', [
    'ngAnimate',
    'ngCookies',
    'ngResource',
    'ngRoute',
    'ngSanitize',
    'ngTouch'
  ])
  .config(function ($routeProvider) {
    $routeProvider
      .when('/', {
        templateUrl: 'views/main.html',
        controller: 'MainCtrl'
      })
      .when('/about', {
        templateUrl: 'views/about.html',
        controller: 'AboutCtrl',
        resolve: { loginRequired: loginRequired }
      })
      .when('/game', {
        templateUrl: 'views/game.html',
        controller: 'GameCtrl'
      })
      .when('/login', {
        templateUrl: 'views/login.html',
        controller: 'LoginCtrl'
    })
    .when('/logout', {
        templateUrl: 'views/logout.html',
        controller: 'LogoutCtrl'
    })
    .when('/collections', {
        templateUrl: 'views/collections.html',
        controller: 'CollectionsCtrl',
        resolve: { loginRequired: loginRequired }
    })
      .otherwise({
        redirectTo: '/'
      });
  });

// resolve: { loginRequired: loginRequired }
