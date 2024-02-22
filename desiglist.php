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
                     <h4 class="card-title">Designation list</h4>
                  </div>
                  <div class="header-title">
                     <button onclick="window.location.href='adddesig.php';" class="btn btn-primary">Add Designation</button>

                  </div>
               </div>
               <div class="card-body">

                  <div class="table-responsive rounded bg-white">
                     <table class="table mb-0 table-borderless tbl-server-info">
                        <thead>
                           <tr class="ligth">
                              <th scope="col">sl no.</th>
                              <th scope="col">Designation/Post name</th>
                              <th scope="col">Action</th>


                        </thead>
                        <tbody>
                           <?php
                           $select = "SELECT * FROM `emp_desig`order by des_id desc";
                           $qry = mysqli_query($con, $select);
                           $des_id = 1;

                           while ($fetch_emp_desig = mysqli_fetch_assoc($qry)) {


                           ?>
                              <tr>
                                 <th scope="row">
                                    <?= $des_id ?>
                                 </th>

                                 <td>
                                    <?= $fetch_emp_desig['des_name'] ?>
                                 </td>
                                 <td>

                                    <a href="des_edit.php?des_id=<?php echo $fetch_emp_desig['des_id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                    <a href="des_del.php?des_id=<?php echo $fetch_emp_desig['des_id']; ?>" class="btn btn-danger btn-sm">Delete</a>


                                 </td>


                              </tr>
                           <?php
                              $des_id++;
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