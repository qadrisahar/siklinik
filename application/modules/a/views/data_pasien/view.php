<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon-small bg-malibu-beach">
                <i class="<?php echo $icon;?> text-white"></i>
            </div>
            <div><?php echo $title; ?>
            </div>
        </div>
        <div class="page-title-actions">
            <div class="d-inline-block dropdown"></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 p-4 mb-3 card">
        <div class="table-action mb-2">
            <div class="text-right">
                <a
                    href="<?=base_url()?>a_pasien_baru?func=0"
                    class="btn-shadow btn btn-success">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fa fa-plus-circle fa-w-20"></i>
                    </span>
                    Tambah
                </a>
            </div>
        </div>
        <div class="table-place-full">
            <table
                class="table table-bordered dt-responsive nowrap table-striped table-hover"
                style="width:100%"
                id="t_kategori">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" class="text-center">No</th>
                        <th scope="col" class="text-center">ID Pasien</th>
                        <th scope="col" class="text-center">Nama</th>
                        <th scope="col" class="text-center">NIK</th>
                        <th scope="col" class="text-center">Jenis Kelamin</th>
                        <th scope="col" class="text-center">Alamat</th>
                        <th scope="col" class="datatable-nosort text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>

<div
    class="modal fade mt-3"
    id="modal-tambah"
    role="dialog"
    aria-labelledby="modal-kategori"
    aria-hidden="true"
    data-backdrop="static">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-kategori">Data Pasien</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="buttonload modal-load">
                <i class="fa fa-spinner fa-spin modal-load-spinner"></i>
            </div>
            <div class="modal-body">
                <form name="form" id="form" enctype="multipart/form-data">
                    <input type="hidden" id="id" name="id" value="" readonly="readonly">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-sm-12">NIK</label>
                                <div class="col-sm-12 col-md-12">
                                    <input
                                        class="form-control"
                                        type="text"
                                        name="nik"
                                        id="nik"
                                        required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12">No. JKN</label>
                                <div class="col-sm-12 col-md-12">
                                    <input class="form-control" type="text" name="no_jkn" id="no_jkn" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12">Nama</label>
                                <div class="col-sm-12 col-md-12">
                                    <input
                                        class="form-control"
                                        type="text"
                                        name="nama"
                                        id="nama"
                                        required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12">Jenis Kelamin</label>
                                <div class="col-sm-12 col-md-12">
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                <?php
                                    $jenis_kelamin=array('Laki-Laki' =>'L', 'Perempuan' => 'P');
                                    foreach($jenis_kelamin as $jl => $value):
                                    echo '<option value="'.$value.'">'.$jl.'</option>';
                                    endforeach;
                                ?>
                                </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-sm-12">Tempat Lahir</label>
                                <div class="col-sm-12 col-md-12">
                                    <input
                                        class="form-control"
                                        type="text"
                                        name="tempat_lahir"
                                        id="tempat_lahir"
                                        required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12">Tgl. Lahir</label>
                                <div class="col-sm-12 col-md-12">
                                    <input
                                        class="form-control"
                                        type="date"
                                        name="tgl_lahir"
                                        id="tgl_lahir"
                                        required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12">Telephone</label>
                                <div class="col-sm-12 col-md-12">
                                    <input
                                        class="form-control"
                                        type="text"
                                        name="kontak"
                                        id="kontak"
                                        required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12">Alamat</label>
                                <div class="col-sm-12 col-md-12">
                                    <textarea name="alamat" id="alamat" rows="2" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                                <label class="col-sm-12">Telephone Lainnya</label>
                                <div class="col-sm-12 col-md-12">
                                    <input
                                        class="form-control"
                                        type="text"
                                        name="kontak_2"
                                        id="kontak_2"
                                        required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12">Email</label>
                                <div class="col-sm-12 col-md-12">
                                    <input
                                        class="form-control"
                                        type="text"
                                        name="email"
                                        id="email"
                                        required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12">Pekerjaan</label>
                                <div class="col-sm-12 col-md-12">
                                <select name="id_pekerjaan" id="id_pekerjaan" class="form-control">
                                <?php
                                    $qu=$this->db->get('pekerjaan');
                                    foreach($qu->result() as $u):
                                    echo '<option value="'.$u->id_pekerjaan.'">'.$u->pekerjaan.'</option>';
                                    endforeach;
                                    ?>
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12">Pendidikan</label>
                                <div class="col-sm-12 col-md-12">
                                <select name="id_pendidikan" id="id_pendidikan" class="form-control">
                                <?php
                                    $qp=$this->db->get('pendidikan');
                                    foreach($qp->result() as $p):
                                    echo '<option value="'.$p->id_pendidikan.'">'.$p->pendidikan.'</option>';
                                    endforeach;
                                    ?>
                                </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label class="col-sm-12">Keterangan</label>
                        <div class="col-sm-12 col-md-12">
                            <input
                                class="form-control"
                                type="text"
                                name="keterangan"
                                id="keterangan"
                                required="required">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-md" name="simpan" id="simpan">
                    <i class="fa fa-save"></i>
                    Simpan
                </button>
                <button
                    type="button"
                    class="btn btn-danger btn-md"
                    name="cancel"
                    id="cancel"
                    data-dismiss="modal">
                    <i class="fa fa-ban"></i>
                    Batal</button>
            </div>
        </div>
    </div>
