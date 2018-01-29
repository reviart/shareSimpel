<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>tugas_mahasiswa</title>
  </head>
  <body>
    <form class="" role="form" method="post" action="{{route('tugas.store')}}">
      {{csrf_field()}}
      <input type="text" name="nim" value="" placeholder="nim"><br>
      <input type="text" name="nama" value="" placeholder="nama">
        <div class="form-group">
          <label for="sel1">Select matakuliah :</label>
          <select class="form-control" id="sel1" name="matakuliah">
            <option>Pilih satu</option>
            <option value="JARINGANKOMPUTER">JARINGAN KOMPUTER</option>
            <option value="SISTEMBASISDATA">SISTEM BASIS DATA</option>
          </select>
        </div>
        <br>
      <input type="file" name="file"><br>
      <input type="submit" name="submit" value="submit">
    </form>

  </body>
</html>
