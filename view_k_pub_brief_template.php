                                        <table  id="" class="example display cell-border compact row-border hover order-column stripe text-center" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>حذف</th>                                                    
                                                    <th>طباعة</th> 
                                                   
                                                    <th>تاريخ من</th>
                                                    <th>تاريخ إلى</th>
                                                    <th >رقم الفهرس</th>                                                   
                                                    <th>تاريخ الفهرس</th> 
                                                    <th>بداية الرقم المتسلسل</th> 
                                                    <th>نوع البيانات</th>                                                  
                                                  <?php if ($admin == 1 || $admin == 7 ){ ?>
                                                    <th>المُدخل</th>
                                                    <th>تاريخ آخر تعديل</th>
                                                  <?php } ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                <?php
                                while($row = mysqli_fetch_assoc($result)) {                                    
                                   
                                    $index_num= $row['index_num'];
                                    $serial_num= $row['serial_num'];
                                    $index_date= $row['index_date'];
                                    $ketab_date_from= $row['ketab_date_from'];
                                    $ketab_date_to= $row['ketab_date_to'];

                                    echo'<tr><td> <a href="delete.php?id='.$row["id"].'&jeha='.$row['jeha'].'&details_type='.$details_type.'&delete_ketab_brief_index=true" onclick="'."return confirm('متأكد من الحذف؟');".'"><i style="font-size: 2.5rem" class="zwicon-delete"></i></a></td>';
                                    if($row['index_type']=='personal'){
                                    echo 
                                    '<td> <a target="_blank" href="print_checked_briefj.php?ketab_date_from='.$ketab_date_from.'&ketab_date_to='.$ketab_date_to.'&jeha='.$jeha1.'&details_type='.$details_type.'&submit=submit&index='.$index_num.'&serial='.$serial_num.'&index_date='.$index_date.'"><i style="font-size: 2.5rem" class="zwicon-printer"></i></a></td>';  
                                    }else{
                                      echo 
                                    '<td> <a target="_blank" href="print_checked_brief3.php?ketab_date_from='.$ketab_date_from.'&ketab_date_to='.$ketab_date_to.'&jeha='.$jeha1.'&details_type='.$details_type.'&submit=submit&index='.$index_num.'&serial='.$serial_num.'&index_date='.$index_date.'"><i style="font-size: 2.5rem" class="zwicon-printer"></i></a></td>'; 
                                    }                                 
                                    echo                               
                                    '<td>'.$row["ketab_date_from"].'</td>'.
                                    '<td>'.$row["ketab_date_to"].'</td>'.
                                    '<td>' .$row["index_num"].'</td>'.                               
                                    '<td>'.$row["index_date"].'</td>'.
                                    '<td>'.$row["serial_num"].'</td>'.
                                    '<td>'.$row["details_type"].'</td>';
                                    
                                 
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
