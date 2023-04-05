<?php
    session_start();
    require('../config.php');

    $sql = "SELECT * FROM provinces";
    // $query = mysqli_query($conn, $sql);
    $query = $mysqli->query($sql);

    if(!isset($_SESSION['new_national_id'])){
        header("Location: ../views/login.php");
    }
?>




<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>ข้อมูลส่วนตัว</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/checkout/">

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../assets/css/form-validation.css" rel="stylesheet">
</head>
<style>
.app_subsection {
    padding-top: 20px;
    color: red;
    font-weight: 800;
    font-size: 120%;
}
</style>

<body class="bg-light">

    <div class="container">
        <div class="py-5 text-center">
            <img class="mb-4" src="../assets/images/KU_Logo.png" alt="" width="100">
            <h2>กรอกข้อมูลส่วนตัว</h2>
            <p class="lead">
                <?php echo isset($_SESSION['national_id']) ? "ผู้สมัคร : ".$_SESSION['app_data_old']['prefix_th']." ".$_SESSION['app_data_old']['fname_th']." ".$_SESSION['app_data_old']['lname_th'] : "ผู้สมัครใหม่";  ?>
            </p>
        </div>



        <form class="form-signin" action="../functions/form1_function.php" method="POST">
            <div>
                ข้อมูลส่วนบุคคลอ้างอิงจากบัตรประชาชน<br><br>
                <label for="">เลขประจำตัวประชาชน</label>
                <input class=" form-control " type="text" required
                    value="<?php echo isset($_SESSION['national_id']) ?  $_SESSION['national_id'] : $_SESSION['new_national_id'] ;  ?>">
                <div class="app_subsection">
                    ข้อมูลภาษาไทย
                </div>
                <div class="col-lg-12 col-12 row">
                    <div class="col-lg-4 col-12 form-group">
                        <label for="th_prefix">คำนำหน้า</label><br>
                        <select name="th_prefix" id="th_prefix" class=" form-control ">
                            <option <?php if( isset($_SESSION['app_data_old']) && $_SESSION['app_data_old']['prefix_th']=='นาย') {
                                            echo 'selected="selected"';
                                       } ?> value="นาย">นาย</option>
                            <option <?php if(isset($_SESSION['app_data_old']) && $_SESSION['app_data_old']['prefix_th']=='นาง') {
                                            echo 'selected="selected"';
                                       } ?> value="นาง">นาง</option>
                            <option <?php if(isset($_SESSION['app_data_old']) && $_SESSION['app_data_old']['prefix_th']=='นางสาว') {
                                            echo 'selected="selected"';
                                       } ?> value="นางสาว">นางสาว</option>
                        </select>
                    </div>

                    <?php
                        $th_firstname_value = "";
                        if( isset( $_SESSION['app_data_old']['fname_th'] ) ){
                            $th_firstname_value = $_SESSION['app_data_old']['fname_th'] ; 
                        }                    
                    ?>

                    <div class="col-lg-4 col-12 form-group">
                        <label for="th_firstname">ชื่อ</label>
                        <input value="<?php echo $th_firstname_value ?>" type="text" class="form-control" required
                            id="th_firstname" name="th_firstname" placeholder="ชื่อภาษาไทย">
                    </div>

                    <?php
                        $th_lastname_value = "";
                        if( isset( $_SESSION['app_data_old']['lname_th'] ) ){
                            $th_lastname_value = $_SESSION['app_data_old']['lname_th'] ; 
                        }                    
                    ?>

                    <div class="col-lg-4 col-12 form-group">
                        <label for="th_lastname">นามสกุล</label>
                        <input value="<?php echo $th_lastname_value  ?>" type="text" class="form-control" required
                            id="th_lastname" name="th_lastname" placeholder="นามสกุลภาษาไทย">
                    </div>
                </div>


                <div class="app_subsection">
                    ข้อมูลอังกฤษ
                </div>
                <div class="col-lg-12 col-12 row">
                    <div class="col-lg-4 col-12  form-group">
                        <label for="en_prefix">Prefix</label><br>
                        <select class="form-select form-control "" aria-label="Default select example" name="en_prefix" id="en_prefix" >
                            <option <?php if( isset($_SESSION['app_data_old']) &&  $_SESSION['app_data_old']['prefix_en']=='Mr.') {
                                            echo 'selected="selected"';
                                       } ?> value="Mr.">Mr.</option>
                            <option <?php if(isset($_SESSION['app_data_old']) &&  $_SESSION['app_data_old']['prefix_en']=='Ms.') {
                                            echo 'selected="selected"';
                                       } ?> value="Ms.">Ms.</option>
                            <option <?php if(isset($_SESSION['app_data_old']) &&  $_SESSION['app_data_old']['prefix_en']=='Mrs.') {
                                            echo 'selected="selected"';
                                       } ?> value="Mrs.">Mrs.</option>
                        </select>
                    </div>
                    <div class="col-lg-4 col-12 form-group">

                        <?php
                        $en_firstname_value = "";
                        if( isset( $_SESSION['app_data_old']['fname_en'] ) ){
                            $en_firstname_value = $_SESSION['app_data_old']['fname_en'] ; 
                        }                    
                    ?>

                        <label for="en_firstname">Firstname</label>
                        <input type="text" class="form-control" id="en_firstname" name="en_firstname" required
                            placeholder="Firstname" value="<?php echo $en_firstname_value;  ?>">
                    </div>


                    <?php
                        $en_lasttname_value = "";
                        if( isset( $_SESSION['app_data_old']['lname_en'] ) ){
                            $en_lasttname_value = $_SESSION['app_data_old']['lname_en'] ; 
                        }                    
                    ?>

                    <div class="col-lg-4 col-12 form-group">
                        <label for="en_lastname">Lastname</label>
                        <input value="<?php echo $en_lasttname_value ?>" placeholder="Lastname" type="text" required
                            class="form-control" id="en_lastname" name="en_lastname">
                    </div>
                </div>

                <div class="col-lg-12 col-12 row">
                    <div class="col-lg-4 col-12 form-group">
                        <?php
                        $birthday_value = "";
                        if( isset( $_SESSION['app_data_old']['birthday_date'] ) ){
                            $birthday_value = $_SESSION['app_data_old']['birthday_date'] ; 
                        }                    
                    ?>
                        <label for="app_birthday">ปี/เดือน/วัน เกิด</label>
                        <input type="text" class="form-control" id="app_birthday" name="app_birthday" required
                            placeholder="Birthday" value="<?php echo $birthday_value; ?>">
                    </div>
                </div>


                <div class="col-lg-12 col-12 row">
                    <div class="col-lg-4 col-12  form-group">
                        <label for="ethnicity">เชื้อชาติ</label><br>
                        <select name="ethnicity" id="ethnicity" class="form-control">
                            <option <?php 
                        if( isset($_SESSION['app_data_old']) && $_SESSION['app_data_old']['ethnicity'] == 'ไทย'){
                            echo 'selected="selected"';
                        }
                        ?> value="ไทย">ไทย</option>
                            <option <?php if( isset($_SESSION['app_data_old']) && $_SESSION['app_data_old']['ethnicity'] != 'ไทย'){
                             echo 'selected="selected"';
                        }  ?> value="-1">อื่นๆ</option>
                        </select>
                        <input class=" form-control " required value=" <?php if( isset($_SESSION['app_data_old']) && $_SESSION['app_data_old']['ethnicity'] != 'ไทย'){
                            echo $_SESSION['app_data_old']['ethnicity'];
                    } ?> " type="text" name="other_ethnicity" id="other_ethnicity" style="display:none<?php if( isset($_SESSION['app_data_old']) && $_SESSION['app_data_old']['ethnicity'] != 'ไทย'){
                        echo "a";
                } ?>;">
                    </div>
                    <div class="col-lg-4 col-12 form-group">
                        <label for="nationality">สัญชาติ</label><br>
                        <select name="nationality" id="nationality" class="form-control">
                            <option <?php if( isset($_SESSION['app_data_old']) && $_SESSION['app_data_old']['nationality'] == 'ไทย'){
                             echo 'selected="selected"';
                        }  ?> value="ไทย">ไทย</option>
                            <option <?php if( isset($_SESSION['app_data_old']) && $_SESSION['app_data_old']['nationality'] != 'ไทย'){
                             echo 'selected="selected"';
                        }  ?> value="-1">อื่นๆ</option>
                        </select>
                        <input class=" form-control " required value=" <?php if( isset($_SESSION['app_data_old']) && $_SESSION['app_data_old']['nationality'] != 'ไทย') {
                          echo   $_SESSION['app_data_old']['nationality'];                               }
                    ?>  " type="text" name="other_nationality" id="other_nationality" style="display:none<?php if( isset($_SESSION['app_data_old']) && $_SESSION['app_data_old']['nationality'] != 'ไทย'){
                        echo "a";
                    } ?>;">
                    </div>
                    <div class="col-lg-4 col-12 form-group">
                        <label for="religion">ศาสนา</label><br>
                        <select name="religion" id="religion" class="form-control">
                            <option <?php if( isset($_SESSION['app_data_old']) &&  $_SESSION['app_data_old']['religion']=='พุทธ') {
                                            echo 'selected="selected"';
                                       } ?> value="พุทธ">พุทธ</option>
                            <option <?php if( isset($_SESSION['app_data_old']) &&  $_SESSION['app_data_old']['religion']=='คริสต์') {
                                            echo 'selected="selected"';
                                       } ?> value="คริสต์">คริสต์</option>
                            <option <?php if( isset($_SESSION['app_data_old']) &&  $_SESSION['app_data_old']['religion']=='อิสลาม') {
                                            echo 'selected="selected"';
                                       } ?> value="อิสลาม">อิสลาม</option>
                            <option <?php if( isset($_SESSION['app_data_old']) && $_SESSION['app_data_old']['religion'] != 'พุทธ' &&  $_SESSION['app_data_old']['religion'] != 'คริสต์' &&  $_SESSION['app_data_old']['religion'] != 'อิสลาม') {
                                            echo 'selected="selected"';
                                       } ?> value="-1">อื่นๆ</option>
                        </select>
                        <input class=" form-control " required value="<?php if( isset($_SESSION['app_data_old']) && $_SESSION['app_data_old']['religion'] != 'พุทธ' &&  $_SESSION['app_data_old']['religion'] != 'คริสต์' &&  $_SESSION['app_data_old']['religion'] != 'อิสลาม'){

                            echo   $_SESSION['app_data_old']['religion'] ;

                    }
                    
                    ?> " type="text" name="other_religion" id="other_religion" style="display:none <?php if( isset($_SESSION['app_data_old']) && $_SESSION['app_data_old']['religion'] != 'พุทธ' &&  $_SESSION['app_data_old']['religion'] != 'คริสต์' &&  $_SESSION['app_data_old']['religion'] != 'อิสลาม'){

                        echo   "a";

                }
                
                ?>;">
                    </div>
                </div>


                <div class="app_subsection">
                    ข้อมูลติดต่อ
                </div>

                ที่อยู่ที่สามารถติดต่อได้


                <div class="col-lg-12 col-12 row mt-3">
                    <div class="col-4 form-group ">
                        <label for="Address">บ้านเลขที่/หมู่/ชื่อหมูบ้าน(เรียงตามลำดับ)</label>
                        <input required value="<?php if( isset($_SESSION['app_data_old']) &&  isset($_SESSION['app_data_old']['details_address'])) {
                                            echo $_SESSION['app_data_old']['details_address'];
                                       } ?>" type="text" class="form-control" id="Address" name="Address"
                            placeholder="บ้านเลขที่/หมู่/ชื่อหมูบ้าน">
                    </div>

                    <div class="col-4 form-group ">
                        <label for="street">ถนน</label>(ถ้าไม่มีให้ใส่ - )
                        <input value="<?php if( isset($_SESSION['app_data_old']) &&  isset($_SESSION['app_data_old']['Road'])) {
                                            echo $_SESSION['app_data_old']['Road'];
                                       } ?>" type="text" class="form-control" id="street" name="street"
                            placeholder="ถนน">
                    </div>
                    <div class="form-group col-md-4">
                            <label for="province">จังหวัด</label>
                            <select require name="province_id" id="province" class="form-control">
                            <option value="">เลือกจังหวัด</option> 

                            <?php while($result = $query->fetch_assoc()): ?>
                                <option name="province_id" value="<?=$result['id']?>"><?= $result['name'] ?></option>
                                <?php endwhile; ?>                                   
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="amphure">อำเภอ</label>
                            <select require name="amphure_id" id="amphure" class="form-control">
                                <option value="">เลือกอำเภอ</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="district">ตำบล/แขวง</label>
                            <select require name="district_id" id="district" class="form-control">
                                <option value="">เลือกตำบล</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="zipcode">รหัสไปรษณีย์</label>
                            <select name="zipcode" id="zipcode" class="form-control">
                                <option id="valzip" value="">รหัสไปรษณีย์</option>
                            </select>

                        </div>

                    </div>
                </div>
                <div style="margin-left: 2px;" class="row">
                <div class="col-4 form-group ">
                        <label for="Email">อีเมล</label>
                        <input  required value="<?php if( isset($_SESSION['app_data_old']) &&  isset($_SESSION['app_data_old']['email'])) {
                                            echo $_SESSION['app_data_old']['email'];
                                       } ?>" type="email" class="form-control" id="Email" name="Email"
                            placeholder="อีเมล">
                    </div>
                    <div class="col-4 form-group ">
                        <label for="Telephone">เบอร์โทร</label>
                        <input require value="<?php if( isset($_SESSION['app_data_old']) &&  isset($_SESSION['app_data_old']['phone_number'])) {
                                            echo $_SESSION['app_data_old']['phone_number'];
                                       } ?>" type="text" class="form-control" id="Telephone" name="Telephone"
                            placeholder="เบอร์โทร">
                    </div>
                </div>

                <div class="app_subsection">
                    แบบสำรวจอาชีพผู้ปกครอง
                </div>
                <div class="col-lg-12 col-12 row mt-3">
                    <div class="form-group col-md-4">
                            <label for="ocq">อาชีพผู้ปกครอง</label>
                            <select name="ocq" id="ocq" class="form-control">
                            <option value="">เลือกอาชีพ</option> 
                                <option <?php if( isset($_SESSION['app_data_old']) && $_SESSION['app_data_old']['occupation'] == 'เกษตรกร'){echo 'selected="selected"'; } ?> value="เกษตรกร">เกษตรกร</option>
                                <option <?php if( isset($_SESSION['app_data_old']) && $_SESSION['app_data_old']['occupation'] == 'ข้าราชการ'){echo 'selected="selected"'; } ?> value="ข้าราชการ">ข้าราชการ</option>
                                <option  value="-1">อื่นๆ</option>
                            </select>
                            <input class=" form-control " value="<?php if( isset($_SESSION['app_data_old']) && $_SESSION['app_data_old']['occupation'] != 'เกษตรกร' &&  $_SESSION['app_data_old']['occupation'] != 'ข้าราชการ'){ echo $_SESSION['app_data_old']['occupation'];} ?>  " style="display: none<?php if( isset($_SESSION['app_data_old']) && $_SESSION['app_data_old']['occupation'] != 'เกษตรกร' &&  $_SESSION['app_data_old']['occupation'] != 'ข้าราชการ'){
                                echo   "a";
                                }
                                ?>;" id="other_ocq" type="" 
                            name="other_ocq">
                        </div>
                         <div class="form-group col-md-4">
                            <label for="income">รายได้ผู้ปกครอง</label>
                            <select name="income" id="income" class="form-control">
                            <option value="">เลือกรายได้</option> 
                                <option <?php if( isset($_SESSION['app_data_old']['income']) && $_SESSION['app_data_old']['income'] == 15000 && isset($_SESSION['app_data_old']['income'])){ echo 'selected="selected"'; } ?>  value="15000">15000</option>
                                <option <?php if(isset($_SESSION['app_data_old']['income']) && $_SESSION['app_data_old']['income'] == 30000 && isset($_SESSION['app_data_old']['income']) ){ echo 'selected="selected"'; } ?>  value="30000">30000</option>
                                <option value="-1">อื่นๆ</option>
                            </select>
                             <input class=" form-control " value=" <?php if( isset($_SESSION['app_data_old']) && isset($_SESSION['app_data_old']['income']) && $_SESSION['app_data_old']['income'] != 15000 &&  $_SESSION['app_data_old']['income'] != 30000){

                                echo   $_SESSION['app_data_old']['income'] ;

                                }

                                ?> " style="display: none<?php if( isset($_SESSION['app_data_old']) && isset($_SESSION['app_data_old']['income']) &&$_SESSION['app_data_old']['income'] != 15000 &&  $_SESSION['app_data_old']['income'] != 30000){

                                    echo   "a";
            
                            }
                            
                            ?>;" id="other_income" type="" name="other_income">
                        </div>
                 </div>

            <div style="padding-top:18px;">
                <button class="btn btn-sm btn-primary btn-block" type="submit">หน้าต่อไป</button>
            </div>
        </form>

        <!-- <?php
        
            // for($i=0;$i<20;$i++){
            //     echo "<br>";
            // }
        ?> -->

        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">&copy; 2017-2018 Company Name</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Privacy</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="#">Support</a></li>
            </ul>
        </footer>
    </div>


    <link rel="stylesheet" href="../assets/jquery-ui/jquery-ui.css">

    <!-- <script src="js/jquery.min.js"></script>
    <script src="js/script.js"></script> -->

    
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/script.js"></script>

    <script src="../assets/jquery-ui/jquery.js"></script>
    <script src="../assets/jquery-ui/jquery-ui.js"></script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script>
    window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
    </script>
    <script type="text/javascript">

    </script>


    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {

        'use strict';

        $("#app_birthday").datepicker({ 
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true,
            yearRange: '-100:+0'
    });
         
        $("#religion").change(function() {
            console.log($(this).val());
            if ($(this).val() == -1) {
                $("#other_religion").show();
                $("#other_religion").focus();
            } else {
                $("#other_religion").hide()
            }

        });

        $("#ethnicity").change(function() {
            console.log($(this).val());
            if ($(this).val() == -1) {
                $("#other_ethnicity").show();
                $("#other_ethnicity").focus();
            } else {
                $("#other_ethnicity").hide()
            }

        });

        $("#nationality").change(function() {
            console.log($(this).val());
            if ($(this).val() == -1) {
                $("#other_nationality").show();
                $("#other_nationality").focus();
            } else {
                $("#other_nationality").hide()
            }

        });
            $("#ocq").change(function() {
            console.log($(this).val());
            if ($(this).val() == -1) {
                $("#other_ocq").show();
                $("#other_ocq").focus();
            } else {
                $("#other_ocq").hide()
            }

        });
                $("#income").change(function() {
            console.log($(this).val());
            if ($(this).val() == -1) {
                $("#other_income").show();
                $("#other_income").focus();
            } else {
                $("#other_income").hide()
            }

        });

        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');

            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
    </script>
</body>

</html>