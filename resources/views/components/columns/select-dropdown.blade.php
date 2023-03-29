<?php $columnName = $column['name']; 
$columnData = $relationDatas[$columnName];  
$filterColumns = isset($columnData['filter-columns']) ? 'filter-columns='.implode(",",$columnData['filter-columns']) : "";
$addedValues = [];
?>
<div class="input-group select-dropdown {{$columnName}}"  data-group="{{$rowName}}">
    <input type="text" class="form-control select-dropdown-input {{isset($listData) ? 'edit' : ''}}" readonly name="{{$columnName}}" 
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
    <div class="dropdown-menu dropdown-menu-right">
        <h6 class="dropdown-header"></h6>
        <input type="text" placeholder="{{e2("Search")}}" id="" class="form-control search">
        <div class="dropdown-list"
        <?php if(isset($columnData['affected'])) { ?>
                affected="{{json_encode($columnData['affected'])}}"
        <?php } ?>
        >
            
            <?php 
            if(isset($columnData['datas']))  { 
             
                foreach($columnData['datas'] AS $data)  {  
                    

                    ?>
                <label class="dropdown-item" {{$filterColumns}} data-filter-value="{{json_encode_tr($data)}}">
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
                        $addedValues[] = $data->$key;
                    } ?>
                </label> 
                <?php } ?> 
             <?php } ?>
             <?php if(isset($recordedDatas[$columnName])) {
                    foreach($recordedDatas[$columnName] AS $recordedValue) {
                        if(!in_array($recordedValue, $addedValues)) {
                            ?>
                            <label class="dropdown-item"
                            
                            
                            >{{$recordedValue}}</label>
                            <?php 

                        }
                    }
                    
                } ?>
         </div>
    </div>
    </div>
</div>