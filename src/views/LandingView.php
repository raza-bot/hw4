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
	      <link rel="stylesheet" href="./src/styles/style.css">
		  </head>
		  <body>
		    <main>
					<form>
		    		<h1><a href="">Community Jigsaw</a></h1>
						<label for='upload'>New Image: </label>
						<input type='file' id='upload' />
						<button type='submit'>upload</button>
					</form>

			</main>
		  </body>
		</html>
		<?php
	}
}
