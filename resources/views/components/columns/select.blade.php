<?php 
$columnName = $column['name'];
$columnData = $relationDatas[$columnName];  
$datas = $columnData['datas'];

?>
<select name="{{$columnName}}" data-group="{{$rowName}}" class="{{$columnName}}  form-control table-select {{isset($listData) ? 'edit' : ''}}" 
<?php if(isset($columnData['affected'])) {
     ?>
     affected="{{json_encode($columnData['affected'])}}"
     data-url="{{url("admin/detail/{$columnData['table']}/{$columnData['value']}")}}"
     <?php 
} ?>
<?php if(isset($listData))  { 
  ?>
 table="{{$tableName}}"  
 id="{{$listData->id}}"
 <?php } ?>
>
    <option value="">{{e2("Select")}}</option>
    <?php foreach($datas AS $data)  {  
        $value = $columnData['value'];
        $optionHtml = "";
        foreach($columnData['text'] AS $text) {
            $optionHtml .= $data->$text . " ";
        }
    ?>

        <option value="{{$data->$value}}" 
        <?php if(isset($listData)) {
            
            if($listData->$columnName==$data->$value) {
                echo "selected";
            }
        } ?>
        >
        {{$optionHtml}}
        </option> 
    <?php } ?>
    
</select>