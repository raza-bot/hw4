<?php
namespace sjsu_174\hw4\src\views;


class LandingView {

	function display() {

		?>
		<!DOCTYPE html>
		<html lang="en">
		  <head>
		    <meta charset="UTF-8">
		    <title>Landing View</title>
		  </head>
		  <body style='text-align:center' onload='myFunction()'>

			<p id="demo">Testing</p>
		    <main>
					<form>
		    		<h1><a href="">Community Jigsaw</a></h1>
						<label for='upload'>New Image: </label>
						<input type="file" id="myFile" multiple size="50" onchange="myFunction()">
						<button type='submit'>upload</button>
					</form>

			</main>
			<script>
					function myFunction(){
						var x = document.getElementById("myFile");
						var txt = "";
						if ('files' in x) {
						
							if (x.files.length == 0) {
								txt = "Select one or more files.";
							} else {
									var file = x.files[0];
									console.log(file);
									if (file.type == "image/jpeg" || 
											file.type == "image/png" || 
											file.type == 'image/gif') {
												var imgSize = file.size /1000000; 
												if (imgSize > 2) {
													txt = "file is too big"; 
												}
												txt = "file is valid"; 
											} else {
												txt = "file is not supported"; 
											}
							}
						} else {
								if (x.value == "") {
									txt += "Select one or more files.";
								} 
						}
						document.getElementById("demo").innerHTML = txt;
					}
					</script>
		  </body>
			
		</html>
		<?php
	}
	
}
