<?php if(isset($tableName)) {
     ?>
     <div class="btn-group">

     
        <a href="{{url("admin/export/". $tableName)}}" class="btn btn-outline-success"><i class="fa fa-file-excel-o"></i> {{e2("Excel Export")}}</a>
        <label
        for="excel-file"
        class="btn btn-outline-info" title="<?php e2("Import to Excel") ?>" ><i class="fa fa-file-excel-o"></i> {{e2("Excel Import")}}</label>
        <a href="?t={{get("t")}}&delete-all" teyit="{{e2("Are you sure?")}}" class="btn btn-outline-primary"><i class="fa fa-trash"></i> {{e2("Delete All Items")}}</a>
    </div>
     <?php 
} else {
    bilgi("tableName required","danger");
} ?>