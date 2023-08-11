<section class="content-header">
	<h1>
		<?= cclang('data_stunting_anak') ?><small><?= cclang('list_all'); ?></small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active"><?= cclang('data_stunting_anak') ?></li>
	</ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-warning">
				<div class="box-body">
					<div class="box box-widget widget-user-2">
						<div class="widget-user-header">
							<div class="row pull-right">
								<?php is_allowed('data_stunting_anak_add', function(){?>
								<a class="btn btn-flat btn-success btn_add_new" id="btn_add_new"
									title="<?= cclang('add_new_button', [cclang('data_stunting_anak')]); ?>  (Ctrl+a)"
									href="<?=  site_url('administrator/data_stunting_anak/add'); ?>"><i
										class="fa fa-plus-square-o"></i>
									<?= cclang('add_new_button', [cclang('data_stunting_anak')]); ?></a>
								<?php }) ?>
								<?php is_allowed('data_stunting_anak_export', function(){?>
								<a class="btn btn-flat btn-success"
									title="<?= cclang('export'); ?> <?= cclang('data_stunting_anak') ?> "
									href="<?= site_url('administrator/data_stunting_anak/export?q='.$this->input->get('q').'&f='.$this->input->get('f')); ?>"><i
										class="fa fa-file-excel-o"></i> <?= cclang('export'); ?> XLS</a>
								<?php }) ?>
							</div>
							<div class="widget-user-image">
								<img class="img-circle" src="<?= BASE_ASSET; ?>/img/list.png" alt="User Avatar">
							</div>
							<!-- /.widget-user-image -->
							<h3 class="widget-user-username"><?= cclang('data_stunting_anak') ?></h3>
							<h5 class="widget-user-desc"><?= cclang('list_all', [cclang('data_stunting_anak')]); ?> <i
									class="label bg-yellow"><?= $data_stunting_anak_counts; ?>
									<?= cclang('items'); ?></i></h5>
						</div>

						<form name="form_data_stunting_anak" id="form_data_stunting_anak"
							action="<?= base_url('administrator/data_stunting_anak/index'); ?>">
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
											<option
												<?= $this->input->get('f') == 'stunting_anak_anak_id' ? 'selected' :''; ?>
												value="stunting_anak_anak_id">Nama Anak</option>
											<option
												<?= $this->input->get('f') == 'stunting_anak_dtks' ? 'selected' :''; ?>
												value="stunting_anak_dtks">DTKS</option>
											<option
												<?= $this->input->get('f') == 'stunting_anak_tgl_ukur' ? 'selected' :''; ?>
												value="stunting_anak_tgl_ukur">Tanggal Pengukuran</option>
											<option
												<?= $this->input->get('f') == 'stunting_anak_berat_badan' ? 'selected' :''; ?>
												value="stunting_anak_berat_badan">Berat Badan Anak</option>
											<option
												<?= $this->input->get('f') == 'stunting_anak_tinggi_badan' ? 'selected' :''; ?>
												value="stunting_anak_tinggi_badan">Tinggi Badan Anak</option>
											<option
												<?= $this->input->get('f') == 'stunting_anak_anak_angkat' ? 'selected' :''; ?>
												value="stunting_anak_anak_angkat">Anak Angkat</option>
											<option
												<?= $this->input->get('f') == 'stunting_anak_anak_angkat_anggaran' ? 'selected' :''; ?>
												value="stunting_anak_anak_angkat_anggaran">Anggaran Anak Angkat</option>
											<option
												<?= $this->input->get('f') == 'stunting_anak_pengasuh_balita' ? 'selected' :''; ?>
												value="stunting_anak_pengasuh_balita">Pengasuh Balita</option>
											<option
												<?= $this->input->get('f') == 'stunting_anak_pengasuh_balita_anggaran' ? 'selected' :''; ?>
												value="stunting_anak_pengasuh_balita_anggaran">Anggaran Pengasuh Balita
											</option>
											<option
												<?= $this->input->get('f') == 'stunting_anak_day_care' ? 'selected' :''; ?>
												value="stunting_anak_day_care">Day Care Stunting</option>
											<option
												<?= $this->input->get('f') == 'stunting_anak_day_care_anggaran' ? 'selected' :''; ?>
												value="stunting_anak_day_care_anggaran">Anggaran Day Care Stunting
											</option>
											<option
												<?= $this->input->get('f') == 'stunting_anak_asupan_gizi_pmt' ? 'selected' :''; ?>
												value="stunting_anak_asupan_gizi_pmt">Asupan Gizi (PMT)</option>
											<option
												<?= $this->input->get('f') == 'stunting_anak_imunisasi' ? 'selected' :''; ?>
												value="stunting_anak_imunisasi">Imunisasi Anak</option>
											<option
												<?= $this->input->get('f') == 'stunting_anak_imunisasi_anggaran' ? 'selected' :''; ?>
												value="stunting_anak_imunisasi_anggaran">Anggaran Imunisasi Anak
											</option>
											<option
												<?= $this->input->get('f') == 'stunting_anak_terapi_gizi' ? 'selected' :''; ?>
												value="stunting_anak_terapi_gizi">Terapi Gizi</option>
											<option
												<?= $this->input->get('f') == 'stunting_anak_terapi_gizi_anggaran' ? 'selected' :''; ?>
												value="stunting_anak_terapi_gizi_anggaran">Anggaran Terapi Gizi</option>
											<option
												<?= $this->input->get('f') == 'stunting_anak_bpjs_stunting' ? 'selected' :''; ?>
												value="stunting_anak_bpjs_stunting">BPJS Stunting</option>
											<option
												<?= $this->input->get('f') == 'stunting_anak_bpjs_stunting_anggaran' ? 'selected' :''; ?>
												value="stunting_anak_bpjs_stunting_anggaran">Anggaran BPJS Stunting
											</option>
											<option
												<?= $this->input->get('f') == 'stunting_anak_bantuan_sembako' ? 'selected' :''; ?>
												value="stunting_anak_bantuan_sembako">Bantuan Sembako</option>
											<option
												<?= $this->input->get('f') == 'stunting_anak_bantuan_sembako_anggaran' ? 'selected' :''; ?>
												value="stunting_anak_bantuan_sembako_anggaran">Anggaran Bantuan Sembako
											</option>
											<option
												<?= $this->input->get('f') == 'stunting_anak_dahsyat' ? 'selected' :''; ?>
												value="stunting_anak_dahsyat">Dahsyat</option>
											<option
												<?= $this->input->get('f') == 'stunting_anak_dahsyat_anggaran' ? 'selected' :''; ?>
												value="stunting_anak_dahsyat_anggaran">Anggaran Dahsyat</option>
											<option
												<?= $this->input->get('f') == 'stunting_anak_rtlh' ? 'selected' :''; ?>
												value="stunting_anak_rtlh">RTLH</option>
											<option
												<?= $this->input->get('f') == 'stunting_anak_rtlh_anggaran' ? 'selected' :''; ?>
												value="stunting_anak_rtlh_anggaran">Anggaran RTLH</option>
											<option
												<?= $this->input->get('f') == 'stunting_anak_dlh' ? 'selected' :''; ?>
												value="stunting_anak_dlh">DLH</option>
											<option
												<?= $this->input->get('f') == 'stunting_anak_dlh_anggaran' ? 'selected' :''; ?>
												value="stunting_anak_dlh_anggaran">Anggaran DLH</option>
											<option
												<?= $this->input->get('f') == 'stunting_anak_akses_pangan' ? 'selected' :''; ?>
												value="stunting_anak_akses_pangan">Akses Pangan / UMKM Lokal</option>
											<option
												<?= $this->input->get('f') == 'stunting_anak_akses_pangan_anggaran' ? 'selected' :''; ?>
												value="stunting_anak_akses_pangan_anggaran">Anggaran Akses Pangan / UMKM
												Lokal</option>
											<option
												<?= $this->input->get('f') == 'stunting_anak_mitra_lain' ? 'selected' :''; ?>
												value="stunting_anak_mitra_lain">Mitra Lain</option>
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
											href="<?= base_url('administrator/data_stunting_anak');?>"
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
												<input type="checkbox" class="flat-red toltip" id="check_all"
													name="check_all" title="check all">
											</th>
											<th data-field="stunting_anak_anak_id" data-sort="1" data-primary-key="0">
												<?= cclang('stunting_anak_anak_id') ?></th>
											<th data-field="stunting_anak_dtks" data-sort="1" data-primary-key="0">
												<?= cclang('stunting_anak_dtks') ?></th>
											<th data-field="stunting_anak_tgl_ukur" data-sort="1" data-primary-key="0">
												<?= cclang('stunting_anak_tgl_ukur') ?></th>
											<th data-field="stunting_anak_berat_badan" data-sort="1"
												data-primary-key="0"> <?= cclang('stunting_anak_berat_badan') ?></th>
											<th data-field="stunting_anak_tinggi_badan" data-sort="1"
												data-primary-key="0"> <?= cclang('stunting_anak_tinggi_badan') ?></th>
											<th data-field="stunting_anak_anak_angkat" data-sort="1"
												data-primary-key="0"> <?= cclang('stunting_anak_anak_angkat') ?></th>
											<th data-field="stunting_anak_anak_angkat_anggaran" data-sort="1"
												data-primary-key="0">
												<?= cclang('stunting_anak_anak_angkat_anggaran') ?></th>
											<th data-field="stunting_anak_pengasuh_balita" data-sort="1"
												data-primary-key="0"> <?= cclang('stunting_anak_pengasuh_balita') ?>
											</th>
											<th data-field="stunting_anak_pengasuh_balita_anggaran" data-sort="1"
												data-primary-key="0">
												<?= cclang('stunting_anak_pengasuh_balita_anggaran') ?></th>
											<th data-field="stunting_anak_day_care" data-sort="1" data-primary-key="0">
												<?= cclang('stunting_anak_day_care') ?></th>
											<th data-field="stunting_anak_day_care_anggaran" data-sort="1"
												data-primary-key="0"> <?= cclang('stunting_anak_day_care_anggaran') ?>
											</th>
											<th data-field="stunting_anak_asupan_gizi_pmt" data-sort="1"
												data-primary-key="0"> <?= cclang('stunting_anak_asupan_gizi_pmt') ?>
											</th>
											<th data-field="stunting_anak_imunisasi" data-sort="1" data-primary-key="0">
												<?= cclang('stunting_anak_imunisasi') ?></th>
											<th data-field="stunting_anak_imunisasi_anggaran" data-sort="1"
												data-primary-key="0"> <?= cclang('stunting_anak_imunisasi_anggaran') ?>
											</th>
											<th data-field="stunting_anak_terapi_gizi" data-sort="1"
												data-primary-key="0"> <?= cclang('stunting_anak_terapi_gizi') ?></th>
											<th data-field="stunting_anak_terapi_gizi_anggaran" data-sort="1"
												data-primary-key="0">
												<?= cclang('stunting_anak_terapi_gizi_anggaran') ?></th>
											<th data-field="stunting_anak_bpjs_stunting" data-sort="1"
												data-primary-key="0"> <?= cclang('stunting_anak_bpjs_stunting') ?></th>
											<th data-field="stunting_anak_bpjs_stunting_anggaran" data-sort="1"
												data-primary-key="0">
												<?= cclang('stunting_anak_bpjs_stunting_anggaran') ?></th>
											<th data-field="stunting_anak_bantuan_sembako" data-sort="1"
												data-primary-key="0"> <?= cclang('stunting_anak_bantuan_sembako') ?>
											</th>
											<th data-field="stunting_anak_bantuan_sembako_anggaran" data-sort="1"
												data-primary-key="0">
												<?= cclang('stunting_anak_bantuan_sembako_anggaran') ?></th>
											<th data-field="stunting_anak_dahsyat" data-sort="1" data-primary-key="0">
												<?= cclang('stunting_anak_dahsyat') ?></th>
											<th data-field="stunting_anak_dahsyat_anggaran" data-sort="1"
												data-primary-key="0"> <?= cclang('stunting_anak_dahsyat_anggaran') ?>
											</th>
											<th data-field="stunting_anak_rtlh" data-sort="1" data-primary-key="0">
												<?= cclang('stunting_anak_rtlh') ?></th>
											<th data-field="stunting_anak_rtlh_anggaran" data-sort="1"
												data-primary-key="0"> <?= cclang('stunting_anak_rtlh_anggaran') ?></th>
											<th data-field="stunting_anak_dlh" data-sort="1" data-primary-key="0">
												<?= cclang('stunting_anak_dlh') ?></th>
											<th data-field="stunting_anak_dlh_anggaran" data-sort="1"
												data-primary-key="0"> <?= cclang('stunting_anak_dlh_anggaran') ?></th>
											<th data-field="stunting_anak_akses_pangan" data-sort="1"
												data-primary-key="0"> <?= cclang('stunting_anak_akses_pangan') ?></th>
											<th data-field="stunting_anak_akses_pangan_anggaran" data-sort="1"
												data-primary-key="0">
												<?= cclang('stunting_anak_akses_pangan_anggaran') ?></th>
											<th data-field="stunting_anak_mitra_lain" data-sort="1"
												data-primary-key="0"> <?= cclang('stunting_anak_mitra_lain') ?></th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody id="tbody_data_stunting_anak">
										<?php foreach($data_stunting_anaks as $data_stunting_anak): ?>
										<tr>
											<td width="5">
												<input type="checkbox" class="flat-red check" name="id[]"
													value="<?= $data_stunting_anak->stunting_anak_id; ?>">
											</td>

											<td><?php if  ($data_stunting_anak->stunting_anak_anak_id) {

							  echo anchor('administrator/data_anak/view/'.$data_stunting_anak->stunting_anak_anak_id.'?popup=show', $data_stunting_anak->data_anak_anak_nama, ['class' => 'popup-view']); }?>
											</td>

											<td><span
													class="list_group-stunting_anak_dtks"><?= _ent($data_stunting_anak->stunting_anak_dtks); ?></span>
											</td>
											<td><span
													class="list_group-stunting_anak_tgl_ukur"><?= _ent($data_stunting_anak->stunting_anak_tgl_ukur); ?></span>
											</td>
											<td><span
													class="list_group-stunting_anak_berat_badan"><?= _ent($data_stunting_anak->stunting_anak_berat_badan); ?></span>
											</td>
											<td><span
													class="list_group-stunting_anak_tinggi_badan"><?= _ent($data_stunting_anak->stunting_anak_tinggi_badan); ?></span>
											</td>
											<td><span
													class="list_group-stunting_anak_anak_angkat"><?= _ent($data_stunting_anak->stunting_anak_anak_angkat); ?></span>
											</td>
											<td><span
													class="list_group-stunting_anak_anak_angkat_anggaran"><?= _ent($data_stunting_anak->stunting_anak_anak_angkat_anggaran); ?></span>
											</td>
											<td><span
													class="list_group-stunting_anak_pengasuh_balita"><?= _ent($data_stunting_anak->stunting_anak_pengasuh_balita); ?></span>
											</td>
											<td><span
													class="list_group-stunting_anak_pengasuh_balita_anggaran"><?= _ent($data_stunting_anak->stunting_anak_pengasuh_balita_anggaran); ?></span>
											</td>
											<td><span
													class="list_group-stunting_anak_day_care"><?= _ent($data_stunting_anak->stunting_anak_day_care); ?></span>
											</td>
											<td><span
													class="list_group-stunting_anak_day_care_anggaran"><?= _ent($data_stunting_anak->stunting_anak_day_care_anggaran); ?></span>
											</td>
											<td><span
													class="list_group-stunting_anak_asupan_gizi_pmt"><?= _ent($data_stunting_anak->stunting_anak_asupan_gizi_pmt); ?></span>
											</td>
											<td><span
													class="list_group-stunting_anak_imunisasi"><?= _ent($data_stunting_anak->stunting_anak_imunisasi); ?></span>
											</td>
											<td><span
													class="list_group-stunting_anak_imunisasi_anggaran"><?= _ent($data_stunting_anak->stunting_anak_imunisasi_anggaran); ?></span>
											</td>
											<td><span
													class="list_group-stunting_anak_terapi_gizi"><?= _ent($data_stunting_anak->stunting_anak_terapi_gizi); ?></span>
											</td>
											<td><span
													class="list_group-stunting_anak_terapi_gizi_anggaran"><?= _ent($data_stunting_anak->stunting_anak_terapi_gizi_anggaran); ?></span>
											</td>
											<td><span
													class="list_group-stunting_anak_bpjs_stunting"><?= _ent($data_stunting_anak->stunting_anak_bpjs_stunting); ?></span>
											</td>
											<td><span
													class="list_group-stunting_anak_bpjs_stunting_anggaran"><?= _ent($data_stunting_anak->stunting_anak_bpjs_stunting_anggaran); ?></span>
											</td>
											<td><span
													class="list_group-stunting_anak_bantuan_sembako"><?= _ent($data_stunting_anak->stunting_anak_bantuan_sembako); ?></span>
											</td>
											<td><span
													class="list_group-stunting_anak_bantuan_sembako_anggaran"><?= _ent($data_stunting_anak->stunting_anak_bantuan_sembako_anggaran); ?></span>
											</td>
											<td><span
													class="list_group-stunting_anak_dahsyat"><?= _ent($data_stunting_anak->stunting_anak_dahsyat); ?></span>
											</td>
											<td><span
													class="list_group-stunting_anak_dahsyat_anggaran"><?= _ent($data_stunting_anak->stunting_anak_dahsyat_anggaran); ?></span>
											</td>
											<td><span
													class="list_group-stunting_anak_rtlh"><?= _ent($data_stunting_anak->stunting_anak_rtlh); ?></span>
											</td>
											<td><span
													class="list_group-stunting_anak_rtlh_anggaran"><?= _ent($data_stunting_anak->stunting_anak_rtlh_anggaran); ?></span>
											</td>
											<td><span
													class="list_group-stunting_anak_dlh"><?= _ent($data_stunting_anak->stunting_anak_dlh); ?></span>
											</td>
											<td><span
													class="list_group-stunting_anak_dlh_anggaran"><?= _ent($data_stunting_anak->stunting_anak_dlh_anggaran); ?></span>
											</td>
											<td><span
													class="list_group-stunting_anak_akses_pangan"><?= _ent($data_stunting_anak->stunting_anak_akses_pangan); ?></span>
											</td>
											<td><span
													class="list_group-stunting_anak_akses_pangan_anggaran"><?= _ent($data_stunting_anak->stunting_anak_akses_pangan_anggaran); ?></span>
											</td>
											<td><span
													class="list_group-stunting_anak_mitra_lain"><?= _ent($data_stunting_anak->stunting_anak_mitra_lain); ?></span>
											</td>
											<td width="200">
												<?php is_allowed('data_stunting_anak_view', function() use ($data_stunting_anak){?>
												<a href="<?= site_url('administrator/data_stunting_anak/view/' . $data_stunting_anak->stunting_anak_id); ?>"
													class="label-default"><i class="fa fa-newspaper-o"></i>
													<?= cclang('view_button'); ?>
													<?php }) ?>
													<?php is_allowed('data_stunting_anak_update', function() use ($data_stunting_anak){?>
													<a href="<?= site_url('administrator/data_stunting_anak/edit/' . $data_stunting_anak->stunting_anak_id); ?>"
														class="label-default"><i class="fa fa-edit"></i>
														<?= cclang('update_button'); ?></a>
													<?php }) ?>
													<?php is_allowed('data_stunting_anak_delete', function() use ($data_stunting_anak){?>
													<a href="javascript:void(0);"
														data-href="<?= site_url('administrator/data_stunting_anak/delete/' . $data_stunting_anak->stunting_anak_id); ?>"
														class="label-default remove-data"><i class="fa fa-close"></i>
														<?= cclang('remove_button'); ?></a>
													<?php }) ?>

											</td>
										</tr>
										<?php endforeach; ?>
										<?php if ($data_stunting_anak_counts == 0) :?>
										<tr>
											<td colspan="100">
												Data Stunting Anak data is not available
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
			var serialize_bulk = $('#form_data_stunting_anak').serialize();

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
								'/administrator/data_stunting_anak/delete?' + serialize_bulk;
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
		initSortable('data_stunting_anak', $('table.dataTable'));
	}); /*end doc ready*/
</script>