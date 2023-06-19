<?php 

 function formatRupiah($nominal)

 {
    if (is_string($nominal)) {
        return 'Rp. ' . number_format((float) $nominal, 0, ',', '.');
    } else {
        return 'Rp. ' . number_format($nominal, 0, ',', '.');
    }
 }

 function tanggal_indonesia($tanggal)
 {
     $tanggal = new DateTime($tanggal);
     $bulan = array(
         'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli',
         'Agustus', 'September', 'Oktober', 'November', 'Desember'
     );
     $bulan_index = $tanggal->format('n') - 1;
     $tahun = $tanggal->format('Y');

     return $tanggal->format('d') . ' ' . $bulan[$bulan_index] . ' ' . $tahun;
 }