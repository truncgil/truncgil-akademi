<?php $columnName = $column['name']; ?>
<input type="number"  data-group="{{$rowName}}" min="0" step="any" class="{{$columnName}} form-control {{isset($listData) ? 'edit' : ''}}" name="{{$columnName}}" 
<?php if(isset($listData))  { 
  ?>
 value="{{$listData->$columnName}}" 
 table="{{$tableName}}"  
 id="{{$listData->id}}"
 <?php } ?>

 placeholder="{{$column['type']}}"
>
