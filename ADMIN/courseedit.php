<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"  integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Course Edit</title>
    <style>
        .coursedetail div{
            padding:20px;
        }
    </style>
</head>
<body>
    <?php 
    include '../connectionandlinkfiles/connect.php';
    $courseid=$_GET['courseid'];
    $query ="select * from COURSE where COURSE_ID like '%".$courseid."%'";
    $osi = oci_parse($conn,$query);
    oci_execute($osi);
    $course = oci_fetch_array($osi,OCI_ASSOC+OCI_RETURN_NULLS); 
    ?>
    <div class="row">
        <div class="col-sm-12">
            <form action="" method="POST" >
                <div class="col-sm-12 row coursedetail">
                    <div class="col-sm-6">
                        <label for="course_id">
                            Course Id:
                        </label>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" value="<?php echo $course["COURSE_ID"]; ?>" name="courseid">
                    </div>
                    <div class="col-sm-6">
                        <label for="course_name">
                            Course Name:
                        </label>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" value="<?php echo $course["COURSE_NAME"]; ?>" name="coursename">
                    </div>
                </div>
                <div class="col-sm-12 row d-flex align-items-center justify-content-center">
                    <input type="submit" name="submit" value="edit" class="btn btn-primary" style="width:300px;">
                </div>
            </form>
        </div>
    </div>
    <?php 
    if(isset($_POST['submit'])){
        $query = "update COURSE set COURSE_ID=:courseid,COURSE_NAME=:coursename where COURSE_ID like '%".$courseid."%'";
            $osi = oci_parse($conn,$query);
            $newcourseid = $_POST["courseid"];
            $newcoursename = $_POST["coursename"];
            oci_bind_by_name($osi,":courseid",$newcourseid);
            oci_bind_by_name($osi,":coursename",$newcoursename);
            oci_execute($osi);
    }
    ?>
</body>
</html>