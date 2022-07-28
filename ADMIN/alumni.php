<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Alumni Session</title>
</head>

<body>

<table class="table table-striped">
    <tr>
        <th>SR.</th>
        <th>REGISTRATION_ID</th>
        <th>PASSWORD</th>
        <th>FIRST_NAME</th>
        <th>MIDDLE_NAME</th>
        <th>LAST_NAME</th>
        <th>DATE_OF_BIRTH</th>
        <th>EMAIL</th>
        <th>PHONE</th>
        <th>LINKEDIN_ID</th>
        <th>CURRENT_STREET_NO.</th>
        <th>CURRENT_STREET_NAME</th>
        <th>CURRENT_APARTMENT</th>
        <th>CURRENT_ZIPCODE</th>
        <th>HOME_STREET_NO.</th>
        <th>HOME_STREET_NAME</th>
        <th>HOME_APARTMENT</th>
        <th>HOME_ZIPCODE</th>
        <th>ALUMNI_IMAGE</th>
        <th>UPDATE</th>
        <th>DELETE</th>
    </tr>  
    
    <?php 
    include '../connectionandlinkfiles/connect.php';
     $sr=1;
     /*alumni table*/ 
     $query = "alter session set NLS_DATE_FORMAT = 'YYYY-MM-DD'";
     $oci=oci_parse($conn,$query);
     oci_execute($oci);
     $query ="select *  from ALUMNI ORDER BY F_NAME ";
     $osi = oci_parse($conn,$query);
     $result =oci_execute($osi);
     while($alurow = oci_fetch_array($osi,OCI_ASSOC+OCI_RETURN_NULLS)){
        $query ="select PASSWORD from LOGIN where REG_ID like '%".$alurow['REG_ID']."%'";
        $pass = oci_parse($conn,$query);
        oci_execute($pass);
        $password = oci_fetch_array($pass,OCI_ASSOC+OCI_RETURN_NULLS)
        ?>
        <tr>
            <td><?php echo $sr; ?></td>
            <td><?php echo $alurow['REG_ID']; ?></td>
            <td><?php echo $password['PASSWORD']; ?></td>
            <td><?php echo $alurow['F_NAME']; ?></td>
            <td><?php echo $alurow['M_NAME']; ?></td>
            <td><?php echo $alurow['L_NAME']; ?></td>
            <td><?php echo $alurow['DATE_OF_BIRTH']; ?></td>
            <td><?php echo $alurow['EMAIL_ID']; ?></td>
            <td><?php echo $alurow['PHONE']; ?></td>
            <td><?php echo $alurow['LINKEDIN_ID']; ?></td>
            <td><?php echo $alurow['CUR_STREETNO']; ?></td>
            <td><?php echo $alurow['CUR_STREETNAME']; ?></td>
            <td><?php echo $alurow['CUR_APARTMENT']; ?></td>
            <td><?php echo $alurow['CUR_ZIPCODE']; ?></td>
            <td><?php echo $alurow['HOME_STREETNO']; ?></td>
            <td><?php echo $alurow['HOME_STREETNAME']; ?></td>
            <td><?php echo $alurow['HOME_APARTMENT']; ?></td>
            <td><?php echo $alurow['HOME_ZIPCODE']; ?></td>
            <td><img src="../<?php echo $alurow['ALUMNI_IMAGE']; ?>" height="100" width="100"></td>
            <td><a href="alumniedit.php?reg_id=<?php  echo $alurow['REG_ID']; ?>"  data-bs-toggle="tooltip" data-bs-placement="top" title="UPDATE"><i class="fa-solid fa-file-pen"></i></a></td>
            <td><a href="alumnidelete.php?reg_id=<?php  echo $alurow['REG_ID']; ?>" class="btn" data-bs-toggle="tooltip" data-bs-placement="top" title="DELETE"><i class="fa-solid fa-trash-can" style="color:red;"></i></a></td>
        </tr>
        <?php
        $sr++;
     }
    ?>
    `   
</table>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/2bcfa3ed68.js" crossorigin="anonymous"></script>   
</html>