                                        <table  id="" class="example display cell-border compact row-border hover order-column stripe text-center" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>تفاصيل</th>     
                                                    <?php if($admin!=5){?>                                             
                                                    <th>طباعة الإضبارة</th>   
                                                    <?php }?>
                                                    <th>الجهة</th>    
                                                    <th>نوع البيانات</th>   
                                                    <?php if (strpos($jeha_profile, 'داخلي') !== false || strpos($jeha_profile, 'هيئة الرقابة والتفتيش') !== false || $jeha_profile == 'الإدارة المركزية للمعلومات'){ ?>
                                                        <th>الرقم الذاتي</th>
                                                        <?php }?>                                         
                                                    <th>رقم الإضبارة <?php if ($jeha_profile == 'الإدارة المركزية للمعلومات' && $details_type=='صادر'){ ?> العام <?php }?></th>
                                                    <th>تاريخ الإضبارة <?php if ($jeha_profile == 'الإدارة المركزية للمعلومات' && $details_type=='صادر'){ ?> العام <?php }?></th>                                                  
                                                    <!-- <th>رقم الديوان <?php //if ($jeha_profile == 'الإدارة المركزية للمعلومات'){ ?> العام <?php //}?></th>
                                                    <th>تاريخ الديوان <?php //if ($jeha_profile == 'الإدارة المركزية للمعلومات'){ ?> العام <?php //}?></th> -->
                                                    <th>الاسم الكامل</th>
                                                    <th>اسم ونسبة الأم</th>
                                                    <th>مكان الولادة</th>
                                                    <th>تاريخ الولادة</th>
                                                    <th>مكان الاقامة الحالي</th> 
                                                    <th>الجنس</th>
                                                    <th>الجنسية</th>
                                                    <th style="display:none">ملخص الاضبارة</th>
                                                    <th >ملاحظات عامة</th>
                                                    <th >النتيجة</th>                                                   
                                                    <th style="display:none">مضمون الاضبارة</th>
                                                    <th >صورة</th>
                                                    <th >مرفقات</th>
                                                    <th>الدراسة الامنية</th>
                                                  <?php if ($admin == 1 || $admin == 7 ){ ?>
                                                    <th >المُدخل</th>
                                                    <th >تاريخ آخر تعديل</th>
                                                  <?php } ?>
                                                  <?php if ($jeha_profile == 'الإدارة المركزية للمعلومات'){ ?>
                                                    <th style="text-align:center">معلومات اضبارة موقوف</th>    
                                                  <?PHP }?>                                            
                                                    <th style="text-align:center">معلومات الكتب</th>                                                
                                                    <th style="text-align:center">معلومات الفيش</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              
                                <?php
                                while($row = mysqli_fetch_assoc($result)) {
                                  $id=$row['id'];                                 
                                  $e_id=$row['e_id'];
                                  $inserted_edbara_num=$row['edbara_num'];
                                  $inserted_jeha=$row["jeha"];
                                  $e_details_type=$row["details_type"];
                                  $e_resala_type=$row["resala_type"];
                                  $foto = $row['foto1'];                                    
                                  $e_details_attach = $row['details_attach'];
                                  $details_attach_extension = $row['details_attach_extension'];
                                  $inserted_year = $row['e_year']; 

                                  if($row["edbara_num"]==''){
                                    echo'<tr class="bg-danger">';
                                  }else{
                                    echo'<tr>';
                                  }                                  
                                  echo '<td><a href="j_edit.php?id='.$id.'&e_id='.$e_id.'&edbara_num='.$inserted_edbara_num.'&jeha='.$inserted_jeha.'&details_type='.$e_details_type.'&resala_type='.$e_resala_type.'&e_year='.$inserted_year.'&#j_edit"><i style="font-size: 2.5rem" class="zwicon-edit-circle"></i></a></td>';
                                  if($admin!=5){
                                  echo 
                                  '<td> <a target="_blank" href="print-elements.php?e_id='.$e_id.'&edbara_num='.$inserted_edbara_num.'&jeha='.$inserted_jeha.'&details_type='.$e_details_type.'&resala_type='.$e_resala_type.'&e_year='.$inserted_year.'&type=archive"><i style="font-size: 2.5rem" class="zwicon-printer"></i></a></td>';  
                                  }                                  
                                 
                                    echo            
                                    '<td>' .$row["jeha"].'</td>'.
                                    '<td>' .$row["details_type"].'</td>';
                                    if (strpos($jeha_profile, 'داخلي') !== false || strpos($jeha_profile, 'هيئة الرقابة والتفتيش') !== false || $jeha_profile == 'الإدارة المركزية للمعلومات'){
                                      echo '<td >' .$row["id_num"].'</td>';
                                    }          
                                  echo '<td>' .$row["edbara_num"].                                    
                                    '</td><td >' .$row["edbara_date"].'</td>';
                                  
                                  
                                  //echo '<td >' .$row["dewan_num"].
                                  //'</td><td>'.$row["dewan_date"].                    
                                  echo '</td><td>'.$row["name"].' '.$row["fname"].' '.$row["lname"].
                                  '</td><td>'.$row["mname"].
                                  '</td><td>'.$row["pbirth"].
                                  '</td><td>'.$row["dbirth"].
                                  '</td><td >'.$row["address"].'</td>'.
                                  '</td><td >'.$row["sex"].'</td>'.
                                  '</td><td >'.$row["national"].'</td>';

                                  echo '<td style="display:none">'.$row["edbara_note"].'</td><td>'.$row["note"].
                                  '</td><td >'.$row["result"].'</td>';
                                  echo '<td style="display:none">'.strip_tags($row['edbara_info']).'</td>';
                                  if(@strlen($foto)>100){
                                  echo '<td>'.'<img width="65" height="80" src="data:image/jpeg;base64,'.base64_encode($foto).'"/></td>';
                                }else {echo '<td>'.'لا يوجد صورة'.'</td>';}
                                
                                if(@strlen($e_details_attach)>100){
                                  echo '<td >'.'<a href="data:application/'.$details_attach_extension.';base64,'.base64_encode($e_details_attach).'">تنزيل</a></td>';
                                }else {echo '<td >'.'لا يوجد مرفقات'.'</td>';}
                                echo '<td class=""> <a target="_blank" href="s_view_server.php?e_id='.$e_id.'&jeha='.$inserted_jeha.'&details_type='.$e_details_type.'&resala_type='.$e_resala_type.'&e_year='.$inserted_year.'">'.$row["study"].'</td>' ;
                                if($admin == 1 || $admin == 7 ){
                                  echo '<td>';if (@strlen($row["added_by"]) >= 20) {
                                  echo substr($row["added_by"], 0, 10). " ... " . substr($row["added_by"], -20);
                              }
                              else {
                                  echo $row["added_by"];
                              }echo '</td>'.
                                '<td class="noprint">'.$row["add_date"].'</td>';
                              }


                                  if ($jeha_profile == 'الإدارة المركزية للمعلومات'){
                                  //get details_sub table data ///////////////// details sub ////////////////////////////
                                  include "query/details_sub_query.php";
                                  $sql_details_sub_result = mysqli_query($conn, $sql_details_sub);
                                  ///////////////// details sub ////////////////////////////
                                  echo'<td><table  id="" class="table table-striped table-bordered table-hover"><tr>'.'<th>إسم الجهة</th><th>رقم الديوان</th><th>تاريخ الديوان</th>'.'<th>رقم الإضبارة</th>'.'<th>تاريخ الإضبارة</th>'.'<th class="hide_this">مضمون الإضبارة</th>'.'<th style="display:none">ملخص الإضبارة</th>'.'<th>ملاحظات عامة</th>'.'<th>النتيجة</th>'.'<th>صورة اضبارة موقوف</th></tr>';
                                  while($row_details_sub = mysqli_fetch_assoc($sql_details_sub_result)){
                                  $sub_details_attach = $row_details_sub['details_attach']; 
                                  $sub_details_attach_extension = $row_details_sub['details_attach_extension']; 
                                  echo '<tr><td>'.$row_details_sub["jeha_name"].'</td><td>' .$row_details_sub["dewan_num"].'/'.$row_details_sub["e_year"].
                                  '</td><td>'.$row_details_sub["dewan_date"].
                                  '</td><td>' .$row_details_sub["edbara_num"].'/'.$row_details_sub["e_year"].                                  
                                  '</td><td>' .$row_details_sub["edbara_date"].
                                  '</td><td class="hide_this">' .strip_tags($row_details_sub["edbara_info"]).
                                  '</td><td style="display:none">' .$row_details_sub["edbara_note"].                                     
                                  '</td><td>' .$row_details_sub["note"].
                                  '</td><td>' .$row_details_sub["result"].'</td>';
                                  if(@strlen($sub_details_attach)>100){
                                    echo '<td >'.'<a href="data:application/'.$sub_details_attach_extension.';base64,'.base64_encode($sub_details_attach).'">تنزيل</a></td>';
                                  }else {echo '<td >'.'لا يوجد مرفقات'.'</td>';}
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
                                  echo '<th>رقم ال'.$e_resala_type.'</th>'
                                  .'<th>تاريخ ال'.$e_resala_type.'</th>'
                                  .'<th>تاريخ استلام ال'.$e_resala_type.'</th>'
                                  .'<th>';
                                  if($e_details_type=='صادر' ){ echo 'تاريخ الإرسال';} else{ echo 'تاريخ الاستلام'; }
                                  echo '</th>'
                                  .'<th>عنوان ال'.$e_resala_type.'</th>'
                                  .'<th>موضوع ال'.$e_resala_type.'</th>'
                                  .'<th>تاريخ ورودها المتتابع</th>'
                                  .'<th>متابعة مسار ال'.$e_resala_type.'</th>'
                                  .'<th>تاريخ متابعة مسار ال'.$e_resala_type.'</th>'
                                  .'<th>الجهة المرسلة</th><th>الجهة المرسل إليها</th>                               
                                  <th>مرفقات ال'.$e_resala_type.'</th><th style="display:none">ملخص التقرير</th></tr>';
                                                  
                                  while($row_reports = mysqli_fetch_assoc($sql_reports_result)){
                                                                      
                                  $r_attach = $row_reports['r_attach']; 
                                  $r_attach_extension = $row_reports['r_attach_extension'];
                                  if($row_reports["r_important"]=='نعم'){ 
                                  echo '<tr style="background-color:#c1f9b3">';
                                  }else{
                                    echo '<tr>';
                                  }
                                  echo '<td >' .$row_reports["ketab_num"].'/'.$row_reports["e_year"].
                                  '</td><td >' .$row_reports["ketab_date"].                                  
                                  '</td><td >' .$row_reports["r_handle_date"].
                                  '</td><td >' .$row_reports["send_date"].
                                  '</td><td >' .$row_reports["r_address"]. 
                                  '</td><td >' .$row_reports["r_title"].                                    
                                  '</td><td >' .$row_reports["r_follow_date"].
                                  '</td><td >' .$row_reports["r_follow"].
                                  '</td><td >' .$row_reports["r_following_date"].
                                  '</td><td >'.$row_reports['sendfrom'].                                
                                  '</td><td >' .$row_reports['sendto'].                                    
                                  '</td>';                                  
                                
                                  if(@strlen($r_attach)>100){
                                    echo '<td >'.'<a href="data:application/'.$r_attach_extension.';base64,'.base64_encode($r_attach).'">تنزيل</a></td>';
                                  }else {echo '<td > لا يوجد مرفقات </td><td style="display:none">'.$row_reports['report_brief'].'</td>';}

                                  echo '</tr>';
                                                      
                      
                              }
                              echo '</table></td>';
                              ///////////////////////////////////////////////////////


                              //get feech_info table data ///////////////// feech //////////////////
                              include "query/feech_info_query.php";
                              $sql_feech_result = mysqli_query($conn, $sql_feech);
                              ///////////////// feech //////////////////
                              
                              echo '<td><table  id="" class="table table-striped table-bordered table-hover">';
                              
                              echo '<tr>'.'<th>نوع الفيش</th>';
                                     //if($row_feech1['feech_type']=='مكفوف عنهم البحث' || $row_feech1['feech_type']=='سوابق'){ 
                                     if ($jeha_profile == 'الإدارة المركزية للمعلومات' && $e_details_type!=='وارد'){
                                    echo '<th>الجهة الآمرة</th>';
                                    //}else{
                                      //echo '<th>الجهة الآمرة للتوقيف</th>';
                                    //}
                                    
                                    echo '<th>التهمة</th>'.
                                    '<th>رقم ال'.$e_resala_type.'</th>'.
                                    '<th>تاريخ ال'.$e_resala_type.'</th>'.
                                    '<th>رقم البلاغ</th><th>تاريخ البلاغ</th><th>نوع الإجراء</th><th class="hide_this">نص البلاغ</th><th style="border-left:3px solid black">صورة عن البلاغ</th>';
                                     }
                                    //if($row_feech1['feech_type']=='مكفوف عنهم البحث' || $row_feech1['feech_type']=='سوابق'){ 
                                      echo '<th>الجهة الطالبة</th>';
                                      /* }else{
                                        echo '<th>الجهة الطالبة للتوقيف</th>';
                                      }   */                                
                                    echo '<th>التهمة</th>'.
                                    '<th>رقم ال'.$e_resala_type.'</th>'.
                                    '<th>تاريخ ال'.$e_resala_type.'</th>'.
                                    '<th>رقم البلاغ</th><th>تاريخ البلاغ</th><th>نوع الإجراء</th><th class="hide_this">نص البلاغ</th><th>صورة عن البلاغ</th></tr>';
                              
                                    while($row_feech = mysqli_fetch_assoc($sql_feech_result)){
                                      $balagh_attach = $row_feech['balagh_attach']; 
                                      $sho3ba_balagh_attach = $row_feech['sho3ba_balagh_attach']; 

                                      $balagh_attach_extension = $row_feech['balagh_attach_extension']; 
                                      $sho3ba_balagh_attach_extension = $row_feech['sho3ba_balagh_attach_extension']; 
                                                                          
                                      echo '<tr>'.'<td>'.$row_feech["feech_type"].'</td>';
                                      if ($jeha_profile == 'الإدارة المركزية للمعلومات' && $e_details_type!=='وارد'){
                                      echo '<td>'.$row_feech["jeha_request_order"].'</td>'.
                                      '<td >'.$row_feech["jeha_tohma"].'</td>'.
                                      '<td>' .$row_feech["sho3ba_ketab_num"].'/'.$row_feech["e_year"].'</td>'.
                                      '<td>' .$row_feech["sho3ba_ketab_date"].'</td>'.                                        
                                      '<td>'.$row_feech["sho3ba_balagh_num"].'/'.$row_feech["e_year"].'</td>'.
                                      '<td>' .$row_feech["sho3ba_balagh_date"].'</td>'.
                                      '<td>'.$row_feech["sho3ba_balagh_type"].'</td>'.
                                      '<td class="hide_this">'.strip_tags($row_feech["sho3ba_balagh"]).'</td>';
                                      if(@strlen($sho3ba_balagh_attach)>100){
                                        echo '<td style="border-left:3px solid black">'.'<a href="data:application/'.$sho3ba_balagh_attach_extension.';base64,'.base64_encode($sho3ba_balagh_attach).'">تنزيل</a></td>';
                                      }else {echo '<td style="border-left:3px solid black">لا يوجد</td>';} 
                                    }                                   
                                      echo
                                      '<td>'.$row_feech["requested"].'</td>'.
                                      '<td>'.$row_feech["jorm"].'</td>'. 
                                      '<td>'.$row_feech["ketab_num"].'/'.$row_feech["e_year"].'</td>'.
                                      '<td>'.$row_feech["ketab_date"].'</td>'.
                                      '<td>'.$row_feech["num_balagh"].'/'.$row_feech["e_year"].'</td>'.
                                      '<td>'.$row_feech["d_balagh"].'</td>'.
                                      '<td>'.$row_feech["balagh_type"].'</td>'.
                                      '<td class="hide_this">'.strip_tags($row_feech["balagh"]).'</td>';
                                      if(@strlen($balagh_attach)>100){
                                        echo '<td>'.'<a href="data:application/'.$balagh_attach_extension.';base64,'.base64_encode($balagh_attach).'">تنزيل</a></td>';
                                      }else {echo '<td>لا يوجد</td>';}
                                      
                                      echo '</tr>';                       
                        
                                }
                                echo '</table></td>';
                              
                              ///////////////////////////////////////////////////////
                                  echo '</tr>';
                                  //$count++;
                              }
                          ?>


