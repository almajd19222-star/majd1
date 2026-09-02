                                <table  id="" class="example display cell-border compact row-border hover order-column stripe text-center" style="width:100%">
                                    <thead>
                                                
                                <?php 
                                $resala_type="كتاب";
                                echo '<tr><th>تفاصيل</th>';
                                   if ($details_type=='قيد المعالجة'){
                                    echo '<th>تصدير؟</th>' ;
                                    } 
                                    if (($details_type=='وارد' || $details_type=='قيد المعالجة') && ($admin == 1 || $admin == 7)){
                                      echo '<th>تبعية المعلومات</th>';
                                      }                                            
                                   
                                    
                                    echo '<th>رقم الديوان</th><th>تاريخ الديوان</th><th>رقم ال'.$resala_type.'</th>'
                                  .'<th>تاريخ ال'.$resala_type.'</th>'
                                  .'<th>تاريخ استلام ال'.$resala_type.'</th>'
                                  .'<th>';
                                   echo 'تاريخ الإرسال';
                                  echo '</th>'
                                  /* .'<th>عنوان ال'.$resala_type.'</th>' */
                                  .'<th>موضوع ال'.$resala_type.'</th>'
                                  .'<th>تاريخ ورودها المتتابع</th>'
                                  .'<th>متابعة مسار ال'.$resala_type.'</th>'
                                  .'<th>تاريخ متابعة مسار ال'.$resala_type.'</th>'
                                  .'<th>الجهة المرسلة</th><th>الجهة المرسل إليها</th>'                            
                                  .'<th style="display:none">ملخص التقرير</th>'
                                  .'<th style="display:none">ملخص ال'.$resala_type.'</th>'
                                  .'<th>درجة السرعة</th>'
                                  .'<th>درجة مصداقية المعلومات</th>'
                                  .'<th>درجة السرية</th>'
                                  .'<th>مصدر المعلومات</th>'
                                  .'<th style="display:none">ملاحظات</th>'
                                  .'<th>مرفقات ال'.$resala_type.'</th>';?>
                                  <?php if ($admin == 1 || $admin == 7 || $admin==5){ ?>
                                                    <!-- <th >المُدخل</th> -->
                                                    <th >تاريخ آخر تعديل</th>
                                                  <?php } ?>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php
                               while($row_reports = mysqli_fetch_assoc($result)){
                                $ketab_num=$row_reports['ketab_num']; 
                                $id=$row_reports['id']; 
                                $e_id=$row_reports['e_id'];        
                                $e_jeha=$row_reports["jeha"];
                                $e_details_type=$row_reports["details_type"];
                                $e_resala_type=$row_reports["resala_type"];
                                $r_attach = $row_reports['r_attach']; 
                                $insert_year = $row_reports['e_year']; 
                                $added_by_old = $row_reports['added_by'];
                                $r_attach_extension = $row_reports['r_attach_extension'];
                                if($row_reports["r_important"]=='نعم'){ 
                                echo '<tr style="background-color:#c1f9b3">';
                                }else{
                                  echo '<tr>';
                                }
                                echo '<td><a href="k_pub_edit.php?id='.$id.'&e_id='.$e_id.'&jeha='.$e_jeha.'&details_type='.$e_details_type.'&resala_type='.$e_resala_type.'&e_year='.$insert_year.'"><i style="font-size: 2.5rem" class="zwicon-edit-circle"></i></a></td>';
                                  if($details_type=='قيد المعالجة'){
                                    if($row_reports['ketab_type']=='public'){
                                    if($row_reports['sader']!=1){
                                  echo
                                  '<td><a href="processing_to_sader.php?id='.$id.'&ketab_num='.$ketab_num.'&e_id='.$e_id.'&jeha='.$e_jeha.'&details_type='.$e_details_type.'&resala_type='.$e_resala_type.'&e_year='.$insert_year.'&added_by_old='.$added_by_old.'&type=k_pub" onclick="'."return confirm('متأكد من تصدير البيانات المحددة؟');".'"><i style="font-size: 2.5rem" class="zwicon-export"></i></a></td>';
                                  }else{
                                    echo "<td>تم</td>" ;
                                  }
                                }else{
                                  echo '<td></td>';
                                }
                                  }
                                 /*  echo
                                  '<td> <a target="_blank" href="print-elements.php?id='.$id.'&jeha='.$e_jeha.'&details_type='.$e_details_type.'&resala_type='.$e_resala_type.'&e_year='.$insert_year.'&type=k_pub"><i style="font-size: 2.5rem" class="zwicon-printer"></i></a></td>'; */
                                  if (($details_type=='وارد' || $details_type=='قيد المعالجة') && ($admin == 1 || $admin == 7)){
                                    echo '<td>'.$row_reports["jeha"].'</td>';
                                  }
                                echo                  
                                             
                                '<td>'.$row_reports["dewan_num"].'</td>'
                                .'<td>'.$row_reports["dewan_date"].'</td>'
                                .'<td>'.$row_reports["ketab_num"].'</td>'
                                .'<td>'.$row_reports["ketab_date"].'</td>'                                  
                                .'<td>'.$row_reports["r_handle_date"].'</td>'
                                .'<td>'.$row_reports["send_date"].'</td>'
                                /* .'<td>'.$row_reports["r_address"].'</td>'  */
                                .'<td>'.$row_reports["r_title"].'</td>'                                   
                                .'<td>'.$row_reports["r_follow_date"].'</td>'
                                .'<td>'.$row_reports["r_follow"].'</td>'
                                .'<td>'.$row_reports["r_following_date"].'</td>'
                                .'<td>'.$row_reports['sendfrom'].'</td>'                                
                                .'<td>'.$row_reports['sendto'].'</td>';

                                echo '<td style="display:none">'.$row_reports['report_brief'].'</td>'
                                .'<td style="display:none">'.$row_reports['ketab_brief'].'</td>'
                                .'<td>'.$row_reports['speed_level'].'</td>'
                                .'<td>'.$row_reports['info_level'].'</td>'
                                .'<td>'.$row_reports['security_level'].'</td>'
                                .'<td>'.$row_reports['info_masdar'].'</td>'
                                .'<td style="display:none">'.$row_reports['report_notes'].'</td>';

                                if(@strlen($r_attach)>100){
                                  echo '<td >'.'<a href="data:application/'.$r_attach_extension.';base64,'.base64_encode($r_attach).'">تنزيل</a></td>';
                                }else {echo '<td > لا يوجد مرفقات </td>';}                                  
                               
                                if($admin == 1 || $admin == 7  || $admin==5){
                                 /*  echo '<td>';
                                  if (@strlen($row_reports["added_by"]) >= 20) {
                                  echo substr($row_reports["added_by"], 0, 10). " ... " . substr($row_reports["added_by"], -20);
                              }
                              else {
                                  echo $row_reports["added_by"];
                              }echo '</td>'. */
                                echo '<td class="noprint">'.$row_reports["add_date"].'</td>';
                              }     
                              echo '</tr>';                                               
                            }
                          ?>
