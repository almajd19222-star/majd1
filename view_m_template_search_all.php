
                                        
                                        <table  id="" class="example table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>تفاصيل</th>                                                    
                                                    <th>طباعة</th>  
                                                    <th>الجهة العامل معها</th>                                                 
                                                    <th>الإسم المستعار</th>
                                                    <?if($jeha_profile =='الإدارة المركزية للمعلومات'){?>
                                                    <th >الرمز السري</th>
                                                    <th >رقم المصدر</th>
                                                    <?php }else{?>
                                                    <th >رقم المصدر</th>   
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
                                                    <th>موجز عن حياته</th>
                                                    <th>الدوافع التي جعلته يعمل مع الإدارة الأمنية</th>
                                                    <th>المهام المكلف بها المصدر</th>
                                                    <th>المناطق والجهات التي يغطيها المصدر</th>
                                                    <th>أسلوب التعاون</th>
                                                    <th>القيمة المالية</th>
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
                                <?php

                                while($row = mysqli_fetch_assoc($result)) {
                                  
                                    
                                    @$m_attach = $row['m_attach'];
                                    @$m_attach_extension = $row['m_attach_extension'];
                                    $id=$row['m_id'];
                                    $sql_search2 = "SELECT * FROM `masader_info` WHERE  m_id='$id' ORDER BY work_again_date DESC";
                                    $result2 = mysqli_query($conn, $sql_search2);

                                    echo'<tr><td class=""> <a href="m_edit.php?id='.$row["m_id"].'&jeha='.$row["jeha"].'"><i style="font-size: 2.5rem" class="zwicon-edit-circle"></i></a></td>'.'<td> <a target="_blank" href="print-elements.php?&jeha='.$row["jeha"].'&id='.$row["id"].'&type=masader_all"><i style="font-size: 2.5rem" class="zwicon-printer"></i></a></td>'                              ;                                    
                                    echo '<td>'.$row["jeha_name"].'</td>'.
                                    '<td>'.$row["masdar_belong"].'</td>'.                              
                                    '<td>'.$row["fake_name"].'</td>';
                                    if($jeha_profile =='الإدارة المركزية للمعلومات'){
                                    echo '<td>'.$row["sn"].'</td>'.
                                    '<td>'.$row["masdar_num"].'</td>';
                                    }else{
                                    echo '<td>'.$row["masdar_num"].'</td>';
                                    }
                                                                  
                                    echo '<td>'.$row["name"].' '.$row["fname"].' '.$row["lname"].
                                    '</td><td>'.$row["mname"].
                                    '</td><td>'.$row["pbirth"].
                                    '</td><td>'.$row["dbirth"].                                  
                                    '</td><td >'.$row["address"].'</td>';
                                    if (strpos($jeha_profile, 'داخلي') !== false || strpos($jeha_profile, 'هيئة الرقابة والتفتيش') !== false || $jeha_profile == 'الإدارة المركزية للمعلومات'){
                                      echo
                                    '<td >'.$row["nick_name"].
                                    '</td><td >'.$row["id_num"].
                                    '</td><td >'.$row["current_j_work"].
                                    '</td><td >'.$row["his_admin"].
                                    '</td><td >'.$row["first_work_date"].
                                    '</td><td >'.$row["work_details"].'</td>';
                                    }
                                    echo
                                    '<td >'.$row["family_status"].
                                    '</td><td >'.$row["dealing"].
                                    '</td><td >'.$row["work"].
                                    '</td><td >'.$row["work_place"].
                                    '</td><td >'.$row["learning_level"].
                                    '</td><td >'.$row["mind"].
                                    '</td><td >'.$row["service"].
                                    '</td><td >'.$row["special"].
                                    '</td><td >'.$row["fasael"].
                                    '</td><td >'.$row["travels"].
                                    '</td><td >'.$row["sawabek"].
                                    '</td><td >'.$row["n_relatives"].
                                    '</td><td >'.$row["work_for"].
                                    '</td><td >'.$row["phone"].
                                    '</td><td >'.$row["mozakky"].
                                    '</td><td >'.$row["mozakky_work"].
                                    '</td><td >'.$row["mozakky_phone"].
                                    '</td><td >'.$row["work_start"].
                                    '</td><td >'.$row["work_end_final"].
                                    '</td><td >'.$row["work_end_final_reason"].'</td>';
                                    echo'<td><table><tr>'.'<th>تاريخ إعادة تشغيله</th>'.'<th>سبب إعادة تشغيله</th>';
                                    while($row2 = mysqli_fetch_assoc($result2)){
                                     echo '<tr><td>'.$row2["work_again_date"].
                                    '</td><td>'.$row2["work_again_reason"].'</td>';                                  
                                }
                                echo '</tr></table></td>';
                                echo '<td >'.$row["situation"].
                                    '</td><td >'.$row["brief"].
                                    '</td><td >'.$row["work_reason"].
                                    '</td><td >'.$row["tasks"].
                                    '</td><td >'.$row["work_area"].
                                    '</td><td >'.$row["salary"].
                                    '</td><td >'.$row["salary_amount"]." ".$row["currency"].
                                    '</td><td >'.$row["free"].
                                    '</td><td >'.$row["weak"].
                                    '</td><td >'.$row["theqa"].
                                    '</td><td >'.$row["ezdwajeia"].
                                    '</td><td >'.$row["notes"].
                                    '</td><td >'.$row["other_details"].'</td>';

                                    if(@strlen($m_attach)>100){
                                      echo '<td >'.'<a href="data:application/'.$m_attach_extension.';base64,'.base64_encode($m_attach).'">تنزيل</a></td>';
                                    }else {echo '<td >'.'لا يوجد مرفقات'.'</td>';}
                                    
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
