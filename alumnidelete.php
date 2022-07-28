<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/logo.css" rel="stylesheet">
    <link href="css/myprofile.css" rel="stylesheet">
    <title>alumni delete</title>
    <style>
      .delete-alumni-container
        {
            position: relative;
            top:0;
            left:0;
            width:100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
      </style>
  </head>
<body class="main">
    <?php include './connectionandlinkfiles/alumnidetails.php' ?>
    <div class="container-fluid" style="padding:0px;margin:0;">
      <!--HOME-->
      <div class="row home">
            <div class="row col-sm-12" STYLE="position: fixed;margin:0;padding:0;z-index: 11111;">
                <div class="contact-bar"  >
                    <div class="dept-phone"><i class="fa-solid fa-phone"></i>0175-5136313</div>
                    <h1 style="color:#007DC4; font-size:28px;font-weight:bold;margin-top:5px;">Alumni Tracking System(Department of Computer Science)</h1>
                    <div class="dept-email"><i class="fa-solid fa-envelope"></i>dcs@gmail.com</div>
                </div>
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
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
            <div class="col-sm-12 row  background_covered" style="position:relative;margin:0;padding:0;">
                <div class="col-sm-12 row  background_img" style="margin:0;padding:0;"></div>
                    <div class="row delete-alumni-container" style="margin:0;padding:0;"  >
                        <div class="col-sm-12 d-flex align-items-center justify-content-center" >
                            <div class="card d-flex align-items-center justify-content-center" style="width: 18rem;position:relative;top:-100px;">
                                <div class="card-body" >
                                <h5 class="card-title">Delete Alumni</h5>
                                <p class="card-text">Do you want delete your account!</p>
                                <form action="" method='POST' style="display:inline;">
                                    <input type='submit' name='submit' value='YES' style="background:#0d6efd; color:#fff;padding:6px 12px;border-radius:4px;margin-right:5px;position:relative;top:2px;">
                                </form>
                                <a href="profile.php?reg_id=<?php echo $alurow['REG_ID']; ?>" class="btn btn-primary">Cancel</a>
                                </div>
                                <?php 
                                include './connectionandlinkfiles/deletealumni.php';
                                ?>
                            </div>
                        </div>
                    </div>
            </div>
      </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/2bcfa3ed68.js" crossorigin="anonymous"></script> 
</html>