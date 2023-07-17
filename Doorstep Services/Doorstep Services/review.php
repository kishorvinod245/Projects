<?php
include_once "./scripts/DB.php";

if (isset($_POST['review'])) {
    

    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
	

    $isReviewCreated = DB::query("INSERT INTO review values(?, ?, ?, ?)", [
            $name,$email,$subject,$message
        ]);
		

    if ($isProviderCreated) {
        header('Location: ./index.php?msg=success');
        exit();
    } else {
        
        header('Location: ./index.php?msg=failed');
        exit();
    }
}
