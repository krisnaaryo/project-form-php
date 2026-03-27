<?php
// Include class Person dari file terpisah
require_once 'Person.php';

// Variabel untuk menyimpan object Person setelah submit
$person = null;

// Cek apakah form sudah disubmit (method POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Ambil data dari form, bersihkan spasi di awal/akhir
    $firstname = trim($_POST['firstname'] ?? '');
    $lastname  = trim($_POST['lastname']  ?? '');
    $phone     = trim($_POST['phone']     ?? '');
    $address   = trim($_POST['address']   ?? '');

    // Buat object baru dari class Person
    $person = new Person($firstname, $lastname, $phone, $address);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Form PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>📝 NAMA ANDA</h2>

        <!-- Form HTML -->
        <form method="POST" action="">

            <input
                type="text"
                name="firstname"
                placeholder="Firstname"
                value="<?= htmlspecialchars($_POST['firstname'] ?? '') ?>"
                required
            >

            <input
                type="text"
                name="lastname"
                placeholder="Lastname"
                value="<?= htmlspecialchars($_POST['lastname'] ?? '') ?>"
                required
            >

            <input
                type="text"
                name="phone"
                placeholder="Phone Number"
                value="<?= htmlspecialchars($_POST['phone'] ?? '') ?>"
                required
            >

            <textarea
                name="address"
                placeholder="Address"
                required
            ><?= htmlspecialchars($_POST['address'] ?? '') ?></textarea>

            <div class="clearfix">
                <button type="submit">Submit</button>
            </div>

        </form>

        <!-- Tampilkan hasil HANYA jika form sudah disubmit -->
        <?php if ($person !== null): ?>
        <div class="result">
            <p>Hi, my name is <strong><?= htmlspecialchars($person->getFullName()) ?></strong></p>
            <p>Phone Number : <strong><?= htmlspecialchars($person->phone) ?></strong></p>
            <p>Address : <strong><?= htmlspecialchars($person->address) ?></strong></p>
            <a href="index.php" class="reset-link">Reset</a>
        </div>
        <?php endif; ?>

    </div>
</body>
</html>