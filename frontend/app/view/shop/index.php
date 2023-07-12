<?php

include '../../layout/header-shop.php';
include 'skeleton-shop.php';

$catSQL = mysqli_query($link, "SELECT * FROM jdm_category");
$brandSQL = mysqli_query($link, "SELECT * FROM gdm_products INNER JOIN jdm_brand on gdm_prod_brand_id=jdm_brand_id GROUP by jdm_brand_name order by jdm_brand_id asc");
$catTabSQL = mysqli_query($link, "SELECT * FROM jdm_category");
?>
<style>
	.hideactive {
		display: none;
	}
</style>
<!-- Main Start -->
<main class="main-wrap shop-page mb-xxl">
	<!-- Catagories Tabs Start -->
	<ul class="nav nav-tab nav-pills custom-scroll-hidden" id="pills-tab" role="tablist">
		<?php
		if (mysqli_num_rows($catSQL) > 0) {
			// Get the catID value from the URL
			$catIDURL = isset($_GET['catID']) ? intval($_GET['catID']) : 1;
			$brandIDURL = isset($_GET['brand']) ? intval($_GET['brand']) : 1;
			// output data of each row
			while ($row = mysqli_fetch_assoc($catSQL)) {
				$catID = $row['jdm_cate_id'];
				$catName = $row["jdm_cate_name"];
				$catActive = $row["jdm_cate_active"];
				$catImage = $row['jdm_cat_image'];
		?>
				<li class="nav-item" role="presentation">
					<button class="nav-link <?php if ($catID == $catIDURL) { ?>active<?php } ?>" id="<?php echo $catID ?>-tab" data-bs-toggle="pill" data-bs-target="#catagories-<?php echo $catID ?>" type="button" role="tab" aria-controls="catagories-<?php echo $catID ?>" aria-selected="<?php echo ($catID == $catIDURL) ? 'true' : 'false'; ?>" onclick="updatecatURL(<?php echo $catID ?>)">
						<?php echo $catName ?>
					</button>
				</li>
		<?php
			}
		}
		?>
	</ul>
	<!-- Catagories Tabs End -->

	<!-- Brand Tabs Start -->
	<ul class="nav nav-tab nav-pills custom-scroll-hidden" id="pills-tab" role="tablist">
		<?php
		if (mysqli_num_rows($brandSQL) > 0) {
			// output data of each row
			while ($row = mysqli_fetch_assoc($brandSQL)) {
				$jdm_brand_id = $row['jdm_brand_id'];
				$jdm_brand_name = $row['jdm_brand_name'];
		?>
				<li class="nav-item" role="presentation">
					<button class="nav-link <?php if ($jdm_brand_id == $brandIDURL) { ?>active<?php } ?>" id="sub<?php echo $jdm_brand_id ?>-tab" data-bs-toggle="pill" data-bs-target="#brandid-<?php echo $jdm_brand_id ?>" type="button" role="tab" aria-controls="brandid-<?php echo $jdm_brand_id ?>" aria-selected="<?php echo ($subcatID == $jdm_brand_id) ? 'true' : 'false'; ?>" onclick="updatebrandURL(<?php echo $jdm_brand_id ?>)">
						<?php echo $jdm_brand_name ?>
					</button>
				</li>
		<?php
			}
		}
		?>
	</ul>
	<!-- Brand Tabs End -->

	<!-- Tab Content Start -->
	<div class="tab-content ratio2_1" id="pills-tabContent">
		<?php
		if (mysqli_num_rows($catTabSQL) > 0) {
			// output data of each row
			while ($row = mysqli_fetch_assoc($catTabSQL)) {
				$catID = $row['jdm_cate_id'];
				$catName = $row["jdm_cate_name"];
				$catActive = $row["jdm_cate_active"];
				$catImage = $row['jdm_cat_image'];

		?>
				<!-- Catagories Content Start -->
				<div class="tab-pane hai fade <?php if ($catID == $catIDURL) { ?>show active<?php } else { ?>hideactive <?php } ?>" id="catagories-<?php echo $catID ?>" role="tabpanel" aria-labelledby="<?php echo $catID ?>-tab">
					<?php
					$brandTabSQL = mysqli_query($link, "SELECT * FROM gdm_products INNER JOIN jdm_brand on gdm_prod_brand_id=jdm_brand_id WHERE gdm_prod_cat_id='$catID'");
					if (mysqli_num_rows($brandTabSQL) > 0) {
						// output data of each row
						while ($row = mysqli_fetch_assoc($brandTabSQL)) {
							$jbrand_id = $row['jdm_brand_id'];
							$jbrand_name = $row['jdm_brand_name'];
					?>
							<div class="tab-pane hai fade <?php if ($jbrand_id == $brandIDURL) { ?>show active<?php } else { ?>hideactive <?php } ?>" id="brandid-<?php echo $jbrand_id ?>" role="tabpanel" aria-labelledby="brand<?php echo $jbrand_id ?>-tab">
								<?php
								$prodSQL = mysqli_query($link, "SELECT * FROM gdm_products INNER JOIN jdm_brand on gdm_prod_brand_id=jdm_brand_id WHERE gdm_prod_cat_id = '$catIDURL' AND gdm_prod_brand_id='$brandIDURL'");
								if (mysqli_num_rows($prodSQL) > 0) {
									// output data of each row
									while ($row = mysqli_fetch_assoc($prodSQL)) {
										$proID = $row['gdm_prod_id'];
										$proName = $row['gdm_prod_name'];
										$prodPrice = $row['gdm_prod_price'];
										$prodOffer = $row['gdm_prod_offer'];
										$productimg = $row['gdm_prod_image'];
										$minproduct = $row['gdm_prod_min_qty'];

										if ($productimg == '') {
											$imageFproduct = '../../../assets/images/product/no-image.png';
										} else {
											$imageFproduct = $imageLink . $productimg;
										}
								?>

										<div class="product-list media" data-product-id="<?php echo $proID ?>">
											<a href="../product/?pid=<?php echo $proID ?>"><img id="productimg-<?php echo $proID ?>" src="<?php echo $imageFproduct ?>" alt="offer" /></a>
											<div class="media-body">
												<input type="hidden" id="product_name-<?php echo $proID ?>" value="<?php echo $proName ?>" />
												<a href="../product/?pid=<?php echo $proID ?>" class="font-sm"> <?php echo $proName ?> </a>

												<?php if ($prodOffer == 0) { ?>
													<span class="title-color font-sm">₹ <?php echo $prodPrice ?></span>
													<input type="hidden" id="product_price-<?php echo $proID ?>" value="<?php echo $prodPrice ?>" />
													<input type="hidden" id="productOffer-<?php echo $proID ?>" value="<?php echo $prodOffer ?>" />
													<span class="font-xs">Min qty: <?php echo $minproduct; ?></span>
												<?php } else { ?>
													<span class="title-color font-sm">
														<span style="text-decoration: line-through;">₹ <?php echo $prodPrice ?></span>
														<?php

														$finalPrice = $prodPrice - $prodPrice / 100 * $prodOffer;
														echo '₹ ' . $finalPrice;

														?>
														<input type="hidden" id="product_price-<?php echo $proID ?>" value="<?php echo $finalPrice ?>" />
														<input type="hidden" id="productOffer-<?php echo $proID ?>" value="<?php echo $prodOffer ?>" />
														<span class="badges-round bg-theme-theme font-xs" style="color: white;">offer<?php echo $prodOffer ?>%</span></span>
													<span class="font-xs">Min qty: <?php echo $minproduct; ?></span>

												<?php } ?>
												<div class="plus-minus">
													<i class="sub" data-feather="minus"></i>
													<input type="number" id="qty-<?php echo $proID ?>" name="qty" value="0" min="<?php echo $minproduct; ?>" readonly />
													<i class="add" data-feather="plus"></i>
												</div>
											</div>
										</div>

										<span class="font-xs errorpro" id="errorMin-<?php echo $proID ?>" style="color:red;">Minimum Order Quantity should be <?php echo $minproduct; ?></span>
								<?php
									}
								} else {
									echo "No products found.";
								}
								?>
							</div>
					<?php
							break;
						}
					} else {
						echo "No products found.";
					}
					?>
				</div>
		<?php

			}
		} else {
			echo "No products found.";
		}
		?>
	</div>

	<!-- Tab Content End -->
</main>
<!-- Main End -->

<div class="modal fade bd-example-modal-sm" id="emptymodal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content text-center" style="padding: 20px;">
			<h3 class="title-color">Your cart is Empty</h3>
		</div>
	</div>
</div>

<?php include '../../layout/footer-shop.php' ?>


<script>
	function updatecatURL(catid) {
		// Get the current URL
		var caturl = new URL(window.location.href);

		// Update the query parameters
		caturl.searchParams.set('catID', catid);

		// Replace the current URL with the updated one
		window.history.replaceState({}, '', caturl);

		location.reload();
	}

	function updatebrandURL(brandid) {
		// Get the current URL
		var url = new URL(window.location.href);

		// Update the query parameters
		url.searchParams.set('brand', brandid);

		// Replace the current URL with the updated one
		window.history.replaceState({}, '', url);
		location.reload();

	}
</script>