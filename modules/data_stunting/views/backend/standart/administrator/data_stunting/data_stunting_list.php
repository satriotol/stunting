<section class="content-header">
	<h1>
		<?= cclang('data_stunting') ?><small><?= cclang('list_all'); ?></small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active"><?= cclang('data_stunting') ?></li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-danger">
				<div class="box-body">
					<div class="box box-widget widget-user-2">
						<div class="widget-user-header">
							<div class="row pull-right">
								<?php is_allowed('data_stunting_add', function(){?>
								<a class="btn btn-flat btn-success btn_add_new" id="btn_add_new" title="<?= cclang('add_new_button', [cclang('data_stunting')]); ?>  (Ctrl+a)" href="<?=  site_url('administrator/data_stunting/add'); ?>"><i
										class="fa fa-plus-square-o"></i>
									<?= cclang('add_new_button', [cclang('data_stunting')]); ?></a>
								<?php }) ?>
								<?php is_allowed('data_stunting_export', function(){?>
								<a class="btn btn-flat btn-success" title="<?= cclang('export'); ?> <?= cclang('data_stunting') ?> " href="<?= site_url('administrator/data_stunting/export?q='.$this->input->get('q').'&f='.$this->input->get('f')); ?>"><i
										class="fa fa-file-excel-o"></i> <?= cclang('export'); ?> XLS</a>
								<?php }) ?>
							</div>
							<div class="widget-user-image">
								<img class="img-circle" src="<?= BASE_ASSET; ?>/img/list.png" alt="User Avatar">
							</div>
							<!-- /.widget-user-image -->
							<h3 class="widget-user-username"><?= cclang('data_stunting') ?></h3>
							<h5 class="widget-user-desc"><?= cclang('list_all', [cclang('data_stunting')]); ?> <i
									class="label bg-yellow"><?= $data_stunting_counts; ?> <?= cclang('items'); ?></i>
							</h5>
						</div>

						<form name="form_data_stunting" id="form_data_stunting" action="<?= base_url('administrator/data_stunting/index'); ?>">
							<!-- /.widget-user -->
							<div class="row">
								<div class="col-md-8">
									<div class="col-sm-2 padd-left-0">
										<select type="text" class="form-control chosen chosen-select" name="bulk"
											id="bulk" placeholder="Site Email">
											<option value="delete">Delete</option>
										</select>
									</div>
									<div class="col-sm-2 padd-left-0">
										<button type="button" class="btn btn-flat" name="apply" id="apply"
											title="<?= cclang('apply_bulk_action'); ?>"><?= cclang('apply_button'); ?></button>
									</div>
									<div class="col-sm-3 padd-left-0 ">
										<input type="text" class="form-control" name="q" id="filter"
											placeholder="<?= cclang('filter'); ?>"
											value="<?= $this->input->get('q'); ?>">
									</div>
									<div class="col-sm-3 padd-left-0">
										<select type="text" class="form-control chosen chosen-select" name="f"
											id="field">
											<option value=""><?= cclang('all'); ?></option>
											<option <?= $this->input->get('f') == 'puskesmas' ? 'selected' :''; ?> value="puskesmas">Puskesmas</option>
											<option <?= $this->input->get('f') == 'kecamatan' ? 'selected' :''; ?> value="kecamatan">Kecamatan</option>
											<option <?= $this->input->get('f') == 'kelurahan' ? 'selected' :''; ?> value="kelurahan">Kelurahan</option>
											<option <?= $this->input->get('f') == 'no_kk' ? 'selected' :''; ?> value="no_kk">No. KK</option>
											<option <?= $this->input->get('f') == 'nik_anak' ? 'selected' :''; ?> value="nik_anak">NIK Anak</option>
											<option <?= $this->input->get('f') == 'nama_anak' ? 'selected' :''; ?> value="nama_anak">Nama Anak</option>
											<option <?= $this->input->get('f') == 'jenis_kel' ? 'selected' :''; ?> value="jenis_kel">Jenis Kelamin</option>
											<option <?= $this->input->get('f') == 'tanggal_lahir' ? 'selected' :''; ?> value="tanggal_lahir">Tanggal Lahir</option>
										</select>
									</div>
									<div class="col-sm-1 padd-left-0">
										<button type="submit" class="btn btn-flat" name="sbtn" id="sbtn" value="Apply"
											title="<?= cclang('filter_search'); ?>">
											Filter
										</button>
									</div>
									<div class="col-sm-1 padd-left-0">
										<a class="btn btn-default btn-flat" name="reset" id="reset" value="Apply"
											href="<?= base_url('administrator/data_stunting');?>"
											title="<?= cclang('reset_filter'); ?>">
											<i class="fa fa-undo"></i>
										</a>
									</div>
								</div>
								<div class="col-md-4">
									<div class="dataTables_paginate paging_simple_numbers pull-right"
										id="example2_paginate">
										<?= $pagination; ?>
									</div>
								</div>
							</div>
							<div class="table-responsive">
								<br>
								<table class="table table-bordered table-striped dataTable">
									<thead>
										<tr class="">
											<th>
												<input type="checkbox" class="flat-red toltip" id="check_all" name="check_all" title="check all">
											</th>
											<th data-field="puskesmas" data-sort="1" data-primary-key="0"><?= cclang('puskesmas') ?></th>
											<th data-field="kecamatan" data-sort="1" data-primary-key="0"><?= cclang('kecamatan') ?></th>
											<th data-field="kelurahan" data-sort="1" data-primary-key="0"><?= cclang('kelurahan') ?></th>
											<th data-field="no_kk" data-sort="1" data-primary-key="0"><?= cclang('no_kk') ?></th>
											<th data-field="nik_anak" data-sort="1" data-primary-key="0"><?= cclang('nik_anak') ?></th>
											<th data-field="nama_anak" data-sort="1" data-primary-key="0"><?= cclang('nama_anak') ?></th>
											<!-- <th data-field="jenis_kel" data-sort="1" data-primary-key="0"><?= cclang('jenis_kel') ?></th> -->
											<th data-field="tanggal_lahir" data-sort="1" data-primary-key="0"><?= cclang('tanggal_lahir') ?></th>
											<th>Umur</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody id="tbody_data_stunting">
								<?php
									foreach($data_stuntings as $data_stunting) {
										if  (_ent($data_stunting->puskesmas_nama) != null) {
											$puskesmas = $data_stunting->puskesmas_puskesmas_nama;
										}else{
											$puskesmas = $data_stunting->puskesmas;
										}

										if (_ent($data_stunting->jenis_kel) == 'L') {
											$jenkel = '<label class="label label-primary">L</label>';
										}else if (_ent($data_stunting->jenis_kel) == 'P') {
											$jenkel = '<label class="label label-danger">P</label>';
										}
								?>
										<tr>
											<td width="5"><input type="checkbox" class="flat-red check" name="id[]" value="<?= $data_stunting->id_data_stunting; ?>"></td>
											<td><?= ucwords(strtolower('Puskesmas '.$puskesmas));?></td>
											<td><?= $data_stunting->kecamatans_kecamatan_nama;?></td>
											<td><?= $data_stunting->kelurahans_kelurahan_nama?></td>
											<td><span class="list_group-no_kk"><?= _ent($data_stunting->no_kk); ?></span></td>
											<td><span class="list_group-nik_anak"><?= _ent($data_stunting->nik_anak); ?></span></td>
											<td><span class="list_group-nama_anak"><?= strtoupper(_ent($data_stunting->nama_anak)).' '.$jenkel; ?></span></td>
											<!-- <td><span class="list_group-jenis_kel"><?= $jenkel; ?></span></td> -->
											<td><span class="list_group-tanggal_lahir"><?= _ent($data_stunting->tanggal_lahir); ?></span></td>
											<td><?= dateOfBirth(_ent($data_stunting->tanggal_lahir)); ?></td>
											<td width="200">
												<?php is_allowed('data_stunting_view', function() use ($data_stunting){?>
												<a href="<?= site_url('administrator/data_stunting/view/' . $data_stunting->id_data_stunting); ?>"
													class="label-default"><i class="fa fa-newspaper-o"></i>
													<?= cclang('view_button'); ?>
													<?php }) ?>
													<?php is_allowed('data_stunting_update', function() use ($data_stunting){?>
													<a href="<?= site_url('administrator/data_stunting/edit/' . $data_stunting->id_data_stunting); ?>"
														class="label-default"><i class="fa fa-edit"></i>
														<?= cclang('update_button'); ?></a>
													<?php }) ?>
													<?php is_allowed('data_stunting_delete', function() use ($data_stunting){?>
													<a href="javascript:void(0);"
														data-href="<?= site_url('administrator/data_stunting/delete/' . $data_stunting->id_data_stunting); ?>"
														class="label-default remove-data"><i class="fa fa-close"></i>
														<?= cclang('remove_button'); ?></a>
													<?php }) ?>

											</td>
										</tr>
										<?php } ?>
										<?php if ($data_stunting_counts == 0) :?>
										<tr>
											<td colspan="100">
												Data Stunting data is not available
											</td>
										</tr>
										<?php endif; ?>

									</tbody>
								</table>
							</div>
					</div>
					<hr>

				</div>
				</form>
				<!--/box body -->
			</div>
			<!--/box -->
		</div>
	</div>
