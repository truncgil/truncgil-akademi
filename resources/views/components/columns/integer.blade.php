<?php $columnName = $column['name']; ?>
<input type="number"  data-group="{{$rowName}}" class="{{$columnName}} form-control {{isset($listData) ? 'edit' : ''}}" name="{{$columnName}}" 
<?php if(isset($listData))  { 
  ?>
 value="{{$listData->$columnName}}" 
 table="{{$tableName}}"  
 id="{{$listData->id}}"
 <?php } ?>
 <?php if(isset($column['relation']['required'])) {
   ?>
   data-required-column="{{$column['relation']['required']['column']}}"
   data-required-value="{{$column['relation']['required']['value']}}"
   <?php 
 } ?>
  placeholder="{{$column['type']}}"
>
