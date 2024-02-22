<?php
include('includes/nav.php');
?>
<div class="content-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12 col-lg-12">
            <div class="card">
               <?php
               $select = "SELECT * FROM `emp_data` inner join `employee_leaves` on emp_data.emp_id = employee_leaves.emp_id where emp_email='$_SESSION[username]'";
               $q = mysqli_query($con, $select);
               if (mysqli_num_rows($q) != 0) {
               ?>


                  <div class="card-header d-flex justify-content-between">
                     <div class="header-title">
                        <h4 class="card-title">Tables</h4>
                     </div>
                  </div>
                  <div class="card-body">
                     <p>My leaves </p>
                     <div class="table-responsive rounded bg-white">
                        <table class="table mb-0 table-borderless tbl-server-info">
                           <thead>
                              <tr class="ligth">
                                 <th scope="col">sl no.</th>
                                 <th scope="col">leave id</th>
                                 <th scope="col">from</th>
                                 <th scope="col">to</th>
                                 <th scope="col">description</th>
                                
                                 <th scope="col">Principal Approval</th>
                                
                                 <th scope="col">Principal comment</th>

                           </thead>

                           <tbody>
                              <?php
                              $select = "SELECT * FROM emp_data,`employee_leaves`,  leave_type where  leave_type.l_id =employee_leaves.l_id and emp_data.emp_id = employee_leaves.emp_id and emp_data.emp_email = '$_SESSION[username]'";
                              $qry = mysqli_query($con, $select);
                              $recd_id = 1;

                              while ($fetch_employee_leaves = mysqli_fetch_assoc($qry)) {


                              ?>
                                 <tr>
                                    <th scope="row">
                                       <?= $recd_id ?>
                                    </th>
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
                                    
                                    <td>
                                       <?php
                                       if ($fetch_employee_leaves['forward_status'] == 'princi') {

                                       ?>
                                          Approved
                                       <?php } else{
                                          ?>
                                          Pending

                                          <?php
                                       }
                                          ?>
                                    </td>
                                   
                                    <td>
                                       <?= $fetch_employee_leaves['prin_coment'] ?>
                                    </td>

                                 </tr>
                              <?php

                                 $recd_id++;
                              }
                              ?>
                           </tbody>
                        </table>
                     </div>

                  </div>
               <?php

               } else {
               ?>
                  <p>Not Applied leaves</p>
               <?php
               }
               ?>
            </div>
         </div>
      </div>
   </div>
</div>
<?php
include('includes/footer.php')
?>