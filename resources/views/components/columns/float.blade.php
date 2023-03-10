<?php $columnName = $column['name']; ?>
<input type="number" step="any" class="form-control {{isset($listData) ? 'edit' : ''}}" name="{{$columnName}}" 
<?php if(isset($listData))  { 
  ?>
 value="{{$listData->$columnName}}" 
 table="{{$tableName}}"  
 id="{{$listData->id}}"
 <?php } ?>

 placeholder="{{$column['type']}}"
>
