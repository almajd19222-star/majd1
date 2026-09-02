<?php include_once "inc/session.php"; ?>
<?php include_once "inc/config.php";
include_once "inc/users_roles.php"; ?>
<?php

 /* for ($i=1; $i<=100; $i++) {
  $sql="insert into reports_info (`details_type`, `jeha`, ketab_num, `ketab_date`, `added_by`) values (
    'صادر'
    , 'الإدارة المركزية للمعلومات',
    $i
    , '2023-03-01',
    '$user')";
  mysqli_query($conn, $sql);
}  */

$sql="SET FOREIGN_KEY_CHECKS = 0";
mysqli_query($conn, $sql);

if($admin == 7){
if(isset($_POST['submit'])){    

    $sql = "TRUNCATE `backup_history`";
    mysqli_query($conn, $sql);
    $sql = "TRUNCATE `details`";
    mysqli_query($conn, $sql);
    /* $sql = "TRUNCATE `details_sub`";
    mysqli_query($conn, $sql); */
    $sql = "TRUNCATE `dewan`";
    mysqli_query($conn, $sql);
    $sql = "TRUNCATE `feech_info`";
    mysqli_query($conn, $sql);
    $sql = "TRUNCATE `ketab`";
    mysqli_query($conn, $sql);
    $sql = "TRUNCATE `ketab_reply`";
    mysqli_query($conn, $sql);
    $sql = "TRUNCATE `masader`";
    mysqli_query($conn, $sql);
    $sql = "TRUNCATE `masader_info`";
    mysqli_query($conn, $sql);
    $sql = "TRUNCATE `masader_dates`";
    mysqli_query($conn, $sql);
    $sql = "TRUNCATE `masader_evaluate`";
    mysqli_query($conn, $sql);
    $sql = "TRUNCATE `masader_info_index`";
    mysqli_query($conn, $sql);
    $sql = "TRUNCATE `masader_money_box`";
    mysqli_query($conn, $sql);
    $sql = "TRUNCATE `masader_move`";
    mysqli_query($conn, $sql);
    $sql = "TRUNCATE `masader_work`";
    mysqli_query($conn, $sql);
    $sql = "TRUNCATE `reports_brief_index`";
    mysqli_query($conn, $sql);
    $sql = "TRUNCATE `notifications`";
    mysqli_query($conn, $sql);
    $sql= "TRUNCATE `reports_info`";
    mysqli_query($conn, $sql);
    
   $sql = "TRUNCATE `studies_association`";
   mysqli_query($conn, $sql);
   $sql = "TRUNCATE `studies_association_attachment`";
   mysqli_query($conn, $sql);
   $sql = "TRUNCATE `studies_association_projects`";
   mysqli_query($conn, $sql);
   $sql = "TRUNCATE `studies_car_shops`";
   mysqli_query($conn, $sql);
   $sql = "TRUNCATE `studies_computers_phones_shops`";
   mysqli_query($conn, $sql);
   $sql = "TRUNCATE `studies_estate_offices`";
   mysqli_query($conn, $sql);
   $sql = "TRUNCATE `studies_exchange_shops`";
   mysqli_query($conn, $sql);
   $sql = "TRUNCATE `studies_factions`";
   mysqli_query($conn, $sql);
   $sql = "TRUNCATE `studies_factions_attachment_1`";
   mysqli_query($conn, $sql);
   $sql = "TRUNCATE `studies_factions_attachment_2`";
   mysqli_query($conn, $sql);
   $sql = "TRUNCATE `studies_factions_attachment_3`";
   mysqli_query($conn, $sql);
   $sql = "TRUNCATE `studies_factions_attachment_4`";
   mysqli_query($conn, $sql);
   $sql = "TRUNCATE `studies_factions_attachment_5`";
   mysqli_query($conn, $sql);
   $sql = "TRUNCATE `studies_factions_attachment_6`";
   mysqli_query($conn, $sql);
   $sql = "TRUNCATE `studies_factions_attachment_7`";
   mysqli_query($conn, $sql);
   $sql = "TRUNCATE `studies_factions_attachment_8`";
   mysqli_query($conn, $sql);
   $sql = "TRUNCATE `studies_factions_attachment_9`";
   mysqli_query($conn, $sql);
   $sql = "TRUNCATE `studies_factions_attachment_10`";
   mysqli_query($conn, $sql);
   $sql = "TRUNCATE `studies_fertilizers_and_pesticides`";
   mysqli_query($conn, $sql);
   $sql = "TRUNCATE `studies_fertilizers_and_pesticides_attachment`";
   mysqli_query($conn, $sql);
   $sql = "TRUNCATE `studies_forgery_and_stamps_offices`";
   mysqli_query($conn, $sql);
   $sql = "TRUNCATE `studies_it_shops`";
   mysqli_query($conn, $sql);
   $sql = "TRUNCATE `studies_kiosks`";
   mysqli_query($conn, $sql);
   $sql = "TRUNCATE `studies_organizations`";
   mysqli_query($conn, $sql);
   $sql = "TRUNCATE `studies_organization_attachment`";
   mysqli_query($conn, $sql);
   $sql = "TRUNCATE `studies_organization_projects`";
   mysqli_query($conn, $sql);
   $sql = "TRUNCATE `studies_smugglers`";
   mysqli_query($conn, $sql);
   $sql = "TRUNCATE `studies_training_centre`";
   mysqli_query($conn, $sql);
   $sql = "TRUNCATE `studies_training_centre_attachment`";
   mysqli_query($conn, $sql);
   $sql = "TRUNCATE `studies_training_centre_projects`";
   mysqli_query($conn, $sql);
   $sql = "TRUNCATE `studies_universities`";
   mysqli_query($conn, $sql);
   $sql = "TRUNCATE `studies_universities_attachment`";
   mysqli_query($conn, $sql);
   $sql = "TRUNCATE `studies_unofficial_civil_activities`";
   mysqli_query($conn, $sql);
   $sql = "TRUNCATE `studies_weapon_shops`";
   mysqli_query($conn, $sql);
   $sql = "TRUNCATE `studies_weapon_shops_attachment`";
   mysqli_query($conn, $sql);
   $sql = "TRUNCATE `studies_weapon_traders`";
   mysqli_query($conn, $sql);
   
   $sql = "TRUNCATE `study_codes`";
   mysqli_query($conn, $sql);
   $sql = "TRUNCATE `study`";
   mysqli_query($conn, $sql);
   $sql = "TRUNCATE `study_jehat`";
   mysqli_query($conn, $sql);
   $sql = "TRUNCATE `tameem`";
   mysqli_query($conn, $sql);
   $sql = "TRUNCATE `tbl_uploads`";
   mysqli_query($conn, $sql);
   $sql = "TRUNCATE `processing_to_sader`";
   mysqli_query($conn, $sql);
   $sql = "TRUNCATE `dup_names_check`";
   mysqli_query($conn, $sql);
   $sql = "TRUNCATE `processing_to_processing`";
   mysqli_query($conn, $sql);

   
   $sql = "TRUNCATE `work_tracking`";
   mysqli_query($conn, $sql);


   $sql = "TRUNCATE `mawkoof_adjudication_mahdar`";
   mysqli_query($conn, $sql);
   $sql = "TRUNCATE `mawkoof_arresting_report`";
   mysqli_query($conn, $sql);
   $sql = "TRUNCATE `mawkoof_data`";
   mysqli_query($conn, $sql);
   $sql = "TRUNCATE `mawkoof_deposits`";
   mysqli_query($conn, $sql);
   $sql = "TRUNCATE `mawkoof_detained_receiving`";
   mysqli_query($conn, $sql);
    $sql = "TRUNCATE `mawkoof_extend_investigation_period`";
    mysqli_query($conn, $sql);
    $sql = "TRUNCATE `mawkoof_final_result`";
    mysqli_query($conn, $sql);
    $sql = "TRUNCATE `mawkoof_id3aa_decision`";
    mysqli_query($conn, $sql);
    $sql = "TRUNCATE `mawkoof_id3aa_private_right`";
    mysqli_query($conn, $sql);
    $sql = "TRUNCATE `mawkoof_id3aa_public_right`";
    mysqli_query($conn, $sql);
    $sql = "TRUNCATE `mawkoof_investigation_mahdar`";
    mysqli_query($conn, $sql);
    $sql = "TRUNCATE `mawkoof_investigation_mahdar_attachment`";
    mysqli_query($conn, $sql);
    $sql = "TRUNCATE `mawkoof_investigation_results`";
    mysqli_query($conn, $sql);
    $sql = "TRUNCATE `mawkoof_judicial_judgment`";
    mysqli_query($conn, $sql);
    $sql = "TRUNCATE `mawkoof_judicial_session`";
    mysqli_query($conn, $sql);
    $sql = "TRUNCATE `mawkoof_medical_condition`";
    mysqli_query($conn, $sql);
    $sql = "TRUNCATE `mawkoof_pressure_on_accused`";
    mysqli_query($conn, $sql);
    $sql = "TRUNCATE `mawkoof_testimonies`";
    mysqli_query($conn, $sql);
    $sql = "TRUNCATE `mawkoof_120`";
    mysqli_query($conn, $sql);
    $sql = "TRUNCATE `log_encrypt_pass`";
    mysqli_query($conn, $sql);
   


$sql = "TRUNCATE `DAKHILI_brothers`";
mysqli_query($conn, $sql);
$sql = "TRUNCATE `DAKHILI_courses`";
mysqli_query($conn, $sql);
$sql = "TRUNCATE `DAKHILI_health_status`";
mysqli_query($conn, $sql);
$sql = "TRUNCATE `DAKHILI_job_free_army`";
mysqli_query($conn, $sql);
$sql = "TRUNCATE `DAKHILI_moves_inside_hts`";
mysqli_query($conn, $sql);
$sql = "TRUNCATE `DAKHILI_personal_information`";
mysqli_query($conn, $sql);
$sql = "TRUNCATE `DAKHILI_previous_arrests`";
mysqli_query($conn, $sql);
$sql = "TRUNCATE `DAKHILI_relatives_detained`";
mysqli_query($conn, $sql);
$sql = "TRUNCATE `DAKHILI_relatives_free_army`";
mysqli_query($conn, $sql);
$sql = "TRUNCATE `DAKHILI_relatives_hts`";
mysqli_query($conn, $sql);
$sql = "TRUNCATE `DAKHILI_relatives_inside_syria`";
mysqli_query($conn, $sql);
$sql = "TRUNCATE `DAKHILI_relatives_isis`";
mysqli_query($conn, $sql);
$sql = "TRUNCATE `DAKHILI_relatives_outside_syria`";
mysqli_query($conn, $sql);
$sql = "TRUNCATE `DAKHILI_relatives_wanted_gss`";
mysqli_query($conn, $sql);
$sql = "TRUNCATE `DAKHILI_travel`";
mysqli_query($conn, $sql);

$sql = "TRUNCATE `jehat`";
mysqli_query($conn, $sql);

$sql = "TRUNCATE `coordinates`";
mysqli_query($conn, $sql);

$sql = "TRUNCATE `studies_2022`";
mysqli_query($conn, $sql);


$sql = "TRUNCATE `jehat`";
mysqli_query($conn, $sql);

    $sql="SET FOREIGN_KEY_CHECKS = 1";
    mysqli_query($conn, $sql);
    header ("Location: index.php");

}

if(isset($_POST['wared'])){

   /*  $sql2 = "DELETE FROM `details` where details_type='وارد'";
    $sql3 = "DELETE FROM `details_sub` where details_type='وارد'";
    $sql4 = "DELETE FROM `dewan` where details_type='وارد'";
    $sql5 = "DELETE FROM `feech_info` where details_type='وارد'";
    $sql6 = "DELETE FROM `ketab` where details_type='وارد'";
    $sql7 = "DELETE FROM `ketab_reply` where details_type='وارد'";
    $sql11= "DELETE FROM `reports_info` where details_type='وارد'";
    $sql12 = "DELETE FROM `study` where details_type='وارد'";
    $sql13 = "DELETE FROM `tbl_uploads` where details_type='وارد'";


    mysqli_query($conn, $sql2);
    mysqli_query($conn, $sql3);
    mysqli_query($conn, $sql4);
    mysqli_query($conn, $sql5);
    mysqli_query($conn, $sql6);
    mysqli_query($conn, $sql7);
    mysqli_query($conn, $sql11);
    mysqli_query($conn, $sql12);
    mysqli_query($conn, $sql13); */



    header ("Location: index.php");

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="t.php" method="post">
    <input type="submit" name="submit" value="حذف جميع البيانات" onclick="return confirm('متأكد من الحذف؟');"/>
    <br><br>
    <input type="submit" name="wared" value="حذف جميع البيانات الوارد" onclick="return confirm('متأكد من الحذف؟');"/>
    </form>
</body>
</html>
<?php }?>