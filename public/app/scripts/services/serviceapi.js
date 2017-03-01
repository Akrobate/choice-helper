'use strict';

/**
 * @ngdoc service
 * @name choiceHelperApp.serviceapi
 * @description
 * # serviceapi
 * Service in the choiceHelperApp.
 */
angular.module('choiceHelperApp')

	.service('serviceApi', function () {
		// AngularJS will instantiate a singleton by calling "new" on this function
		//this.apiPath = "http://localhost/realtimejobbing/server/index.php";
		this.apiPath = "../../index.php";
		this.token = null;

		this.requestApi = function(query, callback) {
			var parent = this;

			if (this.token == null) {
				var tmp = angular.fromJson(sessionStorage.token);
				console.log(tmp);
				if (tmp != 'undefined') {
					this.token = tmp;
				}
			}

			query.token = this.token;

			$.ajax({
				url: this.apiPath,
				type:"POST",
				data: JSON.stringify(query),
				contentType:"application/json; charset=utf-8",
				dataType:"json",
				success: function(data) {
					if (parent.token != data.token) {
						sessionStorage.token = angular.toJson(data.token);
					}
					parent.token = data.token;
					return callback(data);
				}
			});
		};


	   	/**
		 *	Methode qui charge la liste des responses
		 *
		 */

		this.getGameItems = function(callback) {
			var query = {};
			query.module = 'game';
			query.action = 'getitems';
			var params = {};
			params.refused = true;
			query.params = params;
			this.requestApi(query, callback);
		};

	   	/**
		 *	Methode qui charge la liste des responses
		 *
		 */

		this.playGameIteration = function(params, callback) {
			var query = {};
			query.module = 'game';
			query.action = 'play';
            query.params = {};
			query.params.a = params.a;
			query.params.b = params.b;
			query.params.v = params.v;
			this.requestApi(query, callback);
		};

        /**
		 *
		 *
		 */

		this.getGameResults = function(params, callback) {
			var query = {};
			query.module = 'game';
			query.action = 'getresults';
            query.params = {};
			this.requestApi(query, callback);
		};
	});
