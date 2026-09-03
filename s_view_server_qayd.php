<?php include_once "inc/session.php"; ?>
<?php if($admin == 1 || $admin == 7  || $admin==5 || $admin==6  || $admin == 9 || $admin == 10 || $admin == 11 || $admin == 2){ ?>
<!DOCTYPE html>
<html lang="ar">
<?php
include_once "inc/config.php";
include_once "inc/users_roles.php";
include_once "inc/header.php";
@$jeha1=$_GET['jeha'];
@$details_type=$_GET['details_type'];



/* $b = array('jeha', 'details_type','','');
$c = array_combine($b, $_GET);
foreach($c as $key => $value) {
  $$key = $value;
} */ 
/* echo $jeha1;
exit; */
/* $time_start = microtime(true);
@$limit = trim(htmlentities(@$_GET['limit']));
if(empty($limit)) { $limit = 100;} */
?>

            <header class="header ">

            <?php include_once "inc/nav.php"; ?>
            <?php include_once "inc/sidebar.php"; ?>
            <?php 
            if (strpos($url,'view') !== false) {
              echo '<section class="content content--full">';
            } else {
                echo '<section class="content">';
            }
            ?>
            <h2 style="text-align: center; color: red;">
            <?php if (!empty($details_type)){ ?>
                    <p>الدراسات الأمنية ( <?php echo @$_GET['details_type']; ?> )</p> 
            <?php }else{ ?>   
                    <p>الدراسات الأمنية ( عرض عام )</p>
            <?php }?>                
                </h2>
                <h4 style="text-align: center; color: red;">
                  <?php
                  if(!empty($_GET['move_id'])) {
                    echo "تم عملية النقل بنجاح";
                }
                  ?>
                </h4>



                   
                              <div class="card" style="overflow: auto; width:100%; left:0px;">
                               <!--  <a style="" href="#"><i style="font-size: 2.5rem" class="zwicon-printer"></i></a> -->
                                  <div class="card-body">
                                      <div class="table-responsive">
                                      <div style="text-align: right;">
                                      <script type="text/javascript">
                                        var details_type='<?php echo $details_type;  ?>';
                                        var data_type='<?php echo @$data_type;  ?>';
                                      var type='<?php echo @$type;  ?>';
                                      </script>
                                      
                    <?php 
                     if ($admin == 1 || $admin == 7  || $admin == 5){
                      echo '<a class="btn btn-danger btn_remove" target="_blank" href="print-elements.php?jeha='.$jeha1.'&details_type='.$details_type.'&type=ketab_all_study&print_logo=">طباعة الدراسات (أ)</a>';

                      echo '<a class="btn btn-danger btn_remove" target="_blank" href="print-elements.php?jeha='.$jeha1.'&details_type='.$details_type.'&type=ketab_all_study2&print_logo=">طباعة الدراسات (ب)</a>';

                      echo '<a class="btn btn-danger btn_remove" target="_blank" href="print-elements.php?jeha='.$jeha1.'&details_type='.$details_type.'&type=ketab_all_study3&print_logo=">طباعة الدراسات (ج)</a>';

                      echo '<a class="btn btn-danger btn_remove" target="_blank" href="print-elements.php?jeha='.$jeha1.'&details_type='.$details_type.'&type=ketab_all_study4&print_logo=">طباعة الدراسات (د)</a>';
                      
                      if (strpos($jeha_profile, 'داخلي') !== false){
                        echo '<a class="btn btn-danger btn_remove" target="_blank" href="print-elements.php?jeha='.$jeha1.'&details_type='.$details_type.'&type=ketab_all_study2&print_logo=&type_print_all=1">طباعة الموظفين</a>';
                      }
                      
                      echo '<a class="btn btn-secondary btn_remove" target="_blank" href="print-elements.php?jeha='.$jeha1.'&details_type='.$details_type.'&type=ketab_all_study&print_logo=424">طباعة الدراسات (أ) -424</a>';

                      echo '<a class="btn btn-secondary btn_remove" target="_blank" href="print-elements.php?jeha='.$jeha1.'&details_type='.$details_type.'&type=ketab_all_study2&print_logo=424">طباعة الدراسات (ب) -424</a>';

                      echo '<a class="btn btn-secondary btn_remove" target="_blank" href="print-elements.php?jeha='.$jeha1.'&details_type='.$details_type.'&type=ketab_all_study3&print_logo=424">طباعة الدراسات (ج) -424</a>';

                      echo '<a class="btn btn-secondary btn_remove" target="_blank" href="print-elements.php?jeha='.$jeha1.'&details_type='.$details_type.'&type=ketab_all_study4&print_logo=424">طباعة الدراسات (د) -424</a>';

                     }
                    
                     include_once "query/getJehat_server_view.php";
                    
                      if (!empty($details_type)){ ?>
                       <?php include_once "jehat.php"; ?>
                      <?php } ?>
                </div>
                <?php include_once "s_view_table.php"; ?>
                </div></div>

      </div>

            <?php 
            // ============ إضافة الـ Popup لعرض نتائج تحديث جدول المتابعة ============
            include_once "tracking_result_modal.php";
            include_once "inc/footer_server.php";
            include_once "inc/footer_view_server_all.php";
            ?>
           
    </body>
</html>
         <?php }?>
