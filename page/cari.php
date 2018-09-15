<?php
$query = " select kamar.*,hotel.* from kamar JOIN hotel ON kamar.id_hotel=hotel.id_hotel where kamar.jenis_kamar LIKE '%$_POST[data]%' ";
$result = mysql_query($query) or die(mysql_error());
?>

<section class="main-content">
   <section>
<?php
   while($rows = mysql_fetch_object($result)) {
				?>
        <div class='box-kamar'>
            <div class="logo pull-left">
            <?php
                if (!empty($rows -> foto)) {
                    echo "<img src='upload/foto/$rows->foto' />";
                }
            ?>
            </div>
            <div class="judul-kamar" style='color: #007cff;'>Hotel <?php echo $rows->nama_hotel ?></div>
            <div class="judul-kamar"><?php echo $rows->jenis_kamar ?></div>
            <div class="fasilitas"><?php echo $rows->fasilitas?></div>
            <div class="box-tombol"> <a href='index.php?mod=chart&pg=check_in&action=add&id=<?php echo $rows->id_kamar?>' class='btn btn-primary btn-large'>Pesan Sekarang</a>
            <p><?php echo   get_status_stok($rows->jumlah_kamar)?></p>
        
           </div>
            <div class="detail">
            <div class="box-harga"><?php echo format_rupiah($rows->harga_kamar);?></div>
            </div>
        </div>
    <?php } ?>
        
   </section>
</section>