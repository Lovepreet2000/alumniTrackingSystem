<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="../css/logo.css" rel="stylesheet">
    <link href="../css/alumniedit.css" rel="stylesheet">
    <title>Document</title>
</head>
<style>
    .navbar{
        justify-content: start;
    }
    .alumni-details{
            padding-top:20px;
            padding-left:20px;
        }
    
</style>
<body class="main">
     
    <?php include '../connectionandlinkfiles/alumnidetails.php'; ?>
    
    <div class="container-fluid">
        <div class="row home">
            
            <nav class="navbar  navbar-expand-lg  navbar-light bg-light " style="padding:10px;">
              <div class="container d-flex justify-content-start" style="margin:0px 20px;">
                  <img src="../image/Logo.png" alt="" width="100" height="100" class="img-fluid">
                <a class="institute-name" href="#">Punjabi university,patiala</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
            </div>  
            <form class="d-flex">
                <a href="alumni.php" class="btn btn-outline-primary loign-btn"  type="button">BACK</a>
            </form>
            </nav>
            <div class="row background_covered" style="background:#fff;">
                    <div class="row delete-alumni-container" style="margin:0;padding:0;"  >
                        <div class="col-sm-12 d-flex align-items-center justify-content-center" >
                            <div class="card d-flex align-items-center justify-content-center" style="width: 18rem;position:relative;top:-300px;">
                                <div class="card-body" >
                                <h5 class="card-title">Delete Alumni</h5>
                                <p class="card-text">" Do you want delete alumni whose Regsitration id is <?php echo $alurow['REG_ID']; ?> "</p>
                                <form action="" method='POST' style="display:inline;">
                                    <input type='submit' name='submit' value='YES' style="background:#0d6efd; color:#fff;padding:6px 12px;border-radius:4px;margin-right:5px;position:relative;top:2px;">
                                </form>
                                <a href="profile.php?reg_id=<?php echo $alurow['REG_ID']; ?>" class="btn btn-primary">Cancel</a>
                                </div>
                                <?php 
                                /* include '../connectionandlinkfiles/deletealumni.php'; */
                                if(isset($_POST['submit'])){
                                    $regid=$_GET['reg_id'];
                            
                                    $query = "delete LOGIN WHERE REG_ID like '%".$regid."%'";
                                    $osi = oci_parse($conn,$query);
                                    oci_execute($osi);
                                    
                                    $query = "delete JOB_DETAILS WHERE REF_ID like '%".$regid."%'";
                                    $osi = oci_parse($conn,$query);
                                    oci_execute($osi);
                                    
                                    $query = "delete FEEDBACK WHERE REG_ID like '%".$regid."%'";
                                    $osi = oci_parse($conn,$query);
                                    oci_execute($osi);
                                    
                                    $query = "delete STUDIED WHERE REG_ID like '%".$regid."%'";
                                    $osi = oci_parse($conn,$query);
                                    oci_execute($osi);
                                    
                                    $query = "delete ALUMNI WHERE REG_ID like '%".$regid."%'";
                                    $osi = oci_parse($conn,$query);
                                    if(!$osi){ echo "error during parsing query";}
                                    oci_execute($osi);
                                    ?>
                                    <script>
                                    window.location="alumni.php";
                                    alert('Alumni with reg id : <?php echo $regid; ?> deleted');
                                    </script>
                                    <?php
                                }
                                
                                ?>
                            </div>
                        </div>
                    </div>
            </div>
            </div>
        </div>
    </div>
</body>
</html>