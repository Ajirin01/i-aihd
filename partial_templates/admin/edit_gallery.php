<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">
                    Update Gallery
                </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <?php 
                    // Get the publication ID from the URL
    	            $id = (isset($_GET['id']) && is_numeric($_GET['id'])) ? (int)$_GET['id'] : 0;    
                    include_once dirname(__FILE__, 3)."/controllers/get_gallery.php"; 
                ?>

                <form action="/controllers/update_gallery" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Gallery title</label>
                        <input type="text" name="title" value="<?php echo $gallery['title']; ?>" class="form-control" id="title" placeholder="Enter title">
                    </div>

                    <input type="file" name="" id="file" onchange="updateImage()">

                    <input type="text" style="opacity: 0" name="id" value="<?php echo $gallery['id']; ?>" id="id">

                    
                    <div id="container">
                        <div id="my-image" class="img-cont" ></div>
                        <div id="draggable-box" style="z-index: 1000"></div>
                        <img src="/assets/images/gallery/<?php echo $gallery['photo']; ?>" id="my-img" alt="gallery photo" style="opacity: 0; position: absolute; top: 0; z-index: 500;">
                    </div>
                    
                    <!-- <br><br><br><br><br><br> <br><br><br><br> -->
                    
                    

                    <div class="card-footer gallery-add-footer">
                        <button id="update-gallery" class="btn btn-primary" onclick="updateGallery()">Submit</button>
                        <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.col-->
</div>
<!-- ./row -->