<?php
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "resume";
    $conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
    if(mysqli_connect_errno()){
        die("Database connection failed ".mysqli_connect_error()."(".mysqli_connect_errno().")");
    }
    if (isset($_POST['submit'])){
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $email=$_POST['email'];
        $mobile=$_POST['mobile'];

        $address1=$_POST['address1'];
        $address2=$_POST['address2'];
        $about=$_POST['about'];
        $high_school=$_POST['high_school'];
        $uni_ug=$_POST['uni_ug'];
        $uni_pg=$_POST['uni_pg'];
        $interns=$_POST['interns'];
        $skills=$_POST['skills'];
        $languages=$_POST['languages'];
        $achievements=$_POST['achievements'];
        $hobbies=$_POST['hobbies'];
        echo 'Ok! You are now a part of ResumeBuilder!!!';
        
        //check if email is entered or not, if yes then insert data in to user table
        if(isset($_POST['email']) && !empty($email)){
            $query = "INSERT into user(user_id,fname,lname,email,mobile) values (UUID(),'$fname','$lname','$email','$mobile')";
            $result = mysqli_query($conn,$query);

            //if email already exists
           /* $query2 = "SELECT email from user where email='$email' ";
            $result2 = mysqli_connect($conn,$query2);
            if(mysqli_num_rows($result2) > 0){
                echo 'email-id already exists!';
            }*/
            //else{    

                //fetch the uuid corresponding to the email-id
                $query3 = "SELECT user_id FROM user where email='$email' ";
                $result3 = mysqli_query($conn,$query3);
                if (mysqli_num_rows($result3) == 1 ) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result3)) {
                        $uniqueid = $row["user_id"];
                        echo "user id is: " . $row["user_id"]. "<br>". $uniqueid;

                        //populating table
                        $query4 = "INSERT into info(address1,address2,about,high_school,uni_ug,uni_pg,interns,skills,languages,achievements,hobbies,u_id) values ('$address1','$address2','$about','$high_school','$uni_ug','$uni_pg','$interns','$skills','$languages','$achievements','$hobbies','$uniqueid')";
                      // $query4 = "INSERT into info(address1,about,u_id) values ('$address1','$about','$uniqueid')";
                       $result4 = mysqli_query($conn,$query4);
                    }
                } 
                else {
                    echo "more than 1";
                }
            //}    
        }
    }
    else{
         echo "damn!";
    }      
        
?>