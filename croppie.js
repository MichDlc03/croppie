$(document).ready(function() {
    var $uploadCrop = $('#upload-demo').croppie({
      enableExif: true,
      viewport: {
        width: 200,
        height: 200,
        type: 'square'
      },
      boundary: {
        width: 300,
        height: 300
      }
    });

    $('#inputImagen').on('change', function(e) {
      var file = e.target.files[0];
      var reader = new FileReader();

      reader.onload = function(e) {
        $uploadCrop.croppie('bind', {
          url: e.target.result
        });
        $('#myModal').modal('show');
      }

      reader.readAsDataURL(file);
    });

    $('#cropImage').on('click', function(e) {
      $uploadCrop.croppie('result', {
        type: 'canvas',
        size: 'viewport'
      }).then(function(response) {
        $.ajax({
          url: "guardar-img.php",
          type: "POST",
          data: {"image": response},
          success: function(data) {
            $('#uploaded_image').html(data);
          }
        });
        // Cerrar el modal
        $('#myModal').modal('hide');
      });
    });
  });