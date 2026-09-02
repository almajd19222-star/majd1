<?php $td_class = "show-read-more"; ?>
          <table  id="" class="example table table-striped table-bordered table-hover text-center align-middle">
                                            <thead>
                                              
                                                <tr>
                                              <?php  if ($admin == 1 || $admin == 7){
                                              if ($details_type !=='صادر'){ ?>
                                                <th>حذف</th>
                                                <?php }}?>
                                                <th>تفاصيل</th>
                                                <th>نوع الفيش</th>
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
                                                    <th style="border-left:3px solid black;">صورة</th>

                                                    <?php                                                    

                                                    if ($jeha_profile == 'الإدارة المركزية للمعلومات' && $details_type!=='وارد'){
                                                   echo '<th style="border-right:3px solid black;">الجهة الآمرة</th>';
                                                   
                                                   
                                                   echo '<th>التهمة</th>'.
                                                   '<th>رقم الكتاب</th>'.
                                                   '<th>تاريخ الكتاب</th>'.
                                                   '<th>رقم البلاغ</th><th>تاريخ البلاغ</th><th>نوع الإجراء</th><th class="hide_this">نص البلاغ</th><th style="border-left:3px solid black;">صورة عن البلاغ</th>';
                                                    }
                                                  
                                                     echo '<th>الجهة الطالبة</th>';
                                                                             
                                                   echo '<th>التهمة</th>'.
                                                   '<th>رقم الكتاب</th>'.                                                   
                                                   '<th>تاريخ الكتاب</th>'.
                                                   '<th>رقم البلاغ</th><th>تاريخ البلاغ</th><th>نوع الإجراء</th><th class="hide_this">نص البلاغ</th><th>صورة عن البلاغ</th>';
                                                    ?> 
                                                    <th>المُدخل</th>
                                                    <th>تاريخ آخر تعديل</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              
                                <?php
                                while($row = mysqli_fetch_assoc($result)) {
                                  $id=$row['id2'];
                                  $inserted_edbara_num=$row['edbara_num1'];
                                  $e_id=$row['id1'];
                                  $inserted_jeha=$row["jeha"];
                                  $e_details_type=$row["details_type"];
                                  $e_resala_type=$row["resala_type"];
                                  $foto = $row['foto1'];                                    
                                 
                                  $inserted_year = $row['e_year1']; 


                                  if(($jeha_profile == 'الإدارة المركزية للمعلومات' && $row["sho3ba_balagh_type"]=='' && $details_type!=='وارد') || ($jeha_profile !== 'الإدارة المركزية للمعلومات' && $row["balagh_type"]=='' && $details_type!=='وارد')){
                                    echo'<tr class="bg-blue">';
                                  }else{
                                    echo'<tr>';
                                  }                                  
                                  
                                
                                  if ($admin == 1 || $admin == 7){
                                    if ($details_type !=='صادر'){
                                      if($hasPerm_delete == '1'){
                                    echo'<td class="'.$td_class.'"><a href="delete.php?id='.$id.'&jeha='.$_GET['jeha'].'&details_type='.$_GET['details_type'].'&delete_feech=true" onclick="'."return confirm('متأكد من الحذف؟');".'"><i style="font-size: 2.5rem" class="zwicon-delete"></i></a></td>';
                                      }
                                    }
                                  }
                                    echo '<td class="'.$td_class.'"><a href="f_edit.php?id='.$id.'"><i style="font-size: 2.5rem" class="zwicon-edit-circle"></i></a></td>';  
                                    echo '<td class="'.$td_class.'">'.$row["feech_type"].'</td>';
                                     
                                    if ($details_type=='وارد' && ($admin == 1 || $admin == 7)){
                                      echo '<td class="'.$td_class.'">'.$row["jeha"].'</td>';
                                    }                     
                                    echo  
                                  '<td class="'.$td_class.'">' .$row["edbara_num1"].'</td>'.                                                                  
                                    '<td class="'.$td_class.'">' .$row["edbara_date1"].'</td>';                                
                                                  
                                  echo '<td class="'.$td_class.'">'.$row["name"].' '.$row["fname"].' '.$row["lname"].'</td>'.
                                  '<td class="'.$td_class.'">'.$row["mname"].'</td>'.
                                  '<td class="'.$td_class.'">'.$row["pbirth"].'</td>'.
                                  '<td class="'.$td_class.'">'.$row["dbirth"].'</td>'.
                                  '<td class="'.$td_class.'">'.$row["awsaf"].'</td>'.
                                  '<td class="'.$td_class.'">'.$row["address"].'</td>'.
                                  '<td class="'.$td_class.'">'.$row["sex"].'</td>'.
                                  '<td class="'.$td_class.'">'.$row["national"].'</td>';
                                 
                                  if(@strlen($foto)>300){//if (strpos($foto, '/file_enc/') == false){
                                    echo '<td>'.'<img width="65" height="80" src="data:image/jpeg;base64,'.base64_encode($foto).'"/></td>';
                                }elseif (strpos($foto, '/files_enc/') !== false) {
                                  include "inc/file_upload/file_decrypt_foto.php";                                
                                }else{
                                  echo '<td class="'.$td_class.'">'.'لا يوجد صورة'.'</td>';
                                }
                                


                                

                              
                            
                              ///////////////// feech //////////////////
                              
                              
                            
                             
                             
                              

                                    
                                      $balagh_attach = $row['balagh_attach']; 
                                      $sho3ba_balagh_attach = $row['sho3ba_balagh_attach']; 

                                      $balagh_attach_extension = $row['balagh_attach_extension']; 
                                      $sho3ba_balagh_attach_extension = $row['sho3ba_balagh_attach_extension']; 
                                                                          
                                     

                                      

                                     
                                      if ($jeha_profile == 'الإدارة المركزية للمعلومات' && $details_type!=='وارد'){
                                      echo '<td style="border-right:3px solid black;">'.$row["jeha_request_order"].'</td>'.
                                      '<td class="'.$td_class.'">'.$row["jeha_tohma"].'</td>'.
                                      '<td class="'.$td_class.'">' .$row["sho3ba_ketab_num"].'</td>'.
                                     
                                      '<td class="'.$td_class.'">' .$row["sho3ba_ketab_date"].'</td>'.                                        
                                      '<td class="'.$td_class.'">'.$row["sho3ba_balagh_num"].'</td>'.
                                      '<td class="'.$td_class.'">' .$row["sho3ba_balagh_date"].'</td>'.
                                      '<td class="'.$td_class.'">'.$row["sho3ba_balagh_type"].'</td>'.
                                      '<td class="hide_this">'.strip_tags($row["sho3ba_balagh"]).'</td>';
                                      if(@strlen($sho3ba_balagh_attach)>300){
                                        echo '<td style="border-left:3px solid black">'.'<a href="data:application/'.$sho3ba_balagh_attach_extension.';base64,'.base64_encode($sho3ba_balagh_attach).'">تنزيل</a></td>';
                                      }else {
                                        if (!empty($sho3ba_balagh_attach)){                                                                       
                                            echo '<td style="border-left:3px solid black" ><a href="'.$url_host.'/inc/file_upload/file_decrypt.php?path='.$sho3ba_balagh_attach.'">تنزيل</a></td>';                                
                                        }else {echo '<td style="border-left:3px solid black">لا يوجد</td>';}
                                      } 
                                    }                       
                                      echo
                                      '<td class="'.$td_class.'">'.$row["requested"].'</td>'.
                                      '<td class="'.$td_class.'">'.$row["jorm"].'</td>'. 
                                      '<td class="'.$td_class.'">'.$row["ketab_num"].'</td>'.                                     
                                      '<td class="'.$td_class.'">'.$row["ketab_date"].'</td>'.
                                      '<td class="'.$td_class.'">'.$row["num_balagh"].'</td>'.
                                      '<td class="'.$td_class.'">'.$row["d_balagh"].'</td>'.
                                      '<td class="'.$td_class.'">'.$row["balagh_type"].'</td>'.
                                      '<td class="hide_this">'.strip_tags($row["balagh"]).'</td>';
                                      if(@strlen($balagh_attach)>300){
                                        echo '<td class="'.$td_class.'">'.'<a href="data:application/'.$balagh_attach_extension.';base64,'.base64_encode($balagh_attach).'">تنزيل</a></td>';
                                      }else {
                                        if (!empty($balagh_attach)){                                                                        
                                            echo '<td class="'.$td_class.'"><a href="'.$url_host.'/inc/file_upload/file_decrypt.php?path='.$balagh_attach.'">تنزيل</a></td>';                                
                                        }else {echo '<td class="'.$td_class.'">لا يوجد</td>';}                                        
                                      } 
                                      echo '<td class="'.$td_class.'">'.$row["added_by2"].'</td>'.
                                      '<td class="noprint">'.$row["add_date2"].'</td>';
                              
                              ///////////////////////////////////////////////////////
                                  echo '</tr>';
                                  //$count++;
                              
                            }
                          ?>


