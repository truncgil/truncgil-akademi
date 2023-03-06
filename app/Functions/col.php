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

                        <button type="button" class="btn-block-option" onclick="ExportToExcel('xlsx')"><i class="fa fa-file-excel-o"></i></button>
                        
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