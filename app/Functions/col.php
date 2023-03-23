<?php 
function col($size,$title="",$color="0",$options=[]) {
    $id = str_slug($title);
    $colors = colors();
   
     ?>
     <div class="<?php echo $size ?>">
        <div class="block block-themed" id="<?php echo $id; ?>">
            <?php if($title!="") {
                 ?>
                 <div class="block-header bg-<?php echo $colors[$color]; ?>">
                    <div class="block-title"><?php echo $title ?></div>
                    <div class="block-options">
                        <?php foreach($options AS $icon => $href) {
                             ?>
                             <a href="<?php echo $href ?>" class="btn-block-option"><i class="fa fa-<?php echo $icon ?>"></i></a>
                             <?php 
                        } ?>
                        <!-- To toggle fullscreen a block, just add the following properties to your button: data-toggle="block-option" data-action="fullscreen_toggle" -->
                        <button type="button" class="btn-block-option" data-toggle="block-option" 
                        <?php if(oturumesit("full-screen-block", $id)) {
                             ?>
                             onclick="$.get('?ajax=full-screen-block-remove')" 
                             <?php 
                        } else  { 
                          ?>
                         onclick="$.get('?ajax=full-screen-block&id=<?php echo($id) ?>')" 
                         <?php } ?> 
                        data-action="fullscreen_toggle"><i class="si si-size-fullscreen"></i></button>
                         <?php if(isset($options['export']))  {  ?>
                              <a href="<?php echo url("admin/truncate/". $options['export']) ?>" <?php echo delete_teyit() ?> class="btn-block-option " title="<?php e2("Delete All") ?>" ><i class="fa fa-trash"></i></a>
                              <a href="<?php echo url("admin/export/". $options['export']) ?>" class="btn-block-option" title="<?php e2("Export to Excel") ?>" ><i class="fa fa-download"></i></a>
                              <label
                                   for="excel-file"
                                   class="btn-block-option" title="<?php e2("Import to Excel") ?>" ><i class="fa fa-upload"></i></label>
                          <?php } ?>
                          
                        
                    </div>
                </div>
                 <?php 
            } ?>
            
            <div class="block-content">
               
           
     <?php 
}
function _col() {
     ?>
      </div>
        </div>
    </div>
     <?php 
}