<?php

    include_once("function/koneksi.php");

	$barang_id = isset($_GET['id_barang']) ? $_GET['id_barang'] : false;
	
	$nama_barang = "";
	$id_kategori = "";
	$detail_barang = "";
	$gambar_barang = "";
	$stok_barang = "";
    $harga_barang = "";
    $keterangan_gambar = "";
    $status = "";
	$button = "Add";
	
	if($barang_id){
		$query = mysqli_query($koneksi, "SELECT * FROM barang WHERE barang_id='$barang_id'");
		$row = mysqli_fetch_assoc($query);
		
		$nama_barang = $row['nama_barang'];
		$id_kategori = $row['id_kategori'];
		$detail_barang = $row['detail_barang'];
		$gambar_barang = $row['gambar_barang'];
		$harga_barang = $row['harga_barang'];
        $stok_barang = $row['stok_barang'];
        $status = $row['status'];
		$button = "Update";
		
		$keterangan_gambar = "(Klik pilih gambar jika ingin mengganti gambar disamping)";
		$gambar_barang = "<img src='img/barang/$gambar_barang' style='width: 200px;vertical-align: middle;' />";
	}

?>

<script src="js/ckeditor/ckeditor.js"></script>

<form action="sys_items.php" method="POST" enctype="multipart/form-data">

    <div class="element-form">
        <label>Kategori</label>
        <span>
            <select name="id_kategori">
                <?php
					$query = mysqli_query($koneksi, "SELECT id_kategori, kategori FROM kategori WHERE status='on' ORDER BY kategori ASC");
					while($row=mysqli_fetch_assoc($query)){
						if($id_kategori == $row['id_kategori']){
							echo "<option value='$row[id_kategori]' selected='true'>$row[kategori]</option>";
						}else{
							echo "<option value='$row[id_kategori]'>$row[kategori]</option>";
						}
					}
				?>
            </select>

        </span>
    </div>

    <div class="element-form">
        <label>Nama Barang</label>
        <span><input type="text" name="nama_barang" value="<?php echo $nama_barang; ?>" /></span>
    </div>

    <div style="margin-bottom:10px">
        <label style="font-weight:bold">detail_barang</label>
        <span><textarea name="detail_barang" id="editor"><?php echo $detail_barang; ?></textarea></span>
    </div>

    <div class="element-form">
        <label>stok_barang</label>
        <span><input type="text" name="stok_barang" value="<?php echo $stok_barang; ?>" /></span>
    </div>

    <div class="element-form">
        <label>harga_barang</label>
        <span><input type="text" name="harga_barang" value="<?php echo $harga_barang; ?>" /></span>
    </div>

    <div class="element-form">
        <label>Gambar Produk <?php echo $keterangan_gambar; ?></label>
        <span>
            <input type="file" name="file" /> <?php echo $gambar_barang; ?>
        </span>
    </div>

    <div class="element-form">
        <label>Status</label>
        <span>
            <input type="radio" name="status" value="on" <?php if($status == "on"){ echo "checked='true'"; } ?> /> On
            <input type="radio" name="status" value="off" <?php if($status == "off"){ echo "checked='true'"; } ?> /> Off
        </span>
    </div>

    <div class="element-form">
        <span><input type="submit" name="button" value="<?php echo $button; ?>" /></span>
    </div>

</form>

<script>
CKEDITOR.replace("editor");
</script>