<!DOCTYPE html>
<html class=" " lang="en"><head>
<title>Add New Resident | Okpaka Community</title>
<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta content="utf-8" http-equiv="encoding">
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="God Web Technology Nigeria">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta property="og:url" content="https://www.okpaka.com">
<meta property="og:type" content="website">
<meta property="og:title" content="Okpaka Community Udu Delta State Nigeria">
<meta property="og:description" content="">
<!--<meta property="og:image" content="https://twinkas.com/img/fav.ico">-->
 
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
 
<link href="assets/css/font-awesome.css" rel="stylesheet">
 
<link href="assets/css/nprogress.css" rel="stylesheet">
<link href="assets/css/bootstrap-fileinput.css" rel="stylesheet" type="text/css">
 
<link href="assets/css/custom.min.css" rel="stylesheet">
<style type="text/css">
.cf-hidden { display: none; } 
.cf-invisible { visibility: hidden; }
</style>
<style type="text/css" media="screen">
#comodoTL {display:block;font-size:8px;padding-left:18px;}
.container-space { margin-bottom: 50px; }
</style>
</head>
<body class="nav-md">

<?php include('template/header.php'); ?>
   
<div class="right_col" role="main" style="min-height: 859px;">
<div class="">
<div class="page-title">
<div class="title_left">
<h3>My Profile</h3>
</div>
</div>
<div class="clearfix"></div>
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
<div class="x_title">
<h2>Edit my Profile <small> </small></h2>
<ul class="nav navbar-right panel_toolbox">
</ul>
<div class="clearfix"></div>
</div>
<div class="x_content">
<div class="col-md-9 col-sm-9 col-xs-12">
<div class="" role="tabpanel" data-example-id="togglable-tabs">
<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
<li role="presentation" class=""><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Personal</a> </li>
<li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Contact</a> </li>
<li role="presentation" class="active"><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Bank</a> </li>
<li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Profile Picture</a> </li>
<li role="presentation" class=""><a href="#tab_content5" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Password</a> </li>
</ul>
<div id="myTabContent" class="tab-content"><br>
<div role="tabpanel" class="tab-pane   fade" id="tab_content1" aria-labelledby="home-tab">
<form role="form" action="#" id="updatePersonalForm" method="post">
<div class="form-group">
<label class="control-label">Title</label>
<select class="form-control" name="title_text">
<option value="">-Select Title-</option>
<option value="29">Advocate</option><option value="14">Ambassador</option><option value="8">Barrister</option><option value="22">Bishop</option><option value="33">Brigadier</option><option value="34">Captain</option><option value="40">Chancellor</option><option value="9">Coloniel</option><option value="17">Councillor</option><option value="28">Dame</option><option value="7">Doctor</option><option value="39">Elder</option><option value="10">Engineer</option><option value="18">Envagelist</option><option value="37">Eze</option><option value="32">General</option><option value="16">Governor</option><option value="13">Governor</option><option value="30">Justice</option><option value="25">King</option><option value="27">Lord</option><option value="11">Madam</option><option value="5">Master</option><option value="6">Miss</option><option value="1">Mr.</option><option value="4">Mrs</option><option value="36">Oba</option><option value="38">Obi</option><option value="35">Officer</option><option value="21">Pastor</option><option value="31">Pope</option><option value="19">Prelate</option><option value="15" selected="selected">President</option><option value="23">Prince</option><option value="24">Princess</option><option value="3">Professor</option><option value="2">Provost</option><option value="26">Queen</option><option value="20">Reverend</option><option value="12">Senator</option>
</select> </div>
<div class="form-group">
<label class="control-label">Date of Birth</label>
<input placeholder="Enter your date of Birth (DD-MM-YYYY)" class="form-control" data-inputmask="'mask': '99-99-9999'" value="" name="dob_text" type="text"> </div>
<div class="form-group">
<label class="control-label">Name</label>
<input name="fullname_text" class="form-control" value="Godspower" type="text"> </div>
<div class="form-group">
<label class="control-label">Sex</label>
<input class="form-control" value="Male" readonly="" type="text"> </div>
<div class="margiv-top-10">
<button class="btn btn-primary updatePersonalForm_button" type="submit"><i class="fa fa-save"></i> Save Changes </button>
<input name="token" value="jhHJKt5cfetcyfghVFjh778" type="hidden">
<span style="float:right" id="updatePersonalForm_message"></span>
</div>
</form>
</div>
<div role="tabpanel" class="tab-pane  fade" id="tab_content2" aria-labelledby="profile-tab">
<form action="#" method="post" id="updateContactForm">
<div class="form-group">
<label class="control-label">Email</label>
<input class="form-control" value="itedjereg@yahoo.com" readonly="" type="text">
</div><div class="form-group">
<label class="control-label">Mobile 1</label>
<input maxlength="20" class="form-control" readonly="" name="mobile1_text" value="08058866353" type="text">
</div><div class="form-group">
<label class="control-label">Mobile 2</label>
<input maxlength="20" class="form-control" name="mobile2_text" placeholder="Please enter your Alternative Contact mobile" value="" type="text">
</div><div class="form-group">
<label class="control-label">Address</label>
<textarea class="form-control" rows="2" name="address_text" placeholder="Your House address not P.O.Box"></textarea>
</div><div class="form-group">
<label class="control-label">Facebook Link <i class="fa fa-facebook btn btn-sm btn-primary"></i> <small>use the # if its null</small></label>
<input class="form-control" value="http://facebook.com/" name="fb_text" placeholder="Please enter your Facebook Contact link" type="text">
</div><div class="form-group">
<label class="control-label">Twitter Link <i class="fa fa-twitter btn btn-sm bg-green"></i> <small>use the # if its null</small></label>
<input class="form-control" value="http://twitter.com/" name="tw_text" placeholder="Please enter your Twitter Contact link" type="text">
</div><div class="margiv-top-10">
<button type="submit" class="btn btn-primary updateContactForm_button"><i class="fa fa-save"></i> Save Changes </button>
<input name="token" value="jhHJKt5cfetcyfghVFjh778" type="hidden">
<span style="float:right" id="updateContactForm_message"></span>
</div><table class="table table-bordered table-striped">









