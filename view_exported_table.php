<?php include_once "inc/session.php"; ?>
<?php include_once "inc/config.php";
include_once "inc/users_roles.php"; ?>
<?php
$header1='وزارة الداخلية';
$header2=$jeha_profile;

    
$start = $_GET['start'];
$end = $_GET['end'];
$details_type = 'صادر';

$sql_public="SELECT *  from reports_info WHERE date(add_date) >= '$start' AND date(add_date) <= '$end' AND jeha = '$jeha_profile' AND details_type = '$details_type' AND ketab_type = 'public' AND isPrivate = 'لا' ORDER BY ketab_num ASC ";
$sql_public_result = mysqli_query($conn, $sql_public);


$sql_details="SELECT * from details WHERE date(add_date) >= '$start' AND date(add_date) <= '$end' AND jeha = '$jeha_profile' AND details_type = '$details_type' ORDER BY edbara_num ASC";
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
                    <th></th>  
                </tr>
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
                    AND edbara_date = '".$row_details['edbara_date']."' AND jeha = '$jeha_profile' AND details_type = '$details_type' AND isPrivate = 'لا' ORDER BY ketab_num ASC"; 
                    $sql_ketab_result = mysqli_query($conn, $sql_ketab);  
                    

                    //count study
                    $sql_study_count="SELECT count(id) as count_study from study WHERE  edbara_num=".$row_details['edbara_num']." 
                    AND edbara_date = '".$row_details['edbara_date']."' AND jeha = '$jeha_profile' AND details_type = '$details_type' AND isPrivate = 'لا' ORDER BY edbara_num ASC"; 
                    $sql_study_count_result = mysqli_query($conn, $sql_study_count);
                    if (mysqli_num_rows($sql_study_count_result)> 0) {
                    $row_study_count = mysqli_fetch_assoc($sql_study_count_result);
                    $study_count = $row_study_count['count_study'];
                    }else{
                        $study_count = 0;
                    }

                    //count feech_info
                    $sql_feech_info_count="SELECT count(id) as count_feech_info from feech_info WHERE  edbara_num=".$row_details['edbara_num']." 
                    AND edbara_date = '".$row_details['edbara_date']."' AND jeha = '$jeha_profile' AND details_type = '$details_type' AND isPrivate = 'لا' ORDER BY edbara_num ASC"; 
                    $sql_feech_info_count_result = mysqli_query($conn, $sql_feech_info_count);
                    if (mysqli_num_rows($sql_feech_info_count_result)> 0) {
                    $row_feech_info_count = mysqli_fetch_assoc($sql_feech_info_count_result);
                    $feech_info_count = $row_feech_info_count['count_feech_info'];
                    }else{
                        $feech_info_count = 0;
                    }

                    
                ?>
                    
                    <tr style="page-break-inside:avoid; page-break-after:avoid;">
                        <td><?php echo $count; ?></td>
                        <td><?php echo $row_details['name'].' '.$row_details['fname'].' '.$row_details['lname']; ?></td>
                        <td><?php echo $row_details['edbara_num']; ?></td>
                        <td><?php echo $row_details['edbara_date']; ?></td>
                        <td><?php if(!empty($row_details['details_attach'])){ echo 'موجود'; $edbara_attach_count++; }else{ echo '-'; } ?></td>
                        <td>
                        <table class="print_style" style="width:100%; background: transparent;">
                            <tr>
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
                                </tr>
                          
                        <?php while($row_ketab = mysqli_fetch_assoc($sql_ketab_result)) { 
                            
                            $sql_dewan="SELECT d_attach,dewan_num,dewan_date from dewan WHERE ketab_num = ".$row_ketab['ketab_num']." AND ketab_date = '".$row_ketab['ketab_date']."' AND  jeha = '$jeha_profile' AND details_type='$details_type' ORDER BY dewan_num ASC"; 
                            $sql_dewan_result = mysqli_query($conn, $sql_dewan);
                            $row_dewan = mysqli_fetch_assoc($sql_dewan_result);

                            if($row_ketab['r_important']=='نعم'){
                                echo '<tr style="background-color:#fbd4b4">';
                            }else{
                                echo '<tr>';
                            }
                            ?>
                                <td><?php echo @$row_ketab['ketab_num'];
                                if($row_ketab['ketab_num']!==0){$ketab_count++;}
                                ?></td>
                                <td><?php echo @$row_ketab['ketab_date'] ?></td>
                                <td><?php if(!empty($row_ketab['r_attach'])){ echo 'موجود'; $ketab_attach_count++; }else{ echo '-'; } ?></td>
                                <td><?php echo @$row_dewan['dewan_num'] ?></td>
                                <td><?php echo @$row_dewan['dewan_date'] ?></td>
                                <td><?php if(!empty(@$row_dewan['d_attach'])){ echo 'موجود'; $dewan_attach_count++; }else{ echo '-'; } 
                                if(@$row_dewan['dewan_num']!==0){$dewan_count++;}
                                ?></td>
                                <td>
                                    <?php
                                        $sql_study="SELECT id FROM study WHERE ketab_num = ".$row_ketab['ketab_num']." AND ketab_date = '".$row_ketab['ketab_date']."' AND  jeha = '$jeha_profile' AND details_type='$details_type' ORDER BY study_date ASC";
                                        $sql_study_result = mysqli_query($conn, $sql_study);
                                       /*  while ($row_study = mysqli_fetch_assoc($sql_study_result)) { */
                                        if (mysqli_num_rows($sql_study_result)> 0) {
                                            echo 'موجود' ;
                                            
                                        }
                                       /*  } */
                                    ?>
                                </td>
                                <?php
                                    $sql_feech="SELECT num_balagh, d_balagh , balagh_attach, feech_type FROM feech_info WHERE ketab_num = ".$row_ketab['ketab_num']." AND ketab_date = '".$row_ketab['ketab_date']."' AND  jeha = '$jeha_profile' AND details_type='$details_type' ORDER BY num_balagh ASC";
                                    $sql_feech_result = mysqli_query($conn, $sql_feech);
                                    $row_feech = mysqli_fetch_assoc($sql_feech_result);                                    
                                ?>
                                <td><?php echo @$row_feech['feech_type'] ;
                                 if(!empty($row_feech['feech_type'])){}
                                ?></td>
                                <td><?php echo @$row_feech['num_balagh'] ; ?></td>
                                <td><?php echo @$row_feech['d_balagh'] ; ?></td>
                                <td><?php if(!empty($row_feech['balagh_attach'])){ echo 'موجود'; $feech_attach_count++;}else{ echo '-'; } ?></td>   
                                    </tr>
                        <?php }?>
                        
                        </table> 
                        </td>
                                       
                    </tr>
                <?php 
                //$study_count++;
                //$feech_count++;
                $count++; }?>
            </tbody>
            <!-- <tfoot> -->
                <tr>
                    <th colspan=2>المجموع</th>
                    <th></th>
                    <th></th>
                    <th><?php echo $edbara_attach_count; ?></th>
                    <th>
                        {
                            الأضابير: <?php echo $count-1; ?>
                        } 
                        {
                            الكتب: <?php echo $ketab_count; ?>
                        } 
                        {
                            مرفقات الكتب: <?php echo $ketab_attach_count; ?>
                        } 
                        {
                            الديوان: <?php echo $dewan_count; ?>
                        } 
                        {
                            مرفقات الديوان: <?php echo $dewan_attach_count; ?>
                        } 
                        {
                            الدراسات: <?php echo $study_count; ?>
                        } 
                        <?php if($admin != 5){ ?>
                        {
                            البلاغات: <?php echo $feech_count; ?>
                        } 
                        {
                            مرفقات البلاغات: <?php echo $feech_attach_count; ?>
                        }
                        <?php } ?>
                    </th>  
                    
                        
                  
                </tr>
           <!--  </tfoot> -->
        </table>
    <?php }?>

    <br><br>
    <?php  if (mysqli_num_rows($sql_public_result)> 0) { ?>
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
                    $sql_dewan="SELECT d_attach, dewan_num from dewan WHERE ketab_num = ".$row_public['ketab_num']." AND ketab_date = '".$row_public['ketab_date']."' AND  jeha = '$jeha_profile' AND details_type='$details_type' ORDER BY dewan_num ASC"; 
                    $sql_dewan_result = mysqli_query($conn, $sql_dewan);
                    $row_dewan = mysqli_fetch_assoc($sql_dewan_result);


                    /* //count studies
                    $sql_studies_count="SELECT count(id) as count_studies from `studies_all` WHERE  ketab_num=".$row_public['ketab_num']." 
                    AND ketab_date = '".$row_public['ketab_date']."' AND jeha = '$jeha_profile' AND details_type = '$details_type'  ORDER BY ketab_num ASC"; 
                    $sql_studies_count_result = mysqli_query($conn, $sql_studies_count);
                    if (mysqli_num_rows($sql_studies_count_result)> 0) {
                    $row_studies_count = mysqli_fetch_assoc($sql_studies_count_result);
                    $studies_count = $row_studies_count['count_studies'];
                    }else{
                        $studies_count = 0;
                    }

                    //count studies_828
                    $sql_studies_828_count="SELECT count(id) as count_studies_828 from `studies_all_828` WHERE  ketab_num=".$row_public['ketab_num']." 
                    AND ketab_date = '".$row_public['ketab_date']."' AND jeha = '$jeha_profile' AND details_type = '$details_type'  ORDER BY ketab_num ASC"; 
                    $sql_studies_828_count_result = mysqli_query($conn, $sql_studies_828_count);
                    if (mysqli_num_rows($sql_studies_828_count_result)> 0) {
                    $row_studies_828_count = mysqli_fetch_assoc($sql_studies_828_count_result);
                    $studies_828_count = $row_studies_828_count['count_studies_828'];
                    }else{
                        $studies_828_count = 0;
                    }

                    //count mawkoof
                    $sql_mawkoof_count="SELECT count(id) as count_mawkoof from `mawkoof_data` WHERE  ketab_num=".$row_public['ketab_num']." 
                    AND ketab_date = '".$row_public['ketab_date']."' AND jeha = '$jeha_profile' AND details_type = '$details_type'  ORDER BY ketab_num ASC"; 
                    $sql_mawkoof_count_result = mysqli_query($conn, $sql_mawkoof_count);
                    if (mysqli_num_rows($sql_mawkoof_count_result)> 0) {
                    $row_mawkoof_count = mysqli_fetch_assoc($sql_mawkoof_count_result);
                    $mawkoof_count = $row_mawkoof_count['count_mawkoof'];
                    }else{
                        $mawkoof_count = 0;
                    } */


                    if($row_public['r_important']=='نعم'){
                        echo '<tr style="background-color:#fbd4b4;page-break-inside:avoid; page-break-after:avoid;">';
                    }else{
                        echo '<tr style="page-break-inside:avoid; page-break-after:avoid;">';
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
                            $sql_study="SELECT name, fname, lname FROM study WHERE ketab_num = ".$row_public['ketab_num']." AND ketab_date = '".$row_public['ketab_date']."' AND  jeha = '$jeha_profile' AND details_type='$details_type' ORDER BY study_date ASC";
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
                <?php 
                /* $studies_count++;
                $studies_828_count++;
                $mawkoof_count++; */
                $count++;}?>
            </tbody>
           <!--  <tfoot> -->
                <tr>
                    <th colspan=2>المجموع</th>
                    <th colspan=7>
                        {
                            الكتب: <?php echo $ketab_count; ?>
                        } 
                        {
                            مرفقات الكتب: <?php echo $ketab_attach_count; ?>
                        } 
                        {
                            الديوان: <?php echo $dewan_count; ?>
                        } 
                        {
                            مرفقات الديوان: <?php echo $dewan_attach_count; ?>
                        } 
                        {
                            الدراسات: <?php echo $study_count; ?>
                        } 
                       <!--  {
                            أضابير الموقوفين: <?php //echo $mawkoof_count; ?>
                        } 
                        {
                            المسح الأمني: <?php //echo $studies_count; ?>
                        }  -->
                        <?php //if( strpos($jeha_profile,'828') !== false || strpos($jeha_profile,'626') !== false  || $jeha_profile=='الإدارة المركزية للمعلومات'){ ?>
                           <!--  {
                                 المسح الأمني 828: <?php //echo $studies_828_count; ?>
                            }  -->
                        <?php //} ?>
                    </th>
                   <!--  <th></th>
                    <th></th> -->
                </tr>
            <!-- </tfoot> -->
        </table>
    <?php  }?>
</body>
</html>
<script>
    print();
</script>