                                        <table  id="" class="example display cell-border compact row-border hover order-column stripe text-center" style="width:100%">
                                            <thead>
                                                <tr>
                                                <?php  if ($admin == 1 || $admin == 7 || $admin == 5){ ?>
                                                  <th>حذف</th>
                                                  <?php }?>
                                                    <th>تفاصيل</th>                                                    
                                                    <th>طباعة</th>        
                                                    <th>خاص بالجهة؟</th>                                            
                                                    <th>رقم الكتاب</th>                                                   
                                                    <th >تاريخ الكتاب</th>                                                   
                                                    <th>عنوان الكتاب</th> 
                                                    <th>الجهة المرسلة</th> 
                                                    <th>الجهة المرسل إليها</th>                                                    
                                                    <th>مرفقات الكتاب</th>
                                                  <?php if ($admin == 1 || $admin == 7 ){ ?>
                                                    <th>المُدخل</th>
                                                    <th>تاريخ آخر تعديل</th>
                                                  <?php } ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                <?php
                                while($row = mysqli_fetch_assoc($result)) {                                    
                                    @$newcipheattach = $row['k_attach'];  
                                    @$k_attach_extension = $row['k_attach_extension'];                             
                                    $insert_year = $row['e_year']; 
                                    echo '<tr>';
                                    if ($admin == 1 || $admin == 7 || $admin == 5){
                                      /* if ($details_type !=='صادر'){ */
                                      echo'<td><a href="delete.php?id='.$row["id"].'&jeha='.$jeha1.'&details_type='.$details_type.'&delete_ketab_private=true" onclick="'."return confirm('متأكد من الحذف؟ سيتم حذف بيانات الدراسة');".'"><i style="font-size: 2.5rem" class="zwicon-delete"></i></a></td>';
                                    /* } */
                                  }

                                    echo'<td> <a href="k_edit.php?id='.$row["id"].'&jeha='.$row['jeha'].'&details_type='.$details_type.'"><i style="font-size: 2.5rem" class="zwicon-edit-circle"></i></a></td>'.
                                    '<td> <a target="_blank" href="print-elements.php?k_id='.$row['id'].'&jeha='.$row['jeha'].'&e_year='.$insert_year.'&details_type='.$details_type.'&type=ketab_all"><i style="font-size: 2.5rem" class="zwicon-printer"></i></a></td>';                                   
                                    echo      
                                    '<td>'.$row["isPrivate"].'</td>'.      
                                    '<td>'.$row["k_num"].'</td>'.                                    
                                    '<td>' .$row["k_date"].'</td>'.                               
                                    '<td>'.$row["k_title"].'</td>'.
                                    '<td>'.$row["sendfrom"].'</td>'.
                                    '<td>'.$row["sendto"].'</td>';
                                    
                                    @$attach = $row['k_attach'];
                                    @$attach_extension = $row['k_attach_extension'];                                               
                                    if(@strlen($attach)>300){
                                      echo '<td><a href="data:application/'.$attach_extension.';base64,'.base64_encode($attach).'">تنزيل</a></td>';
                                      }else {
                                        if (!empty($attach)){                                                                                
                                          echo '<td><a href="'.$url_host.'/inc/file_upload/file_decrypt.php?path='.$attach.'">تنزيل</a></td>';                                
                                        }else {echo '<td>'.'لا يوجد مرفقات'.'</td>';} 
                                      }

                                  if($admin == 1 || $admin == 7 ){
                                    echo '<td>';if (@strlen($row["added_by"]) >= 20) {
                                    echo substr($row["added_by"], 0, 10). " ... " . substr($row["added_by"], -20);
                                }
                                else {
                                    echo $row["added_by"];
                                }echo '</td>'.
                                  '<td class="noprint">'.$row["add_date"].'</td>';
                                }
                                    echo '</tr>';
                                    //$count++;
                                }
                          ?>
<?php
                                                  
                                                  
                                                 ?>