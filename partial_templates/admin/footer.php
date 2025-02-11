</div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Developed by Ajirinibi
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2022 <a href="https://ajirinibi.space">Ajirinibi</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>
<script src="../../assets/js/jquery-ui.min.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<script>
  $(function () {
    // Summernote
    // $('#summernote').summernote({
    //   imageUploadURL: '/controllers/summer_upload_handler.php',
      
    // })

    $('#summernote').summernote({
        callbacks: {
            onImageUpload: function(files) {
                for(let i=0; i < files.length; i++) {
                    // $.upload(files[i]);
                    console.log(files[i])

                    let out = new FormData();
                    out.append('file', files[i], files[i].name);

                    $.ajax({
                        method: 'POST',
                        url: '/controllers/summer_upload_handler.php',
                        contentType: false,
                        cache: false,
                        processData: false,
                        data: out,
                        success: function (img) {
                          console.log(img)
                            $('#summernote').summernote('insertImage', img);
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            console.error(textStatus + " " + errorThrown);
                        }
                    });
                }
            }
        },
        height: 500,
    });

    $.upload = function (file) {
        let out = new FormData();
        out.append('file', file, file.name);

        $.ajax({
            method: 'POST',
            url: '/controllers/summer_upload_handler.php',
            contentType: false,
            cache: false,
            processData: false,
            data: out,
            success: function (img) {
                $('#summernote').summernote('insertImage', img);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error(textStatus + " " + errorThrown);
            }
        });
    };
    
    function warn() {
      toastr.warning('Are you sure you want to delete this record?.')
    }
  })
</script>

<?php
  if(isset($_GET['success'])){
    echo "<script>toastr.success('".$_GET['success']."')</script>";
  }

  if(isset($_GET['error'])){
  echo "<script>toastr.error('".$_GET['error']."')</script>";
  }
?>


<div class="modal fade" id="modal-danger">
  <div class="modal-dialog">
    <div class="modal-content bg-danger">
      <div class="modal-header">
        <h4 class="modal-title">Delete Warning</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this record?</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-light" id="close-dialog" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-outline-light" id="continue">Continue</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<script>
  function deleteRecord(id, from){
    e = event
    event.preventDefault();
    // console.log(document.getElementById('delete_'+from+'_3'))
    document.getElementById('continue').onclick = function(){
      console.log(('delete_' + from + '_' + id))
      fetch('/controllers/delete_' + from+'.php?id=' + id,{
        method: 'POST'
      }).then(response=> response.json()).then( res => {
        $("#close-dialog").click()
        $("#" + from + id).toggle();
        toastr.success(from + " successfully deleted!")
      })
    }
  }
</script>

<script>
  $(function() {
    $('#draggable-box').draggable();
  });

  function updateImage(){

    $('.gallery-add-footer').css({
      'margin-top': '200px'
    })

    var file = document.getElementById('file').files[0];
    // console.log(file)

    document.getElementById('my-image').style.backgroundImage = 'url('+ URL.createObjectURL(file) + ')';

    domtoimage.toJpeg(document.getElementById('my-image'), { quality: 1 })
    .then(function (dataUrl) {
        // console.log(dataUrl)
        document.getElementById('my-image').style.opacity= '0'
        document.getElementById('my-img').setAttribute('src', dataUrl)
        document.getElementById('my-img').style.opacity= '1'
        document.getElementById('my-img').style.top= '0px'

    })
    // document.getElementById('my-image').setAttribute('src', dataURL)
  }

  function creatGallery() {
    event.preventDefault();
    
    var container = document.getElementById('container');
    var image = container.getElementsByTagName('img')[0];
    var box = document.getElementById('draggable-box');
    var rect = box.getBoundingClientRect();

    // Create a new canvas element
    var canvas = document.createElement('canvas');
    var ctx = canvas.getContext('2d');

    // Set the dimensions of the canvas to the dimensions of the crop box
    canvas.width = rect.width;
    canvas.height = rect.height;

    // Draw the cropped image onto the canvas
    ctx.drawImage(image, rect.left - 38, rect.top + 75 - 115, rect.width, rect.height, 0, 0, rect.width, rect.height);

    // Convert the canvas to a data URL and download the image
    var dataURL = canvas.toDataURL('image/png');
    // console.log(dataURL)
    // download(dataURL, 'cropped-image.png');

    if(document.getElementById('title').value == "" || document.getElementById('file').value == ""){
      toastr.error("All fields are required")
    }else{
      let formData = new FormData()
      formData.append('title', document.getElementById('title').value)
      formData.append('thumbnail', dataURL)
      formData.append('photo', document.getElementById('file').files[0])
      fetch('/controllers/store_gallery.php',{
        method: "POST",
        body: formData
      }).then(response=> response.text()).then(res=> {
        toastr.success(res)

        setTimeout(function(){
          window.location = '/admin/gallerys.php'
        }, 1000)
      })
    }
    
  }

  function updateGallery() {
    event.preventDefault();
    
    var container = document.getElementById('container');
    var image = container.getElementsByTagName('img')[0];
    var box = document.getElementById('draggable-box');
    var rect = box.getBoundingClientRect();

    // Create a new canvas element
    var canvas = document.createElement('canvas');
    var ctx = canvas.getContext('2d');

    // Set the dimensions of the canvas to the dimensions of the crop box
    canvas.width = rect.width;
    canvas.height = rect.height;

    // Draw the cropped image onto the canvas
    ctx.drawImage(image, rect.left - 38, rect.top + 75 - 115, rect.width, rect.height, 0, 0, rect.width, rect.height);

    // Convert the canvas to a data URL and download the image
    var dataURL = canvas.toDataURL('image/png');
    // console.log(dataURL)
    // download(dataURL, 'cropped-image.png');

    if(document.getElementById('title').value == "" || document.getElementById('file').value == ""){
      toastr.error("All fields are required")
    }else{
      let formData = new FormData()
      formData.append('title', document.getElementById('title').value)
      formData.append('thumbnail', dataURL)
      formData.append('id', document.getElementById('id').value)
      formData.append('photo', document.getElementById('file').files[0])
      fetch('/controllers/update_gallery.php',{
        method: "POST",
        body: formData
      }).then(response=> response.text()).then(res=> {
        toastr.success(res)

        setTimeout(function(){
          window.location = '/admin/gallerys.php'
        }, 1000)
      })
    }
    
  };

</script>
</body>
</html>
