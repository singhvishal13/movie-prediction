<!DOCTYPE html>
<html>
<head>
	<title>movie success 2020</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="index.css">
	<link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
</head>
<style>
    .header_content h2{
        font-size:200%;
    }
    
    .table-content{
        margin-left: auto;
        margin:auto;
    }
    .table-content td{
        text-align: left;
        padding: 5px 20px;
        transition: 0.8s;
        
    }
    .table-content input{
        width: auto;
    }
    
    #btn{
        padding: 10px 30px;
        background-color: black;
        color: white;
    }
    #btn:hover{
        background-color:#ffc107;
        cursor: pointer;
        transition: 0.8s;
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
    <form method="POST">
	<div class="header_content">
        <h2> PROCEED NEXT FOR RATING</h2>
        <table  class="table-content" id="table-content">
            <tr>
                <td><label>Genres</label></td>
                <td><input type="text" class="text-input" id="genres" placeholder="Abcd|Efgh|Jklm" autocomplete="off" name="genres"></input></td>
            </tr>
            <tr>
                <td><label>Duration</label></td>
                <td><input type="text" class="text-input" id="genre" placeholder="" autocomplete="off" name="duration"></input></td>
            </tr>
            <tr>
                <td> <label>Content Rating</label></td>
                <td><input type="text" class="text-input" id="star-cast" placeholder="" autocomplete="off" name="content_rating"></input></td>
            </tr>
            <tr>
                <td><label>DIRECTOR</label></td> 
                <td><input type="text" class="text-input" id="director" placeholder="" autocomplete="off" name="director"></input></td>
            </tr>
            <tr>
				<td rowspan="5"><input type="submit" id="btn" value="NEXT" name="next"></input></td>
			</tr>
			<span id="predict" ></span>
         </table>   
       

        
    </div>
    </form>
    <?php
		if(isset($_POST['next'])){
			$genres=$_POST['genres'];
			$duration=$_POST['duration'];
			$content_rating=$_POST['content_rating'];
			$director=$_POST['director'];
			exec('D:\\R\\R-4.0.2\\bin\\Rscript.exe D:\xampp\htdocs\movie\model.r "'.$genres.'" "'.$duration.'" "'.$content_rating.'" "'.$director.'"',$value);
			$a=substr($value[sizeof($value)-1],3);
			echo "
			<table id='table-content'>
				<tr>
                <td><label>Predicted Rating</label></td> 
                <td><input type='text' class='text-input' id='director' placeholder='' autocomplete='off' name='predicted_rate' value='$a'></input></td>
            </tr>
			</table>";
			}
	?>

</body>
</html>