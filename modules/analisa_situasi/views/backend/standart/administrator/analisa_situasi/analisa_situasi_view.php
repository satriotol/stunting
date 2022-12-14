<link rel="stylesheet" type="text/css" href="<?php echo BASE_ASSET?>datatables/datatables.min.css"/>
 
<script type="text/javascript" src="<?php echo BASE_ASSET?>datatables/datatables.min.js"></script>
<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>
<script type="text/javascript">
	//This page is a result of an autogenerated content made by running test.html with firefox.
	function domo() {
		// Binding keys
		$('*').bind('keydown', 'Ctrl+e', function assets() {
			$('#btn_edit').trigger('click');
			return false;
		});

		$('*').bind('keydown', 'Ctrl+x', function assets() {
			$('#btn_back').trigger('click');
			return false;
		});
	}

	jQuery(document).ready(domo);
</script>

<style type="text/css">
	#colorSelector {
		position: relative;
		width: 70px;
		height: 36px;
		border: 2px solid #0000002e;
		border-radius: 5px;
	}
	#colorSelector div {
		position: absolute;
		width: 66px;
		height: 32px;
		border: 2px solid #0000002e;
		border-radius: 3px;
	}
</style>

<section class="content-header">
	<h1>
		Analisa Situasi <small><?= cclang('detail', ['Analisa Situasi']);?> </small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class=""><a href="<?= site_url('administrator/analisa_situasi');?>">Analisa Situasi</a></li>
		<li class="active"><?= cclang('detail');?></li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-danger">
				<div class="box-header">
					<div class="box-title">Detail Analisa Situasi</div>
					<div class="pull-right">
				<?php
					is_allowed('analisa_situasi_update', function() use ($analisa_situasi) {
				?>
						<a class="btn btn-flat btn-primary btn_edit btn_action" id="btn_edit" data-stype='back' title="edit analisa_situasi (Ctrl+e)"
							href="<?= site_url('administrator/analisa_situasi/edit/'.$analisa_situasi->analisa_situasi_id);?>">
							<i class="fa fa-edit"></i> <?= cclang('update', ['Analisa Situasi']); ?> </a>
				<?php
					});
				?>
						<a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= site_url('administrator/analisa_situasi/'); ?>">
							<i class="fa fa-undo"></i> <?= cclang('go_list_button', ['Analisa Situasi']);?>
						</a>
					</div>
				</div>
				<div class="box-body">
					<dl class="dl-horizontal" name="form_analisa_situasi" id="form_analisa_situasi">
						<dt>ID <span class="pull-right">:</span></dt>
						<dd><?= _ent($analisa_situasi->analisa_situasi_id);?></dd>
						<dt>Tahun <span class="pull-right">:</span></dt>
						<dd><?= _ent($analisa_situasi->analisa_situasi_year);?></dd>
						<dt>Gambar <span class="pull-right">:</span></dt>
						<dd>
					<?php
						if (is_image($analisa_situasi->analisa_situasi_image)):?>
						<a class="fancybox" rel="group" href="<?= BASE_URL . 'uploads/analisa_situasi/' . $analisa_situasi->analisa_situasi_image; ?>">
							<img src="<?= BASE_URL . 'uploads/analisa_situasi/' . $analisa_situasi->analisa_situasi_image; ?>" class="image-responsive" alt="image analisa_situasi" title="analisa_situasi_image analisa_situasi" width="40px">
						</a>
						<?php else:?>
						<label>
							<a href="<?= BASE_URL . 'administrator/file/download/analisa_situasi/'.$analisa_situasi->analisa_situasi_image; ?>">
								<img src="<?= get_icon_file($analisa_situasi->analisa_situasi_image);?>" class="image-responsive" alt="image analisa_situasi" title="analisa_situasi_image <?= $analisa_situasi->analisa_situasi_image; ?>" width="40px">
								<?= $analisa_situasi->analisa_situasi_image ?>
							</a>
						</label>
					<?php endif; ?>
						</dd>
					</dl>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="box box-danger">
				<div class="box-header">
					<div class="box-title">Data Aksi Analisa Situasi</div>
				</div>
				<div class="box-body">
			<?php
				is_allowed('analisa_situasi_aksi_add', function() use ($analisa_situasi){
			?>
					<a class="btn btn-flat btn-success btn_add_new" id="btn_add_new" title="<?= cclang('add_new_button', [cclang('analisa_situasi_aksi')]); ?>  (Ctrl+a)"
						href="<?=  site_url('administrator/analisa_situasi_aksi/add').'?id='.$analisa_situasi->analisa_situasi_id; ?>"><i class="fa fa-plus-square-o"></i>
						<?= cclang('add_new_button', [cclang('analisa_situasi_aksi')]); ?></a>
			<?php
				});

				is_allowed('analisa_situasi_aksi_export', function() {
			?>
					<a class="btn btn-flat btn-success" title="<?= cclang('export'); ?> <?= cclang('analisa_situasi_aksi') ?> "
						href="<?= site_url('administrator/analisa_situasi_aksi/export?q='.$this->input->get('q').'&f='.$this->input->get('f')); ?>">
						<i class="fa fa-file-excel-o"></i> <?= cclang('export'); ?> XLS</a>
			<?php
				})
			?>
					<br/><br/>
					<table class="table table-bordered table-striped dataTable">
						<thead>
							<tr>
								<th width="50"><?= cclang('nomor')?></th>
								<th><?= cclang('analisa_situasi_aksi_indikator')?></th>
								<th width="200"><?= cclang('analisa_situasi_aksi_cakupan')?></th>
								<!-- <th width="200"><?php //echo cclang('analisa_situasi_aksi_warna')?></th> -->
								<th width="200">Aksi</th>
							</tr>
						</thead>
						<tbody>
