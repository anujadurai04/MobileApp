<?php 

include '../../layout/header.php'; 
include 'skeleton-shop.php';

$catSQL = mysqli_query($link,"SELECT * FROM jdm_category");
$catTabSQL = mysqli_query($link,"SELECT * FROM jdm_category");
?>

    <!-- Main Start -->
    <main class="main-wrap shop-page mb-xxl">
      <!-- Catagories Tabs Start -->
      <ul class="nav nav-tab nav-pills custom-scroll-hidden" id="pills-tab" role="tablist">
	  <?php 
			if (mysqli_num_rows($catSQL) > 0) {
		   // output data of each row
		   while($row = mysqli_fetch_assoc($catSQL)) {
			   $catID = $row['jdm_cate_id'];
			   $catName = $row["jdm_cate_name"];
			   $catActive = $row["jdm_cate_active"];
			   $catImage = $row['jdm_cat_image'];
		  ?>
        <li class="nav-item" role="presentation">
          <button class="nav-link <?php if($catID == 1 ){?>active<?php }else{ }?>" id="<?php echo $catID ?>-tab" data-bs-toggle="pill" data-bs-target="#catagories-<?php echo $catID ?>" type="button" role="tab" aria-controls="catagories-<?php echo $catID ?>" aria-selected="true">
            <?php echo $catName ?>
          </button>
        </li>
		<?php 
				}
			}
		?>
      </ul>
      <!-- Catagories Tabs End -->

      <!-- Tab Content Start -->
      <div class="tab-content ratio2_1" id="pills-tabContent">
	  <?php 
			if (mysqli_num_rows($catTabSQL) > 0) {
		   // output data of each row
		   while($row = mysqli_fetch_assoc($catTabSQL)) {
			   $catID = $row['jdm_cate_id'];
			   $catName = $row["jdm_cate_name"];
			   $catActive = $row["jdm_cate_active"];
			   $catImage = $row['jdm_cat_image'];
		  ?>
        <!-- Catagories Content Start -->
        <div class="tab-pane fade show <?php if($catID == 1 ){?>active<?php }else{ }?>" id="catagories-<?php echo $catID ?>" role="tabpanel" aria-labelledby="<?php echo $catID ?>-tab">
          <?php
		  $prodSQL = mysqli_query($link,"SELECT * FROM gdm_products WHERE gdm_prod_cat_id = '$catID'");
		  if (mysqli_num_rows($prodSQL) > 0) {
		   // output data of each row
		   
		   while($row = mysqli_fetch_assoc($prodSQL)) {
			   $proID = $row['gdm_prod_id'];
			   $proName = $row["gdm_prod_name"];
		  ?>
		  
		  <div class="product-list media">
            <a href="product.html"><img src="../../../assets/images/product/8.png" alt="offer" /></a>
            <div class="media-body">
              <a href="product.html" class="font-sm"> <?php echo $proName ?> </a>
              <span class="content-color font-xs">500g</span>
              <span class="title-color font-sm">$18.00 <span class="badges-round bg-theme-theme font-xs">50% off</span></span>
              <div class="plus-minus">
                <i class="sub" data-feather="minus"></i>
					<input type="number" id="qty" name="qty" value="0" min="0" />
                <i class="add" data-feather="plus"></i>
              </div>
            </div>
          </div>
		  
		  <?php
		   }
		  }
		  ?>

          
		</div>
        <!-- Catagories Content End -->
		
		<?php 
		   }
			}
			?>

      </div>
      <!-- Tab Content End -->
    </main>
    <!-- Main End -->
	
<?php include '../../layout/footer.php' ?>

<script>

 $('.add').click(function () {
	 var count = $("input[name=qty]").val();
     console.log(count);
    });
	
 $('.sub').click(function () {
	 var count = $("input[name=qty]").val();
        console.log(count);
    });

</script>