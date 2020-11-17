<div class="container-fluid">
	
	<h3><?php echo $title; ?></h3>
	<hr>
	<br>


	<form method="post" action="<?php echo base_url('Home/proses_tambah_data') ?>">
  <div class="form-group row">
    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="nama" required="">
    </div>
  </div>

  <div class="form-group row">
    <label for="nim" class="col-sm-2 col-form-label">Hari</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="hari" required="">
    </div>
  </div>

  <div class="form-group row">
    <label for="alamat" class="col-sm-2 col-form-label">Nama Desa</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="nama desa" required="">
    </div>
  </div>

  <div class="form-group row">
    <label for="alamat" class="col-sm-2 col-form-label">Tanggal Jaga</label>
    <div class="col-sm-5">
      <input type="date" class="form-control" name="tanggal jaga" required="">
    </div>
  </div>

  <div class="form-group row">
    <label for="alamat" class="col-sm-2 col-form-label"></label>
    <div class="col-sm-5">
      <button type="submit" class="btn btn-primary">Tambah</button>
      <button type="reset" class="btn btn-danger">Reset</button>
    </div>
  </div>

</form>

</div>
</div>