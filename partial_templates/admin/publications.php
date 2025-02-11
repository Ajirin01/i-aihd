<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 style="float: left" class="card-title">Manage Publications</h3>
                <a href="add_publication"><h3 style="float: right; cursor: pointer" class="card-title">Add New <i class="fa fa-plus"></i></h3></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Title</th>
                        <th>Actions</th>
                    </tr>
                  </thead>
                    <tbody>
                        <?php
                            include_once('../controllers/get_publications.php');
                            $counter = 1;
                            while ($publication = $result->fetch_assoc()) {
                              $publication_row_id = "publication". $publication['id'];
                              echo '<tr id="' . $publication_row_id. '">';
                              echo '<td>' . $counter . '</td>';
                              echo '<td>' . $publication['title'] . '</td>';
                              echo '<td>';
                              echo '<a class="text-warning" style="margin-right: 20px" href="edit_publication.php?id=' . $publication['id'] . '">Edit<i class="fa fa-pen"></i></a>';
                              echo '<a class="text-danger" data-toggle="modal" data-target="#modal-danger" href="delete_publication.php?id=' . $publication['id'] . '" onclick="deleteRecord(' . $publication['id'] . ',' . "'publication'" .  ')">Delete<i class="fa fa-trash"></i></a>';
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