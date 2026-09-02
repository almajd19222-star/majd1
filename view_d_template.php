<?php $td_class = "show-read-more"; ?>
                                        <table id=""  class="example display cell-border compact row-border hover order-column stripe text-center" style="width:100%">
                                            <thead>
                                                <tr>
                                                <!-- <th></th> -->
                                                  <?php if ($admin == 1 || $admin == 7 || $admin==5 || $admin==3){
                                                     if ($details_type !=='صادر'){ ?>
                                                    
                                                    <th>حذف</th>
                                                  <?php } }?>
                                                    <th>تفاصيل</th>
                                                    <th>طباعة</th> 
                                                    <?php if ($details_type=='وارد' && ($admin == 1 || $admin == 7 || $admin == 3)){
                                                      echo '<th>تبعية المعلومات</th>';
                                                     }?>
                                                    <th>رقم الديوان</th>                                                   
                                                    <th>تاريخ الديوان</th> 
                                                    <th>رقم الرسالة</th>
                                                    <th>تاريخ الرسالة</th> 
                                                    <th>الجهة المرسلة</th>
                                                    <th>الجهة المرسل إليها</th>  
                                                    <th>الخلاصة</th> 
                                                    <th>تاريخ ورودها المتتابع</th>
                                                    <th><?php if($details_type=='صادر' ){ echo 'تاريخ الإرسال';} else{ echo 'تاريخ الاستلام'; } ?></th>
                                                    <th >النتيجة</th>
                                                    <th>ملاحظات</th>    
                                                    <?php if ($admin != 3 ){ ?>                                             
                                                    <th>صورة الرسالة</th>
                                                    <th>رقم الديوان المردود عليه</th>
                                                    <th>تاريخ الديوان المردود عليه</th>
                                                    <th>رقم الديوان الملحق به</th>
                                                    <th>تاريخ الديوان الملحق به</th>
                                                    <?php } ?>
                                                  <?php if ($admin == 1 || $admin == 7 || $admin==5){ ?>
                                                    <th>المُدخل</th>
                                                    <th>تاريخ آخر تعديل</th>
                                                  <?php } ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                <?php
                                while($row = mysqli_fetch_assoc($result)) {
                                    $id = $row['id'];                                     
                                    $d_attach = $row['d_attach']; 
                                    $d_attach_extension = $row['d_attach_extension'];                              
                                    if($row["dewan_num"]==0){                                    
                                    echo'<tr class="bg-info">';
                                    }else{
                                    echo '<tr>';
                                    }
                                    //echo  '<th></th>';
                                    if ($admin == 1 || $admin == 7 || $admin==5 || $admin==3){
                                      if ($details_type !=='صادر'){
                                        
                                      if($hasPerm_delete == '1'){
                                      echo'<td class="'.$td_class.'"><a href="delete.php?id='.$row["id"].'&jeha='.$row["jeha"].'&details_type='.$row["details_type"].'&delete_dewan=true" onclick="'."return confirm('متأكد من الحذف؟');".'"><i style="font-size: 2.5rem" class="zwicon-delete"></i></a></td>';
                                        }
                                     }
                                    }
                                    echo'<td class="'.$td_class.'"><a href="d_edit.php?id='.$row["id"].'"><i style="font-size: 2.5rem" class="zwicon-edit-circle"></i></a></td>';
                                  
                                    echo '<td class="'.$td_class.'"> <a target="_blank" href="print-elements.php?id='.$row['id'].'&jeha='.$row['jeha'].'&details_type='.$row['details_type'].'&type=dewan"><i style="font-size: 2.5rem" class="zwicon-printer"></i></a></td>';
                                        
                                    if ($details_type=='وارد' && ($admin == 1 || $admin == 7 || $admin == 3)){
                                      echo '<td class="'.$td_class.'">'.$row["jeha"].'</td>';
                                    }

                                    echo                               
                                    '<td class="'.$td_class.'">'.$row["dewan_num"].'</td>'.                                   
                                    '<td class="'.$td_class.'">'.$row["dewan_date"].'</td>'. 
                                    '<td class="'.$td_class.'">'.$row["ketab_num"].'</td>'.
                                    '<td class="'.$td_class.'">'.$row["ketab_date"].'</td>'.
                                    '<td class="'.$td_class.'">'.$row["sendfrom"].'</td>'.
                                    '<td class="'.$td_class.'">'.$row["sendto"].'</td>'.
                                    '<td class="'.$td_class.'">'.$row["brief"].'</td>'.
                                    '<td class="'.$td_class.'">'.$row["following_date"].'</td>'.
                                    '<td class="'.$td_class.'">'.$row["sendto_date"].'</td>'.
                                    '<td class="'.$td_class.'">'.$row["result"].'</td>'.
                                    '<td class="'.$td_class.'">'.$row["note"].'</td>';
                                    if ($admin != 3 ){
                                      if($hasPerm_download==1){
                                    if (!empty($row['d_attach'])){ 
                                      $d_attach=$row['d_attach'];                                  
                                        echo '<td><a href="'.$url_host.'/inc/file_upload/file_decrypt.php?path='.$d_attach.'">تنزيل</a></td>';                                
                                  }else {echo '<td class="'.$td_class.'"> لا يوجد مرفقات </td>';} 
                                }
                                  echo  
                                  '<td class="'.$td_class.'">'.$row["dewan_num_reply"].'</td>'.                                   
                                  '<td class="'.$td_class.'">'.$row["dewan_date_reply"].'</td>'. 
                                  '<td class="'.$td_class.'">'.$row["dewan_num_related"].'</td>'.
                                  '<td class="'.$td_class.'">'.$row["dewan_date_related"].'</td>';
                                }
                                if ($admin == 1 || $admin == 7 || $admin==5){
                                  echo '<td class="'.$td_class.'">'.$row["added_by"].'</td>'.
                                  '<td class="noprint">'.$row["add_date"].'</td>';
                                }
                                    echo '</tr>';
                                    //$count++;
                                }
                          ?>
                          
