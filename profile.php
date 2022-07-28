<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/logo.css" rel="stylesheet">
    <link href="css/myprofile.css" rel="stylesheet">
    <title>alumni profile</title>
    <style>
      .alumni-detail{
          color:#fff;
          font-size:26px;
      }
      .detail-container{
          border:1px solid #fff;
          margin:5px;
          padding:5px;
          color:#fff;
      }
      .detail-container-tittle{
          font-size:18px;
          font-weight: blod;
          color:#fff;
      }
      
      .profile-container{
            position:relative;
            width:100%;
            height:auto;
        }
        .left-container,.right-container{
            position:relative;
            top:0;
            left:0;
            height:auto;
        }
        .left-container{
            text-align:center;
            padding:70px 10px 30px 10px;
            color:#fff;
            background-color: #007DC4;
        }
        .left-container .alumni-imgandname .alumni-image img{
            border-radius:50%;
        }
        .left-container .alumni-imgandname .alumni-name{
            font-size:20px;
            font-weight:bold;
            font-family: tahoma;
            margin-top:15px;
        }
        .contactwithalumni ul {
            list-style:none;
            padding:10px 20px;
            text-align:left;
            font-size:15px;
        }
        .contactwithalumni ul li{
            padding:4px;

        }
        .contactwithalumni ul li{
            padding:4px;

        }
        .contactwithalumni ul li i{
            margin-right:6px;
            color:#fff;
            text-transform: capitalize;
        }
        .right-container{
            padding:20px;
            background:#fff;
        }
        .alumni-details{
            padding:10px;
        }
        .alumni-details div{
            font-size:15px;
            padding:5px;
            text-transform: capitalize;
        }
        .alumni-details div span{
            margin-right: 3px;
            color:rgba(139, 127, 127, 0.315);
            font-weight: bold;
        }
  </style>
  </head>
<body class="main">
          <?php include './connectionandlinkfiles/alumnidetails.php'; ?>
    <div class="container-fluid" style="padding:0;margin:0;">
      <!--HOME-->
      <div class="row home" style="padding:0;margin:0">
       <div class="col-sm-12" STYLE="position: fixed;z-index: 11111;padding:0;margin:0;">
           <div class="contact-bar"  >
             <div class="dept-phone"><i class="fa-solid fa-phone"></i>0175-5136313</div>
             <h1 style="color:#007DC4; font-size:28px;font-weight:bold;margin-top:5px;">Alumni Tracking System(Department of Computer Science)</h1>
             <div class="dept-email"><i class="fa-solid fa-envelope"></i>dcs@gmail.com</div>
           </div>
           <nav class="navbar navbar-expand-lg navbar-light bg-light" border="none">
             <div class="container-fluid">
                 <img src="image/Logo.png" alt="" width="100" height="100" class="img-fluid">
               <a class="institute-name" href="#">Punjabi university,patiala</a>
               <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse menu_bar" id="navbarSupportedContent">
                 <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                   <li class="nav-item menu">
                     <a class="nav-link active menu_title" aria-current="page" href="profile.php?reg_id=<?php echo $alurow['REG_ID']; ?>">PROFILE</a>
                   </li>
                   <li class="nav-item menu">
                     <a class="nav-link active" aria-current="page" href="alumniedit.php?reg_id=<?php echo $alurow['REG_ID']; ?>">EDIT PROFILE</a>
                   </li>
                   
                   <li class="nav-item menu">
                     <a class="nav-link active" aria-current="page" href="alumnidelete.php?reg_id=<?php echo $alurow['REG_ID'] ?>">DELECT ACCOUNT</a>
                   </li>
                 </ul>
                 <form class="d-flex">
                   <a href="index.php"   class="btn btn-outline-primary loign-btn" onclick="displayloginbox();" type="button">LOG OUT</a>
                 </form>
                 </div>
             </div>  
           </nav>
       </div>       
        <div class="row background_covered" style="position:relative;padding:0;margin:0;text-transform: capitalize;">
        <div class="row profile-container" style="height:100vh;width:100%;">
            <div class="col-sm-3 left-container" border="1">
                <div class="alumni-imgandname">
                    <div class=alumni-image>
                        <img src="<?php echo $alurow["ALUMNI_IMAGE"]; ?>" width="200" height="200" alt="">
                    </div>
                    <div class="alumni-name"><?php echo strtolower($alurow["F_NAME"]); ?> <?php echo strtolower($alurow["M_NAME"]); ?> <?php echo strtolower($alurow["L_NAME"]); ?></div>                
                </div>
                <div class="contactwithalumni">
                    <ul>
                        <li><i class="fa-solid fa-phone"></i><?php echo $alurow["PHONE"]; ?></li>
                        <li><i class="fa-solid fa-envelope"></i><?php echo strtolower($alurow["EMAIL_ID"]); ?></li>
                        <li><i class="fa-brands fa-linkedin"></i><?php echo $alurow["LINKEDIN_ID"]; ?></li>
                        <li><i class="fa-solid fa-location-dot"></i><?php echo $alurow["HOME_STREETNO"]; ?> <?php echo $alurow["HOME_STREETNAME"]; ?> <?php echo $alurow["HOME_APARTMENT"]; ?> <?php echo $adrow["CITY"]; ?> <?php echo $adrow["STATE"]; ?> <?php echo $adrow["ZIPCODE"]; ?></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-9 right-container" border="1">
                <div class="job-position">
                    <h3><?php echo $jbrow["JOB_POSITION"]; ?></h3>
                </div>
                <div class="alumni-personal-details alumni-details row">
                    <div class="col-sm-6"><SPAN>></SPAN>Data Of Birth: <?php echo $alurow["DATE_OF_BIRTH"]; ?> </div>
                    <div class="col-sm-6"><SPAN>></SPAN>Age : <?php echo $alumniage['AGE']; ?></div>
                </div>
                <hr>
                <div class="alumni-qualification-details alumni-details row">
                    <div class="col-sm-12">QUALIFICATION:</div>
                    <div class="col-sm-6"><SPAN>></SPAN>Course: <?php echo $courow["COURSE_NAME"]; ?></div>
                    <div class="col-sm-6"><SPAN>></SPAN>Batch: <?php echo $strow["BATCH"]; ?></div>
                    <div class="col-sm-6"><SPAN>></SPAN>CGPA: <?php echo $strow["CGPA"]; ?></div>
                </div>
                <hr>
                <div class="alumni-job-details alumni-details row">
                    <div class="col-sm-12">JOB DETAILS:</div>
                    <div class="col-sm-6"><SPAN>></SPAN>Organization:  <?php echo $jbrow["ORG_NAME"]; ?> </div>
                    <div class="col-sm-6"><SPAN>></SPAN>Job Position:  <?php echo $jbrow["JOB_POSITION"]; ?> </div>
                    <div class="col-sm-6"><SPAN>></SPAN>Salary: <?php echo $jbrow["SALARY"]; ?></div>
                    <div class="col-sm-6"><SPAN>></SPAN>Date of join: <?php echo $jbrow["DATE_OF_JOINING"]; ?></div>
                    <div class="col-sm-6"><SPAN>></SPAN>Locataion: <?php echo $cadrow["CITY"]; ?> <?php echo $cadrow["STATE"]; ?> <?php echo $cadrow["ZIPCODE"]; ?></div>
                </div>
                <hr>
                <?php
                include './connectionandlinkfiles/experiencedetails.php';
                ?>
                
            </div>
        </div>
        </div>    
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/2bcfa3ed68.js" crossorigin="anonymous"></script>   
</html>

 