<!DOCTYPE html>
<html>
<head>
	<title>movie success 2020</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="index.css">
	<link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
</head>
<style>

    #text-input{
        background: maroon;
        color: white;
        border: none;
        padding: 10px;
    }
    #btn, #table_res{
        
        cursor: pointer;
        transition: 0.5s;
        border-radius: 20px;
        
    }

    #search_result{
    	text-align: center;
    }
    table.tbl-content {
    margin-left:auto; 
    margin-right:auto;
  }
  table.tbl-content td{
  	text-align: left;
  }
  table.table-content {
    margin-left:auto; 
    margin-right:auto;
  }
    #btn:hover{
        background-color:#ffc107;
    }
    .header_content button a{
        color:black;

    }
</style>
<body>

<header>
	<div class="header_menu">
		<div class="logo"> 
			<a href="index.html"><img src="images/logo.png" alt="movie success"> </a>
		</div>

		<!-- admin tab
		<div class="menu_list">
			<ul>	
				<li><a href="login.html">Admin</a></li>
			</ul>
		</div>

	-->
    </div>
</header>
    <div class="header_content">
		<form method="POST" action="">
		<table class='tbl-content'>
		<tr>

			<td><label>ENTER MOVIE NAME YOU WANT TO SEARCH &nbsp;&nbsp;&nbsp;&nbsp;</label></td>
			<td><input type="text" id="text-input" placeholder="enter movie name here" autocomplete="off" name="string"></input>
			<button id="btn"  name="submit">>></button>
			</td>
			
		</tr>
		<tr>
			<td><label>VISUALIZE THE MOVIE COUNT YEAR WISE&nbsp;&nbsp;&nbsp;&nbsp;</label></td>
			<td><button id="btn"  name="graph">>></button><br><br></td>
		</tr>
				</table>
	</form> 
	<tr>
			<td><label>DISPLAY AVERAGE RATINGS OF DIRECTOR&nbsp;&nbsp;&nbsp;&nbsp;</label></td>
			<td><button id="table_rat"  name="rating" >>></button><br><br></td>
		</tr>
				<tr>
			<td><label>DISPLAY DETAILS OF TOP </label>
  			<select id="value" name="numeric_val" style="background-color: maroon;color: white">
    			<option value="10">10</option>
    			<option value="20">20</option>
    			<option value="30">30</option>
  			</select><label>&nbsp;MOVIE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label></td>
			<td><button id="table_top"  name="top_graph">>></button></td>
		</tr>


	</div>	
  
    <div id= "search_result">
	<?php
		if(isset($_POST['graph'])){

			exec('D:\\R\\R-4.0.2\\bin\\Rscript.exe D:\xampp\htdocs\movie\graph.r');
			echo "<img src='temp.png'>";

			}
	?>
	<?php
		if(isset($_POST['rating'])){

			exec('D:\\R\\R-4.0.2\\bin\\Rscript.exe D:\xampp\htdocs\movie\top_graph.r');
			echo "<img src='temp.png'>";

			}
	?>
	<div id="iframeHolder1" style="text-align: center;"></div>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.0/jquery.min.js"></script>
		<script type="text/javascript">
		$(function(){
    	$('#table_top').click(function(){ 
        if(!$('#iframe').length) {
                $('#iframeHolder2').html('<iframe id="iframe2" src="top_table.html" width="100%" height="700"></iframe>');
        		}
    		});   
		});
	</script>
	<div id="iframeHolder2" style="text-align: center;"></div>

	<?php
		if(isset($_POST['top_graph'])){
		$value=$_POST['numeric_val'];
			exec('D:\\R\\R-4.0.2\\bin\\Rscript.exe D:\xampp\htdocs\movie\top_movie.r '.$value);

			}
	?>
			<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.0/jquery.min.js"></script>
		<script type="text/javascript">
		$(function(){
    	$('#table_rat').click(function(){ 
        if(!$('#iframe').length) {
                $('#iframeHolder1').html('<iframe id="iframe1" src="rating.html" width="auto" height="300"></iframe>');
        		}
    		});   
		});
	</script>

	<?php
		if(isset($_POST['submit'])){
			$string=$_POST['string'];
			exec('D:\\R\\R-4.0.2\\bin\\Rscript.exe D:\xampp\htdocs\movie\movie_srch.r '.$string,$value);
			$a=substr($value[0],3);
			$b=substr($value[1],3);
			$c=substr($value[2],3);
			$d=substr($value[3],3);
			$e=substr($value[4],3);
			$f=substr($value[5],3);
			$g=substr($value[6],3);
			$h=substr($value[7],3);
			
			echo "<h2> YOUR SEARCH RESULT</h2>
        <table  class='table-content'>
        <tr>
            <td><label>MOVIE-NAME</label></td>
            <td><input type='text' class='text-input' id='movie-name' placeholder=''  autocomplete='off' readonly value='$a'></input></td>
        </tr>
        <tr>
            <td><label>GENRE</label></td>
            <td><input type='text' class='text-input' id='genre' placeholder='' autocomplete='off' name='genre' readonly value='$b'></input></td>
        </tr>
        <tr>
            <td> <label>STAR-CAST</label></td>
            <td><input type='text' class='text-input' id='star-cast' placeholder='' autocomplete='off' name='star-cast' readonly value='$c,$d,$e'></input></td>
        </tr>
        <tr>
            <td><label>DIRECTOR</label></td> 
            <td><input type='text' class='text-input' id='director' placeholder='' autocomplete='off' name='director' readonly value='$f'></input></td>
        </tr>
        <tr>
            <td><label>BUDGET</label></td>
            <td><input type='text' class='text-input' id='budget' placeholder='' autocomplete='off' name='budget' readonly value='$g'></input value='$g'></td>
        </tr>
        <tr>
            <td><label>YEAR</label</td>
            <td><input type='text' class='text-input' id='year' placeholder='' autocomplete='off' name='year' readonly value='$h'></input></td>
        </tr>

     </table>";
			}
	?>
</div>


</body>
</html>