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
            Input nama baru (without ext)
            <input type="text" class="form-control form-control-lg" placeholder="{{ $datas->name }}" name="name">
          </div>
        </div>
        <input type="hidden" class="form-control form-control-lg" name="status" value="edited">
        <input type="hidden" class="form-control form-control-lg" name="kode_mk" value="{{$datas->kode_mk}}">
        <button type="submit" class="btn btn-primary">
            Post edit
        </button>
      </form>
    </div>
  </body>
</html>