</div>
<!-- Simple Datatable End -->
<script>
    $('document').ready(function () {

        var table;
        table = $('#t_kategori').DataTable({
            scrollCollapse: true,
            autoWidth: false,
            responsive: true,
            "lengthMenu": [
                [
                    10, 25, 50, -1
                ],
                [
                    10, 25, 50, "All"
                ]
            ],
            "language": {
                "info": "_START_-_END_ of _TOTAL_ entries",
                searchPlaceholder: "Search"
            },
            "destroy": true,
            "processing": true,
            "serverSide": true,
            "stateSave": true,
            "order": [],

            "ajax": {
                "url": "<?php echo site_url('a_data_pasien/get_data_pasien')?>",
                "type": "POST"
            },
            "columnDefs": [
                {
                    "targets": "datatable-nosort",
                    "orderable": false
                }
            ]
        });

        $("#simpan").click(function (e) {
            e.preventDefault();
            if ($('#form').parsley().validate()) {
                var param = this;
                process1(param);
                var form = $('form')[0];
                var form_data = new FormData(form);
                $.ajax({
                    type: 'POST',
                    data: form_data,
                    contentType: false,
                    processData: false,
                    cache: false,
                    async: true,
                    url: "<?php echo site_url('a_data_pasien/simpan');?>",
                    success: function (data) {
                        process_done1(param, '<i class="fa fa-save"></i> Simpan');
                        Swal.fire('Sukses!', data, 'success');
                        table
                            .ajax
                            .reload(null, false);
                        $('#modal-tambah').modal('toggle');
                    }
                });
            } else {
                return false();
            }

        });

        $("#tambah").click(function () {
            $('#form')
                .parsley()
                .reset();
            $("#id").val('');
            $("#deskripsi").html('');
            $('#form')[0].reset();
            $('.modal-load').hide();
        });

        $('#t_kategori').on('click', 'tr .edit', function () {
            $('.modal-load').show();
            $('#form')
                .parsley()
                .reset();
            var id = $(this).data("id");
            $.ajax({
                type: 'POST',
                data: {
                    id: id
                },
                url: "<?php echo site_url('a_data_pasien/cari_data_pasien');?>",
                dataType: 'json',
                success: function (data) {
                    $('#id').val(data.id);
                    $('#nama').val(data.nama);
                    $('#nik').val(data.nik);
                    $('#jenis_kelamin').val(data.jenis_kelamin);
                    $('#alamat').val(data.alamat);
                    $('#email').val(data.email);
                    $('#tempat_lahir').val(data.tempat_lahir);
                    $('#tgl_lahir').val(data.tgl_lahir);
                    $('#kontak').val(data.kontak);
                    $('#kontak_2').val(data.kontak_2);
                    $('#keterangan').val(data.keterangan);
                    $('#no_jkn').val(data.no_jkn);
                    $('.modal-load').hide();
                }
            });

        });

        $('#t_kategori').on('click', 'tr .delete', function () {
            var id = $(this).data("id");
            Swal
                .fire({
                    title: 'Anda yakin ingin menghapus data ini?',
                    text: "Periksa kembali data tersebut!",
                    type: 'warning',
                    allowOutsideClick: false,
                    showCancelButton: true,
                    showLoaderOnConfirm: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus',
                    cancelButtonText: 'Tidak'
                })
                .then((result) => {
                    if (result.value) {
                        $.ajax({
                            type: 'POST',
                            data: {
                                id: id
                            },
                            url: "<?php echo site_url('a_data_pasien/hapus');?>",
                            success: function (data) {
                                Swal.fire('Sukses!', 'Data tersebut berhasil dihapus.', 'success');
                                table
                                    .ajax
                                    .reload(null, false);
                            },
                            error: function () {
                                Swal.fire("Eror", "Terjadi kesalahan", "error");
                            }
                        });
                    }
                })

        });

    });
</script>
<script>
    $('#loading').hide();
</script>