<?php $columnName = $column['name']; 
$columnData = $relationDatas[$columnName];
?>
<input type="text"  data-group="{{$rowName}}" class="{{$columnName}} form-control  {{isset($listData) ? 'edit' : ''}} auto-complete" name="{{$columnName}}" 
data-url="{{url('admin/autocomplete/' . $columnData['tableName'] . '/' . $columnData['columnName'])}}"
data-noresults-text="Nothing to see here."
<?php if(isset($listData))  { 
  ?>
 value="{{$listData->$columnName}}" 
 table="{{$tableName}}"  
 id="{{$listData->id}}"
 <?php } ?>
 placeholder="{{$column['type']}}"


>
