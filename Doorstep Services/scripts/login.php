<?php

require_once 'session.php';
require_once 'DB.php';
require_once 'helpers.php';

if (isset($_POST['login'])) {
    $input = clean($_POST);

    $contact = $input['contact'];
    $password = $input['password'];

    if ($contact == "7070808080" && $password == "admin123") {
        $s = new stdClass();
        $s->name = "admin";
        $_SESSION['user'] = $s;

        header('Location: ../admin.php');
        exit();
    } else {
        $stmt = DB::query(
            "SELECT * FROM providers WHERE contact=? AND password=?",
            [$contact , $password]
        );
        $provider = $stmt->fetch(PDO::FETCH_OBJ);
		//print_r($provider);
		//print_r($provider->id);

        if (isset($provider->name)) {
          $_SESSION['user'] = $provider;
		 // print_r($_SESSION['user']->id);
           header('Location: ../Sdirect.php');
            exit();
        } else {
          header('Location: ../login.php?msg=failed');
            exit();
        }
    }
}
