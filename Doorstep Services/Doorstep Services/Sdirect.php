<?php

session_start();
include_once "scripts/checklogin.php";

include_once "include/header.php";

if (!check()) {
    header('Location: logout.php');
    exit();
}

$provider = $_SESSION['user'];

?>
<body >

 <div class="container" style="margin-top: 30px; margin-bottom: 30px;">
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <h4 class="text-center" align="center" ><a  href="provider.php"><br>Update Information</a></h4>
				<h4 class="text-center" align="center">	<a  href="viewbooking.php"><br>View Customer Bookings</a></h4>

            </div>
</div>
</div>
</div>
</body>
<?php include_once "./include/footers.php";?>

