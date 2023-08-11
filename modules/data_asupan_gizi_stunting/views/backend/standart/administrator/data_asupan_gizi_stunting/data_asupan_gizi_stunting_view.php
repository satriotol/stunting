
<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>
<script type="text/javascript">
//This page is a result of an autogenerated content made by running test.html with firefox.
function domo(){
 
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
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Data Asupan Gizi Stunting OPD      <small><?= cclang('detail', ['Data Asupan Gizi Stunting OPD']); ?> </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= site_url('administrator/data_asupan_gizi_stunting'); ?>">Data Asupan Gizi Stunting OPD</a></li>
      <li class="active"><?= cclang('detail'); ?></li>
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
                    
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/view.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username">Data Asupan Gizi Stunting OPD</h3>
                     <h5 class="widget-user-desc">Detail Data Asupan Gizi Stunting OPD</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal form-step" name="form_data_asupan_gizi_stunting" id="form_data_asupan_gizi_stunting" >
                  
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">ID </label>

                        <div class="col-sm-8">
                        <span class="detail_group-asupan_gizi_id"><?= _ent($data_asupan_gizi_stunting->asupan_gizi_id); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Nama Anak </label>

                        <div class="col-sm-8">
                           <?= _ent($data_asupan_gizi_stunting->data_anak_anak_nama); ?>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Dinas / Instansi </label>

                        <div class="col-sm-8">
                           <?= _ent($data_asupan_gizi_stunting->opd_opd_nama); ?>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Asupan Gizi Instansi (PMT) </label>

                        <div class="col-sm-8">
                        <span class="detail_group-asupan_gizi_opd"><?= _ent($data_asupan_gizi_stunting->asupan_gizi_opd); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Anggaran Asupan Gizi Instansi (PMT) </label>

                        <div class="col-sm-8">
                        <span class="detail_group-asupan_gizi_opd_anggaran"><?= _ent($data_asupan_gizi_stunting->asupan_gizi_opd_anggaran); ?></span>
                        </div>
                    </div>
                                        
                    <br>
                    <br>


                     
                         
                    <div class="view-nav">
                        <?php is_allowed('data_asupan_gizi_stunting_update', function() use ($data_asupan_gizi_stunting){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit data_asupan_gizi_stunting (Ctrl+e)" href="<?= site_url('administrator/data_asupan_gizi_stunting/edit/'.$data_asupan_gizi_stunting->asupan_gizi_id); ?>"><i class="fa fa-edit" ></i> <?= cclang('update', ['Data Asupan Gizi Stunting']); ?> </a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= site_url('administrator/data_asupan_gizi_stunting/'); ?>"><i class="fa fa-undo" ></i> <?= cclang('go_list_button', ['Data Asupan Gizi Stunting']); ?></a>
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

<script>
$(document).ready(function(){
   
   });
</script>