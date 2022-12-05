<table class="table table-bordered table-striped table-hover datatable">
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
</table>