<div class="wrapper newsfeed">
    <div class="box">
        <div class="row row-offcanvas row-offcanvas-left">
                      
          
            <!-- sidebar -->
            <div class="column col-sm-2 col-xs-1 sidebar-offcanvas" id="sidebar">
              
                <ul class="nav">
                <li><a href="#" data-toggle="offcanvas" class="visible-xs text-center"><i class="glyphicon glyphicon-chevron-right"></i></a></li>
              </ul>
                 <a href="<?= base_url($this->username) ?>">
                    <img style="width:200px;height:200px;margin-top:-5px;border-radius:100px;" src="<?= base_url($info->profile_pic) ?>">
                    <h3><?= $info->fullname ?></h3>
                </a>
                <ul class="nav hidden-xs" id="lg-menu">
                    <li><a href="<?= base_url($this->username . '/edit'); ?>"><i class="glyphicon glyphicon-edit"> </i>&nbsp; Edit Profile</a></li>
                    <li class="active"><a href="<?= base_url() ?>"><i class="glyphicon glyphicon-list-alt"> </i>&nbsp; Newsfeed</a></li>
                    <li><a href="<?= base_url($this->username . '/messages') ?>"><i class="glyphicon glyphicon-comment"> </i>&nbsp; Messages</a></li>
                    <li><a href="<?= base_url($this->username . '/photos') ?>"><i class="glyphicon glyphicon-picture"> </i>&nbsp; Photos</a></li>
                    <li><a href="<?= base_url($this->username . '/friends') ?>"><i class="glyphicon glyphicon-user"> </i>&nbsp; Friends</a></li>
                    <li><a href="#"><i class="glyphicon glyphicon-pencil"> </i>&nbsp; New Blog Entry</a></li>
                </ul>
                <ul class="list-unstyled hidden-xs" id="sidebar-footer">
                    <li><a href="<?= base_url() ?>"><i class="glyphicon glyphicon-arrow-left"></i> Back to newsfeed</a></li>
                </ul>

            </div>
            <!-- /sidebar -->
          
            <!-- main right col -->
            <div class="column col-sm-10 col-xs-11" id="main">
                
                <!-- top nav -->
                <div class="navbar navbar-blue navbar-static-top">  
                    <div class="navbar-header">
                      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle</span>
                        <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                      </button>
                      <a href="<?= base_url() ?>" class="navbar-brand logo"><img src="<?= base_url('public/img/must-small.png') ?>" style="margin-top:-2px;margin-left:-2px;"></a>
                    </div>
                    <nav class="collapse navbar-collapse" role="navigation">
                    <div class="navbar-form navbar-left">
                        <form class="ui-widget input-group input-group-sm searching" method="GET" action="<?= base_url() ?>">
                          <input type="text" class="form-control" name="search" placeholder="Search username" id="search" style="min-width:360px;">
                          <!-- <div class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                          </div> -->
                        </form>
                    </div>
                    <ul class="nav navbar-nav">
                      <li>
                        <a href="<?= base_url() ?>"><i class="glyphicon glyphicon-home"></i> Home</a>
                      </li>
                      <li>
                        <a href="<?= base_url() ?>#postModal" role="button" data-toggle="modal"><i class="glyphicon glyphicon-plus"></i> Status</a>
                      </li>
                      <li>
                        <a href="<?= base_url() . $this->username; ?>"><i class="glyphicon glyphicon-user"></i> Profile</a>
                      </li>
                      <li>
                        <a href="#friendsModal" role="button" data-toggle="modal"><i class="glyphicon glyphicon-heart"></i> &nbsp;<span class="label label-danger"><?php if ($count > 0) {
                          echo $count;
                        } ?></span></a>
                      </li>
                      <li>
                        <a href="#messageModal" role="button" data-toggle="modal"><i class="glyphicon glyphicon-comment"></i> &nbsp;<span class="label label-danger"> +35</span></a>
                      </li>
                      <li>
                        <a href="#notifModal" role="button" data-toggle="modal"><i class="glyphicon glyphicon-globe"></i> &nbsp;<span class="label label-danger"> +35</span></a>
                      </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-cog"></i></a>
                        <ul class="dropdown-menu">
                          <li><a href="<?= base_url($this->username . '/edit'); ?>"><i class="glyphicon glyphicon-edit"></i> &nbsp;Edit Profile</a></li>
                          <li><a href="<?= base_url('logout') ?>"><i class="glyphicon glyphicon-log-out"></i> &nbsp;Logout</a></li>
                        </ul>
                      </li>
                    </ul>
                    </nav>
                </div>
                <!-- /top nav -->
              
                <div class="padding">
                    <div class="full col-sm-9">
                        <!-- content -->                      
                        <div class="row">
                        
                          <div class="col-sm-2"> </div>
                          <!-- main col right -->
                          <div class="col-sm-8">
