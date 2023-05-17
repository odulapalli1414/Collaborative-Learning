<!DOCTYPE html>
<head>
<meta charset="utf-8" />
<title>V-Meet | Dashboard</title>
<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="css/bootstrap-theme.min.css" rel="stylesheet" />
<link href="css/style.css" rel="stylesheet" />
<link href="css/styles.css" rel="stylesheet"/>
<script src="js/lumino.glyphs.js"></script>
</head>
<body>
<div class="nav main-header" id="top-navigation">
<div id="top-navigation-logo">
</div>
<div id="top-navigation-username">
<span id="my_profile_picture"></span>
<div id="dp_form_holder">
<form method="post" action="" enctype="multipart/form-data">
  <input type="file" name="file" id="file"/>
  <input type="submit" name="submit_file" id="submit_file"/>
</form>
</div>

<span style="color:white; margin-top:3px"><em>Welcome,&nbsp;</em></span>
<span style="margin-top:3px"><strong><?php echo ($_COOKIE["user_first_name"]); ?></strong></span>
</div>
</div>

<!-- End Of Top Bar -->

<div class="mycontainer">

	<!-- Side bar begins -->

    <div class="navigations">
        <ul class="lists">
            <li><a style="border-left:4px solid rgba(69, 162, 255, 0.93); border-radius:10px" href="Main_Dashboard.php"><img src="img/dashboard.png" class="navimg img-responsive"/><span class="nav-writting">Dashboard</span></a></li>
            <li><a href="General_Message/General_Message.php"><img src="img/chat-1.png" class="navimg img-responsive" /><span class="nav-writting">Public Chat</span></a></li>
            <li><a href="Private_Message/Private_Message.php"><img src="img/send-file.png" class="navimg img-responsive" /><span class="nav-writting">Private Chat</span></a></li>
            <li><a href="General_Share/General_Share.php"><img src="img/businessman.png" class="navimg img-responsive" /><span class="nav-writting">Public Share</span></a></li>
            <li><a href="Private_Share/Private_Share.php"><img src="img/remove-user.png" class="navimg img-responsive" /><span class="nav-writting">Private Share</span></a></li>
            <li><a href="General_announcement/general_announcement.php"><img src="img/log-file-format-1.png" class="navimg img-responsive" /><span class="nav-writting">General Announcements</span></a></li>
            <li onclick="Logout()"><a href="../index.php"><img src="img/logout.png" class="navimg img-responsive" /><span class="nav-writting">Logout</span></a></li>
        </ul>
    </div>

    <!-- Side Bar Ends Here -->


    <img src="Logo.jpg" style="
    height: 600px;
    width: 1123px;
">
  </div><!--/.row-->
 <?php

    if(isset($_POST["submit_file"])){

    $host = "localhost";
    $user = "root";
    $pass = "";
    $database = "solid";

    $selected_username = $_COOKIE["user_first_name"];

    move_uploaded_file($_FILES["file"]["tmp_name"],"Profile_Pictures/".$_FILES["file"]["name"]);

    $connection_String = mysqli_connect($host,$user,$pass,$database);

    $myfiles = $_FILES["file"]["name"];

    $update_profile_query = "UPDATE users_table SET Profile_Picture = '$myfiles' WHERE Username='$selected_username'";

    $execute_update_profile_query = mysqli_query($connection_String,$update_profile_query);

  }

  ?>


 <script src="js/jquery-3.1.1.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
   <script src="js/chart.min.js"></script>
  <script src="js/chart-data.js"></script>
  <script src="js/easypiechart.js"></script>
  <script src="js/easypiechart-data.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>

 <script type="text/javascript">
  function Logout(){
    $.get("Logout/Logout.php");
}
 </script>

 <script type="text/javascript">

 $(document).ready(function(){

  $("#my_profile_picture").load("Get_Profile_Picture.php");

  $(" #my_profile_picture").click(function(){
  $('#file').trigger("click");
});

  $("#file").change(function(){
    $("#submit_file").trigger("click");
  });

  $("#submit_file").click(function(){
      $(this).submit();
  });

  $("#submit_file").submit(function(){
    $("#my_profile_picture").load("Get_Profile_Picture.php");
  });

});
 </script>
</body>
</html>
