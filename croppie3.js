document.addEventListener('DOMContentLoaded', function() {
  var uploadCrop = new Croppie(document.getElementById('upload-demo'), {
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
    enableOrientation: true
  });

  document.getElementById('inputImagen').addEventListener('change', function(e) {
    var file = e.target.files[0];
    var reader = new FileReader();

    reader.onload = function(e) {
      uploadCrop.bind({
        url: e.target.result
      });
      document.getElementById('myModal').classList.add('show');
    }

    reader.readAsDataURL(file);
  });

  document.getElementById('rotateLeft').addEventListener('click', function() {
    uploadCrop.rotate(-90);
  });

  document.getElementById('cropImage').addEventListener('click', function(e) {
    uploadCrop.result({
      type: 'canvas',
      size: 'viewport'
    }).then(function(response) {
      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'guardar-img.php', true);
      xhr.setRequestHeader('Content-Type', 'application/json');
      xhr.onload = function() {
        if (xhr.status === 200) {
          document.getElementById('uploaded_image').innerHTML = xhr.responseText;
        }
      };
      xhr.send(JSON.stringify({ image: response }));
      document.getElementById('myModal').classList.remove('show');
    });
  });
});
