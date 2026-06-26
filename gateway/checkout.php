
  
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<?php
session_start();

require 'config.php';
require 'vendor/autoload.php';

use Razorpay\Api\Api;

$name=$_POST['client_name'];
$address = $_POST['present_address'];
$email = $_POST['email'];
$phone = $_POST['ph_no'];
$dob = $_POST['dob'];
$planId = $_POST['selectedPlanId'];
$selectedPlanDetails = $_POST['selectedPlanDetails'];
$selectedAmount = $_POST['selectedAmount'];
$start_date = $_POST['start_date'];
$med_issues = $_POST['medical_issues'];
$em_name = $_POST['em_name'];
$em_address = $_POST['em_address'];
$em_phno = $_POST['em_ph_no'];
$amount =(int) $selectedAmount . "00";

$api = new Api(API_KEY, API_SECRET);

$res = $api->order->create(
    array(
        'amount' => $amount,
        'currency' => 'INR'
        )
);

$_SESSION['temp_data'] = array(
    'name' => $name,
    'address' => $address,
    'phone' => $phone,
    'email' => $email,
    'dob' => $dob,
    'planid' => $planId,
    'plandetails' => $selectedPlanDetails,
    'amount' => $amount,
    'start_date' => $start_date,
    'med_issues' => $med_issues,
    'em_name' => $em_name,
    'em_address' => $em_address,
    'em_phno' => $em_phno
);

$_SESSION['order_id'] = $res['id'];
?>
<form action="<?php echo BASE_URL ?>success.php" method="POST">
<input type="hidden" name="amount" value="<?php echo $amount; ?>">
    <script
        src="https://checkout.razorpay.com/v1/checkout.js"
        data-key="<?php echo API_KEY?>"
        data-amount="<?php echo $amount;?>"
        data-currency="INR"
        data-order_id="<?php echo $res['id']; ?>"
        data-buttontext="Pay <?php echo $amount; ?> with Razorpay"
        data-name="<?php echo COMPANY_NAME; ?>"
        data-image="<?php echo COMPANY_LOGO_URL; ?>"
        data-prefill.name="<?php echo $name; ?>"
        data-prefill.phone="<?php echo $phone; ?>"
        data-theme.color="#c04747">
        total_amount="<?php echo $amount;?>"
    </script>
</form>

<script>
document.addEventListener('DOMContentLoaded', function () {
        // Select the Razorpay button and trigger a click event
        var razorpayButton = document.querySelector('.razorpay-payment-button');
        razorpayButton.click();
        if (razorpayButton) {
            razorpayButton.style.display = 'none';
        }
    });
</script>