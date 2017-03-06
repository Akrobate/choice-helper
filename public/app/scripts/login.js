/**
 *	Mecanique d'authentification minimaliste
 *	@author Artiom FEDOROV
 *
 */

  connected = 'nop';

  var loginRequired = function($location, $q, $http, serviceApi) {
    var deferred = $q.defer();
	serviceApi.checkConnection(function(data) {
		if (data.data.connected == 'yes') {
		 console.log("USER AUTHENTIFICATED");
	            console.log(data);
	            connected = 'ok';
//	            scope.connected = connected;
		        deferred.resolve();
		} else {
			 console.log("USER DENIED");
              console.log(data);
              	connected = 'nop';
              		           // scope.connected = connected;
                deferred.reject();
		        $location.path('/about');
		}
	});
    return deferred.promise;
 }
