<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Menu Kafe</title>
    <style>
        table { border-collapse: collapse; width: 60%; margin-bottom: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: center; }
        th { background-color: #f2f2f2; }
        input[type="number"] { width: 60px; text-align: center; }
        body { font-family: Arial; margin: 40px; }
    </style>
</head>
<body>

<h2>Menu Kafe</h2>
<form method="post">
    <table>
        <tr>
            <th>Menu</th>
            <th>Harga</th>
            <th>Jumlah</th>
        </tr>
        <?php
        // Menu dan harga
        $menu = [
            "Kopi Hitam" => 10000,
            "Cappuccino" => 15000,
            "Teh Manis" => 8000,
            "Es Jeruk" => 8000,
            "Nasi Goreng" => 20000,
            "Mie Goreng" => 18000
        ];

        foreach ($menu as $item => $harga) {
            echo "<tr>
                    <td>$item</td>
                    <td>Rp" . number_format($harga, 0, ',', '.') . "</td>
                    <td><input type='number' name='jumlah[$item]' min='0' value='0'></td>
                  </tr>";
        }
        ?>
    </table>
    <button type="submit" name="pesan">Pesan</button>
</form>

<?php
if (isset($_POST['pesan'])) {
    $jumlah = $_POST['jumlah'];
    echo "<h3>Detail Pesanan</h3>";
    echo "<table>
            <tr>
                <th>Menu</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Subtotal</th>
            </tr>";

    $total = 0;
    foreach ($menu as $item => $harga) {
        $jml = (int)$jumlah[$item];
        if ($jml > 0) {
            $subtotal = $harga * $jml;
            $total += $subtotal;
            echo "<tr>
                    <td>$item</td>
                    <td>$jml</td>
                    <td>Rp" . number_format($harga, 0, ',', '.') . "</td>
                    <td>Rp" . number_format($subtotal, 0, ',', '.') . "</td>
                  </tr>";
        }
    }
    echo "<tr>
            <td colspan='3'><strong>Total</strong></td>
            <td><strong>Rp" . number_format($total, 0, ',', '.') . "</strong></td>
          </tr>";
    echo "</table>";
}
?>

</body>
</html>
