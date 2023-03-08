<?php  
use App\Models\WeldingMethod; 
if(getisset("add")) {
    $post = $_POST;
    unset($post['_token']);
    
    try {
        WeldingMethod::create($post);
        bilgi("Welding Methots has been created","success");
    } catch (\Throwable $th) {
        dump($th);
    }
            
}
if(getisset("delete")) {
    WeldingMethod::where('id', get('delete'))->delete();

}
        ?>

<?php  
$tableName = "welding_methods"; ?>
@include("components.excel-buttons")
@include("components.excel-file-input")
<div class="table-responsive">
<table class="table table-bordered table-sm">
    <thead>
    <tr>
        <th data-resizable-column-id="id">{{e2("ID")}}</th>
        <th data-resizable-column-id="En-Welding-Number">{{e2("En Welding Number")}}</th>
        <th data-resizable-column-id="Russian_Definition">{{e2("Russian Definition")}}</th>
        <th data-resizable-column-id="ISO-4063-Definition">{{e2("ISO 4063 Definition")}}</th>
        <th data-resizable-column-id="AWS">{{e2("AWS")}}</th>
        <th data-resizable-column-id="ISO Short name">{{e2("ISO Short name")}}</th>
        <th data-resizable-column-id="AWS Short name">{{e2("AWS Short name")}}</th>
        <th data-resizable-column-id="RU Short name">{{e2("RU Short name")}}</th>
        <th data-resizable-column-id="opt">{{e2("Opt")}}</th>
    </tr>
        <form action="?t={{get("t")}}&add" method="post">
        @csrf
        <tr class="table-warning">
            <td>#</td>
            <td><input type="text" name="en_welding_number" id="" class="form-control"></td>
            <td><input type="text" name="russian_definition" id="" class="form-control"></td>
            <td><input type="text" name="iso_4063_definition" id="" class="form-control"></td>
            <td><input type="text" name="aws" id="" class="form-control"></td>
            <td><input type="text" name="iso_short_name" id="" class="form-control"></td>
            <td><input type="text" name="aws_short_name" id="" class="form-control"></td>
            <td><input type="text" name="ru_short_name" id="" class="form-control"></td>
            <td><button class="btn btn-outline-success btn-sm"><i class="fa fa-plus"></i></button></td>
        </tr>
        </form>
    </thead>
    <tbody>
        <?php 
        foreach(WeldingMethod::all() AS $weldingMethod) {
                ?>
            <tr>
                <td>{{$weldingMethod->id}}</td>
                <td><input type="text" name="en_welding_number" value="{{$weldingMethod->en_welding_number}}" table="{{$tableName}}" id="{{$weldingMethod->id}}" class="form-control edit"></td>
                <td><input type="text" name="russian_definition" value="{{$weldingMethod->russian_definition}}" table="{{$tableName}}" id="{{$weldingMethod->id}}" class="form-control edit"></td>
                <td><input type="text" name="iso_4063_definition" value="{{$weldingMethod->iso_4063_definition}}" table="{{$tableName}}" id="{{$weldingMethod->id}}" class="form-control edit"></td>
                <td><input type="text" name="aws" value="{{$weldingMethod->aws}}" table="{{$tableName}}" id="{{$weldingMethod->id}}" class="form-control edit"></td>
                <td><input type="text" name="iso_short_name" value="{{$weldingMethod->iso_short_name}}" table="{{$tableName}}" id="{{$weldingMethod->id}}" class="form-control edit"></td>
                <td><input type="text" name="aws_short_name" value="{{$weldingMethod->aws_short_name}}" table="{{$tableName}}" id="{{$weldingMethod->id}}" class="form-control edit"></td>
                <td><input type="text" name="ru_short_name" value="{{$weldingMethod->ru_short_name}}" table="{{$tableName}}" id="{{$weldingMethod->id}}" class="form-control edit"></td>
                <td>
                    <a href="?t={{get("t")}}&delete={{$weldingMethod->id}}" {{delete_teyit()}} class="btn btn-sm btn-outline-danger"><i class="fa fa-times"></i></a>
                </td>
            </tr>
                <?php 
        }
        ?>
    </tbody>
    
</table>
</div>
