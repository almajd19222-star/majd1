<?php include_once "inc/session.php"; ?>
<?php include_once "inc/config.php";
include_once "inc/users_roles.php"; ?>
<?php
$header1='وزارة الداخلية';
$header2=$jeha_profile;
if(!empty($_GET['ketab_nums'] && $_GET['ketab_nums']!==0)){
    $ketab_nums = $_GET['ketab_nums'];
}else{
    $ketab_nums = 0;
}
if(!empty($_GET['num_start']) && $_GET['num_start'] !==0){
    $start = $_GET['num_start'];
    $end = $_GET['num_end'];
}else{
    $start = 0;
    $end = 0;
}


$year = $_GET['year'];
$details_type = 'صادر';

if($ketab_nums!=0){
    $sql_public="SELECT * from reports_info WHERE ketab_num IN ($ketab_nums) AND YEAR(ketab_date) = '$year' AND jeha = '$jeha_profile' AND details_type = '$details_type' AND isPrivate = 'لا' ORDER BY ketab_num ASC ";
}else{
    $sql_public="SELECT * from reports_info WHERE ketab_num >= $start AND ketab_num <= $end AND YEAR(ketab_date) = '$year' AND jeha = '$jeha_profile' AND details_type = '$details_type' AND isPrivate = 'لا' ORDER BY ketab_num ASC ";
}






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
                            <?php if($ketab_nums!=0){ ?>
                                أرقام الكتب  
                                <?php echo $ketab_nums; ?>
                            
                           
                            <?php }else{ ?>
                                أرقام الكتب من 
                                <?php echo $start; ?>
                                إلى
                                <?php echo $end; ?>
                            <?php } ?>

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


    <br><br>
    <?php  if (mysqli_num_rows($sql_public_result)> 0) { ?>
        <table class="print_style">
           <!--  <thead> -->
                <tr>
                    <th colspan=12>الكتب العامة</th>
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
                    <th>الدراسات الأمينة</th>
                    <th>المسح الأمني</th>  
                    <th>الفيش</th>   
                    <th>الموقوفون</th> 

                </tr>
           <!--  </thead> -->
            <tbody>
                <?php 
                $ketab_count=0;
                $ketab_attach_count=0;
                $dewan_attach_count=0 ; 
                $dewan_count=0;
                $study_count=0;
                $studies_count=0;
                
               
                $count=1; 
                while($row_public = mysqli_fetch_assoc($sql_public_result)) { 
                    $feech_count=0;
                    $mawkoof_count=0;   
                    $sql_dewan="SELECT d_attach, dewan_num from dewan WHERE ketab_num = ".$row_public['ketab_num']." AND ketab_date = '".$row_public['ketab_date']."' AND  jeha = '$jeha_profile' AND details_type='$details_type' ORDER BY dewan_num ASC"; 
                    $sql_dewan_result = mysqli_query($conn, $sql_dewan);
                    $row_dewan = mysqli_fetch_assoc($sql_dewan_result);


                   


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
                        <td>
                            <?php
                            if( strpos($jeha_profile,'828') !== false || strpos($jeha_profile,'626') !== false ){
                                $sql="SELECT place_name FROM studies_all_828 WHERE ketab_num = ".$row_public['ketab_num']." AND ketab_date = '".$row_public['ketab_date']."' AND  jeha = '$jeha_profile' AND details_type='$details_type' ORDER BY place_name  ASC";
                            }else{
                                $sql="SELECT place_name FROM studies_all WHERE ketab_num = ".$row_public['ketab_num']." AND ketab_date = '".$row_public['ketab_date']."' AND  jeha = '$jeha_profile' AND details_type='$details_type' ORDER BY place_name  ASC";
                            }
                            
                            $sql_result = mysqli_query($conn, $sql);
                            $c=1;
                            while ($row = mysqli_fetch_assoc($sql_result)) {
                                echo $c.'-'.$row['place_name'].'<br>';
                                $studies_count++;
                                $c++;
                            }
                            ?>
                        </td>

                        <td>
                            <?php
                            $sql="SELECT id FROM feech_info WHERE ketab_num = ".$row_public['ketab_num']." AND ketab_date = '".$row_public['ketab_date']."' AND  jeha = '$jeha_profile' AND details_type='$details_type' ORDER BY id  ASC";
                            $sql_result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($sql_result) > 0) {
                                //exit;
                                $c=1;
                                while ($row = mysqli_fetch_assoc($sql_result)) {     
                                                            
                                    $feech_count++;
                                    $c++;
                                }
                            }else{
                                $feech_count = 0;
                            }
                           
                            ?>
                        <?php echo $feech_count; ?>
                        </td>
                        <td>
                            <?php
                            $sql="SELECT id FROM mawkoof_data WHERE ketab_num = ".$row_public['ketab_num']." AND ketab_date = '".$row_public['ketab_date']."' AND  jeha = '$jeha_profile' AND details_type='$details_type' ORDER BY id  ASC";
                            $sql_result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($sql_result) > 0) {
                                $c=1;
                                while ($row = mysqli_fetch_assoc($sql_result)) {
                                    //echo $c.'-'.$row['id'].'<br>';
                                    $mawkoof_count++;
                                    $c++;
                                }
                            }else{
                                $mawkoof_count = 0;
                            }
                            ?>
                            <?php echo $mawkoof_count; ?>
                        </td>
                       
                       
                    </tr>
                <?php 
               
                $count++;}?>
            </tbody>
           <!--  <tfoot> -->
                <tr>
                    <th colspan=2>المجموع</th>
                    <th colspan=10>
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