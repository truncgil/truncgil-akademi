<?php if(isset($tableName)) {
     ?>
     <a href="{{url("admin/export/". $tableName)}}" class="btn btn-outline-success"><i class="fa fa-file-excel-o"></i> {{e2("Excel Export")}}</a>
     <label
        for="excel-file"
        class="btn btn-outline-danger" title="<?php e2("Import to Excel") ?>" ><i class="fa fa-file-excel-o"></i> {{e2("Excel Import")}}</label>
     <?php 
} else {
    bilgi("tableName required","danger");
} ?>