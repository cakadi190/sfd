<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />

  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}" />

</head>
<body>

  <script src="{{ asset('js/app.js') }}"></script>
  <script>
    $.ajax({
      type: 'post',
      'cache': false,
      "async": true,
      "crossDomain": true,
      data: JSON.stringify({username: 'sfdirect_trial', password: 'S1f2d3!@#'}),
      dataType: "json",
      url: 'https://ekycportaldemo.innov8tif.com/api/ekyc/journeyid',
      headers: {
        "Content-Type": "application/json",
        "Accept": "application/json",
        "Access-Control-Allow-Origin": "*",
        'X-CSRF-TOKEN': '{{ csrf_token() }}',
        "Access-Control-Allow-Headers": "Content-Type",
        "Access-Control-Allow-Methods": "GET, POST, PUT, DELETE",
        "Access-Control-Allow-Headers": "Authorization"
      },

      success: function(response) {
        console.log(response);
      },
      error: function(response) {
        console.log(response);
      }
    });
  </script>

</body>
</html>