<?php
if (isset($_GET['error_post'])) {
  echo "<span class=\"error_post\">There's something error in your post. <a href='". base_url('#postModal') . "' role=\"button\" data-toggle=\"modal\">Please try again.</a><br/><br/></span>";
}
?>
              <div ng-app="comment" ng-controller="commentController">
          <div class="panel panel-default">
            <div class="panel-heading"><div class="pull-right" style="padding-top:13px"><?= $post->date_posted ?></div> 
                <a href="<?= base_url($post->username)?>">
                    <h4><img src="<?= base_url($post->profile_pic) ?>" style="max-width=:30px;max-height:30px;"/> <?= $post->fullname ?></h4>
                </a>
            </div>
            <form ng-submit="signup()" method="POST">
            <div class="panel-body">
            <?php if(!empty($post->photo) == true) { ?>
                <div align="center">
                  <img src="/public/uploads/<?= $post->photo ?>" style="margin-bottom:10px;max-width:618px;max-height:500px;">
                </div>
            <?php } ?>
                    <?= $post->body ?>     
                <div ng-repeat="comment in comments">
                  <hr>
                  <a href="<?= base_url() ?>{{comment.username}}">
                  <img src="<?= base_url('{{comment.profile_pic}}') ?>" style="max-width=:30px;max-height:30px;"/>
                  {{comment.fullname}}
                  </a>
                  <p><br/>{{comment.comment}}</p>
                </div>
              <div class="input-group">
                    <input type="text" id="comment" class="form-control" placeholder="Add a comment.." name="comment" ng-model="comm.comment">
                    <div class="input-group-btn">
                        <button class="btn btn-default" data-ng-click="newcomment()">Post comment</button>
                    </div>
              </div>
              </div>
              </form>
            </div>
          </div>
                          </div>
                       </div><!--/row-->
                      
                      <hr>
                      
                      <h5 class="text-center">
                      <a href="<?= base_url() ?>">MUSTean &copy; Copyright <?= date('Y') ?></a>
                      </h5>
                        
                      <hr>
                        
                      
                    </div><!-- /col-9 -->
                </div><!-- /padding -->
            </div>
            <!-- /main -->
          
        </div>
    </div>


<!--post modal-->
<div id="postModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
    <?php echo  form_open_multipart('submit/post'); ?>

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        Update Status
        </div>
        <div class="modal-body">
            <div class="form center-block">
              <div class="form-group">
                <textarea name="body" class="form-control input-lg" autofocus="" placeholder="What do you want to share?"></textarea>
              </div>
            </div>
        </div>
        <div class="modal-footer">
            <div>
            <button class="btn btn-primary btn-sm" type="submit">Post</button>
              <ul class="pull-left list-inline">
                  <input type="file" name="userfile" size="20" />
                  <input type="hidden" name="url" value="<?= current_url() ?>"> 
              </ul>
            </div>  
        </div>
      </form>
  </div>
  </div>
</div>


<!--friends modal-->
<div id="friendsModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
      Friend Requests
      </div>
      <div class="modal-body">
          
            <div class="form-group" align="center"><br/>
<?php foreach ($friends as $friend) { ?>
  <h4>
    <a href="<?= base_url($friend->username) ?>"><?= $friend->fullname ?></a>
    <button class="btn btn-primary">Accept</button>
    <button class="btn btn-danger">Deny</button><br/>
  </h4>
<?php } ?>
            </div>
          
      </div>
      <div class="modal-footer">  
      </div>
  </div>
  </div>
</div>


</div> <!-- end newsfeed -->

<script>

var comment = angular.module('comment', []);


comment.controller('commentController',function($scope,$http){
     var getComments = function(){
        $http.get('/status_list/comment_gen/<?= $post->id ?>').success(function(data){
                $scope.comments = data;
                console.log(data);
        }); 
    }
    getComments();

    $scope.newcomment = function() {
      $http({
        method: "POST",
        url: '/status_list/comment_new/<?= $post->id ?>',
        headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
        data: $.param($scope.comm.comment)
        })
        .success(function(data){
          $('#comment').val('');
          console.log(data);
          getComments();
        })
        .error(function(data){
          console.log(data);
        });
    }

});

</script>