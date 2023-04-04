<?php
    session_start();
    require('../config.php');
    // print_r( $_POST );


      $sql_query = " SELECT * FROM `appapplications` WHERE `national_id` = '".$_SESSION['new_national_id']."' AND `tcas_round` = ".$_SESSION['TCAS_round']." ;  ";
    $result = $mysqli->query($sql_query);
    $record_number = mysqli_num_rows( $result );
    if( $record_number == 1 ){
    $row = $result->fetch_assoc();

    $insert_sql = "INSERT INTO `education_info`( `school_name`,`GPA`,`educational_qualificationeducational_qualification`,`study_plan`,`application_id`)
         VALUES 
         ('".$_POST['high_school_name']."','".$_POST['GPA_total']."','".$_POST['Educational_qualification']."','".$_POST['Study_plan']."','".$row['app_id']."');";    
     $mysqli->query($insert_sql);
    }
     // header("Location: ./print_function.php");


    if($_SESSION['status']){
            $sql_query = " SELECT * FROM `appapplications` WHERE `national_id` = '".$_SESSION['new_national_id']."' AND `tcas_round` = ".$_SESSION['TCAS_round']." ;  ";
            $result = $mysqli->query($sql_query);
            $record_number = mysqli_num_rows( $result );
        
            if( $record_number == 1 ){
            $row = $result->fetch_assoc();
            // print_r( $row['app_id'] );
                if(isset($row['app_id'])){
                    $update_sql = " UPDATE `parent_info` SET  `application_id` = '".$row['app_id']."';";
                    $update_sql .= " UPDATE `address_info` SET  `application_id` = '".$row['app_id']."';";
                    $update_sql .= " UPDATE `contact_info` SET  `application_id` = '".$row['app_id']
                    ."';";
                    $update_sql .= " UPDATE `appapplications` SET  `major_id` = '".$_POST['major_id']."';";
                    $mysqli->multi_query($update_sql);



                    $_SESSION['app_id'] = $row['app_id'];
                }

            // $insert_sql = "INSERT INTO `education_info`( `school_name`,`GPA`,`educational_qualificationeducational_qualification`,'study_plan','application_id') VALUES ('".$_POST['high_school_name']."','".$_POST['GPA_total']."','".$_POST['Educational_qualification']."','".$_POST['Study_plan']."','".$row['app_id']."');";   
            //     $mysqli->query($insert_sql);
            }
    }
     header("Location: ./print_function.php");
?>