<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "final_year_project2023";
$con = mysqli_connect($server,$username,$password,$db);
session_start();

?>

<?php


$select = "select * from emp_data,leave_type,emp_dept,emp_desig where  emp_data.emp_email = '$_SESSION[username]'";
$qry = mysqli_query($con, $select);

// fwet
$fetch_emp_data = mysqli_fetch_assoc($qry);
$name = $fetch_emp_data['emp_f_name'] . " " . $fetch_emp_data['emp_m_name'] . " " . $fetch_emp_data['emp_l_name'];

?>

<html>

<head>
    <title>ASTU</title>
    <style>
        table {
            border: 1px solid #150517;
        }
    </style>
    <STYLE TYPE="text/css">
        <!--
        TD {
            font-family: Arial;
            font-size: 12pt;
        }

       
    </STYLE>
    <link rel="stylesheet" href="../assets/css/backend-plugin.min.css">
    <link rel="stylesheet" href="../assets/css/backend.css?v=1.0.0">
    <link rel="stylesheet" href="../assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css">
    <link rel="stylesheet" href="../assets/vendor/remixicon/fonts/remixicon.css">


</head>


<body  onload=window.print() >
    <basefont size="1">
    <!DOCTYPE html
        PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

    </head>

    <body>
        <table style="BORDER-COLLAPSE: collapse" bgcolor="white" border="1" bordercolor="#000000" cellpadding="4"
            cellspacing="-1" width="100%" align="center">

            <tr>
                <td colspan="6" align="center"><img src="../Images/logo.png" width="75px" height="75px" /><br />
                    North Lakhimpur College (A) <br />
                   
                   Employee Leave Record
                </td>
            </tr>
      
              
          
            <tr>
                <td><b>employee Name </b></td>
                <td colspan="6"><?= $name?></td>
            </tr>


            <tr>
                <td><b>Department : </b></td>
                <td colspan="6"><?= $fetch_emp_data['d_name'] ?></td>
            </tr>


            <tr>
                <td><b>Designation</b></td>
                <td colspan="6"><?= $fetch_emp_data['des_name'] ?></td>
            </tr>
          


            <tr>
                <td valign="top"><b>Address :</b></td>
                <td colspan="5"><?= $fetch_emp_data['emp_adres'] ?></td>
            </tr>


            <tr>
                <td> <b>Mobile No. :</b></td>
                <td colspan="5"><?= $fetch_emp_data['emp_mobn'] ?></td>
            </tr>
            <tr>
                <td> <b>E-Mail. :</b> </td>
                <td colspan="5"><?= $fetch_emp_data['emp_email'] ?></td>
            </tr>

        
        </table>
        

        
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-lg-12" >
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

<!-- <div style="margin:20px 50% 50%; align-items:center;" class="print-button">
        <button style="background-color:yellow; color:black;" onload="window.print();">Print Receipt</button>


        </div> -->

    </body>

    </html>
    <!-- onLoad="window.print();" -->
    