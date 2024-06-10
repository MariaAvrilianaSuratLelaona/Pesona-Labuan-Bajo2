<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8" />
   <link rel="icon" href="../assets/icon.png" />
   <link rel="stylesheet" href="../css/admin.css" />
   <!-- Boxicons CDN Link -->
   <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Admin Wisata Labuan Bajo | Transaction</title>
</head>
<body>
    <div class="container">
        <header>
            <nav>
                <div class="logo">
                    <img src="assets/logo.png" alt="Logo" />
                </div>
                <input type="checkbox" id="click" />
                <label for="click" class="menu-btn">
                    <i class="fas fa-bars"></i>
                </label>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="categories.php">Categories</a></li>
                    <li><a href="login.php" class="btn_login">Login</a></li>
                </ul>
            </nav>
        </header>
        <main>
            <div class="walpaper">
                <div class="walpaper-text">
                    <h1>Pesona Labuan Bajo</h1>
                    <p> Menjelajahi Surga Tersembunyi di Nusa Tenggara Timur </p>
                    <button type="button" class="btn_getStarted">Get Started</button>
                </div>
                <div class="walpaper-img">
                    <img src="assets/walpaper.jpg" alt="Nganjuk Tourism" />
                </div>
            </div>
            <div class="cards-categories">
                <h2>Visiting Options</h2>
                <div class="card-categories" id="destinationCards">
                <?php
                    include 'koneksi.php';
                    $sql = "SELECT * FROM tb_agen_perjalanan";
                    $result = mysqli_query($koneksi, $sql);
                    if (mysqli_num_rows($result) == 0) {
                        echo "<h3 style='text-align: center; color: red;'>Data Kosong</h3>";
                    }
                    while ($data = mysqli_fetch_assoc($result)) {
                        echo "
                        <div class='card'>
                            <div class='card-image'>
                                <img src='img_categories/$data[photo]' alt='tidak ada gambar' />
                            </div>
                            <div class='card-content'>
                                <h5>$data[destinasi]</h5>
                                <p class='description'>Harga: Rp $data[price]</p>
                                <p class='price'>$data[description]</p>
                                <button class='btn_belanja' type='button' onclick='bukaModal(\"$data[id]\")'>Beli</button>
                            </div>
                        </div>";
                    }
                    ?>
                </div>
            </div>
            <!-- Modal 1 -->
            <div id="myModal" class="modal-container" onclick="tutupModal()">
                <div class="modal-dialog" onclick="event.stopPropagation()">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title" style="color:  #ffb72b;">Formulir Pemesanan</h1>
                            <button type="button" class="btn-close" aria-label="Close" onclick="tutupModal()"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <input type="hidden" name="category_id" id="category_id" value="">
                                <input type="hidden" name="category_name" id="category_name" value="">
                                <input type="hidden" name="price" id="price" value="">
                                <div class="form-group">
                                    <label class="labelmodal" for="recipient-name" class="col-form-label">Nama :</label>
                                    <input class="inputdata" type="text" class="form-control" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label class="labelmodal" for="nomor" class="col-form-label">No. Hp :</label>
                                    <input class="inputdata" type="text" class="form-control" id="nomor">
                                </div>
                                <div class="form-group">
                                    <label class="labelmodal" for="alamat-text" class="col-form-label">Alamat:</label>
                                    <textarea class="inputalamat" class="form-control" id="alamat-text"></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" onclick="tutupModal()">Keluar</button>
                            <button type="button" class="btn btn-yellow" onclick="bukaModal2()">Lanjutkan</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal 2 -->
            <div id="myModal2" class="modal-container" onclick="tutupModal2()">
                <div class="modal-dialog" onclick="event.stopPropagation()">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title" style="color:  #ffb72b;">Data Transaksi</h1>
                            <button type="button" class="btn-close" aria-label="Close" onclick="tutupModal2()"></button>
                        </div>
                        <form action="transaction/transaction-proses.php" method="post">
                            <div class="modal-body">
                                <h4>Destinasi</h4>
                                <div class="form-group">
                                    <label class="labelmodal" for="detail-destinasi" class="col-form-label">Destinasi:</label>
                                    <input class="inputdata" type="text" name="detail-destinasi" class="form-control" id="detail-destinasi" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="labelmodal" for="detail-harga" class="col-form-label">Harga:</label>
                                    <input class="inputdata" type="text" name="detail-harga" class="form-control" id="detail-harga" readonly>
                                </div>
                                <h4>Pembeli</h4>
                                <div class="form-group">
                                    <label class="labelmodal" for="detail-nama" class="col-form-label">Nama:</label>
                                    <input class="inputdata" name="detail-nama" type="text" class="form-control" id="detail-nama" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="labelmodal" for="detail-nomor" class="col-form-label">No. Hp:</label>
                                    <input class="inputdata" name="detail-nomor" type="text" class="form-control" id="detail-nomor" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="labelmodal" for="detail-alamat" class="col-form-label">Alamat:</label>
                                    <textarea class="inputalamat" name="detail-alamat" class="form-control" id="detail-alamat" readonly></textarea>
                                </div>
                                <input type="hidden" name="detail-status" value="success">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" onclick="kembaliKeModalPertama()">Kembali</button>
                                <button name="simpan" type="submit" class="btn btn-yellow" onclick="lakukanPembayaran()">Lakukan Pemesanan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <footer>
            <h4>&copy; Labuan Bajo : Wisata Surga Tersembunyi di Nusa Tenggara Timur jadi Pilihan untuk menghabiskan waktu liburan berharga anda.</h4>
        </footer>
    </div>

    <script>
        var selectedCategoryId;

        function bukaModal(categoryId) {
            console.log('categoryId:', categoryId);
            selectedCategoryId = categoryId;
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var categoryData = JSON.parse(xhr.responseText);

                    document.getElementById('category_id').value = categoryId;
                    document.getElementById('category_name').value = categoryData.destinasi;
                    document.getElementById('price').value = categoryData.price;
                    document.getElementById("myModal").style.display = "flex";
                }
            };
            xhr.open("GET", "get_kategori.php?id=" + categoryId, true);
            xhr.send();
        }

        function tutupModal() {
            document.getElementById("myModal").style.display = "none";
        }

        function tutupModal2() {
            document.getElementById("myModal2").style.display = "none";
        }

        function bukaModal2() {
            tutupModal();
            document.getElementById("myModal2").style.display = "flex";

            var nama = document.getElementById("recipient-name").value;
            var nomor = document.getElementById("nomor").value;
            var alamat = document.getElementById("alamat-text").value;
            var kategori = document.getElementById("category_name").value;
            var harga = document.getElementById("price").value;

            document.getElementById("detail-nama").value = nama;
            document.getElementById("detail-nomor").value = nomor;
            document.getElementById("detail-alamat").value = alamat;
            document.getElementById("detail-destinasi").value = kategori;
            document.getElementById("detail-harga").value = harga;
        }

        function kembaliKeModalPertama() {
            tutupModal2();
            document.getElementById("myModal").style.display = "flex";
        }

        function lakukanPembayaran() {
            alert("Pembayaran berhasil!");
            tutupModal2();
            document.getElementById("recipient-name").value = "";
            document.getElementById("nomor").value = "";
            document.getElementById("alamat-text").value = "";
        }
    </script>
</body>

</html>
