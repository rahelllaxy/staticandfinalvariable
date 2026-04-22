<?php

class Pengunjung {
    
    public static $jumlah = 0;
    
    // Method ini akan otomatis dijalankan setiap kali objek baru dibuat (new Pengunjung)
    public function __construct() {
        self::$jumlah++;
    }

    // Method baru untuk mereset jumlah
    public static function reset() {
        self::$jumlah = 0;
    }
}

// 1. Mengubah jumlah objek menjadi 5
$p1 = new Pengunjung();
$p2 = new Pengunjung();
$p3 = new Pengunjung();
$p4 = new Pengunjung();
$p5 = new Pengunjung();

// 2. Menampilkan hasil sebelum di-reset
echo "Jumlah Pengunjung sebelum reset: " . Pengunjung::$jumlah . "\n";

// Memanggil method reset
Pengunjung::reset();

// 3. Menampilkan hasil sesudah di-reset
echo "Jumlah Pengunjung sesudah reset: " . Pengunjung::$jumlah . "\n";

?>