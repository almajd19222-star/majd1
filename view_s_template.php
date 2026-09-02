
                                       
            <?php $td_class = "show-read-more"; ?>
                                       <table  id="" class="example display cell-border compact row-border hover order-column stripe text-center" style="width:100%">
                                            <thead>
                                                <tr>
                                                <?php  if ($admin == 1 || $admin == 7 || $admin==5){
                                                  if ($details_type !=='صادر'){ ?>
                                                    <th>حذف</th>
                                                  <?php }} ?>
                                                  <?php if($details_type=='وارد' || $details_type=='صادر'){ ?>
                                                    <th>نسخ لقيد المعالجة</th>  
                                                 <?php }?>
                                                    <th>تفاصيل</th>       
                                                    <?php if($admin != 6){ ?>                                             
                                                    <th>طباعة الدراسة</th> 
                                                    <?php }?>
                                                    
                                                    <?php if ($details_type=='وارد' && ($admin == 1 || $admin == 7)){
                                                      echo '<th>تبعية المعلومات</th>';
                                                     }?>
                                                   <!--  <th>جهات المجتمع</th> -->
                                                    <th>الجهة المرسلة</th>
                                                    <th>الجهة المرسل إليها</th>
                                                    <?php if (strpos($jeha_profile, 'داخلي') !== false || strpos($jeha1, 'داخلي') !== false){ ?>
                                                        <th>الرقم الذاتي</th>
                                                        <?php }?>
                                                    <th>رقم الإضبارة <?php if ($jeha_profile == 'الإدارة المركزية للمعلومات' && $details_type=='صادر'){ ?> العام <?php }?></th>
                                                   
                                                    <th>تاريخ الإضبارة <?php if ($jeha_profile == 'الإدارة المركزية للمعلومات' && $details_type=='صادر'){ ?> العام <?php }?></th>      
                                                   
                                                    <?php if($details_type !== 'قيد المعالجة'){ ?>
                                                    <th>رقم الديوان</th>  
                                                    <th>تاريخ الديوان</th> 
                                                    <?php }?>
                                                    <th>رقم الكتاب</th>  
                                                    <th>تاريخ الكتاب</th> 
                                                    <th>الرمز العام</th>      
                                                    <th>الجهة الطالبة الدراسة</th>
                                                    <th>سبب إجراء الدراسة</th>
                                                    <th >تاريخ إجراء الدراسة</th> 
                                                    <th>منظم الدراسة</th>   
                                                    <th>مصدر الدراسة</th> 
                                                    <th>الرأي والمقترح</th>  
                                                    <th>نتيجة الدراسة</th>  
                                                    <th>السبب</th>                                                 
                                                    <th>الاسم الكامل</th>
                                                    <th>اسم ونسبة الأم</th>
                                                    <th>مكان الولادة</th>
                                                    <th>تاريخ الولادة</th>
                                                    <th>الجنس</th>
                                                    <th>الجنسية</th>
                                                    <th>الاسم الحركي أو اللقب</th>
                                                    <th>الأوصاف</th>
                                                    <th>الوضع العائلي</th>
                                                    <th>عدد الأولاد</th>
                                                                                                     
                                                    <th>العمل قبل الثورة</th>
                                                    <th>العمل الحالي</th> 
                                                    <th>المؤهل العلمي</th> 
                                                    <th>الوضع المادي</th>                                          
                                                   <th >الناحية الأخلاقية في المجتمع</th>
                                                    <th>الخدمة الالزامية</th>
                                                    <th>الاختصاص</th>
                                                    <th >السكن السابق</th>
                                                    <th >السكن الحالي</th>
                                                    <th>ملك-اجار</th>
                                                    <th>الفصائل التي انضم إليها</th>
                                                    <th>موقفه من الثورة</th>
                                                    <th>الدول التي سافر إليها</th>
                                                    <th>أقاربه مع النظام</th>
                                                    <th>أقاربه مع تنظيم الدولة</th>
                                                    <th>أقاربه مع الفصائل</th>
                                                    <th>أقاربه تم سجنهم لدى إدارة الأمن العام</th>
                                                    <th>الالتزام الديني</th>
                                                    <th>التوجه الفكري</th>
                                                    <th>الأهلية القيادية</th>
                                                    <th>قوة الشخصية</th>
                                                    <th>مدى التأثر بالآخرين</th>
                                                    <th>مدى التأثير بالمجتمع</th>
                                                    <th>طبيعة العلاقة مع الآخرين</th>
                                                    <th>القدرة على المحاورة</th>
                                                    <th>أهم الصفات الشخصية</th>
                                                    <th>هل سجن سايقا؟</th>
                                                    <th>رقم التواصل</th>
                                                    <th style="display:none">تفاصيل اخرى</th>
                                                    <th style="display:none">موجز عن حياته</th>
                                                    <th>صورة</th>
                                                   <!--  <th>مرفقات</th> -->
                                                  <?php if ($admin == 1 || $admin == 7 || $admin ==5){ ?>
                                                    <th>المُدخل</th>
                                                    <th>تاريخ آخر تعديل</th>
                                                  <?php } ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                <?php
                                while($row = mysqli_fetch_assoc($result)) {
                                    @$foto = $row['foto1'];
                                    if($foto==''){
                                      $foto = 0;
                                    }
                                    @$study_attach = $row['attach'];
                                    if($study_attach==''){
                                      $study_attach = 0;
                                    }
                                    @$study_attach_extension = $row['attach_extension'];
                                    $insert_year = $row['e_year'];
                                    $details_type = $row['details_type'];
                                    echo'<tr';
                                    if($admin == 1 || $admin == 7 || $admin ==2){ 
                                      if($row["edbara_num"] == 0 || $row["ketab_num"] == 0){
                                        if($row['ketab_type'] == 'personal'){
                                          echo' class="bg-danger"';
                                        }
                                      }
                                    }else{
                                      if($row["ketab_num"] == 0){
                                        echo' class="bg-danger"';
                                    }
                                    }
                                    
                                 echo '>';

                                 if ($admin == 1 || $admin == 7 || $admin==5){
                                  if ($details_type !=='صادر'){
                                  if($hasPerm_delete == '1'){
                                  echo'<td class="'.$td_class.'"><a href="delete.php?id='.$row["id"].'&jeha='.$jeha1.'&details_type='.$details_type.'&delete_study=true" onclick="'."return confirm('متأكد من الحذف؟ سيتم حذف بيانات الدراسة');".'"><i style="font-size: 2.5rem" class="zwicon-delete"></i></a></td>';
                                    }
                                }
                              }

                              if($details_type=='وارد' || $details_type=='صادر'){
                                echo
                                '<td class="'.$td_class.'"><a href="study_cp_to_processing.php?id='.$row["id"].'" onclick="'."return confirm('متأكد من نسخ البيانات المحددة لقيد المعالجة؟');".'"><i style="font-size: 2.5rem" class="zwicon-copy"></i></a></td>';
                              }

                                  echo '<td class="'.$td_class.'"> <a href="s_edit.php?id='.$row["id"].'"><i style="font-size: 2.5rem" class="zwicon-edit-circle"></i></a></td>';
                                  if($admin != 6){
                                  echo '<td class="'.$td_class.'"> <a target="_blank" href="print-elements.php?id='.$row["id"].'&jeha='.$row["jeha"].'&details_type='.$details_type.'&e_year='.$insert_year.'&type=study"><i style="font-size: 2.5rem" class="zwicon-printer"></i></a></td>';                                    
                                  }
                                    /* echo '<td class="'.$td_class.'">'; if( strpos( $row["study_jeha"], "خطباء مساجد" ) !== false) {
                                      echo "خطباء مساجد";
                                  }
                                  echo '</td>'; */
                                  
                                  if ($details_type=='وارد' && ($admin == 1 || $admin == 7)){
                                    echo '<td class="'.$td_class.'">'.$row["jeha"].'</td>';
                                  }
                                  echo /* '<td class="'.$td_class.'">'.$row["study_jeha"].'</td>'. */
                                    '<td class="'.$td_class.'">'.$row["sendfrom"].'</td>'.
                                    '<td class="'.$td_class.'">'.$row["sendto"].'</td>';
                                    if (strpos($jeha_profile, 'داخلي') !== false || strpos($jeha1, 'داخلي') !== false){
                                      echo '<td >' .$row["id_num"].'</td>';
                                    }
                                      if($row['ketab_type'] == 'personal'){                                      
                                    echo '<td class="'.$td_class.'">'.$row["edbara_num"].'</td>'.
                                    '<td class="'.$td_class.'">'.$row["edbara_date"].'</td>';   
                                      }else{
                                        echo '<td class="'.$td_class.'"></td><td class="'.$td_class.'"></td>';
                                      }                                  
                                      if($details_type !== 'قيد المعالجة'){
                                      echo '<td class="'.$td_class.'">'.$row["dewan_num"].'</td>'.
                                    '<td >'.$row["dewan_date"].'</td>';
                                      }
                                        echo '<td class="'.$td_class.'">'.$row["ketab_num"].'</td>'.
                                    '<td >'.$row["ketab_date"].'</td>';
                                      
                                    echo                 
                                    '<td class="'.$td_class.'">'.$row["general_code"].
                                    '<td class="'.$td_class.'">'.$row["study_request_jeha"].
                                    '</td><td class="'.$td_class.'">'.$row["study_reason"]. 
                                    '</td><td class="'.$td_class.'">'.$row["study_date"].  
                                    '</td><td class="'.$td_class.'">'.$row["study_organizer"].
                                    '</td><td class="'.$td_class.'">'.$row["study_masdar"].
                                    '</td><td class="'.$td_class.'">'.$row["study_opinion"].
                                    '</td><td class="'.$td_class.'">'.$row["study_result"].
                                    '</td><td class="'.$td_class.'">'.$row["negative_reason"].                            
                                    '</td><td class="'.$td_class.'">'.$row["name"].' '.$row["fname"].' '.$row["lname"].
                                    '</td><td class="'.$td_class.'">'.$row["mname"].
                                    '</td><td class="'.$td_class.'">'.$row["pbirth"].
                                    '</td><td class="'.$td_class.'">'.$row["dbirth"].                                    
                                    '</td><td class="'.$td_class.'">'.$row["sex"].
                                    '</td><td class="'.$td_class.'">'.$row["national"].
                                    '</td><td class="'.$td_class.'">'.$row["nick_name"].
                                    '</td><td class="'.$td_class.'">'.$row["awsaf"].
                                    '</td><td class="'.$td_class.'">'.$row["family_status"].
                                    '</td><td class="'.$td_class.'">'.$row["child_num"].                                   
                                    '</td><td class="'.$td_class.'">'.$row["work_before"].
                                    '</td><td class="'.$td_class.'">'.$row["work_after"].
                                    '</td><td class="'.$td_class.'">'.$row["study"].
                                    '</td><td class="'.$td_class.'">'.$row["money_status"].
                                    '</td><td class="'.$td_class.'">'.$row["dealing"].
                                    '</td><td class="'.$td_class.'">'.$row["service"].
                                    '</td><td class="'.$td_class.'">'.$row["special"].
                                    '</td><td class="'.$td_class.'">'.$row["pre_address"].
                                    '</td><td class="'.$td_class.'">'.$row["address"].
                                    '</td><td class="'.$td_class.'">'.$row["address_type"].
                                    '</td><td class="'.$td_class.'">'.$row["fasael"].
                                    '</td><td class="'.$td_class.'">'.$row["opinion"].
                                    '</td><td class="'.$td_class.'">'.$row["travels"].
                                    '</td><td class="'.$td_class.'">'.$row["n_relatives"].
                                    '</td><td class="'.$td_class.'">'.$row["d_relatives"].
                                    '</td><td class="'.$td_class.'">'.$row["f_relatives"].
                                    '</td><td class="'.$td_class.'">'.$row["s_relatives"].
                                    '</td><td class="'.$td_class.'">'.$row["religon_status"].
                                    '</td><td class="'.$td_class.'">'.$row["mind"].
                                    '</td><td class="'.$td_class.'">'.$row["lead"].
                                    '</td><td class="'.$td_class.'">'.$row["personal"].
                                    '</td><td class="'.$td_class.'">'.$row["affected_others"].
                                    '</td><td class="'.$td_class.'">'.$row["affected_to"].
                                    '</td><td class="'.$td_class.'">'.$row["relation_others"].
                                    '</td><td class="'.$td_class.'">'.$row["speak"].
                                    '</td><td class="'.$td_class.'">'.$row["important_awsaf"].
                                    '</td><td class="'.$td_class.'">'.$row["sawabek"].
                                    '</td><td class="'.$td_class.'">'.$row["phone"].
                                    '</td><td style="display:none">'.$row["details"].
                                    '</td><td style="display:none">'.$row["brief"].'</td>';                        
                                    
                                    if(@strlen($foto)>300){//if (strpos($foto, '/file_enc/') == false){
                                      echo '<td>'.'<img width="65" height="80" src="data:image/jpeg;base64,'.base64_encode($foto).'"/></td>';
                                  }elseif (strpos($foto, '/files_enc/') !== false) {
                                    include "inc/file_upload/file_decrypt_foto.php";                                
                                  }else{
                                    echo '<td class="'.$td_class.'">'.'لا يوجد صورة'.'</td>';
                                  }

                                  /* if (!empty($row['attach'])){ 
                                    $study_attach=$row['attach'];                                  
                                      echo '<td><a href="'.$url_host.'/inc/file_upload/file_decrypt.php?path='.$study_attach.'">تنزيل</a></td>';                                
                                }else {echo '<td> لا يوجد مرفقات </td>';}  */

                                  if ($admin == 1 || $admin == 7 || $admin==5){
                                    echo '<td class="'.$td_class.'">'.$row["added_by"].'</td>'.
                                    '<td class="noprint">'.$row["add_date"].'</td>';
                                  }
                                    echo '</tr>';
                                    //$count++;
                                }
                          ?>
