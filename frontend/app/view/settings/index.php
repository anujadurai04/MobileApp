<?php

include '../../layout/header-others.php';
include 'skeleton-settings.php';

?>

<!-- Main Start -->
<main class="main-wrap setting-page mb-xxl">
	<div class="user-panel">
		<div class="media">
			<div class="avatar-wrap">
				<a href="javascript:void(0)">
					<img id="profilePicture" src="assets/images/avatar/avatar.jpg" alt="avatar" />
				</a>
				<span class="edit" id="editIcon"> <i data-feather="edit-3"></i></span>
			</div>
			<div class="media-body">
				<h2 class="title-color" id="profilename"></h2>
				<span class="content-color font-md" id="profilephone"></span>
			</div>
		</div>
	</div>
	<input type="file" id="galleryInput" accept=".jpg, .jpeg, .png" style="display: none;">
	<!-- Form Section Start -->
	<form class="custom-form">
		<div class="input-box">
			<i class="iconly-Profile icli"></i>
			<input type="text" id="name-input" placeholder="Your name" class="form-control" required />
		</div>
		<div class="input-box">
			<i class="iconly-Call icli"></i>
			<input type="number" id="phone-input" placeholder="Your Phone number" class="form-control" />
		</div>
		<div class="input-box" id="otp_box">
			<i class="iconly-Lock icli"></i>
			<input class="form-control digits" id="otpCode" type="number" onKeyPress="if(this.value.length==6) return false;" autocomplete="off" placeholder="Enter Otp Code" />
		</div>
		<small>Note: The mobile number should not include the prefix "+91."</small>
		<button type="button" id="send_otp" class="btn-solid">Send Otp</button>
		<button type="button" id="submit_otp" class="btn-solid">Submit</button>
		<input type="hidden" id="googleCaptcha" style="display: block;margin: 0 auto;text-align: center;" />
		<button type="submit" id="updatesettings" class="btn-solid">Update Settings</button>
	</form>
	<!-- Form Section End -->
</main>
<!-- Main End -->
<div class="modal fade bd-example-modal-sm" id="Sendotp" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-sm modal-dialog-centered">
		<div class="modal-content text-center" style="padding: 20px;">
			<h3 class="title-color">Please Wait...</h3>
		</div>
	</div>
</div>

<div class="modal fade bd-example-modal-sm" id="alertmodal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-md modal-dialog-centered">
		<div class="modal-content text-center" style="padding: 20px;">
			<div class="d-flex justify-content-center pb-2">
				<h3 class="title-color" id="alertmessage"></h3>
			</div>
			<div class="d-flex justify-content-center pt-2">
				<button type="button" class="btn btn-primary" id="dismissAltermodal" style="background-color: #FF6347;color: white;border: none;" data-dismiss="modal">OK</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade bd-example-modal-sm" id="emptymodal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content text-center" style="padding: 20px;">
			<h3 class="title-color">Your cart is Empty</h3>
		</div>
	</div>
</div>

<?php include '../../layout/footer-settings.php' ?>