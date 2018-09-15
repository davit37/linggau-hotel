<?php
//cek_akses_langsung();
?>


<section class="main-content">



	<?php
	if(!empty($_GET['id_hotel'])){

	?>

	<section>
		<?php
$query2=null;
if(!empty($_GET['id_hotel'])){				
	$query2 = " SELECT map.kordinat, hotel.* FROM hotel LEFT JOIN map ON hotel.id_hotel=map.id_hotel where hotel.id_hotel=$_GET[id_hotel]";
}
$result2 = mysql_query($query2) or die(mysql_error());

//proses menampilkan data=
$rows1 = mysql_fetch_object($result2);
$kordinat=$rows1->kordinat;
if(empty($kordinat)){
	$kordinat='-3.2897627,102.8750166';
}
?>
			<div class="box-judul">
				<h4> Hotel
					<?php echo ucwords($rows1->nama_hotel)?>
					</h5>
					<i class="fas fa-map-marker-alt" style='font-size: 1.6em;color: #babac1; margin-right:0.4em;' ></i> 
				<span style="font-size: 1.3em; margin-bottom:1em;"> <?php echo $rows1->alamat?></span><br><br>
				<i class="fas fa-phone" style='font-size: 1.3em;color: #babac1; margin-right:0.4em;' ></i> 
				<span style="font-size: 1.2em;"> <?php echo $rows1->no_telpon?></span>

			</div>


			<div class=" boxslider">
				<!--news flash/slider -->
				<ul>


					<li>
						<img id='fotoSlide' src="upload/hotel/<?php echo $rows1 -> foto1 ?>" alt="" />

					</li>
				</ul>
				<div class="box-thubmnail">
					<ul>


						<li>
							<img src="upload/hotel/<?php echo $rows1 -> foto2 ?>" alt="" />

						</li>



						<li>
							<img src="upload/hotel/<?php echo $rows1 -> foto3 ?>" alt="" />

						</li>
						<li>
							<img src="upload/hotel/<?php echo $rows1 -> foto4 ?>" alt="" />

						</li>
					</ul>
				</div>
			</div>

			<div class='maps'>
				<div id="map"></div>
			</div>

			<div class='box-promo'>
				<?php
				include("inc\sidebar-front.php");
			?>
			</div>

			<div class="box-judul clear">
				<h4> Fasilitas</h5>
				<ul>
					<?php	
							$query2 = " select * from fasilitas_hotel JOIN hotel ON fasilitas_hotel.id_hotel=hotel.id_hotel JOIN fasilitas ON fasilitas_hotel.id_fasilitas=fasilitas.id_fasilitas Where hotel.id_hotel =$_GET[id_hotel]";
						?>
						<?php
						$result2 = mysql_query($query2) or die(mysql_error());

						//proses menampilkan data=
						
						while($rows2 = mysql_fetch_object($result2)) {
							$id=$rows2->id_fasilitas;
							$icon='';

							switch($id){
								case 1:
									$icon="<i class='fas fa-wifi' style='color: #92f57b;'></i>";
									break;
									case 2:
									$icon="<i class='fas fa-angle-double-left'></i>";
									break;
									case 3:
									$icon="<i class='fab fa-pied-piper-pp'></i>";
									break;
									case 4:
									$icon="<i class='fas fa-utensils'></i>";
									break;
									case 5:
									$icon="<i class='fas fa-people-carry'></i>";
									break;
									case 6:
									$icon="<i class='fas fa-people-carry'></i>";;
									break;
								default:
									echo"Halaman Tidak Ditemukan";
									break;
							}
							?>
							
								<li>
									<?php echo $icon." ".$rows2->nama_fasilitas ?>
								</li>
							

							<?php } ?>
							</ul>

			</div>


	</section>
	<?php }  ?>

	<div class="row">
		<div class="span9">
			<ul class="thumbnails listing-products">

				<?php 
				
				//Digunakan untuk membaca hak akses melalui level
			
				
				$query = " select kamar.*,hotel.*,  MIN(kamar.harga_kamar) from kamar JOIN hotel ON kamar.id_hotel=hotel.id_hotel GROUP by nama_hotel ";
				$id = $_GET['id_hotel'];
				if(!empty($id)){				
				$query = " select kamar.*,hotel.* from kamar JOIN hotel ON kamar.id_hotel=hotel.id_hotel where hotel.id_hotel=$id";
				?>
								<?php
				$result = mysql_query($query) or die(mysql_error());
				$no = 1;
				//proses menampilkan data=
				while($rows = mysql_fetch_object($result)) {
				?>

					<li class="span3">
						<div class="product-box">
							<span class="sale_tag"></span>
							<a href="">
								<?php
									if (!empty($rows -> foto)) {
										echo "<img style='height:230px; 'src='upload/foto/" . $rows -> foto . "' />";
									}
								?>
							</a>
							<br/>
							<a href="#" class="title">
								<?php echo $rows->jenis_kamar ?>
							</a>
							<br/>
							<a href="#" style="font-size:10px; " class="category">
								<?php echo $rows->fasilitas?>
							</a>
							<p class="price">
								<?php 
							
								echo format_rupiah($rows->harga_kamar);
							
							?>
							</p>
							<p>
								<span style="color:#ea4141;">
									<b>
										<?php echo   get_status_stok($rows->jumlah_kamar)?> </b>
								</span>
							</p>
							<?php
						
								if(!empty($_SESSION['idpelanggan']) && ($rows->jumlah_kamar>0)){ ?>
								<a href='index.php?mod=chart&pg=check_in&action=add&id=<?php echo $rows->id_kamar?>' class='btn btn-info'>Pesan</a>
								<?php }
						
								else if(!empty($_SESSION['idpelanggan']) && ($rows->jumlah_kamar<1)){
							echo"
									<br><br>
							";
						}?>
						</div>
					</li>
					<?php } ?>

					<?php }
 							else{
					?>
									<?php
				$result = mysql_query($query) or die(mysql_error());
				$no = 1;
				//proses menampilkan data=
				while($rows = mysql_fetch_object($result)) {
				?>

						<li class="span3">
							<div class="product-box">
								<span class="sale_tag"></span>
								<a href="<?php echo 'index.php?mod=page&pg=home&id_hotel='.$rows -> id_hotel?>">
									<?php
							if (!empty($rows -> foto)) {
								echo "<img style='height:230px; width:270px; 'src='upload/hotel/" . $rows -> foto1 . "' />";
							}
						?>
								</a>
								<br/>
								<a href="<?php echo 'index.php?mod=page&pg=home&id_hotel='.$rows -> id_hotel?>" class="title">Hotel
									<?php echo $rows->nama_hotel ?>
								</a>
								<br/>
								<a href="#" style="font-size:10px; " class="category">
									<?php echo $rows->fasilitas?>
								</a>
								<p class="price">
									<?php 
							
								echo format_rupiah($rows->harga_kamar);
							
							?>
								</p>
								<p>
									<span style="color:#ea4141;">
										<b>
											<?php echo   get_status_stok($rows->jumlah_kamar)?> </b>
									</span>
								</p>

							</div>
						</li>
						<?php } ?>

						<?php } ?>


						<div class='clearfix'>

						</div>





		</div>
		<?php
				if(empty($_GET['id_hotel'])){
				include("inc\sidebar-front.php");
			}
			?>
	</div>

