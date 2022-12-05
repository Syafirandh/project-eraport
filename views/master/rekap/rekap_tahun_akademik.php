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
            <div id="rekap-tahun-akademik">
                
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        $('#kategori').attr('disabled', true);
        // $('#rekap-tahun-akademik').hide();

        $('#tahunAkademik').change(function() {
            var tahunAkademik = $('#tahunAkademik').val();
            if (tahunAkademik != '') {
                $('#kategori').attr('disabled', false);
                $('#kategori').change(function() {
                    var kategori = $('#kategori').val();
                    if (kategori != '') {
                        
                        if (kategori == 0) {
                            $.ajax({
                                url: "<?= base_url(); ?>views/master/rekap/ajax/search-siswa.php",
                                method: 'POST',
                                data: 'request=' + kategori,
                                beforeSend: function(){
                                    $('#rekap-tahun-akademik').html("<span>Loading....</span>");
                                },
                                success: function(data) {
                                    
                                    // $('#rekap-tahun-akademik').show();
                                    $('#rekap-tahun-akademik').html(data);
                                },
                            });
                            

                        } else if (kategori == 1) {
                            $.ajax({
                                url: "<?= base_url(); ?>views/master/rekap/ajax/search-kelas.php",
                                method: 'POST',
                                data: 'request=' + kategori,
                                beforeSend: function(){
                                    $('#rekap-tahun-akademik').html("<span>Loading....</span>");
                                },
                                success: function(data) {
                                    
                                    // $('#rekap-tahun-akademik').show();
                                    $('#rekap-tahun-akademik').html(data);
                                },
                            });
                            
                        }else{
                            $.ajax({
                                url: "<?= base_url(); ?>views/master/rekap/ajax/search-mapel.php",
                                method: 'POST',
                                data: 'request=' + kategori,
                                beforeSend: function(){
                                    $('#rekap-tahun-akademik').html("<span>Loading....</span>");
                                },
                                success: function(data) {
                                    
                                    // $('#rekap-tahun-akademik').show();
                                    $('#rekap-tahun-akademik').html(data);
                                },
                            });
                        }
                    }
                });
            } else {
                $('#kategori').attr('disabled', true);
            }
        });
    });
</script>