<?php
	$no = 1;
	foreach ($analisa_situasi_aksi as $item) {
?>
							<tr>
								<td><?php echo $no++;?>.</td>
								<td><?php echo $item->analisa_situasi_indikator_nama;?></td>
								<td><?php echo $item->analisa_situasi_aksi_cakupan;?></td>
								<!-- <td><div id="colorSelector"><div style="background-color: <?php //echo $item->analisa_situasi_aksi_warna;?>"></div></div></td> -->
								<td>
									<?php is_allowed('analisa_situasi_aksi_update', function() use ($item, $analisa_situasi){?>
										<a href="<?= site_url('administrator/analisa_situasi_aksi/edit/' . $item->analisa_situasi_aksi_id).'?id='.$analisa_situasi->analisa_situasi_id; ?>" class="label-default">
											<i class="fa fa-edit"></i> <?= cclang('update_button');?>
										</a>
									<?php }) ?>
									<?php is_allowed('analisa_situasi_aksi_delete', function() use ($item, $analisa_situasi){?>
										<a href="javascript:void(0);" data-href="<?= site_url('administrator/analisa_situasi_aksi/delete/' . $item->analisa_situasi_aksi_id).'?id='.$analisa_situasi->analisa_situasi_id; ?>" class="label-default remove-data">
											<i class="fa fa-close"></i> <?= cclang('remove_button');?>
										</a>
									<?php }) ?>
								</td>
							</tr>
<?php
	}
?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>

<script>
	$(document).ready(function () {
		(function () {
			var analisa_situasi_year = $('.detail_group-analisa-situasi-year');
			var analisa_situasi_image = $('.detail_group-analisa-situasi-image');
		})()

		$('.dataTable').DataTable({
			'processing' 	: true,
			'retrieve' 		: true,
			"pageLength" 	: 20,
			"lengthChange" 	: false,
			'language' : {
							'url' : 'https://cdn.datatables.net/plug-ins/1.10.16/i18n/Indonesian.json',
							'emptyTable': 'Data Analisa Situasi Aksi tidak tersedia'
			}

		});

		$('.remove-data').click(function () {
			var url = $(this).attr('data-href');
			swal({
					title: "<?= cclang('are_you_sure'); ?>",
					text: "<?= cclang('data_to_be_deleted_can_not_be_restored'); ?>",
					type: "warning",
					showCancelButton: true,
					confirmButtonColor: "#DD6B55",
					confirmButtonText: "<?= cclang('yes_delete_it'); ?>",
					cancelButtonText: "<?= cclang('no_cancel_plx'); ?>",
					closeOnConfirm: true,
					closeOnCancel: true
				},
				function (isConfirm) {
					if (isConfirm) {
						document.location.href = url;
					}
				});

			return false;
		});
	});
</script>