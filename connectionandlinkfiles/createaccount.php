<?php
            /*generate password */
  function generatePassword($username){
    $alpha = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","0","1","2","3","4","5","6","7","8","9","0","1","2","3","4","5","6","7","8","9");
    $password ="PU";
    for($i = 0 ; $i < 6 ; $i++){
      $random = rand(0,44);
      $char = $alpha[$random];
      $password = $password.$char;
    }
    return $password;
}


if(isset($_POST['submitsignout'])){
  $target_dir = "image/alumniimage/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
 
  // Check if image file is a actual image or fake image
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
 
  // Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

/* // Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}  */
/* 
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
} 
 */
  // Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
            include 'connect.php';
            $regid=$_POST['regid'];
            $password= generatePassword($regid);
            $newcurzipcode = $_POST["curzipcode"]; 
            $query = "select * FROM ADDRESS WHERE ZIPCODE =".$newcurzipcode;
            $osi = oci_parse($conn,$query);
            oci_define_by_name($osi,'NUMBER_OF_ROWS',$number_of_rows);
            oci_execute($osi);
            $number_of_rows = oci_fetch($osi);    
            if(!$number_of_rows){
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
            oci_execute($osi);
            oci_define_by_name($osi,'NUMBER_OF_ROWS1',$number_of_rows1);
            $number_of_rows1 = oci_fetch($osi);
            if(!$number_of_rows1){
                $query="insert into address(zipcode,city,state) VALUES(:zipcode1,:city1,:state1)";
                $osi=oci_parse($conn,$query);
                $newhomecity=$_POST['homecity'];
                $newhomestate=$_POST['homestate'];
                oci_bind_by_name($osi,":zipcode1",$newhomezipcode);
                oci_bind_by_name($osi,":city1",$newhomecity);
                oci_bind_by_name($osi,":state1",$newhomestate);
                oci_execute($osi);
            }
            $query = "alter session set NLS_DATE_FORMAT = 'YYYY-MM-DD'";
            $oci=oci_parse($conn,$query);
            oci_execute($oci); 
            $query = "insert into ALUMNI(REG_ID,F_NAME,M_NAME,L_NAME,DATE_OF_BIRTH,EMAIL_ID,PHONE,LINKEDIN_ID,CUR_STREETNO,CUR_STREETNAME,CUR_APARTMENT,CUR_ZIPCODE,HOME_STREETNO,HOME_STREETNAME,HOME_APARTMENT,HOME_ZIPCODE,ALUMNI_IMAGE) VALUES(:regid,:fname,:mname,:lname,:dateofbirth,:emailid,:phone,:linkedinid,:curstreetno,:curstreetname,:curapartment,:curzipcode2,:homestreetno,:homestreetname,:homeapartment,:homezipcode2,:imgname)";
            $osi = oci_parse($conn,$query);
            $regid = $_POST["regid"];
             $newfname = $_POST["fname"];
            $newmname = $_POST["mname"];
            $newlname = $_POST["lname"];
            $newdateofbirth=$_POST["dateofbirth"];
            $newemailid=$_POST["emailid"];
            $newphone=$_POST["phoneno"];
            $newlinkedinid=$_POST["linkedinid"];
            $newcurstreetno = $_POST["curstreetno"];
            $newcurstreetname = $_POST["curstreetname"];
            $newcurapartment = $_POST["curapartment"];
            $newcurzipcode = $_POST["curzipcode"]; 
            $newhomestreetno = $_POST["homestreetno"];
            $newhomestreetname = $_POST["homestreetname"];
            $newhomeapartment = $_POST["homeapartment"];  
            $newhomezipcode = $_POST["homezipcode"];
            oci_bind_by_name($osi,":regid",$regid);
            oci_bind_by_name($osi,":fname",$newfname);
            oci_bind_by_name($osi,":mname",$newmname);
            oci_bind_by_name($osi,":lname",$newlname);
            oci_bind_by_name($osi,":dateofbirth",$newdateofbirth);
            oci_bind_by_name($osi,":emailid",$newemailid);
            oci_bind_by_name($osi,":phone",$newphone);
            oci_bind_by_name($osi,":linkedinid",$newlinkedinid);
            oci_bind_by_name($osi,":curstreetno",$newcurstreetno);
            oci_bind_by_name($osi,":curstreetname",$newcurstreetname);
            oci_bind_by_name($osi,":curapartment",$newcurapartment);
            oci_bind_by_name($osi,":curzipcode2",$newcurzipcode);
            oci_bind_by_name($osi,":homestreetno",$newhomestreetno);
            oci_bind_by_name($osi,":homestreetname",$newhomestreetname);
            oci_bind_by_name($osi,":homeapartment",$newhomeapartment);
            oci_bind_by_name($osi,":homezipcode2",$newhomezipcode);
            oci_bind_by_name($osi,":imgname",$target_file);
            oci_execute($osi);
         
            /* course */ 
            $course = $_POST['coursename'];
            $query = "select * from COURSE where COURSE_NAME like '%".$course."%'";
            $osi = oci_parse($conn,$query);
            oci_execute($osi);
            $row = oci_fetch_array($osi,OCI_ASSOC+OCI_RETURN_NULLS);
            $courseid=$row["COURSE_ID"];
            $cgpa = $_POST["cgpa"];
            $batch = $_POST["batch"];
            echo $courseid;
            $query = "insert into STUDIED(REG_ID,COURSE_ID,CGPA,BATCH) VALUES(:regid1,:courseid,:cgpa,:batch)";
            $osi = oci_parse($conn,$query);
            if($osi){
              echo "error in parsingh is sdfa";
            }
            oci_bind_by_name($osi,":regid1",$regid);
            oci_bind_by_name($osi,":courseid",$courseid); 
            oci_bind_by_name($osi,":cgpa",$cgpa);
            oci_bind_by_name($osi,":batch",$batch);
            $res= oci_execute($osi);
            if($res){
              echo "error in executing ";
            }

            /*JOB DETAILS */
            $query = "alter session set NLS_DATE_FORMAT = 'YYYY-MM-DD'";
            $oci=oci_parse($conn,$query);
            oci_execute($oci); 
            $query="insert into JOB_DETAILS (JOB_ID,REF_ID,JOB_POSITION,ORG_NAME,SALARY,DATE_OF_JOINING,DATE_OF_LEAVING) VALUES(:jobid,:regid,:jobposition,:orgname,:salary,:dateofjoining,:dateofleaving)";
            $osi = oci_parse($conn,$query);
            $jobid=$_POST["prjobid"];
            $jobposition=$_POST["prjobposition"];
            $orgname=$_POST["prorganization"];
            $salary=$_POST["prsalary"];
            $dateofjoining=$_POST["prdateofjoin"];
            $dateofleaving =NULL;
            oci_bind_by_name($osi,":jobid",$jobid);
            oci_bind_by_name($osi,":regid",$regid);
            oci_bind_by_name($osi,":jobposition",$jobposition);
            oci_bind_by_name($osi,":orgname",$orgname);
            oci_bind_by_name($osi,":salary",$salary);
            oci_bind_by_name($osi,":dateofjoining",$dateofjoining);
            oci_bind_by_name($osi,":dateofleaving",$dateofleaving);
            oci_execute($osi);

            $query = "insert into FEEDBACK(REG_ID,OPNION) VALUES(:regid,:opinion)";
            $addfeed = oci_parse($conn,$query);
            $feedback = $_POST['about_department'];
            oci_bind_by_name($addfeed,":regid",$regid);
            oci_bind_by_name($addfeed,":opinion",$feedback);
            oci_execute($addfeed);


            $query = "insert into LOGIN(REG_ID,PASSWORD) VALUES(:regid,:password)";
            $login = oci_parse($conn,$query);
            oci_bind_by_name($login,":regid",$regid);
            oci_bind_by_name($login,":password",$password);
            oci_execute($login);


            ?>
            <script> 
            window.location="profile.php?reg_id=<?php echo $regid; ?>"; 
            alert(`<?php echo "username :{$regid}  password : {$password}"; ?>`);
            </script>
            <?php  
        }
        ?>