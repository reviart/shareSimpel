<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Test</title>
  </head>
  <body>
    <div class="col-lg-offset-4 col-lg-4">
      <h1>Upload file below!</h1>
      <form class="" action="{{route('file.store')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="file" name="file[]" value="" multiple>
        <br>
        <input type="submit" name="" value="upload">
      </form>
    </div>
    <div class="container">
      <h1>Your files!</h1>
      <div class="row">
        <?php $number = 1; ?>
        @if(!empty($datas))
          @foreach($datas as $key)
            <?php echo $number++; ?>
            {{$key->name}}
            {{$key->size}}Bit
            <a href="{{ route('file.download', [$key->id]) }}">Download</a>
            <a href="{{ route('file.edit', [$key->id]) }}">Edit</a>
            <form class="" action="{{ route('file.destroy', [$key->id, $key->name]) }}" method="post">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
              <button type="submit" name="button">Delete</button>
            </form>
            <br>
          @endforeach
        @else
          <p>There are no data.</p>
        @endif
      </div>
    </div>
  </body>
</html>
