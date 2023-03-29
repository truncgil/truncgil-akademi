<?php 
$columns = table_columns($tableName);   
if(isset($excepts)) {
    $columns = array_diff($columns, $excepts);
} 
$columnsList = [];

foreach($columns AS $column) {
    $columnType = table_column_type($tableName, $column);
    if($column!="id") {
        $columnsList[$column] = [
            'name' => $column,
            'type' => isset($relationDatas[$column]) ? $relationDatas[$column]['type'] : $columnType,
            'relation' => isset($relationDatas[$column]) ? $relationDatas[$column] : ''
        ];
    }
}

    ?>
 {{col("col-12","New $title", 3)}} 
 <?php $rowName = "new-form"; ?>
 <form action="{{url("admin/create/$tableName")}}" method="post" class="new-form">
    @csrf
    <div class="row {{$rowName}}">
        <?php if(isset($blockGroup)) {
            foreach($blockGroup AS $blockTitle => $blockColumns) {
                
                $slug = str_slug($blockTitle); 
                $class = "col-12 border-1";
                $color = -1;
                if(isset($columnRedesign[$slug]['class'])) {
                    $class = $columnRedesign[$slug]['class'];
                }
                if(isset($columnRedesign[$slug]['color'])) {
                    $color = $columnRedesign[$slug]['color'];
                }
                $options['no-options'] = true;

                if(isset($columnRedesign[$slug]['border'])) $options['border'] = true;
                if(isset($columnRedesign[$slug]['content-class'])) $options['content-class'] = $columnRedesign[$slug]['content-class'];
                 ?>
                  {{col($class . " " . $slug, $blockTitle, $color, $options)}} 
                    <div class="row">
                        <?php foreach($blockColumns AS $column) {
                        //    dd($columnsList[$column]);
                        $column = $columnsList[$column];
                        $columnClass = "col-md-3";

                        if(isset($columnRedesign[$column['name']]['class'])) 
                            $columnClass = $columnRedesign[$column['name']]['class'];
                            ?>
                            <div class="{{$columnClass}}">
                                {{e2($column['name'])}}
                                @include("components.columns.{$column['type']}")
                            </div>
                            <?php 
                        } ?>
                    </div>
                  {{_col()}}
                 <?php 
            }
        } else  { 
          ?>
         <?php foreach($columnsList AS $column)  {  
             
             ?>
             <div class="col-md-3">
                 {{e2($column['name'])}}
                 @include("components.columns.{$column['type']}")
             </div>
         <?php } ?> 
         <?php } ?>
        <div class="col-12 text-center">
            <button class="btn btn-primary mt-5"><i class="fa fa-save"></i> Add</button>
        </div>
    </div>
</form>
  
 {{_col()}}
{{col("col-md-12", $title,0,[
            'export' => $tableName
            ])}} 
    
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
                <?php $rowName = "new-tr"; ?>
                <tr class="table-warning {{$rowName}}">
                    
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
                    $rowName = "row" . $listData->id;
                        ?>
                    <tr id="t{{$listData->id}}" data-row="{{$rowName}}">
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