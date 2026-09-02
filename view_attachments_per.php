<?php
$per_sql = "SELECT * FROM users_per WHERE user_id = $userid AND per_type='الديوان' AND jeha='$jeha_profile'";
$per_sql_result = mysqli_query($conn,$per_sql);
if (mysqli_num_rows($per_sql_result) > 0) {
    $per_row = mysqli_fetch_assoc($per_sql_result);
    $per_del = $per_row['del'];
    $per_download = $per_row['download'];
    $per_type = $per_row['per_type'];
}else{
    $per_del = 0;
    $per_download = 0;
    $per_type = 0;
}
    
?>
                                        <table  id="" class="example display cell-border compact row-border hover order-column stripe text-center" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <?php if ($per_del == 1 && $per_type == 'الديوان') { ?>
                                                    <th>حذف</th>
                                                    <?php } ?>
                                                    <?php if ($per_download == 1 && $per_type == 'الديوان') { ?>
                                                    <th>تنزيل</th> 
                                                    <?php } ?>                                                
                                                    <th>اسم الملف</th> 
                                                    <th>الحجم</th> 
                                                    <th>النوع</th>                                                 
                                                    <th>رقم الديوان</th>                                                    
                                                    <th>رقم الكتاب</th>
                                                    <th>رقم الإضبارة</th>
                                                    <th>رقم بلاغ الجهة الطالبة</th>
                                                    <?php if($jeha_profile == 'الإدارة المركزية للمعلومات'){ ?>
                                                    <th>رقم بلاغ الجهة الآمرة</th>
                                                    <?php }?>
                                                    <th>رقم المصدر</th> 
                                                    <th>السنة</th> 
                                                    <th>نوع البيانات</th> 
                                                    <th>الجهة</th>
                                                    <th>المستخدم</th>
                                                    <th>تاريخ الرفع</th>                                              
                                                </tr>
                                            </thead>
                                            <tbody>
                                <?php
                                while($row = mysqli_fetch_assoc($result)) {                                    
                                  
                                    echo '<tr>';
                                    if ($per_del == 1 && $per_type == 'الديوان') {
                                        echo '<td><a href="delete.php?id='.$row['id'].'&jeha='.$_GET['jeha'].'&delete_attach=true" onclick="'."return confirm('متأكد من الحذف؟');".'"><i style="font-size: 2.5rem" class="zwicon-delete"></i></a></td>';
                                    }
                                   if ($per_download == 1 && $per_type == 'الديوان') {
                                       if (strpos($row["path"], 'summernote') !== false) {
                                           echo '<td> <a href="inc/file_download.php?path='.$row["path"].'">
                                    <i style="font-size: 2.5rem" class="zwicon-file-download"></i></a></td>';
                                       } else {
                                           echo '<td> <a href="inc/file_upload/file_decrypt.php?path='.$row["path"].'">
                                        <i style="font-size: 2.5rem" class="zwicon-file-download"></i></a></td>';
                                       }
                                   }
                                   

                                    echo            
                                  
                                    '<td>' .$row["name"].'</td>' .
                                    '<td>' .formatSizeUnits($row["size"]).'</td>' .
                                    '<td>' .$row["type"].'</td>' .
                                    '<td>' .$row["dewan_num"].'</td>' .
                                    '<td>' .$row["ketab_num"].'</td>' .
                                    '<td>' .$row["edbara_num"].'</td>' .
                                    '<td>' .$row["balagh_num"].'</td>' ;
                                    if($jeha_profile == 'الإدارة المركزية للمعلومات'){
                                    echo '<td>' .$row["sho3ba_balagh_num"].'</td>' ;
                                    }
                                    echo '<td>' .$row["masdar_num"].'</td>' .
                                    '<td>' .$row["e_year"].'</td>' .
                                    '<td>' .$row["details_type"].'</td>' .
                                    '<td>' .$row["jeha"].'</td>' ;
                                    if($admin == 1 || $admin == 7  || $admin==5){
                                      echo '<td>';if (@strlen($row["added_by"]) >= 20) {
                                      echo substr($row["added_by"], 0, 10). " ... " . substr($row["added_by"], -20);
                                  }
                                  else {
                                      echo $row["added_by"];
                                  }echo '</td>'.
                                    '<td class="noprint">'.$row["add_date"].'</td>';                                }         
                                    
                                    echo '</tr>';
                                }
                          ?>
