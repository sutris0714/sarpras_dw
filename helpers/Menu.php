<?php
/**
 * Menu Items
 * All Project Menu
 * @category  Menu List
 */

class Menu{
	
	
			public static $navbarsideleft = array(
		array(
			'path' => 'home', 
			'label' => 'Home', 
			'icon' => '<i class="fa fa-tachometer "></i>'
		),
		
		array(
			'path' => '', 
			'label' => 'SARPRAS DAPODIK', 
			'icon' => '<i class="fa fa-road "></i>','submenu' => array(
		array(
			'path' => 'tanah_bangunan', 
			'label' => 'Tanah Bangunan NEW', 
			'icon' => '<i class="fa fa-building-o "></i>'
		),
		
		array(
			'path' => '', 
			'label' => 'Ruang NEW', 
			'icon' => '<i class="fa fa-home "></i>','submenu' => array(
		array(
			'path' => 'ruang_kls', 
			'label' => 'Ruang Kelas', 
			'icon' => '<i class="fa fa-life-bouy "></i>'
		),
		
		array(
			'path' => 'ruang_kepsek_guru', 
			'label' => 'Ruang Kepsek/Guru', 
			'icon' => '<i class="fa fa-ge "></i>'
		),
		
		array(
			'path' => 'ruang_lab', 
			'label' => 'Ruang Laboratorium', 
			'icon' => '<i class="fa fa-ge "></i>'
		),
		
		array(
			'path' => 'ruang_perpustakaan', 
			'label' => 'Ruang Perpustakaan', 
			'icon' => '<i class="fa fa-pied-piper "></i>'
		),
		
		array(
			'path' => 'ruang_kamar_mandi_wc', 
			'label' => 'Kamar Mandi/WC', 
			'icon' => '<i class="fa fa-gg-circle "></i>'
		),
		
		array(
			'path' => 'ruang_penunjang', 
			'label' => 'Ruang Penunjang', 
			'icon' => '<i class="fa fa-indent "></i>'
		)
	)
		),
		
		array(
			'path' => '', 
			'label' => 'Alat, Angkutan & Buku', 
			'icon' => '<i class="fa fa-motorcycle "></i>','submenu' => array(
		array(
			'path' => 'alat', 
			'label' => 'Alat', 
			'icon' => '<i class="fa fa-key "></i>'
		),
		
		array(
			'path' => 'angkutan', 
			'label' => 'Angkutan', 
			'icon' => '<i class="fa fa-automobile "></i>'
		),
		
		array(
			'path' => 'buku', 
			'label' => 'Buku', 
			'icon' => '<i class="fa fa-book "></i>'
		)
	)
		)
	)
		),
		
		array(
			'path' => 'home', 
			'label' => 'Refresh', 
			'icon' => '<i class="fa fa-refresh "></i>'
		),
		
		array(
			'path' => 'pengajuan_barang', 
			'label' => 'Pengajuan Barang', 
			'icon' => '<i class="fa fa-ticket "></i>'
		),
		
		array(
			'path' => '', 
			'label' => 'Status Pengajuan Brng', 
			'icon' => '<i class="fa fa-shopping-basket "></i>','submenu' => array(
		array(
			'path' => 'barang_atk', 
			'label' => 'ATK', 
			'icon' => '<i class="fa fa-tags "></i>'
		),
		
		array(
			'path' => 'elektronik', 
			'label' => 'Elektronik', 
			'icon' => '<i class="fa fa-television "></i>'
		),
		
		array(
			'path' => 'lab_ipa', 
			'label' => 'Lab IPA', 
			'icon' => '<i class="fa fa-flask "></i>'
		),
		
		array(
			'path' => 'habis_pakai', 
			'label' => 'Habis Pakai', 
			'icon' => '<i class="fa fa-recycle "></i>'
		),
		
		array(
			'path' => 'barang_lainnya', 
			'label' => 'Lainnya', 
			'icon' => '<i class="fa fa-yelp "></i>'
		)
	)
		),
		
		array(
			'path' => 'user', 
			'label' => 'User', 
			'icon' => '<i class="fa fa-users "></i>'
		),
		
		array(
			'path' => 'app_logs', 
			'label' => 'App Logs', 
			'icon' => ''
		)
	);
		
	
	
			public static $kepemilikan = array(
		array(
			"value" => "Milik", 
			"label" => "Milik", 
		),
		array(
			"value" => "Sewa", 
			"label" => "Sewa", 
		),
		array(
			"value" => "Pinjam", 
			"label" => "Pinjam", 
		),
		array(
			"value" => "Bukan Milik", 
			"label" => "Bukan Milik", 
		),);
		
