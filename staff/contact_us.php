<?php
include('header.inc.php');
$sql = "SELECT * FROM contact_us ORDER BY  added_on desc";
$msgs = array();
$res = mysqli_query($conn, $sql)
or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
while($row = mysqli_fetch_array($res)){
    $msgs[] = $row;
}
if(isset($_GET['type']) && $_GET['type'] != ''){
$type = $_GET['type'];
$id = $_GET['id'];
if($type = 'delete'){
   mysqli_query($conn, "DELETE FROM contact_us WHERE message_id = '$id'");
   ?>
   <script>
   window.location.href= 'contact_us.php';
</script>
   <?php
}}
?>
         <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title"> Contact us </h4>
                        
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
               
                                       <th>Message ID</th>
                                       <th>User Name</th>
                                       <th> User email</th>
                                       <th> user number</th>
                                       <th> user enquiry topic</th>
                                       <th> user message</th>
                                       <th> Added on</th>
                                       <th> other options</th>

                                      
                                    </tr>
                                 </thead>
                                 <tbody>
                                     <?php
                                     foreach($msgs as $list){?>
                                     <tr>
                                     <td><?php echo $list['message_id'] ?></td>
                                     <td><?php echo $list['user_name'] ?></td>
                                     <td><?php echo $list['user_email'] ?></td>
                                     <td><?php echo $list['user_number'] ?></td>
                                     <td><?php echo $list['user_EnquiryTopic'] ?></td>
                                     <td><?php echo $list['user_message'] ?></td>
                                     <td><?php echo $list['added_on'] ?></td>
                                     <td>
                                         <?php
                                         echo "<span class='badge badge-edit'><a href='replay_msg.php&id=".$list['message_id']."'>replay </a></span>&nbsp;";
                                         ?>
                                            <?php
                                         echo "<span class='badge badge-delete'><a href='?type=delete&id=".$list['message_id']."'>Delete</a></span>&nbsp;";
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