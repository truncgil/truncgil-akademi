<?php 
$columns = table_columns($tableName);       
$columnsList = [];
?>
{{col("col-md-12", $title,0,[
            'export' => $tableName
            ])}} 
    <?php 
    foreach($columns AS $column) {
        $columnType = table_column_type($tableName, $column);
        if($column!="id") {
            $columnsList[] = [
                'name' => $column,
                'type' => isset($relationDatas[$column]) ? $relationDatas[$column]['type'] : $columnType,
                'relation' => isset($relationDatas[$column]) ? $relationDatas[$column] : ''
            ];
        }
    }
    ?>
    @include("components.excel-file-input")
    <div class="row">
        <div class="col-12">
            {{$listDatas->appends($_GET)->links()}}
        </div>
    </div>
    <div class="table-responsive mt-10 mb-10">
        <table style="table-layout:fixed;width:{{$tableWidth}}" class=" table table-sm table-bordered table-striped table-hover">
                
                <tr class="table-dark">
                    <?php foreach($columns AS $column)  { 
                        ?>
                        <td data-resizable-column-id="{{str_slug($column)}}">{{e2($column)}}</td> 
                        <?php } ?>
                        <td data-resizable-column-id="opt">{{e2("Opt")}}</td>
                </tr>
                <tr class="table-warning">
                    <form action="{{url("admin/create/$tableName")}}" method="post">
                    @csrf
                    
                    <td>#</td>
                    <?php foreach($columnsList AS $column)  {   ?>
                        <td>
                            @include("components.columns.{$column['type']}")
                        </td> 
                    <?php } ?>
                        <td><button class="btn btn-outline-success btn-sm"><i class="fa fa-plus"></i></button></td>
                    </form>

                </tr>
                
                <?php foreach($listDatas AS $listData) {
                        ?>
                    <tr id="t{{$listData->id}}">
                        <td>{{$listData->id}}</td>
                        <?php foreach($columnsList AS $column)  { ?>
                        <td>
                            @include("components.columns.{$column['type']}")
                        </td> 
                        <?php } ?>
                        <td>
                            <a href="{{url("admin/delete/$tableName/{$listData->id}")}}" ajax="#t{{$listData->id}}" {{delete_teyit()}} class="btn btn-outline-danger btn-sm"><i class="fa fa-remove"></i></a>
                        </td>
                    </tr>
                        <?php 
                } ?>
        </table>
        
    </div>
    <div class="row">
        <div class="col-12">
            {{$listDatas->appends($_GET)->links()}}
        </div>
    </div>
    

{{_col()}}