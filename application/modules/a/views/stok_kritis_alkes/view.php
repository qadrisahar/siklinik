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
        <div class="table-action mb-2"></div>
        <div class="table-place-full">
            <table
                class="table table-bordered dt-responsive nowrap table-striped table-hover"
                style="width:100%"
                id="t_alkes">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" class="text-center">No</th>
                        <th scope="col" class="text-center">Kode alkes</th>
                        <th scope="col" class="text-center">Nama alkes</th>
                        <th scope="col" class="text-center">Kategori</th>
                        <th scope="col" class="text-center">Isi Per Unit</th>
                        <th scope="col" class="text-center">Stok</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>

<!-- Simple Datatable End -->
<script>
    $('document').ready(function () {

        var table;
        table = $('#t_alkes').DataTable({
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
                "url": "<?php echo site_url('a_stok_kritis_alkes/get_stok_kritis_alkes')?>",
                "type": "POST"
            },
            "columnDefs": [
                {
                    "targets": "datatable-nosort",
                    "orderable": false
                }
            ]
        });

    });
</script>
<script>
    $('#loading').hide();
</script>