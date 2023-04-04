<?php
        session_start();

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
            <h2>กรอกข้อมูลกาารเรียนและเลือกหลักสูตร</h2>


            <h3 class="app_subsection">ข้อมูลผู้เรียน:: ผู้สมัคร
                <?php  echo $_SESSION['fname']." ".$_SESSION['lname'] ?></h3>

            <form class="form-signin" action="../functions/form2_function.php" method="POST">
                <div class="col-lg-12 col-12 row">
                    <div class="col-lg-12 col-12 row">

                        <div class="col-lg-4 col-12 form-group">
                            <label for="high_school_name">ชื่อโรงเรียนสถานศึกษา</label>
                            <input value="<?php if( isset($_SESSION['app_data']) &&  isset($_SESSION['app_data']['high_school_name'])) {
                                            echo $_SESSION['app_data']['high_school_name'];
                                       } ?>" type="text" class="form-control" id="high_school_name"
                                name="high_school_name" placeholder="ชื่อโรงเรียนสถานศึกษา">
                        </div>
                        <div class="col-lg-4 col-12 form-group">
                            <label for="Educational_qualification">วุฒิการศึกษา</label>
                            <input value="<?php if( isset($_SESSION['app_data']) &&  isset($_SESSION['app_data']['Educational_qualification'])) {
                                            echo $_SESSION['app_data']['Educational_qualification'];
                                       } ?>" type="text" class="form-control" id="Educational_qualification"
                                name="Educational_qualification" placeholder="วุฒิการศึกษา">
                        </div>
                        <div class="col-lg-4 col-12 form-group">
                            <label for="Study_plan">แผนการเรียน</label>
                            <input value="<?php if( isset($_SESSION['app_data']) &&  isset($_SESSION['app_data']['Study_plan'])) {
                                            echo $_SESSION['app_data']['Study_plan'];
                                       } ?>" type="text" class="form-control" id="Study_plan" name="Study_plan"
                                placeholder="แผนการเรียน">
                        </div>
                        <div class="col-lg-4 col-12 form-group">
                            <label for="GPA_total">เกรดเฉลี่ยสะสม</label>
                            <input value="<?php if( isset($_SESSION['app_data']) &&  isset($_SESSION['app_data']['GPA_total'])) {
                                            echo $_SESSION['app_data']['GPA_total'];
                                       } ?>" type="text" class="form-control" id="GPA_total" name="GPA_total"
                                placeholder="เกรดเฉลี่ยสะสม">
                        </div>
                    </div>
                    <h3 class="app_subsection">ข้อมูลหลักสูตร</h3>
                    <div class="col-lg-12 col-12 row">
                        <div class="col-lg-12 col-12 row">
                            <div class="col-lg-4 col-12  form-group">
                                <label for="major_id">เลือกหลักสูตร</label>
                                <select class="form-select" aria-label="Default select example" name="major_id"
                                    id="major_id">
                                    <option <?php if( isset($_SESSION['app_data']) && $_SESSION['app_data']['major_id'] == 'CS01') {
                                            echo 'selected="selected"';
                                       } ?> value="CS01">Computer Engineering(วิทยาการคอมพิวเตอร์)</option>
                                    <option <?php if( isset($_SESSION['app_data']) && $_SESSION['app_data']['major_id'] == 'CE02') {
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

    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {



        'use strict';

        // $("#app_birthday" ).datepicker();
        $("#app_birthday").datepicker({
            dateFormat: 'yy-mm-dd'
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