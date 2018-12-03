<?php
    session_start();
    $dbhost = "localhost"; 
    $dbuser = "root";
    $dbpass = "";
    $dbname = "resume";
    $conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
    if(mysqli_connect_errno()){
        die("Database connection failed ".mysqli_connect_error()."(".mysqli_connect_errno().")");
    }
    if (isset($_POST['search']) && !empty($_POST['uid']))
    {
        $uid=$_POST['uid'];
        $query="SELECT user_id,fname,lname from user where user_id='$uid'";
        $result=mysqli_query($conn,$query);
        if(mysqli_num_rows($result)==1)
        {
            while($row=mysqli_fetch_assoc($result))
            {
                $uniqueid = $row["user_id"];
                $fname=$row["fname"];
                $lname=$row["lname"];
                $_SESSION['userid']=$uniqueid;
            }
            include 'success.html';
        }
        else {
            include 'failure.html';
            // echo '<script language="javascript">';
            // echo 'alert("ID does not exist!")';
            // echo '</script>';
        }
    }
?>