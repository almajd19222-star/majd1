<?php include_once "inc/session.php"; ?>
<?php include_once "inc/config.php";
include_once "inc/users_roles.php"; ?>
<?php
$header1='وزارة الداخلية';
$header2=$jeha_profile;

    
$start = $_GET['start'];
$end = $_GET['end'];

$sql_public="SELECT *  from masader WHERE date(add_date) >= '$start' AND date(add_date) <= '$end' AND jeha = '$jeha_profile' ORDER BY masdar_num ASC ";
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



<table class="header_style">
        <thead>
            <tr>                                     
                <td colspan="" style="border:none;">
                    <div id="container">
                        <div id="left">
                                                                              
                        </div>

                        <div id="center" style="font-family: 'Hacen Liner Screen'; color: black; width:300px">
                            <a>فهرس البريد الإلكتروني الصادر
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
                                $sql="SELECT count(id) as count_id FROM `masader_move` WHERE `masdar_num`= ".$row_public['masdar_num']." AND `jeha` = '$jeha_profile' ";
                                $sql_result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($sql_result);
                                echo $row['count_id'];
                            ?>
                        </td>
                        <td>
                            <?php 
                                $sql="SELECT count(id) as count_id FROM `masader_evaluate` WHERE `masdar_num`= ".$row_public['masdar_num']." AND `jeha` = '$jeha_profile' ";
                                $sql_result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($sql_result);
                                echo $row['count_id'];
                            ?>
                        </td>
                        <td>
                            <?php 
                                $sql="SELECT count(id) as count_id FROM `masader_work` WHERE `masdar_num`= ".$row_public['masdar_num']." AND `jeha` = '$jeha_profile' ";
                                $sql_result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($sql_result);
                                echo $row['count_id'];
                            ?>
                        </td>
                        <td>
                            <?php 
                                $sql="SELECT count(id) as count_id FROM `masader_info` WHERE `masdar_num`= ".$row_public['masdar_num']." AND `jeha` = '$jeha_profile' ";
                                $sql_result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($sql_result);
                                echo $row['count_id'];
                            ?>
                        </td>
                        <td>
                            <?php 
                                $sql="SELECT count(id) as count_id FROM `masader_dates` WHERE `masdar_num`= ".$row_public['masdar_num']." AND `jeha` = '$jeha_profile' ";
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
<script>
    print();
</script>