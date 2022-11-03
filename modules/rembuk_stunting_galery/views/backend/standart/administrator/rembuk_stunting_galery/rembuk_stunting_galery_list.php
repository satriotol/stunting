
<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>

<script type="text/javascript">
//This page is a result of an autogenerated content made by running test.html with firefox.
function domo(){
 
   // Binding keys
   $('*').bind('keydown', 'Ctrl+a', function assets() {
       window.location.href = BASE_URL + '/administrator/Rembuk_stunting_galery/add';
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
      <?= cclang('rembuk_stunting_galery') ?><small><?= cclang('list_all'); ?></small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><?= cclang('rembuk_stunting_galery') ?></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row" >
      
      <div class="col-md-12">
         <div class="box box-warning">
            <div class="box-body ">
               <!-- Widget: user widget style 1 -->
               <div class="box box-widget widget-user-2">
                  <!-- Add the bg color to the header using any of the bg-* classes -->
                  <div class="widget-user-header ">
                     <div class="row pull-right">
                        <?php is_allowed('rembuk_stunting_galery_add', function(){?>
                        <a class="btn btn-flat btn-success btn_add_new" id="btn_add_new" title="<?= cclang('add_new_button', [cclang('rembuk_stunting_galery')]); ?>  (Ctrl+a)" href="<?=  site_url('administrator/rembuk_stunting_galery/add'); ?>"><i class="fa fa-plus-square-o" ></i> <?= cclang('add_new_button', [cclang('rembuk_stunting_galery')]); ?></a>
                        <?php }) ?>
                        <?php is_allowed('rembuk_stunting_galery_export', function(){?>
                        <a class="btn btn-flat btn-success" title="<?= cclang('export'); ?> <?= cclang('rembuk_stunting_galery') ?> " href="<?= site_url('administrator/rembuk_stunting_galery/export?q='.$this->input->get('q').'&f='.$this->input->get('f')); ?>"><i class="fa fa-file-excel-o" ></i> <?= cclang('export'); ?> XLS</a>
                        <?php }) ?>
                                             </div>
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/list.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username"><?= cclang('rembuk_stunting_galery') ?></h3>
                     <h5 class="widget-user-desc"><?= cclang('list_all', [cclang('rembuk_stunting_galery')]); ?>  <i class="label bg-yellow"><?= $rembuk_stunting_galery_counts; ?>  <?= cclang('items'); ?></i></h5>
                  </div>

                  <form name="form_rembuk_stunting_galery" id="form_rembuk_stunting_galery" action="<?= base_url('administrator/rembuk_stunting_galery/index'); ?>">
                  


                     <!-- /.widget-user -->
                  <div class="row">
                     <div class="col-md-8">
                                                <div class="col-sm-2 padd-left-0 " >
                           <select type="text" class="form-control chosen chosen-select" name="bulk" id="bulk" placeholder="Site Email" >
                                                         <option value="delete">Delete</option>
                                                      </select>
                        </div>
                        <div class="col-sm-2 padd-left-0 ">
                           <button type="button" class="btn btn-flat" name="apply" id="apply" title="<?= cclang('apply_bulk_action'); ?>"><?= cclang('apply_button'); ?></button>
                        </div>
                                                <div class="col-sm-3 padd-left-0  " >
                           <input type="text" class="form-control" name="q" id="filter" placeholder="<?= cclang('filter'); ?>" value="<?= $this->input->get('q'); ?>">
                        </div>
                        <div class="col-sm-3 padd-left-0 " >
                           <select type="text" class="form-control chosen chosen-select" name="f" id="field" >
                              <option value=""><?= cclang('all'); ?></option>
                               <option <?= $this->input->get('f') == 'rembuk_stunting_id' ? 'selected' :''; ?> value="rembuk_stunting_id">Reff Rembuk Stunting</option>
                            <option <?= $this->input->get('f') == 'rembuk_stunting_galery_image' ? 'selected' :''; ?> value="rembuk_stunting_galery_image">Gambar</option>
                           </select>
                        </div>
                        <div class="col-sm-1 padd-left-0 ">
                           <button type="submit" class="btn btn-flat" name="sbtn" id="sbtn" value="Apply" title="<?= cclang('filter_search'); ?>">
                           Filter
                           </button>
                        </div>
                        <div class="col-sm-1 padd-left-0 ">
                           <a class="btn btn-default btn-flat" name="reset" id="reset" value="Apply" href="<?= base_url('administrator/rembuk_stunting_galery');?>" title="<?= cclang('reset_filter'); ?>">
                           <i class="fa fa-undo"></i>
                           </a>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="dataTables_paginate paging_simple_numbers pull-right" id="example2_paginate" >
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
                                                    <th data-field="rembuk_stunting_id"data-sort="1" data-primary-key="0"> <?= cclang('rembuk_stunting_id') ?></th>
                           <th data-field="rembuk_stunting_galery_image"data-sort="0" data-primary-key="0"> <?= cclang('rembuk_stunting_galery_image') ?></th>
                           <th>Action</th>                        </tr>
                     </thead>
                     <tbody id="tbody_rembuk_stunting_galery">
                     <?php foreach($rembuk_stunting_galerys as $rembuk_stunting_galery): ?>
                        <tr>
                                                       <td width="5">
                              <input type="checkbox" class="flat-red check" name="id[]" value="<?= $rembuk_stunting_galery->rembuk_stunting_galery_id; ?>">
                           </td>
                                                       
                           <td><?php if  ($rembuk_stunting_galery->rembuk_stunting_id) {

                              echo anchor('administrator/rembuk_stuntings/view/'.$rembuk_stunting_galery->rembuk_stunting_id.'?popup=show', $rembuk_stunting_galery->rembuk_stuntings_rembuk_stunting_year, ['class' => 'popup-view']); }?> </td>
                             
                           <td>
                              <?php if (!empty($rembuk_stunting_galery->rembuk_stunting_galery_image)): ?>
                                <?php if (is_image($rembuk_stunting_galery->rembuk_stunting_galery_image)): ?>
                                <a class="fancybox" rel="group" href="<?= BASE_URL . 'uploads/rembuk_stunting_galery/' . $rembuk_stunting_galery->rembuk_stunting_galery_image; ?>">
                                  <img src="<?= BASE_URL . 'uploads/rembuk_stunting_galery/' . $rembuk_stunting_galery->rembuk_stunting_galery_image; ?>" class="image-responsive" alt="image rembuk_stunting_galery" title="rembuk_stunting_galery_image rembuk_stunting_galery" width="40px">
                                </a>
                                <?php else: ?>
                                  <a href="<?= BASE_URL . 'uploads/rembuk_stunting_galery/' . $rembuk_stunting_galery->rembuk_stunting_galery_image; ?>" target="blank">
                                   <img src="<?= get_icon_file($rembuk_stunting_galery->rembuk_stunting_galery_image); ?>" class="image-responsive image-icon" alt="image rembuk_stunting_galery" title="rembuk_stunting_galery_image <?= $rembuk_stunting_galery->rembuk_stunting_galery_image; ?>" width="40px"> 
                                 </a>
                                <?php endif; ?>
                              <?php endif; ?>
                           </td>
                            
                           <td width="200">
                            
                                                              <?php is_allowed('rembuk_stunting_galery_view', function() use ($rembuk_stunting_galery){?>
                                                              <a href="<?= site_url('administrator/rembuk_stunting_galery/view/' . $rembuk_stunting_galery->rembuk_stunting_galery_id); ?>" class="label-default"><i class="fa fa-newspaper-o"></i> <?= cclang('view_button'); ?>
                              <?php }) ?>
                              <?php is_allowed('rembuk_stunting_galery_update', function() use ($rembuk_stunting_galery){?>
                              <a href="<?= site_url('administrator/rembuk_stunting_galery/edit/' . $rembuk_stunting_galery->rembuk_stunting_galery_id); ?>" class="label-default"><i class="fa fa-edit "></i> <?= cclang('update_button'); ?></a>
                              <?php }) ?>
                              <?php is_allowed('rembuk_stunting_galery_delete', function() use ($rembuk_stunting_galery){?>
                              <a href="javascript:void(0);" data-href="<?= site_url('administrator/rembuk_stunting_galery/delete/' . $rembuk_stunting_galery->rembuk_stunting_galery_id); ?>" class="label-default remove-data"><i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a>
                               <?php }) ?>

                           </td>                        </tr>
                      <?php endforeach; ?>
                      <?php if ($rembuk_stunting_galery_counts == 0) :?>
                         <tr>
                           <td colspan="100">
                           Rembuk Stunting Galery data is not available
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
  $(document).ready(function(){
   
    
      
    $('.remove-data').click(function(){

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
        function(isConfirm){
          if (isConfirm) {
            document.location.href = url;            
          }
        });

      return false;
    });


    $('#apply').click(function(){

      var bulk = $('#bulk');
      var serialize_bulk = $('#form_rembuk_stunting_galery').serialize();

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
          function(isConfirm){
            if (isConfirm) {
               document.location.href = BASE_URL + '/administrator/rembuk_stunting_galery/delete?' + serialize_bulk;      
            }
          });

        return false;

      } else if(bulk.val() == '')  {
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

    checkAll.on('ifChecked ifUnchecked', function(event) {   
        if (event.type == 'ifChecked') {
            checkboxes.iCheck('check');
        } else {
            checkboxes.iCheck('uncheck');
        }
    });

    checkboxes.on('ifChanged', function(event){
        if(checkboxes.filter(':checked').length == checkboxes.length) {
            checkAll.prop('checked', 'checked');
        } else {
            checkAll.removeProp('checked');
        }
        checkAll.iCheck('update');
    });
    initSortable('rembuk_stunting_galery', $('table.dataTable'));
  }); /*end doc ready*/
</script>