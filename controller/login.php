<?php
$host="localhost";
$user="root";
$password="";
$db="login_detail";

mysqli_connect($host,$user,$password);
mysqli_select_db($db);

if(isset($_POST['username'])){
    $uname=$_POST['username'];
    $pasword=$_POST['password'];
    $sql="select*from loginform where user='".$uname."'And pass='".$password."'limit 1";
    $result=mysql_query($sql);

    if(mysql_num_rows($result)==1){
        echo "you have successfully logged in";
        exit();
    }
    else{
        echo"you have entered incorrect password";
        exit();
        }

}
?>


<html>
<head>
<title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="login-style.css">
	<link rel="stylesheet" type="text/css" href="style.css">
<body>

<!-- header menu bar-->
	<div class="header_menu">
		<div class="logo"> 
			<a href="index.html"><img src="images/logo.png" alt="movie success"></a>
		</div>

		<div class="menu_list">
			<ul>	
				<li><a href="login.html">Admin</a></li>
			</ul>
		</div>
	</div>

<!-- main login box content -->
    <div class="loginbox">
    <img src="images/login-icon.png" class="avatar">
        <h1>Login Here</h1>
        <form name="login"  method="POST" action="#" onsubmit="return validation()">
            <p>Username</p>
			 <input type="text" id="uname" name="username" placeholder="Enter Username" autocomplete="off">
			<span id="usermsz" style="color: red;"></span>

            <br><br><p>Password</p>
            <input type="password" id="pwd"  name="password" placeholder="Enter Password">
			<span id="pwdmsz" style="color: red;"></span>
			<br><br><input type="submit" name="btn" value="submit">
			<span id="forgot-text"><a id="forgot-text-link" href="#"> *forgot password</a></span>
		 </form>
        
    </div>
	
<!-- username password restriction -->
	
<script>
function validation(){
	var uname=document.getElementById("uname").value;
	var pwd= document.getElementById("pwd").value;
	var str=uname.slice(0,1);
//checking empty field
if(uname==""){
document.getElementById("usermsz").innerHTML="**username required.";
return false;
}
// checking username of 3-15 character
if(uname.length<3||uname.length>15){
document.getElementById("usermsz").innerHTML="**username  must be between 3-15 character";
return false;
}
//check for pass empty field
if(pwd==""){
document.getElementById("pwdmsz").innerHTML="**password required.";
return false;
}
//checking size of password between 6-20
if(pwd.length<6||pwd.length>20){
document.getElementById("pwdmsz").innerHTML="**password size must be between 6-20 character";
return false;
}
//password between 6 to 20 characters which contain at least one numeric digit and a special character
var pwdcheck=  /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,20}$/;
if(pwd.match(pwdcheck)) 
{ 
	return true;
}
else{
	document.getElementById("pwdmsz").innerHTML="**password should contain at least one numeric digit and a special character";
	 return false;
}
}
</script>


</body>
</head>
</html>