<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Code Igniter Test</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 35px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container {
		margin: 20%;
		padding-right:300px;
		padding-left:300px;
		padding-bottom:10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	.main_body{
		text-align:center;
	}
	.reg_body{
		text-align:center;
	}
	.Head-link{
		text-align:center;
		padding-left:20px;
		padding-right:20px;
		text-decoration:none;
		font-size:30px;
	}
	.Head{
		text-align:center;
		padding-top:20px;
		padding-bottom:20px;
		text-decoration:none;
		font-size:30px;
	}
	.data_form{
		width:100%;
	}
	.talbe{
		width:100%;
		align:center;
	}table { border-collapse: collapse; border-spacing: 0; }
	#keywords {
  margin: 0 auto;
  font-size: 1.2em;
  margin-bottom: 15px;
}


#keywords thead {
  cursor: pointer;
  background: #c9dff0;
}
#keywords thead tr th { 
  font-weight: bold;
  padding: 12px 30px;
  padding-left: 42px;
}
#keywords thead tr th span { 
  padding-right: 20px;
  background-repeat: no-repeat;
  background-position: 100% 100%;
}

#keywords thead tr th.headerSortUp, #keywords thead tr th.headerSortDown {
  background: #acc8dd;
}

#keywords thead tr th.headerSortUp span {
  background-image: url('https://i.imgur.com/SP99ZPJ.png');
}
#keywords thead tr th.headerSortDown span {
  background-image: url('https://i.imgur.com/RkA9MBo.png');
}


#keywords tbody tr { 
  color: #555;
}
#keywords tbody tr td {
  text-align: center;
  padding: 15px 10px;
}
#keywords tbody tr td.lalign {
  text-align: left;
}

