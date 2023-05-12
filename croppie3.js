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
      },
      enableOrientation: true // Habilitar la orientación en Croppie
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
  
    $('#rotateLeft').on('click', function() {
      $uploadCrop.croppie('rotate', -90); 
    });
  
    $('#rotateRight').on('click', function() {
      $uploadCrop.croppie('rotate', 90);
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
        $('#myModal').modal('hide');
      });
    });
  });