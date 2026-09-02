<?php
 include_once "inc/session.php";
 include_once('inc/config_server.php' );
 //include_once('inc/footer_k_pub_server.php' );
 
 $td_class = "show-read-more"; 
 $jeha1 = $_GET['jeha'];
$details_type = $_GET['details_type'];

 
$table = 'dewan'; 
$primaryKey = "id";

$columns = array(
  array( 'db' => 'id',            'dt' => 0, 'formatter' => function( $d, $row ) {
    if ($admin == 1 || $admin == 7 || $admin==5 || $admin==3) {      
        if ($details_type !=='صادر') { 
          $hasPerm_delete = $_GET['hasPerm_delete'];
      if($hasPerm_delete == '1'){
            return '<a href="delete.php?id='.$d.'&jeha='.$row[4].'&delete_dewan=true" onclick="'."return confirm('متأكد من الحذف؟');".'"><i style="font-size: 2rem" class="zwicon-delete"></i></a>';
          }else{
            return '';
          }
         }else{
          return '';
        } 
        return '';
    }else{
      return '';
    } 
  },'field' => 'id' ),

  array( 'db' => 'id',             'dt' => 1, 'formatter' => function( $d, $row ) {
    return '<a href="d_edit.php?id='.$d.'"><i style="font-size: 2rem" class="zwicon-edit-circle"></i></a>';},'field' => 'id' ),

  array( 'db' => 'id',             'dt' => 2, 'formatter' => function( $d, $row ) {
      return '<a href="print-elements.php?id='.$d.'&jeha='.$row[4].'&details_type='.$details_type.'&type=dewan"><i style="font-size: 2rem" class="zwicon-printer"></i></a>';},'field' => 'id' ),

	array( 'db' => 'jeha',           'dt' => 3, 'field' => 'jeha' ),
	array( 'db' => 'dewan_num',      'dt' => 4, 'field' => 'dewan_num' ),
	array( 'db' => 'dewan_date',     'dt' => 5, 'field' => 'dewan_date' ),
	array( 'db' => 'ketab_num',      'dt' => 6, 'field' => 'ketab_num'),
  array( 'db' => 'ketab_date',     'dt' => 7, 'field' => 'ketab_date', 'formatter' => function( $d, $row ) {
      return date( 'Y-m-d', strtotime($d));
  }),
	array( 'db' => 'sendfrom',       'dt' => 8, 'field' => 'sendfrom' ),
	array( 'db' => 'sendto',         'dt' => 9, 'field' => 'sendto' ),
  array( 'db' => 'brief',          'dt' => 10, 'field' => 'brief' ),
  array( 'db' => 'following_date', 'dt' => 11, 'field' => 'following_date' ),
	array( 'db' => 'sendto_date',    'dt' => 12, 'field' => 'sendto_date' ),
	array( 'db' => 'result',         'dt' => 13, 'field' => 'result' ),
	array( 'db' => 'note',           'dt' => 14, 'field' => 'note' ),
  array( 'db' => 'd_attach',       'dt' => 15, 'formatter' => function( $d, $row ) {
    $hasPerm_download = $_GET['hasPerm_download'];
    if($hasPerm_download == '1'){
      if (@strlen($d)>300) {
        return '<a href="data:application/zip;base64,'.base64_encode($d).'">تنزيل</a>';
      } else {    
        if (strpos($d, '/var') !== false){
            return '<a href="'.$url_host.'/inc/file_upload/file_decrypt.php?path='.$d.'">تنزيل</a>';
        } else {
            return '';
        }
      }
    }else{
      return '';
    }
  },'field' => 'd_attach' ),
  array( 'db' => 'added_by',       'dt' => 16, 'field' => 'added_by' ),
  array( 'db' => 'add_date',       'dt' => 17, 'field' => 'add_date' )
);
 

$joinQuery = "FROM dewan AS t1 ";



$extraWhere = "IF (jeha = '$jeha_profile' OR origin_sendfrom = '$jeha_profile' , isPrivate!='', isPrivate='لا') AND details_type= '$details_type' AND jeha= '$jeha1'";
                               



//$groupBy = "";
//$having = "";


require( 'ssp-new.php' );

echo json_encode(
	SSP::simple( $_POST, $sql_details, $table, $primaryKey, $columns )
);
?>
