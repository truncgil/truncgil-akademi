<?php 
$columnName = $column['name'];
$columnData = $relationDatas[$columnName];  

?>
<select name="{{$columnName}}"  class="form-control table-select {{isset($listData) ? 'edit' : ''}}" 
<?php if(isset($listData))  { 
  ?>
 table="{{$tableName}}"  
 id="{{$listData->id}}"
 <?php } ?>
>
    <option value="">{{e2("Select")}}</option>
    <?php foreach($columnData['values'] AS $value)  {  ?>
    <option value="{{$value}}" 
    <?php if(isset($listData)) {
        
        if($listData->$columnName==$value) {
            echo "selected";
        }
    } ?>
    >
    {{$value}}
    </option> 
    <?php } ?>
</select>