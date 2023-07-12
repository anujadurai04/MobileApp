<?php

include '../../layout/header-others.php';
include 'skeleton-orders.php';

?>

<!-- Main Start -->
<main class="main-wrap index-page">
	<ul class="nav nav-tab nav-pills custom-scroll-hidden">
		<h3 class="title-color">My Orders</h3>
	</ul>
</main>
<!-- Main End -->
<main class="cart-page mb-xxl">
	<div class="cart-item-wrap pt-0" id="cart-items">

	</div>
</main>

<div class="modal fade bd-example-modal-sm" id="alertmodal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm modal-dialog-centered">
		<div class="modal-content text-center" style="padding: 20px;">
			<h3 class="title-color">Your cart is Empty</h3>
		</div>
	</div>
</div>

<?php include '../../layout/footer-order.php' ?>