<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Test</title>
  </head>
  <body>
    <div class="col-lg-offset-4 col-lg-4">
      <h1>Upload file below!</h1>
      <form class="" action="{{route('upload.store')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="file" name="img" value="">
        <br>
        <input type="submit" name="" value="upload">
      </form>
    </div>
  </body>
</html>
