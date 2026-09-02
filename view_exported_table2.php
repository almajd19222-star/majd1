<?php include_once "inc/session.php"; ?>
<?php include_once "inc/config.php";
include_once "inc/users_roles.php"; ?>
<?php
$header1='وزارة الداخلية';
$header2=$jeha_profile;

    
$start = $_GET['start'];
$end = $_GET['end'];
$details_type = 'وارد';
$sql_public="SELECT *  from reports_info WHERE date(add_date) >= '$start' AND date(add_date) <= '$end' AND jeha = '$jeha_profile' AND details_type = '$details_type' AND ketab_type = 'public' ";
$sql_public_result = mysqli_query($conn, $sql_public);

$sql_public_c="SELECT count(id) as c from reports_info WHERE date(add_date) >= '$start' AND date(add_date) <= '$end' AND jeha = '$jeha_profile' AND details_type = '$details_type' AND ketab_type = 'public' ";
$sql_public_result_c = mysqli_query($conn, $sql_public_c);
$row_public_c = mysqli_fetch_assoc($sql_public_result_c);

$sql_public_c="SELECT count(id) as c from reports_info WHERE date(add_date) >= '$start' AND date(add_date) <= '$end' AND jeha = '$jeha_profile' AND details_type = '$details_type' AND ketab_type = 'public' AND r_attach!='' ";
$sql_public_result_c = mysqli_query($conn, $sql_public_c);
$row_public_c1 = mysqli_fetch_assoc($sql_public_result_c);

$sql_details="SELECT * from details WHERE date(add_date) >= '$start' AND date(add_date) <= '$end' AND jeha = '$jeha_profile' AND details_type = '$details_type' ";
$sql_details_result = mysqli_query($conn, $sql_details);

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