			public static $jenis_prasarana = array(
		array(
			"value" => "Kamar Mandi/WC Guru Laki-laki", 
			"label" => "Kamar Mandi/Wc Guru Laki-Laki", 
		),
		array(
			"value" => "Kamar Mandi/WC Guru Perempuan", 
			"label" => "Kamar Mandi/Wc Guru Perempuan", 
		),
		array(
			"value" => "Kamar Mandi/WC Siswa Laki-laki", 
			"label" => "Kamar Mandi/Wc Siswa Laki-Laki", 
		),
		array(
			"value" => "Kamar Mandi/WC Siswa Perempuan", 
			"label" => "Kamar Mandi/Wc Siswa Perempuan", 
		),);
		
			public static $jenis_prasarana2 = array(
		array(
			"value" => "Ruang Teori/Kelas", 
			"label" => "Ruang Teori/Kelas", 
		),);
		
			public static $yg_mengajukan = array(
		array(
			"value" => "Anastasia Rina Puspita", 
			"label" => "Anastasia Rina Puspita", 
		),
		array(
			"value" => "Arief Setiawan Mukti R.", 
			"label" => "Arief Setiawan Mukti R.", 
		),
		array(
			"value" => "Bartholomeus Yosua Lina", 
			"label" => "Bartholomeus Yosua Lina", 
		),
		array(
			"value" => "Bonefasius Banterang", 
			"label" => "Bonefasius Banterang", 
		),
		array(
			"value" => "Caroline Rossiani", 
			"label" => "Caroline Rossiani", 
		),
		array(
			"value" => "Fransiskus Jon", 
			"label" => "Fransiskus Jon", 
		),
		array(
			"value" => "Gabriel Frans Posenti", 
			"label" => "Gabriel Frans Posenti", 
		),
		array(
			"value" => "Iswanta", 
			"label" => "Iswanta", 
		),
		array(
			"value" => "JOSUA KRISTOFER", 
			"label" => "Josua Kristofer", 
		),
		array(
			"value" => "Lamria Tambunan", 
			"label" => "Lamria Tambunan", 
		),
		array(
			"value" => "Laurentius Edy Wuryanto", 
			"label" => "Laurentius Edy Wuryanto", 
		),
		array(
			"value" => "LIMBERTUS UMBER", 
			"label" => "Limbertus Umber", 
		),
		array(
			"value" => "Margaretha Hermin K", 
			"label" => "Margaretha Hermin K", 
		),
		array(
			"value" => "Maria Titi Hapsari", 
			"label" => "Maria Titi Hapsari", 
		),
		array(
			"value" => "Morlen Simbolon", 
			"label" => "Morlen Simbolon", 
		),
		array(
			"value" => "Sutrisno", 
			"label" => "Sutrisno", 
		),
		array(
			"value" => "Theresia Tutik Susanti", 
			"label" => "Theresia Tutik Susanti", 
		),
		array(
			"value" => "Yohanes Wakidi", 
			"label" => "Yohanes Wakidi", 
		),
		array(
			"value" => "Yoyu Rachmawati Wirja", 
			"label" => "Yoyu Rachmawati Wirja", 
		),
		array(
			"value" => "Fx. Anung Herwanto", 
			"label" => "Fx. Anung Herwanto", 
		),
		array(
			"value" => "Suharto", 
			"label" => "Suharto", 
		),
		array(
			"value" => "Deni Sugeng Riadi", 
			"label" => "Deni Sugeng Riadi", 
		),);
		
			public static $tipe_barang = array(
		array(
			"value" => "ATK", 
			"label" => "Atk", 
		),
		array(
			"value" => "Elektronik", 
			"label" => "Elektronik", 
		),
		array(
			"value" => "Lab IPA", 
			"label" => "Lab Ipa", 
		),
		array(
			"value" => "Habis Pakai", 
			"label" => "Habis Pakai", 
		),
		array(
			"value" => "Lainnya", 
			"label" => "Lainnya", 
		),);
		
			public static $keterangan = array(
		array(
			"value" => "Terealisasi", 
			"label" => "Terealisasi", 
		),
		array(
			"value" => "Belum", 
			"label" => "Belum", 
		),);
		
			public static $keterangan2 = array(
		array(
			"value" => "Sudah Terealisasi", 
			"label" => "Terealisasi", 
		),
		array(
			"value" => "Belum Terealisasi", 
			"label" => "Belum Terealisasi", 
		),);
		
			public static $level = array(
		array(
			"value" => "Administrator", 
			"label" => "Administrator", 
		),
		array(
			"value" => "User", 
			"label" => "User", 
		),);
		
}