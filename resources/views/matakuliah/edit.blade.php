@extends('layouts.mk')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Matakuliah edit</div>
                <div class="panel-body">
                  <form class="form-horizontal" role="form" method="POST" action="{{ route('matakuliah.edit.submit', [$datas->kode_mk]) }}">
                      {{ csrf_field() }}
                      {{ method_field('PUT') }}

                      <input type="hidden" name="assistant" value="{{ Auth::user()->id }}">
                      <div class="form-group{{ $errors->has('kode_mk') ? ' has-error' : '' }}">
                          <label for="kode_mk" class="col-md-4 control-label">KODE MK</label>
                          <div class="col-md-6">
                              <input id="kode_mk" type="text" class="form-control" name="kode_mk" value="{{$datas->kode_mk}}" required autofocus>
                              @if ($errors->has('kode_mk'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('kode_mk') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('nama_mk') ? ' has-error' : '' }}">
                          <label for="nama_mk" class="col-md-4 control-label">NAMA MK</label>
                          <div class="col-md-6">
                              <input id="nama_mk" type="text" class="form-control" name="nama_mk" value="{{$datas->nama_mk}}" required>
                              @if ($errors->has('nama_mk'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('nama_mk') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('sks') ? ' has-error' : '' }}">
                          <label for="sks" class="col-md-4 control-label">SKS</label>
                          <div class="col-md-6">
                              <input id="sks" type="text" class="form-control" name="sks" value="{{$datas->sks}}" required>
                              @if ($errors->has('sks'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('sks') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('seksi') ? ' has-error' : '' }}">
                          <label for="seksi" class="col-md-4 control-label">SEKSI</label>
                          <div class="col-md-6">
                              <input id="seksi" type="text" class="form-control" name="seksi" value="{{$datas->seksi}}" required>
                              @if ($errors->has('seksi'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('seksi') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('dosen') ? ' has-error' : '' }}">
                          <label for="dosen" class="col-md-4 control-label">DOSEN</label>
                          <div class="col-md-6">
                              <input id="dosen" type="text" class="form-control" name="dosen" value="{{$datas->dosen}}" required>
                              @if ($errors->has('dosen'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('dosen') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('lecture_started') ? ' has-error' : '' }}">
                        <label for="lecture_started" class="col-md-4 control-label">LC STARTED</label>
                        <div class="col-md-6">
                            <input id="lecture_started" type="time" class="form-control" name="lecture_started" value="{{ $datas->lecture_started }}" required>
                            @if ($errors->has('lecture_started'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('lecture_started') }}</strong>
                                </span>
                            @endif
                        </div>
                      </div>

                      <div class="form-group{{ $errors->has('lecture_finished') ? ' has-error' : '' }}">
                        <label for="lecture_finished" class="col-md-4 control-label">LC FINISHED</label>
                        <div class="col-md-6">
                            <input id="lecture_finished" type="time" class="form-control" name="lecture_finished" value="{{ $datas->lecture_finished }}" required>
                            @if ($errors->has('lecture_finished'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('lecture_finished') }}</strong>
                                </span>
                            @endif
                        </div>
                      </div>

                      <div class="form-group">
                          <div class="col-md-6 col-md-offset-4">
                              <button type="submit" class="btn btn-primary">
                                  Save
                              </button>
                              
                          </div>
                      </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
