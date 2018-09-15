<ul class="nav nav-list">
	<li class="active">
		<a href="index.php">
			<i class="icon-dashboard"></i>
			<span>Master Data</span>
		</a>
	</li>
	<li>
		<a href="#" class="dropdown-toggle">
			<i class="icon-list"></i>
			<span>Pendataan Hotel</span>

			<b class="arrow icon-angle-down"></b>
		</a>

		<ul class="submenu">
		<?php if($_SESSION['status']==0){
			echo"
			<li>
				<a href='index.php?mod=hotel&pg=hotel_view'>
					<i class='icon-double-angle-right'></i>
					Hotel
				</a>
			</li>";

		}?>
			<li>
				<a href="index.php?mod=kamar&pg=kamar_view">
					<i class="icon-double-angle-right"></i>
					Kamar Hotel
				</a>
			</li>
			<li>
				<a href="index.php?mod=fasilitas&pg=fasilitas_view">
					<i class="icon-double-angle-right"></i>
					Data Fasilitas
					
				</a>
			</li>
			<li>
				<a href="index.php?mod=map&pg=map_view">
					<i class="icon-double-angle-right"></i>
					Peta hotel
					
				</a>
			</li>



		</ul>
	</li>
	<li>
		<a href="#" class="dropdown-toggle">
			<i class="icon-desktop"></i>
			<span>Informasi</span>

			<b class="arrow icon-angle-down"></b>
		</a>

		<ul class="submenu">
			<li>
				<a href="index.php?mod=berita&pg=berita_view">
					<i class="icon-double-angle-right"></i>
					Berita / Promo
				</a>
			</li>


		</ul>
	</li>


	<li>
		<a href="#" class="dropdown-toggle">
			<i class="icon-user"></i>
			<span> Tamu</span>

			<b class="arrow icon-angle-down"></b>
		</a>

		<ul class="submenu">
			<li>
				<a href="index.php?mod=pelanggan&pg=pelanggan_view">
					<i class="icon-double-angle-right"></i>
					Data Pelanggan
				</a>
			</li>
			
		</ul>
	</li>



	<li>
		<a href="#" class="dropdown-toggle">
			<i class="icon-pencil"></i>
			<span> Transaksi</span>

			<b class="arrow icon-angle-down"></b>
		</a>

		<ul class="submenu">
			<li>
				<a href="index.php?mod=invoice&pg=invoice_view">
					<i class="icon-double-angle-right"></i>
					Data Transaksi
				</a>
			</li>

			<li>
				<a href="index.php?mod=bukti&pg=konfirmasi_view">
					<i class="icon-double-angle-right"></i>
					Bukti Pembayaran
				</a>
			</li>
			


		</ul>
	</li>

	<li>
		<a href="#" class="dropdown-toggle">
			<i class="icon-cog"></i>
			<span>Pengaturan</span>

			<b class="arrow icon-angle-down"></b>
		</a>

		<ul class="submenu">
		<?php if($_SESSION['status']==0){
			echo"
			<li>
				<a href='index.php?mod=pengelola&pg=admin_view'>
					<i class='icon-double-angle-right'></i>
					admin
				</a>
			</li>
			<li>
				<a href='index.php?mod=pengelola&pg=pengelola_view'>
					<i class='icon-double-angle-right'></i>
					pengelola hotel
				</a>
			</li>
			
			";
		}
		?>
			<li>
				<a href="index.php?mod=login&pg=cp_form">
					<i class="icon-double-angle-right"></i>
					Change Password
				</a>
			</li>
			<li>
				<a href="login/logout.php">
					<i class="icon-double-angle-right"></i>
					Logout
				</a>
			</li>



		</ul>
	</li>
</ul>
<!--/.nav-list-->

<div id="sidebar-collapse">
	<i class="icon-double-angle-left"></i>
</div>