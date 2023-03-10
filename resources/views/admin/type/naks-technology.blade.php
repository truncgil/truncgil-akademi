<?php 
use App\Models\NaksCenter; 
use App\Models\WeldingMethod; 
use App\Models\NaksCertificate; 

$title = "Certificates";
$tableWidth="300%";
$path = "admin.type.naks-technology";
$listDatas = NaksCertificate::paginate(setting('row_count'));
$tableName = "naks_certificates";
$columns = table_columns($tableName);       
$columnsList = [];

?>
<div class="content">

    <div class="row">   
        <div class="col-12">
        <?php 
        
        if(getisset("add")) {
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
        
        

        $datas = [
            'short_name' => [
                'data' => NaksCenter::all(),
                'value' => 'center_no',
                'html' => ['center_no', 'center_name'],
                'type' => 'select',
                'multiple' => false
            ],
            'welding_method' => [
                'data' => WeldingMethod::all(),
                'value' => 'ru_short_name',
                'html' => ['ru_short_name', 'iso_short_name', 'aws_short_name'],
                'type' => 'select',
                'multiple' => false
            ],
        ];

        

         ?>   
        </div>
        @include("components.blocks.module-block")
        
        
    </div>
</div>