<?php

include '../../layout/header-others.php';
include 'skeleton-shop.php';

$orderId = $_GET['odt'];
$mobileNumber = $_GET['mobile'];

$orderdetails = mysqli_query($link, "SELECT b.status_name,a.jdm_on_id,DATE_FORMAT(a.jdm_on_timestamp, '%d/%m/%Y') as order_date,a.order_amount FROM `jdm_order_num` as a INNER JOIN jdm_order_status as b on a.jdm_on_status=b.id WHERE a.jdm_on_userid = (SELECT user_id from gdm_app_users where user_phone= '$mobileNumber') AND a.jdm_on_id='$orderId'");

while ($row = mysqli_fetch_assoc($orderdetails)) {
	$jdm_on_id = $row['jdm_on_id'];
	$order_date = $row["order_date"];
	$order_amount = $row["order_amount"];
	$StatusName = $row["status_name"];
}
?>

<main class="main-wrap order-detail mb-xxl">
	<!-- Banner Start -->
	<section class="pt-0">
		<div class="banner-box">
			<div class="media">
				<img src="../../../assets/icons/svg/box.svg" alt="box" />
				<div class="media-body">
					<span class="font-sm">Order ID: #<?php echo $orderId; ?></span>
					<h2><?php echo $StatusName; ?></h2>
				</div>
			</div>
		</div>
	</section>
	<!-- Banner End -->

	<!-- Item Section Start -->
	<section class="item-section p-0">
		<h3 class="font-theme font-md">Items:</h3>

		<div class="item-wrap">
			<?php
			$productDetails = mysqli_query($link, "SELECT gdm_prod_name,jdm_order_qty,product_price FROM `jdm_order` as a INNER JOIN gdm_products as b on a.jdm_order_prod_id=b.gdm_prod_id INNER JOIN jdm_order_num as c on a.jdm_order_uniqid=c.jdm_on_uniqid WHERE jdm_order_userid= (SELECT user_id from gdm_app_users where user_phone= '$mobileNumber') AND c.jdm_on_id='$orderId'");

			while ($row = mysqli_fetch_assoc($productDetails)) {
				$gdm_prod_name = $row['gdm_prod_name'];
				$jdm_order_qty = $row["jdm_order_qty"];
				$product_price = $row["product_price"];
			?>

				<!-- Item Start -->
				<a href="#" class="media">
					<div class="media-body" style="width:50%;">
						<h4 class="title-color font-sm"><?php echo $gdm_prod_name; ?></h4>
						<!-- <span class="content-color font-sm">500g</span> -->
					</div>
					<div class="count">
						<i data-feather="x"></i>
						<span class="font-sm"><?php echo $jdm_order_qty; ?></span>

					</div>
					<span class="title-color font-md">$<?php echo $product_price; ?></span>
				</a>
			<?php } ?>
			<!-- Item End -->
		</div>
	</section>
	<!-- Item Section End -->

	<!-- Order Summary Section Start -->
	<section class="order-summary p-0">
		<!-- Product Summary Start -->
		<ul style="width:95%">
			<li>
				<span>Total Amount</span>
				<span>$<?php echo $order_amount; ?></span>
			</li>
		</ul>
		<!-- Product Summary End -->
	</section>
	<!-- Order Summary Section End -->

</main>

<div class="modal fade bd-example-modal-sm" id="alertmodal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm modal-dialog-centered">
		<div class="modal-content text-center" style="padding: 20px;">
			<h3 class="title-color">Your cart is Empty</h3>
		</div>
	</div>
</div>
<?php include '../../layout/footer-order.php' ?>