<?php

include('Header_Admin.php');
include('conn.php');
include('Footer.php');


$result = mysqli_query($conn, 'SELECT * FROM doc_app');


function generateActionLinks($row) {
    $acceptLink = '';
    if ($row['action'] !== 'Accepted') {
        $acceptLink = '<a href="accept_app.php?app_id=' . $row['app_id'] . '" onClick="return confirm(\'Accept appointment ID->' . $row['app_id'] . '\npatient name-> '. $row['p_full_name'] . '\npatient id-> '. $row['p_id'] . '\nrequest?\');">Accept</a>';
    }
    $deleteLink = '<a href="delete_app.php?app_id=' . $row['app_id'] . '" onClick="return confirm(\'Delete appointment ID->' . $row['app_id'] . '\npatient name-> '. $row['p_full_name'] . '\npatient id-> '. $row['p_id'] . '\nrequest?\');">Delete</a>';
    return $acceptLink . ' | ' . $deleteLink;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Appointment Details</title>
    <link rel="stylesheet" href="app_list.css">
</head>
<body>
    <h2>Schedule</h2>

    <div class="container">
        <a href="Index_Admin.php" class="delete-button">Back to main page</a>
    </div>

    <div>
        <table>
            <tr>
                <th>Patient Name</th>
                <th>Patient ID</th>
                <th>Appointment ID</th>
                <th>Appointment Date</th>
                <th>Appointment Time</th>
                <th>Appointment Reason</th>
                <th>Current Process</th>
                <th>Action</th>
            </tr>

            <?php while ($row = mysqli_fetch_array($result)) { ?>
            <tr>
                <td><?= $row['p_full_name'] ?></td>
                <td><?= $row['p_id'] ?></td>
                <td><?= $row['app_id'] ?></td>
                <td><?= $row['appdate'] ?></td>
                <td><?= $row['apptime'] ?></td>
                <td><?= $row['appreason'] ?></td>
                <td><?= $row['action'] ?></td>
                <td><?= generateActionLinks($row) ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>


    <?php mysqli_close($conn) ?>
</body>
</html>