<div class="page-heading text-center">

		<div class="container zoomIn animated">
			
			<h1 class="page-title">GALLERY <span class="title-under"></span></h1>
			<p class="page-description">
				Explore the impact of our work through photos in the Gallery
			</p>
			
		</div>

	</div>

	<div class="main-container">

		<div class="container gallery fadeIn animated">

			<div class="row">
				<?php
					include_once "config.php";  

					// Retrieve the list of publications
					$query = "SELECT * FROM gallerys";
					$result = $db->query($query);

					while ($gallery = $result->fetch_assoc()) {

					
				?>

				<a href="assets/images/gallery/<?php echo $gallery['photo']; ?>" class="col-md-3 col-sm-4 gallery-item lightbox">

					<img src="assets/images/gallery/<?php echo $gallery['photo']; ?>" alt="">

					<span class="on-hover">
						<span class="hover-caption"><?php echo $gallery['title']; ?></span>
					</span>

				</a> <!-- /.gallery-item -->

				<?php }?>
				
			</div>
			
		</div>


	</div> <!-- /.main-container  -->