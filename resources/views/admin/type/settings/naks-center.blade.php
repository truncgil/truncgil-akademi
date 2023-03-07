<?php  
use App\Models\NaksCenter; 
if(getisset("add-center")) {
    $post = $_POST;
    unset($post['_token']);
    
    try {
        NaksCenter::create($post);
        bilgi("Naks Center has been created","success");
    } catch (\Throwable $th) {
        dump($th);
    }
            
}
if(getisset("delete-center")) {
    NaksCenter::where('id', get('delete-center'))->delete();

}
        ?>

<?php  
$tableName = "naks_centers"; ?>
@include("components.excel-buttons")
@include("components.excel-file-input")
<div class="table-responsive">
<table class="table table-bordered table-sm">
    <thead>
    <tr>
        <th data-resizable-column-id="id">{{e2("ID")}}</th>
        <th data-resizable-column-id="center_no">{{e2("Center No")}}</th>
        <th data-resizable-column-id="center_name">{{e2("Center Name")}}</th>
        <th data-resizable-column-id="opt">{{e2("Opt")}}</th>
    </tr>
        <form action="?t={{get("t")}}&add-center" method="post">
        @csrf
        <tr class="table-warning">
            <td>#</td>
            <td><input type="text" name="center_no" id="" class="form-control"></td>
            <td><input type="text" name="center_name" id="" class="form-control"></td>
            <td><button class="btn btn-outline-success btn-sm"><i class="fa fa-plus"></i></button></td>
        </tr>
        </form>
    </thead>
    <tbody>
        <?php 
        foreach(NaksCenter::all() AS $naksCenter) {
                ?>
            <tr>
                <td>{{$naksCenter->id}}</td>
                <td><input type="text" name="center_no" value="{{$naksCenter->center_no}}" table="naks_centers" id="{{$naksCenter->id}}" class="form-control edit"></td>
                <td><input type="text" name="center_name" value="{{$naksCenter->center_name}}" table="naks_centers" id="{{$naksCenter->id}}" class="form-control edit"></td>
                <td>
                    <a href="?t={{get("t")}}&delete-center={{$naksCenter->id}}" {{delete_teyit()}} class="btn btn-sm btn-outline-danger"><i class="fa fa-times"></i></a>
                </td>
            </tr>
                <?php 
        }
        ?>
    </tbody>
    
</table>
</div>
