<script type="text/javascript" src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>
<script type="text/javascript">
	//This page is a result of an autogenerated content made by running test.html with firefox.
	function domo() {
		// Binding keys
		$('*').bind('keydown', 'Ctrl+a', function assets() {
			window.location.href = BASE_URL + '/administrator/Analisa_situasi_indikator/add';
			return false;
		});

		$('*').bind('keydown', 'Ctrl+f', function assets() {
			$('#sbtn').trigger('click');
			return false;
		});

		$('*').bind('keydown', 'Ctrl+x', function assets() {
			$('#reset').trigger('click');
			return false;
		});

		$('*').bind('keydown', 'Ctrl+b', function assets() {

			$('#reset').trigger('click');
			return false;
		});
	}

	jQuery(document).ready(domo);
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		<?= cclang('analisa_situasi_indikator') ?><small><?= cclang('list_all'); ?></small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active"><?= cclang('analisa_situasi_indikator') ?></li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-danger">
				<div class="box-header">
					<h3 class="box-title">Indikator Analisa Situasi <i class="label bg-yellow"><?= $analisa_situasi_indikator_counts; ?> <?= cclang('items'); ?></i></h3>
					<div class="row pull-right">
				<?php
					is_allowed('analisa_situasi_indikator_add', function() {
				?>
						<a class="btn btn-flat btn-success btn_add_new" id="btn_add_new" title="<?= cclang('add_new_button', [cclang('analisa_situasi_indikator')]); ?>  (Ctrl+a)" href="<?=  site_url('administrator/analisa_situasi_indikator/add'); ?>">
							<i class="fa fa-plus-square-o"></i> <?= cclang('add_new_button', [cclang('analisa_situasi_indikator')]); ?>
						</a>
				<?php
					});

					is_allowed('analisa_situasi_indikator_export', function() {
				?>
						<a class="btn btn-flat btn-success" title="<?= cclang('export'); ?> <?= cclang('analisa_situasi_indikator') ?> " href="<?= site_url('administrator/analisa_situasi_indikator/export?q='.$this->input->get('q').'&f='.$this->input->get('f')); ?>">
							<i class="fa fa-file-excel-o"></i> <?= cclang('export'); ?> XLS
						</a>
				<?php });?>
					</div>
				</div>
				<div class="box-body">
					<form name="form_analisa_situasi_indikator" id="form_analisa_situasi_indikator" action="<?= base_url('administrator/analisa_situasi_indikator/index'); ?>">
						<div class="row">
							<div class="col-md-8">
								<div class="col-sm-2 padd-left-0">
									<select type="text" class="form-control chosen chosen-select" name="bulk" id="bulk" placeholder="Site Email">
										<option value="delete">Delete</option>
									</select>
								</div>
								<div class="col-sm-2 padd-left-0">
									<button type="button" class="btn btn-flat" name="apply" id="apply" title="<?= cclang('apply_bulk_action'); ?>"><?= cclang('apply_button'); ?></button>
								</div>
								<div class="col-sm-3 padd-left-0">
									<input type="text" class="form-control" name="q" id="filter" placeholder="<?= cclang('filter'); ?>" value="<?= $this->input->get('q'); ?>">
								</div>
								<div class="col-sm-3 padd-left-0">
									<select type="text" class="form-control chosen chosen-select" name="f" id="field">
										<option value=""><?= cclang('all'); ?></option>
										<option <?= $this->input->get('f') == 'analisa_situasi_indikator_nama' ? 'selected' :''; ?> value="analisa_situasi_indikator_nama">Nama Indikator</option>
										<option <?= $this->input->get('f') == 'analisa_situasi_indikator_deskripsi' ? 'selected' :''; ?> value="analisa_situasi_indikator_deskripsi">Deskripsi</option>
									</select>
								</div>
								<div class="col-sm-1 padd-left-0">
									<button type="submit" class="btn btn-flat" name="sbtn" id="sbtn" value="Apply" title="<?= cclang('filter_search'); ?>">Filter</button>
								</div>
								<div class="col-sm-1 padd-left-0">
									<a class="btn btn-default btn-flat" name="reset" id="reset" value="Apply" href="<?= base_url('administrator/analisa_situasi_indikator');?>" title="<?= cclang('reset_filter'); ?>">
										<i class="fa fa-undo"></i>
									</a>
								</div>
							</div>
							<div class="col-md-4">
								<div class="dataTables_paginate paging_simple_numbers pull-right" id="example2_paginate">
									<?= $pagination; ?>
								</div>
							</div>
						</div>
						<div class="table-responsive">
							<br>
							<table class="table table-bordered table-striped dataTable">
								<thead>
									<tr>
										<th>
											<input type="checkbox" class="flat-red toltip" id="check_all" name="check_all" title="check all">
										</th>
										<th width="350" data-field="analisa_situasi_indikator_nama" data-sort="1" data-primary-key="0"> <?= cclang('analisa_situasi_indikator_nama')?></th>
										<th data-field="analisa_situasi_indikator_deskripsi" data-sort="1" data-primary-key="0">
											<?= cclang('analisa_situasi_indikator_deskripsi') ?></th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody id="tbody_analisa_situasi_indikator">
									<?php foreach($analisa_situasi_indikators as $analisa_situasi_indikator): ?>
									<tr>
										<td width="5">
											<input type="checkbox" class="flat-red check" name="id[]" value="<?= $analisa_situasi_indikator->analisa_situasi_indikator_id; ?>">
										</td>
										<td><span class="list_group-analisa-situasi-indikator-nama"><?= _ent($analisa_situasi_indikator->analisa_situasi_indikator_nama); ?></span></td>
										<td><span class="list_group-analisa-situasi-indikator-deskripsi"><?= _ent($analisa_situasi_indikator->analisa_situasi_indikator_deskripsi); ?></span></td>
										<td width="200">
									<?php
										is_allowed('analisa_situasi_indikator_view', function() use ($analisa_situasi_indikator) {
									?>
											<a href="<?= site_url('administrator/analisa_situasi_indikator/view/' . $analisa_situasi_indikator->analisa_situasi_indikator_id);?>" class="label-default"><i class="fa fa-newspaper-o"></i>
												<?= cclang('view_button'); ?>
											</a>
									<?php
										});

										is_allowed('analisa_situasi_indikator_update', function() use ($analisa_situasi_indikator) {
									?>
												<a href="<?= site_url('administrator/analisa_situasi_indikator/edit/' . $analisa_situasi_indikator->analisa_situasi_indikator_id);?>" class="label-default"><i class="fa fa-edit"></i>
													<?= cclang('update_button'); ?>
												</a>
									<?php
										});

										is_allowed('analisa_situasi_indikator_delete', function() use ($analisa_situasi_indikator) {
									?>
												<a href="javascript:void(0);" data-href="<?= site_url('administrator/analisa_situasi_indikator/delete/' . $analisa_situasi_indikator->analisa_situasi_indikator_id);?>" class="label-default remove-data">
													<i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a>
									<?php });?>
										</td>
									</tr>
									<?php endforeach; ?>
									<?php if ($analisa_situasi_indikator_counts == 0) :?>
									<tr>
										<td colspan="100">
											Indikator Analisa Situasi data is not available
										</td>
									</tr>
									<?php endif; ?>
								</tbody>
							</table>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /.content -->

