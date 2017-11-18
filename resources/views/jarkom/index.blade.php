<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Test</title>
  </head>
  <body>
    <div class="container">
      <h1>Upload file below!</h1>
      <p>File limit size is 1.9Mb</p>
      <table>
        <tr>
          <form class="" action="{{route('file.store')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <td><input type="file" name="file[]" value="" multiple></td>
            <td><input type="submit" name="" value="upload"></td>
          </form>
        </tr>
      </table>

      <h1>Your files!</h1>
      <table border="1">
        <tr>
          <th>NO</th>
          <th>FILE NAME</th>
          <th>SIZE</th>
          <th colspan="3">ACTION</th>
        </tr>
        <?php $number = 0; ?>
        @if(!$datas->isEmpty())
          @foreach($datas as $key)
            <?php
              $base = log($key->size, 1024);
              $suffixes = array('', 'K', 'M', 'G', 'T');
              $hasil = round(pow(1024, $base - floor($base)), 2) .' '. $suffixes[floor($base)];
            ?>
            <tr>
              <td>{{$number += 1}}</td>
              <td>{{$key->name}}</td>
              <td>{{$hasil}}</td>
              <td><a href="{{ route('file.download', [$key->id]) }}">Download</a></td>
              <td><a href="{{ route('file.edit', [$key->id]) }}">Edit</a></td>
              <td>
                <form class="" action="{{ route('file.destroy', [$key->id]) }}" method="post">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <button type="submit" name="button">Delete</button>
                </form>
              </td>
            </tr>
          @endforeach
        @else
          <tr>
            <td colspan="4">There are no data.</td>
          </tr>
        @endif
      </table>
    </div>
  </body>
</html>
