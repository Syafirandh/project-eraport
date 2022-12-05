<script>
    // function hapus(x) {
    //     $('#modal-delete').modal('show');
    //     $('#deleted').on('click', function() {
    //         var action = '<?= base_url(); ?>master/kelas/delete/' + x;
    //         $('#form-hapus').attr('action', action).submit();
    //     })
    // }

    // $(document).ready(function() {
    //     $("#employee_div").load("allrecord.php");
    //     $("#depart_dropdown").change(function() {
    //         var selected = $(this).val();
    //         $("#desig_div").load("desig.php", {
    //             selected_depart: selected
    //         });
    //     });
    //     $("#refresh").click(function() {
    //         $("#employee_div").load("allrecord.php");
    //     });

    // });
</script>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Rekap Tahun Akademik
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('dashboard'); ?>"><i class="fa fa-home"></i> Beranda</a></li>
        <li><a href="#">Data Master</a></li>
        <li class="active">Rekap Tahun Akademik</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <form method="post" class="form-horizontal">
                <label for="price" class="control-label col-sm-2">Tahun Pelajaran: </label>
                <div class="col-sm-3">
                    <select name="department" class="form-control" id="tahunAkademik">
                        <option value="">--Tahun Akademik--</option>
                        <?php foreach ($tahunAkademik as $tahun) : ?>
                            <option value="<?= $tahun->idtahun_akademik ?>"><?= $tahun->tahun_akademik ?></option>
                        <?php endforeach; ?>
                    </select>

                </div>
                <div class="col-sm-3" id="desig_div">
                    <select name="designation" class="form-control" id="kategori">
                        <option selected disabled>--Kategori--</option>
                        <?php foreach ($kategori as $key => $val) : ?>
                            <option value="<?= $key ?>"><?= $val ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <a href="<?= base_url('master/rekapTahunAkademik'); ?>" class="btn btn-sm btn-primary" title="Refresh"><i class="fa fa-refresh"></i></a>
            </form>
        </div>
        <div class="box-body table-responsive">
            <?php include 'ajax/table-rekap.php'; ?>
            <div id="rekap-tahun-akademik">
                <!-- <table class="table table-bordered table-striped table-hover datatable" >
                    <thead>
                        <tr>
                            <th width="1%">NO</th>
                            <th width="15%">NAMA Data</th>
                            <th width="3%">Tahun Pelajaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $n = 1;
                        foreach ($kelas as $row) : ?>
                            <?php #if($row->tahun_akademik != 0) :
                            ?>
                            <tr>
                                <td><?= $n++ . '.'; ?></td>
                                <td><a href="#modal-add" data-toggle="modal" onclick="submit(<?= $row->idkelas; ?>)"><i class="fa fa-edit"></i></a>
                                </td>
                                <td><?= $row->kelas_kd; ?></td>
                                <td><?= $row->kelas_nama; ?></td>
                                <td><?= getTahunPelajaran($row->tahun_akademik)->tahun_akademik; ?></td>
                                <td><a href="#" class="btn btn-xs btn-default text-red" data-toggle="tooltip" data-placement="top" data-title="Hapus" onclick="hapus(<?= $row->idkelas; ?>)"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php #endif; 
                            ?>
                        <?php endforeach; ?>
                    </tbody>
                </table> -->
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        $('#kategori').attr('disabled', true);

        $('#tahunAkademik').change(function() {
            const tahunAkademik = $('#tahunAkademik').val();
            if (tahunAkademik != '') {
                $('#kategori').attr('disabled', false);
                $('#kategori').change(function() {
                    const kategori = $('#kategori').val();
                    if (kategori != '') {
                        $.ajax({
                            url: "<?= base_url(); ?>ajax/table-rekap.php",
                            method: 'POST',
                            data:'',
                            success: function(data) {
                                // alert('sukses dapat data brow!');
                                $('#rekap-tahun-akademik').html(data);
                            },
                        });
                    }
                });
            } else {
                $('#kategori').attr('disabled', true);
            }
        });
    });
</script>