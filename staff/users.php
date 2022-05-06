<?php
include('header.inc.php');
$seqID = 1;
$sql = "SELECT * FROM end_users ORDER BY `name` asc";
$msgs = array();
$res = mysqli_query($conn, $sql)
or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
while($row = mysqli_fetch_array($res)){
    $users[] = $row;
}
if(isset($_GET['type']) && $_GET['type'] != ''){
$id = clean($conn, $_GET['id']);
$type = clean($conn, $_GET['type']);
if($type=='delete'){
   $sql = "DELETE FROM end_users where user_id = '$id'";
   $res = mysqli_query($conn, $sql)
   or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
   
}}
?>
         <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title"> Users </h4>
            
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
               
                                       <th>user_id</th>
                                       <th>name</th>
                                       <th> email</th>
                                       <th> password</th>
                                       <th> other options</th>

                                      
                                    </tr>
                                 </thead>
                                 <tbody>
                                     <?php
                                     foreach($users as $list){?>
                                     <tr>
                                     <td><?php echo $seqID++ ?></td>
                                     <td><?php echo $list['name'] ?></td>
                                     <td><?php echo $list['email'] ?></td>
                                     <td><?php echo $list['password'] ?></td>
                                     <td>
                                            <?php
                                         echo "<span class='badge badge-delete'><a href='?type=delete&id=".$list['user_id']."'>Delete</a></span>&nbsp;";
                                         ?>
                                     </td>
                                     </tr>

                                  <?php   }
                                     ?>
                                   
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
		  </div>
         <div class="clearfix"></div>
<?php
include('footer.inc.php');
?>