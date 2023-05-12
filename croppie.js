$(document).ready(function(){
      $image_crop = $('#image_demo').croppie({
        enableExif: true,
        viewport: {
          width: 200,
          height: 200,
          type: 'square' 
        },
        boundary:{
          width: 300,
          height: 300
        }
      });

      $('#upload_image').on('change', function(){
        var reader = new FileReader();
        reader.onload = function (event) {
          $image_crop.croppie('bind', {
            url: event.target.result
          }) 
        }
        reader.readAsDataURL(this.files[0]);
        $('#uploadimage').show();
        $('#myModal').modal('show')
      });

      $('.crop_image').click(function(event){
        $image_crop.croppie('result', {
          type: 'canvas',
          size: 'viewport'
        }).then(function(response){
          $.ajax({
            url: "guardar-img.php",
            type: "POST",
            data: {"image": response},
            success: function(data){
              $('#uploaded_image').html(data)
            }
          });
        })
      });

      
    });