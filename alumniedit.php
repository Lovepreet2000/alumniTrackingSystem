<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/logo.css" rel="stylesheet">
    <link href="./css/alumniedit.css" rel="stylesheet"><!-- 
    <link href="css/myprofile.css" rel="stylesheet"> -->
    <title>alumni edit</title>
    <!-- <style>    
    .background_covered{
    position:relative;
    top:0;
    left:0;
    padding-top:calc(100vh - 151px);
    width:100%;
}
        .profile-container{
            position:relative;
            width:100%;
            height:100vh;
           
        }
        .left-container,.right-container{
            position:relative;
            top:0;
            left:0;
            height:100vh;
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
            font-size:25px;
            font-weight:bold;
            font-family: tahoma;
            margin-top:15px;
        }
        .contactwithalumni ul {
            list-style:none;
            padding:10px 20px;
            text-align:left;
            font-size:18px;
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
            padding-top:120px;
            padding-left:20px;
        }
        .alumni-details div{
            
            font-size:15px;
            padding:5px;
        }
        .alumni-details div span{
            margin-right: 3px;
            color:rgba(139, 127, 127, 0.315);
            font-weight: bold;
        }
        .savebutton{
            width:300px;
            height:40px;
            background:#007DC4;
            color:#fff;
            border:none;
        }
     
    </style> -->
  </head>
