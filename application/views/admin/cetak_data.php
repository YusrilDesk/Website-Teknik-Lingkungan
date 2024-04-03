<!DOCTYPE html>
<html>
<head>
	<title>Data Tunggakan</title><!-- 
	<link href="<?php echo base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet"> -->
	<!-- <link href="<?php echo base_url(); ?>assets/css/mystyle.css" rel="stylesheet"> -->

	<style type="text/css">
		.conten{
			padding: 20px;

		}
		.table {
			/*padding: 20px;*/
		}
		.table tr {
			height: 5px;
		}
		.table td {
			border:0;
		}
		.table th {
			width:4cm;
			border:0;
			text-align: left;
		}
	</style>
</head>
<body>
	<div class="conten">
		<h3>Data Tunggakan</h3>
		<table class="table">
			<tr>
				<th>Nama</th>
				<td>:  <?php echo $detail[0]->nama; ?></td>
			</tr>
			<tr>
				<th>Nim</th>
				<td>:  <?php echo $detail[0]->nim; ?></td>
			</tr>
			<tr>
				<th>Program Studi</th>
				<td>:  <?php echo $detail[0]->program_studi; ?></td>
			</tr>
			<tr>
				<th>Tahun Lulus</th>
				<td>:  <?php echo $detail[0]->tahun_pembelajaran; ?></td>
			</tr>
			<tr>
				<th>Alamat</th>
				<td>:  <?php echo $detail[0]->alamat; ?></td>
			</tr>
		</table>
	</div>
	<script type="text/javascript">
		window.print();
	</script>

</body>
</html>