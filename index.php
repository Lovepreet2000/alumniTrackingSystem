<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="./css/logo.css" rel="stylesheet">

    <title>home page</title>
    <STYLE>
      #date_input{text-indent: -500px;height:25px; width:200px;}
      .course-box .course-details {
    font-size: 18px;
    position: relative;
    z-index:1;
    top: 0;
    left: 0;
}
    </STYLE>
  </head>
  <body class="main">
    <div class="container-fluid">
      <!--HOME-->
      <div class="row home">
        <div class="contact-bar">
          <div class="dept-phone"><i class="fa-solid fa-phone"></i>0175-5136313 </div>
          <h1 style="color:#007DC4; font-size:28px;font-weight:bold;margin-top:5px;">Alumni Tracking System(Department of Computer Science)</h1>
          <div class="dept-email"><i class="fa-solid fa-envelope"></i>dcs@gmail.com</div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container">
              <img src="image/Logo.png" alt="" width="100" height="100" class="img-fluid">
            <a class="institute-name" href="#">Punjabi university,patiala</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse menu_bar" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                <li class="nav-item menu">
                  <a class="nav-link active menu_title" aria-current="page" href="#">HOME</a>
                </li>
                <li class="nav-item menu">
                  <a class="nav-link active" aria-current="page" href="#about">ABOUT US</a>
                </li>
                <li class="nav-item menu">
                  <a class="nav-link active" aria-current="page" href="#service">SERVICES</a>
                </li>
                <li class="nav-item menu">
                  <a class="nav-link active" aria-current="page" href="#feedback">FEEDBACK</a>
                </li>
                <li class="nav-item menu">
                  <a class="nav-link active" aria-current="page" href="#contact-us">CONTACT US</a>
                </li>
              </ul>
              <form class="d-flex">
                <button class="btn btn-outline-primary loign-btn" onclick="displayloginbox();" type="button">LOGIN IN</button>
              </form>
            </div>
          </div>  
        </nav>
        <div class="background_img"></div>
      </div>
      <!--LOGIN BOX-->
      <div class="row login" style="opacity: 1;height: 100vh;">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <div class="login-box" style="max-height: 600px;">
                <div class="login-heading">
                    <h3>Login</h3>
                    <i class="fa-solid fa-xmark" onclick="hideloginbox();"></i>
                </div>
                <form action="" method="POST">
                    <div class="mb-3">
                      <input type="text" class="form-control" id="exampleInputEmail1" name="reg-id" required placeholder="Enter your registration id" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                      <input type="password" class="form-control" name="password" required placeholder="Enter your Password" id="exampleInputPassword1">
                    </div>
                    <!-- <div class="mb-3">
                        <a href="alumniprofile.html" style="text-decoration: none; ">Forget Your Password</a>
                    </div> -->
                    <div class="mb-3" style="width:100%;display:flex;align-items:center;justify-content: center;">
                        <input type="submit" name="submit" value="submit" style="border:none;outline:none;padding:10px 200px; background: #007DC4;color:#fff;border-radius: none;">  
                    </div>
                </form>
                <a href="#" style="text-decoration: none;" onclick="displaysignbox();">Create Account</a>
            </div>
            <!--LOGIN-CODING-->
            <?php 
                    include "./connectionandlinkfiles/connect.php";
                    if(isset($_POST["submit"])){
                        $query="select * from login where REG_ID =:regid and PASSWORD =:passwordid" ;
                        $osi=oci_parse($conn,$query);
                        $reg_id=$_POST["reg-id"];
                        $password=$_POST["password"];
                        oci_bind_by_name($osi,":regid",$reg_id);
                        oci_bind_by_name($osi,":passwordid",$password);
                        oci_execute($osi);
                        $row = oci_fetch_array($osi, OCI_ASSOC+OCI_RETURN_NULLS);
                        $rg=$row["REG_ID"];
                        $pass=$row["PASSWORD"];
                        oci_close($conn);
                        header("location:profile.php"); 
                        if($pass==$password){
                          ?>
                            <script>
                              window.location="profile.php?reg_id=<?php echo $rg; ?>";
                              alert('successful');
                              </script>
                          <?php
                          }
                          else{
                            ?>
                              <script>
                                window.location="index.php"; 
                                alert('invalid');
                            </script>
                           <?php
                        }                        
                    }
                    ?>
            <!--sign up-->
            <div class="signup-box" style="z-index:1111111;">
                <div class="login-heading">
                    <h3>Sign up</h3>
                    <i class="fa-solid fa-arrow-left" onclick="hidesignbox();"></i>
                </div>
                <form class="row" id='signout' method="POST"  enctype="multipart/form-data">
                    <div class="col-sm-12 row" >
                        <div class="col-sm-12">
                            Personal Detail:<br>
                        </div>
                        <div class="col-md-12">
                          <input type="text"  name = 'regid' class="form-control" id="" placeholder="regid*" required aria-describedby="emailHelp">
                        </div>
                        <div class="col-md-12">
                          <input type="text"  name = 'fname' class="form-control" id="" placeholder="First Name*" required aria-describedby="emailHelp">
                        </div>
                        <div class="col-md-12">
                          <input type="text" name='mname' class="form-control" placeholder="Second Name"  id="">
                        </div>
                        <div class="col-md-12">
                          <input type="text" name='lname'class="form-control" placeholder="Last Name" id="exampleInputPassword1">
                        </div>
                        <div class="col-md-12">
                          <input type="date" class="form-control" name='dateofbirth' placeholder="Date of Birth" required id="exampleInputPassword1">
                        </div>
                        <hr>
                        <div class="col-sm-12">
                            Contact details:<br>
                        </div>
                        <div class="col-md-12" id="emailinput">
                            <div>
                                <input type="email" class="col-sm-11" name='emailid' class="form-control" placeholder="email" required id="exampleInputPassword">
                            </div>
                        </div>
                        <div class="col-md-12" id="Mobileinput">
                            <div>
                                <input type="text" class="col-sm-11" class="form-control" name='phoneno' placeholder="Phone No." required id="exampleInputPassword">  
                            </div>
                        </div>
                        <div class="col-md-12" id="linkedininput">
                            <div>
                                <input type="text" class="col-sm-11" class="form-control" name='linkedinid' placeholder="Linkedlink Profile" required id="exampleInputPassword">  
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            Current Address<br>
                        </div>
                        <div class="col-md-6 ">
                            <input type="text" class="form-control" name="curstreetno" placeholder="streetno."> 
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="curstreetname" placeholder="streetname"> 
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control col-md-6" name="curapartment" placeholder="apartment."> 
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control " name="curcity" required placeholder="city" > 
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-controL" name="curstate" required placeholder="State*"> 
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="curzipcode" required placeholder="zipcode">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            Home Address:<br>
                        </div>
                        <div class="col-md-6 ">
                            <input type="text" class="form-control " name="homestreetno" placeholder="streetno."> 
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control " name="homestreetname" placeholder="streetname"> 
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control col-md-6"  name="homeapartment" placeholder="apartment."> 
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control " name="homecity" required placeholder="city"> 
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control "  name="homestate" required placeholder="State*"> 
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control " name="homezipcode" required placeholder="zipcode">
                        </div>
                    </div>
                    <hr>
                    <!--  Qualification:<br> -->
                    <div class="row" id="qualificationbox">
                    Qualification: 
                        <div class="col-sm-12 row">
                            <div class="col-sm-6" >
                                <select name="coursename" class="form-control" required id="" form='signout'>
                                    <option value="MASTER OF COMPUTER APPLICATIONS">MASTER OF COMPUTER APPLICATIONS</option>
                                    <option value="M.TECH (COMPUTER SCIENCE ENGINEERING)">M.TECH (COMPUTER SCIENCE ENGINEERING)</option>
                                    <option value="M.TECH (ARTIFICIAL INTELLIGENCE AND DATA SCIENCE)">M.TECH (ARTIFICIAL INTELLIGENCE AND DATA SCIENCE)</option>
                                    <option value="BRIDGE COURSE-MASTER OF COMPUTER APPLICATIONS">BRIDGE COURSE-MASTER OF COMPUTER APPLICATIONS</option>
                                    <option value="M. PHIL">M. PHIL</option>
                                    <option value="PH.D">PH.D</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <input type="number" class="form-control" name="cgpa"  min="1" max="10" placeholder="CGPA">
                            </div>
                            <div class="col-sm-3">
                                <input type="number" class="form-control" name="batch" min="1967" max="2021" placeholder="YYYY">
                            </div>
                            <div class="col-sm-1">
                                <i class="fa-solid fa-circle-plus" onclick="createqualificationbox()"></i>
                            </div>
                        </div>
                    </div>
                    <hr>  
                    
                    <!-- present job -->
                    
                    Present Job:<br>  
                    <div class="col-sm-12">
                      <input type="text" class="form-control" name='prorganization' placeholder="organization name*">                            
                    </div>
                    <div class="col-sm-6">
                                <input type="text" class="form-control" name='prjobid' required placeholder="job-id*">                            
                    </div>             
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name='prjobposition' required placeholder="job-position*">                            
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name='prsalary'required placeholder="salary*">                            
                    </div>
                    <div class="col-sm-6">
                        <input type="date" class="form-control" name='prdateofjoin' required placeholder="date of joinning*">                            
                    </div>
                    <hr>
                    <div class="col-sm-12">
                    <label for="alumniimage">Add Your Image:</label>
                    <input type="file" name="fileToUpload" required accept='image/png,image/gif,image/jpeg ,image/jpg' id="fileToUpload" palceholder="add your image">
                     </div>
                     <hr>

                    <div class="row">
                      <div class="aboutdepartment">
                        Experience about department:
                      </div>
                      <div class="col-sm-12">
                        <textarea name="about_department" id="" placeholder="Add your opnion about department" cols="60" rows="10"></textarea>
                      </div>
                    </div> 
                    <div class="col-sm-12" style="width:100%;display:flex;align-items:center;justify-content: center;">
                        <input type="submit" name="submitsignout" value='create Account' style="border:none;outline:none;padding:10px 200px; background: #007DC4;color:#fff;border-radius: none;"> 
                      </div>
                      <div class="col-sm-12">
                        <a href="#" style="text-decoration: none;" onclick="hidesignbox();">Back to Login</a>
                      </div>
                    </div>
                  </form>
                  <!--sign up-->
                      
                  <?php include './connectionandlinkfiles/createaccount.php'; ?>
    
            </div>
      </div>
      <div class="col-sm-3"></div>
        <!--ABOUT US-->
      <div class="row about-us" id="about">
          <div class="col-sm-8 about-content1">
            <div class="about-title">About Us</div>
            <p class="content">
              Founded in July 1987, the Department of Computer Science is a center for research and education at the post graduate level and one of the top computer science departments in North India. Strong research groups exist in areas of Natural Language Processing, Pattern Recognition, Digital Image Processing, Parallel Computing and Mobile Computing. Close ties are maintained with researchers with computational interests in departments of other universities. In recognition to its academic and research activities, U.G.C has brought the Department under its Special Assistance Programme for two consecutive periods of five years each.       
            </p>
          </div>
          <div class="col-sm-4 about_img"></div>
          <div class="col-sm-4 about_img2"></div>
          <div class="col-sm-4 about-content2">
            <p class="content">The Department was first brought under SAP(DRS) in April, 2004. The Department has now been upgraded from DRS to DSA level with effect from September 2009 for another five years. The Department was sponsored by Department of Science and Technology (DST) for FIST (Level 1) program in 2006. </p>
          </div>
          <div class="col-sm-4 about-content3">The main educational goal is to prepare students for research and teaching careers either in universities or in industry. The department was one of the first departments in the region to start the 4 year B.Tech. course in Computer Science in 1987. </div>
      </div>
        <!--services-->
      <div class="row services" id="service">
          <div class="col-sm-12 service-title">Our Courses</div>
          <div class="col-sm-6  course-box">
            <div class="course-content">
              <div class="course-name ">M.C.A.<br>(2 YEAR)</div>
              <P class="course-details">
                <span>Master of Computer Applications</span><br>
                Candidate who have completed Bachelor's Degree of Minimum 3 years duration in BCA, B.Sc. (Computer Science/Information Technology), B.Sc. (Mathematics and Computing), B.Sc.(Computer Science, Statistics and Mathematics) or B. Voc.(Software Development) with 50% marks in aggregate 
              </P> 
            </div>
          </div>
          <div class="col-sm-6 course-box">
            <div class="course-content">
              <div class="course-name ">M.TECH<br>(4 YEAR)</div>
              <P class="course-details">
                <span>Master of Technology</span><br>
                Candidate who have completed Bachelor's Degree of Minimum 3 years duration in B.tech, B.Sc. (Computer Science/Information Technology), B.Sc. (Mathematics and Computing), B.Sc.(Computer Science, Statistics and Mathematics) or B. Voc.(Software Development) with 50% marks in aggregate 
              </P> 
            </div>
          </div>
          <div class="col-sm-6 course-box">
            <div class="course-content">
              <div class="course-name ">M.TECH<br>(3 YEAR)</div>
              <P class="course-details">
                <span>Master of Technology</span><br>
                Candidate who have completed Bachelor's Degree of Minimum 3 years duration in B.tech, B.Sc. (Computer Science/Information Technology), B.Sc. (Mathematics and Computing), B.Sc.(Computer Science, Statistics and Mathematics) or B. Voc.(Software Development) with 50% marks in aggregate 
              </P> 
            </div>
          </div>
          <div class="col-sm-6 course-box">
            <div class="course-content">
              <div class="course-name ">M.PHIL<br>(1.5 YEAR)</div>
              <P class="course-details">
                <span>Master of Philosophy </span><br>
                Candidate who have completed Master's Degree of Minimum 2 years duration in M.tech, M.Sc. (Computer Science/Information Technology), M.Sc. (Mathematics and Computing), M.Sc.(Computer Science, Statistics and Mathematics)  with 50% marks in aggregate 
              </P> 
            </div>
          </div>
      </div>
        <!--testimomials-->
      <div class="row testimonials" id="feedback" >
        <div class="col-sm-12 testimonials-title">student feedback</div>
        <div class="col-sm-12 ">
          <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 3"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 3"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5" aria-label="Slide 3"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="6" aria-label="Slide 3"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="7" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <?php include './connectionandlinkfiles/feedback.php'; ?>
              
              <!-- <div class="carousel-item active">                 
                  <div class="opinion-box">
                    <div class="feedback-img"><img src="<?php echo $alurow['ALUMNI_IMAGE']; ?>" class="img-fluid" alt=""></div>
                    <div class="quotatoin-mark"><i class="fa-solid fa-quote-left"></i></div>
                    <div class="student-name"><?php echo $alurow["F_NAME"]; ?><?php echo $alurow['M_NAME']; ?><?php echo $alurow['L_NAME']; ?>, <?php echo $adrow['CITY']; ?> </div>
                    <div class="opinion"><span>"</span><?php echo $op; ?><span>"</span></div>
                    <div class="student-job"><?php echo $alurow["F_NAME"]; ?><?php echo $alurow['M_NAME']; ?><?php echo $alurow['L_NAME']; ?>, <?php echo $jbrow['JOB_POSITION'];?>, <?php echo $jbrow['ORG_NAME'];?> </div>  
                  </div>
              </div>
              <div class="carousel-item">
                <div class="opinion-box">
                  <div class="feedback-img"><img src="image/feedback2.webp" class="img-fluid" alt=""></div>
                  <div class="quotatoin-mark"><i class="fa-solid fa-quote-left"></i></div>
                  <div class="student-name">Lovepreet Singh,Sangrur</div>
                  <div class="opinion"><span>"</span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia itaque ipsam doloribus vero corrupti enim ullam consequuntur deserunt facilis! Magni! <span>"</span></div>
                  <div class="student-job">Lovepreet singh</div>  
                </div>
              </div>
              <div class="carousel-item">
                <div class="opinion-box">
                  <div class="feedback-img"><img src="image/feedback3.jpeg" class="img-fluid" alt=""></div>
                  <div class="quotatoin-mark"><i class="fa-solid fa-quote-left"></i></div>
                  <div class="student-name">Lovepreet Singh,Sangrur</div>
                  <div class="opinion"><span>"</span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia itaque ipsam doloribus vero corrupti enim ullam consequuntur deserunt facilis! Magni! <span>"</span></div>
                  <div class="student-job">Lovepreet singh</div>  
                </div>
              </div> 
              <div class="carousel-item">
                <div class="opinion-box">
                  <div class="feedback-img"><img src="image/feedback4.jpeg" class="img-fluid" alt=""></div>
                  <div class="quotatoin-mark"><i class="fa-solid fa-quote-left"></i></div>
                  <div class="student-name">Lovepreet Singh,Sangrur</div>
                  <div class="opinion"><span>"</span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia itaque ipsam doloribus vero corrupti enim ullam consequuntur deserunt facilis! Magni! <span>"</span></div>
                  <div class="student-job">Lovepreet singh</div>  
                </div>
              </div> --> 
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>
      <!--achievement-->
      <div class="row achievement" id="alumni-association">
        <div class="achievement-background"></div>
        <div class="col-sm-12 achievement-title">Our Alumni Association</div>
        <div class="col-sm-8 achievement-content"> 
        <div class="achievement-person"> Dr. Vishal Goyal</div> 
        <ul class="">
          <li>
            Young Scientist Awardee 2005 at 8TH Punjab Science Congress at Punjab Science Academy, Punjabi University, Patiala.
          </li>
         <li>
           Honorary Membership by North America Punjabi University Alumni Association, North America.
          </li> 
         <li>
           National Merit Scholarship Award by Punjab School Education Board , Mohali.
          </li>
         <li>
           Biography published in Marquis Who’s Who in the World (USA) 2009 in Science and Engineering.
         </li>
         <li>
           Certificate of Appreciation By JETWI.
         </li>
         </ul>
        <div class="achievement-person">Alumni Association</div>
          <p>
            Department has very strong Alumni Association. It was started in 2006. Currently more than 120 alumnis has already been registered as Life members. All the alumni members are connected to each other through the Yahoo group alumni_dcse_pbiuniv. There is also very active department alumni group outside India under the name NAPAA (North America Punjabi University Alumni Association).
           </p>
        </div>
        <div class="col-sm-4 alumni-manager d-flex flex-column justify-content-center align-items-center">
          <div class="img-box ">
            <img src="image/vishalsir.jpg" class="img-fluid" alt=""></div>
            <div class="alumni-manger text-center " style="margin:-30px;">Dr.Vishal Goyal</div>
        </div>
        <div class="col-sm-12 alumni-company">
          <div>
            <div class="col-sm-3 company-img-box">
              <img src="image/companies/bebo.jpeg"  class="img-fluid" alt="">
            </div>
            <div class="col-sm-3 company-img-box">
              <img src="image/companies/Daffodil.jpg"  class="img-fluid" alt="">
            </div>
            <div class="col-sm-3 company-img-box">
            <img src="image/companies/FIS.png"  class="img-fluid" alt="">
          </div>
          <div class="col-sm-3 company-img-box">
            <img src="image/companies/hcl.png"  class="img-fluid" alt="">
          </div>
          <div class="col-sm-3 company-img-box">
            <img src="image/companies/image.jpg"  class="img-fluid" alt="">
          </div>
          <div class="col-sm-3 company-img-box">
            <img src="image/companies/Infosys.png"  class="img-fluid" alt="">
          </div>
          <div class="col-sm-3 company-img-box">
            <img src="image/companies/jtg.png"  class="img-fluid" alt="">
          </div>
          <div class="col-sm-3 company-img-box">
            <img src="image/companies/Newgen.jpg"  class="img-fluid" alt="">
          </div>
          <div class="col-sm-3 company-img-box">
            <img src="image/companies/oati.jfif"  class="img-fluid" alt="">
          </div>
          <div class="col-sm-3 company-img-box">
            <img src="image/companies/quark.png"  class="img-fluid" alt="">
          </div>
          <div class="col-sm-3 company-img-box">
            <img src="image/companies/sap.jfif"  class="img-fluid" alt="">
          </div>
          <div class="col-sm-3 company-img-box">
            <img src="image/companies/tcs.png"  class="img-fluid" alt="">
          </div>
          <div class="col-sm-3 company-img-box">
            <img src="image/companies/Tommy.png"  class="img-fluid" alt="">
          </div>
          <div class="col-sm-3 company-img-box">
            <img src="image/companies/zoxima.png"  class="img-fluid" alt="">
          </div>
          <div class="col-sm-3 company-img-box">
            <img src="image/companies/xennonstack.jfif"  class="img-fluid" alt="">
          </div>
          
        </div>
      </div>
      </div>
      <!--contact us-->
      <div class="row contact-us" id="contact-us">
        <div class="col-sm-6 contact-us-1 ">
          <div class="col-sm-12 testimonials-title contact-us-title2 container-fluid">contact us</div>
          <div>If you have any kind of questions either about our department service or some other.Please feel free to contact us and message us.</div>
          <ul class="contact-list" style="list-style:none;">
            <li style="padding:20px;">
              <div><i class="fa-solid fa-location-dot" style="margin-right:12px;"></i>Computer Science Department,Punjabi University,Patiala</div>
            </li>
            <li style="padding:20px;">
              
              <div>   <i class="fa-solid fa-phone" style="margin-right:12px;"></i>  0175-5136313</div>
            </li>
            <li style="padding:20px;">
              
              <div><i class="fa-solid fa-envelope" style="margin-right:12px;"></i>dcspbi@gmail.com</div>
            </li>
          </ul>
        </div>
        
        <div class="col-sm-6 contact-us-1">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3442.6998878764907!2d76.44355271445154!3d30.3594780105777!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3910280570baae67%3A0x6cf5c94801b9819f!2sDepartment%20of%20Computer%20Science!5e0!3m2!1sen!2sin!4v1650539582760!5m2!1sen!2sin" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>   
        </div>        
          
      
    </div>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/2bcfa3ed68.js" crossorigin="anonymous"></script>   
