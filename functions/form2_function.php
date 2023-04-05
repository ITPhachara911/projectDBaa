<?php
    session_start();
    require('../config.php');

    $selected_Study_plan = $_POST['Study_plan'];
    if( $selected_Study_plan == -1 ){
        $selected_Study_plan = $_POST['other_Study_plan'];
    }    
    // print_r( $_POST );


    $sql_query = " SELECT * FROM `appapplications` WHERE `national_id` = '".$_SESSION['new_national_id']."' AND `tcas_round` = ".$_SESSION['TCAS_round']." ;  ";
    $result = $mysqli->query($sql_query);
    $record_number = mysqli_num_rows( $result );
    if( $record_number == 1 ){
        $row = $result->fetch_assoc();
        $_SESSION['app_id'] = $row['app_id'];
        $sql_query = "SELECT * from education_info where application_id  = '".$row['app_id']."';";
        // echo $row['app_id'];
        $result1 = $mysqli->query($sql_query);
        $record_number1 = mysqli_num_rows( $result1 );
        // echo  $record_number1;
        if($record_number1 == 1){
            $update_sql = " UPDATE `education_info` SET  `school_name` = '".$_POST['high_school_name']."',  
                                                        `GPA` = '".$_POST['GPA_total']."',
                                                        `educational_qualificationeducational_qualification` = '".$_POST['Educational_qualification']."',
                                                        `study_plan` = '".$selected_Study_plan."',
                                                        `amphures_id` = '".$_POST['amphure_id']."',
                                                        `provinces_id` = '".$_POST['province_id']."',
                                                        `districts_id` = '".$_POST['district_id']."'
                            WHERE application_id = '".$row['app_id']."';";
            $mysqli->query($update_sql);
        }else{
            $insert_sql = "INSERT INTO `education_info`( `school_name`,`GPA`,`educational_qualificationeducational_qualification`,`study_plan`,`application_id`,`amphures_id`,`provinces_id`,`districts_id`)
            VALUES 
            ('".$_POST['high_school_name']."','".$_POST['GPA_total']."','".$_POST['Educational_qualification']."','".$selected_Study_plan."','".$row['app_id']."','".$_POST['amphure_id']."','".$_POST['province_id']."','".$_POST['district_id']."');";    
            $mysqli->query($insert_sql);
            // echo "insert success";
        }
    }
     // header("Location: ./print_function.php");


    if($_SESSION['status']){
                    $update_sql = " UPDATE `appapplications` SET  `major_id` = '".$_POST['major_id']."'WHERE `national_id` = '".$_SESSION['new_national_id']."' AND `tcas_round` = ".$_SESSION['TCAS_round']." ;";
                    $mysqli->query($update_sql);
                }
     header("Location: ./print_function.php");
?>