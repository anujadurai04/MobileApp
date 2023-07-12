<?php

include '../../layout/header-search.php';
include 'skeleton-search.php';

?>
<style>
	/* Dropdown item */
	.dropdown-item {
		display: flex;
		align-items: center;
		justify-content: space-between;
		padding: 10px;
		color: black;
		cursor: pointer;
		transition: background-color 0.3s ease;
	}

	.dropdown-item:hover {
		background-color: #f0f0f0;
	}

	/* Product name */
	.product-name {
		flex-grow: 1;
		margin-right: 10px;
		color: #000;
		/* Set the default color */
	}

	/* Add button */
	.add-button {
		padding: 5px 10px;
		background-color: #FF6347;
		color: #f0f0f0;
		border: none;
		border-radius: 3px;
		cursor: pointer;
		transition: background-color 0.3s ease;
	}

	.add-button:hover {
		background-color: #FF6347;
	}

	.add-button:disabled {
		/* Styles for the disabled button */
		background-color: #cccccc;
		cursor: not-allowed;
	}

	.dropdown-menu {
		max-height: 80%;
		width: 95%;
		overflow-y: auto;
	}
</style>
<!-- Main Start -->
<main class="main-wrap shop-page">
	<!-- Search Box Start -->
	<div class="search-box">
		<i class="iconly-Search icli search"></i>
		<input class="form-control" type="search" placeholder="Search here..." id="searchInput" />
	</div>

	<!-- Search Box End -->
	<div id="searchResults" class="dropdown-menu">
		<!-- Search results will be dynamically added here -->
	</div>
	<!-- Search Box End -->
</main>
<main class="cart-page mb-xxl">
	<div class="cart-item-wrap pt-0" id="cart-items">


	</div>
</main>
<!-- Main End -->

<div class="modal fade bd-example-modal-sm" id="alertmodal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm modal-dialog-centered">
		<div class="modal-content text-center" style="padding: 20px;">
			<h3 class="title-color">Your cart is Empty</h3>
		</div>
	</div>
</div>
<div class="modal fade" id="deleteModal_confirm" tabindex="-1" role="dialog" aria-labelledby="deletemodal" aria-hidden="true">
	<div class="modal-dialog modal-md modal-dialog-centered" role="document">
		<div class="modal-content text-center">
			<div class="modal-header">
				<h5 class="modal-title" id="deletemodal">Confirm Deletion</h5>
				<button type="button" class="close" id="deletemodalHide" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>Are you sure you want to delete this item?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" id="deletemodalHide1" data-dismiss="modal">No</button>
				<button type="button" class="btn btn-danger" id="confirmDelete">Yes</button>
			</div>
		</div>
	</div>
</div>


<?php include '../../layout/footer-search.php' ?>