</section>
<!-- /.content -->

<!-- Page script -->

<script>
	$(document).ready(function () {

		(function () {

		})()


		$('.table tbody tr').each(function () {
			var row = $(this);
			(function () {
				var puskesmas = row.find('.list_group-puskesmas');
				var kecamatan = row.find('.list_group-kecamatan');
				var kelurahan = row.find('.list_group-kelurahan');
				var no_kk = row.find('.list_group-no_kk');
				var nik_anak = row.find('.list_group-nik_anak');
				var nama_anak = row.find('.list_group-nama_anak');
				var no_anak = row.find('.list_group-no_anak');
				var jenis_kel = row.find('.list_group-jenis_kel');
				var tanggal_lahir = row.find('.list_group-tanggal_lahir');
				var alamat = row.find('.list_group-alamat');
				var rt = row.find('.list_group-rt');
				var rw = row.find('.list_group-rw');
				var nik_ayah = row.find('.list_group-nik_ayah');
				var nama_ayah = row.find('.list_group-nama_ayah');
				var nik_ibu = row.find('.list_group-nik_ibu');
				var nama_ibu = row.find('.list_group-nama_ibu');

			})()
		})

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
			var serialize_bulk = $('#form_data_stunting').serialize();

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
								'/administrator/data_stunting/delete?' + serialize_bulk;
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
		initSortable('data_stunting', $('table.dataTable'));
	}); /*end doc ready*/
</script>