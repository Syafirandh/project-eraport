<?php
include 'connection.php';

if (isset($_POST['request'])) {
	$request = $_POST['request'];
	$result = mysqli_query($conn, "select * from kelas");

?>

	<table class="table table-bordered table-striped table-hover datatable">
		<thead>
			<tr>
				<th width="1%">No</th>
				<th width="15%">kode kelas</th>
				<th width="15%">nama kelas</th>
				<th width="15%">tahun akademik</th>
				
			</tr>
		</thead>
		<?php
		if (!empty($result)) {
		?>
			<tbody>
				<?php
				$n = 1;
				while ($row = mysqli_fetch_assoc($result)) {
				?>
					<tr>
						<td><?= $n++ . '.' ?></td>
						<td><?= $row['kelas_kd'] ?></td>
						<td><?= $row['kelas_nama'] ?></td>
                        <td><?= $row['tahun_akademik'] ?></td>
						
					</tr>
				<?php
				}
				?>
			</tbody>
		<?php
		} else {
		?>
			<tbody>
				<tr><?= 'Data Tidak Ditemukan !' ?></tr>
			</tbody>
		<?php
		}
		?>
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

<?php
}
?>