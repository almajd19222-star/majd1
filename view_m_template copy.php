
                                     <?php $td_class = "show-read-more"; ?>   
                                        <table  id="" class="example display cell-border compact row-border hover order-column stripe text-center" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>تفاصيل</th>                                                    
                                                    <th>طباعة</th>  
                                                    <th>الجهة العامل معها</th>   
                                                    <th>تبعية المصدر</th>                                              
                                                    <th>الإسم المستعار</th>
                                                    <?php if($jeha_profile=='الإدارة المركزية للمعلومات') { ?>
                                                    <th >الرمز السري</th>
                                                    <th >رقم المصدر</th>
                                                    <?php } else{ ?>
                                                    <th>رقم المصدر</th>   
                                                    <?php } ?>                                                
                                                    <th>الاسم الكامل</th>
                                                    <th>اسم ونسبة الأم</th>
                                                    <th>مكان الولادة</th>
                                                    <th>تاريخ الولادة</th>                                                   
                                                    <th>عنوان السكن الحالي</th>
                                                    <?php if (strpos($jeha_profile, 'داخلي') !== false || strpos($jeha_profile, 'هيئة الرقابة والتفتيش') !== false || $jeha_profile == 'الإدارة المركزية للمعلومات'){ ?>
                                                    <th>اللفب</th>
                                                    <th>الرقم الذاتي</th>
                                                    <th>العمل حاليا ضمن الجماعة</th>
                                                    <th>اسم المسؤول المباشر</th>
                                                    <th>تاريخ الانضمام للجماعة</th>
                                                    <th>االأماكن التي عمل فيها بالتفصيل</th>
                                                    <?php }?>
                                                    <th>الوضع الاجتماعي</th>
                                                    <th>الوضع الأخلاقي في المجتمع</th>
                                                    <th>المهنة</th>
                                                    <th>مكان العمل الحالي</th>                                                    
                                                    <th>المستوى التعليمي</th>
                                                    <th>التوجه الفكري و إلتزامه الديني</th> 
                                                    <th>الخدمة الالزامية</th> 
                                                    <th>الاختصاص</th>                                          
                                                   <th >التنظيمات التي إنضم إليها؟ وكم المدة؟</th>
                                                    <th>الدول التي سافر إليها وما هي الأسباب وكم المدة؟</th>
                                                    <th>هل سجن سابقا؟ أين؟ الأسباب؟ كم المدة</th>
                                                    <th >هل له اقارب يعملون مع: (النظام-الخوارج-الفصائل-مناظق قسدوالشمال- غيرذلك)</th>
                                                    <th >هل عمل كمصدر معلومات أمنية لأحد الجهات سابقا؟</th>
                                                    <th>رقم الهاتف أو وسيلة تواصل</th>
                                                    <th>المزكي للمصدر</th>
                                                    <th>عمل المزكي</th>
                                                    <th>وسيلة التواصل مع المزكي</th>
                                                    <th>تاريخ ابتداء العمل كمصدر</th>
                                                    <th>تاريخ انتهاء العمل كمصدر (كلياً)</th>
                                                    <th>سبب انتهاء العمل كمصدر (كلياً)</th>
                                                    <th></th>    

                                                    <th>التطورات الطارئة على وضعه</th>
                                                    <th style="display:none">موجز عن حياته</th>
                                                    <th>الدوافع التي جعلته يعمل مع الإدارة الأمنية</th>
                                                    <th>المهام المكلف بها المصدر</th>
                                                    <th>المناطق والجهات التي يغطيها المصدر</th>
                                                   
                                                    <th>نوعية المصدر</th>
                                                    <th>نقاط الضعف الموجودة لدى المصدر</th>
                                                    <th>من ناحية الثقة</th>
                                                    <th>من ناحية الازدواجية</th>
                                                    <th>ملاحظات عامة</th>
                                                    <th>معلومات اضافية</th>
                                                    <th>صورة عن استمارة المصدر / مرفقات</th>
                                                  <?php if ($admin == 1 || $admin == 7 ){ ?>
                                                    <th>المُدخل</th>
                                                    <th>تاريخ آخر تعديل</th>
                                                  <?php } ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <!-- <script> alert($('#data-table_paginate span > a.paginate_button.current').text())</script> -->
                                <?php
                                while($row = mysqli_fetch_assoc($result)) {
                                  
                                    @$m_jeha = $row['jeha'];
                                    @$m_attach = $row['m_attach'];
                                    @$m_attach_extension = $row['m_attach_extension'];
                                    $id=$row['m_id'];
                                    $sql_masader_info = "SELECT * FROM `masader_info` WHERE m_id='$id' AND jeha='$m_jeha' AND  work_again_date!= '0000-00-00' ORDER BY work_again_date DESC";
                                    /* if ($admin == 1 || $admin == 7){ $sql_masader_info2= $sql_row_jehat; } 
                                    else{$sql_masader_info2="";}
                                    $sql_masader_info3= ") ORDER BY work_again_date DESC";
                                    $sql_masader_info= $sql_masader_info1.$sql_masader_info2.$sql_masader_info3; */
                                    $result2 = mysqli_query($conn, $sql_masader_info);

                                    echo'<tr><td class=""> <a href="m_edit.php?id='.$row["id"].'&jeha='.$row["jeha"].'&"><i style="font-size: 2.5rem" class="zwicon-edit-circle"></i></a></td>'.'<td class="'.$td_class.'"> <a target="_blank" href="print-elements.php?&jeha='.$row["jeha"].'&id='.$row["id"].'&type=masader_all"><i style="font-size: 2.5rem" class="zwicon-printer"></i></a></td>'                              ;                                    
                                    echo '<td class="'.$td_class.'">'.$row["jeha_name"].'</td>'.
                                    '<td class="'.$td_class.'">'.$row["masdar_belong"].'</td>'.                              
                                    '<td class="'.$td_class.'">'.$row["fake_name"].'</td>';
                                    if($jeha_profile =='الإدارة المركزية للمعلومات'){
                                    echo '<td class="'.$td_class.'">'.$row["sn"].'</td>'.
                                    '<td class="'.$td_class.'">'.$row["masdar_num"].'</td>';
                                    }else{
                                    echo '<td class="'.$td_class.'">'.$row["masdar_num"].'</td>';
                                    }
                                                                  
                                    echo '<td class="'.$td_class.'">'.$row["name"].' '.$row["fname"].' '.$row["lname"].
                                    '</td><td class="'.$td_class.'">'.$row["mname"].
                                    '</td><td class="'.$td_class.'">'.$row["pbirth"].
                                    '</td><td class="'.$td_class.'">'.$row["dbirth"].                                  
                                    '</td><td class="'.$td_class.'">'.$row["address"].'</td>';
                                    if (strpos($jeha_profile, 'داخلي') !== false || strpos($jeha_profile, 'هيئة الرقابة والتفتيش') !== false || $jeha_profile == 'الإدارة المركزية للمعلومات'){
                                      echo
                                    '<td class="'.$td_class.'">'.$row["nick_name"].
                                    '</td><td class="'.$td_class.'">'.$row["id_num"].
                                    '</td><td class="'.$td_class.'">'.$row["current_j_work"].
                                    '</td><td class="'.$td_class.'">'.$row["his_admin"].
                                    '</td><td class="'.$td_class.'">'.$row["first_work_date"].
                                    '</td><td class="'.$td_class.'">'.$row["work_details"].'</td>';
                                    }
                                    echo
                                    '<td class="'.$td_class.'">'.$row["family_status"].
                                    '</td><td class="'.$td_class.'">'.$row["dealing"].
                                    '</td><td class="'.$td_class.'">'.$row["work"].
                                    '</td><td class="'.$td_class.'">'.$row["work_place"].
                                    '</td><td class="'.$td_class.'">'.$row["learning_level"].
                                    '</td><td class="'.$td_class.'">'.$row["mind"].
                                    '</td><td class="'.$td_class.'">'.$row["service"].
                                    '</td><td class="'.$td_class.'">'.$row["special"].
                                    '</td><td class="'.$td_class.'">'.$row["fasael"].
                                    '</td><td class="'.$td_class.'">'.$row["travels"].
                                    '</td><td class="'.$td_class.'">'.$row["sawabek"].
                                    '</td><td class="'.$td_class.'">'.$row["n_relatives"].
                                    '</td><td class="'.$td_class.'">'.$row["work_for"].
                                    '</td><td class="'.$td_class.'">'.$row["phone"].
                                    '</td><td class="'.$td_class.'">'.$row["mozakky"].
                                    '</td><td class="'.$td_class.'">'.$row["mozakky_work"].
                                    '</td><td class="'.$td_class.'">'.$row["mozakky_phone"].
                                    '</td><td class="'.$td_class.'">'.$row["work_start"].
                                    '</td><td class="'.$td_class.'">'.$row["work_end_final"].
                                    '</td><td class="'.$td_class.'">'.$row["work_end_final_reason"].'</td>';
                                    ;
                                    echo'<td ><table><tr>'.'<th>تاريخ إعادة تشغيله</th>'.'<th>سبب إعادة تشغيله</th>';
                                    while($row2 = mysqli_fetch_assoc($result2)){
                                     echo '<tr><td class="'.$td_class.'">'.$row2["work_again_date"].
                                    '</td><td class="'.$td_class.'">'.$row2["work_again_reason"].'</td>';                                  
                                }
                                echo '</tr></table></td>';
                                echo '<td class="'.$td_class.'">'.$row["situation"].
                                    '</td><td style="display:none">'.$row["brief"].
                                    '</td><td class="'.$td_class.'">'.$row["work_reason"].
                                    '</td><td class="'.$td_class.'">'.$row["tasks"].
                                    '</td><td class="'.$td_class.'">'.$row["work_area"].                                   
                                    '</td><td class="'.$td_class.'">'.$row["free"].
                                    '</td><td class="'.$td_class.'">'.$row["weak"].
                                    '</td><td class="'.$td_class.'">'.$row["theqa"].
                                    '</td><td class="'.$td_class.'">'.$row["ezdwajeia"].
                                    '</td><td class="'.$td_class.'">'.$row["notes"].
                                    '</td><td class="'.$td_class.'">'.$row["other_details"].'</td>';

                                  
                                                 @$m_attach = $row['m_attach'];
                                                 @$m_attach_extension = $row['m_attach_extension'];
                                                 if(@strlen($m_attach)>300){
                                                 echo '<td><a href="data:application/'.$m_attach_extension.';base64,'.base64_encode($m_attach).'">تنزيل</a></td>';
                                                 }else {
                                                  if (!empty($m_attach)){                                                                                
                                                      echo '<td><a href="'.$url_host.'/inc/file_upload/file_decrypt.php?path='.$m_attach.'">تنزيل</a></td>';                                
                                                }else {echo '<td class="'.$td_class.'">لا يوجد مرفقات</td>';} 
                                                 }
                                                
                                    
                                                 if ($admin == 1 || $admin == 7 || $admin==5){
                                                  echo '<td class="'.$td_class.'">'.$row["added_by"].'</td>'.
                                                  '<td class="noprint">'.$row["add_date"].'</td>';
                                                }
                                    echo '</tr>';
                                    //$count++;
                                }
                          ?>
