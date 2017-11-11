<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>sdsdsds</title>
  </head>
  <body>
    <div class="container">
      <form method="post" action="{{ route('file.edit.submit', [$datas->id]) }}">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        <div class="form-group row">
          <div class="col-sm-10">
            <input type="text" class="form-control form-control-lg" placeholder="{{ $datas->name }}" name="name">
          </div>
        </div>
        <button type="submit" class="btn btn-primary">
            Post edit
        </button>
      </form>
    </div>
  </body>
</html>
