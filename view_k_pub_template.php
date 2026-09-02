<?php $td_class = "show-read-more"; ?>
                                <table  id="" class="example display cell-border compact row-border hover order-column stripe text-center" style="width:100%">
                                    <thead>
                                                
                                <?php 
                                $resala_type="كتاب";
                                echo '<tr>';
                                if ($jeha1 !== $jeha_profile && $details_type=='قيد المعالجة' && ($admin == 1 || $admin == 7)){
                                  echo '<th>تجميع</th>';  
                                }
                                if ($details_type=='قيد المعالجة' && $jeha_profile=='الإدارة المركزية للمعلومات') {
                                    echo '<th>أرشفة</th>';
                                }
                                if ($admin == 1 || $admin == 7 || $admin==5){
                                  if ($details_type =='قيد المعالجة'){
                                    echo'<th>حذف مع كل الملحقات</th>';
                                  }
                                  if ($details_type !=='صادر'){
                                    echo'<th>حذف</th>';
                                  }
                                } 
                                echo '<th>تفاصيل</th>';
                                if (empty($details_type)){
                                echo '<th>تبعية المعلومات</th><th>نوع الإدخال</th>';
                                }
                                   if ($details_type=='قيد المعالجة' && $admin != 6){
                                    echo '<th>تصدير؟</th>' ;
                                    } 
                                    if ($details_type=='وارد' && $admin != 6){
                                      echo '<th>نسخ إلى المعالجة</th>' ;
                                      } 
                                    if (($details_type=='وارد' || $details_type=='قيد المعالجة') && ($admin == 1 || $admin == 7)){
                                      echo '<th>تبعية المعلومات</th>';
                                      }                                            
                                   
                                    echo '<th>نوع ال'.$resala_type.'</th>';
                                    echo '<th>المحتوى</th>';
                                    if($details_type !== 'قيد المعالجة'){
                                      echo '<th>رقم الديوان</th><th>تاريخ الديوان</th>';
                                    }
                                    
                                    echo '<th>رقم ال'.$resala_type.'</th>'
                                  .'<th>تاريخ ال'.$resala_type.'</th>'
                                  . '<th>رقم الإضبارة'; 
                                  if ($jeha_profile == 'الإدارة المركزية للمعلومات' && $details_type=='صادر'){ echo ' العام';  }
                                  echo'</th>'
                                  .'<th>تاريخ الإضبارة</th>';
                                  if($details_type !== 'قيد المعالجة'){
                                    echo '<th>تاريخ تسليم ال'.$resala_type.'</th>';
                                  }
                                  echo '<th>';
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
                                                    <th >المُدخل</th>
                                                    <th >تاريخ آخر تعديل</th>
                                                  <?php } ?>
                                    <?php  if ($details_type !== 'وارد'){
                                      echo '<th>الجهة الأصل</th>'
                                      .'<th>رقم كتاب الأصل</th>'
                                      .'<th>تاريخ كتاب الأصل</th>';
                                    }
                                      ?>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php
                               while($row_reports = mysqli_fetch_assoc($result)){
                                /* if(@$_GET['decrypt_file']){
                                  include_once "inc/file_upload/file_decrypt.php";
                                } */

                                

                              
                                $ketab_num=$row_reports['ketab_num']; 
                                $id=$row_reports['id']; 
                                $e_id=$row_reports['e_id'];        
                                $e_jeha=$row_reports["jeha"];
                                $e_details_type=$row_reports["details_type"];
                                $e_resala_type=$row_reports["resala_type"];
                                $r_attach = $row_reports['r_attach']; 
                                $insert_year =  date('Y',strtotime($row_reports['ketab_date'])); 
                                $added_by_old = $row_reports['added_by'];
                                $r_attach_extension = $row_reports['r_attach_extension'];
                                $ketab_date=$row_reports['ketab_date'];

                                /* if($row_reports["r_important"]=='نعم'){ 
                                  echo '<tr style="background-color:#c1f9b3">';
                                }else{
                                  echo '<tr>';
                                } */
                                
                                
                                if($admin == 6) {   
                                  if($jeha_profile !== 'الإدارة المركزية للمعلومات'){
                                    if(empty($row_reports["ketab_brief"])){
                                      echo '<tr class="" style="background-color:#46B7FA">';
                                    }
                                    else{
                                      if($row_reports["r_important"]=='نعم'){ 
                                        echo '<tr style="background-color:#c1f9b3">';
                                      }else{
                                        echo '<tr>';
                                      }
                                     
                                    }   
                                  }else{
                                    if (@strpos($row_reports["added_by"], $_SESSION['user']) !== false) {
                                      if($row_reports["r_important"]=='نعم'){ 
                                        echo '<tr style="background-color:#c1f9b3">';
                                      }else{
                                        echo '<tr>';
                                      }
                                    }else{
                                      echo '<tr class="" style="background-color:#46B7FA">';
                                    }
                                  }                               
                                }else{
                                  if($row_reports["r_important"]=='نعم'){ 
                                    echo '<tr style="background-color:#c1f9b3">';
                                  }else{
                                    echo '<tr>';
                                  }
                                }

                               
                                 
                                  if ($jeha1 !== $jeha_profile && $details_type=='قيد المعالجة' && ($admin == 1 || $admin == 7 )) {
                                    if($row_reports['ketab_type']=='public'){
                                    echo
                                    '<td class="'.$td_class.'"><a href="processing_to_processing.php?id='.$id.'&ketab_num='.$ketab_num.'&e_id='.$e_id.'&jeha='.$e_jeha.'&details_type='.$e_details_type.'&resala_type='.$e_resala_type.'&e_year='.$insert_year.'&added_by_old='.$added_by_old.'&type=k_pub" onclick="'."return confirm('متأكد من تجميع الكتاب المحدد؟');".'"><i style="font-size: 2.5rem" class="zwicon-persona"></i></a></td>';
                                  }
                                }
                                if ($jeha_profile == 'الإدارة المركزية للمعلومات' && $details_type =='قيد المعالجة') {
                                  if (@strpos($row_reports["ketab_brief"], '** للأرشفة **') !== false) {
                                      echo '<td></td>';
                                  } else {
                                      echo'<td class="'.$td_class.'"><a href="k_pub_archive.php?id='.$id.'&jeha='.$row_reports["jeha"].'&details_type='.$row_reports["details_type"].'&resala_type='.$e_resala_type.'&type='.$_GET['type'].'&archive_report_info=true" onclick="'."return confirm('متأكد من أرشفة هذا الكتاب؟');".'"><i style="font-size: 2.5rem" class="zwicon-add-note"></i></a></td>';
                                  }
                              }

                                if ($admin == 1 || $admin == 7 || $admin == 5){
                                  if ($details_type =='قيد المعالجة'){
                                  if($hasPerm_delete == '1'){
                                    echo'<td class="'.$td_class.'"><a href="delete.php?ketab_num='.$ketab_num.'&ketab_date='.$ketab_date.'&jeha='.$row_reports["jeha"].'&details_type=قيد المعالجة&resala_type='.$e_resala_type.'&type='.$_GET['type'].'&delete_report_info_ALL=true" onclick="'."return confirm('متأكد من حذف الكتاب مع كل ملحقاته؟');".'"><i style="font-size: 2.5rem" class="zwicon-folder-delete"></i></a></td>';
                                    }
                                  
                                   }
                                  if ($details_type !=='صادر'){
                                  if($hasPerm_delete == '1'){
                                  echo'<td class="'.$td_class.'"><a href="delete.php?id='.$id.'&jeha='.$row_reports["jeha"].'&details_type='.$row_reports["details_type"].'&resala_type='.$e_resala_type.'&type='.$_GET['type'].'&delete_report_info=true" onclick="'."return confirm('متأكد من حذف الكتاب؟');".'"><i style="font-size: 2.5rem" class="zwicon-delete"></i></a></td>';
                                    }
                                
                                 }
                                 
                                }

                                echo '<td class="'.$td_class.'"><a href="k_pub_edit.php?id='.$id.'"><i style="font-size: 2.5rem" class="zwicon-edit-circle"></i></a></td>';
                                if (empty($details_type)){
                                  echo '<th>'.$row_reports['jeha'].'</th><th>'.$row_reports['details_type'].'</th>';
                                  }

                                  if($details_type=='قيد المعالجة' && $admin != 6 ){
                                    if($row_reports['ketab_type']=='public'){
                                      
                                      if($jeha_profile=='الإدارة المركزية للمعلومات'){
                                        echo
                                        '<td class="'.$td_class.'"><a href="processing_to_sader.php?id='.$id.'&ketab_num='.$ketab_num.'&e_id='.$e_id.'&jeha='.$e_jeha.'&details_type='.$e_details_type.'&resala_type='.$e_resala_type.'&e_year='.$insert_year.'&added_by_old='.$added_by_old.'&type=k_pub" onclick="'."return confirm('متأكد من تصدير البيانات المحددة؟');".'"><i style="font-size: 2.5rem" class="zwicon-export"></i></a></td>';
                                      }else{

                                    if($row_reports['sader'] != 1 ){
                                      echo
                                      '<td class="'.$td_class.'"><a href="processing_to_sader.php?id='.$id.'&ketab_num='.$ketab_num.'&e_id='.$e_id.'&jeha='.$e_jeha.'&details_type='.$e_details_type.'&resala_type='.$e_resala_type.'&e_year='.$insert_year.'&added_by_old='.$added_by_old.'&type=k_pub" onclick="'."return confirm('متأكد من تصدير البيانات المحددة؟');".'"><i style="font-size: 2.5rem" class="zwicon-export"></i></a></td>';
                                      }else{
                                        echo "<td>تم</td>" ;
                                      }
                                    }
                                  }else{
                                    echo '<td class="'.$td_class.'"></td>';
                                  }
                                }
                                if($details_type=='وارد' && $admin != 6){
                                  if($row_reports['ketab_type']=='public'){
                                  echo
                                  '<td class="'.$td_class.'"><a href="wared_to_processing2.php?id='.$id.'&ketab_num='.$ketab_num.'&e_id='.$e_id.'&jeha='.$e_jeha.'&details_type='.$e_details_type.'&resala_type='.$e_resala_type.'&e_year='.$insert_year.'&added_by_old='.$added_by_old.'&type=k_pub" onclick="'."return confirm('متأكد من نسخ البيانات  المحددة إلى مرحلة المعالجة؟');".'"><i style="font-size: 2.5rem" class="zwicon-export"></i></a></td>';
                                }else{
                                  echo '<td class="'.$td_class.'"></td>';
                                }
                                }
                                 /*  echo
                                  '<td class="'.$td_class.'"> <a target="_blank" href="print-elements.php?id='.$id.'&jeha='.$e_jeha.'&details_type='.$e_details_type.'&resala_type='.$e_resala_type.'&e_year='.$insert_year.'&type=k_pub"><i style="font-size: 2.5rem" class="zwicon-printer"></i></a></td>'; */
                                  if (($details_type=='وارد' || $details_type=='قيد المعالجة') && ($admin == 1 || $admin == 7)){
                                    echo '<td class="'.$td_class.'">'.$row_reports["jeha"].'</td>';
                                  }
                                  
                                echo   '<td class="'.$td_class.'">';
                                if($row_reports['ketab_type']=='personal'){
                                  echo 'شخصي';
                                }
                                if($row_reports['ketab_type']=='public'){
                                  echo 'عام';
                                }
                                echo '</td>';
                                echo '<td class="'.$td_class.'">'.$row_reports["isReport"].'</td>';
                              
                                if($details_type !== 'قيد المعالجة'){
                                  echo '<td class="'.$td_class.'">'.$row_reports["dewan_num"].'</td>'
                                  .'<td class="'.$td_class.'">'.$row_reports["dewan_date"].'</td>';
                                }                       
                                
                                echo '<td class="'.$td_class.'">'.$row_reports["ketab_num"].'</td>'
                                .'<td class="'.$td_class.'">'.$row_reports["ketab_date"].'</td>'
                                .'<td class="'.$td_class.'">'.$row_reports["edbara_num"].'</td>'
                                .'<td class="'.$td_class.'">'.$row_reports["edbara_date"].'</td>';
                                if($details_type !== 'قيد المعالجة'){
                                echo '<td class="'.$td_class.'">'.$row_reports["r_handle_date"].'</td>';
                                }
                                echo '<td class="'.$td_class.'">'.$row_reports["send_date"].'</td>'
                               /*  .'<td class="'.$td_class.'">'.$row_reports["r_address"].'</td>' */ 
                                .'<td class="'.$td_class.'">'.$row_reports["r_title"].'</td>'                                   
                                .'<td class="'.$td_class.'">'.$row_reports["r_follow_date"].'</td>'
                                .'<td class="'.$td_class.'">'.$row_reports["r_follow"].'</td>'
                                .'<td class="'.$td_class.'">'.$row_reports["r_following_date"].'</td>'
                                .'<td class="'.$td_class.'">'.$row_reports['sendfrom'].'</td>'                                
                                .'<td class="'.$td_class.'">'.$row_reports['sendto'].'</td>';

                                echo '<td style="display:none">'.$row_reports['report_brief'].'</td>'
                                .'<td style="display:none">'.$row_reports['ketab_brief'].'</td>'
                                .'<td class="'.$td_class.'">'.$row_reports['speed_level'].'</td>'
                                .'<td class="'.$td_class.'">'.$row_reports['info_level'].'</td>'
                                .'<td class="'.$td_class.'">'.$row_reports['security_level'].'</td>'
                                .'<td class="'.$td_class.'">'.$row_reports['info_masdar'].'</td>'
                                .'<td style="display:none">'.$row_reports['report_notes'].'</td>';

                                //if(@strlen($r_attach)>100){
                                 if (!empty($row_reports['r_attach'])){ 
                                    $r_attach=$row_reports['r_attach'];                                  
                                      echo '<td><a href="'.$url_host.'/inc/file_upload/file_decrypt.php?path='.$r_attach.'">تنزيل</a></td>';                                
                                }else {echo '<td> لا يوجد مرفقات </td>';}                                  
                               
                                if ($admin == 1 || $admin == 7 || $admin==5){
                                  echo '<td class="'.$td_class.'">'.$row_reports["added_by"].'</td>'.
                                  '<td class="noprint">'.$row_reports["add_date"].'</td>';
                                }
                                if ($details_type !== 'وارد'){
                                  echo '<td class="'.$td_class.'">'.$row_reports["origin_sendfrom"].'</td>'.
                                  '<td class="noprint">'.$row_reports["origin_ketab_num"].'</td>'.
                                  '<td class="noprint">'.$row_reports["origin_ketab_date"].'</td>';
                                }
                              echo '</tr>';                                               
                            }
                          ?>
                    </tbody>
                  </table>