<table class="hide_this show_on_print header_style">
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

    <?php  if (mysqli_num_rows($sql_public_result)< 0) { ?>
        <table class="print_style">
           <!--  <thead> -->
                <tr>
                    <th colspan=11>الكتب العامة</th>
                </tr>
                <tr>
                    <th style="width:10px"></th>
                    <th >موضوع الكتاب</th>
                    <th>رقم الكتاب</th>
                    <th>تاريخ الكتاب</th>
                    <th>مرفقات الكتاب</th>
                    <th>رقم الديوان</th>
                    <th>تاريخ الديوان</th>
                    <th>مرفقات الديوان</th>
                    <th>الدراسات المرتبطة</th>
                    <!-- <th>القرارات المرتبطة</th>
                    <th>التعاميم المرتبطة</th> -->           
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
                    $sql_dewan="SELECT d_attach, dewan_num from dewan WHERE ketab_num = ".$row_public['ketab_num']." AND ketab_date = '".$row_public['ketab_date']."' AND  jeha = '$jeha_profile' AND details_type='$details_type' ORDER BY id DESC"; 
                    $sql_dewan_result = mysqli_query($conn, $sql_dewan);
                    $row_dewan = mysqli_fetch_assoc($sql_dewan_result);
                    if($row_public['r_important']=='نعم'){
                        echo '<tr style="background-color:#fbd4b4">';
                    }else{
                        echo '<tr>';
                    }
                    ?>
                    
                        <td><?php echo $count; ?></td>
                        <td><?php echo $row_public['r_title'] ?></td>
                        <td><?php echo $row_public['ketab_num'];
                        if(@$row_public['ketab_num']!==0){$ketab_count++;}
                        ?></td>
                        <td><?php echo $row_public['ketab_date'] ?></td>
                        <td><?php if(!empty($row_public['r_attach'])){ echo 'موجود'; $ketab_attach_count++;}else{ echo '-'; } ?></td>
                        <td><?php echo $row_public['dewan_num']?></td>
                        <td><?php echo $row_public['dewan_date'] ?></td>
                        <td><?php if(!empty($row_dewan['d_attach'])){ echo 'موجود'; $dewan_attach_count++; }else{ echo '-'; } 
                        if(@$row_dewan['dewan_num']!==0){$dewan_count++;}
                        ?></td>
                        <td>
                            <?php
                            $sql_study="SELECT name, fname, lname FROM study WHERE ketab_num = ".$row_public['ketab_num']." AND ketab_date = '".$row_public['ketab_date']."' AND  jeha = '$jeha_profile' AND details_type='$details_type' ORDER BY study_date DESC";
                            $sql_study_result = mysqli_query($conn, $sql_study);
                            $c=1;
                            while ($row_study = mysqli_fetch_assoc($sql_study_result)) {

                                echo $c.'-'.$row_study['name'].' '.$row_study['fname'].' '.$row_study['lname'].'<br>';
                                $study_count++;
                                $c++;
                            }
                            ?>
                        </td>
                      <!--   <td></td>
                        <td></td> -->
                       
                    </tr>
                <?php $count++;}?>
            </tbody>
           <!--  <tfoot> -->
                <tr>
                    <th colspan=2>المجموع</th>
                    <th colspan=2><?php echo $ketab_count; ?></th>
                    
                    <th><?php echo $ketab_attach_count; ?></th>

                    <th colspan=2><?php echo $dewan_count;  ?></th>
                    
                    <th><?php echo $dewan_attach_count;  ?></th>
                    <th><?php echo $study_count;  ?></th>
                   <!--  <th></th>
                    <th></th> -->
                </tr>
            <!-- </tfoot> -->
        </table>
    <?php  }?>

    <br>
    <br>

    <?php  if (mysqli_num_rows($sql_details_result)> 0) { ?>
        <table class="print_style" style="width:100%; background: transparent;">
           <!--  <thead> -->
            <tr>
                <th colspan=16>الأضابير الشخصية</th>
            </tr>
                <tr>
                    <th></th>
                    <th>الاسم الثلاثي</th>
                    <th>رقم الاضبارة</th>
                    <th>تاريخ الاضبارة</th>
                    <th>مرفقات الاضبارة</th>

                    <th>رقم الكتاب</th>
                                <th>تاريخ الكتاب</th>
                                <th>مرفقات الكتاب</th>
                                <th>رقم الديوان</th>
                                <th>تاريخ الديوان</th>
                                <th>مرفقات الديوان</th>
                                <th>الدراسات الأمنية</th>
                                <th>نوع الفيش</th>
                                <th>رقم البلاغ</th> 
                                <th>تاريخ البلاغ</th>   
                                <th>مرفقات البلاغ</th>    
            <!-- </thead> -->
            <tbody>
                <?php 
                $edbara_attach_count=0;
                $feech_count=0;
                $feech_attach_count=0;
                $ketab_count=0;
                $ketab_attach_count=0; 
                $dewan_attach_count=0; 
                $dewan_count=0;
                $study_count=0;
                $count=1;
                
                while($row_details = mysqli_fetch_assoc($sql_details_result)) { 
                    $sql_ketab="SELECT * from reports_info WHERE edbara_num =".$row_details['edbara_num']." 
                    AND edbara_date = '".$row_details['edbara_date']."' AND jeha = '$jeha_profile' AND details_type = '$details_type'"; 
                    $sql_ketab_result = mysqli_query($conn, $sql_ketab);   
                ?>
                    
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $row_details['name'].' '.$row_details['fname'].' '.$row_details['lname']; ?></td>
                        <td><?php echo $row_details['edbara_num']; ?></td>
                        <td><?php echo $row_details['edbara_date']; ?></td>
                        <td><?php if(!empty($row_details['details_attach'])){ echo 'موجود'; $edbara_attach_count++; }else{ echo '-'; } ?></td>
                       
                       
                           
                          
                        <?php while($row_ketab = mysqli_fetch_assoc($sql_ketab_result)) { 
                            
                            $sql_dewan="SELECT d_attach,dewan_num,dewan_date from dewan WHERE ketab_num = ".$row_ketab['ketab_num']." AND ketab_date = '".$row_ketab['ketab_date']."' AND  jeha = '$jeha_profile' AND details_type='$details_type' ORDER BY id DESC"; 
                            $sql_dewan_result = mysqli_query($conn, $sql_dewan);
                            $row_dewan = mysqli_fetch_assoc($sql_dewan_result);

                          /*   if($row_ketab['r_important']=='نعم'){
                                echo '<tr style="background-color:#fbd4b4">';
                            }else{
                                echo '<tr>';
                            } */
                            ?>
                                <td><?php echo @$row_ketab['ketab_num'];
                                if($row_ketab['ketab_num']!==0){$ketab_count++;}
                                ?></td>
                                <td><?php echo @$row_ketab['ketab_date'] ?></td>
                                <td><?php if(!empty($row_details['r_attach'])){ echo 'موجود'; $ketab_attach_count++; }else{ echo '-'; } ?></td>
                                <td><?php echo @$row_dewan['dewan_num'] ?></td>
                                <td><?php echo @$row_dewan['dewan_date'] ?></td>
                                <td><?php if(!empty(@$row_dewan['d_attach'])){ echo 'موجود'; $dewan_attach_count++; }else{ echo '-'; } 
                                if(@$row_dewan['dewan_num']!==0){$dewan_count++;}
                                ?></td>
                                <td>
                                    <?php
                                        $sql_study="SELECT id FROM study WHERE ketab_num = ".$row_ketab['ketab_num']." AND ketab_date = '".$row_ketab['ketab_date']."' AND  jeha = '$jeha_profile' AND details_type='$details_type' ORDER BY id DESC";
                                        $sql_study_result = mysqli_query($conn, $sql_study);
                                       /*  while ($row_study = mysqli_fetch_assoc($sql_study_result)) { */
                                        if (mysqli_num_rows($sql_study_result)> 0) {
                                            echo 'موجود' ;
                                            $study_count++;
                                        }
                                       /*  } */
                                    ?>
                                </td>
                                <?php
                                    $sql_feech="SELECT num_balagh, d_balagh , balagh_attach, feech_type FROM feech_info WHERE ketab_num = ".$row_ketab['ketab_num']." AND ketab_date = '".$row_ketab['ketab_date']."' AND  jeha = '$jeha_profile' AND details_type='$details_type' ORDER BY id DESC";
                                    $sql_feech_result = mysqli_query($conn, $sql_feech);
                                    $row_feech = mysqli_fetch_assoc($sql_feech_result);                                    
                                ?>
                                <td><?php echo @$row_feech['feech_type'] ;
                                 if(!empty($row_feech['feech_type'])){$feech_count++;}
                                ?></td>
                                <td><?php echo @$row_feech['num_balagh'] ; ?></td>
                                <td><?php echo @$row_feech['d_balagh'] ; ?></td>
                                <td><?php if(!empty($row_feech['balagh_attach'])){ echo 'موجود'; $feech_attach_count++;}else{ echo '-'; } ?></td>   
                                    <!-- </tr> -->
                        <?php }?>
                        
                       <!--  </table>  -->
                        
                                       
                    </tr>
                <?php $count++; }?>
            </tbody>
            <!-- <tfoot> -->
                <tr>
                    <th colspan=2>المجموع</th>
                    <th></th>
                    <th></th>
                    <th><?php echo $edbara_attach_count; ?></th>
                    <th colspan=11>
                        الكتب: <?php echo $ketab_count; ?>
                        |
                        مرفقات الكتب: <?php echo $ketab_attach_count; ?>
                        |
                        الديوان: <?php echo $dewan_count; ?>
                        |
                        مرفقات الديوان: <?php echo $dewan_attach_count; ?>
                        |
                        الدراسات: <?php echo $study_count; ?>
                        |
                        البلاغات: <?php echo $feech_count; ?>
                        |
                        مرفقات البلاغات <?php echo $feech_attach_count; ?>

                    </th>  
                    
                        
                  
                </tr>
           <!--  </tfoot> -->
        </table>
    <?php }?>

</body>
</html>
<script>
    print();
</script>