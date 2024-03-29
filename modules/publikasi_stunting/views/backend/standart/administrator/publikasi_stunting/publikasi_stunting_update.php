<!-- Fine Uploader Gallery CSS file
	====================================================================== -->
<link href="<?= BASE_ASSET; ?>/fine-upload/fine-uploader-gallery.min.css" rel="stylesheet">
<!-- Fine Uploader jQuery JS file
	====================================================================== -->
<script src="<?= BASE_ASSET; ?>/fine-upload/jquery.fine-uploader.js"></script>
<?php $this->load->view('core_template/fine_upload'); ?>
<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>
<script type="text/javascript">
	function domo() {
		// Binding keys
		$('*').bind('keydown', 'Ctrl+s', function assets() {
			$('#btn_save').trigger('click');
			return false;
		});

		$('*').bind('keydown', 'Ctrl+x', function assets() {
			$('#btn_cancel').trigger('click');
			return false;
		});

		$('*').bind('keydown', 'Ctrl+d', function assets() {
			$('.btn_save_back').trigger('click');
			return false;
		});
	}

	jQuery(document).ready(domo);
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Publikasi Dan Pengukuran Stunting <small>Edit Publikasi Dan Pengukuran Stunting</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class=""><a href="<?= site_url('administrator/publikasi_stunting'); ?>">Publikasi Dan Pengukuran Stunting</a></li>
		<li class="active">Edit</li>
	</ol>
</section>

<style>

</style>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-danger">
				<div class="box-body ">
					<!-- Widget: user widget style 1 -->
					<div class="box box-widget widget-user-2">
						<!-- Add the bg color to the header using any of the bg-* classes -->
						<div class="widget-user-header ">
							<div class="widget-user-image">
								<img class="img-circle" src="<?= BASE_ASSET; ?>/img/add2.png" alt="User Avatar">
							</div>
							<!-- /.widget-user-image -->
							<h3 class="widget-user-username">Publikasi Dan Pengukuran Stunting</h3>
							<h5 class="widget-user-desc">Edit Publikasi Dan Pengukuran Stunting</h5>
							<hr>
						</div>
						<?= form_open(base_url('administrator/publikasi_stunting/edit_save/'.$this->uri->segment(4)), [
							'name' => 'form_publikasi_stunting',
							'class' => 'form-horizontal form-step',
							'id' => 'form_publikasi_stunting',
							'method' => 'POST'
						]); ?>

						<?php
						$user_groups = $this->model_group->get_user_group_ids();
						?>



						<div class="form-group group-pustun_judul  ">
							<label for="pustun_judul" class="col-sm-2 control-label">Judul <i class="required">*</i>
							</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="pustun_judul" id="pustun_judul"
									placeholder=""
									value="<?= set_value('pustun_judul', $publikasi_stunting->pustun_judul); ?>">
								<small class="info help-block">
									<b>Input Pustun Judul</b> Max Length : 255.</small>
							</div>
						</div>




						<div class="form-group group-pustun_isi  ">
							<label for="pustun_isi" class="col-sm-2 control-label">Isi Berita <i class="required">*</i>
							</label>
							<div class="col-sm-8">
								<textarea id="pustun_isi" name="pustun_isi" rows="10"
									cols="80"> <?= set_value('pustun_isi', $publikasi_stunting->pustun_isi); ?></textarea>
								<small class="info help-block">
								</small>
							</div>
						</div>




						<div class="form-group group-pustun_media  ">
							<label for="pustun_media" class="col-sm-2 control-label">Upload Foto/Media </label>
							<div class="col-sm-8">
								<div id="publikasi_stunting_pustun_media_galery"></div>
								<div id="publikasi_stunting_pustun_media_galery_listed">
									<?php foreach ((array) explode(',', $publikasi_stunting->pustun_media) as $idx => $filename): ?>
									<input type="hidden" class="listed_file_uuid"
										name="publikasi_stunting_pustun_media_uuid[<?= $idx ?>]" value="" /><input
										type="hidden" class="listed_file_name"
										name="publikasi_stunting_pustun_media_name[<?= $idx ?>]"
										value="<?= $filename; ?>" />
									<?php endforeach; ?>
								</div>
								<small class="info help-block">
									<b>Extension file must</b> JPG,PNG,JPEG.</small>
							</div>
						</div>


						<div class="message"></div>
						<div class="row-fluid col-md-7 container-button-bottom">
							<button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay'
								title="<?= cclang('save_button'); ?> (Ctrl+s)">
								<i class="fa fa-save"></i> <?= cclang('save_button'); ?>
							</button>
							<a class="btn btn-flat btn-info btn_save btn_action btn_save_back" id="btn_save"
								data-stype='back' title="<?= cclang('save_and_go_the_list_button'); ?> (Ctrl+d)">
								<i class="ion ion-ios-list-outline"></i> <?= cclang('save_and_go_the_list_button'); ?>
							</a>

							<div class="custom-button-wrapper">

							</div>
							<a class="btn btn-flat btn-default btn_action" id="btn_cancel"
								title="<?= cclang('cancel_button'); ?> (Ctrl+x)">
								<i class="fa fa-undo"></i> <?= cclang('cancel_button'); ?>
							</a>
							<span class="loading loading-hide">
								<img src="<?= BASE_ASSET; ?>/img/loading-spin-primary.svg">
								<i><?= cclang('loading_saving_data'); ?></i>
							</span>
						</div>
						<?= form_close(); ?>
					</div>
				</div>
				<!--/box body -->
			</div>
			<!--/box -->
		</div>
	</div>
