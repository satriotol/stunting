
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
      Kelurahan      <small><?= cclang('detail', ['Kelurahan']); ?> </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= site_url('administrator/kelurahans'); ?>">Kelurahan</a></li>
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
                     <h3 class="widget-user-username">Kelurahan</h3>
                     <h5 class="widget-user-desc">Detail Kelurahan</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal form-step" name="form_kelurahans" id="form_kelurahans" >
                  
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">ID </label>

                        <div class="col-sm-8">
                        <span class="detail_group-kelurahan_id"><?= _ent($kelurahans->kelurahan_id); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Nama Kecamatan </label>

                        <div class="col-sm-8">
                           <?= _ent($kelurahans->kecamatans_kecamatan_nama); ?>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Nama Kelurahan </label>

                        <div class="col-sm-8">
                        <span class="detail_group-kelurahan-nama"><?= _ent($kelurahans->kelurahan_nama); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Tanggal Pembuatan </label>

                        <div class="col-sm-8">
                        <span class="detail_group-kelurahan-create-at"><?= _ent($kelurahans->kelurahan_create_at); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Pembuatan </label>

                        <div class="col-sm-8">
                        <span class="detail_group-kelurahan-create-user"><?= _ent($kelurahans->kelurahan_create_user); ?></span>
                        </div>
                    </div>
                                        
                    <br>
                    <br>


                     
                         
                    <div class="view-nav">
                        <?php is_allowed('kelurahans_update', function() use ($kelurahans){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit kelurahans (Ctrl+e)" href="<?= site_url('administrator/kelurahans/edit/'.$kelurahans->kelurahan_id); ?>"><i class="fa fa-edit" ></i> <?= cclang('update', ['Kelurahans']); ?> </a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= site_url('administrator/kelurahans/'); ?>"><i class="fa fa-undo" ></i> <?= cclang('go_list_button', ['Kelurahans']); ?></a>
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
   (function(){
        var kecamatan_id = $('.detail_group-kecamatan-id');
        var kelurahan_nama = $('.detail_group-kelurahan-nama');
        var kelurahan_create_at = $('.detail_group-kelurahan-create-at');
        var kelurahan_create_user = $('.detail_group-kelurahan-create-user');
    })()
      
   });
</script>