<?php $columnName = $column['name']; ?>
<input type="date" class="form-control {{isset($listData) ? 'edit' : ''}}" name="{{$columnName}}" 
<?php if(isset($listData))  { 
  ?>
 value="{{$listData->$columnName}}" 
 table="{{$tableName}}"  
 id="{{$listData->id}}"
 <?php } ?>
