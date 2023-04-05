<?php 
    session_start();
    // print_r( $_SESSION['app_data'] );
    
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Print</title>
</head>
    <style>

    </style>
<body>
    <div class="container" >
        <div class="row ">
            <div class="logo text-center my-3">
                <img src="../assets/images/ku.gif" alt="" width="150px" >
            </div>
            <div class="content-header text-center" style="margin-bottom:50px; " >
                    <p>ใบสมัคร<br>
                        การคัดเลือกเข้าศึกษาต่อในหาลัยวิยาลัยเกษตรศาสตร์<br>
                        วิทยาเขตเฉลิมพระเกียรติ&nbsp;&nbsp;จังหวัดสกลนคร<br>
                        ประจำปีการศึกษา 2566 รอบที่ 1 (โครงการขยายโอกาสทางการศึกษา)
                    </p>
            </div>
                        <div class="content-main-section1" style=" padding:0px 80px 0px 80px ;">
                                    <div class="d-flex">
                                        <p class="p-2 flex-fill">เลขประจำชาชน : <?php echo $_SESSION['app_data']['national_id']; ?></p>
                                        <p class="p-2 flex-fill">ชื่อ-นามสกุล : <?php echo $_SESSION['app_data']['fname_th']." ".$_SESSION['app_data']['lname_th']; ?></p>
                                    </div>
                                    <div class="d-flex">
                                        <p class="p-2 flex-fill">วัน เดือน ปีเกิด : <?php echo $_SESSION['app_data']['birthday_date']; ?></p>
                                        <p class="p-2 flex-fill">สัญชาติ : <?php echo $_SESSION['app_data']['nationality']; ?></p>
                                        <p class="p-2 flex-fill">เชื้อชาติ : <?php echo $_SESSION['app_data']['ethnicity']; ?></p>
                                        <p class="p-2 flex-fill">ศาสนา : <?php echo $_SESSION['app_data']['religion']; ?></p>
                                    </div>
                                    <div class="d-flex">
                                        <p class="p-2 flex-fill">บ้านเลขที่ : <?php echo $_SESSION['app_data']['details_address']." ตำบล  ".$_SESSION['app_data']['name_th']." จังหวัด ".$_SESSION['app_data']['name']." ".$_SESSION['app_data']['zip_code']; ?></p>
                                    </div>
                                    <div class="d-flex">
                                        <!-- <p class="p-2 flex-fill">โทรศัพท์บ้าน :</p> -->
                                        <p class="p-2 flex-fill">โทรศัพท์มือถือ : <?php echo $_SESSION['app_data']['phone_number']; ?></p>
                                        <p class="p-2 flex-fill">email : <?php echo $_SESSION['app_data']['email']; ?></p>
                                    </div>

                                    <b><h6 style="margin-top: 10px; margin-left: 5px;">ข้อมูลการศึกษา</h6> </b>
                                    <div style="margin-left: 5px;">
                                        <p>ผลการเรียนเฉลี่ยสะสม ม.6 (<?php echo $_SESSION['app_data']['study_plan']; ?>) รวมเป็น :  <?php echo $_SESSION['app_data']['GPA']; ?></p>
                                        <p>ชื่อโรงเรียน : <?php echo $_SESSION['app_data']['school_name']." อำเภอ ".$_SESSION['app_data2']['อำเภอของรร']." จังหวัด ".$_SESSION['app_data2']['จังหวัดของรร']." รหัสไปรษณีย์ ".$_SESSION['app_data2']['เลขไปษณีของรร']; ?></p>
                                    </div>
                                    <b><h6 style="margin-top: 10px; margin-left: 5px;">สมัครเข้า <?php echo $_SESSION['app_data']['Faculty_name']; ?></h6> </b>
                                    <b><h6 style="margin-top: 10px; margin-left: 5px;">หลักสูตร <?php echo $_SESSION['app_data']['major_name']; ?></h6> </b>
                                        <p>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ข้าพเจ้าขอรับรองว่ามีคุณสมบัติครบตามประกาศการรับสมัครมหาวิทยาลัยเกษตรศาสตร์ วิทยาเขตเฉลิมพระเกียรติ
                                            จังหวัดสกลนคร ทุกประการ หากตรวจสอบในภายหลังว่าขาดคุณสมบัติ ข้าพเจ้ายินดีให้มหาวิทยลัยตัดสิทธิ์ใน
                                            การเข้าศึกษา โดยไมมีอุทธรณ์ใดๆ ทั้งสิ้น
                                        </p>
                                


                                   <div style="justify-content:end; display: grid; margin-top: 30px;">
                                        <p >ลงชื่อ <?php echo $_SESSION['app_data']['fname_th']." ".$_SESSION['app_data']['lname_th']; ?> ผู้สมัคร</p>
                                        <p>(...............................................................)</p>
                                        <p id="datenow"></p>
                                    </div>
                    

        </div>
    </div>
    <script>
        const date = new Date()

const result = date.toLocaleDateString('th-TH', {
year: 'numeric',
month: 'long',
day: 'numeric',
})

let datenow = document.getElementById('datenow');
datenow.innerHTML = "     วันที่  "+result;
console.log(result)
    
    </script>

</body>
</html>
