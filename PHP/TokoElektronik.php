<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Elektronik</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f5f5f5;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }
        
        h2 {
            color: #555;
            border-bottom: 2px solid #ddd;
            padding-bottom: 5px;
        }
        
        .form-box {
            background-color: #fafafa;
            padding: 20px;
            margin: 20px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 3px;
            font-size: 14px;
        }
        
        button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 14px;
        }
        
        button:hover {
            background-color: #0056b3;
        }
        
        .btn-edit {
            background-color: #28a745;
            padding: 5px 10px;
            font-size: 12px;
        }
        
        .btn-delete {
            background-color: #dc3545;
            padding: 5px 10px;
            font-size: 12px;
        }
        
        .btn-edit:hover {
            background-color: #218838;
        }
        
        .btn-delete:hover {
            background-color: #c82333;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        
        table, th, td {
            border: 1px solid #ddd;
        }
        
        th {
            background-color: #f8f9fa;
            padding: 10px;
            text-align: left;
        }
        
        td {
            padding: 8px;
        }
        
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        
        .message {
            padding: 10px;
            margin: 10px 0;
            border-radius: 3px;
        }
        
        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        .center {
            text-align: center;
        }
        
        #editForm {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sistem Toko Elektronik</h1>
        
        <?php
        session_start();

        // Class Elektronik
        class Elektronik {
            private $nama;
            private $merk;
            private $harga;
            private $stok;
            
            public function __construct($nama, $merk, $harga, $stok) {
                $this->nama = $nama;
                $this->merk = $merk;
                $this->harga = $harga;
                $this->stok = $stok;
            }
            
            public function getNama() {
                return $this->nama;
            }
            
            public function getMerk() {
                return $this->merk;
            }
            
            public function getHarga() {
                return $this->harga;
            }
            
            public function getStok() {
                return $this->stok;
            }
            
            public function setNama($nama) {
                $this->nama = $nama;
            }
            
            public function setMerk($merk) {
                $this->merk = $merk;
            }
            
            public function setHarga($harga) {
                $this->harga = $harga;
            }
            
            public function setStok($stok) {
                $this->stok = $stok;
            }
            
            public function toArray() {
                return [
                    'nama' => $this->nama,
                    'merk' => $this->merk,
                    'harga' => $this->harga,
                    'stok' => $this->stok
                ];
            }
            
            public static function fromArray($data) {
                return new self($data['nama'], $data['merk'], $data['harga'], $data['stok']);
            }
        }

        // Class TokoElektronik
        class TokoElektronik {
            private $daftarElektronik = [];
            
            public function __construct() {
                $this->loadFromSession();
                if (empty($this->daftarElektronik)) {
                    $this->tambahDataAwal();
                }
            }
            
            private function tambahDataAwal() {
                $this->daftarElektronik[] = new Elektronik("Laptop", "ASUS", 8000000, 5);
                $this->daftarElektronik[] = new Elektronik("HP Android", "Samsung", 3000000, 10);
                $this->daftarElektronik[] = new Elektronik("TV LED", "LG", 5000000, 3);
                $this->daftarElektronik[] = new Elektronik("Speaker", "JBL", 800000, 8);
                $this->saveToSession();
            }
            
            private function saveToSession() {
                $data = [];
                foreach ($this->daftarElektronik as $elektronik) {
                    $data[] = $elektronik->toArray();
                }
                $_SESSION['elektronik_data'] = $data;
            }
            
            private function loadFromSession() {
                if (isset($_SESSION['elektronik_data'])) {
                    $this->daftarElektronik = [];
                    foreach ($_SESSION['elektronik_data'] as $data) {
                        $this->daftarElektronik[] = Elektronik::fromArray($data);
                    }
                }
            }
            
            public function tambahElektronik($nama, $merk, $harga, $stok) {
                $elektronikBaru = new Elektronik($nama, $merk, $harga, $stok);
                $this->daftarElektronik[] = $elektronikBaru;
                $this->saveToSession();
                return "Data elektronik berhasil ditambahkan!";
            }
            
            public function getDaftarElektronik() {
                return $this->daftarElektronik;
            }
            
            public function editElektronik($index, $nama, $merk, $harga, $stok) {
                if (isset($this->daftarElektronik[$index])) {
                    $elektronik = $this->daftarElektronik[$index];
                    if (!empty($nama)) $elektronik->setNama($nama);
                    if (!empty($merk)) $elektronik->setMerk($merk);
                    if ($harga > 0) $elektronik->setHarga($harga);
                    if ($stok >= 0) $elektronik->setStok($stok);
                    $this->saveToSession();
                    return "Data berhasil diupdate!";
                }
                return "Data tidak ditemukan!";
            }
            
            public function hapusElektronik($index) {
                if (isset($this->daftarElektronik[$index])) {
                    $nama = $this->daftarElektronik[$index]->getNama();
                    unset($this->daftarElektronik[$index]);
                    $this->daftarElektronik = array_values($this->daftarElektronik);
                    $this->saveToSession();
                    return "Data '$nama' berhasil dihapus!";
                }
                return "Data tidak ditemukan!";
            }
        }

        $toko = new TokoElektronik();
        $message = '';
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $action = $_POST['action'];
            
            try {
                switch ($action) {
                    case 'tambah':
                        if (!empty($_POST['nama']) && !empty($_POST['merk']) && 
                            !empty($_POST['harga']) && !empty($_POST['stok'])) {
                            
                            $nama = trim($_POST['nama']);
                            $merk = trim($_POST['merk']);
                            $harga = (float)$_POST['harga'];
                            $stok = (int)$_POST['stok'];
                            
                            if ($harga > 0 && $stok >= 0) {
                                $message = $toko->tambahElektronik($nama, $merk, $harga, $stok);
                            } else {
                                $error = "Harga harus lebih dari 0 dan stok tidak boleh negatif!";
                            }
                        } else {
                            $error = "Semua field harus diisi!";
                        }
                        break;
                    
                    case 'edit':
                        $index = (int)$_POST['edit_index'];
                        $nama = trim($_POST['edit_nama']);
                        $merk = trim($_POST['edit_merk']);
                        $harga = (float)$_POST['edit_harga'];
                        $stok = (int)$_POST['edit_stok'];
                        
                        $result = $toko->editElektronik($index, $nama, $merk, $harga, $stok);
                        if (strpos($result, 'berhasil') !== false) {
                            $message = $result;
                        } else {
                            $error = $result;
                        }
                        break;
                    
                    case 'hapus':
                        $index = (int)$_POST['hapus_index'];
                        $result = $toko->hapusElektronik($index);
                        if (strpos($result, 'berhasil') !== false) {
                            $message = $result;
                        } else {
                            $error = $result;
                        }
                        break;
                }
            } catch (Exception $e) {
                $error = "Terjadi kesalahan: " . $e->getMessage();
            }
        }

        if ($message) {
            echo "<div class='message success'>$message</div>";
        }
        if ($error) {
            echo "<div class='message error'>$error</div>";
        }
        ?>

        <!-- Form Tambah -->
        <div class="form-box">
            <h2>Tambah Elektronik Baru</h2>
            <form method="POST">
                <input type="hidden" name="action" value="tambah">
                
                <div class="form-group">
                    <label>Nama Elektronik:</label>
                    <input type="text" name="nama" required>
                </div>
                
                <div class="form-group">
                    <label>Merk:</label>
                    <input type="text" name="merk" required>
                </div>
                
                <div class="form-group">
                    <label>Harga:</label>
                    <input type="number" name="harga" min="1" required>
                </div>
                
                <div class="form-group">
                    <label>Stok:</label>
                    <input type="number" name="stok" min="0" required>
                </div>
                
                <button type="submit">Tambah</button>
            </form>
        </div>

        <!-- Tabel Data -->
        <h2>Daftar Elektronik</h2>
        <?php if (empty($toko->getDaftarElektronik())): ?>
            <p class="center">Belum ada data elektronik.</p>
        <?php else: ?>
            <table>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Merk</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
                <?php foreach ($toko->getDaftarElektronik() as $index => $elektronik): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= $elektronik->getNama() ?></td>
                    <td><?= $elektronik->getMerk() ?></td>
                    <td>Rp <?= number_format($elektronik->getHarga(), 0, ',', '.') ?></td>
                    <td><?= $elektronik->getStok() ?></td>
                    <td>
                        <button type="button" class="btn-edit" 
                                onclick="showEdit(<?= $index ?>, '<?= $elektronik->getNama() ?>', '<?= $elektronik->getMerk() ?>', <?= $elektronik->getHarga() ?>, <?= $elektronik->getStok() ?>)">
                            Edit
                        </button>
                        
                        <form method="POST" style="display: inline;" 
                              onsubmit="return confirm('Yakin hapus <?= $elektronik->getNama() ?>?')">
                            <input type="hidden" name="action" value="hapus">
                            <input type="hidden" name="hapus_index" value="<?= $index ?>">
                            <button type="submit" class="btn-delete">Hapus</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
            <p><strong>Total: <?= count($toko->getDaftarElektronik()) ?> item</strong></p>
        <?php endif; ?>

        <!-- Form Edit -->
        <div class="form-box" id="editForm">
            <h2>Edit Elektronik</h2>
            <form method="POST">
                <input type="hidden" name="action" value="edit">
                <input type="hidden" id="edit_index" name="edit_index">
                
                <div class="form-group">
                    <label>Nama Elektronik:</label>
                    <input type="text" id="edit_nama" name="edit_nama">
                </div>
                
                <div class="form-group">
                    <label>Merk:</label>
                    <input type="text" id="edit_merk" name="edit_merk">
                </div>
                
                <div class="form-group">
                    <label>Harga:</label>
                    <input type="number" id="edit_harga" name="edit_harga" min="1">
                </div>
                
                <div class="form-group">
                    <label>Stok:</label>
                    <input type="number" id="edit_stok" name="edit_stok" min="0">
                </div>
                
                <button type="submit">Update</button>
                <button type="button" onclick="hideEdit()">Batal</button>
            </form>
        </div>
    </div>

    <script>
        function showEdit(index, nama, merk, harga, stok) {
            document.getElementById('edit_index').value = index;
            document.getElementById('edit_nama').value = nama;
            document.getElementById('edit_merk').value = merk;
            document.getElementById('edit_harga').value = harga;
            document.getElementById('edit_stok').value = stok;
            document.getElementById('editForm').style.display = 'block';
        }
        
        function hideEdit() {
            document.getElementById('editForm').style.display = 'none';
        }
    </script>
</body>
</html>