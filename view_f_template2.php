<table  id="" class="example table table-striped table-bordered table-hover text-center align-middle">
                                            <thead>
                                                <tr>
                                                  
                                                   <?php if ($details_type=='وارد' && ($admin == 1 || $admin == 7)){
                                                      echo '<th>تبعية المعلومات</th>';
                                                    } ?>
                                                      
                                                    <th>رقم الإضبارة <?php if ($jeha_profile == 'الإدارة المركزية للمعلومات' && $details_type=='صادر'){ ?> العام <?php }?></th>
                                                  
                                                    <th>تاريخ الإضبارة <?php if ($jeha_profile == 'الإدارة المركزية للمعلومات' && $details_type=='صادر'){ ?> العام <?php }?></th>                                                  
                                                  
                                                  
                                                   
                                                    <th>الاسم الكامل</th>
                                                    <th>اسم ونسبة الأم</th>
                                                    <th>مكان الولادة</th>
                                                    <th>تاريخ الولادة</th>
                                                    <th>الأوصاف</th>
                                                    <th>مكان الاقامة الحالي</th> 
                                                    <th>الجنس</th>
                                                    <th>الجنسية</th>
                                                                                              
                                                   
                                                    <th >صورة</th>
                                                    
                                                    
                                                  
                                                    <?php if ($admin == 1 || $admin == 7 ){ ?>                                            
                                                    <th style="text-align:center">معلومات الفيش</th>
                                                    <?PHP }?> 
                                                </tr>
                                            </thead>
                                            <tbody>
                                              
                                <?php
                                while($row = mysqli_fetch_assoc($result)) {
                                 
                                  $inserted_edbara_num=$row['edbara_num'];
                                  $e_id=$row['e_id'];
                                  $inserted_jeha=$row["jeha"];
                                  $e_details_type=$row["details_type"];
                                  $e_resala_type=$row["resala_type"];
                                  $foto = $row['foto1'];                                    
                                  $e_details_attach = $row['details_attach'];
                                  $details_attach_extension = $row['details_attach_extension'];
                                  $inserted_year = $row['e_year']; 


                                  if(($admin == 1 || $admin == 7)  && $row["edbara_num"]==0){
                                    echo'<tr class="bg-danger">';
                                  }else{
                                    echo'<tr>';
                                  }                                  
                                  
                                
                                     
                                    if ($details_type=='وارد' && ($admin == 1 || $admin == 7)){
                                      echo '<td>'.$row["jeha"].'</td>';
                                    }                     
                                    echo  
                                  '<td >' .$row["edbara_num"].'</td>'.
                                                                   
                                    '<td >' .$row["edbara_date"].'</td>';                                
                                                  
                                  echo '</td><td>'.$row["name"].' '.$row["fname"].' '.$row["lname"].
                                  '</td><td>'.$row["mname"].
                                  '</td><td>'.$row["pbirth"].
                                  '</td><td>'.$row["dbirth"].
                                  '</td><td>'.$row["awsaf"].
                                  '</td><td >'.$row["address"].'</td>'.
                                  '</td><td >'.$row["sex"].'</td>'.
                                  '</td><td >'.$row["national"].'</td>';
                                 
                                if(@strlen($foto)>100){
                                  echo '<td>'.'<img width="65" height="80" src="data:image/jpeg;base64,'.base64_encode($foto).'"/></td>';
                                }else {echo '<td>'.'لا يوجد صورة'.'</td>';}
                                


                                

                              if($admin == 1 || $admin == 7 ){
                              //get feech_info table data ///////////////// feech //////////////////
                              $sql_feech_info = "SELECT *                               
                              FROM feech_info where edbara_num=$inserted_edbara_num AND edbara_num != 0 AND e_year=$inserted_year AND details_type = '$details_type' AND jeha='$inserted_jeha' ORDER BY ketab_num DESC";
                              /* if ($admin == 1 || $admin == 7){ $sql_feech_info2= $sql_row_jehat; } 
                              else{$sql_feech_info2="";}
                              $sql_feech_info3= ") ORDER BY add_date DESC";
                              $sql_feech_info= $sql_feech_info1.$sql_feech_info2.$sql_feech_info3; */
                              $sql_feech_info_result = mysqli_query($conn, $sql_feech_info);
                              ///////////////// feech //////////////////
                              
                              echo '<td><table  id="data-table-3" class="table table-striped table-bordered table-hover">';
                              
                              echo '<tr>';
                              if ($admin == 1 || $admin == 7 || $admin==5){
                                if ($details_type !=='صادر'){
                              echo '<th>حذف</th>';
                              }
                            }
                              echo '<th>تعديل</th><th>نوع الفيش</th>';
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
                              
                                    while($row_feech = mysqli_fetch_assoc($sql_feech_info_result)){

                                      $id=$row_feech['id'];
                                      $balagh_attach = $row_feech['balagh_attach']; 
                                      $sho3ba_balagh_attach = $row_feech['sho3ba_balagh_attach']; 

                                      $balagh_attach_extension = $row_feech['balagh_attach_extension']; 
                                      $sho3ba_balagh_attach_extension = $row_feech['sho3ba_balagh_attach_extension']; 
                                                                          
                                      echo '<tr>';
                                      if ($admin == 1 || $admin == 7 || $admin == 5){
                                        if ($details_type !=='صادر'){
                                      echo'<td><a href="delete.php?id='.$id.'&jeha='.$_GET['jeha'].'&details_type='.$_GET['details_type'].'&delete_feech=true" onclick="'."return confirm('متأكد من الحذف؟');".'"><i style="font-size: 2.5rem" class="zwicon-delete"></i></a></td>';
                                      }
                                    }
                                      echo '<td><a href="f_edit.php?id='.$id.'&edbara_num='.$inserted_edbara_num.'&e_id='.$e_id.'&jeha='.$inserted_jeha.'&details_type='.$e_details_type.'&resala_type=كتاب&e_year='.$inserted_year.'"><i style="font-size: 2.5rem" class="zwicon-edit-circle"></i></a></td>';  

                                      

                                      echo '<td>'.$row_feech["feech_type"].'</td>';
                                      if ($jeha_profile == 'الإدارة المركزية للمعلومات' && $details_type!=='وارد'){
                                      echo '<td>'.$row_feech["jeha_request_order"].'</td>'.
                                      '<td >'.$row_feech["jeha_tohma"].'</td>'.
                                      '<td>' .$row_feech["sho3ba_ketab_num"].'</td>'.
                                    
                                      '<td>' .$row_feech["sho3ba_ketab_date"].'</td>'.                                        
                                      '<td>'.$row_feech["sho3ba_balagh_num"].'</td>'.
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
                                      '<td>'.$row_feech["ketab_num"].'</td>'.
                                     
                                      '<td>'.$row_feech["ketab_date"].'</td>'.
                                      '<td>'.$row_feech["num_balagh"].'</td>'.
                                      '<td>'.$row_feech["d_balagh"].'</td>'.
                                      '<td>'.$row_feech["balagh_type"].'</td>'.
                                      '<td class="hide_this">'.strip_tags($row_feech["balagh"]).'</td>';
                                      if(@strlen($balagh_attach)>100){
                                        echo '<td>'.'<a href="data:application/'.$balagh_attach_extension.';base64,'.base64_encode($balagh_attach).'">تنزيل</a></td>';
                                      }else {echo '<td>لا يوجد</td>';}
                                      
                                      echo '</tr>';                       
                        
                                }
                                echo '</table></td>';
                              }
                              ///////////////////////////////////////////////////////
                                  echo '</tr>';
                                  //$count++;
                              
                            }
                          ?>


