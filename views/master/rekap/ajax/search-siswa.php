<?php
include 'connection.php';

if (isset($_POST['request'])) {
	$request = $_POST['request'];
	$result = mysqli_query($conn, "select * from siswa");

?>

	<table class="table table-bordered table-striped table-hover datatable">
		<thead>
			<tr>
				<th width="1%">No</th>
				<th width="15%">NIS</th>
				<th width="15%">NISN</th>
				<th width="15%">Nama</th>
				<th width="15%">Status</th>
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
						<td><?= $row['nis'] ?></td>
						<td><?= $row['nisn'] ?></td>
						<td><?= $row['nama'] ?></td>
						<td><?= $row['status'] ?></td>
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