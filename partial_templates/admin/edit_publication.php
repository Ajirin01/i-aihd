<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">
                    Update Publication
                </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <?php 
                    // Get the publication ID from the URL
    	            $id = (isset($_GET['id']) && is_numeric($_GET['id'])) ? (int)$_GET['id'] : 0;    
                    include_once dirname(__FILE__, 3)."/controllers/get_publication.php"; 
                ?>

                <form action="/controllers/update_publication" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Publication title</label>
                        <input type="text" name="title" value="<?php echo $publication['title']; ?>" class="form-control" id="title" placeholder="Enter title" required>
                    </div>
                    <div class="form-group">
                        <label for="photo">Publication Intro</label>
                        <textarea id="" class="form-control" name="intro" rows="6" required>
                            <?php echo $publication['intro']; ?>
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="photo">Publication Intro Image</label>
                        <input type="file" name="photo" class="form-control" id="photo">
                    </div>
                    <textarea id="summernote" name="body" required>
                        <?php echo $publication['body']; ?>
                    </textarea>
                    <input type="hidden" name="id" value="<?php echo $publication['id']; ?>">
                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.col-->
</div>
<!-- ./row -->