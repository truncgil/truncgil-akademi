<?php 
use App\Models\NaksCenter; 
use App\Models\NaksCertificate; 

$path = "admin.type.naks-technology";

?>
<div class="content">

    <div class="row">   
        <div class="col-12">
        <?php 
        
        if(getisset("add-certificate")) {
            $post = $_POST;
            unset($post['_token']);
            if($post['naks_center_id'] =='') $post['naks_center_id'] = null;
          //  dump($post);
            
            try {
                NaksCertificate::create($post);
                bilgi("Certificate has been created","success");
            } catch (\Throwable $th) {
                dump($th);
            }
            
        } 
        if(getisset("delete")) {
            NaksCertificate::where('id', get('delete'))->delete();
        }
        $naksCertificates = NaksCertificate::paginate(10);
        $naksCenters = NaksCenter::all();


       
        
         ?>   
        </div>
        {{col("col-md-12","Certificates",0)}} 
            <div class="table-responsive">
                <table id="excel" class="table table-sm table-bordered table-striped table-hover">
                    <thead>
                        @include("$path.header")
                        <form action="?add-certificate" method="post">
                            @csrf
                            @include("$path.form")
                        </form>
                    </thead>
                    <tbody>
                        <?php foreach($naksCertificates AS $naksCertificate) {
                             ?>
                                @include("$path.edit-form")
                             <?php 
                        } ?>
                    </tbody>
                    
                </table>
                
            </div>
            <div class="row">
                <div class="block-content block-content-full block-content-sm">
                    {{$naksCertificates->appends($_GET)->links()}}
                </div>
            </div>
            
        
        {{_col()}}
        
        
    </div>
</div>