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

        

        
        
        $naksCertificates = NaksCertificate::paginate(setting('row_count'));
        $naksCenters = NaksCenter::all();
        
        $tableName = "naks_certificates";

        $columns = table_columns($tableName);
        
         
        foreach($columns AS $column) {
           // dump(table_column_type($tableName, $column));
        }




       
        
         ?>   
        </div>
        {{col("col-md-12","Certificates",0,[
            'export' => $tableName
            ])}} 
            <?php  ; ?>
            @include("components.excel-file-input")
            <div class="table-responsive">
                <table id="excel" style="table-layout:fixed;width:300%" class="table table-sm table-bordered table-striped table-hover">
                        
                        
                        @include("$path.form")
                        
                        <?php foreach($naksCertificates AS $naksCertificate) {
                             ?>
                                @include("$path.edit-form")
                             <?php 
                        } ?>
                    
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