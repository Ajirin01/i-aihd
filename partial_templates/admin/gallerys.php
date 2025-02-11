<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 style="float: left" class="card-title">Manage Gallery</h3>
                <a href="add_gallery"><h3 style="float: right; cursor: pointer" class="card-title">Add New <i class="fa fa-plus"></i></h3></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Title</th>
                        <th>Thumbnail</th>
                        <th>Actions</th>
                    </tr>
                  </thead>
                    <tbody>
                        <?php
                            include_once('../controllers/get_gallerys.php');
                            $counter = 1;
                            while ($gallery = $result->fetch_assoc()) {
                              $gallery_row_id = "gallery". $gallery['id'];
                              echo '<tr id="' . $gallery_row_id. '">';
                              echo '<td>' . $counter . '</td>';
                              echo '<td>' . $gallery['title'] . '</td>';
                              echo '<td><img style="width: 150px; height: 100px" src="/assets/images/gallery/' . $gallery['photo'] . '" alt="gallery thumbnail"></td>';
                              echo '<td>';
                              echo '<a class="text-warning" style="margin-right: 20px" href="edit_gallery.php?id=' . $gallery['id'] . '">Edit<i class="fa fa-pen"></i></a>';
                              echo '<a class="text-danger" data-toggle="modal" data-target="#modal-danger" href="delete_gallery.php?id=' . $gallery['id'] . '" onclick="deleteRecord(' . $gallery['id'] . ',' . "'gallery'" .  ')">Delete<i class="fa fa-trash"></i></a>';
                              echo '</td>';
                              echo '</tr>';
                              $counter++;
                            }
                        ?>
                    </tbody>
                  <tfoot>
                    <tr>
                        <th>S/N</th>
                        <th>Title</th>
                        <th>Thumbnail</th>
                        <th>Actions</th>
                        
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>