<body class="main">
    <?php include 'connectionandlinkfiles/alumnidetails.php'; ?>
    <div class="container-fluid" style="padding:0px";>
      <!--HOME-->
      <div class="row home" style="padding:0px;margin:0px;">
       <div class="col-sm-12" STYLE="position: fixed;z-index: 11111;padding:0;margin:0;">
           <div class="contact-bar"  >
             <div class="dept-phone"><i class="fa-solid fa-phone"></i>0175-5136313 </div>
             <h1 style="color:#007DC4; font-size:28px;font-weight:bold;margin-top:5px;">Alumni Tracking System(Department of Computer Science)</h1>
             <div class="dept-email"><i class="fa-solid fa-envelope"></i>dcs@gmail.com</div>
           </div>
           <nav class="navbar navbar-expand-lg navbar-light bg-light">
             <div class="container-fluid" style="padding:0;margin:0;">
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
        <div class="row background_covered" style="position:relative;padding:0;margin:0;background:#fff;">
        <!--     <div class="row background_img" style="padding:0;margin:0;"></div> -->
            <form action="" method="POST">
                <div class="col-sm-12 alumni-detail">
                    ALUMNI DETAILS
                </div>
            <!--personal details-->
            <!-- edit code start -->
            <div class="personal-detail alumni-details row">
                        <div class="col-sm-12">PERSONAL DETAIL:</div>
                        <div class="col-sm-6 row">
                            <div class="col-sm-3">
                                Reg Id:
                            </div>
                            <div class="col-sm-9">
                                <?php echo $alurow['REG_ID']; ?>
                            </div>
                        </div>                
                        <div class="col-sm-6 row">
                            <div class="col-sm-3">
                                <label for="">
                                    First Name:
                                </label>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="fname" value="<?php echo $alurow['F_NAME']; ?> ">
                            </div>
                        </div>                
                        <div class="col-sm-6 row">
                            <div class="col-sm-3">
                                <label for="middlename">Middle Name: </label>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="mname" value="<?php echo $alurow["M_NAME"]; ?> ">                            </div>

                        </div>                
                        <div class="col-sm-6 row">
                            <div class="col-sm-3">
                                <label for="lastname">Last Name:</label>
                            </div>
                            <div class="col-sm-9">
                            <input type="text" name="lname" value="<?php echo $alurow["L_NAME"]; ?> ">
                            </div>
                            </div>                
                        <div class="col-sm-6 row">
                            <div class="col-sm-3">
                                <label for="dateofbirth">Data Of Birth: </label>
                            </div>
                            <div class="col-sm-9">
                            <input type="date"  name='dateofbirth' value="<?php echo $alurow["DATE_OF_BIRTH"]; ?>" > 
                            </div>
                        </div>
                        <div class="col-sm-6 row">
                            <div class="col-sm-3">
                                <label for="phone">Phone: </label>
                            </div>
                            <div class="col-sm-9">
                            <input type="text"  name='phoneno' value="<?php echo $alurow["PHONE"]; ?>" >  
                            </div>
                        </div>
                        <div class="col-sm-6 row">
                            <div class="col-sm-3">
                                <label for="email">Email: </label>
                            </div>
                            <div class="col-sm-9">
                            <input type="email" class="col-sm-9" name='emailid'  value="<?php echo $alurow["EMAIL_ID"]; ?>" >
                            </div>
                        </div>
                        <div class="col-sm-6 row">
                            <div class="col-sm-3">
                                <label for="linkedin">LinkedIn: </label>
                            </div>
                            <div class="col-sm-9">
                            <input type="text" class="col-sm-9"  name='linkedinid' value=" <?php echo $alurow["LINKEDIN_ID"]; ?>" >    
                            </div>
                        </div>
                            <hr>

                        <div class="col-sm-12">Home Address: </div>
                        <div class="col-sm-6 row">
                            <div class="col-sm-3">
                                <label for="homestreetno">Street No: </label>
                            </div>
                            <div class="col-sm-9">
                            <input type="number" name="homestreetno" value="<?php echo $alurow["HOME_STREETNO"]; ?>">
                        </div>
                        </div>    
                        
                        <div class="col-sm-6 row">
                            <div class="col-sm-3">
                                <label for="homestreetname">Street Name: </label>
                            </div>
                            <div class="col-sm-9">
                            <input type="text" name="homestreetname" value="<?php echo $alurow["HOME_STREETNAME"]; ?>">
                            </div>
                        </div>    
                        
                        <div class="col-sm-6 row">
                            <div class="col-sm-3">
                                <label for="homeapartment">Apartment: </label>
                            </div>
                            <div class="col-sm-9">
                            <input type="text" name="homeapartment" value="<?php echo $alurow["HOME_APARTMENT"]; ?>">
                         </div>
                        </div>    
                        
                        <div class="col-sm-6 row">
                            <div class="col-sm-3">
                                <label for="homecity">City: </label>
                            </div>
                            <div class="col-sm-9">
                            <input type="text" name="homecity" value="<?php echo $adrow["CITY"]; ?>">
                            </div>
                        </div>    
                        
                        <div class="col-sm-6 row">
                            <div class="col-sm-3">
                                <label for="homestate">State: </label>
                            </div>
                            <div class="col-sm-9">
                            <input type="text" name="homestate" value="<?php echo $adrow["STATE"]; ?>">
                            </div>
                        </div>    
                        
                        <div class="col-sm-6 row">
                            <div class="col-sm-3">
                                <label for="homestate">Zip Code: </label>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="homezipcode" value="<?php echo $adrow["ZIPCODE"]; ?>">
                            </div>
                        </div>    
                        <hr>
                    
                        <div class="col-sm-12">Current Address: </div>
                        <div class="col-sm-6 row">
                            <div class="col-sm-3">
                                <label for="curstreetno">Street No: </label>
                            </div>
                            <div class="col-sm-9">
                            <input type="number" name="curstreetno" value="<?php echo $alurow["CUR_STREETNO"]; ?>">
                             </div>
                        </div>    
                        
                        <div class="col-sm-6 row">
                            <div class="col-sm-3">
                                <label for="homestreetname">Street Name: </label>
                            </div>
                            <div class="col-sm-9">
                            <input type="text" name="curstreetname" value="<?php echo $alurow["CUR_STREETNAME"]; ?>">
                            </div>
                        </div>    
                        
                        <div class="col-sm-6 row">
                            <div class="col-sm-3">
                                <label for="homeapartment">Apartment: </label>
                            </div>
                            <div class="col-sm-9">
                            <input type="text" name="curapartment" value="<?php echo $alurow["CUR_APARTMENT"]; ?>">
                            </div>
                        </div>    
                        
                        <div class="col-sm-6 row">
                            <div class="col-sm-3">
                                <label for="homecity">City: </label>
                            </div>
                            <div class="col-sm-9">
                            <input type="text" name="curcity" value="<?php echo $cadrow["CITY"]; ?>">
                            </div>
                        </div>    
                        
                        <div class="col-sm-6 row">
                            <div class="col-sm-3">
                                <label for="homestate">State: </label>
                            </div>
                            <div class="col-sm-9">
                            <input type="text" name="curstate" value="<?php echo $cadrow["STATE"]; ?>">
                            </div>
                        </div>    
                        
                        <div class="col-sm-6 row">
                            <div class="col-sm-3">
                                <label for="homestate">Zip Code: </label>
                            </div>
                            <div class="col-sm-9">
                            <input type="text" name="curzipcode" value="<?php echo $cadrow["ZIPCODE"]; ?>">
                            </div>
                        </div>    
                        <hr>
                    
                    <div class="alumni-qualification-details alumni-details row">
                        <div class="col-sm-12">QUALIFICATION:</div>
                        <div class="col-sm-6 row">
                            <div class="col-sm-3">
                                <label for="course">Course: </label>  
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="" value="<?php echo $courow["COURSE_NAME"]; ?>">  
                            </div>
                            </div>
                        <div class="col-sm-6 row">
                            <div class="col-sm-3">
                                <label for="batch"> Batch: </label>
                            </div>
                            <div class="col-sm-9">
                                <input type="number" name="" value="<?php echo $strow["BATCH"]; ?>"> </div>
                            </div>
                        <div class="col-sm-6 row">
                            <div class="col-sm-3">
                                <label for="cgpa">CGPA: </label>
                            </div>
                            <div class="col-sm-9">
                                <input type="number" name="" value="<?php echo $strow["CGPA"]; ?>">
                            </div>
                            </div>
                    </div>
                    <hr>
                    
                    <div class="alumni-job-details alumni-details row">
                        <div class="col-sm-12">JOB DETAILS:</div>

                        <div class="col-sm-6 row">
                            <div class="col-sm-3">
                                <label for="">Organization: </label>
                            </div>
                            <div class="col-sm-9">
                            <input type="text" name="prorgname" value="<?php echo $jbrow["ORG_NAME"]; ?>">
                            </div>
                        </div>
                        <div class="col-sm-6 row">
                            <div class="col-sm-3">
                                <label for="jobid">
                                    Job Id: 
                                </label>
                            </div>
                            <div class="col-sm-9">
                            <input type="text" name="prjobid" value="<?php echo $jbrow["JOB_ID"]; ?>"> 
                            </div>
                        </div>
                        <div class="col-sm-6 row">
                            <div class="col-sm-3">
                                <label for="jobposition">
                                    Job Position: 
                                </label>
                            </div>
                            <div class="col-sm-9">
                            <input type="text" name="prjobposition" value="<?php echo $jbrow["JOB_POSITION"]; ?>"> 
                            </div>
                        </div>
                        <div class="col-sm-6 row">
                            <div class="col-sm-3">
                                <label for="salary">Salary: </label>
                            </div>
                            <div class="col-sm-9">
                            <input type="number" name="prsalary" value="<?php echo $jbrow["SALARY"]; ?>">
                            </div>
                        </div>
                        <div class="col-sm-6 row">
                            <div class="col-sm-3">
                                <label for="dateofjoin">
                                    Date of Join:
                                </label>
                            </div>
                            <div class="col-sm-9">
                            <input type="date" name="prdateofjoining" value="<?php echo $jbrow["DATE_OF_JOINING"]; ?>">
                            </div>
                        </div> 
                    <hr>
                   
                                
            <!-- edit code end -->
            <!--experience-->
            <?php 
                include './connectionandlinkfiles/experiencedetails.php';
            ?>
            <div class="row" id ="experiencebox"></div>
            <div class="col-sm-12"><input type = "button" class="btn btn-primary" value="add experience" onclick="createexperiencebox()"></div>
            <!--edit-->
            <div class="col-sm-12 row d-flex align-items-center justify-content-center" >
                <div class="col-sm-4"></div>
                <div class="col-sm-4" style="text-align:center;padding:18px;"><input type="submit" name="submit" value="save" class='btn btn-primary' style="padding:8px;width:200px;"></div>
                <div class="col-sm-4"></div>
            </div>
            <?php 
            if(isset($_POST['addit'])){
                
                $regid = $_GET['reg_id'];
                $query = "insert into JOB_DETAILS(JOB_ID,REF_ID,JOB_POSITION,ORG_NAME,SALARY,DATE_OF_JOINING,DATE_OF_LEAVING) VALUES(:exjobid,:regid,:exjobposition,:exorgname,:exsalary,:exdateofjoining,:exdateofleaving)";
                $osi = oci_parse($conn,$query);
                $exjobid=$_POST["exjobid"];
                $exjobposititon=$_POST['exjobposition'];
                $exorgname = $_POST['exorgname'];
                $exsalary=$_POST['exsalary'];
                $exdateofjoining=$_POST['exdateofjoining'];
                $exdateofleaving=$_POST['exdateofleaving'];
                oci_bind_by_name($osi,":exjobid",$exjobid);
                oci_bind_by_name($osi,":regid",$regid);
                oci_bind_by_name($osi,":exjobposition",$exjobposititon);
                oci_bind_by_name($osi,":exorgname",$exorgname);
                oci_bind_by_name($osi,":exsalary",$exsalary);
                oci_bind_by_name($osi,":exdateofjoining",$exdateofjoining);
                oci_bind_by_name($osi,":exdateofleaving",$exdateofleaving);
                oci_execute($osi);
                ?>
                <script>
                    window.location="alumniedit.php?reg_id=<?php echo $regid; ?>";
                    alert('experience added');
                    </script>
                <?php
            }
        if(isset($_POST['submit'])){
            $regid = $_GET['reg_id'];
            $newcurzipcode = $_POST["curzipcode"]; 
            $query = "select * FROM ADDRESS WHERE ZIPCODE =".$newcurzipcode;
            $osi = oci_parse($conn,$query);
            oci_define_by_name($osi,'NUMBER_OF_ROWS',$number_of_rows);
            oci_execute($osi);
            $num = oci_fetch($osi);
            if(!$num){
                $query="insert into address(zipcode,city,state) VALUES(:zipcode,:city,:state)";
                $osi=oci_parse($conn,$query);
                $newcurcity=$_POST['curcity'];
                $newcurstate=$_POST['curstate'];
                oci_bind_by_name($osi,":zipcode",$newcurzipcode);
                oci_bind_by_name($osi,":city",$newcurcity);
                oci_bind_by_name($osi,":state",$newcurstate);
                oci_execute($osi);
            }
            $newhomezipcode = $_POST["homezipcode"];
            $query = "select * FROM ADDRESS WHERE ZIPCODE =".$newhomezipcode;
            $osi = oci_parse($conn,$query);
            oci_define_by_name($osi,'NUMBER_OF_ROWS',$number_of_rows);
            oci_execute($osi);
            $num = oci_fetch($osi);
            if(!$num){
                $query="insert into address(zipcode,city,state) VALUES(:zipcode1,:city1,:state1)";
                $osi=oci_parse($conn,$query);
                $newhomecity=$_POST['homecity'];
                $newhomestate=$_POST['homestate'];
                oci_bind_by_name($osi,":zipcode1",$newhomezipcode);
                oci_bind_by_name($osi,":city1",$newhomecity);
                oci_bind_by_name($osi,":state1",$newhomestate);
                oci_execute($osi);
            }
            $query = "update ALUMNI set F_NAME=:fname,M_NAME=:mname,L_NAME=:lname,DATE_OF_BIRTH=:dateofbirth,EMAIL_ID=:emailid,PHONE=:phone,LINKEDIN_ID=:linkedinid,HOME_STREETNO=:homestreetno,HOME_STREETNAME=:homestreetname,HOME_APARTMENT=:homeapartment,HOME_ZIPCODE=:homezipcode,CUR_STREETNO=:curstreetno,CUR_STREETNAME=:curstreetname,CUR_APARTMENT=:curapartment,CUR_ZIPCODE=:curzipcode where REG_ID like '%".$regid."%'";
  
            $osi = oci_parse($conn,$query);
            $newfname = $_POST["fname"];
            $newmname = $_POST["mname"];
            $newlname = $_POST["lname"];
            $newdateofbirth=$_POST["dateofbirth"];
            $newemailid=$_POST["emailid"];
            $newphone=$_POST["phoneno"];
            $newlinkedinid=$_POST["linkedinid"];
            $newhomestreetno = $_POST["homestreetno"];
            $newhomestreetname = $_POST["homestreetname"];
            $newhomeapartment = $_POST["homeapartment"];
            /* $newhomezipcode = $_POST["homezipcode"]; */
            $newcurstreetno = $_POST["curstreetno"];
            $newcurstreetname = $_POST["curstreetname"];
            $newcurapartment = $_POST["curapartment"];
           /*  $newcurzipcode = $_POST["curzipcode"]; */
            oci_bind_by_name($osi,":fname",$newfname);
            oci_bind_by_name($osi,":mname",$newmname);
            oci_bind_by_name($osi,":lname",$newlname);
            oci_bind_by_name($osi,":dateofbirth",$newdateofbirth);
            oci_bind_by_name($osi,":emailid",$newemailid);
            oci_bind_by_name($osi,":phone",$newphone);
            oci_bind_by_name($osi,":linkedinid",$newlinkedinid);
            oci_bind_by_name($osi,":homestreetno",$newhomestreetno);
            oci_bind_by_name($osi,":homestreetname",$newhomestreetname);
            oci_bind_by_name($osi,":homeapartment",$newhomeapartment);
            oci_bind_by_name($osi,":homezipcode",$newhomezipcode);
            oci_bind_by_name($osi,":curstreetno",$newcurstreetno);
            oci_bind_by_name($osi,":curstreetname",$newcurstreetname);
            oci_bind_by_name($osi,":curapartment",$newcurapartment);
            oci_bind_by_name($osi,":curzipcode",$newcurzipcode);
            oci_execute($osi);

            if($jbrow["JOB_ID"] != $_POST['prjobid']){
                $query = "delete JOB_DETAILS WHERE REF_ID like '%".$regid."%' AND DATE_OF_LEAVING IS NULL";
                $osi = oci_parse($conn,$query);
                oci_execute($osi);
                $query="insert into JOB_DETAILS (JOB_ID,REF_ID,JOB_POSITION,ORG_NAME,SALARY,DATE_OF_JOINING,DATE_OF_LEAVING) VALUES(:jobid,:regid,:jobposition,:orgname,:salary,:dateofjoining,:dateofleaving)";
                $osi = oci_parse($conn,$query);
                $jobid=$_POST["prjobid"];
                $jobposition=$_POST["prjobposition"];
                $orgname=$_POST["prorgname"];
                $salary=$_POST["prsalary"];
                $dateofjoining=$_POST["prdateofjoining"];
                $dateofleaving =NULL;
                oci_bind_by_name($osi,":jobid",$jobid);
                oci_bind_by_name($osi,":regid",$regid);
                oci_bind_by_name($osi,":jobposition",$jobposition);
                oci_bind_by_name($osi,":orgname",$orgname);
                oci_bind_by_name($osi,":salary",$salary);
                oci_bind_by_name($osi,":dateofjoining",$dateofjoining);
                oci_bind_by_name($osi,":dateofleaving",$dateofleaving);
                oci_execute($osi);
            }
            
            ?>
            <script>
            window.location="profile.php?reg_id=<?php echo $regid; ?>";
            alert('updated');
            </script>
            <?php
        }
        ?>
        </form>
    </div>    
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/2bcfa3ed68.js" crossorigin="anonymous"></script>   
<script>
    function createexperiencebox(){
        const newexperiencebox = document.createElement('div');
        
        const newexperienceboxtext = newexperiencebox.innerHTML="<form method='POST'><div class='alumni-job-details alumni-details row'><div class='col-sm-12'>Experience:</div><div class='col-sm-6 row'><div class='col-sm-3'><label for='organization'>Organization: </label></div><div class='col-sm-9'><input type='text' name='exorgname' value=''></div></div><div class='col-sm-6 row'><div class='col-sm-3'><label for='jobid'>Job Id: </label></div><div class='col-sm-9'><input type='text' name='exjobid' value=''> </div></div><div class='col-sm-6 row'><div class='col-sm-3'><label for='jobposition'>Job Position: </label></div><div class='col-sm-9'><input type='text' name='exjobposition' value=''> </div> </div>  <div class='col-sm-6 row'><div class='col-sm-3'><label for='salary'>Salary: </label></div><div class='col-sm-9'><input type='number' name='exsalary' value=''></div></div> <div class='col-sm-6 row'><div class='col-sm-3'><label for='dateofjoin'>Date of Join:</label></div><div class='col-sm-9'><input type='date' name='exdateofjoining' value=''></div></div><div class='col-sm-6 row'><div class='col-sm-3'><label for='dateofjoin'>Date of leaving:</label></div><div class='col-sm-9'><input type='date' name='exdateofleaving' value=''></div></div><div class='col-sm-12 d-flex justify-content-flex-end align-items'><input type='submit' name='addit' value='addit' class='btn btn-primary' style='padding:8px;width:150px;'> </div><hr></form>";
        /* const newexperienceboxtext = newexperiencebox.innerHTML="<form method='POST'><HR><div class='col-sm-12 row'><div class='col-sm-12'><lable for='orgname'>Organization Name: </lable><input type='text' name='exorgname' class='form-control' placeholder='organization name*'></div> <div class='col-sm-6'> <label for='job-id'>JOB ID:</label> <input type='text' name='exjobid'> </div> <div class='col-sm-6'><lable for='job_positon'>Job Positoin</label><input type='text' name='exjobposition' class='form-control' placeholder='job-position*''></div><div class='col-sm-6'><label for='salary'>Salary</label><input type='number' name='exsalary' class='form-control' placeholder='salary*''></div><div class='col-sm-6'><label for='dateofjoining'>Date of Joining</label><input type='date' name='exdateofjoining' class='form-control' placeholder='date of joinning*''></div><div class='col-sm-5'><label for='dateofleaving'>Date of Leaving</lable><input type='date' name='exdateofleaving' class='form-control' placeholder='date of leave*''></div><div class='col-sm-1'><input type='submit' name='addit' value='addit'> </div></div></form>";
         *//*  newexperiencebox.appendChild(newexperienceboxtext); */
        document.querySelector("#experiencebox").appendChild(newexperiencebox);
    }
    function removeexperiencebox(){
        var  experiencebox = document.querySelector("#experiencebox");
        var count = experiencebox.lastChild;
        console.log(count)
        experiencebox.removeChild(experiencebox.lastElementChild);
    }
</script>
</html>
