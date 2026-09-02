<?php $td_class = "show-read-more"; ?>
                                        <table class="example display cell-border compact row-border hover order-column stripe text-center" style="width:100%">
                                            <thead>
                                                <tr>
                                                <?php  if ($admin == 1 || $admin == 7 || $admin==5){
                                                  if ($details_type !=='صادر'){ ?>
                                                    <th>حذف</th>
                                                  <?php }} ?>
                                                    <th>تفاصيل</th>
                                                    <?php if ($jeha_profile=='الإدارة المركزية للمعلومات' && $details_type=='قيد المعالجة' && $admin != 6){ ?>
                                                      <th>تصدير؟</th>
                                                    <?php }else{ ?>
                                                    <?php if ($jeha1==$jeha_profile && $details_type=='قيد المعالجة' && $admin != 6) { ?>
                                                    <th>تصدير؟</th>  
                                                    <?php }  ?>
                                                  

                                                    <?php if ($jeha1 !== $jeha_profile && $details_type=='قيد المعالجة' && ($admin == 1 || $admin == 7)){ ?>
                                                    <th>تجميع لإضبارة فرع</th>  
                                                    <?php } ?> 

                                                 <?php }?> 


                                                    <?php if ($details_type=='وارد' && $admin != 6){ ?>
                                                    <th>نسخ إلى المعالجة</th>  
                                                    <?php } ?>
                                                    <?php if($admin!=5 && $admin != 6) {?>                                
                                                    <th>طباعة الإضبارة</th> 
                                                    <?php } ?>
                                                   <?php /* if (($details_type=='وارد' || $details_type=='قيد المعالجة') && ($admin == 1 || $admin == 7)){
                                                      echo '<th>تبعية المعلومات</th>';
                                                    } */ ?>
                                                      
                                                       <?php
                                                       if (strpos($jeha_profile, 'داخلي') !== false || strpos($jeha1, 'داخلي') !== false){ ?>
                                                        <th>الرقم الذاتي</th>
                                                        <?php }?>
                                                    <th>رقم الإضبارة <?php if ($jeha_profile == 'الإدارة المركزية للمعلومات' && $details_type=='صادر'){ ?> العام <?php }?></th>
                                                   
                                                    <th>تاريخ الإضبارة <?php if ($jeha_profile == 'الإدارة المركزية للمعلومات' && $details_type=='صادر'){ ?> العام <?php }?></th>                                                  
                                                   <!--  <th>رقم الديوان <?php //if ($jeha_profile == 'الإدارة المركزية للمعلومات'){ ?> العام <?php //}?></th>
                                                    <th>تاريخ الديوان <?php //if ($jeha_profile == 'الإدارة المركزية للمعلومات'){ ?> العام <?php // }?></th> -->
                                                  
                                                   
                                                    <th>الاسم الكامل</th>
                                                    <th>اسم ونسبة الأم</th>
                                                    <th>مكان الولادة</th>
                                                    <th>تاريخ الولادة</th>
                                                    <th>الأوصاف</th>
                                                    <th>مكان الاقامة الحالي</th> 
                                                    <th>الجنس</th>
                                                    <th>الجنسية</th>
                                                    <?php  if($admin == 1 || $admin == 7  || $admin == 5){ ?>
                                                    <th style="display:none">ملخص الاضبارة</th>
                                                    <th >ملاحظات عامة</th>
                                                    <th >النتيجة</th>                                                   
                                                    <th style="display:none">مضمون الاضبارة</th>
                                                    <?php }?>
                                                    <th >صورة</th>
                                                   
                                                    <th >مرفقات</th>
                                                
                                                    <th>الدراسة الامنية</th>
                                                  <?php if ($admin == 1 || $admin == 7 || $admin==5){ ?>
                                                    <th >المُدخل</th>
                                                    <th >تاريخ آخر تعديل</th>
                                                  <?php } ?>
                                                  <?php if ($jeha_profile == 'الإدارة المركزية للمعلومات'){ ?>
                                                    <th style="text-align:center">معلومات اضبارة موقوف</th>    
                                                  <?PHP }?>                                            
                                                    <th style="text-align:center">معلومات الكتب</th>    
                                                    <?php if ($admin == 1 || $admin == 7 || $admin == 6 ){ ?>                                            
                                                    <th style="text-align:center">معلومات الفيش</th>
                                                    <?PHP }?> 
                                                </tr>
                                            </thead>
                                            <tbody>
                                              
                                <?php
                                while($row = mysqli_fetch_assoc($result)) {
                                  $id=$row['id'];
                                  $inserted_edbara_num=$row['edbara_num'];
                                  $e_id=$row['e_id'];
                                  $inserted_jeha=$row["jeha"];
                                  $e_details_type=$row["details_type"];
                                  $e_resala_type=$row["resala_type"];
                                  $foto = $row['foto1'];   
                                  if($foto==''){
                                    $foto = 0;
                                  }                                 
                                  $e_details_attach = $row['details_attach'];
                                  if($e_details_attach==''){
                                    $e_details_attach = 0;
                                  }
                                  $details_attach_extension = $row['details_attach_extension'];
                                  $inserted_year =  date('Y',strtotime($row['edbara_date'])); 
                                  $inserted_edbara_date = $row['edbara_date'];
                                  $added_by_old = $row['added_by'];

                                  

                                  if(($admin == 1 || $admin == 7 ) && $row["edbara_num"]==0){
                                    echo'<tr class="bg-danger">';
                                  }else{
                                    echo'<tr>';
                                  }  
                                  if (($admin == 1 || $admin == 7 || $admin==5) && $details_type !=='صادر'){
                                    if ($row['sader'] == 0){
                                      if($hasPerm_delete == '1'){
                                    echo'<td class="'.$td_class.'"><a href="delete.php?id='.$id.'&edbara_num='.$inserted_edbara_num.'&e_id='.$e_id.'&jeha='.$inserted_jeha.'&details_type='.$e_details_type.'&resala_type='.$e_resala_type.'&e_year='.$inserted_year.'&delete_details=true" onclick="'."return confirm('متأكد من الحذف؟ سيتم حذف جميع البيانات المتعلقة برقم الإضبارة في أقسام الكتب و الدراسات و الفيش');".'"><i style="font-size: 2.5rem" class="zwicon-delete"></i></a></td>';
                                      }
                                  }else{
                                    echo '<td class="'.$td_class.'"></td>';
                                  }
                                 
                                }/* else{
                                  echo '<td class="'.$td_class.'"></td>';
                                } */

                                  echo '<td class="'.$td_class.'"><a href="j_edit.php?id='.$id.'&#j_edit"><i style="font-size: 2.5rem" class="zwicon-edit-circle"></i></a></td>';
                                
                                  if ($jeha_profile=='الإدارة المركزية للمعلومات' && $details_type=='قيد المعالجة' && $admin != 6){
                                    echo
                                          '<td class="'.$td_class.'"><a href="processing_to_sader.php?id='.$id.'&edbara_num='.$inserted_edbara_num.'&edbara_date='.$inserted_edbara_date.'&e_id='.$e_id.'&jeha='.$inserted_jeha.'&details_type='.$e_details_type.'&resala_type='.$e_resala_type.'&e_year='.$inserted_year.'&added_by_old='.$added_by_old.'&type=archive" onclick="'."return confirm('متأكد من تصدير البيانات المحددة؟');".'"><i style="font-size: 2.5rem" class="zwicon-export"></i></a></td>';
                                  }else{
                                      if ($jeha1==$jeha_profile && $details_type=='قيد المعالجة' && $admin != 6) {
                                          echo
                                          '<td class="'.$td_class.'"><a href="processing_to_sader.php?id='.$id.'&edbara_num='.$inserted_edbara_num.'&edbara_date='.$inserted_edbara_date.'&e_id='.$e_id.'&jeha='.$inserted_jeha.'&details_type='.$e_details_type.'&resala_type='.$e_resala_type.'&e_year='.$inserted_year.'&added_by_old='.$added_by_old.'&type=archive" onclick="'."return confirm('متأكد من تصدير البيانات المحددة؟');".'"><i style="font-size: 2.5rem" class="zwicon-export"></i></a></td>';
                                      }
                                  
                                  if ($jeha1 !== $jeha_profile && $details_type=='قيد المعالجة' && ($admin == 1 || $admin == 7 )) {
                                    echo
                                    '<td class="'.$td_class.'"><a href="processing_to_processing.php?id='.$id.'&edbara_num='.$inserted_edbara_num.'&edbara_date='.$inserted_edbara_date.'&e_id='.$e_id.'&jeha='.$inserted_jeha.'&details_type='.$e_details_type.'&resala_type='.$e_resala_type.'&e_year='.$inserted_year.'&added_by_old='.$added_by_old.'&type=archive" onclick="'."return confirm('متأكد من تجميع الإضبارة المحددة؟');".'"><i style="font-size: 2.5rem" class="zwicon-persona"></i></a></td>';
                                  }
                                }
                                  if($details_type=='وارد' && $admin != 6){
                                    echo
                                    '<td class="'.$td_class.'"><a href="wared_to_processing2.php?id='.$id.'&edbara_num='.$inserted_edbara_num.'&edbara_date='.$inserted_edbara_date.'&e_id='.$e_id.'&jeha='.$inserted_jeha.'&details_type='.$e_details_type.'&resala_type='.$e_resala_type.'&e_year='.$inserted_year.'&added_by_old='.$added_by_old.'&type=archive" onclick="'."return confirm('متأكد من نسخ البيانات  المحددة إلى مرحلة المعالجة؟');".'"><i style="font-size: 2.5rem" class="zwicon-export"></i></a></td>';                                      
                                  }
                                    if($admin!=5 && $admin != 6){
                                      echo
                                      '<td class="'.$td_class.'"> <a target="_blank" href="print-elements.php?id='.$id.'&edbara_num='.$inserted_edbara_num.'&edbara_date='.$inserted_edbara_date.'&e_id='.$e_id.'&jeha='.$inserted_jeha.'&details_type='.$e_details_type.'&resala_type='.$e_resala_type.'&e_year='.$inserted_year.'&type=archive"><i style="font-size: 2.5rem" class="zwicon-printer"></i></a></td>';       
                                    }        
                                    /* if (($details_type=='وارد' || $details_type=='قيد المعالجة') && ($admin == 1 || $admin == 7)){
                                      echo '<td class="'.$td_class.'">'.$row["jeha"].'</td>';
                                    }  */                    
                                  
                                    
                                    if (strpos($jeha_profile, 'داخلي') !== false || strpos($jeha1, 'داخلي') !== false){
                                      echo '<td class="'.$td_class.'">' .$row["id_num"].'</td>';
                                    }
                                                                     
                                  echo '<td class="'.$td_class.'">' .$row["edbara_num"].'</td>'.
                                  '<td class="'.$td_class.'">' .$row["edbara_date"].'</td>';                                
                                                  
                                  echo '</td><td class="'.$td_class.'">'.$row["name"].' '.$row["fname"].' '.$row["lname"].
                                  '</td><td class="'.$td_class.'">'.$row["mname"].
                                  '</td><td class="'.$td_class.'">'.$row["pbirth"].
                                  '</td><td class="'.$td_class.'">'.$row["dbirth"].
                                  '</td><td class="'.$td_class.'">'.$row["awsaf"].
                                  '</td><td class="'.$td_class.'">'.$row["address"].'</td>'.
                                  '</td><td class="'.$td_class.'">'.$row["sex"].'</td>'.
                                  '</td><td class="'.$td_class.'">'.$row["national"].'</td>';
                                  if($admin == 1 || $admin == 7  || $admin == 5){
                                    echo '<td style="display:none">'.$row["edbara_note"].'</td><td class="'.$td_class.'">'.$row["note"].
                                    '</td><td class="'.$td_class.'">'.$row["result"].'</td>'; 
                                    if (!empty($row['edbara_info']) || $row['edbara_info']!=='') {
                                        echo '<td style="display:none">'.@strip_tags($row['edbara_info']).'</td>';
                                    }else{
                                      echo '<td style="display:none">'.'</td>';
                                    }
                                  }
                               

                               
                              if(@strlen($foto)>300){//if (strpos($foto, '/file_enc/') == false){
                                  echo '<td>'.'<img width="65" height="80" src="data:image/jpeg;base64,'.base64_encode($foto).'"/></td>';
                              }elseif (strpos($foto, '/files_enc/') !== false) {
                                include "inc/file_upload/file_decrypt_foto.php";                                
                              }else{
                                echo '<td class="'.$td_class.'">'.'لا يوجد صورة'.'</td>';
                              }
                              if($hasPerm_download==1){
                                if (!empty($row['details_attach'])){ 
                                    $details_attach=$row['details_attach'];                                  
                                      echo '<td><a href="'.$url_host.'/inc/file_upload/file_decrypt.php?path='.$details_attach.'">تنزيل</a></td>';                                
                                }else {echo '<td class="'.$td_class.'"> لا يوجد مرفقات </td>';}
                              } 
                               
                                echo '<td class="">';
                                $sql_study="SELECT id, study_date FROM study WHERE edbara_num = $inserted_edbara_num AND edbara_date = '$inserted_edbara_date' AND  jeha = '$inserted_jeha' AND details_type='$details_type' ORDER BY study_date DESC";
                                $sql_study_result = mysqli_query($conn, $sql_study);
                                while ($row_study = mysqli_fetch_assoc($sql_study_result)) {

                                    echo '<a target="_blank" href="s_edit.php?id='.$row_study['id'].'">'.$row_study['study_date'].'</a><br>' ;
                                }
                                echo '</td>';
                                  
                                if ($admin == 1 || $admin == 7 || $admin==5){
                                  echo '<td class="'.$td_class.'">'.$row["added_by"].'</td>'.
                                  '<td class="noprint">'.$row["add_date"].'</td>';
                                }


                                  if ($jeha_profile == 'الإدارة المركزية للمعلومات'){
                                  //get details_sub table data ///////////////// details sub ////////////////////////////
                                  include "query/details_sub_query.php";
                                  

                                  $sql_details_sub_result = mysqli_query($conn, $sql_details_sub);
                                  ///////////////// details sub ////////////////////////////
                                  echo'<td><table   class="table table-striped table-bordered table-hover"><tr>'.'<th>إسم الجهة</th>';
                                  if($details_type !== 'قيد المعالجة'){
                                  echo '<th>رقم الديوان</th><th>تاريخ الديوان</th>';
                                  }
                                  echo '<th>رقم الإضبارة</th>'.'<th>تاريخ الإضبارة</th>'.'<th class="hide_this">مضمون الإضبارة</th>'.'<th style="display:none">ملخص الإضبارة</th>'.'<th>ملاحظات عامة</th>'.'<th>النتيجة</th>'.'<th>صورة اضبارة موقوف</th></tr>';
                                  while($row_details_sub = mysqli_fetch_assoc($sql_details_sub_result)){
                                  $sub_details_attach = $row_details_sub['details_attach']; 
                                  $sub_details_attach_extension = $row_details_sub['details_attach_extension']; 
                                  echo '<tr><td class="'.$td_class.'">'.$row_details_sub["jeha_name"].'</td>';
                                  if($details_type !== 'قيد المعالجة'){
                                  echo '<td class="'.$td_class.'">' .$row_details_sub["dewan_num"].
                                  '</td><td class="'.$td_class.'">'.$row_details_sub["dewan_date"].'</td>';
                                  }
                                  echo '<td class="'.$td_class.'">' .$row_details_sub["edbara_num"].                                  
                                  '</td><td class="'.$td_class.'">' .$row_details_sub["edbara_date"].
                                  '</td><td class="hide_this">' .strip_tags($row_details_sub["edbara_info"]).
                                  '</td><td style="display:none">' .$row_details_sub["edbara_note"].                                     
                                  '</td><td class="'.$td_class.'">' .$row_details_sub["note"].
                                  '</td><td class="'.$td_class.'">' .$row_details_sub["result"].'</td>';
                                  if(@strlen($sub_details_attach)>100){
                                    echo '<td class="'.$td_class.'">'.'<a href="data:application/'.$sub_details_attach_extension.';base64,'.base64_encode($sub_details_attach).'">تنزيل</a></td>';
                                  }else {echo '<td class="'.$td_class.'">'.'لا يوجد مرفقات'.'</td>';}
                                  echo '</tr>';
                                }
                                echo '</table></td>';

                              ///////////////////////////////////////////////////////
                                  }
                              
                                //get reports_info table data /////////////// reports ////////////////////
                                include "query/reports_info_query.php";
                                
                              
                                $sql_reports_result = mysqli_query($conn, $sql_reports_info);                                

                                /////////////// reports ////////////////////
                                //$row_reports_check = mysqli_fetch_assoc($sql_reports_result);                                                                
                                  echo'<td><table  id="" class="table table-striped table-bordered table-hover"><tr>';                              
                                  echo '<th>رقم الكتاب</th>'                               
                                  .'<th>تاريخ الكتاب</th>'
                                  .'<th>تاريخ استلام الكتاب</th>'
                                  .'<th>';
                                  if($details_type=='صادر' ){ echo 'تاريخ الإرسال';} else{ echo 'تاريخ الاستلام'; }
                                  echo '</th>'
                                  /* .'<th>عنوان الكتاب</th>' */
                                  .'<th>موضوع الكتاب</th>'
                                  .'<th>تاريخ ورودها المتتابع</th>'
                                  .'<th>متابعة مسار الكتاب</th>'
                                  .'<th>تاريخ متابعة مسار الكتاب</th>'
                                  .'<th>الجهة المرسلة</th><th>الجهة المرسل إليها</th>'                            
                                  .'<th style="display:none">ملخص التقرير</th>'
                                  .'<th style="display:none">ملخص الكتاب</th>'
                                  .'<th>درجة السرعة</th>'
                                  .'<th>درجة مصداقية المعلومات</th>'
                                  .'<th>درجة السرية</th>'
                                  .'<th>مصدر المعلومات</th>'
                                  .'<th style="display:none">ملاحظات</th>'
                                  .'<th>مرفقات الكتاب</th>'
                                  .'</tr>';
                                                  
                                  while($row_reports = mysqli_fetch_assoc($sql_reports_result)){
                                                                      
                                  $r_attach = $row_reports['r_attach']; 
                                  $r_attach_extension = $row_reports['r_attach_extension'];
                                  if($row_reports["r_important"]=='نعم'){ 
                                  echo '<tr style="background-color:#c1f9b3">';
                                  }else{
                                    echo '<tr>';
                                  }
                                  echo '<td class="'.$td_class.'">'.$row_reports["ketab_num"].'</td>'                                 
                                  .'<td class="'.$td_class.'">'.$row_reports["ketab_date"].'</td>'                                  
                                  .'<td class="'.$td_class.'">'.$row_reports["r_handle_date"].'</td>'
                                  .'<td class="'.$td_class.'">'.$row_reports["send_date"].'</td>'
                                  /* .'<td class="'.$td_class.'">'.$row_reports["r_address"].'</td>'  */
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

                                  /* if(@strlen($r_attach)>100){
                                    echo '<td class="'.$td_class.'">'.'<a href="data:application/'.$r_attach_extension.';base64,'.base64_encode($r_attach).'">تنزيل</a></td>';
                                  }else {echo '<td class="'.$td_class.'"> لا يوجد مرفقات </td>';}  */ 
                                if (!empty($row_reports['r_attach'])){ 
                                    $r_attach=$row_reports['r_attach'];                                  
                                      echo '<td class="'.$td_class.'"><a href="'.$url_host.'/inc/file_upload/file_decrypt.php?path='.$r_attach.'">تنزيل</a></td>';                                
                                }else {echo '<td class="'.$td_class.'"> لا يوجد مرفقات </td>';}                                    
                                  echo '</tr>';                                                    
                              }
                              echo '</table></td>';
                              ///////////////////////////////////////////////////////

                              if($admin == 1 || $admin == 7 || $admin == 6 ){
                              //get feech_info table data ///////////////// feech //////////////////
                              include "query/feech_info_query.php";
                            
                              $sql_feech_result = mysqli_query($conn, $sql_feech);
                              ///////////////// feech //////////////////
                              
                              echo '<td><table  id="" class="table table-striped table-bordered table-hover">';
                              
                              echo '<tr>'.'<th>نوع الفيش</th>';
                                     //if($row_feech1['feech_type']=='مكفوف عنهم البحث' || $row_feech1['feech_type']=='سوابق'){ 
                                     if ($jeha_profile == 'الإدارة المركزية للمعلومات' && $details_type!=='وارد'){
                                    echo '<th>الجهة الآمرة</th>';
                                    //}else{
                                      //echo '<th>الجهة الآمرة للتوقيف</th>';
                                    //}
                                    
                                    echo '<th>التهمة</th>'.
                                    '<th>رقم الكتاب</th>'.
                                    '<th>تاريخ الكتاب</th>'.
                                    
                                    '<th>رقم البلاغ</th><th>تاريخ البلاغ</th><th>نوع الإجراء</th><th class="hide_this">نص البلاغ</th><th style="border-left:3px solid black">صورة عن البلاغ</th>';
                                     }
                                    //if($row_feech1['feech_type']=='مكفوف عنهم البحث' || $row_feech1['feech_type']=='سوابق'){ 
                                      echo '<th>الجهة الطالبة</th>';
                                      /* }else{
                                        echo '<th>الجهة الطالبة للتوقيف</th>';
                                      }   */                                
                                    echo '<th>التهمة</th>'.
                                    '<th>رقم الكتاب</th>'.
                                  
                                    '<th>تاريخ الكتاب</th>'.
                                    '<th>رقم البلاغ</th><th>تاريخ البلاغ</th><th>نوع الإجراء</th><th class="hide_this">نص البلاغ</th><th>صورة عن البلاغ</th></tr>';
                              
                                    while($row_feech = mysqli_fetch_assoc($sql_feech_result)){
                                      $balagh_attach = $row_feech['balagh_attach']; 
                                      if($balagh_attach==''){
                                        $balagh_attach = 0;
                                      }
                                      $sho3ba_balagh_attach = $row_feech['sho3ba_balagh_attach'];
                                      if($sho3ba_balagh_attach==''){
                                        $sho3ba_balagh_attach = 0;
                                      } 

                                      $balagh_attach_extension = $row_feech['balagh_attach_extension']; 
                                      $sho3ba_balagh_attach_extension = $row_feech['sho3ba_balagh_attach_extension']; 
                                                                          
                                      echo '<tr>'.'<td class="'.$td_class.'">'.$row_feech["feech_type"].'</td>';
                                      if ($jeha_profile == 'الإدارة المركزية للمعلومات' && $details_type!=='وارد'){
                                      echo '<td class="'.$td_class.'">'.$row_feech["jeha_request_order"].'</td>'.
                                      '<td class="'.$td_class.'">'.$row_feech["jeha_tohma"].'</td>'.
                                      '<td class="'.$td_class.'">' .$row_feech["sho3ba_ketab_num"].'</td>'.
                                      '<td class="'.$td_class.'">'.$row_feech["sho3ba_ketab_date"].'</td>'.                                                                              
                                      '<td class="'.$td_class.'">'.$row_feech["sho3ba_balagh_num"].'</td>'.
                                      '<td class="'.$td_class.'">' .$row_feech["sho3ba_balagh_date"].'</td>'.
                                      '<td class="'.$td_class.'">'.$row_feech["sho3ba_balagh_type"].'</td>'.
                                      '<td class="hide_this">'.strip_tags($row_feech["sho3ba_balagh"]).'</td>';

                                      if(@strlen($sho3ba_balagh_attach)>300){
                                        echo '<td style="border-left:3px solid black">'.'<a href="data:application/'.$sho3ba_balagh_attach_extension.';base64,'.base64_encode($sho3ba_balagh_attach).'">تنزيل</a></td>';
                                      }else {
                                        if (!empty($sho3ba_balagh_attach)){                                                                       
                                            echo '<td style="border-left:3px solid black" ><a href="'.$url_host.'/inc/file_upload/file_decrypt.php?path='.$sho3ba_balagh_attach.'">تنزيل</a></td>';                                
                                        }else {echo '<td style="border-left:3px solid black">لا يوجد</td>';}
                                      } 
                                    }  
                                                                     
                                      echo
                                      '<td class="'.$td_class.'">'.$row_feech["requested"].'</td>'.
                                      '<td class="'.$td_class.'">'.$row_feech["jorm"].'</td>'. 
                                      '<td class="'.$td_class.'">'.$row_feech["ketab_num"].'</td>'.
                                     
                                      '<td class="'.$td_class.'">'.$row_feech["ketab_date"].'</td>'.
                                      '<td class="'.$td_class.'">'.$row_feech["num_balagh"].'</td>'.
                                      '<td class="'.$td_class.'">'.$row_feech["d_balagh"].'</td>'.
                                      '<td class="'.$td_class.'">'.$row_feech["balagh_type"].'</td>'.
                                      '<td class="hide_this">'.strip_tags($row_feech["balagh"]).'</td>';
                                      if(@strlen($balagh_attach)>300){
                                        echo '<td class="'.$td_class.'">'.'<a href="data:application/'.$balagh_attach_extension.';base64,'.base64_encode($balagh_attach).'">تنزيل</a></td>';
                                      }else {
                                        if (!empty($balagh_attach)){                                                                        
                                            echo '<td class="'.$td_class.'"><a href="'.$url_host.'/inc/file_upload/file_decrypt.php?path='.$balagh_attach.'">تنزيل</a></td>';                                
                                        }else {echo '<td class="'.$td_class.'">لا يوجد</td>';}                                        
                                      } 
                                      
                                      echo '</tr>';                       
                        
                                }
                                echo '</table></td>';
                              }
                              ///////////////////////////////////////////////////////
                                  echo '</tr>';
                                  //$count++;
                              
                            }
                          ?>


