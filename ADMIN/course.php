<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"  integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>course</title>
</head>
<body>
    <div class="container-fluid">

        <table class="table table-striped">
            <tr>
                <th>SR.</th>
                <th>COURSE_ID</th>
                <th>COURSE_NAME</th>
           
            </tr>  
            
            <?php 
            include '../connectionandlinkfiles/connect.php';
             $sr=1;
             /*alumni table*/ 
            
             $query ="select * from COURSE";
             $osi = oci_parse($conn,$query);
             $result =oci_execute($osi);
             while($course = oci_fetch_array($osi,OCI_ASSOC+OCI_RETURN_NULLS)){
                ?>
                <tr>
                    <td><?php echo $sr; ?></td>
                    <td><?php echo $course['COURSE_ID']; ?></td>
                    <td><?php echo $course['COURSE_NAME']; ?></td>
                    <!-- <td><a href="courseedit.php?courseid=<?php  echo $course['COURSE_ID']; ?>"  data-bs-toggle="tooltip" data-bs-placement="top" title="UPDATE"><i class="fa-solid fa-file-pen" ></i></a></td>
                    <td><a href="coursedelete.php?courseid=<?php  echo $course['COURSE_ID']; ?>" class="btn" data-bs-toggle="tooltip" data-bs-placement="top" title="DELETE"><i class="fa-solid fa-trash-can" style="color:red;"></i></a></td>
        -->
                </tr>
                <?php
                $sr++;
             }
            ?>
        </table>
        <div id="course-add" class="row">
        
        </div>
        <div class="col-sm-12"><input type = "button" class="btn btn-primary" value="add experience" onclick="createexperiencebox()"></div>
    </div>
    <?php 
    if(isset($_POST['addit'])){
        $query = "insert into COURSE(COURSE_ID,COURSE_NAME) VALUES(:courseid,:coursename)";
        $addcourse = oci_parse($conn,$query);
        $courseid=$_POST['courseid'];
        $coursename=$_POST['coursename'];
        oci_bind_by_name($addcourse,":courseid",$courseid);
        oci_bind_by_name($addcourse,":coursename",$coursename);
        oci_execute($addcourse);
        ?>
        <script> 
        window.location="course.php"; 
        alert(`course add`);
        </script>
        <?php
    }
    ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/2bcfa3ed68.js" crossorigin="anonymous"></script>   
<script>
    function createexperiencebox(){
        const newexperiencebox = document.createElement('div');
        
        const newexperienceboxtext = newexperiencebox.innerHTML="<form method='POST'><div class='add-course row'><div class='col-sm-12'>Add Course:</div><div class='col-sm-6 row'><div class='col-sm-3'><label for='courseid'>COURSE ID: </label></div><div class='col-sm-9'><input type='text' name='courseid' required value=''></div></div><div class='col-sm-6 row'><div class='col-sm-3'><label for='coursename'>Course Id: </label></div><div class='col-sm-9'><input type='text' name='coursename' required value=''> </div></div><div class='col-sm-12 d-flex justify-content-flex-end align-items'><input type='submit' name='addit' value='addit' class='btn btn-primary' style='padding:8px;width:150px;'> </div><hr></form>";
        /* const newexperienceboxtext = newexperiencebox.innerHTML="<form method='POST'><HR><div class='col-sm-12 row'><div class='col-sm-12'><lable for='orgname'>Organization Name: </lable><input type='text' name='exorgname' class='form-control' placeholder='organization name*'></div> <div class='col-sm-6'> <label for='job-id'>JOB ID:</label> <input type='text' name='exjobid'> </div> <div class='col-sm-6'><lable for='job_positon'>Job Positoin</label><input type='text' name='exjobposition' class='form-control' placeholder='job-position*''></div><div class='col-sm-6'><label for='salary'>Salary</label><input type='number' name='exsalary' class='form-control' placeholder='salary*''></div><div class='col-sm-6'><label for='dateofjoining'>Date of Joining</label><input type='date' name='exdateofjoining' class='form-control' placeholder='date of joinning*''></div><div class='col-sm-5'><label for='dateofleaving'>Date of Leaving</lable><input type='date' name='exdateofleaving' class='form-control' placeholder='date of leave*''></div><div class='col-sm-1'><input type='submit' name='addit' value='addit'> </div></div></form>";
         *//*  newexperiencebox.appendChild(newexperienceboxtext); */
        document.querySelector("#course-add").appendChild(newexperiencebox);
    }
</script>
</html>