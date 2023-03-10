<?php 
$columnName = $column['name'];
$columnData = $relationDatas[$columnName];  

?>
<select name="{{$columnName}}"  class="form-control {{isset($listData) ? 'edit' : ''}}" 
<?php if(isset($listData))  { 
  ?>
 table="{{$tableName}}"  
 id="{{$listData->id}}"
 <?php } ?>
>
    <option value="">{{e2("Select")}}</option>
    <?php foreach($columnData['data'] AS $data)  {  
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