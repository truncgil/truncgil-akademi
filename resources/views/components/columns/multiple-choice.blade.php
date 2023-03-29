<?php $columnName = $column['name']; 
$columnData = $relationDatas[$columnName];  
$datas = $columnData['datas'];
$addedValues = [];
$seperator = isset($columnData['seperator']) ? $columnData['seperator'] : ',';
?>
<div class="input-group multiple-choice {{$columnName}}"  data-group="{{$rowName}}">
    <input type="text" 
    readonly
    class="form-control multiple-choice-input {{isset($listData) ? 'edit' : ''}}" 
    name="{{$columnName}}" 
    seperator="{{$seperator}}"
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
    <div class="dropdown dropdown-sm ">
    <button type="button" class="btn btn-outline-default btn-sm dropdown-toggle" data-toggle="dropdown">
        
    </button>
    <div class="dropdown-menu dropdown-menu-right">
        <input type="text" placeholder="{{e2("Search")}}" id="" class="form-control search">
        <div class="dropdown-list">
        <?php foreach($datas AS $data)  { 
            $patternString = $columnData['pattern'];
            $values = [];
            foreach($data AS $dataColumn => $dataValue) {
                $patternString = str_replace('{'.$dataColumn.'}', $dataValue, $patternString);
                $values[] = $dataValue;
            }
            $implodeValue = implode(',',$values);
            $addedValues[] = $patternString;
          ?>
         <label class="dropdown-item" data-filter-value="{{json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)}}"><input type="checkbox" value="{{$patternString}}" name="" id="">{{$patternString}}</label> 
         <?php } ?>
         <?php if(isset($recordedDatas[$columnName])) {
                foreach($recordedDatas[$columnName] AS $recordedValue) {
                    $recordedValues = explode($seperator, $recordedValue);
                    foreach($recordedValues AS $recordedValue) 
                    {
                        if(!in_array($recordedValue, $addedValues)) {
                            $addedValues[] = $recordedValue;
                            ?>
                            <label class="dropdown-item" data-filter-value="{{$recordedValue}}"><input type="checkbox" value="{{$recordedValue}}" name="" id=""> {{$recordedValue}}</label>
                           
                            <?php 
    
                        }
                    }
                }
                
            } ?>
            </div>
    </div>
    </div>
</div>