    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="<?= BASEURL;?>">Home</a>
                <a class="nav-item nav-link" href="<?= BASEURL;?>/barang">Barang</a>
            </div>
        </div>
    </div>  
</nav>
<div class="container mt-3">
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6 mx-auto">
            <button type="button" class="btn btn-pink" data-bs-toggle="modal" data-bs-target="#formModal">
                Tambah Data Barang
            </button>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6 mx-auto">
            <form action="<?= BASEURL; ?>/Barang/search" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="cari barang..." name="keyword" id="keyword" autocomplete="off">
                    <button class="btn btn-pink" type="submit" id="searchButton">Search</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 mx-auto">
            <h3>Daftar Barang</h3>
            <ul class="list-group">
                <?php foreach ($data['brg'] as $brg) : ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div class="col-8">
                            <?= $brg['nama']; ?>
                        </div>
                        <div class="col-4 text-end">
                            <a href="<?= BASEURL; ?>/barang/detail/<?= $brg['id']; ?>" class="badge text-bg-primary viewModalDetail" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $brg['id']; ?>">Detail</a>
                            <a href="<?= BASEURL; ?>/barang/edit/<?= $brg['id']; ?>" class="badge text-bg-warning viewModalEdit" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $brg['id']; ?>">Edit</a>
                            <a href="<?= BASEURL; ?>/barang/delete/<?= $brg['id']; ?>" class="badge text-bg-danger" onclick="return confirm('Yakin ingin menghapus?');">Delete</a>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul> 
        </div>
    </div>
</div>

<!-- Modal untuk Edit -->
<div class="modal fade" id="formModalEdit" tabindex="-1" aria-labelledby="formModalLabelEdit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="formModalLabel">Tambah Data Barang</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/barang/add" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok Barang</label>
                        <input type="number" class="form-control" id="stok" name="stok" autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga Barang</label>
                        <input type="number" class="form-control" id="harga" name="harga" autocomplete="off">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk Detail -->
<div class="modal fade" id="formModalDetail" tabindex="-1" aria-labelledby="formModalLabelDetail" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="formModalDetailLabel">Detail Barang</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="post"> 
                    <input type="hidden" name="id" id="idDetail">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="namaDetail" name="nama" readonly required>
                    </div>
                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok Barang</label>
                        <input type="number" class="form-control" id="stokDetail" name="stok" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga Barang</label>
                        <input type="number" class="form-control" id="hargaDetail" name="harga" readonly>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

