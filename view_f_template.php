<table  id="" class="example display cell-border compact row-border hover order-column stripe text-center" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>تفاصيل</th>                                                  
                                                    <?php if ($details_type=='وارد' && ($admin == 1 || $admin == 7)){
                                                      echo '<th>تبعية المعلومات</th>';
                                                     }?>
                                                    <th>نوع الفيش</th>
                                                    <th>رقم الإضبارة <?php if ($jeha_profile == 'الإدارة المركزية للمعلومات' && $details_type=='صادر'){ ?> العام <?php }?></th>
                                                    <th>تاريخ الإضبارة <?php if ($jeha_profile == 'الإدارة المركزية للمعلومات' && $details_type=='صادر'){ ?> العام <?php }?></th>
                                                    <?php if ($jeha_profile == 'الإدارة المركزية للمعلومات' && $details_type!=='وارد'){?>
                                                    <th>رقم الكتاب</th>
                                                   
                                                    <th>تاريخ الكتاب</th>
                                                    <th>رقم البلاغ</th>
                                                    <th>تاريخ البلاغ</th>
                                                    <th>الجهة الآمرة</th>
                                                    <th>التهمة</th>
                                                    <th>نوع الإجراء</th>
                                                    <th class="hide_this">نص البلاغ</th>
                                                    <th style="border-left:3px solid black">صورة عن البلاغ</th>    
                                                    <?php } ?>                               
                                                    <th>رقم الكتاب</th>
                                                  
                                                    <th>تاريخ الكتاب</th>
                                                    <th>رقم البلاغ</th>
                                                    <th>تاريخ البلاغ</th>
                                                    <th>الجهة الطالبة</th>
                                                    <th>التهمة</th>
                                                    <th>نوع الإجراء</th>
                                                    <th class="hide_this">نص البلاغ</th>
                                                    <th>صورة عن البلاغ</th>
                                                    <th>تاريخ آخر تعديل</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              
                                <?php
                                while($row_feech = mysqli_fetch_assoc($result)) {
                                  $id=$row_feech['id'];                                 
                                  $e_id=$row_feech['e_id'];
                                  $edbara_num=$row_feech['edbara_num'];
                                  $details_type=$row_feech['details_type'];
                                  $resala_type=$row_feech['resala_type'];
                                  $inserted_jeha=$row_feech["jeha"];
                                  $balagh_attach = $row_feech['balagh_attach']; 
                                  $sho3ba_balagh_attach = $row_feech['sho3ba_balagh_attach'];
                                  $balagh_attach_extension = $row_feech['balagh_attach_extension']; 
                                  $sho3ba_balagh_attach_extension = $row_feech['sho3ba_balagh_attach_extension']; 
                                  $inserted_year = $row_feech['e_year']; 

                                  if($row_feech["edbara_num"]==''){
                                    echo'<tr class="bg-danger">';
                                  }else{
                                    echo'<tr>';
                                  }                                  
                                  echo '<td><a href="f_edit.php?id='.$id.'&edbara_num='.$edbara_num.'&e_id='.$e_id.'&jeha='.$inserted_jeha.'&details_type='.$details_type.'&resala_type='.$resala_type.'&e_year='.$inserted_year.'&#j_edit"><i style="font-size: 2.5rem" class="zwicon-edit-circle"></i></a></td>';                                                                     
                                  if ($details_type=='وارد' && ($admin == 1 || $admin == 7)){
                                      echo '<td>'.$row_feech["jeha"].'</td>';
                                    }

                                    
                                                                        
                                    echo '<td>'.$row_feech["feech_type"].'</td>'.
                                    '<td>' .$row_feech["edbara_num"].'</td>'.                                    
                                      '<td>' .$row_feech["edbara_date"].'</td>';
                                    if ($jeha_profile == 'الإدارة المركزية للمعلومات' && $details_type!=='وارد'){
                                      echo                                       
                                      '<td>' .$row_feech["sho3ba_ketab_num"].'</td>'.
                                     
                                      '<td>' .$row_feech["sho3ba_ketab_date"].'</td>'.                                        
                                      '<td>'.$row_feech["sho3ba_balagh_num"].'</td>'.
                                      '<td>' .$row_feech["sho3ba_balagh_date"].'</td>'.
                                      '<td>'.$row_feech["jeha_request_order"].'</td>'.
                                      '<td >'.$row_feech["jeha_tohma"].'</td>'.
                                      '<td>'.$row_feech["sho3ba_balagh_type"].'</td>'.
                                      '<td class="hide_this">'.strip_tags($row_feech["sho3ba_balagh"]).'</td>';
                                    if(@strlen($sho3ba_balagh_attach)>100){
                                      echo '<td style="border-left:3px solid black">'.'<a href="data:application/'.$sho3ba_balagh_attach_extension.';base64,'.base64_encode($sho3ba_balagh_attach).'">تنزيل</a></td>';
                                    }else {echo '<td style="border-left:3px solid black">لا يوجد</td>';} 
                                  }                                   
                                    echo
                                    
                                    '<td>'.$row_feech["ketab_num"].'</td>'.
                                    
                                    '<td>'.$row_feech["ketab_date"].'</td>'.
                                    '<td>'.$row_feech["num_balagh"].'</td>'.
                                    '<td>'.$row_feech["d_balagh"].'</td>'.
                                    '<td>'.$row_feech["requested"].'</td>'.
                                    '<td>'.$row_feech["jorm"].'</td>'. 
                                    '<td>'.$row_feech["balagh_type"].'</td>'.
                                    '<td class="hide_this">'.strip_tags($row_feech["balagh"]).'</td>';
                                    if(@strlen($balagh_attach)>100){
                                      echo '<td>'.'<a href="data:application/'.$balagh_attach_extension.';base64,'.base64_encode($balagh_attach).'">تنزيل</a></td>';
                                    }else {echo '<td>لا يوجد</td>';}
                                    echo '<th>'.$row_feech['add_date'].'</th>';
                                    
                                    echo '</tr>';
                              }
                          ?>


