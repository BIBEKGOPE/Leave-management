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
                     <h4 class="card-title">Department list</h4>
                  </div>
                  <div class="header-title">
                     <button onclick="window.location.href='adddept.php';" class="btn btn-primary">Add Department</button>

                  </div>
               </div>
               <div class="card-body">

                  <div class="table-responsive rounded bg-white">
                     <table class="table mb-0 table-borderless tbl-server-info">
                        <thead>
                           <tr class="ligth">
                              <th scope="col">sl no.</th>
                              <th scope="col">Department name</th>
                              <th scope="col">Action</th>


                        </thead>
                        <tbody>
                           <?php
                           $select = "SELECT * FROM `emp_dept`order by d_id desc ";
                           $qry = mysqli_query($con, $select);
                           $d_id = 1;

                           while ($fetch_emp_dept = mysqli_fetch_assoc($qry)) {


                           ?>
                              <tr>
                                 <th scope="row">
                                    <?= $d_id ?>
                                 </th>

                                 <td>
                                    <?= $fetch_emp_dept['d_name'] ?>
                                 </td>
                                 <td>

                                    <a href="dept_edit.php?d_id=<?php echo $fetch_emp_dept['d_id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                    <a href="dept_del.php?d_id=<?php echo $fetch_emp_dept['d_id']; ?>" class="btn btn-danger btn-sm">Delete</a>


                                 </td>


                              </tr>
                           <?php
                              $d_id++;
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