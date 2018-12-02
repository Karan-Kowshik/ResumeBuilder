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
    $uid=$_SESSION['userid'];
    $query="select * from user where user_id = '$uid' ";
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)==1)
    {
        while($row=mysqli_fetch_assoc($result))
        {
            $fname=$row['fname'];
            $lname=$row['lname'];
            $email=$row['email'];
            $mobile=$row['mobile'];
        }
    }
    $query2 = "select * from info where u_id='$uid' ";
    $result2 = mysqli_query($conn,$query2);
    if(mysqli_num_rows($result2)==1)
    {
        while($row2=mysqli_fetch_assoc($result2))
        {
            $address1=$row2['address1'];
            $about=$row2['about'];
            $high_school=$row2['high_school'];
            $uni_ug=$row2['uni_ug'];
            $uni_pg=$row2['uni_pg'];
            $interns=$row2['interns'];
            $projects=$row2['projects'];
            $skills=$row2['skills'];
            $languages=$row2['languages'];
            $achievements=$row2['achievements'];
            $hobbies=$row2['hobbies'];
            $objectives=$row2['objectives'];
            $work_exp=$row2['work_exp'];

        }
    }
            
 
    session_destroy();
?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta class="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Resume Builder - Professional looking resume in minutes</title>
    <link rel='stylesheet' href='css/style.css' />
    <style type="text/css">
        @media print {
            .noprint {
                display: none;
            }
        }

        @media screen {
            .noprint {
                display: inline;
            }
        }
    </style>
</head>

<body>
    <!-- navbar -->
    <div class="navbar navbar--extended noprint">
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
    <div class="page__header noprint">
        <div class="hero__overlay"></div>
        <div class="page__header__inner">
            <div class="container">
                <div class="page__header__content">
                    <div class="page__header__content__inner" id='navConverter'>
                        <h1 class="page__header__title">Here's your resume</h1>
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
                        <h1 style="margin-bottom: 0px;"><?php echo $fname."\r".$lname; ?></h1>
                        <h5 style="margin-top: 0px;"><?php echo $email ."<br>". $mobile?><span style="margin-left: 40%;"><?php echo $address1 ?></span></h5>

                        <h2 style="margin-bottom: 0px;"><?php if(!empty($about)) echo "About"; ?></h2>
                        <p style="margin-top: 0px;"><?php if(!empty($about)) echo $about; ?></p>

                        <h2 style="margin-bottom: 0px;"><?php if(!empty($objectives)) echo "Objectives"; ?></h2>
                        <p style="margin-top: 0px;"><?php if(!empty($objectives)) echo $objectives; ?></p>

                        <h2 style="margin-bottom: 0px;">Education</h2>
                        <ul>
                            <?php if(!empty($high_school)){ echo "
                            <li>
                                <p style='margin-top: 0px;'>Highschool -<span>".$high_school."</span></p>
                            </li>"; } ?>
                            <?php if(!empty($uni_ug)){ echo "
                            <li>
                                <p style='margin-top: 0px;'>Undergraduation -<span>".$uni_ug."</span></p>
                            </li>"; } ?>
                            <?php if(!empty($uni_pg)){ echo "
                            <li>
                                <p style='margin-top: 0px;'>Postgraduation -<span>".$uni_pg."</span></p>
                            </li>"; } ?>
                        </ul>
                        <h2 style="margin-bottom: 0px;"><?php if(!empty($interns)) echo "Internships"; ?></h2>
                        <p style="margin-top: 0px;"><?php if(!empty($interns)) echo $interns; ?></p>
                        <!--<ul>
                            <li>
                                <p style="margin-top: 0px;">Internship name<br><span>Internship details</span></p>
                            </li>
                            <li>
                                <p style="margin-top: 0px;">Internship name<br><span>Internship details</span></p>
                            </li>
                            <li>
                                <p style="margin-top: 0px;">Internship name<br><span>Internship details</span></p>
                            </li>
                        </ul> -->
                        <h2 style="margin-bottom: 0px;"><?php if(!empty($projects)) echo "Projects"; ?></h2>
                        <p style="margin-top: 0px;"><?php if(!empty($projects)) echo $projects; ?></p>
                        <!--<ul>
                            <li>
                                <p style="margin-top: 0px;">Project name<br><span>Project details</span></p>
                            </li>
                            <li>
                                <p style="margin-top: 0px;">Project name<br><span>Project details</span></p>
                            </li>
                            <li>
                                <p style="margin-top: 0px;">Project name<br><span>Project details</span></p>
                            </li>
                        </ul> -->

                        <h2 style="margin-bottom: 0px;"><?php if(!empty($work_exp)) echo "Work Experiece"; ?></h2>
                        <p style="margin-top: 0px;"><?php if(!empty($work_exp)) echo $work_exp; ?></p>        

                        <h2 style="margin-bottom: 0px;"><?php if(!empty($skills)) echo "Skills"; ?></h2>
                        <p><?php if(!empty($skills)) echo $skills; ?></p>
                        <h2 style="margin-bottom: 0px;"><?php if(!empty($languages)) echo "Languages"; ?></h2>
                        <p><?php if(!empty($languages)) echo $languages; ?></p>
                        <h2 style="margin-bottom: 0px;"><?php if(!empty($achievements)) echo "Achievements and Honors"; ?></h2>
                        <p style="margin-top: 0px;"><?php if(!empty($achievements)) echo $achievements; ?></p>
                        <!--<ul>
                            <li>
                                <p style="margin-top: 0px;">First</span></p>
                            </li>
                            <li>
                                <p style="margin-top: 0px;">Second</span></p>
                            </li>
                            <li>
                                <p style="margin-top: 0px;">Third</span></p>
                            </li>
                        </ul> -->
                        <h2 style="margin-bottom: 0px;"><?php if(!empty($hobbies)) echo "Hobbies"; ?></h2>
                        <p><?php if(!empty($hobbies)) echo $hobbies; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="noprint">
            <div class="container">
                <div class="double">
                    <div class="half">
                        <a href='template.html' class="button">Re-create resume</a>
                    </div>
                    <div class="half">
                        <a href="javascript:window.print()" class="button">Download</a>
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