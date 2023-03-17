<?php 
use App\Models\Subcontractor; 

$title = "Subcontractor";
$tableWidth="100%";
/*
$levels = [
    'Welder, Painter, Insulator (Subcontractor / Payrollless)',
    'Welder (Subcontractor)',
    '',
    '',
];
*/
$listDatas = Subcontractor::orderBy("id","DESC")
    ->paginate(setting('row_count'));
$tableName = "subcontractors";



$relationDatas = [
   
];

?>
<div class="content">
    <div class="row">   
        @include("components.blocks.module-block")     
    </div>
</div>