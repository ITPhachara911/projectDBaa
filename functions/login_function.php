<?php
    session_start();
    require('../config.php');
    // print_r( $_REQUEST );

    $national_id = $mysqli->real_escape_string( $_POST['inputNationalID'] );
    $tcas_round = $mysqli->real_escape_string( $_POST['inputTCASRound'] );
    $sql_query = " SELECT app_id FROM `appapplications` WHERE `national_id` = '".$national_id."' AND `tcas_round` = ".$tcas_round." ;  ";
    // echo $sql_query;
    $result = $mysqli->query($sql_query);
    $record_number = mysqli_num_rows( $result );
    if( $record_number == 1 ){           
        $personal_data = $result->fetch_assoc();

        $personal_data['app_id'];

        $sql_query = "SELECT * FROM appapplications 
        INNER JOIN address_info ON appapplications.app_id = address_info.application_id
        INNER JOIN contact_info ON appapplications.app_id = contact_info.application_id
        INNER JOIN education_info ON appapplications.app_id = education_info.application_id
        INNER JOIN parent_info ON appapplications.app_id = parent_info.application_id
        INNER JOIN provinces ON address_info.provinces_id = provinces.id
        INNER JOIN amphures ON address_info.amphures_id = amphures.id
        INNER JOIN districts ON address_info.districts_id = districts.id
        INNER JOIN major ON appapplications.major_id = major.major_id
        INNER JOIN faculty_of ON major.facility_id = faculty_of.Faculty_id
        WHERE appapplications.app_id = ".$personal_data['app_id'].";";


       $result = $mysqli->query($sql_query);
       $record_number = mysqli_num_rows( $result );
       if( $record_number == 1 ){
        $personal_data = $result->fetch_assoc();

        print_r( $personal_data );

        $_SESSION['national_id'] = $personal_data['national_id'];        
        $_SESSION['TCAS_round'] = $personal_data['tcas_round'];        
        $_SESSION['app_data'] = $personal_data;
        $_SESSION['new_national_id'] = $national_id;
       }
    }    
    else{
        $_SESSION['new_national_id'] = $national_id;
        $_SESSION['TCAS_round'] = $tcas_round;
        // $_SESSION['app_data'] = array();
    }
    
    header("Location: ../views/form1.php");
    


?>