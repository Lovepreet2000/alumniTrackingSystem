<?php
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
        window.location="index.php";
        alert('<?php echo $regid; ?> deleted');
        </script>
        <?php
    }
?>