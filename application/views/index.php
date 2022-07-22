<div class="row m-3">
    <div class="col-sm-6">
        <button type="button" id="tambahBarang" data-bs-toggle="modal" data-bs-target="#modal_tambah" class="btn btn-primary btn-xl">Tambah Barang</button>
    </div>
    <div class="col-sm-6">
        <div class="text-end">
            <button type="button" id="getBarang" class="btn btn-primary btn-xl">Get Barang from API</button>
        </div>
    </div>

</div>
<div class="table">
    <table class="table table-responsive table-bordered ">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Id Produk</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Harga</th>
                <th scope="col">Kategori</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach ($barang as $b) :
                $i++; ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $b->id_produk ?></td>
                    <td><?= $b->nama_produk ?></td>
                    <td><?= $b->harga ?></td>
                    <td><?= $b->kategori ?></td>
                    <td><?= $b->status ?></td>
                    <td>
                        <button type="button" onclick="edit(<?= $b->id_produk ?>)" class="btn btn-primary btn-sm">Edit</button>
                        <button type="button" onclick="deletes(<?= $b->id_produk ?>)" class="btn btn-danger btn-sm">Hapus</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<!-- Modal -->
<div class="modal fade" id="modal_edit" tabindex="-1" aria-labelledby="modal_editLabel" aria-hidden="true">
    <div class="modal-dialog  modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_tambahLabel">Edit Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" id="edit">
                    <div class="form-group mb-3">
                        <label class="col-form-label">Nama Barang</label>
                        <input type="text" id="nama_produk__" name="nama_produk__" class="form-control" placeholder="Nama Barang">
                        <div class="invalid-feedback" for="nama_produk__"></div>
                        <input type="hidden" name="id_produk" id="id_produk">
                    </div>
                    <div class=" form-group mb-3">
                        <label class="col-form-label">Harga (Rp)</label>
                        <input type="text" id="harga__" name="harga__" class="form-control" placeholder="Harga Barang">
                        <div class="invalid-feedback" for="harga__"></div>
                    </div>
                    <div class=" form-group mb-3">
                        <label class="col-form-label">Kategori</label>
                        <input type="text" id="kategori__" name="kategori__" class="form-control" placeholder="Kategori Barang">
                        <div class="invalid-feedback" for="kategori__"></div>
                    </div>
                    <div class=" form-group mb-3">
                        <label class="col-form-label">Status</label>
                        <select id="status__" name="status__" class="form-select">
                            <?php foreach ($status as $s) : ?>
                                <option value="<?= $s ?>"><?= $s ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback" for="status__"></div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save Data</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal_tambah" tabindex="-1" aria-labelledby="modal_tambahLabel" aria-hidden="true">
    <div class="modal-dialog  modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_tambahLabel">Tambah Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" id="tambah">
                    <div class="form-group mb-3">
                        <label class="col-form-label">Nama Barang</label>
                        <input type="text" id="nama_produk" name="nama_produk" class="form-control" placeholder="Nama Barang">
                        <div class="invalid-feedback" for="nama_produk"></div>
                    </div>
                    <div class=" form-group mb-3">
                        <label class="col-form-label">Harga (Rp)</label>
                        <input type="text" id="harga" name="harga" class="form-control" placeholder="Harga Barang">
                        <div class="invalid-feedback" for="harga"></div>
                    </div>
                    <div class=" form-group mb-3">
                        <label class="col-form-label">Kategori</label>
                        <input type="text" id="kategori" name="kategori" class="form-control" placeholder="Kategori Barang">
                        <div class="invalid-feedback" for="kategori"></div>
                    </div>
                    <div class=" form-group mb-3">
                        <label class="col-form-label">Status</label>
                        <select id="status" name="status" class="form-select">
                            <?php foreach ($status as $s) : ?>
                                <option value="<?= $s ?>"><?= $s ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback" for="status"></div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save Data</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url() ?>public/js/jquery.min.js"></script>
<script src="<?= base_url() ?>public/sweetalert2/dist/sweetalert2.all.js"></script>
<script src="<?= base_url() ?>public/sweetalert2/dist/sweetalert2.min.css"></script>
<script>
    $("#getBarang").click(function(e) {
        $.ajax({
            type: "POST",
            url: '<?= base_url('Index/getApi') ?>',
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: `${response.data.created} ditambahkan, ${response.data.alreadythere} sudah ada`,
                }).then((result) => {
                    location.reload();
                });
            },
            error: function(jqXHR, textstatus, errorThrown) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: textstatus,
                });
            }
        });
    });

    function edit(id) {
        $.ajax({
            type: "GET",
            data: {
                id: id
            },
            url: '<?= base_url() ?>index/produk_get',
            success: function(response) {
                $("#modal_edit").modal('show');

                const produk = response.data;
                $("#id_produk").val(produk.id_produk);
                $("#nama_produk__").val(produk.nama_produk);
                $("#kategori__").val(produk.kategori);
                $("#harga__").val(produk.harga);
                $("#status__").val(produk.status).trigger('change');
            },
            error: function(jqXHR, textstatus, errorThrown) {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: jqXHR.responseJSON.message,
                });
            }
        });
    }
    $("#tambah").submit(function(e) {
        e.preventDefault();
        let formdata = new FormData(this);
        $.ajax({
            type: "POST",
            data: formdata,
            processData: false,
            contentType: false,
            url: '<?= base_url() ?>index/add',
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: response.message,
                }).then((result) => {
                    if (result.isConfirmed) location.reload();
                });
            },
            error: function(jqXHR, textstatus, errorThrown) {
                let response = jqXHR.responseJSON;
                response.data.forEach(({
                    field,
                    message
                }) => {
                    $(`.invalid-feedback[for="${field}"]`).html(message);
                    $(`#${field}`).addClass('is-invalid');
                })
            }
        });
    });
    $("#tambah").find('input, select').on('input change', function(event) {
        $(this).removeClass('is-invalid');
    });
    $("#edit").submit(function(e) {
        e.preventDefault();
        let formdata = new FormData(this);
        $.ajax({
            type: "POST",
            data: formdata,
            processData: false,
            contentType: false,
            url: '<?= base_url() ?>index/edit',
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: response.message,
                }).then((result) => {
                    if (result.isConfirmed) location.reload();
                });
            },
            error: function(jqXHR, textstatus, errorThrown) {
                let response = jqXHR.responseJSON;
                response.data.forEach(({
                    field,
                    message
                }) => {
                    $(`.invalid-feedback[for="${field}"]`).html(message);
                    $(`#${field}`).addClass('is-invalid');
                })
            }
        });
    });
    $("#edit").find('input, select').on('input change', function(event) {
        $(this).removeClass('is-invalid');
    });

    function deletes(id) {
        Swal.fire({
            icon: 'warning',
            text: 'Apakah Anda ingin menghapus data ini?',
            showCancelButton: true,
            confirmButtonText: 'Hapus',
            denyButtonText: `Batal`,
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    data: {
                        id: id
                    },
                    processData: true,
                    dataType: 'JSON',
                    url: '<?= base_url() ?>index/delete',
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.message,
                        }).then((result) => {
                            if (result.isConfirmed) location.reload();
                        });
                    },
                    error: function(jqXHR, textstatus, errorThrown) {
                        Swal.fire({
                            icon: 'error',
                            title: textstatus,
                            text: jqXHR.responseJSON.message.body,
                        });
                    }
                });
            }
        });
    }
</script>