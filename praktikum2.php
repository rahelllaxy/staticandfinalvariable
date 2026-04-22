<?php
// 1. Deklarasi Class Matematika
class Matematika {
    
    public static function tambah($a, $b) {
        return $a + $b;
    }

    public static function kurang($a, $b) {
        return $a - $b;
    }

    public static function kali($a, $b) {
        return $a * $b;
    }

    public static function bagi($a, $b) {
        // Mencegah error pembagian dengan nol
        if ($b == 0) return "Error: Tidak bisa dibagi nol";
        return $a / $b;
    }

    // Fungsi untuk menghitung luas persegi
    public static function luasPersegi($sisi) {
        return $sisi * $sisi;
    }
}

// 2. Menangkap inputan dari Form HTML
$hasil_operasi = "";
$hasil_luas = "";

if (isset($_POST['hitung_operasi'])) {
    $angka1 = $_POST['angka1'];
    $angka2 = $_POST['angka2'];
    $operasi = $_POST['operasi'];

    if ($operasi == "tambah") $hasil_operasi = Matematika::tambah($angka1, $angka2);
    elseif ($operasi == "kurang") $hasil_operasi = Matematika::kurang($angka1, $angka2);
    elseif ($operasi == "kali") $hasil_operasi = Matematika::kali($angka1, $angka2);
    elseif ($operasi == "bagi") $hasil_operasi = Matematika::bagi($angka1, $angka2);
}

if (isset($_POST['hitung_luas'])) {
    $sisi = $_POST['sisi'];
    $hasil_luas = Matematika::luasPersegi($sisi);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Praktikum 2: Static Method</title>
</head>
<body>
    <h3>Kalkulator Sederhana</h3>
    <form method="POST" action="">
        <input type="number" name="angka1" placeholder="Angka 1" required>
        <select name="operasi">
            <option value="tambah">+</option>
            <option value="kurang">-</option>
            <option value="kali">x</option>
            <option value="bagi">/</option>
        </select>
        <input type="number" name="angka2" placeholder="Angka 2" required>
        <button type="submit" name="hitung_operasi">Hitung</button>
    </form>
    <?php if($hasil_operasi !== "") echo "<p><strong>Hasil: $hasil_operasi</strong></p>"; ?>

    <hr>

    <h3>Hitung Luas Persegi</h3>
    <form method="POST" action="">
        <input type="number" name="sisi" placeholder="Panjang Sisi" required>
        <button type="submit" name="hitung_luas">Hitung Luas</button>
    </form>
    <?php if($hasil_luas !== "") echo "<p><strong>Luas Persegi: $hasil_luas</strong></p>"; ?>

</body>
</html>