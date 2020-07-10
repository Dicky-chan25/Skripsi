<div class="container-fluid">
<div class="alert alert-success" role="alert">
    <i class="fas fa-university"></i> Form Tambah Siswa
</div>

    <?php echo form_open_multipart('administrator/siswa/tambah_siswa_aksi')?>
    
        
        <div class="form-group">
            <lable>Nama</lable>
            <input type ="text" name="name"
            placeholder="Masukan Nama Lengkap" class="form-control">
            <?php echo form_error('name','<div class="text-danger small" ml-3>')?>
        </div>

        <div class="form-group">
            <lable>Email</lable>
            <input type ="text" name="email"
            placeholder="Masukan Email" class="form-control">
            <?php echo form_error('email','<div class="text-danger small" ml-3>')?>
        </div>

        <div class="form-group">
            <lable>NISN</lable>
            <input type ="text" name="nisn"
            placeholder="Masukan NISN" class="form-control">
            <?php echo form_error('nisn','<div class="text-danger small" ml-3>')?>
        </div>

        <div class="form-group">
            <lable>Jenis Kelamin</lable>
            <select name="kelamin" class="form-control">
                <option >Laki-laki</option>
                <option >Perempuan</option></select>
            <?php echo form_error('kelamin','<div class="text-danger small" ml-3>')?>
        </div>

        <div class="form-group">
            <lable>Tempat Lahir</lable>
            <input type ="text" name="tempat_lahir"
            placeholder="Masukan Tempat Lahir" class="form-control">
            <?php echo form_error('tempat_lahir','<div class="text-danger small" ml-3>')?>
        </div>

        <div class="form-group">
            <lable>Tanggal Lahir</lable>
            <input type ="date" name="tanggal_lahir"
            placeholder="Masukan Nama Lengkap" class="form-control">
            <?php echo form_error('tanggal_lahir','<div class="text-danger small" ml-3>')?>
        </div>

        <div class="form-group">
            <lable>Agama</lable>
            <select name="agama" class="form-control">
                <option >Islam</option>
                <option >Hindu</option>
                <option >Budha</option>
                <option >Kristen</option></select>
            <?php echo form_error('agama','<div class="text-danger small" ml-3>')?>
        </div>

        <div class="form-group">
            <lable>Alamat</lable>
            <input type ="text" name="alamat"
            placeholder="Masukan Alamat" class="form-control">
            <?php echo form_error('alamat','<div class="text-danger small" ml-3>')?>
        </div>

        <div class="form-group">
            <lable>Photo</lable><br>
            <input type="file" name="image">
            <?php echo form_error('alamat','<div class="text-danger small" ml-3>')?>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>

        <?php form_close();?>

        
    </form>

</div>
</div>
      <!-- End of Main Content -->

<div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright © Website Sekolah 2020</span>
    </div>
  </div>