<?php
    include 'connection.php';
?>

<table class="table table-bordered table-striped table-hover datatable">
    <thead>
        <tr>
            <th width="1%">NO</th>
            <th width="15%">Data</th>
            <th width="3%">Tahun Pelajaran</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $n=1;
        $query = mysqli_query($conn,"select * from siswa");
        while($tampilkan = mysqli_fetch_array($query)){
        ?>
            <tr>
                <th><?= $n++.'.' ?></th>
                <th><?= $tampilkan['nis'] ?></th>
                <th><?= $tampilkan['nisn'] ?></th>
                <th><?= $tampilkan['nama'] ?></th>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('.datatable').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': false,
            'info': true,
            'autoWidth': false
        });
    })
</script>