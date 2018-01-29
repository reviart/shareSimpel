<form class="" role="form" method="post" action="{{route('file.store.submit')}}" enctype="multipart/form-data">
  {{csrf_field()}}
    <div class="form-group">
      <label for="sel1">Select matakuliah :</label>
      <select class="form-control" id="sel1" name="matakuliah">
        <option>Pilih satu</option>
          @foreach($datas as $data)
            <option value="{{$data->kode_mk}}">{{$data->nama_mk}}</option>
          @endforeach

        {{--<option value="C31040315">JARINGAN KOMPUTER</option>
        <option value="C31040311">SISTEM BASIS DATA</option>--}}

      </select>
    </div>
    <br>
  <input type="file" name="file[]" value="" multiple>
  <input type="submit" name="submit" value="upload">
</form>
