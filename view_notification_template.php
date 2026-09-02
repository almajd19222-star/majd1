
                                        <table  id="" class="example display cell-border compact row-border hover order-column stripe text-center">
                                            <thead>
                                                <tr>
                                                    <th>تفاصيل</th> 
                                                    <th>تاريخ الرد المتوقع</th>  
                                                    <th>الجهة المرسلة</th>
                                                    <th>الجهة المرسل إليها</th>                                    
                                                    <th>نص التنبيه</th>                                                    
                                                    <th>نوع التنبيه</th>                                                    
                                                    <th>حالة التنبيه</th>   
                                                                                                
                                                  
                                                </tr>
                                            </thead>
                                            <tbody>
                                <?php
                                while($row = mysqli_fetch_assoc($result)) {                                    
                                      $e_id=$row['e_id'];
                                      $details_type=$row['details_type'];
                                      $resala_type=$row['resala_type'];
                                      $jeha = $row['jeha'];
                                      $insert_year= $row['e_year'];

                                    echo '<tr>';
                                  if(($admin == 1 || $admin == 7 || $admin==5) && $row["type"]== $resala_type){
                                    echo'<td> <a href="notify_function.php?id='.$row["id"].'"><i style="font-size: 2.5rem" class="zwicon-edit-circle"></i></a></td>'; 
                                  }elseif($row["type"]=='ديوان'){
                                    echo'<td> <a href="notify_function.php?id='.$row["id"].'"><i style="font-size: 2.5rem" class="zwicon-edit-circle"></i></a></td>';
                                  }elseif($row["type"]=='موقوف'){
                                    echo'<td> <a href="notify_function.php?id='.$row["id"].'"><i style="font-size: 2.5rem" class="zwicon-edit-circle"></i></a></td>';
                                  }else{
                                    echo'<td></td>'; 
                                  }
                                                         
                                    echo     
                                    '<td>'.$row["r_following_date"].'</td>'.             
                                    '<td>'.$row["sendfrom"].'</td>'.             
                                    '<td>'.$row["sendto"].'</td>'.
                                    '<td>'.$row["r_follow"].'</td>'.
                                    '<td>'.$row["type"].'</td>';
                                    if($row["status"]=="unread"){
                                    echo '<td>غير مقروء</td>';
                                    }else{
                                      echo'<td>مقروء</td>';
                                    }
                                    ;                                 
                                
                                    echo '</tr>';
                                    //$count++;
                                }
                          ?>
