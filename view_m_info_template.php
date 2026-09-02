
                                     <?php $td_class = "show-read-more"; ?>   
                                        <table  id="" class="example display cell-border compact row-border hover order-column stripe text-center" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>تفاصيل</th>                                                    
                                                    <th>رقم المصدر</th>  
                                                    <th>الاسم المستعار</th> 
                                                    <th>تاريخ التسليم</th>
                                                    <th>اسلوب التعاون</th>  
                                                    <th>المبلغ</th>                                             
                                                    <th>العملة</th>   
                                                    <th>العدد</th>                                               
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
                                  echo'<tr><td class=""> <a href="m_edit_money.php?id='.$row["id"].'"><i style="font-size: 2.5rem" class="zwicon-edit-circle"></i></a></td>';                                                              
                                  echo '<td class="'.$td_class.'">'.$row["masdar_num"].'</td>'.
                                  '<td class="'.$td_class.'">'.$row["fake_name"].'</td>'.
                                  '<td class="'.$td_class.'">'.$row["salary_date"].'</td>'. 
                                  '<td class="'.$td_class.'">'.$row["salary"].'</td>'.
                                  '<td class="'.$td_class.'">'.$row["salary_amount"].'</td>'.                                 
                                  '<td class="'.$td_class.'">'.$row["currency"].'</td>'.
                                  '<td class="'.$td_class.'">'.$row["salary_count"].'</td>'.
                                  '<td class="'.$td_class.'">'.$row["notes"].'</td>';                                           
                                  if ($admin == 1 || $admin == 7 || $admin==5){
                                    echo '<td class="'.$td_class.'">'.$row["added_by"].'</td>'.
                                  '<td class="noprint">'.$row["add_date"].'</td>';
                                  }
                                  echo '</tr>';
                                  //$count++;
                                }
                          ?>
