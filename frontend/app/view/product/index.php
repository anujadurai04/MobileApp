<!DOCTYPE html>
<!-- Html Start -->
<html lang="en">
<?php

include '../../layout/header-others.php';
include 'skeleton.php';

$productId = $_GET['pid'];

$query = mysqli_query($link, "SELECT * FROM `gdm_products` INNER JOIN jdm_brand on gdm_prod_brand_id=jdm_brand_id INNER JOIN jdm_category on gdm_prod_cat_id=jdm_cate_id where gdm_prod_id='$productId'");

while ($row = mysqli_fetch_assoc($query)) {
  $gdm_prod_id = $row['gdm_prod_id'];
  $gdm_prod_name = $row['gdm_prod_name'];
  $gdm_prod_offer = $row["gdm_prod_offer"];
  $gdm_prod_price = $row["gdm_prod_price"];
  $gdm_prod_desc = $row["gdm_prod_desc"];
  $jdm_brand_name = $row["jdm_brand_name"];
  $productimg = $row["gdm_prod_image"];
  $jdm_brand_id = $row["jdm_brand_id"];
  $gdm_prod_min_qty = $row["gdm_prod_min_qty"];
}
if ($productimg == '') {
  $imageFproduct = '../../../assets/images/product/no-image.png';
} else {
  $imageFproduct = $imageLink . $productimg;
}
if ($gdm_prod_offer > 0) {
  $finalPrice = $gdm_prod_price - $gdm_prod_price / 100 * $gdm_prod_offer;
} else {
  $finalPrice = $gdm_prod_price;
}

?>
<style>
  .price {
    display: flex;
    align-items: center;
    font-size: 16px;
  }

  .price span {
    margin-right: 10px;
  }

  .price del {
    margin-right: 5px;
    color: #999;
  }

  .price span:last-child {
    color: #f00;
  }

  .banner-box .slick-dots {
    display: none;
  }
</style>

<!-- Main Start -->
<main class="main-wrap product-page mb-xxl">
  <!-- Banner Section Start -->
  <div class="banner-box product-banner">
    <div class="banner">
      <img src="<?php echo  $imageFproduct; ?>" />
    </div>
  </div>
  <!-- Banner Section End -->

  <!-- Product Section Section Start -->
  <section class="product-section">
    <h1 class="font-md"><?php echo $gdm_prod_name; ?></h1>
    <?php
    if ($gdm_prod_offer > 0) {
    ?>
      <div class="price"><span>₹<?php echo $finalPrice; ?></span><del>₹<?php echo $gdm_prod_price; ?></del><span><?php echo $gdm_prod_offer; ?>% off</span></div>
    <?php } else { ?>
      <div class="price"><span>₹<?php echo $gdm_prod_price; ?></span></div>
    <?php } ?>
    <!-- Product Detail Start -->
    <div class="product-detail section-p-t">
      <div class="product-detail-box">
        <h2 class="title-color">Product Details</h2>
        <p class="content-color font-base"><?php echo  $gdm_prod_desc; ?></p>
      </div>
      <hr>
      <div class="product-detail-box">
        <h2 class="title-color">Manufacturer Details</h2>
        <p class="content-color font-base"><?php echo $jdm_brand_name; ?></p>
      </div>

    </div>
    <!-- Product Detail End -->
  </section>
  <!-- Product Section Section End -->

  <!-- Lowest Price 2 Start -->
  <section class="recently-viewed">
    <div class="top-content">
      <div>
        <h4 class="title-color">Related Products</h4>
      </div>
      <a href="../shop/" class="font-xs font-theme">See all</a>
    </div>
    <div class="product-slider">
      <?php $query1 = mysqli_query($link, "SELECT * FROM `gdm_products` INNER JOIN jdm_brand on gdm_prod_brand_id=jdm_brand_id INNER JOIN jdm_category on gdm_prod_cat_id=jdm_cate_id where jdm_brand_id='$jdm_brand_id'");

      while ($row = mysqli_fetch_assoc($query1)) {
        $prod_id = $row['gdm_prod_id'];
        $prod_name = $row['gdm_prod_name'];
        $prod_offer = $row["gdm_prod_offer"];
        $prod_price = $row["gdm_prod_price"];
        $productimag = $row["gdm_prod_image"];

        if ($productimag == '') {
          $improduct = '../../../assets/images/product/no-image.png';
        } else {
          $improduct = $imageLink . $productimag;
        }
        if ($prod_offer > 0) {
          $fPrice = $prod_price - $prod_price / 100 * $prod_offer;
        } else {
          $fPrice = $prod_price;
        }

      ?>
        <div>
          <div class="product-card">
            <div class="img-wrap">
              <a href="../product/?pid=<?php echo $prod_id ?>"><img src="<?php echo $improduct; ?>" class="img-fluid" alt="product" /> </a>
            </div>
            <div class="content-wrap">
              <a href="../product/?pid=<?php echo $prod_id ?>" class="font-sm title-color"><?php echo $prod_name; ?></a>

              <div class="price"><span>₹<?php echo $fPrice; ?></span></div>

            </div>
          </div>
        </div>
      <?php } ?>

    </div>
  </section>
  <!-- Lowest Price 2 End -->
</main>
<!-- Main End -->

<!-- Footer Start -->

<!-- Footer End -->

<div class="modal fade bd-example-modal-sm" id="emptymodal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content text-center" style="padding: 20px;">
      <h3 class="title-color">Your cart is Empty</h3>
    </div>
  </div>
</div>

<?php include '../../layout/footer-product.php' ?>