<?php
    include_once "scripts/checklogin.php";
    include_once "include/header.php";
    include_once "scripts/DB.php";

    if (!check("admin")) {
        header('Location: logout.php');
        exit();
    }

    $stmt = DB::query("SELECT * FROM tbl_user");

    $providers1 = $stmt->fetchAll(PDO::FETCH_OBJ);

?>
<div class="container" style="margin-top: 30px; margin-bottom: 60px;">
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Contact</th>
                <th>Address</th>
				<th>Date</th>

            </tr>
            <?php foreach ($providers1 as $provider): ?>
            <tr>
                
                <td><?= $provider->fname; ?>
                </td>
                <td><?= $provider->lname; ?>
                </td>
				<td><?= $provider->contact; ?>
                </td>
				<td><?= $provider->adder; ?>
                </td>
					<td><?= $provider->date; ?>
                </
				
            </tr>
			            <?php endforeach; ?>

        </table>
    </div>
</div>

<?php include_once "include/footers.php";
?>