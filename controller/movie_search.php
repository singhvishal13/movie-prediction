<?php
		if(isset($_POST['string'])){
			$string=$_POST['string'];
			$value=exec('D:\\R\\R-4.0.2\\bin\\Rscript.exe D:\xampp\htdocs\movie\movie_search.r'.$string);
			echo $value;
			$movie_name=$value[1];
			$genre=$value[2];
			$star_cast=$value[3];
			$director=$value[4];
			$budget=$value[5];
			$year=$value[6];
			}
	?>