</table>
 

</form></div>
<div role="tabpanel" class="tab-pane active in fade" id="tab_content3" aria-labelledby="profile-tab">
<div class="alert alert-info" onclick="$(this).hide()"> <b> <i class="fa fa-smile-o"></i> Hello Godspower!</b> Please note that bank details are to be edited Once. An Error here may render this account useless</div> <form action="#" method="post" id="updateBankForm">
<div class="form-group">
<label class="control-label">Bank</label>
<select class="form-control" name="bank_text">
<option value="">-Select Bank-</option>
<option value="11">Access Bank</option><option value="6">Afri Bank</option><option value="21">Citi Bank</option><option value="18">Diamond Bank</option><option value="8">Eco Bank</option><option value="13">FCMB</option><option value="17">Fidelity</option><option value="1">First Bank</option><option value="4">GTB</option><option value="14">Heritage Bank</option><option value="15">Keystone</option><option value="19">Skye Bank</option><option value="20">Stanbic IBTC Bank</option><option value="22">Standard Chartered</option><option value="7">Sterling Bank</option><option value="9">UBA</option><option value="5">Union Bank</option><option value="12">Unity Bank</option><option value="10">WEMA Bank</option><option value="16">Zenith Bank</option>
</select> </div>
<div class="form-group">
<label class="control-label">Account Name</label>
<input class="form-control" name="acc_name_text" placeholder="Please enter your Account name" value="" type="text">
</div>
<div class="form-group">
<label class="control-label">Account Number</label>
<input class="form-control" maxlength="10" name="acc_no_text" placeholder="Please enter your Account number" value="" type="text">
</div>
<div class="form-group">
<label class="control-label">Description</label>
<textarea class="form-control" rows="2" name="description_text" readonly="" disabled="disabled" placeholder="What your downliners sees as added Information">Please call me on and after payment. Dont forget to upload the details of your payment.</textarea>
</div>
<div class="margiv-top-10">
<button type="submit" class="btn btn-primary updateBankForm_button"><i class="fa fa-save"></i> Save Changes </button>
<input name="token" value="jhHJKt5cfetcyfghVFjh778" type="hidden">
<span style="float:right" id="updateBankForm_message"></span>
</div>
 
