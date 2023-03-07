<?php if(isset($tableName))  { 
  ?>
 <form action="{{url("admin/import/". $tableName)}}" enctype="multipart/form-data" method="post" class="d-none">
     @csrf
     <input type="file" name="excel-file" onchange="form.submit()" id="excel-file">
     <button class="btn btn-primary">Send</button>
 </form> 
 <?php } else {
    bilgi("Lütfen tableName değişkenini tanımlayınız","warning");
 } ?>