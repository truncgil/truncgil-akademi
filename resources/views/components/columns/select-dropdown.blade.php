<?php $columnName = $column['name']; 
$columnData = $relationDatas[$columnName];  
$datas = $columnData['datas'];

?>
<div class="input-group select-dropdown">
    <input type="text" class="form-control {{isset($listData) ? 'edit' : ''}}" name="{{$columnName}}" 
    <?php if(isset($listData))  { 
    ?>
    value="{{$listData->$columnName}}" 
    table="{{$tableName}}"  
    id="{{$listData->id}}"
    <?php } ?>
   
    >
    <div class="dropdown dropdown-sm">
    <button type="button" class="btn btn-outline-default btn-sm dropdown-toggle" data-toggle="dropdown">
        
    </button>
    <div class="dropdown-menu">
        <h6 class="dropdown-header"></h6>
        <input type="text" placeholder="{{e2("Search")}}" id="" class="form-control search">
        <div class="dropdown-list">
            <?php foreach($datas AS $data)  { 
            ?>
            <label class="dropdown-item">
                <?php if(isset($columnData['pattern'])) {
                    $patternString = $columnData['pattern'];
                    
                    foreach($data AS $dataKey => $dataValue) {
                        $patternString = str_replace("{" . $dataKey . "}",$dataValue, $patternString);

                    }
                    echo $patternString;
                } else {
                    $key = $columnData['key'];
                    ?>
                    {{$data->$key}}
                    <?php 
                } ?>
            </label> 
            <?php } ?>
         </div>
    </div>
    </div>
</div>