    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="<?= BASEURL;?>">Home</a>
                <a class="nav-item nav-link" href="<?= BASEURL;?>/barang">Barang</a>
            </div>
        </div>
    </div>  
</nav>
<div class="container mt-4">
    <h1 class="text font-weight-bold text-center">Selamat Datang di Dashboard Admin!</h1>
</div>

<div class="container mt-4-custom">
    <div class="row">
        <div class="col-md-4">
            <div class="card admin-card-custom">
                <div class="card-body">
                    <h5 class="card-title">Data Barang</h5>
                    <p class="card-text">Kelola data barang di sini.</p>
                    <a href="<?= BASEURL; ?>/barang" class="btn btn-pink">Lihat Data Barang</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card admin-card-custom">
                <div class="card-body">
                    <h5 class="card-title">Statistik Penjualan</h5>
                    <p class="card-text">Lihat statistik penjualan terkini.</p>
                    <a href="#" class="btn btn-pink">Lihat Statistik</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card admin-card-custom">
                <div class="card-body">
                    <h5 class="card-title">Pengaturan Akun</h5>
                    <p class="card-text">Pengaturan akun admin.</p>
                    <a href="#" class="btn btn-pink">Pengaturan Akun</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <h3>Daftar Barang</h3>
                <ul class="list-group">
                    <?php foreach ($data['brg'] as $brg) : ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="col-6">
                                <?= $brg['nama']; ?>
                            </div>
                            <div class="col-3">
                                <?= $brg['stok']; ?>
                            </div>
                            <div class="col-3">
                                <?= $brg['harga']; ?>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul> 
            </div>
            <div class="col-md-6">
                <div class="d-flex justify-content-center align-items-center" style="height: 100%;">
                    <div>
                        <h4>Grafik Penjualan</h4>
                        <canvas id="myChart" width="400" height="400"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Label 1', 'Label 2', 'Label 3'],
            datasets: [{
                label: 'Penjualan',
                data: [10, 20, 30],
                backgroundColor: 'rgba(255, 182, 193, 0.2)', // Pink soft color
                borderColor: 'rgba(255, 182, 193, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>