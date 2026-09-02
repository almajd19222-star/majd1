<?php include_once "inc/session.php"; ?>
<?php include_once "inc/config.php";
include_once "inc/users_roles.php"; ?>
<?php
$header1='وزارة الداخلية';
$header2=$jeha_profile;


$sql_public="SELECT *  from temp_masader ORDER BY ketab_num ASC";
$sql_public_result = mysqli_query($conn, $sql_public);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resources/print_page/print2.css">
    <title>Document</title>
</head>
<body dir="rtl">
<div id="pageborder"></div>


<?php if (@$_GET['import'] == 'true'){ ?>

<!--   <button class="noprint" style="position:relative" target="_blank" onclick="window.location.href='view_imported_table.php'">طباعة</button> -->
<input type="button" id="print" class="noprint" onclick="print()" style="position:relative" value="طباعة" />

    <?php //if($jeha_profile=='إدارة الأمن الداخلي'){?>
        <!-- <button class="noprint" style="position:relative" target="_blank" onclick="window.location.href='DBimport_dump_processing_120_new.php?import=continue'">استمرار عملية الاستيراد</button> -->
    <?php //}else{?>
        <button class="noprint" style="position:relative" target="_blank" onclick="window.location.href='DBimport_dump_processing_new.php?import=continue'">استمرار عملية الاستيراد</button>

<a class="btn btn-primary noprint" style="position:relative" target="_blank" href="DBimport_dump_processing_new_replace.php?import=continue"  onclick="return confirm('سيتم استبدال البيانات المتطابقة مع الجدول. اضغط نعم للاستمرار');">استمرار عملية الاستيراد مع الاستبدال</a>
    <?php // }?>
  <br><br>
  <button class="noprint" style="position:relative" target="_self" onclick="window.location.href='DBimport_cancel.php?import=continue'">إلغاء عملية الاستيراد</button>

<?php }else{?>
  
  
<!-- <script>
      print();
  </script> -->
  <?php }?>


<table class="header_style">
        <thead>
            <tr>                                     
                <td colspan="" style="border:none;">
                    <div id="container">
                        <div id="left">
                                                                              
                        </div>

                        <div id="center" style="font-family: 'Hacen Liner Screen'; color: black; width:300px">
                            <a>فهرس البريد الإلكتروني الوارد
                           
                            </a>
              
                        </div>

                        <div id="right" style="width:200px;font-family: 'Hacen Liner Screen'; color: black;">
                            <!--<?php echo $header1; ?>
                            <br>    
                            <a id="imported_jeha"></a> -->
                            <?php include_once "print_header_right.php";    ?> 
                        </div>
                    </div>
                </td>                       
            </tr>                                 
            </thead>
</table>
<br><br>
    <?php  if (mysqli_num_rows($sql_public_result)> 0) { ?>
        <table class="print_style">
           <!--  <thead> -->
                <tr>
                    <th colspan=9>المصادر</th>
                </tr>
                <tr>
                    <th style="width:10px"></th>
                    <th >رقم المصدر</th>
                    <th>الحالة</th>                   
                    <th>صورة عن الاستمارة</th>   
                    <th>المنقولون</th>
                    <th>التقييمات</th>
                    <th>الأعمال</th>
                    <th>أساليب التعاون</th>
                    <th>حالات المصدر</th>
                </tr>
           <!--  </thead> -->
            <tbody>
                <?php 
              
                $count=1; 
                while($row_public = mysqli_fetch_assoc($sql_public_result)) { 
                    
                    ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $row_public['masdar_num'] ?></td>
                        <td><?php echo $row_public['masdar_type']; ?></td>
                        <td><?php if(!empty($row_public['m_attach'])){ echo 'موجود';}else{ echo '-'; } ?></td>
                        <td>
                            <?php 
                                $sql="SELECT count(id) as count_id FROM `temp_masader_move` WHERE `masdar_num`= ".$row_public['masdar_num']."";
                                $sql_result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($sql_result);
                                echo $row['count_id'];
                            ?>
                        </td>
                        <td>
                            <?php 
                                $sql="SELECT count(id) as count_id FROM `temp_masader_evaluate` WHERE `masdar_num`= ".$row_public['masdar_num']."";
                                $sql_result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($sql_result);
                                echo $row['count_id'];
                            ?>
                        </td>
                        <td>
                            <?php 
                                $sql="SELECT count(id) as count_id FROM `temp_masader_work` WHERE `masdar_num`= ".$row_public['masdar_num']."";
                                $sql_result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($sql_result);
                                echo $row['count_id'];
                            ?>
                        </td>
                        <td>
                            <?php 
                                $sql="SELECT count(id) as count_id FROM `temp_masader_info` WHERE `masdar_num`= ".$row_public['masdar_num']."";
                                $sql_result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($sql_result);
                                echo $row['count_id'];
                            ?>
                        </td>
                        <td>
                            <?php 
                                $sql="SELECT count(id) as count_id FROM `temp_masader_dates` WHERE `masdar_num`= ".$row_public['masdar_num']."";
                                $sql_result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($sql_result);
                                echo $row['count_id'];
                            ?>
                        </td>
                       
                       
                    </tr>
                <?php $count++;}?>
            </tbody>
          
        </table>
    <?php  }?>

   

</body>
</html>
