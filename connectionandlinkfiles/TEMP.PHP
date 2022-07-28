<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="curcity">
        <input type="text" name="curstate">
        <input type="text" name="curzipcode">
        <input type="submit" name="submit">
    </form>
</body>
</html>
<?php 
if(isset($_POST["submit"])){
    include 'connect.php';
    $newcurzipcode = $_POST["curzipcode"]; 
    $query = "select * FROM ADDRESS WHERE ZIPCODE =".$newcurzipcode;
    $osi = oci_parse($conn,$query);
    oci_define_by_name($osi,'NUMBER_OF_ROWS',$number_of_rows);
    oci_execute($osi);
    $number_of_rows = oci_fetch($osi);  
    echo "$number_of_rows";  
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

}
?>