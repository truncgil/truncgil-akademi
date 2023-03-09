<?php $columnName = $column['name']; ?>
<input type="date" class="form-control" name="{{$columnName}}" 
<?php if(isset($listData))  { 
  ?>
 value="{{$listData->$columnName}}"  
 <?php } ?>

id="">

