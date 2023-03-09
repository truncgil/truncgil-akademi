
 <tr class="table-warning">
    <td><form action="?add-certificate" method="post">
                            @csrf
                            #</td>
    <td><input type="text" name="certificate_no" class="form-control" id=""></td>
    <td>
        <select name="short_name" id="" class=" form-control">
                <option value="">{{e2("Select")}}</option>
                <?php foreach($naksCenters AS $naksCenter)  { 
                ?>
                <option value="{{$naksCenter->center_no}}" >{{$naksCenter->center_no}} - {{$naksCenter->center_name}}</option> 
                <?php } ?>
        </select>
    </td>
    <td><input type="date" name="valid_from" required class="form-control"  id=""></td>
    <td><input type="date" name="valid_to" required class="form-control" id=""></td>
    <td><input type="text" name="welding_method" class="form-control" id=""></td>
    <td><input type="text" name="mat_group_1" class="form-control" id=""></td>
    <td><input type="text" name="mat_group_2" class="form-control" id=""></td>
    <td><input type="text" name="consumable" class="form-control" id=""></td>
    <td><input type="text" name="technology_category" class="form-control" id=""></td>
    <td><input type="text" name="type" class="form-control" id=""></td>
    <td><input type="text" name="min" class="form-control" id=""></td>
    <td><input type="text" name="max" class="form-control" id=""></td>
    <td><input type="text" name="min2" class="form-control" id=""></td>
    <td><input type="text" name="max2" class="form-control" id=""></td>
    <td><input type="text" name="min_thick" class="form-control" id=""></td>
    <td><input type="text" name="max_thick" class="form-control" id=""></td>
    <td><input type="text" name="min_thick2" class="form-control" id=""></td>
    <td><input type="text" name="max_thick2" class="form-control" id=""></td>
    <td><input type="text" name="join_type" class="form-control" id=""></td>
    <td>
        <select name="pwth" id="" class="form-control">
            <option value="YES" selected>{{e2("YES")}}</option>
            <option value="NO">{{e2("NO")}}</option>
        </select>
    </td>

    <td><input type="text" name="connection_type" class="form-control" id=""></td>
    <td><input type="text" name="join_view" class="form-control" id=""></td>
    <td><input type="text" name="angle_type" class="form-control" id=""></td>
    <td><input type="text" name="position" class="form-control" id=""></td>
    <td>
        <select name="pre_heating" id="" class="form-control">
            <option value="YES" selected>{{e2("YES")}}</option>
            <option value="NO">{{e2("NO")}}</option>
        </select>
    </td>
    <td><input type="text" name="shielding_gas" class="form-control" id=""></td>
    <td><input type="text" name="electrode_coating" class="form-control" id=""></td>
    <td><input type="text" name="welding_equipment" class="form-control" id=""></td>
    <td><input type="text" name="performed_works_type" class="form-control" id=""></td>
    <td><input type="text" name="remarks" class="form-control" id=""></td>
    <td>
        <button class="btn btn-default btn-sm"><i class="fa fa-plus"></i></button>
        </form>
    </td>    
</tr>
