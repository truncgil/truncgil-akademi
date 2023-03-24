<?php 
use App\Models\User; 

$title = "Employees";
$tableWidth="300%";
/*
$levels = [
    'Welder, Painter, Insulator (Subcontractor / Payrollless)',
    'Welder (Subcontractor)',
    '',
    '',
];
*/
$listDatas = User::orderBy("id","DESC")
 //  ->where("level", ['Admin'])
    ->paginate(setting('row_count'));
$tableName = "users";

$excepts = [
    'json',
    'slug',
    'pic',
    'email_verified_at',
    'password',
    'permissions',
    'phone',
    'level',
    'alias',
    'email',
    'remember_token',
    'recover',
    'last_seen',
    'branslar',
    'ust',
    'uid',
    'note',
];

$relationDatas = [
    'level' => [
        'values' => array_keys(levels()),
        'type' => 'manuel-select'
    ],
    
    'gender' => [
        'values' => [
            'Male',
            'Female',
        ],
        'type' => 'manuel-select'
    ],
    'status' => [
        'values' => [
            'Active',	
            'Transfer to ...',
            'Black list',
            'Exit',
        ],
        'type' => 'manuel-select'
    ],
    'subcontructer' => [
        'datas' => db("subcontractors")->get(),
        'pattern' => '{company_name_en}',
        'type' => 'select-dropdown'
    ],
    'job_name' => [
        'datas' => db("job_descriptions")->get(),
        'pattern' => '{title}',
        'type' => 'select-dropdown'
    ],
];

?>
<div class="content">
    <div class="row">   
        @include("components.blocks.module-block")     
    </div>
</div>