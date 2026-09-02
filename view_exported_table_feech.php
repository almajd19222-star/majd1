<?php include_once "inc/session.php"; ?>
<?php include_once "inc/config.php";
include_once "inc/users_roles.php"; ?>
<?php
$header1='وزارة الداخلية';
$header2=$jeha_profile;
  
$start = $_GET['start'];
$end = $_GET['end'];
$jeha = $_GET['jeha'];
$details_type = 'قيد المعالجة';

$sql_public="SELECT t1.*, t2.* FROM `feech_info` AS `t1` LEFT JOIN details t2 ON t1.edbara_num=t2.edbara_num AND t1.edbara_date=t2.edbara_date AND t1.details_type = t2.details_type AND t1.jeha=t2.jeha WHERE date(t1.add_date) >= '$start' AND date(t1.add_date) <= '$end' AND t1.jeha = '$jeha' AND t1.details_type = '$details_type' ORDER BY t1.ketab_num ASC";
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

<input type="button" id="print" class="noprint" onclick="print()" style="position:relative" value="طباعة" />
<?php if (@$_GET['import'] == 'true'){ ?>

    <?php //if($jeha_profile=='إدارة الأمن الداخلي'){?>
        <!-- <button class="noprint" style="position:relative" target="_blank" onclick="window.location.href='DBimport_dump_processing_120_new.php?import=continue'">استمرار عملية الاستيراد</button> -->
    <?php //}else{?>
        <button class="noprint" style="position:relative" target="_blank" onclick="window.location.href='DBimport_dump_processing_new.php?import=continue'">استمرار عملية الاستيراد</button>

<a class="btn btn-primary noprint" style="position:relative" target="_blank" href="DBimport_dump_processing_new_replace.php?import=continue"  onclick="return confirm('سيتم استبدال البيانات المتطابقة مع الجدول. اضغط نعم للاستمرار');">استمرار عملية الاستيراد مع الاستبدال</a>
    <?php // }?>
    <br><br>
    <button class="noprint" style="position:relative" target="_blank" onclick="window.location.href='DBimport_cancel.php?import=continue'">إلغاء عملية الاستيراد</button>

<?php }?>


<table class="header_style">
        <thead>
            <tr>                                     
                <td colspan="" style="border:none;">
                    <div id="container">
                        <div id="left">
                                                                              
                        </div>

                        <div id="center" style="font-family: 'Hacen Liner Screen'; color: black; width:300px">
                            <a>فهرس البريد الإلكتروني الصادر (الفيش)
                            <br>
                            تاريخ التصدير من 
                            <?php echo $start; ?>
                            إلى
                            <?php echo $end; ?>
                            </a>
              
                        </div>

                        <div id="right" style="width:200px;font-family: 'Hacen Liner Screen'; color: black;">
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
                    <th colspan=7>البيانات الشخصية</th>
                    <th colspan=6>الجهة الآمرة</th>
                    <th colspan=7>الجهة الطالبة</th>
                </tr>
                <tr>
                    <th style="width:10px"></th>
                    <th>نوع الفيش</th>
                    <th>رقم الإضبارة <?php if ($jeha_profile == 'الإدارة المركزية للمعلومات' && $details_type=='صادر'){ ?> العام <?php }?></th>
                    <th>تاريخ الإضبارة <?php if ($jeha_profile == 'الإدارة المركزية للمعلومات' && $details_type=='صادر'){ ?> العام <?php }?></th>                                                  
                        
                    <th>الإسم</th>                    
                    <th>اسم ونسبة الأم</th>
                    <th>مكان الولادة</th>               
                
                    <th>التهمة</th>
                    <th>رقم الكتاب</th>
                    <th>تاريخ الكتاب</th>
                    <th>رقم البلاغ</th>
                    <th>تاريخ البلاغ</th>
                    <th>نوع الإجراء</th>

                    <th>الجهة الطالبة</th>
                    <th>التهمة</th>
                    <th>رقم الكتاب</th>                                                 
                    <th>تاريخ الكتاب</th>
                    <th>رقم البلاغ</th>
                    <th>تاريخ البلاغ</th>
                    <th>نوع الإجراء</th>
                    
                       
                       
                </tr>
           <!--  </thead> -->
            <tbody>
                <?php 
                $ketab_count=0;
                $ketab_attach_count=0;
                $dewan_attach_count=0 ; 
                $dewan_count=0;
                $study_count=0;
                $count=1; 
                while($row_public = mysqli_fetch_assoc($sql_public_result)) { 

                   
                    echo '<tr style="page-break-inside:avoid; page-break-after:avoid;">';
                
                    ?>
                    
                        <td><?php echo $count; ?></td>
                       <?php 
                        echo 
                        '<td>'.$row_public["feech_type"].'</td>'.
                        '<td>'.$row_public["edbara_num"].'</td>'.
                        '<td>'.$row_public["edbara_date"].'</td>'.
                        '<td>'.$row_public["name"].' '.$row_public["fname"].' '.$row_public["lname"].'</td>'.
                                  '<td>'.$row_public["mname"].'</td>'.
                                  '<td>'.$row_public["pbirth"].'</td>';
                                  if ($jeha_profile == 'الإدارة المركزية للمعلومات'){

                                echo
                                  '<td>'.$row_public["jeha_tohma"].'</td>'.
                                      '<td>' .$row_public["sho3ba_ketab_num"].'</td>'.
                                     
                                      '<td>' .$row_public["sho3ba_ketab_date"].'</td>'.                                        
                                      '<td>'.$row_public["sho3ba_balagh_num"].'</td>'.
                                      '<td>' .$row_public["sho3ba_balagh_date"].'</td>'.
                                      '<td>'.$row_public["sho3ba_balagh_type"].'</td>';
                                  }
                                      echo
                                      '<td>'.$row_public["requested"].'</td>'.
                                      '<td>'.$row_public["jorm"].'</td>'. 
                                      '<td>'.$row_public["ketab_num"].'</td>'.                                     
                                      '<td>'.$row_public["ketab_date"].'</td>'.
                                      '<td>'.$row_public["num_balagh"].'</td>'.
                                      '<td>'.$row_public["d_balagh"].'</td>'.
                                      '<td>'.$row_public["balagh_type"].'</td>';
                       
                       ?>
                        
                      
                       
                    </tr>
                <?php $count++;}?>
            </tbody>
       
        </table>
    <?php  }?>


</body>
</html>
<script>
    //print();
</script>