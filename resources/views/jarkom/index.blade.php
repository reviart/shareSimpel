@extends('layouts.mk')

@section('content')
<div class="container">

  @if (session('status'))
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
  @elseif (session('warning'))
      <div class="alert alert-warning">
          {{ session('warning') }}
      </div>
  @else
  @endif

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                  Jaringan Komputer Files
                  @if(Auth::user())
                    <a href="{{ route('file.store') }}" data-toggle="modal" class="btn btn-primary">Tambah file</a>
                  @endif
                </div>
                <center>
                  <div class="panel-body">
                    <table border="1">
                    <tr>
                      <th>NO</th>
                      <th>NAMA FILE</th>
                      <th>UKURAN</th>
                      <?php
                        $col = 0;
                        if (Auth::user()) {
                          $col = 3;
                        }
                      ?>
                      <th colspan="<?php echo $col; ?>">ACTION</th>
                    </tr>
                    <?php $number = 0; ?>
                    @if(!$files->isEmpty())
                      @foreach($files as $key)
                      <?php
                        $base = log($key->size, 1024);
                        $suffixes = array('', 'K', 'M', 'G', 'T');
                        $hasil = round(pow(1024, $base - floor($base)), 2) .' '. $suffixes[floor($base)];
                      ?>
                        <tr>
                          <td>{{$number += 1}}</td>
                          <td>{{$key->name}}</td>
                          <td>{{$hasil}}</td>
                          <td><a href="{{ route('file.download', [$key->id]) }}" class="btn btn-primary">Download</a></td>
                          @if(Auth::user())
                            <td><a href="{{ route('file.edit', [$key->id]) }}" class="btn btn-primary">Edit</a></td>
                            <td>
                              <form class="" action="{{ route('file.destroy', [$key->id]) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" name="button" class="btn btn-danger">Delete</button>
                              </form>
                            </td>
                          @endif
                        </tr>
                      @endforeach
                    @else
                      <tr>
                        <td colspan="4">
                          <center>There are no data.</center>
                        </td>
                      </tr>
                    @endif
                  </table>
                  </div>
                </center>
            </div>
        </div>
    </div>

</div>
@endsection
