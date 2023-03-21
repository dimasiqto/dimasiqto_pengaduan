<!DOCTYPE html>
<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
    <link href="<?= base_url('assets/')?>css/styles.css" rel="stylesheet" />
</head>
<body>
 
	<div class="container">
		<center>
			<h4>Data pengaduan PDF</h4>
    
			
		</center>
		<br/>

		<table class='table table-bordered'>
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>NIK</th>
					<th>Kategori</th>
					<th>Subkategori</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<?php $i=1;
				foreach($data_pengaduan as $p): ?>
				<tr>
					<td><?= $i?></td>
					<td><?= $p['nama']?></td>
					<td><?= $p['nik']?></td>
					<td><?= $p['kategori']?></td>
					<td><?= $p['subkategori']?></td>
					<td><?= $p['status_pengaduan']?></td>
				</tr>
				<?php endforeach?>
			</tbody>
		</table>
 
	</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url('assets/')?>js/scripts.js"></script>
</body>
</html>