	var signup = angular.module('signup',[]);

	signup.controller('signupController',function($scope,$http){
		
		$scope.user = {};
		// check if username contains alphanumeric with optional 1 dot (must not be in the beginning/end).
		$scope.word = /^[a-zA-Z0-9]+(?:\.[a-zA-Z0-9]+)?$/;

		//console.log($scope.username);
		
		$scope.signup = function(){

				if ($scope.user.username) {
					$http({
					method: "POST",
					url: 'http://localhost/must_sns/auth/register/validategfhfgh/username',
					headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
					data: $.param($scope.user.username)
					})
					.success(function(data){
						$scope.existUsername = false;
						console.log(data["status"]);
						if (data["status"] == "ok") {
							$scope.existUsername = false;
						}else{
							$scope.existUsername = true;
							$scope.signupForm.$valid = false;
						};

					})
					.error(function(data){
						console.log(data);
						$scope.existUsername = true;
						$scope.signupForm.$valid = false;
					});
				};

				if ($scope.user.email) {
					$http({
					method: "POST",
					url: 'http://localhost/must_sns/auth/register/validate/email',
					headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
					data: $.param($scope.user.email)
					})
					.success(function(data){
						$scope.existEmail = false;
						console.log(data["status"]);
						if (data["status"] == "ok") {
							$scope.existEmail = false;
						}else{
							$scope.existEmail = true;
							$scope.signupForm.$valid = false;
						};

					})
					.error(function(data){
						console.log(data);
						$scope.existEmail = true;
						$scope.signupForm.$valid = false;
					});
				};

				if ($scope.signupForm.$valid) {
					$http({
					method: "POST",
					url: 'http://localhost/must_sns/auth/register/regdata',
					headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
					data: $.param($scope.user)
					})
					.success(function(data){
						console.log(data);
						$scope.invalidCredentials = false;
						if (data["status"] == "ok") {
							window.location="http://localhost/must_sns/login";
						}else{
							//$scope.existUsername = true;
							$scope.signupForm.$valid = false;
						};

					})
					.error(function(data){
						$scope.invalidCredentials = true;
						console.log("Invalid Data ...");
						console.log(data);
					});
					
				};
			
		}
	});