.button {
    font-family: "Helvetica Neue", HelveticaNeue, Helvetica, Arial, sans-serif;
    font-weight: bold;
    font-size: 12px;
    padding: 9px 25px;
    text-decoration: none;
    margin: 10px;
    display: inline-block;
    border-radius: 3px;
    
    box-shadow:inset 0 1px 1px rgba(255, 255, 255, 0.4);
    -webkit-box-shadow:inset 0 1px 1px rgba(255, 255, 255, 0.4);
    -moz-box-shadow:inset 0 1px 1px rgba(255, 255, 255, 0.4);
   transition:opacity .3s;
}
.button:hover{

opacity:.9;
}
.green {
 color: #4f810e;
 text-shadow: 1px 1px rgba(255, 255, 255, .4);
 border: 1px solid #90b337;
 background: #cce467;
 background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, rgb(207,230,107)), color-stop(1, rgb(173,212,63)));
 background-image: -webkit-linear-gradient(top, rgb(207,230,107), rgb(173,212,63));  
 background-image: -moz-linear-gradient(top, rgb(207,230,107), rgb(173,212,63));
 background-image: -ms-linear-gradient(top, rgb(207,230,107), rgb(173,212,63));
 background-image: -o-linear-gradient(top, rgb(207,230,107), rgb(173,212,63));
 background-image: linear-gradient(top, rgb(207,230,107), rgb(173,212,63));
}
.red {
 color: #fff;
 text-shadow: 1px 1px rgba(0, 0, 0, .4);;
 border: 1px solid #db5343;
 background: #e86556;
 background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, rgb(238,128,109)), color-stop(1, rgb(226,73,62)));
 background-image: -webkit-linear-gradient(top, rgb(238,128,109), rgb(226,73,62));
 background-image: -moz-linear-gradient(top, rgb(238,128,109), rgb(226,73,62));
 background-image: -ms-linear-gradient(top, rgb(238,128,109), rgb(226,73,62));
 background-image: -o-linear-gradient(top, rgb(238,128,109), rgb(226,73,62)); 
 background-image: linear-gradient(top, rgb(238,128,109), rgb(226,73,62));
}
.yellow {
 color: white;
 text-shadow: 1px 1px rgba(0, 0, 0, .4);
 border: 1px solid #c68900;
 background: #4ba6d5;
 background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, rgb(103,199,229)), color-stop(1, rgb(47,133,197)));
 background-image: -webkit-linear-gradient(top, #ffc750, #eca505);
 background-image: -moz-linear-gradient(top, #ffc750, #eca505)); 
 background-image: -ms-linear-gradient(top, #ffc750, #eca505)); 
 background-image: -o-linear-gradient(top, #ffc750, #eca505)); 
 background-image: linear-gradient(top, #ffc750, #eca505);  
}
.search{
	padding-right:200px;
	padding-bottom:30px;
}
.error{
	color:red;
}
</style>

</head>
<body>
<div id="container">
	<div class="Head">
		<a class="Head-link"  align="center" onclick="Log_show()">LOGIN</a><a class="Head-link"  align="center" onclick="Reg_show()">REGISTER</a>
	</div>
	<div id="body">
		<!-- form login -->
		<div class="main_body" id="log">
			<form id="login" action="<?php echo base_url('C_Login/Login_Check'); ?>"  method="post">
				<div class="data_form">
                    <label>USERNAME</label>
					<input type="text"   placeholder="USERNAME" id="username" name="username">
                </div>
				<div class="data_form">
					<label>PASSWORD</label>
					<input type="password" class="form-control form-control-user" placeholder="*****" id="password" name="password">
                </div>
				<div class="data_form">
					<button type="submit" id="btn_save" class="button green" onclick="login()" >บันทึกข้อมูล</button>
					<?php echo "<label class='error'> ".$this->session->flashdata('error')."</label>"?>
                </div>
			</form>
			<div id="msg" style="display:none"></div>
		</div>
		<!-- form register -->

		<div class="reg_body" id="reg" >
			<!-- <form id="register" action="<?php //echo base_url('C_Register/Register_Check'); ?>"  method="post"> -->
				<div class="data_form">
                    <label>USERNAME</label>
					<input type="text"   placeholder="USERNAME" id="reg_username" name="reg_username" required>
                </div>
				<div class="data_form">
					<label>PASSWORD</label>
					<input type="password" class="form-control form-control-user" placeholder="***" id="reg_password" name="reg_password" required>
                </div>
				<div class="data_form">
					<label>RE-PASSWORD</label>
					<input type="password" class="form-control form-control-user" placeholder="***" id="re-password" name="re-password" required>
                </div>
				<div class="data_form">
					<label>PREFIX</label>
					<select name="prefix" id="prefix">
						<option value="1">Mr.</option>
						<option value="2">Mrs.</option>
						<option value="3">Miss</option>
					</select>
                </div>
				<div class="data_form">
					<label>FIRST NAME</label>
					<input type="text" class="form-control form-control-user" placeholder="A" id="firstname" name="firstname" required>
                </div>
				<div class="data_form">
					<label>LAST NAME</label>
					<input type="text" class="form-control form-control-user" placeholder="B" id="lastname" name="lastname" required>
                </div>
				<div class="data_form">
					<label>EMAIL</label>
					<input type="email" class="form-control form-control-user" placeholder="A@BAR.COM" id="email" name="email" required>
                </div>
				<div class="data_form">
					<label>AGE</label>
					<input type="number" class="form-control form-control-user" placeholder="20" id="age" name="age" required>
                </div>
				<div class="data_form">
					<label>ADDRESS</label>
					<input type="text" class="form-control form-control-user" placeholder="123/123 bkk" id="address" name="address" required>
                </div>
				<div class="data_form">
					<label>ID CARD</label>
					<input type="text" class="form-control form-control-user" placeholder="1200000000" id="id_card" name="id_card" required>
                </div>
				<div class="data_form">
					<input type="hidden" id="check-login">
					<button type="submit" id="btn_register" class="button green" onclick="register()">สมัครสมาชิก</button>
                </div>
				<div>
					<?php echo "<label class='error'> ".$this->session->flashdata('error_username')."</label>"?>
					<label class="error" id="reg_error_msg"></label>
				</div>
			<!-- </form> -->
		</div>
	</div> 
</div>
</body>
</html>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
// echo '<pre>';
// print_r();
// echo '</pre>';
	$( document ).ready(function() {
		document.getElementById("reg").style.display = 'none';
		// if(<?php //echo $_SESSION['isLog'] ?> == 1){
		// 	Log_show();
		// }else{
		// 	Reg_show();
		// }
	});
	function Log_show(){
		document.getElementById("log").style.display = 'inline';
		document.getElementById("reg").style.display = 'none';
	}
	function Reg_show(){
		document.getElementById("reg").style.display = 'inline';
		document.getElementById("log").style.display = 'none';
	}

	function login(){
		username =  $("#username").val();
		password =  $("#password").val();

		$.ajax({
			url: "<?php echo base_url('C_Login/Login_Check/')?>",
			type: "POST",
   			dataType: 'json',
 			data: {username : username,password : password},
			success: function(res){
			},
			error: function(msg){
				console.log('ERROR :',msg)
			}
		});
	}
	function register(){
		
		reg_username =  $("#reg_username").val();
		reg_password =  $("#reg_password").val();
		re_password = $("#re-password").val();
		firstname =  $("#firstname").val();
		lastname =  $("#lastname").val();
		email =  $("#email").val();
		id_card =  $("#id_card").val();
		age =  $("#age").val();
		address =  $("#address").val();
		prefix =  $("#prefix").val();

		$.ajax({
				url: "<?php echo base_url('C_Register/Check_userdata/')?>",
				type: "POST",
				dataType: 'json',
 				data: {username : reg_username},
				success: function(res){
					$data = JSON.parse(res);
					if(res=== true){
						$("#reg_error_msg").html("USERNAME IS ALREADY TOKEN !!!")
					}else{
						if(reg_password == re_password){
							if(firstname != '' && lastname != '' && email !='' && age !='' && address != '' && id_card != ''){
								$.ajax({
								url: "<?php echo base_url('C_Register/Register_Check/')?>",
								type: "POST",
								dataType: 'json',
								 data: {reg_username : reg_username, reg_password : reg_password, firstname : firstname,
									 lastname : lastname, email : email, id_card : id_card, age : age, address : address, prefix : prefix},
								success: function(res){
								},
								error: function(msg){
									// console.log('ERROR :',msg)
									window.location.href = "<?php echo base_url()?>";
								}
							});
							}else{
								$("#reg_error_msg").html("PLEASE INPUT VALUE !!!")
							}
						}else{
							$("#reg_error_msg").html("PASSWORD OR RE-PASSWORD IS NOT MATCHING !!!")
						}
					}
				},
				error: function(msg){
					console.log('ERROR :',msg)
				}
			});

 	}
</script>