</section>
<!-- /.content -->
<script src="<?= BASE_ASSET; ?>ckeditor/ckeditor.js"></script>
<!-- Page script -->
<script>
	$(document).ready(function () {
		window.event_submit_and_action = '';







		CKEDITOR.replace('pustun_isi');
		var pustun_isi = CKEDITOR.instances.pustun_isi;

		$('#btn_cancel').click(function () {
			swal({
					title: "Are you sure?",
					text: "the data that you have created will be in the exhaust!",
					type: "warning",
					showCancelButton: true,
					confirmButtonColor: "#DD6B55",
					confirmButtonText: "Yes!",
					cancelButtonText: "No!",
					closeOnConfirm: true,
					closeOnCancel: true
				},
				function (isConfirm) {
					if (isConfirm) {
						window.location.href = BASE_URL + 'administrator/publikasi_stunting';
					}
				});

			return false;
		}); /*end btn cancel*/

		$('.btn_save').click(function () {
			$('.message').fadeOut();
			$('#pustun_isi').val(pustun_isi.getData());

			var form_publikasi_stunting = $('#form_publikasi_stunting');
			var data_post = form_publikasi_stunting.serializeArray();
			var save_type = $(this).attr('data-stype');
			data_post.push({
				name: 'save_type',
				value: save_type
			});



			data_post.push({
				name: 'event_submit_and_action',
				value: window.event_submit_and_action
			});

			$('.loading').show();

			$.ajax({
					url: form_publikasi_stunting.attr('action'),
					type: 'POST',
					dataType: 'json',
					data: data_post,
				})
				.done(function (res) {
					$('form').find('.form-group').removeClass('has-error');
					$('form').find('.error-input').remove();
					$('.steps li').removeClass('error');
					if (res.success) {
						var id = $('#publikasi_stunting_image_galery').find('li').attr('qq-file-id');
						if (save_type == 'back') {
							window.location.href = res.redirect;
							return;
						}

						$('.message').printMessage({
							message: res.message
						});
						$('.message').fadeIn();
						$('.data_file_uuid').val('');

					} else {
						if (res.errors) {
							parseErrorField(res.errors);
						}
						$('.message').printMessage({
							message: res.message,
							type: 'warning'
						});
					}

				})
				.fail(function () {
					$('.message').printMessage({
						message: 'Error save data',
						type: 'warning'
					});
				})
				.always(function () {
					$('.loading').hide();
					$('html, body').animate({
						scrollTop: $(document).height()
					}, 2000);
				});

			return false;
		}); /*end btn save*/



		var params = {};
		params[csrf] = token;

		$('#publikasi_stunting_pustun_media_galery').fineUploader({
			template: 'qq-template-gallery',
			request: {
				endpoint: BASE_URL + '/administrator/publikasi_stunting/upload_pustun_media_file',
				params: params
			},
			deleteFile: {
				enabled: true,
				endpoint: BASE_URL + '/administrator/publikasi_stunting/delete_pustun_media_file',
			},
			thumbnails: {
				placeholders: {
					waitingPath: BASE_URL + '/asset/fine-upload/placeholders/waiting-generic.png',
					notAvailablePath: BASE_URL +
						'/asset/fine-upload/placeholders/not_available-generic.png'
				}
			},
			session: {
				endpoint: BASE_URL +
					'administrator/publikasi_stunting/get_pustun_media_file/<?= $publikasi_stunting->pustun_id; ?>',
				refreshOnRequest: true
			},
			validation: {
				allowedExtensions: ["jpg", "png", "jpeg"],
				sizeLimit: 0,
			},
			showMessage: function (msg) {
				toastr['error'](msg);
			},
			callbacks: {
				onComplete: function (id, name, xhr) {
					if (xhr.success) {
						var uuid = $('#publikasi_stunting_pustun_media_galery').fineUploader('getUuid',
							id);
						$('#publikasi_stunting_pustun_media_galery_listed').append(
							'<input type="hidden" class="listed_file_uuid" name="publikasi_stunting_pustun_media_uuid[' +
							id + ']" value="' + uuid +
							'" /><input type="hidden" class="listed_file_name" name="publikasi_stunting_pustun_media_name[' +
							id + ']" value="' + xhr.uploadName + '" />');
					} else {
						toastr['error'](xhr.error);
					}
				},
				onDeleteComplete: function (id, xhr, isError) {
					if (isError == false) {
						$('#publikasi_stunting_pustun_media_galery_listed').find(
							'.listed_file_uuid[name="publikasi_stunting_pustun_media_uuid[' + id +
							']"]').remove();
						$('#publikasi_stunting_pustun_media_galery_listed').find(
							'.listed_file_name[name="publikasi_stunting_pustun_media_name[' + id +
							']"]').remove();
					}
				}
			}
		}); /*end pustun_media galery*/


		async function chain() {}

		chain();




	}); /*end doc ready*/
</script>