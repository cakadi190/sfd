<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

  <style>
    .form-upload {
      display: flex;
    }

    .form-upload input {
      display: none;
    }

    .form-upload label {
      display: flex;
      justify-content: center;
      width: 100%;
      min-height: 10rem;
      align-items: center;
      border: 2px dashed #ababab;
      text-align: center;
      border-radius: .5rem;
      background: #f9f9f9;
      font-size: 1.75rem;
      font-weight: 600;
    }

    .form-upload label small {
      font-size: 1rem;
      font-weight: 400;
      display: block;
      margin-top: 0;
    }

  </style>

  <title>Testing</title>
</head>

<body class="bg-light">

  <div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">
      <div class="col-lg-8 col-sm-9">

        <form action="{{ url('debug') }}" enctype="multipart/form-data" id="upload" method="POST" class="card card-body border-0 shadow">
          @csrf

          <div class="row">
            <div class="col-md-6 mb-3">

              <div class="form-upload">
                <label for="ic_front"><span class="label">Upload file<br /><small>or Click Here</small></span></label>
                <input id="ic_front" onchange="preview(this)" name="ic_front" type="file" class="form-uploader" placeholder="Upload Berkas" />
              </div>

            </div>
            <div class="col-md-6 mb-3">

              <div class="form-upload">
                <label for="ic_back"><span class="label">Upload file<br /><small>or Click Here</small></span></label>
                <input id="ic_back" onchange="preview(this)" name="ic_back" type="file" class="form-uploader" placeholder="Upload Berkas" />
              </div>

            </div>

            <div class="col-md-4">
              <button type="button" onclick="uploadFile()" class="btn btn-primary">Upload</button>
            </div>
          </div>

        </form>

      </div>
    </div>
  </div>

  <!-- Core Javascript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.min.js"
    integrity="sha512-u9akINsQsAkG9xjc1cnGF4zw5TFDwkxuc9vUp5dltDWYCSmyd0meygbvgXrlc/z7/o4a19Fb5V0OUE58J7dcyw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <script>
    // Stopping Propagation ===========================================
    $(".form-upload label").on("dragover", function (e) {
      e.preventDefault();
      e.stopPropagation();
      $(this).find('span').text("Drag here");
    });
    $(".form-upload label").on("dragleave", function (e) {
      $(this).find('span').html("Upload file<br/><small>or Click Here</small>");
    });
    $(".form-upload label").on("mouseleave", function (e) {
      $(this).find('span').html("Upload file<br/><small>or Click Here</small>");
    });

    $("html").on("drop", function (e) {
      e.preventDefault();
      e.stopPropagation();
    });
    // Stopping Propagation ===========================================

    // Retrive file ===================================================
    function preview(input) {
      let those = input;
      let file  = those.files;

      if(file) {
        const reader = new FileReader();

        reader.onload = (res) => {
          $(those.parentNode).find('label').html('<img src="' + res.target.result + '" class="w-100 rounded m-3" />');
        }
        reader.readAsDataURL(file[0]);
      }
    }
    // Retrive file ===================================================

    // Dragged File ===================================================
    $('.form-upload label').on('drop', function(e) {
      let file = e.originalEvent.dataTransfer.files;
      let those = this;

      if(file) {
        const reader = new FileReader();

        reader.onload = (res) => {
          $(those.parentNode).find('label').html('<img src="' + res.target.result + '" class="w-100 rounded m-3" />');
        }
        reader.readAsDataURL(file[0]);
      }
    });
    // Dragged File ===================================================

    // Upload Button ==================================================
    async function uploadFile() {
      let icf = $('.form-upload:nth-child(1) img').attr('src');
      let icb = $('#ic_back').prop('files')[0];

      const data = new FormData();
      data.append('base64ImageString', icf);
      data.append('backImage', icb);
      data.append('journeyId', '24c39468-78eb-4fca-b4c9-4ec5b4677fdf');
      data.append('imageEnabled', false);
      data.append('imageFormat', 'png');
      data.append('docTypeEnabled', false);
      data.append('cambodia', false);
      data.append('faceImageEnabled', false);

      $.ajax({
        type : 'POST',
        data: data,
        dataType: 'json',
        processData: false,
        contentType: false,
        cache: false,
        url: 'https://cors-anywhere.herokuapp.com/https://ekycportaldemo.innov8tif.com/api/ekyc/okayid',
        headers: {
          Accept: '*',
          'Access-Control-Allow-Origin': '*'
        },

        success(response) {
          console.log(response);
        },

        eror(response) {
          console.log(response);
        }
      });
    }
    // Upload Button ==================================================
  </script>
</body>
</html>
