<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">
                Add Publication
                </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="/controllers/store_publication" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title">Publication title</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Enter title" required>
                    </div>

                    <div class="form-group">
                        <label for="photo">Publication Intro</label>
                        <textarea id="" class="form-control" name="intro" rows="6" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="photo">Publication Intro Image</label>
                        <input type="file" name="photo" class="form-control" id="photo" required>
                    </div>

                    <textarea id="summernote" name="body" required>
                        
                    </textarea>

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