<?php

error_reporting( E_ALL );
ini_set( "display_errors", 1 );


require_once "maillist/assets/mysqlclass.php";
require_once "maillist/assets/PDO.inc.php";

//Store the action variable. Check to see if the form has been submitted before running the registration
$action = @$_POST['action'];

//Combine the submitted names
$name = '';

if(isset($_POST['firstName']) && isset($_POST['lastName'])){

	$name = $_POST['firstName'];
	$name .=' ';
	$name .= $_POST['lastName'];
}

//Combine the gratuation date to a proper year
$grad_date = '';

if(isset($_POST['grad_date_m']) && isset($_POST['grad_date_d']) && isset($_POST['grad_date_y'])){
	$grad_date = $_POST['grad_date_y'];
	$grad_date .= $_POST['grad_date_m'];
	$grad_date .= $_POST['grad_date_d'];
}

//Instance the SQL databasing class to use.
$sql = new processMySql;

//If there has been an action, add users to the database
if($action == 'register'){
	//Check that everything is set.
	if(!empty($name) && isset($_POST['email']) && isset($_POST['major']) && !empty($grad_date))
	{
		$sql->processNewUser($name, $_POST['email'], $_POST['major'], $grad_date);
		header("Location: http://psb.acm.org/thanks.html");
		die();
	}
	else
	{
		echo 'Something went very.. VERY wrong. Contact the ACM Club about this error.';
	}
}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html class="supernova"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="alternate" type="application/json+oembed" href="https://www.jotform.com/oembed/?format=json&amp;url=http%3A%2F%2Fwww.jotform.com%2Fform%2F63154822546154" title="oEmbed Form"><link rel="alternate" type="text/xml+oembed" href="https://www.jotform.com/oembed/?format=xml&amp;url=http%3A%2F%2Fwww.jotform.com%2Fform%2F63154822546154" title="oEmbed Form">
<meta property="og:title" content="Register New Club Member" >
<meta property="og:url" content="http://www.jotform.us/form/63154822546154" >
<meta property="og:description" content="Please click the link to complete this form.">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta name="HandheldFriendly" content="true" />
<title>Register New Club Member</title>
<link href="https://cdn.jotfor.ms/static/formCss.css?3.3.15650" rel="stylesheet" type="text/css" />
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/css/styles/nova.css?3.3.15650" />
<link type="text/css" media="print" rel="stylesheet" href="https://cdn.jotfor.ms/css/printForm.css?3.3.15650" />
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/themes/CSS/566a91c2977cdfcd478b4567.css?"/>
<style type="text/css">
    .form-label-left{
        width:150px !important;
    }
    .form-line{
        padding-top:12px;
        padding-bottom:12px;
    }
    .form-label-right{
        width:150px !important;
    }
    body, html{
        margin:0;
        padding:0;
        background:false;
    }

    .form-all{
        margin:0px auto;
        padding-top:0px;
        width:690px;
        color:#555 !important;
        font-family:"Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", Verdana, sans-serif;
        font-size:14px;
    }
</style>

<script src="https://cdn.jotfor.ms/static/prototype.forms.js" type="text/javascript"></script>
<script src="https://cdn.jotfor.ms/static/jotform.forms.js?3.3.15650" type="text/javascript"></script>
<script type="text/javascript">
   JotForm.init(function(){
      JotForm.calendarMonths = ["January","February","March","April","May","June","July","August","September","October","November","December"];
      JotForm.calendarDays = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"];
      JotForm.calendarOther = {"today":"Today"};
      JotForm.setCalendar("6", false, {"days":{"monday":true,"tuesday":true,"wednesday":true,"thursday":true,"friday":true,"saturday":true,"sunday":true},"future":true,"past":true,"custom":false,"ranges":false,"start":"","end":""});
      JotForm.description('input_6', 'This will help our system know when to remove your email address from our lists. You don\'t need to be exact! Make a good guess if you don\'t know.<br /><br />Hint: Look at that neat calendar icon to the right!');
	JotForm.clearFieldOnHide="disable";
	JotForm.onSubmissionError="jumpToFirstError";
   });
