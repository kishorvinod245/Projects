<?php

include_once "./include/header.php";
include_once "./scripts/DB.php";

if (!isset($_GET['provider'])) {
    header('Location: index.php');
    exit();
}

$provider = DB::query("SELECT * FROM providers WHERE id=?", [$_GET['provider']])->fetch(PDO::FETCH_OBJ);

if ($provider === false) {
    header('Location: index.php');
    exit();
}

include_once "msg/booking.php";

?>


 <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>


<div  id="booking" class="container" style="margin-top: 30px;">
    <div class="card text-center">
        <div class="card-header">
		            <h2>Doorstep Services</h2>

            <h3>Details About Your Booked Service Provider <?= $provider->name; ?></h3>
        </div>
        <div class="container" style="margin-top: 30px;">
            <div class="row">
                <div class="col">
                    <img style="height: 250px"
                        src="images/<?= $provider->photo; ?>">
                </div>
            </div>
        </div>

        <div  class="card-body">
		

            <table class="table">
                <tr>
                    <th>Name</th>
                    <td>
                        <?= $provider->name; ?>
                    </td>
                    <th>Profession</th>
                    <td>
                        <?= $provider->profession;?>
                    </td>
                </tr>
                <tr>
                    <th>Address & Contact</th>
                    <td>
                        <?= $provider->adder1; ?>,
                      <!--  <?= $provider->adder2; ?>-->
					    <?= $provider->contact; ?>

                    </td>
                    <th>City</th>
                    <td>
                        <?= $provider->city; ?>
                    </td>
                </tr>
			
            </table>
        </div>

    </div>
</div>
<button onClick="pdf();"  style="margin-top: 30px" class="btn btn-block btn-primary">Print Confirmation Slip</button>

<script>
    function pdf(){
        const bill = document.getElementById("booking");
        html2pdf().from(bill).save("Booking Detailss")
	
    }
	
</script>
