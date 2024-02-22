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
                            <h4 class="card-title">Your Leave Report</h4>
                        </div>
                        <div class="header-title">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive rounded bg-white">
                            <table class="table mb-0 table-borderless tbl-server-info">
                                <thead>
                                    <tr class="ligth">
                                        <th scope="col">sl no.</th>
                                        <th scope="col">leave type</th>
                                        <th scope="col">Max Allowable</th>
                                        <th scope="col">Available Leaves</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $select = "SELECT * FROM leave_type";
                                    $qry = mysqli_query($con, $select);
                                    $l_id = 1;

                                    while ($fetch_employee_leaves = mysqli_fetch_assoc($qry)) {

                                        $leaveTypeId = $fetch_employee_leaves['l_id'];

                                        $sql = "SELECT SUM(nod) AS total_leaves FROM employee_leaves WHERE emp_id IN (SELECT emp_id FROM emp_data WHERE emp_email = '$_SESSION[username]') AND l_id = $leaveTypeId AND status = 'approved' AND forward_status = 'princi'";
                                        $result = mysqli_query($con, $sql);
                                        $row = mysqli_fetch_assoc($result);

                                        $totalLeaves = $row['total_leaves'];
                                        $maxAllowableLeaves = $fetch_employee_leaves['max_l_day'];
                                        $availableLeaves = $maxAllowableLeaves - $totalLeaves;
                                    ?>
                                        <tr>
                                            <th scope="row">
                                                <?= $l_id ?>
                                            </th>
                                            <td>
                                                <?= $fetch_employee_leaves['l_type'] ?>
                                            </td>
                                            <td>
                                                <?= $maxAllowableLeaves ?>
                                            </td>
                                            <td>
                                                <?= $availableLeaves ?>
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
include('includes/footer.php');
?>
