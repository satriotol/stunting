<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>

<script type="text/javascript">
	//This page is a result of an autogenerated content made by running test.html with firefox.
	function domo() {

		// Binding keys
		$('*').bind('keydown', 'Ctrl+a', function assets() {
			window.location.href = BASE_URL + '/administrator/Blog/add';
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
		Berita<small>
			<?= cclang('list_all'); ?>
		</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Berita</li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-warning">
				<div class="box-body ">
					<!-- Widget: user widget style 1 -->
					<div class="box box-widget widget-user-2">
						<!-- Add the bg color to the header using any of the bg-* classes -->
						<div class="widget-user-header ">
							<div class="row pull-right">
								<?php is_allowed('blog_add', function(){?>
								<a class="btn btn-flat btn-success btn_add_new" id="btn_add_new"
									title="<?= cclang('add_new_button', ['Berita']); ?>  (Ctrl+a)"
									href="<?=  site_url('administrator/blog/add'); ?>"><i
										class="fa fa-plus-square-o"></i>
									<?= cclang('add_new_button', ['Berita']); ?>
								</a>
								<?php }) ?>
							</div>
							<div class="widget-user-image">
								<img class="img-circle" src="<?= BASE_ASSET; ?>/img/list.png" alt="User Avatar">
							</div>
							<!-- /.widget-user-image -->
							<h3 class="widget-user-username">Berita</h3>
							<h5 class="widget-user-desc">
								<?= cclang('list_all', ['Berita']); ?> <i class="label bg-yellow">
									<?= $blog_counts; ?>
									<?= cclang('items'); ?>
								</i>
							</h5>
						</div>

						<form name="form_blog" id="form_blog" action="<?= base_url('administrator/blog/index'); ?>">
							<div class="table-responsive">
								<table class="table table-bordered table-striped dataTable">
									<thead>
										<tr class="">
											<th>
												<input type="checkbox" class="flat-red toltip" id="check_all" name="check_all" title="check all">
											</th>
											<th data-field="title" data-sort="1">Judul</th>
											<th data-field="slug" data-sort="1">Slug</th>
											<th data-field="image" data-sort="1">Image</th>
											<th data-field="category" data-sort="1">Kategori</th>
											<th data-field="status" data-sort="1">Status</th>
											<th data-field="created_at" data-sort="1">Tanggal dibuat</th>
											<th data-field="created_at" data-sort="1">Update terakhir</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody id="tbody_blog">
									<?php
										foreach($blogs as $blog) {
											if ($blog->status == 'publish') {
												$status = '<label class="label label-success">Publish</label>';
											}elseif($blog->status == 'draft') {
												$status = '<label class="label label-danger">Draft</label>';
											}elseif($blog->status == 'archive') {
												$status = '<label class="label label-primary">Archive</label>';
											}

											if ($blog->verified_status == '0') {
												$verified = '<label class="label label-danger">Belum diverifikasi</label>&nbsp;<i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Harap konfimasi dengan Administrator"></i>';

												// is_allowed('blog_verified', function() use ($blog) {
												// 	$btn_verif = '<a href="javascript:void(0);" data-href="'.site_url('administrator/blog/verified/'.$blog->id).'" class="btn btn-primary verif-data" data-toggle="tooltip" data-placement="top" title="Verifikasi"><i class="fa fa-check-square-o"></i></a>';
												// });
											}else{
												$verified = '<label class="label label-success">Diverifikasi</label>';
											}
									?>
										<tr>
											<td width="5">
												<input type="checkbox" class="flat-red check" name="id[]" value="<?= $blog->id; ?>">
											</td>
											<td>
												<?= _ent($blog->title).'<br/><small><i>dibuat oleh : '._ent($blog->user_username).'</i></small>'; ?>
											</td>
											<td>
												<?= (anchor('blog/'.$blog->slug, $blog->slug, ['target' => 'blank'])); ?>
												<i class="fa fa-link"></i>
											</td>
											<td>
											<?php
												foreach (explode(',', $blog->image) as $file) {
													if (!empty($file)) {
														if (is_image($file)) {
											?>
												<a class="fancybox" rel="group" href="<?= BASE_URL . 'uploads/blog/' . $file; ?>">
													<img src="<?= BASE_URL . 'uploads/blog/' . $file; ?>" class="image-responsive" alt="image blog" title="image blog" width="40px">
												</a>
											<?php
														}else{
											?>
												<a href="<?= BASE_URL . 'administrator/file/download/blog/' . $file; ?>">
													<img src="<?= get_icon_file($file); ?>" class="image-responsive image-icon" alt="image blog" title="image <?= $file; ?>" width="40px">
												</a>
											<?php
														}
													}
												}
											?>
											</td>

											<td>
												<?= _ent($blog->category_name); ?>
											</td>

											<td>
											<?php
												$group_allowed 	= [1, 5];
												$group_id 		= $this->session->userdata('group_id');

												
												echo $status.'<br/>'.$verified;
												if (in_array($group_id, $group_allowed)) {
													if ($blog->verified_status == '0') {
														is_allowed('blog_verified', function() use ($blog) {
															echo '<br/><a href="javascript:void(0);" data-href="'.site_url('administrator/blog/verified/'.$blog->id).'" class="btn btn-sm btn-success verif-data">Verifikasi</a>';
														});
													}
												}
											?>
											</td>
											<td>
												<?= _ent($blog->created_at); ?>
											</td>
											<td>
											<?php 
												if ($blog->updated_at == NULL || $blog->updated_at == '0000-00-00 00:00:00') {
													echo '-';
												}else{
													echo _ent($blog->updated_at);
												}
											?>
											</td>

											<td width="200" align="center">
											<?php
												is_allowed('blog_view', function() use ($blog) {
											?>
												<a href="<?= site_url('administrator/blog/view/' . $blog->id); ?>" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Lihat berita"><i class="fa fa-newspaper-o"></i></a>
												&nbsp;
											<?php
												});

												is_allowed('blog_update', function() use ($blog) {
											?>
												<a href="<?= site_url('administrator/blog/edit/' . $blog->id); ?>" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Update berita"><i class="fa fa-edit"></i></a>
												&nbsp;
											<?php 
												});

												is_allowed('blog_delete', function() use ($blog) {
											?>
												<a href="javascript:void(0);" data-href="<?= site_url('administrator/blog/delete/' . $blog->id); ?>" class="btn btn-danger remove-data"  data-toggle="tooltip" data-placement="top" title="Hapus berita"><i class="fa fa-close"></i></a>
												&nbsp;
											<?php
												});
											?>
											</td>
										</tr>
										<?php
											}

											if ($blog_counts == 0) :?>
										<tr>
											<td colspan="100">
												Blog data is not available
											</td>
										</tr>
										<?php endif; ?>
									</tbody>
								</table>
							</div>
					</div>
					<hr>
					<!-- /.widget-user -->
					<div class="row">
						<div class="col-md-8">
							<div class="col-sm-2 padd-left-0 ">
								<select type="text" class="form-control chosen chosen-select" name="bulk" id="bulk"
									placeholder="Site Email">
									<option value="">Bulk</option>
									<option value="delete">Delete</option>
								</select>
							</div>
							<div class="col-sm-2 padd-left-0 ">
								<button type="button" class="btn btn-flat" name="apply" id="apply"
									title="<?= cclang('apply_bulk_action'); ?>">
									<?= cclang('apply_button'); ?>
								</button>
							</div>
							<div class="col-sm-3 padd-left-0  ">
								<input type="text" class="form-control" name="q" id="filter"
									placeholder="<?= cclang('filter'); ?>" value="<?= $this->input->get('q'); ?>">
							</div>
							<div class="col-sm-3 padd-left-0 ">
								<select type="text" class="form-control chosen chosen-select" name="f" id="field">
									<option value="">
										<?= cclang('all'); ?>
									</option>
									<option <?=$this->input->get('f') == 'title' ? 'selected' :''; ?>
										value="title">Title</option>
									<option <?=$this->input->get('f') == 'slug' ? 'selected' :''; ?> value="slug">Slug
									</option>
									<option <?=$this->input->get('f') == 'image' ? 'selected' :''; ?>
										value="image">Image</option>
									<option <?=$this->input->get('f') == 'category' ? 'selected' :''; ?>
										value="category">Category</option>
									<option <?=$this->input->get('f') == 'status' ? 'selected' :''; ?>
										value="status">Status</option>
									<option <?=$this->input->get('f') == 'author' ? 'selected' :''; ?>
										value="author">Author</option>
									<option <?=$this->input->get('f') == 'created_at' ? 'selected' :''; ?>
										value="created_at">Created At</option>
								</select>
							</div>
							<div class="col-sm-1 padd-left-0 ">
								<button type="submit" class="btn btn-flat" name="sbtn" id="sbtn" value="Apply"
									title="<?= cclang('filter_search'); ?>">
									Filter
								</button>
							</div>
							<div class="col-sm-1 padd-left-0 ">
								<a class="btn btn-default btn-flat" name="reset" id="reset" value="Apply"
									href="<?= base_url('administrator/blog');?>" title="<?= cclang('reset_filter'); ?>">
									<i class="fa fa-undo"></i>
								</a>
							</div>
						</div>
						</form>
						<div class="col-md-4">
							<div class="dataTables_paginate paging_simple_numbers pull-right" id="example2_paginate">
								<?= $pagination; ?>
							</div>
						</div>
					</div>
				</div>
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
		$('[data-toggle="tooltip"]').tooltip();

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

		$('.verif-data').click(function () {
			var url = $(this).attr('data-href');
			swal({
				title: "<?= cclang('are_you_sure_verification_data'); ?>?",
				text: "<?= cclang('data_to_be_verified_can_not_be_restored'); ?>",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#00A65A",
				confirmButtonText: "<?= cclang('yes_verify_it'); ?>",
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
			var serialize_bulk = $('#form_blog').serialize();

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
							document.location.href = BASE_URL + '/administrator/blog/delete?' + serialize_bulk;
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

		});/*end appliy click*/


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
		initSortable('blog', $('table.dataTable'));

	}); /*end doc ready*/
</script>