<?php 
$tabs = [
    'Naks Center',
];
?>

<div class="content">
    <div class="block">
        <ul class="nav nav-tabs nav-tabs-block js-tabs-enabled" data-toggle="tabs" role="tablist">
            <?php foreach($tabs AS $tab)  { 
                $id = str_slug($tab);
              ?>
             <li class="nav-item">
                 <a class="nav-link {{getesit("t",$id) ? "active show" : ""}}" href="?t={{$id}}">{{e2($tab)}}</a>
             </li> 
             <?php } ?>
            
        </ul>
        <div class="block-content tab-content">
            <div class="tab-pane active show" id="btabs-static-home" role="tabpanel">
                <?php if(getisset("t"))  {   ?>
                    @include("admin.type.settings." . get("t")) 
                 <?php } else {
                     ?>
                        <div class="hero-inner">
                            <div class="content content-full">
                                <div class="py-30 text-center">
                                    <i class="si si-settings text-primary display-3"></i>
                                    <h1 class="h2 font-w700 mt-30 mb-10">{{e2("Settings System")}}</h1>
                                    <h2 class="h3 font-w400 text-muted mb-50">{{e2("Please select a setting tab from the top tab and set it")}}</h2>
                                   
                                </div>
                            </div>
                        </div>
                     <?php 
                 } ?>
                
            </div>
            
        </div>
    </div>
</div>