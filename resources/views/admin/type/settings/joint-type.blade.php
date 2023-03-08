<?php  
use App\Models\JointType; 
if(getisset("add")) {
    $post = $_POST;
    unset($post['_token']);
    
    try {
        JointType::create($post);
        bilgi("JointType has been created","success");
    } catch (\Throwable $th) {
        dump($th);
    }
            
}
if(getisset("delete")) {
    JointType::where('id', get('delete'))->delete();

}

if(getisset("delete-all")) {
    JointType::truncate();
}


$tableColumns = table_columns("joint_types");
        ?>

<?php  
$tableName = "joint_types"; ?>
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
        foreach(JointType::all() AS $jointType) {
                ?>
            <tr>
            <?php foreach($tableColumns AS $column)  {  ?>
                <?php if($column=="id")  {  ?>
                    <td>{{$jointType->id}}</td>
                <?php } else { ?>
                    <td><input type="text" name="{{$column}}" value="{{$jointType->$column}}" table="{{$tableName}}" id="{{$jointType->id}}" class="form-control edit"></td>
                <?php } ?>
                <?php } ?>
                <td>
                    <a href="?t={{get("t")}}&delete={{$jointType->id}}" {{delete_teyit()}} class="btn btn-sm btn-outline-danger"><i class="fa fa-times"></i></a>
                </td>
            </tr>
                <?php 
        }
        ?>
    </tbody>
    
</table>
</div>
