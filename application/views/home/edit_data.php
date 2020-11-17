<div class="container-fluid">
	
	<h3><?php echo $title; ?></h3>
	<hr>
	<br>


	<form method="post" action="<?php echo base_url('Home/proses_edit_data') ?>">

    <input type="hidden" name="id" value="<?php echo $tb_jadwal['id']; ?>">

  <div class="form-group row">
    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="nama" required="" value="<?php echo $tb_jadwal['nama']; ?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="hari" class="col-sm-2 col-form-label">Hari</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="hari" required="" value="<?php echo $tb_jadwal['hari']; ?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="nama desa" class="col-sm-2 col-form-label">Nama Desa</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="nama desa" required="" value="<?php echo $tb_jadwal['nama_desa']; ?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="tanggal jaga" class="col-sm-2 col-form-label">Tanggal Jaga</label>
    <div class="col-sm-5">
      <input type="date" class="form-control" name="tanggal jaga" required="" value="<?php echo $tb_jadwal['tgl_jaga']; ?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="nama desa" class="col-sm-2 col-form-label"></label>
    <div class="col-sm-5">
      <button type="submit" class="btn btn-primary">Ubah</button>
      <button type="reset" class="btn btn-danger">Reset</button>
    </div>
  </div>

</form>

</div>
</div>