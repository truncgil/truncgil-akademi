<?php $columnName = $column['name']; 
$columnData = $relationDatas[$columnName];  
$datas = $columnData['datas'];

?>
<div class="input-group multiple-choice">
    <input type="text" 
    class="form-control {{isset($listData) ? 'edit' : ''}}" 
    name="{{$columnName}}" 
    seperator="{{isset($columnData['seperator']) ? $columnData['seperator'] : ','}}"
    <?php if(isset($listData))  { 
    ?>
    value="{{$listData->$columnName}}" 
    table="{{$tableName}}"  
    id="{{$listData->id}}"
    <?php } ?>
    <?php if(isset($columnData['disabled'])) {
         ?>
         data-disabled-condition-column="{{$columnData['disabled']['column']}}"
         data-disabled-condition-type="{{$columnData['disabled']['type']}}"
         data-disabled-condition-value="{{$columnData['disabled']['value']}}"
         <?php 
    } ?>
    placeholder="{{$column['type']}}"
    {{isset($columnData['max']) ? 'max='.$columnData['max'] : ""}}
    >
    <div class="dropdown dropdown-sm">
    <button type="button" class="btn btn-outline-default btn-sm dropdown-toggle" data-toggle="dropdown">
        
    </button>
    <div class="dropdown-menu">
        
        <?php foreach($datas AS $data)  { 
            $patternString = $columnData['pattern'];
            foreach($data AS $dataColumn => $dataValue) {
                $patternString = str_replace('{'.$dataColumn.'}', $dataValue, $patternString);
            }
          ?>
         <label class="dropdown-item"><input type="checkbox" value="{{$patternString}}" name="" id=""> {{$patternString}}</label> 
         <?php } ?>
    </div>
    </div>
</div>