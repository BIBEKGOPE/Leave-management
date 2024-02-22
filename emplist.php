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
                     <h4 class="card-title">Emploee list</h4>
                  </div>
                  <div class="header-title">
                     <button onclick="window.location.href='addemp.php';" class="btn btn-primary">Add Employee</button>

                  </div>
               </div>
               <div class="card-body">
                  <p>Employees </p>
                  <div class="table-responsive rounded bg-white">
                     <table class="table mb-0 table-borderless tbl-server-info">
                        <thead>
                           <tr class="ligth">
                              <th scope="col">sl no.</th>
                              <th scope="col">employee name</th>
                              <th scope="col">employee email</th>
                              <th scope="col">employee phone no.</th>
                              <th scope="col">Addres</th>
                              <th scope="col">Registration date</th>
                              <th scope="col">Action</th>

                        </thead>
                        <tbody>
                           <?php
                           $select = "SELECT * FROM `emp_data`order by emp_id desc";
                           $qry = mysqli_query($con, $select);
                           $emp_id = 1;

                           while ($fetch_emp_data = mysqli_fetch_assoc($qry)) {
                              $name = $fetch_emp_data['emp_f_name'] . " " . $fetch_emp_data['emp_m_name'] . " " . $fetch_emp_data['emp_l_name'];

                           ?>
                              <tr>
                                 <th scope="row">
                                    <?= $emp_id ?>
                                 </th>
                                 <td>
                                    <?= $name ?>
                                 </td>
                                 <td>
                                    <?= $fetch_emp_data['emp_email'] ?>
                                 </td>
                                 <td>
                                    <?= $fetch_emp_data['emp_mobn'] ?>
                                 </td>
                                 <td>
                                    <?= $fetch_emp_data['emp_adres'] ?>
                                 </td>
                                 <td>
                                    <?= $fetch_emp_data['emp_rgdate'] ?>
                                 </td>
                                 <td>

                                    <a href="editempdetail.php?emp_id=<?php echo $fetch_emp_data['emp_id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                    <a href="emp-del.php?emp_id=<?php echo $fetch_emp_data['emp_id']; ?>" class="btn btn-danger btn-sm">Delete</a>


                                 </td>

                              </tr>
                           <?php
                              $emp_id++;
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