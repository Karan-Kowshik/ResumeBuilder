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
        }
        else {
            echo "wrong unique id";
        }
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
                        <h1 class="page__header__title">Successful</h1>
                        <p class="page__header__text">You are one step away from viewing your Resume!</p>
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
                        <h4><?php echo $fname ."\r". $lname; ?> you are a part of ResumeBuilder! Click on View Resume to see your Resume.</h4>
                        <a href="resume.php" class="button button__accent" style="margin-top: 50px;" name="view">View Resume</a>
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