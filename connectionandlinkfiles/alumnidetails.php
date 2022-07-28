<?php 
             include 'connect.php';
              $regid = $_GET['reg_id'];
              /*alumni table*/ 
              $query = "alter session set NLS_DATE_FORMAT = 'YYYY-MM-DD'";
              $oci=oci_parse($conn,$query);
              oci_execute($oci);
              $query ="select * from ALUMNI where REG_ID like '%".$regid."%'";
              $osi = oci_parse($conn,$query);
              $result =oci_execute($osi);
              $alurow = oci_fetch_array($osi,OCI_ASSOC+OCI_RETURN_NULLS);
              /*alumni email*/ 
             /*  $query ="select * from EMAIL where REG_ID like '%".$regid."%'";
              $osi = oci_parse($conn,$query);
              $result =oci_execute($osi);
              $emarow = oci_fetch_array($osi,OCI_ASSOC+OCI_RETURN_NULLS); */
              /*address HOME*/

              $query ="select * from ADDRESS where ZIPCODE like '%".$alurow["HOME_ZIPCODE"]."%'";
              $osi = oci_parse($conn,$query);
              oci_execute($osi);
              $adrow = oci_fetch_array($osi,OCI_ASSOC+OCI_RETURN_NULLS);
            
              /*address CURRENT*/
              $query ="select * from ADDRESS where ZIPCODE like '%".$alurow["CUR_ZIPCODE"]."%'";
              $osi = oci_parse($conn,$query);
              oci_execute($osi);
              $cadrow = oci_fetch_array($osi,OCI_ASSOC+OCI_RETURN_NULLS);

              /*course */
              $query ="select * from COURSE where COURSE_ID = (select COURSE_ID from STUDIED where REG_ID like '%".$regid."%')";
              $osi = oci_parse($conn,$query);
              oci_execute($osi);
              $courow = oci_fetch_array($osi,OCI_ASSOC+OCI_RETURN_NULLS);
             
              /*studied*/
              $query ="select * from STUDIED where REG_ID like '%".$regid."%'";
              $osi = oci_parse($conn,$query);
              oci_execute($osi);
              $strow = oci_fetch_array($osi,OCI_ASSOC+OCI_RETURN_NULLS);

             
              /*JOB DETAILS*/
              $query = "alter session set NLS_DATE_FORMAT = 'YYYY-MM-DD'";
              $oci=oci_parse($conn,$query);
              oci_execute($oci); 
              $query ="select * from JOB_DETAILS where REF_ID like '%".$regid."%' AND DATE_OF_LEAVING IS NULL";
              $osi = oci_parse($conn,$query);
              oci_execute($osi);
              $jbrow = oci_fetch_array($osi,OCI_ASSOC+OCI_RETURN_NULLS);
              
             
              $query = "alter session set NLS_DATE_FORMAT = 'YYYY-MM-DD'";
              $oci=oci_parse($conn,$query);
              oci_execute($oci);
              $query ="select EXTRACT(YEAR FROM SYSDATE) - EXTRACT(YEAR FROM DATE_OF_BIRTH) as AGE FROM ALUMNI WHERE REG_ID like '%".$regid."%'";
              $osi1 = oci_parse($conn,$query);
              oci_execute($osi1);
              $alumniage = oci_fetch_array($osi1,OCI_ASSOC+OCI_RETURN_NULLS); 
              /*JOB DETAILS*//* 
              $query ="select * from JOB_DETAILS where REF_ID like '%".$regid."%' AND DATE_OF_LEAVING IS NOT NULL";
              $osi = oci_parse($conn,$query);
              oci_execute($osi);
              $exjbrow = oci_fetch_array($osi,OCI_ASSOC+OCI_RETURN_NULLS); */

            /*   $query = "alter session set NLS_DATE_FORMAT = 'YYYY-MM-DD'";
              $oci=oci_parse($conn,$query);
              oci_execute($oci);
              $query ="select EXTRACT(YEAR FROM DATE_OF_LEAVING)-EXTRACT(YEAR FROM DATE_OF_JOINING) as DURATION FROM JOB_DETAILS WHERE REF_ID LIKE '%".$regid."%' AND DATE_OF_LEAVING IS NOT NULL";
              $osi = oci_parse($conn,$query);
              oci_execute($osi);
              $durexjbrow = oci_fetch_array($osi,OCI_ASSOC+OCI_RETURN_NULLS); */
          ?>