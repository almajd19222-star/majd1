<?php
 include_once "inc/session.php";
 include_once('inc/config_server.php' ); 
 $td_class = "show-read-more"; 
 $jeha1 = $_GET['jeha'];
$details_type = $_GET['details_type'];

 
$table = 'dewan'; 
$primaryKey = "id";

$columns = array(
  array( 'db' => '`t1`.`id`',            'dt' => 0, 'formatter' => function( $d, $row ) {
    if ($admin == 1 || $admin == 7 || $admin==5 || $admin==3) {      
        if ($details_type !=='صادر') { 
            return '<a href="delete.php?id='.$d.'&jeha='.$row[4].'&delete_dewan=true" onclick="'."return confirm('متأكد من الحذف؟');".'"><i style="font-size: 2rem" class="zwicon-delete"></i></a>';
         }else{
          return '';
        } 
        return '';
    }else{
      return '';
    } 
  },'field' => 'id' ),

  array( 'db' => '`t1`.`id`',             'dt' => 1, 'formatter' => function( $d, $row ) {
    return '<a href="d_edit.php?id='.$d.'"><i style="font-size: 2rem" class="zwicon-edit-circle"></i></a>';},'field' => 'id' ),

  array( 'db' => '`t1`.`id`',             'dt' => 2, 'formatter' => function( $d, $row ) {
      return '<a href="print-elements.php?id='.$d.'&jeha='.$row[4].'&details_type='.$details_type.'&type=dewan"><i style="font-size: 2rem" class="zwicon-printer"></i></a>';},'field' => 'id' ),

	array( 'db' => '`t1`.`jeha`',           'dt' => 3, 'field' => 'jeha' ),
	array( 'db' => '`t1`.`dewan_num`',      'dt' => 4, 'field' => 'dewan_num' ),
	array( 'db' => '`t1`.`dewan_date`',     'dt' => 5, 'field' => 'dewan_date' ),
	array( 'db' => '`t1`.`ketab_num`',      'dt' => 6, 'field' => 'ketab_num'),
  array( 'db' => '`t1`.`ketab_date`',     'dt' => 7, 'field' => 'ketab_date', 'formatter' => function( $d, $row ) {
      return date( 'Y-m-d', strtotime($d));
  }),
	array( 'db' => '`t1`.`sendfrom`',       'dt' => 8, 'field' => 'sendfrom' ),
	array( 'db' => '`t1`.`sendto`',         'dt' => 9, 'field' => 'sendto' ),
  array( 'db' => '`t1`.`brief`',          'dt' => 10, 'field' => 'brief' ),
  array( 'db' => '`t1`.`following_date`', 'dt' => 11, 'field' => 'following_date' ),
	array( 'db' => '`t1`.`sendto_date`',    'dt' => 12, 'field' => 'sendto_date' ),
	array( 'db' => '`t1`.`result`',         'dt' => 13, 'field' => 'result' ),
	array( 'db' => '`t1`.`note`',           'dt' => 14, 'field' => 'note' ),
  array( 'db' => '`t1`.`d_attach`',       'dt' => 15, 'formatter' => function( $d, $row ) {
    if ($admin != 3) {       
          if(@strlen($d)>300){
            return '<a href="data:application/jpeg;base64,'.base64_encode($d).'">تنزيل</a>';           
        }else{
          if (!empty($d)) {
            return '<a href="'.$url_host.'/inc/file_upload/file_decrypt.php?path='.$d.'">تنزيل</a>';              
          }else{
            return 'لا يوجد مرفقات';
          }
        }
    }
  },'field' => 'd_attach' ),
  array( 'db' => '`t1`.`added_by`',       'dt' => 16, 'field' => 'added_by' ),
  array( 'db' => '`t1`.`add_date`',       'dt' => 17, 'field' => 'add_date' )
);
 

$joinQuery = "FROM `dewan` AS `t1` ";



$extraWhere = "IF (jeha = '$jeha_profile' OR origin_sendfrom = '$jeha_profile' , isPrivate!='', isPrivate='لا') AND details_type= '$details_type' AND jeha= '$jeha1'";
                               



//$groupBy = "";
//$having = "";


require( 'ssp.customized.php' );

echo json_encode(
	SSP::simple( $_POST, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having )
);
?>
