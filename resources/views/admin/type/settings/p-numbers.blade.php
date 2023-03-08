<?php  
use App\Models\PNumber; 
if(getisset("add")) {
    $post = $_POST;
    unset($post['_token']);
    
    try {
        PNumber::create($post);
        bilgi("PNumber has been created","success");
    } catch (\Throwable $th) {
        dump($th);
    }
            
}
if(getisset("delete")) {
    PNumber::where('id', get('delete'))->delete();

}

if(getisset("delete-all")) {
    PNumber::truncate();
}


$tableColumns = table_columns("p_numbers");
        ?>

<?php  
$tableName = "p_numbers"; ?>
@include("components.excel-buttons")
@include("components.excel-file-input")
<div class="table-responsive">
<table class="table table-bordered table-sm" style="table-layout:fixed;width:100%">
    <thead>
    <tr>
        <?php foreach($tableColumns AS $column)  {  ?>
            <th data-resizable-column-id="{{str_slug($column)}}">{{e2($column)}}</th> 
         <?php } ?>
        <th data-resizable-column-id="opt">{{e2("Opt")}}</th>
    </tr>
        <form action="?t={{get("t")}}&add" method="post">
        @csrf
        <tr class="table-warning">
        <?php foreach($tableColumns AS $column)  {  ?>
            <?php if($column=="id")  { 
              ?>
             <td>#</td> 
             <?php }  else  { 
               ?>
             <td><input type="text" name="{{$column}}" id="" class="form-control"></td> 
              <?php } ?>
        <?php } ?>
           
            <td><button class="btn btn-outline-success btn-sm"><i class="fa fa-plus"></i></button></td>
        </tr>
        </form>
    </thead>
    <tbody>
        <?php 
        foreach(PNumber::all() AS $pNumbers) {
                ?>
            <tr>
            <?php foreach($tableColumns AS $column)  {  ?>
                <?php if($column=="id")  {  ?>
                    <td>{{$pNumbers->id}}</td>
                <?php } else { ?>
                    <td><input type="text" name="{{$column}}" value="{{$pNumbers->$column}}" table="{{$tableName}}" id="{{$pNumbers->id}}" class="form-control edit"></td>
                <?php } ?>
                <?php } ?>
                <td>
                    <a href="?t={{get("t")}}&delete={{$pNumbers->id}}" {{delete_teyit()}} class="btn btn-sm btn-outline-danger"><i class="fa fa-times"></i></a>
                </td>
            </tr>
                <?php 
        }
        ?>
    </tbody>
    
</table>
</div>
