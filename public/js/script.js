
$(function() {

    $('.buttonAddData').on('click', function() {


        $('#formModalLabel').html('Tambah Data Barang');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('#nama').val('');
        $('#stok').val('');
        $('#harga').val('');
        
    });


    $('.viewModalEdit').on('click', function() {
        $('#formModalLabelEdit').html('Edit Data Barang');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/tugasWebTeoriMVC/public/barang/edit');

        const id = $(this).data('id');

        $.ajax({
        
            url: 'http://localhost/tugasWebTeoriMVC/public/barang/getUpdate',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#nama').val(data.nama);
                $('#stok').val(data.stok);
                $('#harga').val(data.harga);
                $('#id').val(data.id);

                $('#formModalEdit').modal('show');

            
            }
        });
    });

    $('.viewModalDetail').on('click', function() {
        $('#formModalDetailLabel').html('Detail Barang');
        const id = $(this).data('id');
    
        $.ajax({
            url: 'http://localhost/tugasWebTeoriMVC/public/barang/getDetail',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#idDetail').val(data.id);
                $('#namaDetail').val(data.nama);
                $('#stokDetail').val(data.stok);
                $('#hargaDetail').val(data.harga);
    
                $('#formModalDetail').modal('show');
            }
        });
    });
    

});

