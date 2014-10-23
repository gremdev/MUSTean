var newsfeed = angular.module('newsfeed', ['ngRoute']);


newsfeed.controller('newsfeedController',function($scope,$http){
     var getPosts = function(){
        $http.get('/status_list/newsfeed_gen').success(function(data){
                $scope.posts = data;
                console.log(data);
        }); 
    }
    getPosts();

    $scope.like = function(id) {
     	$http({
				method: "POST",
				url: '/status_list/like/'+ id,
				headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
				data: $.param(id)
				})
				.success(function(data){
					console.log(data);
					getPosts();

				})
				.error(function(data){
					console.log(data);
				});
    }

});