 <?php
 include_once "inc/session.php";
 include_once('inc/config_server.php' );
 //include_once('inc/footer_k_pub_server.php' );
 
$td_class = "show-read-more"; 
$jeha1 = $_GET['jeha'];
$details_type = $_GET['details_type'];
$gettype=$_GET['type'];
$getview='';
 
$table = 'reports_info'; 
$primaryKey = "id";

$columns = array(
  

array( 'db' => '`t1`.`id`',             'dt' => 0, 'formatter' => function( $d, $row ) {
  if($admin == 6) {   
    if($jeha_profile !== 'الإدارة المركزية للمعلومات'){
      if(empty($row_reports["ketab_brief"])){
        return '<tr class="" style="background-color:#46B7FA">';
      }
      else{
        if($row_reports["r_important"]=='نعم'){ 
          return '<tr style="background-color:#c1f9b3">';
        }else{
          return '<tr>';
        }
       
      }   
    }else{
      if (@strpos($row_reports["added_by"], $_SESSION['user']) !== false) {
        if($row_reports["r_important"]=='نعم'){ 
          return '<tr style="background-color:#c1f9b3">';
        }else{
          return '<tr>';
        }
      }else{
        return '<tr class="" style="background-color:#46B7FA">';
      }
    }                               
  }else{
    if($row_reports["r_important"]=='نعم'){ 
      return '<tr style="background-color:#c1f9b3">';
    }else{
      return '<tr>';
    }
  }
  if ($jeha_profile == 'الإدارة المركزية للمعلومات' && $details_type =='قيد المعالجة') {
    if (@strpos($row[24], '** للأرشفة **') !== false) {
        return '';
    } else {
          return '<a href="k_pub_archive.php?id='.$d.'&jeha='.$row[4].'&archive_report_info=true" onclick="'."return confirm('متأكد من أرشفة هذا الكتاب؟');".'"><i style="font-size: 2rem" class="zwicon-delete"></i></a>';
       }
  }else{
    return '';
  } 
},'field' => 'id' ),

	array( 'db' => '`t1`.`id`',             'dt' => 1, 'formatter' => function( $d, $row ) {
    
   
    
    if ($admin == 1 || $admin == 7 || $admin==5) {      
        if ($details_type !=='صادر') { 
            return '<a href="delete.php?id='.$d.'&jeha='.$row[4].'&delete_report_info=true" onclick="'."return confirm('متأكد من الحذف؟');".'"><i style="font-size: 2rem" class="zwicon-delete"></i></a>';
         }else{
          return '';
        } 
        return '';
    }else{
      return '';
    } 
  },'field' => 'id' ),

  array( 'db' => '`t1`.`id`',             'dt' => 2, 'formatter' => function( $d, $row ) {
    return '<a href="k_pub_edit.php?id='.$d.'"><i style="font-size: 2rem" class="zwicon-edit-circle"></i></a>';},'field' => 'id' ),
  
  array( 'db' => '`t1`.`ketab_type`',             'dt' => 3, 'formatter' => function( $d, $row ) {
    
      

    if ($details_type=='قيد المعالجة' && $admin != 6) {
        if ($d=='public') {
            
            return '<a href="processing_to_sader.php?id='.$row[0].'&ketab_num='.$row[9].'&jeha='.$row[4].'&details_type='.$details_type.'&resala_type=كتاب&e_year='.date('Y',strtotime($row[10])).'&added_by_old='.$row[30].'&type=k_pub" onclick="'."return confirm('متأكد من تصدير البيانات المحددة؟');".'"><i style="font-size: 2rem" class="zwicon-export"></i></a>';
          
        } else {
          return '';
        }
    }else{
      return '';
    }
    },'field' => 'ketab_type' ),

  array( 'db' => '`t1`.`id`',             'dt' => 4, 'formatter' => function( $d, $row ) {
    
   
    if ($details_type=='وارد' && $admin != 6) {
        return '<a href="wared_to_processing2.php?id='.$d.'" onclick="'."return confirm('متأكد من نسخ البيانات  المحددة إلى مرحلة المعالجة؟');".'"><i style="font-size: 2rem" class="zwicon-edit-circle"></i></a>';
    }
  },'field' => 'id' ),

    array( 'db' => '`t1`.`jeha`',         'dt' => 5, 'field' => 'jeha' ),

    array( 'db' => '`t1`.`ketab_type`',   'dt' => 6, 'formatter' => function( $d, $row ) {
      if($d=='private'){
        return 'شخصي';
      }else{
        return 'عام';
      }
      
    },'field' => 'ketab_type' ),

	array( 'db' => '`t1`.`isReport`',       'dt' => 7, 'field' => 'isReport' ),
	array( 'db' => '`t1`.`dewan_num`',      'dt' => 8, 'field' => 'dewan_num' ),
	array( 'db' => '`t1`.`dewan_date`',     'dt' => 9, 'field' => 'dewan_date' ),
	array( 'db' => '`t1`.`ketab_num`',      'dt' => 10, 'field' => 'ketab_num'),
  array( 'db' => '`t1`.`ketab_date`',     'dt' => 11, 'field' => 'ketab_date', 'formatter' => function( $d, $row ) {
      return date( 'Y-m-d', strtotime($d));
  }),
	array( 'db' => '`t1`.`edbara_num`',     'dt' => 12, 'field' => 'edbara_num' ),
	array( 'db' => '`t1`.`edbara_date`',    'dt' => 13, 'field' => 'edbara_date' ),
  array( 'db' => '`t1`.`r_handle_date`',  'dt' => 14, 'field' => 'r_handle_date' ),
  array( 'db' => '`t1`.`send_date`',      'dt' => 15, 'field' => 'send_date' ),
	array( 'db' => '`t1`.`r_address`',      'dt' => 16, 'field' => 'r_address' ),
	array( 'db' => '`t1`.`r_title`',        'dt' => 17, 'field' => 'r_title' ),
	array( 'db' => '`t1`.`r_follow_date`',  'dt' => 18, 'field' => 'r_follow_date' ),
	array( 'db' => '`t1`.`r_follow`',       'dt' => 19, 'field' => 'r_follow' ),
  array( 'db' => '`t1`.`r_following_date`',       'dt' => 20, 'field' => 'r_following_date' ),
	array( 'db' => '`t1`.`sendfrom`',       'dt' => 21, 'field' => 'sendfrom' ),
	array( 'db' => '`t1`.`sendto`',         'dt' => 22, 'field' => 'sendto' ),
  array( 'db' => '`t1`.`report_brief`',         'dt' => 23, 'field' => 'report_brief' ),

  array( 'db' => '`t1`.`ketab_brief`',         'dt' => 24, 'field' => 'ketab_brief' ),
 
  
  array( 'db' => '`t1`.`speed_level`',    'dt' => 25, 'field' => 'speed_level' ),
  array( 'db' => '`t1`.`info_level`',     'dt' => 26, 'field' => 'info_level' ),
  array( 'db' => '`t1`.`security_level`', 'dt' => 27, 'field' => 'security_level' ),
  array( 'db' => '`t1`.`info_masdar`',    'dt' => 28, 'field' => 'info_masdar' ),

  array( 'db' => '`t1`.`report_notes`',    'dt' => 29, 'field' => 'report_notes' ),

  array( 'db' => '`t1`.`r_attach`',       'dt' => 30, 'formatter' => function( $d, $row ) {
    return '<a href="'.$url_host.'/inc/file_upload/file_decrypt.php?path='.$d.'">تنزيل</a>';
  },'field' => 'r_attach' ),
  array( 'db' => '`t1`.`added_by`',       'dt' => 31, 'field' => 'added_by' ),
  array( 'db' => '`t1`.`add_date`',       'dt' => 32, 'field' => 'add_date' )
);
 

$joinQuery = "FROM `reports_info` AS `t1` ";



$extraWhere = "IF($admin = 9 , t1.isPrivate='نعم', IF($admin = 10 , t1.isPrivate='لا', IF(t1.jeha = '$jeha_profile' OR t1.origin_sendfrom = '$jeha_profile' , t1.isPrivate!='', t1.isPrivate='لا'))) 
AND IF($admin=6 ,t1.origin_sendfrom = '$jeha1' , t1.jeha = '$jeha1') 
AND IF('$gettype'='personal' , t1.ketab_type='personal', t1.ketab_type!='') 
AND IF('$gettype'='public' , t1.ketab_type='public', t1.ketab_type!='')                               
AND IF('$getview'='all' , t1.details_type !='' , t1.details_type = '$details_type')";
                               



//$groupBy = "";
//$having = "";


require( 'ssp.customized.php' );

echo json_encode(
	SSP::simple( $_POST, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having )
);
?>
