<?php  
    if(isset($_POST["submit"])){  
      
    if(!empty($_POST['user']) && !empty($_POST['pass'])) {  
        $user=$_POST['user'];  
        $pass=$_POST['pass'];  
      
        $con=mysql_connect('localhost','root','') or die(mysql_error());  
        mysql_select_db('mysql') or die("cannot select DB");  
      
        $query=mysql_query("SELECT * FROM admin WHERE username='".$user."' AND password='".$pass."'");  
        $numrows=mysql_num_rows($query);  
        if($numrows!=0)  
        {  
        while($row=mysql_fetch_assoc($query))  
        {  
        $dbusername=$row['username'];  
        $dbpassword=$row['password'];  
        }  
      
        if($user == $dbusername && $pass == $dbpassword)  
        {  
        session_start();  
        $_SESSION['sess_user']=$user;  
      
        /* Redirect browser */  
        header("Location: admin_page.php");  
        }  
        } else {  
        $error_message = "Invalid username or password!";  
        }  
      
    } else {  
        $error_message = "All fields are required!";  
    }  
    }  
    ?>  


<!DOCTYPE html>	
<html lang="en">
<head>	
<meta charset="utf-8">	
<meta http-equiv="X-UA-Compatible" content="IE=edge">	
<meta name="viewport" content="width=device-width, initial-
scale=1">	
<title>Hostel Management System Home page</title>	
	
<!-- Bootstrap -->	
<link href="css/bootstrap.min.css" rel="stylesheet">	
	
<!-- HTML5 Shim and Respond.js IE8 support of HTML5
elements and media queries -->	
<!-- WARNING: Respond.js doesn't work if you view the
page via file:// -->	
<!--[if lt IE 9]>	
<script src="https://oss.maxcdn.com/libs/html5shiv/
3.7.0/html5shiv.js"></script>	
<script src="https://oss.maxcdn.com/libs/respond.js/
1.4.2/respond.min.js"></script>	
<![endif]-->	
	
<style>	
	

.navbar-brand{
      font-size:1.8em;

}	

.error-message {
	padding: 7px 10px;
	background: #fff1f2;
	border: #ffd5da 1px solid;
	color: #d6001c;
	border-radius: 10px;
        width: 100%;
}

#topContainer{
       background-image:url("images/7.jpg");
       height:500px;
       width:100%;
       background-size:cover;      /*  FOR FULL IMAGE TO BE DISPLAYED NOT JUST PART OF IT  */   
}

#topRow{
      margin-top:100px;
      text-align:center;
      
}

#topRow h1{
     font-size:250%;
     color:#000000;
     padding-top:40px;

}

.bold{
    font-weight:bold;

}
	
.margintop{
     margin-top:30px;
     

}
.center{
      text-align:center;


}
.title{
    margin-top:100px;
    font-size:300%;

}
#footer{
     background-color:#B0D1FB;
     padding-top:70px;
     width:100%;

}
.marginbottom{
    margin-bottom:30px;

}

.appstoreimage{
    width:250px;

}
</style>	
</head>	
<body>	

   <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand">NIT RAIPUR</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">	
	
                 <li class="active"><a href="#home">Home</a></li>	
	
              
	          <li><a href="about_us.php">About</a></li>	
	          <li><a href="contact.php">Contact Us</a></li>
                  <li><a href="faqs.php">FAQs</a></li>	
                  
	
         </ul>	
         
          
        </div>
      </div>
    </nav>

<div class="container contentContainer" id="topContainer">

     <div class="row">

          <div class="col-md-6 col-md-offset-3" id="topRow">     <!-- COL-MD-OFFSET MOVES TO CENTRE AS 3 WILL MOVE COL-MD-6 TO 3 COLUMNS SO TO CENTRE  -->
          <h1 class="margintop" "><strong>HOSTEL MANAGEMENT SYSTEM</strong></h1>

          <p><input type="button" class="btn btn-primary" value="Admin Login" onclick="location.href = 'admin_login.php'">
<input type="button" class="btn btn-primary" value="REGISTER" onclick="location.href = 'registration_form.php'">
<input type="button" class="btn btn-primary" value="Students Login" onclick="location.href = 'project_login.php'"></p>
          
            <form class="margintop" action="" method="POST">
              <div class="form-group">
                   <input type="email" placeholder="Email" name="user" class="form-control" />
              </div>
              <div class="form-group">
                   <input type="password" placeholder="Password" name="pass" class="form-control" />
              </div>
              
              <input type="submit" value="Login" name="submit" />
              
          </form>

         <br>
         <?php if(!empty($error_message)) { ?>	
<div class="error-message"><?php if(isset($error_message)) echo $error_message; ?></div>
<?php } ?>
          
          
        </div>
      </div>
         </div>

     </div>
</div>


   
   
	
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/
jquery.min.js"></script>	
<!-- Include all compiled plugins (below), or include individual files
as needed -->	
<script src="js/bootstrap.min.js"></script>	

<script>

      $(".contentContainer").css("min-height",$(window).height());  /*  FOR Content CONTAINER HEIGHT TO BE SET TO FULL WINDOW HEIGHT  */
/* if height of device is smaller then height--> min-height        */


</script>



</body>	
</html>