<!-- Page script -->

<script>
	$(document).ready(function () {
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

		$('#apply').click(function () {
			var bulk = $('#bulk');
			var serialize_bulk = $('#form_analisa_situasi_indikator').serialize();

			if (bulk.val() == 'delete') {
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
						document.location.href = BASE_URL +
							'/administrator/analisa_situasi_indikator/delete?' + serialize_bulk;
					}
				});

				return false;
			} else if (bulk.val() == '') {
				swal({
					title: "Upss",
					text: "<?= cclang('please_choose_bulk_action_first'); ?>",
					type: "warning",
					showCancelButton: false,
					confirmButtonColor: "#DD6B55",
					confirmButtonText: "Okay!",
					closeOnConfirm: true,
					closeOnCancel: true
				});

				return false;
			}

			return false;
		}); /*end appliy click*/

		//check all
		var checkAll = $('#check_all');
		var checkboxes = $('input.check');

		checkAll.on('ifChecked ifUnchecked', function (event) {
			if (event.type == 'ifChecked') {
				checkboxes.iCheck('check');
			} else {
				checkboxes.iCheck('uncheck');
			}
		});

		checkboxes.on('ifChanged', function (event) {
			if (checkboxes.filter(':checked').length == checkboxes.length) {
				checkAll.prop('checked', 'checked');
			} else {
				checkAll.removeProp('checked');
			}
			checkAll.iCheck('update');
		});
		initSortable('analisa_situasi_indikator', $('table.dataTable'));
	}); /*end doc ready*/
</script>