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
    //->whereIn("level", $levels)
    ->paginate(setting('row_count'));
$tableName = "users";

$excepts = [
    'json',
    'slug',
    'pic',
    'email_verified_at',
    'password',
    'permissions',
    'alias',
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
];

?>
<div class="content">
    <div class="row">   
        @include("components.blocks.module-block")     
    </div>
</div>