<script>
  function displayloginbox(){
    document.querySelector(".login").classList.add("active");
  }
  function hideloginbox(){
    document.querySelector(".login").classList.remove("active")
  }
  function displaysignbox(){
        document.querySelector(".signup-box").classList.add("active");
        document.querySelector(".login-box").style.display="none";
    }
    function hidesignbox(){
        document.querySelector(".signup-box").classList.remove("active")
        document.querySelector(".login-box").style.display="block";
      }
      function createqualificationbox(){
        const newqualification = document.createElement('div');
        const newqualificationtext = newqualification.innerHTML="<hr><div class='col-sm-12 row'><div class='col-sm-6'><select name='course' class='form-control col-sm-6'><option value='course'>MCA(Master of Computer Application)</option><option value='course'>M.Tech(Artificial Intelligence)</option>  <option value='course'>M.Tech(computer science)</option><option value='course'>M.Phil</option> <option value='course'>P.hd</option></select></div><div class='col-sm-3'> <input type='number' class='form-control col-sm-3' min='1967' max='2021' placeholder='YYYY'> </div> <div class='col-sm-2'><input type='float' class='form-control col-sm-2' min='1.0' max='10.0' placeholder='SGPA'></div><div class='col-sm-1'><i class='fa-solid fa-circle-minus' class='col-sm-1' onclick='removequalificationbox();'></i></div></div>";
        document.querySelector("#qualificationbox").appendChild(newqualification);
        }
        function removequalificationbox(){
            var  qualificationbox = document.querySelector("#qualificationbox");
            var count = qualificationbox.lastChild;
            console.log(count)
            qualificationbox.removeChild(qualificationbox.lastElementChild);
        }
        function createexperiencebox(){
          const newexperiencebox = document.createElement('div');
          const newexperienceboxtext = newexperiencebox.innerHTML="<HR><div class='col-sm-12 row'><div class='col-sm-12'><input type='text' class='form-control' placeholder='organization name*'></div><div class='col-sm-6'><input type='text' class='form-control' placeholder='job-position*''></div><div class='col-sm-6'><input type='text' class='form-control' placeholder='salary*''></div><div class='col-sm-6'><input type='month' class='form-control' placeholder='date of joinning*''></div><div class='col-sm-5'><input type='month' class='form-control' placeholder='date of leave*''></div><div class='col-sm-1'><i class='fa-solid fa-circle-minus' onclick='removeexperiencebox()'></i> </div></div>";
         /*  newexperiencebox.appendChild(newexperienceboxtext); */
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
     