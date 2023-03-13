<?php $columnName = $column['name']; 
$columnData = $relationDatas[$columnName];  
$datas = $columnData['datas'];
$key = $columnData['key'];
?>
<div class="input-group multiple-choice">
    <input type="text" class="form-control {{isset($listData) ? 'edit' : ''}}" name="{{$columnName}}" 
    <?php if(isset($listData))  { 
    ?>
    value="{{$listData->$columnName}}" 
    table="{{$tableName}}"  
    id="{{$listData->id}}"
    <?php } ?>
    placeholder="{{$column['type']}}"
    >
    <div class="dropdown dropdown-sm">
    <button type="button" class="btn btn-outline-default btn-sm dropdown-toggle" data-toggle="dropdown">
        
    </button>
    <div class="dropdown-menu">
        <h6 class="dropdown-header d-none">{{e2($key)}}</h6>
        <?php foreach($datas AS $data)  { 
          ?>
         <label class="dropdown-item"><input type="checkbox" value="{{$data->$key}}" name="" id=""> {{$data->$key}}</label> 
         <?php } ?>
    </div>
    </div>
</div>