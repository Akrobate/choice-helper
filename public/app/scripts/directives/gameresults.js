/*
angular.module('directiveControlDemo', [])

.controller('MainCtrl', function($scope) {
  $scope.focusinControl = {};
})

.directive('focusin', function factory() {
  return {
    restrict: 'E',
    replace: true,
    template: '<div>A:{{internalControl}}</div>',
    scope: {
      control: '='
    },
    link: function(scope, element, attrs) {
      scope.internalControl = scope.control || {};
      scope.internalControl.takenTablets = 0;
      scope.internalControl.takeTablet = function() {
        scope.internalControl.takenTablets += 1;
      }
    }
  };
});

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.23/angular.min.js"></script>
<div ng-app="directiveControlDemo">
  <div ng-controller="MainCtrl">
    <button ng-click="focusinControl.takeTablet()">Call directive function</button>
    <p>
      <b>In controller scope:</b>
      {{focusinControl}}
    </p>
    <p>
      <b>In directive scope:</b>
      <focusin control="focusinControl"></focusin>
    </p>
    <p>
      <b>Without control object:</b>
      <focusin></focusin>
    </p>
  </div>
</div>


*/
