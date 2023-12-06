<form action="<?php echo base_url('anggota/update');?>" method="post">
    <label>Anggota</label>
    <input type="text" name="anggota" value="<?php echo $anggota?>">
    <input type="hidden" name="idanggota" value="<?php echo $idanggota?>">
    <br>
    <label>Alamat</label>
    <input type="text" name="alamat" value="<?php echo $alamat?>">
    <br>
    <input type="submit" name="simpan">
</form>