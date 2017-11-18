@extends('layouts.app')

@section('content')
<div class="container">
  @if (session('status'))
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
  @endif
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Matakuliah</div>

                <div class="panel-body">
                  <table border="1">
                    <tr>
                      <th>NO</th>
                      <th>KODE MK</th>
                      <th>NAMA MK</th>
                      <th>SKS</th>
                      <th>SEKSI</th>
                      <th>DOSEN</th>
                      <th colspan="2">LC STARTED-FINISHED</th>
                      @if(Auth::user())
                        <th colspan="2">ACTION</th>
                      @endif
                    </tr>
                    <?php $number = 0; ?>
                    @if(!$datas->isEmpty())
                      @foreach($datas as $key)
                        <tr>
                          <td>{{$number += 1}}</td>
                          <td>{{$key->kode_mk}}</td>
                          <td>{{$key->nama_mk}}</td>
                          <td>{{$key->sks}}</td>
                          <td>{{$key->seksi}}</td>
                          <td>{{$key->dosen}}</td>
                          <td>{{$key->lecture_started}}</td>
                          <td>{{$key->lecture_finished}}</td>
                          @if(Auth::user())
                          <td><a href="{{ route('matakuliah.edit', [$key->kode_mk]) }}" class="btn btn-primary">Edit</a></td>
                          <td>
                            <form class="" action="{{ route('matakuliah.destroy', [$key->kode_mk]) }}" method="post">
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
                        <td colspan="8">There are no data.</td>
                      </tr>
                    @endif
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
