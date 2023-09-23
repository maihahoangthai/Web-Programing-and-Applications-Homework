<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>Bang Mau</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<style>
		.colorbox,.colorbox *{
			box-sizing: border-box;
			border: 1px solid black;
		}
		.colorbox{
			width: 322px;
			margin: 20px auto;
		}
		.colorbox *{
			width: 32px;
			height: 32px;
			float: left;
		}
	</style>
	<script>
		var mauHienTai = null;
		function doiMau(tag, doimau=false){
			if(mauHienTai==null)
				mauHienTai = $('body').css('background-color');
			if(doimau==true){
				mauHienTai = $(tag).css('background-color');
				$('#alertdiv').show(500);
				setTimeout("$('#alertdiv').hide(500);", 2500);
			}
			$('body').css('background-color', $(tag).css('background-color'));
		}
		function phucHoiMau(){
			$('body').css('background-color', mauHienTai);
		}
	</script>
</head>
<body style="background-color: aqua;">
	<div class="colorbox">
		<?php
			$background_colors = array('#282E33', '#25373A', '#164852', '#495E67', '#FF3838');
			$rand_background = $background_colors[array_rand($background_colors)];
			for($i=0;$i<100;$i++)
				echo "<div style='background-color: $rand_background;' onmouseover='doiMau(this)' onmouseout='phucHoiMau()' onclick='doiMau(this,true)'>&nbsp;</div>"
		?>
		<br style="clear: both;">
	</div>
	<div id="alertdiv" class="alert alert-success alert-dismissable fade in" style="width: 320px; margin: 20px auto; display: none;">
        <a href="#" class="close" aria-label="close" onclick="$('#alertdiv').hide(); return false;">&times;</a>
        Background color has been changed.
    </div>
</body>
</html>