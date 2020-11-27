<?php

    include_once("function/koneksi.php");    
    include_once("function/helper.php");

	$id_pesanan = $_GET["id_pesanan"];

	$query = mysqli_query($koneksi, "SELECT status FROM pesanan WHERE id_pesanan='$id_pesanan'");
	$gambar = mysqli_query($koneksi, "SELECT bukti_pembayaran FROM pembayaran WHERE id_pesanan='$id_pesanan'");
	$row=mysqli_fetch_assoc($query);
	$status = $row['status'];
    $gam=mysqli_fetch_assoc($gambar);
    if($gam != 0){
        $bukti = $gam['bukti_pembayaran'];
    
?>
<div class="bukti-pembayaran">
    <p>Bukti Pembayaran</p>
    <img class="img-fluid" src="img/bukti/<?php echo $bukti;?>" style="width: 200px;">
</div>
<?php 

    }
    
?>

<form action="sys_order.php?id_pesanan=<?php echo $id_pesanan; ?>" method="POST">

    <div class="element-form">
        <label>Pesanan Id (Faktur Id)</label>
        <span><input type="text" value="<?php echo $id_pesanan; ?>" name="id_pesanan" readonly /></span>
    </div>

    <div class="element-form">
        <label>Status</label>
        <span>
            <select name="status">
                <?php
				
					foreach($arrayStatusPesanan AS $key => $value){
						if($status == $key){
							echo "<option value='$key' selected='true'>$value</option>";
						}
						else{
							echo "<option value='$key'>$value</option>";
						}
					}
				
				?>
            </select>
        </span>
    </div>

    <div class="element-form">
        <span><input class="tombol-action" type="submit" value="Edit Status" name="button" /></span>
    </div>

</form>