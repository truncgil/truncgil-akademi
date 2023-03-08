<?php 
$tabs = [
    'Common Settings' => 'setting',
    'Naks Center' => '11.1 NAKS Technology',
    'Welding Methods' => '11 Welding',
    'Materials' => '11 Welding',
    'P-Numbers' => '11 Welding',
    'Welding Positions' => '11 Welding',
    'Hazard Classes' => '11 Welding',
    'Joint Type' => '11 Welding',
    'Joint View' => '11 Welding',
    'Electrode Coating' => '11 Welding',
    'Ru Welding Geometry ' => '11 Welding',
    'Current Types' => '11 Welding',
    'Welding Consumables' => '11 Welding',
    'Product Type' => '11 Welding',
    'Welding Machine Type' => '11 Welding',
];
?>

<div class="content">
    <div class="block">
        <ul class="nav nav-tabs nav-tabs-block js-tabs-enabled" data-toggle="tabs" role="tablist">
            <?php foreach($tabs AS $tab => $icon)  { 
                $id = str_slug($tab);
              ?>
             <li class="nav-item">
                 <a class="nav-link {{getesit("t",$id) ? "active show" : ""}}" href="?t={{$id}}">
                    <i class="float-left mr-1">
                        <img src="{{url("assets/icons/".$icon . '.png')}}" width="16" alt="">
                    </i>
                    {{e2($tab)}}</a>
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