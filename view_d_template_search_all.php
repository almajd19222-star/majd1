
                                        <table  id="" class="example display cell-border compact row-border hover order-column stripe text-center" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>تفاصيل</th>                                                    
                                                    <th>طباعة</th> 
                                                    <th>الجهة</th>
                                                    <th>نوع البيانات</th>
                                                    <th>رقم الديوان</th>
                                                    <th>السنة</th>
                                                    <th>تاريخ الديوان</th> 
                                                    <th>رقم الرسالة</th>
                                                    <th>تاريخ الرسالة</th> 
                                                    <th>الجهة المرسلة</th>
                                                    <th>الخلاصة</th> 
                                                    <th>تاريخ ورودها المتتابع</th>
                                                    <th >النتيجة</th> 
                                                    <th>الجهة المرسل إليها</th>   
                                                    <th><?php //if($details_type=='صادر' ){ echo 'تاريخ الإرسال';} else{ echo 'تاريخ الاستلام'; } ?></th>
                                                    <th>ملاحظات</th>                                                 
                                                   <!--  <th>صورة الرسالة</th> -->
                                                  <?php if ($admin == 1 || $admin == 7 ){ ?>
                                                    <th>المُدخل</th>
                                                    <th>تاريخ آخر تعديل</th>
                                                  <?php } ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                <?php
                                while($row = mysqli_fetch_assoc($result)) {                                    
                                    @$d_attach = $row['d_attach']; 
                                    @$d_attach_extension = $row['d_attach_extension'];                              
                                    if($row["dewan_num"]==0){
                                    
                                    echo'<tr class="bg-info">';
                                    }else{
                                    echo '<tr>';
                                    }
                                    echo'<td> <a href="d_edit.php?d_id='.$row["d_id"].'&jeha='.$row["jeha"].'&details_type='.$row["details_type"].'&resala_type='.$row["resala_type"].'&e_year='.$row["e_year"].'"><i style="font-size: 2.5rem" class="zwicon-edit-circle"></i></a></td>'.
                                    '<td> <a target="_blank" href="print-elements.php?id='.$row['id'].'&jeha='.$row['jeha'].'&details_type='.$row['details_type'].'&type=dewan"><i style="font-size: 2.5rem" class="zwicon-printer"></i></a></td>';
                                                                        
                                    echo                 
                                    '<td>'.$row["jeha"].'</td>'.  
                                    '<td>'.$row["details_type"].'</td>'.             
                                    '<td>'.$row["dewan_num"].'</td>'.
                                    '<td>'.$row["e_year"].'</td>'.
                                    '<td>'.$row["dewan_date"].'</td>'. 
                                    '<td>'.$row["ketab_num"].'</td>'.
                                    '<td>'.$row["ketab_date"].'</td>'.
                                    '<td>'.$row["sendfrom"].'</td>'.
                                    '<td>'.$row["brief"].'</td>'.
                                    '<td>'.$row["following_date"].'</td>'.
                                    '<td>'.$row["result"].'</td>'.
                                    '<td>'.$row["sendto"].'</td>'.
                                    '<td>'.$row["sendto_date"].'</td>'.
                                    '<td>'.$row["note"].'</td>';
                                    
                                  /* if(@strlen($d_attach)>100){
                                    echo '<td>'.'<a href="data:application/'.$d_attach_extension.';base64,'.base64_encode($d_attach).'">تنزيل</a></td>';
                                  }else {echo '<td>'.'لا يوجد مرفقات'.'</td>';} */
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
