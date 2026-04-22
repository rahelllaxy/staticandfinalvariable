<?php
/**
 * SISTEM PRODUK & TRANSAKSI (VERSION 2.0)
 * Didesain dengan Output Dashboard yang Rapi
 */

class Produk {
    // Properti Statis (Milik Class)
    public static $jumlahProduk = 0;
    
    // Properti Objek
    public $nama;
    public $harga;
    public $kategori;

    public function __construct($nama, $harga, $kategori) {
        $this->nama = $nama;
        $this->harga = $harga;
        $this->kategori = $kategori;
        self::tambahCounter();
    }

    private static function tambahCounter() {
        self::$jumlahProduk++;
    }
}

class Transaksi {
    // Final Method agar tidak bisa diubah di class turunan
    public final function prosesTransaksi($produk, $qty) {
        $total = $produk->harga * $qty;
        $tanggal = date("d M Y, H:i");
        
        // Return string dalam format HTML untuk tampilan rapi
        return "
        <div class='receipt'>
            <div class='receipt-header'>STRUK TRANSAKSI</div>
            <div class='receipt-body'>
                <p><span>Produk:</span> <strong>{$produk->nama}</strong></p>
                <p><span>Harga Satuan:</span> Rp " . number_format($produk->harga, 0, ',', '.') . "</p>
                <p><span>Jumlah Beli:</span> x {$qty}</p>
                <hr>
                <p class='total'><span>TOTAL BAYAR:</span> Rp " . number_format($total, 0, ',', '.') . "</p>
            </div>
            <div class='receipt-footer'>{$tanggal}</div>
        </div>";
    }
}

// Inisialisasi Data
$listProduk = [
    new Produk("MacBook Pro M3", 28500000, "Laptop"),
    new Produk("Logitech MX Master", 1200000, "Aksesoris"),
    new Produk("Keychron K2 V2", 1550000, "Aksesoris"),
    new Produk("Dell UltraSharp 27", 7800000, "Monitor")
];

$kasir = new Transaksi();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Inventaris & Kasir</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f4f7f6; color: #333; padding: 40px; }
        .container { max-width: 900px; margin: auto; }
        .card { background: white; padding: 25px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); margin-bottom: 30px; }
        h2 { border-bottom: 2px solid #e2e8f0; padding-bottom: 10px; color: #2d3748; }
        
        /* Gaya Tabel */
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th { background: #4a5568; color: white; text-align: left; padding: 12px; }
        td { padding: 12px; border-bottom: 1px solid #edf2f7; }
        tr:hover { background: #f7fafc; }
        .badge { background: #ebf8ff; color: #3182ce; padding: 4px 8px; border-radius: 6px; font-size: 12px; font-weight: bold; }

        /* Gaya Struk Transaksi */
        .receipt { background: #fff; border: 1px dashed #cbd5e0; width: 300px; padding: 20px; border-radius: 4px; display: inline-block; vertical-align: top; margin-right: 15px; margin-bottom: 15px; }
        .receipt-header { text-align: center; font-weight: bold; font-size: 18px; margin-bottom: 15px; }
        .receipt-body p { margin: 5px 0; display: flex; justify-content: space-between; font-size: 14px; }
        .receipt-body span { color: #718096; }
        .total { font-size: 16px !important; color: #2d3748 !important; border-top: 1px solid #e2e8f0; padding-top: 10px; margin-top: 10px !important; }
        .receipt-footer { text-align: center; font-size: 11px; color: #a0aec0; margin-top: 15px; }

        .stat-box { display: inline-block; background: #2d3748; color: white; padding: 10px 20px; border-radius: 8px; margin-bottom: 20px; }
    </style>
</head>
<body>

<div class="container">
    <div class="stat-box">
        Total Jenis Produk Terdaftar: <strong><?php echo Produk::$jumlahProduk; ?></strong>
    </div>

    <div class="card">
        <h2>Daftar Inventaris Produk</h2>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listProduk as $index => $p): ?>
                <tr>
                    <td><?php echo $index + 1; ?></td>
                    <td><strong><?php echo $p->nama; ?></strong></td>
                    <td><span class="badge"><?php echo $p->kategori; ?></span></td>
                    <td>Rp <?php echo number_format($p->harga, 0, ',', '.'); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <h2>Simulasi Transaksi</h2>
    <div>
        <?php 
        // Simulasi beberapa transaksi
        echo $kasir->prosesTransaksi($listProduk[0], 1); // Beli MacBook
        echo $kasir->prosesTransaksi($listProduk[1], 3); // Beli 3 Mouse
        echo $kasir->prosesTransaksi($listProduk[2], 2); // Beli 2 Keyboard
        ?>
    </div>
</div>

</body>
</html>