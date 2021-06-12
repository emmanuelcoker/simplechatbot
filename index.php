<?php

require_once('dbconnect.php');

  session_start();
  if(!isset($_SESSION['username'])){
    header("Location: signin.php");
  }
  $id = $_SESSION['id'];
  $email = $_SESSION['email'];
  $username = $_SESSION['username'];


  $query = "SELECT * FROM messages";
  $result = mysqli_query($conn,$query);

  if(mysqli_num_rows($result) > 0){
     $row = mysqli_fetch_assoc($result);
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChatBox</title>   
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
 
  <!-- JQVMap -->
 
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  
</head>
<body style="background-image: url('images/bg-01.jpg');">
  <!--start container-->
  <div class="container-fluid" style="background: rgba(0,0,0,0.6);">
    
    <?php 
    include('navbar.php');
    ?>
  <div class="row w-100 d-flex justify-content-center align-items-center" style="height: 95vh;">

    <!-- DIRECT CHAT -->
       <div class="col-6 card direct-chat direct-chat-primary" style="height:90vh;">
              <div class="card-header">
                <h3 class="card-title">Direct Chat</h3>

                <div class="card-tools">
                  <span data-toggle="tooltip" title="3 New Messages" class="badge badge-primary">3</span>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                 
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body"  style="height:90vh;">

                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages" style="height:70vh;">
                    <?php 
                      while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                  <!-- Message. Default to the left -->
                    <?php if($username != $row['username']){
                     ?>
                  <div class="direct-chat-msg">
                    <div class="direct-chat-infos clearfix">
                    <span class="direct-chat-timestamp float-left">
                      <?php
                         echo date_format(date_create($row['created_at']),'D-M-h');
                      ?>
                      </span>
                      <br>
                      <span class="direct-chat-name float-left"> 
                      <?php
                          echo $row['username'];
                      ?>
                      </span>
                     
                    </div>
                    <!-- /.direct-chat-infos -->
                    <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text float-left">
                       <?php
                          echo $row['message'];
                      ?>
                    </div>
                    <!-- /.direct-chat-text -->
                  </div>
                  <?php }else {?>
                  
                  <!-- /.direct-chat-msg -->

                 
                  <!-- Message to the right -->
                  <div class="direct-chat-msg right">
                    <div class="direct-chat-infos clearfix">
                    <span class="direct-chat-timestamp float-right">
                      <?php
                         echo date_format(date_create($row['created_at']),'d-M-t');
                      ?>
                      </span>
                      <br>
                      <span class="direct-chat-name float-right">
                      <?php
                          echo $row['username'];
                      ?>
                      </span>
          
                    </div>
                    <!-- /.direct-chat-infos -->
                    <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text float-right">
                     <?php
                          echo $row['message'];
                      ?>
                    </div>
                    
                    <!-- /.direct-chat-text -->
                  </div>
                  <!-- /.direct-chat-msg -->
                  <?php }?>
                  <?php } ?>
                </div>
                <!--/.direct-chat-messages-->
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <form action="message.php" method="post">
                  <div class="input-group">
                    <input type="text" name="message" id="message" placeholder="Type Message ..." class="form-control">
                    <span class="input-group-append">
                      <button type="submit" class="btn btn-primary">Send</button>
                    </span>
                  </div>
                </form>
              </div>
              <!-- /.card-footer-->
            </div>
            <!--/.direct-chat -->
          </div>
  </div>
  
       


<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>