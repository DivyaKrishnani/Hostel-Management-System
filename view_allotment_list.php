
    <html>  
    <head lang="en">  
        <meta charset="UTF-8">  
        <link type="text/css" rel="stylesheet" href="bootstrap-3.2.0-dist\css\bootstrap.css"> <!--css file link in bootstrap folder-->  
        <title>View Users</title>  
      <!-- Bootstrap -->	
<link href="css/bootstrap.min.css" rel="stylesheet">	
	
    </head>  
    <meta name="viewport" content="width=device-width, initial-scale=1">
 <div class="panel panel-primary" style="color:#26aae1;">
	   <div class="panel-heading" style="background:#d3eef9; text-align:center;font-weight:bold;font-size:30px;"><i class="fa fa-bars" style="background:#26aae1;color:white; " aria-hidden="true"></i> Allotment List</div>
      <br>
    <body>  
      
    <div class="table-scrol">  
         
      
    <div class="table-responsive">
      
        <table class="table table-bordered table-hover table-striped" style="table-layout: fixed">  
           

<thead style="background:#26aae1;"><tr class="tableizer-firstrow"><th>Room no.</th><th>User Name </th><th>First Name </th><th>Last Name </th><th>EmailId</th></tr></thead>
      
            <?php  
            include("Db_conection.php");  
            $view_users_query="select * from registered_users";//select query for viewing users.  
            $run=mysqli_query($dbcon,$view_users_query);//here run the sql query.  
      
            while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.  
            {  
                $user_id=$row[0];  
                $user_name=$row[1];  
                $user_first=$row[2];
                $user_last=$row[3];
                $user_email=$row[5]; 
                
      
      
            ?>  
      
            <tr>  
    <!--here showing results in the table -->  
                <td><?php echo $user_id;  ?></td>  
                <td><?php echo $user_name;  ?></td>  
                <td><?php echo $user_first;  ?></td>  
                <td><?php echo $user_last;  ?></td> 
                <td><?php echo $user_email;  ?></td>  
                <td><a href="delete.php?del=<?php echo $user_id ?>"><button type="button" class="btn btn-info">Delete</button></a></td> <!--btn btn-danger is a bootstrap button to show danger-->  
            </tr>  
      
            <?php } ?>  
      
        </table>  
            </div>  

<p><input type="button" class="btn btn-primary" value="Back" onclick="location.href = 'admin_page.php'"></p>
    </div>  
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/
jquery.min.js"></script>	
<!-- Include all compiled plugins (below), or include individual files
as needed -->	
<script src="js/bootstrap.min.js"></script>
      
    </body>  
      
    </html>  

