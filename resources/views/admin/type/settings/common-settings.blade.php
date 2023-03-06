
<?php 
if(getisset("update")) {
   // dump($_POST);
    foreach($_POST AS $key => $value) {
        firstOrUpdate([
            'title' => $key,
            'html' => $value
        ],"settings",[
            'title' => $key
        ]);
    }
    
}

 ?>
<form action="?t={{get("t")}}&update" method="post">
    @csrf
    {{e2("Default Table Row Count Per Page")}}: 
    <input type="number" name="row_count" value="{{setting('row_count')}}" class="form-control" id="">

</form>