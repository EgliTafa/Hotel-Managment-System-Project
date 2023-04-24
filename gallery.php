<!DOCTYPE html>
<html>

<head>
	<title>Galeria e Imazheve</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<style>
		.gallery {
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
			align-items: center;
			gap: 20px;
			max-width: 800px;
			margin: 0 auto;
			text-align: center;
		}

		.gallery img {
			width: 100%;
			height: auto;
			border-radius: 5px;
			box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);
			cursor: pointer;
			transition: transform 0.2s;
		}

		.gallery img:hover {
			transform: scale(1.1);
		}

		@media only screen and (min-width: 600px) {
			.gallery img {
				flex-basis: calc(33.33% - 13.33px);
			}
		}

		h1 {
			text-align: center;
		}

		.overlay {
			display: none;
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background-color: rgba(0, 0, 0, 0.8);
			z-index: 999;
		}

		.overlay img {
			display: block;
			max-width: 100%;
			max-height: 100%;
			margin: 0 auto;
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
		}

		button{
			display: block;
		}

		img{
			display: block;
		}

		.close {
			position: absolute;
			top: 20px;
			right: 20px;
			color: #fff;
			font-size: 24px;
			cursor: pointer;
		}
	</style>
</head>

<body>
	<h1>Galeria E Imazheve</h1>

	<div class="crud-form">
		<form action="" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="photo">Upload Photo</label>
				<input type="file" name="photo" id="photo" class="form-control-file">
			</div>
			<button type="submit" name="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>

	<div class="gallery">
		<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "hotel";
		$conn = mysqli_connect($servername, $username, $password, $dbname);

		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		if (isset($_POST['submit'])) {
			$photo = $_FILES['photo']['name'];
			$target_dir = "uploads/";
			$target_file = $target_dir . basename($_FILES["photo"]["name"]);
			move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
			$photo = $target_file;
			$sql = "INSERT INTO gallery (photo) VALUES ('$photo')";
			if (mysqli_query($conn, $sql)) {
				// echo '<div class="alert alert-success" role="alert">File uploaded successfully</div>';
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
		}

		$sql = "SELECT photo FROM gallery";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				echo '<div style="display:block; width:250px; height:250px;">';
				echo '<form method="POST" action="">';
				echo '<input type="hidden" name="photo" value="' . $row["photo"] . '">';
				echo '<button class="fa fa-button" type="submit" name="delete"><i class="fa fa-trash"></i></button>';
				echo '</form>';
				echo '<img src="' . $row["photo"] . '" alt="Imazhi">';
				echo '<form method="POST" action="">';
				echo '</form>';
				echo '</div>';
			}
			
			  
		} else {
			echo "0 results";
		}
		
		if (isset($_POST['delete'])) {
			$photo = $_POST['photo'];
			$sql = "DELETE FROM gallery WHERE photo = '$photo'";
			if (mysqli_query($conn, $sql)) {
			  // mesazh per sukses
			  header('Location: ' . $_SERVER['PHP_SELF']); 
			} else {
			  // mesazh per gabim
			}
		  }
		  
		  
		  

		mysqli_close($conn);
		?>
	</div>

	<div class="overlay">
		<span class="close">&times;</span>
		<img src="" alt="Imazhi I Plote">
	</div>

	<script>
		const gallery = document.querySelector('.gallery');
		const overlay = document.querySelector('.overlay');

		const fullImg = overlay.querySelector('img');
		const closeBtn = overlay.querySelector('.close');

		gallery.querySelectorAll('img').forEach(img => {
			img.addEventListener('click', () => {
				fullImg.src = img.src;

				overlay.style.display = 'block';

				document.body.style.overflow = 'hidden';
			});
		});

		closeBtn.addEventListener('click', () => {
			overlay.style.display = 'none';

			document.body.style.overflow = 'auto';
		});
	</script>

</body>

</html>