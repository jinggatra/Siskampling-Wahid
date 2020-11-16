<div class="container-fluid">
	
	<h3><?php echo $title; ?></h3>
	<hr>
	<br>


	<form method="post" action="<?php echo base_url('Home/proses_edit_data') ?>">

    <input type="hidden" name="id" value="<?php echo $mahasiswa['id']; ?>">

  <div class="form-group row">
    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="nama" required="" value="<?php echo $mahasiswa['nama']; ?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="nim" class="col-sm-2 col-form-label">Nim</label>
    <div class="col-sm-5">
      <input type="number" class="form-control" name="nim" required="" value="<?php echo $mahasiswa['nim']; ?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="alamat" required="" value="<?php echo $mahasiswa['alamat']; ?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="alamat" class="col-sm-2 col-form-label"></label>
    <div class="col-sm-5">
      <button type="submit" class="btn btn-primary">Ubah</button>
      <button type="reset" class="btn btn-danger">Reset</button>
    </div>
  </div>

</form>

</div>
</div>