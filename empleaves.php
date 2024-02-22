<?php
include('includes/nav.php');

if (isset($_POST['updt_stat_hod'])) {
   $stat = $_POST['stat'];
   $hod = $_POST['hod'];
   $recd_id = $_POST['recd_id'];
   $comment = $_POST['comment']; 
   
   $update = "UPDATE `employee_leaves` SET `status`='$stat', `forward_status` = '$hod', `coment` = '$comment' WHERE recd_id = $recd_id";
   $q = mysqli_query($con, $update);
   if ($q) {
?>
      <script>
         alert("Status updated successfully");
         location.href = "empleaves.php";
      </script>

   <?php
   } else {
   ?>
      <script>
         alert("Status Not updated successfully");
         location.href = "empleaves.php";
      </script>

   <?php
   }
}


if (isset($_POST['updt_stat_princi'])) {
   $stat = $_POST['stat'];
   $princi = $_POST['princi'];
   $recd_id = $_POST['recd_id'];
   $comment = $_POST['comment']; 
   
   $update = "UPDATE `employee_leaves` SET `status`='$stat', `forward_status` = '$princi', `prin_coment` = '$comment' WHERE recd_id = $recd_id";
   $q = mysqli_query($con, $update);
   if ($q) {
   ?>
      <script>
         alert("Status updated successfully");
         location.href = "empleaves.php";
      </script>

   <?php
   } else {
   ?>
      <script>
         alert("Status Not updated successfully");
         location.href = "empleaves.php";
      </script>

   <?php
   }
}
?>
<div class="content-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12 col-lg-12">
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">Tables</h4>
                  </div>
               </div>
               <div class="card-body">
                  <p>Employee leaves </p>
                  <div class="table-responsive rounded bg-white">
                     <table class="table mb-0 table-borderless tbl-server-info">
                        <thead>
                           <tr class="ligth">
                              <th scope="col">sl no.</th>
                              <th scope="col">employee name</th>
                              <th scope="col">leave id</th>
                              <th scope="col">from</th>
                              <th scope="col">to</th>
                              <th scope="col">description</th>
                              <th scope="col">status</th>
                              <th scope="col">action</th>
                             
                             
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                           $select = "SELECT * FROM `employee_leaves`, emp_data, leave_type where emp_data.emp_id =employee_leaves.emp_id and leave_type.l_id =employee_leaves.l_id";
                           $qry = mysqli_query($con, $select);
                           $recd_id = 1;

                           while ($fetch_employee_leaves = mysqli_fetch_assoc($qry)) {
                              $name = $fetch_employee_leaves['emp_f_name'] . " " . $fetch_employee_leaves['emp_m_name'] . " " . $fetch_employee_leaves['emp_l_name'];
                              $q1 = mysqli_query($con, "select * from  emp_data, role where emp_data.role_id = role.role_id and emp_data.emp_email = '$_SESSION[username]'");
                              $fet = mysqli_fetch_assoc($q1);
                              if ($fet['name'] == 'pinky' && $fetch_employee_leaves['forward_status'] == 'hod') {
                                 if ($fetch_employee_leaves['status'] != 'reject') {
                           ?>
                                    <tr>
                                       <th scope="row">
                                          <?= $recd_id ?>
                                       </th>
                                       <td>
                                          <?= $name ?>
                                       </td>
                                       <td>
                                          <?= $fetch_employee_leaves['l_type'] ?>
                                       </td>
                                       <td>
                                          <?= $fetch_employee_leaves['r_from'] ?>
                                       </td>
                                       <td>
                                          <?= $fetch_employee_leaves['r_to'] ?>
                                       </td>
                                       <td>
                                          <?= $fetch_employee_leaves['des'] ?>
                                       </td>
                                       <td> <?= $fetch_employee_leaves['status'] ?></td>
                                       <td>
                                          <form action="" method="post">
                                             <select name="stat" id="" class="form-control">
                                                <option value="approved">Approved</option>
                                                <option value="pending">Pending</option>
                                                <option value="reject">Reject</option>
                                             </select>

                                             <input type="hidden" name="recd_id" value="<?= $fetch_employee_leaves['recd_id'] ?>">
                                             <input type="hidden" name="princi" value="princi">
                                             <textarea name="comment" class="form-control"></textarea> 

                                             <button name="updt_stat_princi" class="btn btn-primary mt-3">Submit</button>
                                          </form>
                                       </td>
                                      
                                    </tr>
                           <?php
                                    $recd_id++;
                                 }
                              } elseif ($fet['name'] == 'hod' && $fetch_employee_leaves['forward_status'] == 'applied') {
                                 $id = $fetch_employee_leaves['d_id'];
                                 $select12 = "select * from emp_data,emp_dept where emp_data.d_id = emp_dept.d_id and emp_data.emp_email = '$_SESSION[username]' and emp_data.d_id = $id";
                                 $qry12 = mysqli_query($con, $select12);
                                 $fetch_role = mysqli_fetch_assoc($qry12);
                                 if ($fetch_role) {
                           ?>
                                    <tr>
                                       <th scope="row">
                                          <?= $recd_id ?>
                                       </th>
                                       <td>
                                          <?= $name ?>
                                       </td>
                                       <td>
                                          <?= $fetch_employee_leaves['l_type'] ?>
                                       </td>
                                       <td>
                                          <?= $fetch_employee_leaves['r_from'] ?>
                                       </td>
                                       <td>
                                          <?= $fetch_employee_leaves['r_to'] ?>
                                       </td>
                                       <td>
                                          <?= $fetch_employee_leaves['des'] ?>
                                       </td>
                                       <td> <?= $fetch_employee_leaves['status'] ?></td>
                                       <td>
                                          <form action="" method="post">
                                             <select name="stat" id="" class="form-control">
                                                <option value="forward">Forward</option>
                                                <option value="reject">Reject</option>
                                             </select>

                                             <input type="hidden" name="recd_id" value="<?= $fetch_employee_leaves['recd_id'] ?>">
                                             <input type="hidden" name="hod" value="hod">
                                             <textarea name="comment" class="form-control"></textarea> 

                                             <button name="updt_stat_hod" class="btn btn-primary mt-3">Submit</button>
                                          </form>
                                       </td>
                                    
                                    </tr>
                           <?php
                                    $recd_id++;
                                 }
                              }
                           }
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
<?php include('includes/footer.php'); ?>
