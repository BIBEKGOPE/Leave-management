<?php
include('includes/nav.php');
?>
<div class="content-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12 col-lg-12">
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">Leave list</h4>
                  </div>
                  <div class="header-title">
                     <button onclick="window.location.href='addleave.php';" class="btn btn-primary">Add Leaves</button>

                  </div>
               </div>
               <div class="card-body">

                  <div class="table-responsive rounded bg-white">
                     <table class="table mb-0 table-borderless tbl-server-info">
                        <thead>
                           <tr class="ligth">
                              <th scope="col">sl no.</th>
                              <th scope="col">leave type</th>
                              <th scope="col">maximum days(limit)</th>
                              <th scope="col">Action</th>

                           </tr>
                        </thead>
                        <tbody>
                           <?php
                           $select = "SELECT * FROM `leave_type` order by l_id desc";
                           $qry = mysqli_query($con, $select);
                           $l_id = 1;

                           while ($fetch_leave_type = mysqli_fetch_assoc($qry)) {
                              //$name = $fetch_employee_leaves['emp_f_name'] . " ". $fetch_employee_leaves['emp_m_name'] ." ". $fetch_employee_leaves['emp_l_name'] ;

                           ?>
                              <tr>
                                 <th scope="row">
                                    <?= $l_id ?>
                                 </th>

                                 <td>
                                    <?= $fetch_leave_type['l_type'] ?>
                                 </td>
                                 <td>
                                    <?= $fetch_leave_type['max_l_day'] ?>
                                 </td>
                                 <td>

                                    <a href="leave_edit.php?l_id=<?php echo $fetch_leave_type['l_id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                    <a href="leave_del.php?l_id=<?php echo $fetch_leave_type['l_id']; ?>" class="btn btn-danger btn-sm">Delete</a>


                                 </td>

                              </tr>
                           <?php
                              $l_id++;
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
<?php
include('includes/footer.php')
?>