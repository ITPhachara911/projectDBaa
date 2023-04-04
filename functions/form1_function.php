<?php
    session_start();
    require('../config.php');
    // print_r( $_POST );



    $fname = $mysqli->real_escape_string( $_POST['th_firstname'] );
    $lname = $mysqli->real_escape_string( $_POST['th_lastname'] );

    $selected_religion = $_POST['religion'];
    if( $selected_religion == -1 ){
        $selected_religion = $_POST['other_religion'];
    }    
    $selected_ethnicity = $_POST['ethnicity'];
    if( $selected_ethnicity == -1 ){
        $selected_ethnicity = $_POST['other_ethnicity'];
    }    
    $selected_nationality = $_POST['nationality'];
    if( $selected_nationality == -1 ){
        $selected_nationality = $_POST['other_nationality'];
    } 
      $ocq = $_POST['ocq'];
    if( $ocq == -1 ){
        $ocq = $_POST['other_ocq'];
    } 
      $income = $_POST['income'];
    if( $income == -1 ){
        $income = $_POST['other_income'];
    } 
    
    $date = "'".date('Y-m-d', strtotime(str_replace('-', '/', $_POST['app_birthday'])))."'";

    // CHECK existing record
    $sql_query = " SELECT * FROM `appapplications` WHERE `national_id` = '".$_SESSION['new_national_id']."' AND `tcas_round` = ".$_SESSION['TCAS_round']." ;  ";
    $result = $mysqli->query($sql_query);
    $record_number = mysqli_num_rows( $result );
    //  print( $record_number." ".$date );

    if( $record_number == 1 ){
        $update_sql = " UPDATE `appapplications` SET  `religion` = '".$selected_religion."', 
                                        `prefix_th` =  '".$_POST['th_prefix']."',
                                        `fname_th` = '".$_POST['th_firstname']."',
                                        `lname_th` =  '".$_POST['th_lastname']."',
                                        `prefix_en` = '".$_POST['en_prefix']."',
                                        `fname_en` =  '".$_POST['en_firstname']."',
                                        `lname_en` = '".$_POST['en_lastname']."',
                                        `ethnicity` = '".$selected_ethnicity."',
                                        `nationality` =  '".$selected_nationality."',
                                        `birthday_date` =  ".$date."
                                         WHERE national_id = '".$_SESSION['new_national_id']."' ;";

         $update_sql .= " UPDATE `address_info` SET  `details_address` = '".$_POST['Address']."',
                                                     `Road` = '".$_POST['street']."',
                                                     `provinces_id` = '".$_POST['province_id']."',
                                                     `amphures_id` = '".$_POST['amphure_id']."',
                                                     `districts_id` = '".$_POST['district_id']."'
                                        WHERE national_id = '".$_SESSION['new_national_id']."' ;";  

         $update_sql .= " UPDATE `contact_info` SET  `email` = '".$_POST['Email']."',  
                                                     `phone_number` = '".$_POST['Telephone']."'
                                        WHERE national_id = '".$_SESSION['new_national_id']."' ;";                      
         $update_sql .= " UPDATE `parent_info` SET  `income` = '".$income."',  
                                                     `occupation` = '".$ocq."'
                                        WHERE national_id = '".$_SESSION['new_national_id']."' ;";                      
        
        $mysqli->multi_query($update_sql);
    }
    else{

        

        $insert_sql = "INSERT INTO `appapplications` (`tcas_round`, `prefix_th`, `fname_th`, `lname_th`, `prefix_en`, `fname_en`, `lname_en`, `birthday_date`, `ethnicity`, `nationality`, `religion`,`national_id`)
        VALUES ('".$_SESSION['TCAS_round']."','".$_POST['th_prefix']."','".$_POST['th_firstname']."','".$_POST['th_lastname']."','".$_POST['en_prefix']."','".$_POST['en_firstname']."','".$_POST['en_lastname']."',".$date.",'".$_POST['ethnicity']."','".$_POST['nationality']."','".$selected_religion."','".$_SESSION['new_national_id']."');";
        
        
         $insert_sql .= "INSERT INTO `address_info` (`details_address`, `Road`, `provinces_id`, `amphures_id`, `districts_id`)
         VALUES ('".$_POST['Address']."','".$_POST['street']."','".$_POST['province_id']."','".$_POST['amphure_id']."','".$_POST['district_id']."');
         ";    

        $insert_sql .= "INSERT INTO `contact_info` ( `email`,`phone_number`)
                             VALUES ('".$_POST['Email']."','".$_POST['Telephone']."');";    
         $insert_sql .= "INSERT INTO `parent_info` ( `income`,`occupation`)
                             VALUES ('".$income."','".$ocq."');";
         echo $insert_sql;

        $mysqli->multi_query($insert_sql);
        $_SESSION['status'] = $mysqli;
    }

    $_SESSION['fname'] = $fname;
    $_SESSION['lname'] = $lname;



    header("Location: ../views/form2.php");

?>