
                                     <?php $td_class = "show-read-more"; ?>   
                                        <table  id="" class="example display cell-border compact row-border hover order-column stripe text-center" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>تفاصيل</th>                                                    
                                                    <th>رقم المصدر</th>  
                                                    <th>الاسم المستعار</th> 
                                                    <th>التاريخ</th>  
                                                    <th>نوع الحالة</th>                                              
                                                    <th>السبب</th>
                                                    <th>رقم الكتاب</th>
                                                    <th>تاريخ الكتاب</th>
                                                    <th>ملاحظات</th>
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
                                  echo'<tr><td class=""> <a href="m_edit_date.php?id='.$row["id"].'"><i style="font-size: 2.5rem" class="zwicon-edit-circle"></i></a></td>';                                                              
                                  echo '<td class="'.$td_class.'">'.$row["masdar_num"].'</td>'.
                                  '<td class="'.$td_class.'">'.$row["fake_name"].'</td>'.
                                  '<td class="'.$td_class.'">'.$row["date"].'</td>'. 
                                  '<td class="'.$td_class.'">'.$row["date_type"].'</td>'.
                                  '<td class="'.$td_class.'">'.$row["reason"].'</td>'.
                                  '<td class="'.$td_class.'">'.$row["ketab_num"].'</td>'. 
                                  '<td class="'.$td_class.'">'.$row["ketab_date"].'</td>'.                            
                                  '<td class="'.$td_class.'">'.$row["notes"].'</td>';                                           
                                  if ($admin == 1 || $admin == 7 || $admin==5){
                                    echo '<td class="'.$td_class.'">'.$row["added_by"].'</td>'.
                                  '<td class="noprint">'.$row["add_date"].'</td>';
                                  }
                                  echo '</tr>';
                                  //$count++;
                                }
                          ?>
