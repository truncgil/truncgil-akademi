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
        ?>
<table class="table table-bordered table-sm">
    <tr>
        <th>{{e2("Center No")}}</th>
        <th>{{e2("Center Name")}}</th>
        <th>{{e2("Opt")}}</th>
    </tr>
    <form action="?t={{get("t")}}&add-center" method="post">
        @csrf
        <tr>
            <td><input type="text" name="center_no" id="" class="form-control"></td>
            <td><input type="text" name="center_name" id="" class="form-control"></td>
            <td><button class="btn btn-default btn-sm"><i class="fa fa-plus"></i></button></td>
        </tr>
        <?php 
            foreach(NaksCenter::all() AS $naksCenter) {
                 ?>
                <tr>
                    <td><input type="text" name="center_no" value="{{$naksCenter->center_no}}" table="naks_centers" id="{{$naksCenter->id}}" class="form-control edit"></td>
                    <td><input type="text" name="center_name" value="{{$naksCenter->center_name}}" table="naks_centers" id="{{$naksCenter->id}}" class="form-control edit"></td>
                    <td>
                        <a href="" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                    </td>
                </tr>
                 <?php 
            }
        ?>
    </form>
</table>