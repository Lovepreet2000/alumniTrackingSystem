<?php 
             include 'connect.php';             
             ?>
             <div class="carousel-item active">
                <div class="opinion-box">
                  <div class="feedback-img"><img src="image/feedback2.webp" class="img-fluid" alt=""></div>
                  <div class="quotatoin-mark"><i class="fa-solid fa-quote-left"></i></div>
                  <div class="student-name">Aditi Semwal,Sangrur</div>
                  <div class="opinion"><span>"</span>Due to the efforts made by the faculty and placement cell at Punjani University i was able to bag a job in the second company that i applied for. They always provided me with the assistance that i required for my overall development and to improve my technical knowledge. I will always  be grateful to them for providing me a platform of practical learning and preparing me for the corporate life.
 <span>"</span></div>
                  <div class="student-job">Aditi Semwal, Software Developer, Amazon</div>  
            </div>
            </div>
            <?php
             $query ="select * from FEEDBACK";
             $osi = oci_parse($conn,$query);
             $result =oci_execute($osi);

             while($feedback = oci_fetch_array($osi,OCI_ASSOC+OCI_RETURN_NULLS)){
                 $regid = $feedback['REG_ID'];
                $query ="select * from ALUMNI where REG_ID like '%".$regid."%'";
                $alumni = oci_parse($conn,$query);
                $result =oci_execute($alumni);
                $alurow = oci_fetch_array($alumni,OCI_ASSOC+OCI_RETURN_NULLS);
                $query ="select * from ADDRESS where ZIPCODE like '%".$alurow["HOME_ZIPCODE"]."%'";
                $homeadd = oci_parse($conn,$query);
                oci_execute($homeadd);
                $adrow = oci_fetch_array($homeadd,OCI_ASSOC+OCI_RETURN_NULLS);
                $query ="select * from JOB_DETAILS where REF_ID like '%".$regid."%' AND DATE_OF_LEAVING IS NULL";
                $job = oci_parse($conn,$query);
                oci_execute($job);
                $jbrow = oci_fetch_array($job,OCI_ASSOC+OCI_RETURN_NULLS);
                $op = $feedback['OPNION'];
                
                ?>
             <div class="carousel-item">                 
                 <div class="opinion-box" style="text-transform: capitalize;">
                     <div class="feedback-img"><img src="<?php echo $alurow['ALUMNI_IMAGE']; ?>" class="img-fluid" alt=""></div>
                     <div class="quotatoin-mark"><i class="fa-solid fa-quote-left"></i></div>
                     <div class="student-name" ><?php echo strtolower($alurow["F_NAME"]); ?> <?php echo strtolower($alurow['M_NAME']); ?> <?php echo strtolower($alurow['L_NAME']); ?>, <?php echo strtolower($adrow['CITY']); ?> </div>
                     <div class="opinion"><span>"</span><?php echo strtolower($op); ?><span>"</span></div>
                     <div class="student-job"><?php echo strtolower($alurow["F_NAME"]); ?> <?php echo strtolower($alurow['M_NAME']); ?><?php echo strtolower($alurow['L_NAME']); ?>, <?php echo strtolower($jbrow['JOB_POSITION']);?>, <?php echo strtolower($jbrow['ORG_NAME']);?> </div>  
                    </div>
                </div>
                <?php
            }
?>