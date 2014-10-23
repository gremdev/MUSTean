var comment = angular.module('comment', []);


comment.controller('commentController',function($scope,$http){
     var getComments = function(){
        $http.get('/status_list/comment_gen').success(function(data){
                $scope.posts = data;
                console.log(data);
        }); 
    }
    getComments();

    $scope.like = function(id) {
     	$http({
				method: "POST",
				url: '/status_list/like/'+ id,
				headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
				data: $.param(id)
				})
				.success(function(data){
					console.log(data);
					getComments();

				})
				.error(function(data){
					console.log(data);
				});
    }

});