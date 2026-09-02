
                                        <table  id="" class="example display cell-border compact row-border hover order-column stripe text-center" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>حذف</th>
                                                    <th>تنزيل</th>                                                    
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
                                  
                                    echo '<tr>'.
                                    '<td><a href="delete.php?id='.$row['id'].'&jeha='.$_GET['jeha'].'&delete_attach=true" onclick="'."return confirm('متأكد من الحذف؟');".'"><i style="font-size: 2.5rem" class="zwicon-delete"></i></a></td>';
                                    if (strpos($row["path"],'summernote_editor') !== false) {
                                    echo '<td> <a target="_blank" href="'.$row["path"].'">
                                    <i style="font-size: 2.5rem" class="zwicon-file-download"></i></a></td>';
                                    }else{
                                        echo '<td> <a href="inc/file_upload/file_decrypt.php?path='.$row["path"].'">
                                        <i style="font-size: 2.5rem" class="zwicon-file-download"></i></a></td>';
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
