<?php

     session_start();
     require('../config.php');

     $sql_query = "SELECT appapplications.prefix_th,appapplications.fname_th,appapplications.lname_th,appapplications.national_id,appapplications.birthday_date,appapplications.nationality,appapplications.ethnicity,appapplications.religion,address_info.details_address,provinces.name,amphures.name_th,districts.name_th,contact_info.phone_number,contact_info.email,education_info.GPA,education_info.study_plan ,major.major_name,faculty_of.Faculty_name  FROM appapplications 
     INNER JOIN address_info ON appapplications.app_id = address_info.application_id
     INNER JOIN contact_info ON appapplications.app_id = contact_info.application_id
     INNER JOIN education_info ON appapplications.app_id = education_info.application_id
     INNER JOIN parent_info ON appapplications.app_id = parent_info.application_id
     INNER JOIN provinces ON address_info.provinces_id = provinces.id
     INNER JOIN amphures ON address_info.amphures_id = amphures.id
     INNER JOIN districts ON address_info.districts_id = districts.id
     INNER JOIN major ON appapplications.major_id = major.major_id
     INNER JOIN faculty_of ON major.facility_id = faculty_of.Faculty_id
     WHERE appapplications.app_id = '".$_SESSION['app_id']."';";
     $result = $mysqli->query($sql_query);
     $record_number = mysqli_num_rows( $result );

     if( $record_number == 1){
        $personal_data = $result->fetch_assoc();
        $_SESSION['app_data'] = $personal_data;    
     }
     header("Location: ../views/print.php");
?>

