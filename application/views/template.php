<!DOCTYPE html>
<html>
    <head>
        <title><?= $title ?></title>
        <link rel="stylesheet" href="<?= base_url('public/css/bootstrap.min.css') ?>"/>
        <link rel="stylesheet" type="text/css" href="<?= base_url('public/css/homestyle.css')?>">
        <link rel="stylesheet" href="<?= base_url('public/css/style.css') ?>"/>
        <script src="<?= base_url('public/js/jquery.min.js') ?>"></script>
        <script src="<?= base_url('public/js/jquery-ui.js') ?>"></script>
        <script src="<?= base_url('public/js/bootstrap.min.js') ?>"></script>
        <script src="<?= base_url('public/js/angular.min.js') ?>"></script>
        <script src="<?= base_url('public/js/angular-route.min.js') ?>"></script>
    </head>
    <body>

        <?php $this->load->view($view); ?>


        <script src="<?= base_url('public/js/scripts.js')?>"></script>
        <script src="<?= base_url('public/js/signup.js') ?>"></script>
        <script src="<?= base_url('public/js/newsfeed.js') ?>"></script>
        <!-- <script src="<?= base_url('public/js/comment.js') ?>"></script> -->
        <script type="text/javascript">
              $(function() {
                $( "#search" ).autocomplete({
                  source: "/status_list/users"
                });
              });
        </script>
        <script type="text/javascript">

          $("#unfriend").click(function(){
            $.post("demo_test_post.asp",
              {
                id:"<?= $friend_but->id ?>"
              },
              function(data,status){
                alert("Data: " + data + "\nStatus: " + status);
              });
            });
          </script>

        <script type="text/javascript">

          $("#addfriend").click(function(){
            $.post("demo_test_post.asp",
              {
                id:"<?= $info->id ?>"
              },
              function(data,status){
                alert("Data: " + data + "\nStatus: " + status);
              });
            });
          </script>
          
        <script type="text/javascript">

          $("#cancelrequest").click(function(){
            $.post("demo_test_post.asp",
              {
                id:"<?= $friend_but->id ?>"
              },
              function(data,status){
                alert("Data: " + data + "\nStatus: " + status);
              });
            });
        </script>
    </body>
</html>