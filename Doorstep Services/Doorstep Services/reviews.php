<?php
    include_once "scripts/checklogin.php";
    include_once "include/header.php";
    include_once "scripts/DB.php";

    if (!check("admin")) {
        header('Location: logout.php');
        exit();
    }

    $stmt = DB::query("SELECT * FROM review");

    $providers1 = $stmt->fetchAll(PDO::FETCH_OBJ);

?>
<div class="container" style="margin-top: 30px; margin-bottom: 60px;">
    <div class="table-responsive">
        <table class="table">
            <tr>
                
                <th>Name</th>
                <th>Email</th>
                <th>User/Service Provider</th>
                <th>Message</th>
            </tr>
            <?php foreach ($providers1 as $provider): ?>
            <tr>
                
                <td><?= $provider->name; ?>
                </td>
                <td><?= $provider->email; ?>
                </td>
				<td><?= $provider->subject; ?>
                </td>
				<td><?= $provider->message; ?>
                </td>
				
            </tr>
			            <?php endforeach; ?>

        </table>
    </div>
</div>

<?php include_once "include/footers.php";
?>