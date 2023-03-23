<?php $columnName = $column['name']; ?>
<textarea   data-group="{{$rowName}}" class="{{$columnName}} form-control {{isset($listData) ? 'edit' : ''}}" name="{{$columnName}}" 
<?php if(isset($listData))  { ?>
 table="{{$tableName}}"  
 id="{{$listData->id}}"
 <?php } ?>
 placeholder="{{$column['type']}}"

>{{isset($listData) ? $listData->$columnName : ""}}</textarea>