</section>

<script>
	let fotoSlide = document.getElementById('fotoSlide');
	let gambar = ['upload/hotel/<?php echo $rows1->foto1 ?>', "upload/hotel/<?php echo $rows1 -> foto2 ?>",
		'upload/hotel/<?php echo $rows1->foto3 ?>', 'upload/hotel/<?php echo $rows1->foto4 ?>'
	]
	let counter = 0;

	function slide() {
		counter++;
		if (counter === 4) {
			counter = 0;
		}
		fotoSlide.setAttribute('src', gambar[counter]);
	}
	var interval;

	function show() {
		interval = setInterval(slide, 3000)

	}

	function stop() {
		clearInterval(interval);
	}


	window.addEventListener('load', show);
	fotoSlide.addEventListener('mouseover', stop);
	fotoSlide.addEventListener('mouseout', show)
</script>
<script>
	var customLabel = {
		restaurant: {
			label: 'R'
		},
		bar: {
			label: 'B'
		}
	};

	function initMap() {
		var map = new google.maps.Map(document.getElementById('map'), {
			center: new google.maps.LatLng(<?php echo $kordinat ?>),
			zoom: 17
		});
		var infoWindow = new google.maps.InfoWindow;

		// Change this depending on the name of your PHP or XML file
		downloadUrl('https://storage.googleapis.com/mapsdevsite/json/mapmarkers2.xml', function (data) {
			var xml = data.responseXML;
			var markers = xml.documentElement.getElementsByTagName('marker');
			Array.prototype.forEach.call(markers, function (markerElem) {
				var id = markerElem.getAttribute('id');
				var name = markerElem.getAttribute('name');
				var address = markerElem.getAttribute('address');
				var type = markerElem.getAttribute('type');
				var point = new google.maps.LatLng(
					parseFloat(markerElem.getAttribute('lat')),
					parseFloat(markerElem.getAttribute('lng')));

				var infowincontent = document.createElement('div');
				var strong = document.createElement('strong');
				strong.textContent = name
				infowincontent.appendChild(strong);
				infowincontent.appendChild(document.createElement('br'));

				var text = document.createElement('text');
				text.textContent = address
				infowincontent.appendChild(text);
				var icon = customLabel[type] || {};
				var marker = new google.maps.Marker({
					map: map,
					position: point,
					label: icon.label
				});
				marker.addListener('click', function () {
					infoWindow.setContent(infowincontent);
					infoWindow.open(map, marker);
				});
			});
		});
	}



	function downloadUrl(url, callback) {
		var request = window.ActiveXObject ?
			new ActiveXObject('Microsoft.XMLHTTP') :
			new XMLHttpRequest;

		request.onreadystatechange = function () {
			if (request.readyState == 4) {
				request.onreadystatechange = doNothing;
				callback(request, request.status);
			}
		};

		request.open('GET', url, true);
		request.send(null);
	}

	function doNothing() {}
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBMh-UbEM4XRYWpjdQPFG0lw9RV73LRBo4&callback=initMap">
</script>