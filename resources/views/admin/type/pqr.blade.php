<?php 
use App\Models\ProsedureQualificationRecord; 
use App\Models\NaksCertificate; 

$title = "Procedure Qualification Records";
$tableWidth="300%";
$listDatas = ProsedureQualificationRecord::orderBy("id","DESC")->paginate(setting('row_count'));
$tableName = "prosedure_qualification_records";

$relationDatas = [
    'naks_technology' => [
        'data' => NaksCertificate::all(),
        'value' => 'certificate_no',
        'text' => ['certificate_no', 'technology_category'],
        'type' => 'select'
    ],
];

?>
<div class="content">
    <div class="row">   
        @include("components.blocks.module-block")     
    </div>
</div>