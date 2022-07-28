<?php 
                include 'connect.php';
                $query = "alter session set NLS_DATE_FORMAT = 'YYYY-MM-DD'";
                $oci=oci_parse($conn,$query);
                oci_execute($oci); 
                $query ="select * from JOB_DETAILS where REF_ID like '%".$regid."%' AND DATE_OF_LEAVING IS NOT NULL";
                $osi = oci_parse($conn,$query);
                oci_execute($osi);           
                while($exjbrow=oci_fetch_array($osi,OCI_ASSOC+OCI_RETURN_NULLS)){
                $jobid=$exjbrow["JOB_ID"];
                $query = "alter session set NLS_DATE_FORMAT = 'YYYY-MM-DD'";
                $oci=oci_parse($conn,$query);
                oci_execute($oci);
                $query ="select EXTRACT(YEAR FROM DATE_OF_LEAVING)-EXTRACT(YEAR FROM DATE_OF_JOINING) as DURATION FROM JOB_DETAILS WHERE JOB_ID like '%".$jobid."%' AND REF_ID LIKE '%".$regid."%' AND DATE_OF_LEAVING IS NOT NULL";
                $osi1 = oci_parse($conn,$query);
                oci_execute($osi1);
                $durexjbrow = oci_fetch_array($osi1,OCI_ASSOC+OCI_RETURN_NULLS); 
              ?>
              <div class="alumni-experience-details alumni-details row">
                    <div class="col-sm-12">EXPERIERCE DETAILS:</div>

                    <div class="col-sm-6"><SPAN>></SPAN>Organization:  <?php echo $exjbrow["ORG_NAME"]; ?> </div>
                    <div class="col-sm-6"><SPAN>></SPAN>Job-positon:  <?php echo $exjbrow["JOB_POSITION"]; ?> </div>
                    
                    <div class="col-sm-6"><SPAN>></SPAN>Salary: <?php echo $exjbrow["SALARY"]; ?></div>
                    <div class="col-sm-6"><SPAN>></SPAN>Duration: <?php echo $durexjbrow["DURATION"]." YEAR"; ?></div>
                </div>     
                    <?php
                }
                ?>
                <!-- <div class="col-sm-12 row detail-container">
                        <div class="col-sm-12 detail-container-tittle"> <i class="fa-solid fa-star" style="margin-right:5px;"></i>Experience:</div>
                        <div class="col-sm-6 row">
                            <div class="col-sm-4">Job Position:</div>
                            <div class="col-sm-6"><?php echo $exjbrow["JOB_POSITION"]; ?></div>
                            <div class="col-sm-2"></div>
                        </div>
                        <div class="col-sm-6 row">
                            <div class="col-sm-6">Organization:</div>
                            <div class="col-sm-6"><?php echo $exjbrow["ORG_NAME"]; ?></div>
                        </div>
                        <div class="col-sm-6 row">
                            <div class="col-sm-4">salary:</div>
                            <div class="col-sm-6"><?php echo $exjbrow["SALARY"]; ?></div>
                            <div class="col-sm-2"></div>
                        </div>
                        <div class="col-sm-6 row">
                            <div class="col-sm-6">Duration:</div>
                            <div class="col-sm-6"><?php echo $durexjbrow["DURATION"]." YEAR"; ?></div>
                        </div>     
                    </div> -->