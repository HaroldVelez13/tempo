var app = angular.module('tempoService', []);

app.factory('TempoService', ['$http', function($http) {
	var api_v1 = 'api/v1/';
	return {
/*		add: function (todoName) {
			var model = {
				TodoName: todoName
			}
			return $http.post(api_v1+'todos', model);
		},
		getAllCompletedTodos: function() {
			return $http.get(api_v1+'todos/completed');
		},
		getActiveTodos: function () {
			return $http.get(api_v1+'todos/active');
		},*/
		get: function () {
			return $http.get(api_v1+'users');
		},

		updateSubscription: function(user_id) {			
			return $http.put(api_v1+'updateSubscription/'+user_id);
		}
	};
}]);