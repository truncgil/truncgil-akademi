<tr>
<td>{{$naksCertificate->id}}</td>
<td><input type="text" name="certificate_no" value="{{$naksCertificate->certificate_no}}" class="form-control edit" table="naks_certificates" id="{{$naksCertificate->id}}"></td>
<td >
    <select style="width:100px" name="short_name" id="{{$naksCertificate->id}}" table="naks_certificates" class="form-control edit">
        <option value="">{{e2("Select")}}</option>
        <?php foreach($naksCenters AS $naksCenter)  { 
          ?>
         <option value="{{$naksCenter->center_no}}" {{$naksCenter->center_no==$naksCertificate->short_name ? "selected" : ""}}>#{{$naksCenter->id}} {{$naksCenter->center_no}} - {{$naksCenter->center_name}}</option> 
         <?php } ?>
    </select>
</td>
<td><input type="date" name="valid_from" value="{{$naksCertificate->valid_from}}" required class="form-control edit" table="naks_certificates" id="{{$naksCertificate->id}}"></td>
<td><input type="date" name="valid_to" value="{{$naksCertificate->valid_to}}" required class="form-control edit" table="naks_certificates" id="{{$naksCertificate->id}}"></td>
<td><input type="text" name="welding_method" value="{{$naksCertificate->welding_method}}" class="form-control edit" table="naks_certificates" id="{{$naksCertificate->id}}"></td>
<td><input type="text" name="mat_group_1" value="{{$naksCertificate->mat_group_1}}" class="form-control edit" table="naks_certificates" id="{{$naksCertificate->id}}"></td>
<td><input type="text" name="mat_group_2" value="{{$naksCertificate->mat_group_2}}" class="form-control edit" table="naks_certificates" id="{{$naksCertificate->id}}"></td>
<td><input type="text" name="consumable" value="{{$naksCertificate->consumable}}" class="form-control edit" table="naks_certificates" id="{{$naksCertificate->id}}"></td>
<td><input type="text" name="technology_category" value="{{$naksCertificate->technology_category}}" class="form-control edit" table="naks_certificates" id="{{$naksCertificate->id}}"></td>
<td><input type="text" name="type" value="{{$naksCertificate->type}}" class="form-control edit" table="naks_certificates" id="{{$naksCertificate->id}}"></td>
<td><input type="text" name="min" value="{{$naksCertificate->min}}" class="form-control edit" table="naks_certificates" id="{{$naksCertificate->id}}"></td>
<td><input type="text" name="max" value="{{$naksCertificate->max}}" class="form-control edit" table="naks_certificates" id="{{$naksCertificate->id}}"></td>
<td><input type="text" name="min2" value="{{$naksCertificate->min2}}" class="form-control edit" table="naks_certificates" id="{{$naksCertificate->id}}"></td>
<td><input type="text" name="max2" value="{{$naksCertificate->max2}}" class="form-control edit" table="naks_certificates" id="{{$naksCertificate->id}}"></td>
<td><input type="text" name="min_thick" value="{{$naksCertificate->min_thick}}" class="form-control edit" table="naks_certificates" id="{{$naksCertificate->id}}"></td>
<td><input type="text" name="max_thick" value="{{$naksCertificate->max_thick}}" class="form-control edit" table="naks_certificates" id="{{$naksCertificate->id}}"></td>
<td><input type="text" name="min_thick2" value="{{$naksCertificate->min_thick2}}" class="form-control edit" table="naks_certificates" id="{{$naksCertificate->id}}"></td>
<td><input type="text" name="max_thick2" value="{{$naksCertificate->max_thick2}}" class="form-control edit" table="naks_certificates" id="{{$naksCertificate->id}}"></td>
<td><input type="text" name="join_type" value="{{$naksCertificate->join_type}}" class="form-control edit" table="naks_certificates" id="{{$naksCertificate->id}}"></td>
<td>
    <select name="pwth" id="{{$naksCertificate->id}}" class="form-control edit" table="naks_certificates">
        <option value="YES" {{$naksCertificate->pwth=='YES' ? "selected" : ""}}>{{e2("YES")}}</option>
        <option value="NO" {{$naksCertificate->pwth=='NO' ? "selected" : ""}}>{{e2("NO")}}</option>
    </select>
</td>

<td><input type="text" name="connection_type" class="form-control" id=""></td>
<td><input type="text" name="join_view" class="form-control" id=""></td>
<td><input type="text" name="angle_type" class="form-control" id=""></td>
<td><input type="text" name="position" class="form-control" id=""></td>
<td>
    <select name="pre_heating" id="{{$naksCertificate->id}}" class="form-control edit" table="naks_certificates">
            <option value="YES" {{$naksCertificate->pre_heating=='YES' ? "selected" : ""}}>{{e2("YES")}}</option>
            <option value="NO" {{$naksCertificate->pre_heating=='NO' ? "selected" : ""}}>{{e2("NO")}}</option>
    </select>
</td>
<td><input type="text" name="shielding_gas" class="form-control" id=""></td>
<td><input type="text" name="electrode_coating" class="form-control" id=""></td>
<td><input type="text" name="welding_equipment" class="form-control" id=""></td>
<td><input type="text" name="performed_works_type" class="form-control" id=""></td>
<td><input type="text" name="remarks" class="form-control" id=""></td>
<td>
    <a href="?delete={{$naksCertificate->id}}" {{delete_teyit()}} class="btn btn-danger btn-sm"><i class="fa fa-remove"></i></a>
</td>    
</tr>