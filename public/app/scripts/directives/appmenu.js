angular.module('choiceHelperApp')
    .directive('appMenu', function() {
        return {
            template: `<ul class="nav nav-pills pull-right">
                          <li is-active="active"><a ng-href="#/">Home</a></li>
                          <li is-active="active"><a ng-href="#/game">Play</a></li>
                          <li is-active="active"><a ng-href="#/about">About</a></li>
                          <li is-active="active"><a ng-href="#/login">Login</a></li>
                          <li is-active="active"><a  ng-href="#/logout"><span class="glyphicon glyphicon-log-out"></span></a></li>

                          <li is-active="active" if-connected="hide" ><a style="color:black" ng-href="#/login"><span class="glyphicon glyphicon-log-in"></span></a></li>
                          <li is-active="active" if-connected="show" ><a  ng-href="#/logout"><span class="glyphicon glyphicon-log-out"></span></a></li>
                        </ul>
            `
        };
    });
