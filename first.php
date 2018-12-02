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
    if (isset($_POST['submit']))
    {
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $email=$_POST['email'];
        $mobile=$_POST['mobile'];

        $address1=$_POST['address1'];
        $about=$_POST['about'];
        $high_school=$_POST['high_school'];
        $uni_ug=$_POST['uni_ug'];
        $uni_pg=$_POST['uni_pg'];
        $interns=$_POST['interns'];
        $projects=$_POST['projects'];
        $skills=$_POST['skills'];
        $languages=$_POST['languages'];
        $achievements=$_POST['achievements'];
        $hobbies=$_POST['hobbies'];
        
        if(isset($_POST['email']) && !empty($email))
        {
            $query = "SELECT email from user where email='$email'";
            $result = mysqli_query($conn,$query);
            if(mysqli_num_rows($result)>=1)
            {
                while($row1=mysqli_fetch_assoc($result))
                {
                    $q = "select user_id from user where email='$email' ";
                    $r = mysqli_query($conn,$q);
                    if(mysqli_num_rows($r)>=1)
                    {
                        while($row2=mysqli_fetch_assoc($r))
                        {
                            $uniqueid = $row2["user_id"];
                            $q2 = "Update user set fname='$fname',lname='$lname',mobile='$mobile' where user_id='$uniqueid'  ";
                            $r2 = mysqli_query($conn,$q2);
                            $q3 = "Update info set address1 = '$address1', about='$about', high_school='$high_school', uni_ug='$uni_ug', uni_pg='$uni_pg', interns='$interns', projects='$projects', skills='$skills',languages='$languages', achievements='$achievements', hobbies='$hobbies' where u_id='$uniqueid' ";
                            $r3 = mysqli_query($conn,$q3);
                            $_SESSION["userid"]=$uniqueid;

                        }
                    }
                }
            }   
            if(mysqli_num_rows($result)==0)
            {    
                $query2 = "INSERT into user(user_id,fname,lname,email,mobile) values (UUID(),'$fname','$lname','$email','$mobile')";
                $result2 = mysqli_query($conn,$query2);

                //fetch the uuid corresponding to the email-id
                $query3 = "SELECT user_id FROM user where email='$email' ";
                $result3 = mysqli_query($conn,$query3);
                if (mysqli_num_rows($result3) == 1 ) 
                {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result3)) 
                    {
                        $uniqueid = $row["user_id"];
                        //echo "user id is: " . $row["user_id"]. "<br>". $uniqueid;

                        //populating table
                        $query4 = "INSERT into info(address1,about,high_school,uni_ug,uni_pg,interns,projects,skills,languages,achievements,hobbies,u_id) values ('$address1','$about','$high_school','$uni_ug','$uni_pg','$interns','$projects','$skills','$languages','$achievements','$hobbies','$uniqueid')";
                        $result4 = mysqli_query($conn,$query4);
                        $_SESSION["userid"]=$uniqueid;
                    }
                } 
                else 
                {
                    echo "more than 1";
                }
            }
        }
    }
    else
    {
        echo "Not inserted in to db(not clicked submit in form page -- student.html)";
    }
?>
 
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta class="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Resume Builder - Professional looking resume in minutes</title>
    <link rel='stylesheet' href='css/style.css' />
</head>

<body>
    <!-- navbar -->
    <div class="navbar navbar--extended">
        <nav class="nav__mobile"></nav>
        <div class="container">
            <div class="navbar__inner">
                <a href="index.html" class="navbar__logo">
                    <img src="./images/logo.png" width="30px;">
                </a>
                <nav class="navbar__menu">
                    <ul>
                        <li><a href="index.html#getstarted">Search resume</a></li>
                        <li><a href="template.html">Choose template</a></li>
                    </ul>
                </nav>
                <div class="navbar__menu-mob"><a href="" id='toggle'><svg role="img" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 448 512">
                            <path fill="currentColor" d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z"
                                class=""></path>
                        </svg></a></div>
            </div>
        </div>
    </div>
    <!-- Hero unit -->
    <div class="hero page__header">
        <div class="hero__overlay"></div>
        <div class="page__header__inner">
            <div class="container">
                <div class="page__header__content">
                    <div class="page__header__content__inner" id='navConverter'>
                        <h1 class="page__header__title">Note your Unique ID</h1>
                        <p class="page__header__text">Please make a note of your Unique ID and keep it somewhere safe. Your Unique ID will not be shown again!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="page">
        <div class="container">
            <div class="page__inner">
                <div class="page__main">
                    <div class="container">
                        <h4>Your Unique ID is: <?php echo $uniqueid; ?> <span name="uid"></span></h4>
                        <a href="studentresume.php" class="button button__accent" style="margin-top: 150px;">View Resume</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src='js/app.min.js'></script>
    <script>
    history.pushstate(null, null, location.href);
    window.onpopstate function()
    {
        history.go(1);
    };
    </script>
</body>
</html>