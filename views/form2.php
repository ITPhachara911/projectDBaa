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



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>



    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/checkout/">

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../assets/css/form-validation.css" rel="stylesheet">

    <style>
    .app_subsection {
        padding-top: 20px;
        color: red;
        font-weight: 800;
        font-size: 120%;
    }
    </style>

</head>

<body>
    <div class="container">
        <div>
            <h2>กรอกข้อมูลการเรียนและเลือกหลักสูตร</h2>


            <h3 class="app_subsection">ข้อมูลผู้เรียน:: ผู้สมัคร
                <?php  echo $_SESSION['fname']." ".$_SESSION['lname'] ?></h3>

            <form class="form-signin" action="../functions/form2_function.php" method="POST">
                <div class="col-lg-12 col-12 row">
                    <div class="col-lg-12 col-12 row">

                        <div class="col-lg-4 col-12 form-group">
                            <label for="high_school_name">ชื่อโรงเรียนสถานศึกษา</label>
                            <input value="<?php if( isset($_SESSION['app_data_old']) &&  isset($_SESSION['app_data_old']['school_name'])) {
                                            echo $_SESSION['app_data_old']['school_name'];
                                       } ?>" type="text" class="form-control" id="high_school_name"
                                name="high_school_name" placeholder="ชื่อโรงเรียนสถานศึกษา">
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









                        <div class="col-lg-4 col-12 form-group">
                            <label for="Educational_qualification">วุฒิการศึกษา</label>
                            <input value="<?php if( isset($_SESSION['app_data_old']) &&  isset($_SESSION['app_data_old']['educational_qualificationeducational_qualification'])) {
                                            echo $_SESSION['app_data_old']['educational_qualificationeducational_qualification'];
                                       } ?>" type="text" class="form-control" id="Educational_qualification"
                                name="Educational_qualification" placeholder="วุฒิการศึกษา">
                        </div>
                        <div class="col-lg-4 col-12 form-group">
                            <label for="Study_plan">แผนการเรียน</label>
                            <select id="Study_plan" name="Study_plan" class=" form-control " name="" id="">
                                    <option <?php  if(isset($_SESSION['app_data_old']) && $_SESSION['app_data_old']['study_plan'] == 'วิทย์-คณิต'){  echo 'selected="selected"'; } ?> class=" form-control "  value="วิทย์-คณิต">วิทย์-คณิต</option>
                                    <option <?php  if(isset($_SESSION['app_data_old']) && $_SESSION['app_data_old']['study_plan'] == 'ศิลป์–คำนวณ'){  echo 'selected="selected"'; } ?> class=" form-control " value="ศิลป์–คำนวณ">ศิลป์–ภาษา</option>
                                    <option <?php  if(isset($_SESSION['app_data_old']) && $_SESSION['app_data_old']['study_plan'] == 'ศิลป์–ภาษา'){  echo 'selected="selected"'; } ?> class=" form-control " value="ศิลป์–ภาษา">ศิลป์–ภาษา</option>
                                    <option class=" form-control " value="-1">อื่นๆ</option>
                            </select>
                            <input value="<?php  if( isset($_SESSION['app_data_old']) && $_SESSION['app_data_old']['study_plan'] != 'วิทย์-คณิต' &&  $_SESSION['app_data_old']['study_plan'] != 'ศิลป์–คำนวณ' &&  $_SESSION['app_data_old']['study_plan'] != 'ศิลป์–ภาษา'){ echo  $_SESSION['app_data_old']['study_plan'];} ?>"  style="display:none <?php if( isset($_SESSION['app_data_old']) && $_SESSION['app_data_old']['study_plan'] != 'วิทย์-คณิต' &&  $_SESSION['app_data_old']['study_plan'] != 'ศิลป์–คำนวณ' &&  $_SESSION['app_data_old']['study_plan'] != 'ศิลป์–ภาษา'){

                            echo   "a";

                            }

                            ?>" name="other_Study_plan" id="other_Study_plan" class="form-control"  type="text">
                        </div>
                        <div class="col-lg-4 col-12 form-group">
                            <label for="GPA_total">เกรดเฉลี่ยสะสม</label>
                            <input value="<?php if( isset($_SESSION['app_data_old']) &&  isset($_SESSION['app_data_old']['GPA'])) {
                                            echo $_SESSION['app_data_old']['GPA'];
                                       } ?>" type="text" class="form-control" id="GPA_total" name="GPA_total"
                                placeholder="เกรดเฉลี่ยสะสม">
                        </div>
                    </div>
                    <h3 class="app_subsection">ข้อมูลหลักสูตร</h3>
                    <div class="col-lg-12 col-12 row">
                        <div class="col-lg-12 col-12 row">
                            <div class="col-lg-4 col-12  form-group">
                                <label for="major_id">เลือกหลักสูตร</label>
                                <select style=" width: 360px; " class="form-select form-control" aria-label="Default select example" name="major_id"
                                    id="major_id">
                                    <option <?php if( isset($_SESSION['app_data_old']) && $_SESSION['app_data_old']['major_id'] == 'CS01') {
                                            echo 'selected="selected"';
                                       } ?> value="CS01">Computer Engineering(วิทยาการคอมพิวเตอร์)</option>
                                    <option <?php if( isset($_SESSION['app_data_old']) && $_SESSION['app_data_old']['major_id'] == 'CE02') {
                                            echo 'selected="selected"';
                                       } ?> value="CE02">Computer Engineering(วิศวกรรมคอมพิวเตอร์)</option>
                                </select>
                            </div>
                            <div style="padding-top:18px; position:relative; right:-500px; margin-top:10px">
                                <button class="btn btn-sm btn-primary" type="submit">บันทึกข้อมูล</button>
                            </div>
            </form>
        </div>
    </div>
    </div>



    <script>
    window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
    </script>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/script.js"></script>

    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        $("#Study_plan").change(function() {
            console.log($(this).val());
            if ($(this).val() == -1) {
                $("#other_Study_plan").show();
                $("#other_Study_plan").focus();
            } else {
                $("#other_Study_plan").hide()
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