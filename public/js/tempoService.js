var app = angular.module('tempoService', []);

app.factory('TempoService', ['$http', function($http) {
	var api_v1 = 'api/v1/';
	return {

		get: function () {
			return $http.get(api_v1+'users');
		},

		updateSubscription: function(user_id) {			
			return $http.put(api_v1+'updateSubscription/'+user_id);
		}
	};
}]);