</script>
</head>
<body>
<form class="jotform-form" action="createuser.php" method="post" name="form_63154822546154" id="63154822546154" accept-charset="utf-8">
  <input type="hidden" name="formID" value="63154822546154" />
  <div class="form-all">
    <ul class="form-section page-section">
      <li id="cid_1" class="form-input-wide" data-type="control_head">
        <div class="form-header-group">
          <div class="header-text httal htvam">
            <h2 id="header_1" class="form-header">
              Register New Club Member
            </h2>
            <div id="subHeader_1" class="form-subHeader">
              Welcome to the Behrend Chapter of ACM!
            </div>
          </div>
        </div>
      </li>
      <li class="form-line jf-required" data-type="control_fullname" id="id_3">
        <label class="form-label form-label-left form-label-auto" id="label_3" for="input_3">
          Name
          <span class="form-required">
            *
          </span>
        </label>
        <div id="cid_3" class="form-input jf-required">
          <span class="form-sub-label-container" style="vertical-align: top;">
            <input class="form-textbox validate[required]" type="text" size="10" name="firstName" id="first_3" />
            <label class="form-sub-label" for="first_3" id="sublabel_first" style="min-height: 13px;"> First Name </label>
          </span>
          <span class="form-sub-label-container" style="vertical-align: top;">
            <input class="form-textbox validate[required]" type="text" size="15" name="lastName" id="last_3" />
            <label class="form-sub-label" for="last_3" id="sublabel_last" style="min-height: 13px;"> Last Name </label>
          </span>
        </div>
      </li>
      <li class="form-line jf-required" data-type="control_email" id="id_4">
        <label class="form-label form-label-left form-label-auto" id="label_4" for="input_4">
          E-mail
          <span class="form-required">
            *
          </span>
        </label>
        <div id="cid_4" class="form-input jf-required">
          <span class="form-sub-label-container" style="vertical-align: top;">
            <input type="email" class=" form-textbox validate[required, Email]" id="input_4" name="email" size="30" value="" />
            <label class="form-sub-label" for="input_4" style="min-height: 13px;"> PSU email prefered - Any works though! </label>
          </span>
        </div>
      </li>
      <li class="form-line jf-required" data-type="control_dropdown" id="id_5">
        <label class="form-label form-label-left form-label-auto" id="label_5" for="input_5">
          Intended Major
          <span class="form-required">
            *
          </span>
        </label>
        <div id="cid_5" class="form-input jf-required">
          <select class="form-dropdown validate[required]" style="width:150px;" id="input_5" name="major">
            <option value="">  </option>
            <option value="Computer Science"> Computer Science </option>
            <option value="Software Engineering"> Software Engineering </option>
            <option value="Computer Engineering"> Computer Engineering </option>
            <option value="Undecided"> Undecided </option>
            <option value="Other"> Other </option>
          </select>
        </div>
        	<input type="hidden" name="action" value="register">
      </li>
      <li class="form-line jf-required" data-type="control_datetime" id="id_6">
        <label class="form-label form-label-left form-label-auto" id="label_6" for="input_6">
          Intended Gratuation Date
          <span class="form-required">
            *
          </span>
        </label>
        <div id="cid_6" class="form-input jf-required">
          <span class="form-sub-label-container" style="vertical-align: top;">
            <input class="form-textbox validate[required, disallowPast, limitDate]" id="month_6" name="grad_date_m" type="tel" size="2" data-maxlength="2" value="" />
            <span class="date-separate">
              &nbsp;-
            </span>
            <label class="form-sub-label" for="month_6" id="sublabel_month" style="min-height: 13px;"> Month </label>
          </span>
          <span class="form-sub-label-container" style="vertical-align: top;">
            <input class="form-textbox validate[required, disallowPast, limitDate]" id="day_6" name="grad_date_d" type="tel" size="2" data-maxlength="2" value="" />
            <span class="date-separate">
              &nbsp;-
            </span>
            <label class="form-sub-label" for="day_6" id="sublabel_day" style="min-height: 13px;"> Day </label>
          </span>
          <span class="form-sub-label-container" style="vertical-align: top;">
            <input class="form-textbox validate[required, disallowPast, limitDate]" id="year_6" name="grad_date_y" type="tel" size="4" data-maxlength="4" value="" />
            <label class="form-sub-label" for="year_6" id="sublabel_year" style="min-height: 13px;"> Year </label>
          </span>
          <span class="form-sub-label-container" style="vertical-align: top;">
            <img class="showAutoCalendar" alt="Pick a Date" id="input_6_pick" src="https://cdn.jotfor.ms/images/calendar.png" style="vertical-align:middle;" />
            <label class="form-sub-label" for="input_6_pick" style="min-height: 13px;">  </label>
          </span>
        </div>
      </li>
      <li class="form-line" data-type="control_button" id="id_2">
        <div id="cid_2" class="form-input-wide">
          <div style="margin-left:156px" class="form-buttons-wrapper">
            <button id="input_2" type="submit" class="form-submit-button">
              Submit
            </button>
          </div>
        </div>
      </li>
      <li style="display:none">
        Should be Empty:
        <input type="text" name="website" value="" />
      </li>
    </ul>
  </div>
  <script>
  JotForm.showJotFormPowered = true;
  </script>
  <input type="hidden" id="simple_spc" name="simple_spc" value="63154822546154" />
  <script type="text/javascript">
  document.getElementById("si" + "mple" + "_spc").value = "63154822546154-63154822546154";
  </script>
</form></body>
</html>
<script type="text/javascript">JotForm.ownerView=true;</script>

