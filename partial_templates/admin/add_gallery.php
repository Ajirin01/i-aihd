<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">
                    Add Gallery
                </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="/controllers/store_gallery" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Gallery title</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Enter title">
                    </div>

                    <input type="file" name="" id="file" onchange="updateImage()">
                    
                    <div id="container">
                        <div id="my-image" class="img-cont" ></div>
                        <div id="draggable-box" style="z-index: 1000"></div>
                        <img src="" id="my-img" alt="" style="opacity: 0; position: absolute; top: 0; z-index: 500;">
                    </div>
                    
                    <!-- <br><br><br><br><br><br> <br><br><br><br> -->
                    

                    <div class="card-footer gallery-add-footer">
                        <button id="create-gallery" class="btn btn-primary" onclick="creatGallery()">Submit</button>
                        <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.col-->
</div>
<!-- ./row -->