</form>
</div>
<div role="tabpanel" class="tab-pane  fade" id="tab_content4" aria-labelledby="profile-tab">
<p> The image uploaded here is subject to verification. Please upload images that shows your face. Your account can be blocked because of incorrect photos</p>
<form action="../twinkas-php/usersUpdateProfile?action=updateAvatar&amp;fileSource=file" role="form" method="post" enctype="multipart/form-data" class="ngnix_transfer" id="updatePictureForm">
<div class="form-group">
<div class="fileinput fileinput-new" data-provides="fileinput">
<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
<img src="https://twinkas.com/img/avatar_m.png" alt=""> </div>
<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
<div>
<span class="btn default btn-file">
<span class="fileinput-new btn bg-green btn-sm"> Select image </span>
<span class="fileinput-exists btn bg-red"> Change </span>
<input name="image_name" type="file"> </span>
<input value="yhUr56e78tfotyfcyd" name="token" type="hidden">
<a href="javascript:;" class="btn default fileinput-exists btn bg-red" data-dismiss="fileinput"> Remove </a>
</div>
</div>
</div>
<div class="margin-top-10">
<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Upload Avatar </button>
<span id="updatePictureForm_mesage"></span>
<span id="page_feed"></span>
</div>
</form>
</div>
<div role="tabpanel" class="tab-pane  fade" id="tab_content5" aria-labelledby="profile-tab">
<form action="#" method="post" id="updatePasswordForm">
<div class="form-group">
<label class="control-label">Current Password</label>
<input name="old_pwd" class="form-control" placeholder="Enter your old password" type="password"> </div>
<div class="form-group">
<label class="control-label">New Password</label>
<input name="new_pwd1" id="password1" placeholder="Enter your new password" class="form-control" type="password">
<span id="pwdMeter" class="neutral" style="float:right; margin:-30px 0 0 0; display:none">Very Weak</span> </div>
<div class="form-group">
<label class="control-label">Re-type New Password</label>
<input name="new_pwd2" id="password2" placeholder="Confirm your new password" class="form-control" type="password"> </div>
<span style="float:right" id="password_match_span"></span>
<div class="margin-top-10">
<button type="submit" class="btn btn-primary updatePasswordForm_button"><i class="fa fa-save"></i> Change Password </button>
<input name="token" value="jhHJKt5cfetcyfghVFjh778" type="hidden">
<span style="float:right" id="updatePasswordForm_message"></span>
</div>
</form>
</div>
</div>
</div>
</div>
<div class="col-md-3 col-sm-3 col-xs-12 profile_left">
<div class="profile_img">
<div id="crop-avatar">
 
<img style="border:4px double #000" class="img-responsive avatar-view" src="assets/images/avatar_m.png" alt="Avatar" title="Change the avatar">
</div>
</div>
<h3>Godspower</h3>
<ul class="list-unstyled user_data">
<li> <i class="fa fa-user user-profile-icon"></i> Username: younggp </li>
<li class="m-top-xs"> <i class="fa fa-phone user-profile-icon"></i> 08058866353 </li>
<li><i class="fa fa-envelope user-profile-icon"></i> itedjereg@yahoo.com </li>
</ul>
</div>
</div>
</div>
</div>
</div>
</div>

<?php include('template/footer.php'); ?>
</body></html>