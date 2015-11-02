angular.module('index').config(['$routeProvider',
	function($routeProvider) {
		$routeProvider.
			when('/', {
				templateUrl: 'public/index/views/index.client.view.html'
				}).
			otherwise({
				redirectTo: '/'
				});
}]);


