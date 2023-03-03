<?php 
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
        $naksCertificates = NaksCertificate::paginate(10);
        $naksCenters = NaksCenter::all();


       
        
         ?>   
        </div>
        {{col("col-md-9","Certificates",0)}} 
            <div class="table-responsive">
                <table class="table table-sm table-bordered table-striped table-hover">
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
         {{col("col-md-3","Naks Center")}} 
        
            <table class="table table-bordered table-sm">
                <tr>
                    <th>{{e2("Center No")}}</th>
                    <th>{{e2("Center Name")}}</th>
                    <th>{{e2("Opt")}}</th>
                </tr>
                <form action="?add-center" method="post">
                    @csrf
                <tr>
                    <td><input type="text" name="center_no" id="" class="form-control"></td>
                    <td><input type="text" name="center_name" id="" class="form-control"></td>
                    <td><button class="btn btn-default btn-sm"><i class="fa fa-plus"></i></button></td>
                </tr>
                </form>
            </table>
         {{_col()}}
        
    </div>
</div>