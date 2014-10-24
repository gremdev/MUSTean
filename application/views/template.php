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

<?php
if (isset($is_friend) && $is_friend == 1) {
  echo '
    <script>
        $("#addfriend").hide();
        $("#cancelrequest").hide();
        $("#unfriend").show();
        $("#accept").hide();
    </script>
  ';
}
elseif (isset($is_friend) && $is_friend == 2) {
  echo '
  <script>
        $("#addfriend").hide();
        $("#unfriend").hide();
        $("#cancelrequest").show();
        $("#accept").hide();
  </script>
  ';
}
elseif (isset($is_friend) && $is_friend == 3) {
  echo '
  <script>
        $("#addfriend").hide();
        $("#unfriend").hide();
        $("#cancelrequest").hide();
        $("#accept").show();
  </script>
  ';
}
else{
  echo '
  <script>
        $("#cancelrequest").hide();
        $("#unfriend").hide();
        $("#addfriend").show();
        $("#accept").hide();
  </script>
  ';
}
?>

        <script type="text/javascript">

          $("#unfriend").click(function(){
            $.post("/cancel_or_unfriend/<?= $this->uri->segment(1) ?>",
              function(data,status){
                if (data == 'ok') {
                  alert(data +  "unfriend");
                  $('#unfriend').hide();
                  $('#addfriend').show();
                  $('#cancelrequest').hide();
                };
              });
            });

          $("#accept").click(function(){
            $.post("/accept/<?= $this->uri->segment(1) ?>",
              function(data,status){
                if (data == 'ok') {
                  alert(data +  "accept");
                  $('#unfriend').show();
                  $('#addfriend').hide();
                  $('#cancelrequest').hide();
                  $('#accept').hide();
                };
              });
            });


          $("#cancelrequest").click(function(){
            $.post("/cancel_or_unfriend/<?= $this->uri->segment(1) ?>",
              function(data,status){
                if (data == 'ok') {
                  $('#addfriend').show();
                  $('#cancelrequest').hide();
                  $('#unfriend').hide();
                };
              });
            });


          $("#addfriend").click(function(){
            $.post("/addfriend/<?= $this->uri->segment(1) ?>",
              function(data,status){
                  $('#addfriend').hide();
                  $('#cancelrequest').show();
                  $('#unfriend').hide();
              });
            });

        </script>

    </body>
</html>