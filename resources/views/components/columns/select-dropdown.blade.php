<?php $columnName = $column['name']; 
$columnData = $relationDatas[$columnName];  
$filterColumns = isset($columnData['filter-columns']) ? 'filter-columns='.implode(",",$columnData['filter-columns']) : "";

?>
<div class="input-group select-dropdown {{$columnName}}"  data-group="{{$rowName}}">
    <input type="text" class="form-control {{isset($listData) ? 'edit' : ''}}" name="{{$columnName}}" 
    <?php if(isset($listData))  { 
    ?>
    value="{{$listData->$columnName}}" 
    table="{{$tableName}}"  
    id="{{$listData->id}}"
    <?php } ?>
   
    >
    <div class="dropdown dropdown-sm">
    <button type="button" class="btn btn-outline-default btn-sm dropdown-toggle {{isset($columnData['filter']) ? "dropdown-filter" : ""}}" 
    data-toggle="dropdown"
    data-pattern="{{$columnData['pattern']}}"
    
    <?php if(isset($columnData['filter'])) {
         ?>
         data-table="{{$columnData['filter']['table']}}"
         data-target-column="{{$columnData['filter']['targetColumn']}}"
         data-filter-column="{{$columnData['filter']['filterColumn']}}"
         <?php 
    } ?>
    >
        
    </button>
    <div class="dropdown-menu">
        <h6 class="dropdown-header"></h6>
        <input type="text" placeholder="{{e2("Search")}}" id="" class="form-control search">
        <div class="dropdown-list">
            
            <?php 
            if(isset($columnData['datas']))  { 
             
                foreach($columnData['datas'] AS $data)  {  ?>
                <label class="dropdown-item" {{$filterColumns}}>
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
             <?php } ?>
         </div>
    </div>
    </div>
</div>