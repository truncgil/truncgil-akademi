 {{col("col-12 detail","User Detail")}} 
 <?php 
if(isAdmin())  { 
  if(getisset("update")) {
    $post = $_POST;
    $pic = upload("pic","profile_pic/");
   
    if(!is_null($pic)) {
      $post['pic'] = $pic;
    }

    
    if(!postesit("password","")) {
        $post['password'] = Hash::make($post['password']);
    }
   
    unset($post['password2']);
    unset($post['password']);
    unset($post['_token']);
   db("users")
        ->where("id",get("update"))
        ->update($post);
   // exit();

 }

 $userDetail = db("users")
 ->orWhere("id",get("id"))
 ->orWhere("email",get("id"))
 ->first();
 if($userDetail)  { 
  ?>
  <form action="?update={{$userDetail->id}}&id={{$userDetail->id}}" enctype="multipart/form-data"  method="post" autocomplete="off">
      @csrf
     
<div class="row">
<div class="col-md-3">
                            <div class="block block-rounded text-center">
                                <div class="block-content block-content-full">
                                   <?php if($userDetail->pic!="")  { 
                                     ?>
                                      <img class="img-avatar" src="{{picture3($userDetail->pic,512)}}" alt="">  
                                    <?php } else {
                                         ?>
                                         <img class="img-avatar" src="{{url('assets/icons/man.png')}}" alt="">  
                                         <?php 
                                    } ?>
                                     
                                </div>
                                <div class="block-content block-content-full block-content-sm bg-body-light">
                                    <div class="font-w600 mb-5">{{$userDetail->name}} {{$userDetail->surname}}</div>
                                    <div class="font-size-sm text-muted">{{$userDetail->level}}</div>
                                </div>
                                <div class="block-content block-content-full d-none">
                                    <a class="btn btn-rounded btn-alt-success" href="javascript:void(0)">
                                        <i class="fa fa-plus mr-5"></i>Add
                                    </a>
                                    <a class="btn btn-rounded btn-alt-secondary" href="javascript:void(0)">
                                        <i class="fa fa-user-circle mr-5"></i>Profile
                                    </a>
                                </div>
                            </div>
                            <label for="">{{e2("Profile Picture")}} </label>
        <small>{{e2("If you don't want to change it, leave it blank.")}}</small>
        <input type="file" name="pic" class="form-control" id="">
                        </div>
    <div class="col-md-9">
        <div class="row">
        <div class="col-md-6">
            <label for="">{{e2("Name")}}: </label><input  type="text" value="" name="name" id="first-name"
            class="form-control">
        </div>
        <div class="col-md-6">
            <label for="">{{e2("Name En")}}: </label><input  type="text" value="" name="name_en"
            class="form-control">
        </div>
        <div class="col-md-6">
            <label for="">{{e2("Name Ru")}}: </label><input  type="text" value="" name="name_ru"
            class="form-control">
        </div>
        <div class="col-md-6">
            <label for="">{{e2("Team/Subconstructer")}}: </label>
            <select name="subcontructer" id="" class="form-control">
                <option value="">{{e2("Select")}}</option>
                <?php $teams = ['Stellar', 'Sonuc Stroy', 'Berty'];
                foreach($teams AS $s)  {
                     ?>
                     <option value="{{$s}}">{{$s}}</option>

                     <?php 
                }
                ?>
            </select>
        </div>
        <div class="col-md-6">
            <label for="">{{e2("Date of Birth")}}: </label><input  type="date" value="" name="date_of_birth"
            class="form-control">
        </div>
        <div class="col-md-6">
            <label for="">{{e2("Company")}}: </label><input  type="text" value="" name="company"
            class="form-control">
        </div>
        <div class="col-md-6">
            <label for="">{{e2("Passport No")}}: </label><input  type="text" value="" name="passport_no"
            class="form-control">
        </div>
        <div class="col-md-6">
            <label for="">{{e2("Status")}}: </label>
            <select name="status" id="" class="form-control">
            <option value="">{{e2("Select")}}</option>
                <?php $status = ['Active', 'Transfer to', 'Black list', 'Exit'];
                foreach($status AS $s)  {
                     ?>
                     <option value="{{$s}}">{{$s}}</option>

                     <?php 
                }
                ?>
            </select>
        </div>
        <div class="col-md-6">
            <label for="">{{e2("Registration No")}}: </label><input  type="text" value="" name="passport_no"
            class="form-control">
        </div>
        <div class="col-md-6">
            <label for="">{{e2("Job Name")}}: </label>
            <select name="job_name" id="" class="form-control">
                <option value="">{{e2("Select")}}</option>
                <?php $jobs = ['Engineer', 'Welder', 'Formen', 'Tack Welder'];
                foreach($jobs AS $s)  {
                     ?>
                     <option value="{{$s}}">{{$s}}</option>

                     <?php 
                }
                ?>
            </select>
        </div>
        <div class="col-md-6">
            <label for="">{{e2("Date of Start")}}: </label><input  type="date" value="" name="date_start"
            class="form-control">
        </div>
        <div class="col-md-6">
            <label for="">{{e2("Date of Finish")}}: </label><input  type="date" value="" name="date_finish"
            class="form-control">
        </div>
   

    <div class="col-md-6">
            
<label for="">{{e2("Country")}}: </label>
    <select name="country" id="country" class="form-control select2">
    <option value="">{{e2("Select Country")}}</option>
    <option value="Afghanistan">Afghanistan</option>
    <option value="Albania"> Albania</option>
    <option value="Algeria"> Algeria</option>
    <option value="Andorra"> Andorra</option>
    <option value="Angola"> Angola</option>
    <option value="Antigua and Barbuda"> Antigua and Barbuda</option>
    <option value="Argentina"> Argentina</option>
    <option value="Armenia"> Armenia</option>
    <option value="Australia"> Australia</option>
    <option value="Austria"> Austria</option>
    <option value="Azerbaijan"> Azerbaijan</option>
    <option value="Bahamas"> Bahamas</option>
    <option value="Bahrain"> Bahrain</option>
    <option value="Bangladesh"> Bangladesh</option>
    <option value="Barbados"> Barbados</option>
    <option value="Belarus&nbsp;"> Belarus&nbsp;</option>
    <option value="Belgium"> Belgium</option>
    <option value="Belize"> Belize</option>
    <option value="Benin"> Benin</option>
    <option value="Bhutan"> Bhutan</option>
    <option value="Bolivia"> Bolivia</option>
    <option value="Bosnia and Herzegovina&nbsp;"> Bosnia and Herzegovina&nbsp;</option>
    <option value="Botswana"> Botswana</option>
    <option value="Brazil"> Brazil</option>
    <option value="Brunei Darussalam"> Brunei Darussalam</option>
    <option value="Bulgaria"> Bulgaria</option>
    <option value="Burkina Faso"> Burkina Faso</option>
    <option value="Burundi"> Burundi</option>
    <option value="Cambodia"> Cambodia</option>
    <option value="Cameroon"> Cameroon</option>
    <option value="Canada"> Canada</option>
    <option value="Cape Verde"> Cape Verde</option>
    <option value="Central African Republic"> Central African Republic</option>
    <option value="Chad"> Chad</option>
    <option value="Chile"> Chile</option>
    <option value="China"> China</option>
    <option value="Colombia"> Colombia</option>
    <option value="Comoros"> Comoros</option>
    <option value="Congo"> Congo</option>
    <option value="Costa Rica"> Costa Rica</option>
    <option value="Côte d’Ivoire"> Côte d’Ivoire</option>
    <option value="Croatia&nbsp;"> Croatia&nbsp;</option>
    <option value="Cuba"> Cuba</option>
    <option value="Cyprus"> Cyprus</option>
    <option value="Czech Republic"> Czech Republic</option>
    <option value="Democratic People’s Republic of Korea"> Democratic People’s Republic of Korea</option>
    <option value="Democratic Republic of the Congo&nbsp;"> Democratic Republic of the Congo&nbsp;</option>
    <option value="Denmark"> Denmark</option>
    <option value="Djibouti"> Djibouti</option>
    <option value="Dominica"> Dominica</option>
    <option value="Dominican Republic"> Dominican Republic</option>
    <option value="Ecuador"> Ecuador</option>
    <option value="Egypt&nbsp;"> Egypt&nbsp;</option>
    <option value="El Salvador"> El Salvador</option>
    <option value="Equatorial Guinea"> Equatorial Guinea</option>
    <option value="Eritrea"> Eritrea</option>
    <option value="Estonia"> Estonia</option>
    <option value="Ethiopia"> Ethiopia</option>
    <option value="Fiji"> Fiji</option>
    <option value="Finland"> Finland</option>
    <option value="France"> France</option>
    <option value="Gabon"> Gabon</option>
    <option value="Gambia"> Gambia</option>
    <option value="Georgia"> Georgia</option>
    <option value="Germany&nbsp;"> Germany&nbsp;</option>
    <option value="Ghana"> Ghana</option>
    <option value="Greece"> Greece</option>
    <option value="Grenada"> Grenada</option>
    <option value="Guatemala"> Guatemala</option>
    <option value="Guinea"> Guinea</option>
    <option value="Guinea-Bissau"> Guinea-Bissau</option>
    <option value="Guyana"> Guyana</option>
    <option value="Haiti"> Haiti</option>
    <option value="Honduras"> Honduras</option>
    <option value="Hungary"> Hungary</option>
    <option value="Iceland"> Iceland</option>
    <option value="India"> India</option>
    <option value="Indonesia&nbsp;"> Indonesia&nbsp;</option>
    <option value="Iran"> Iran</option>
    <option value="Iraq"> Iraq</option>
    <option value="Ireland"> Ireland</option>
    <option value="Israel"> Israel</option>
    <option value="Italy"> Italy</option>
    <option value="Jamaica"> Jamaica</option>
    <option value="Japan"> Japan</option>
    <option value="Jordan"> Jordan</option>
    <option value="Kazakhstan"> Kazakhstan</option>
    <option value="Kenya"> Kenya</option>
    <option value="Kiribati"> Kiribati</option>
    <option value="Kuwait"> Kuwait</option>
    <option value="Kyrgyzstan"> Kyrgyzstan</option>
    <option value="Lao People’s Democratic Republic"> Lao People’s Democratic Republic</option>
    <option value="Latvia"> Latvia</option>
    <option value="Lebanon"> Lebanon</option>
    <option value="Lesotho"> Lesotho</option>
    <option value="Liberia"> Liberia</option>
    <option value="Libya"> Libya</option>
    <option value="Liechtenstein"> Liechtenstein</option>
    <option value="Lithuania"> Lithuania</option>
    <option value="Luxembourg"> Luxembourg</option>
    <option value="Madagascar"> Madagascar</option>
    <option value="Malawi"> Malawi</option>
    <option value="Malaysia&nbsp;"> Malaysia&nbsp;</option>
    <option value="Maldives"> Maldives</option>
    <option value="Mali"> Mali</option>
    <option value="Malta"> Malta</option>
    <option value="Marshall Islands"> Marshall Islands</option>
    <option value="Mauritania"> Mauritania</option>
    <option value="Mauritius"> Mauritius</option>
    <option value="Mexico"> Mexico</option>
    <option value="Micronesia (Federated States of)"> Micronesia (Federated States of)</option>
    <option value="Monaco"> Monaco</option>
    <option value="Mongolia"> Mongolia</option>
    <option value="Montenegro&nbsp;"> Montenegro&nbsp;</option>
    <option value="Morocco"> Morocco</option>
    <option value="Mozambique"> Mozambique</option>
    <option value="Myanmar"> Myanmar</option>
    <option value="Namibia"> Namibia</option>
    <option value="Nauru"> Nauru</option>
    <option value="Nepal"> Nepal</option>
    <option value="Netherlands"> Netherlands</option>
    <option value="New Zealand"> New Zealand</option>
    <option value="Nicaragua"> Nicaragua</option>
    <option value="Niger"> Niger</option>
    <option value="Nigeria"> Nigeria</option>
    <option value="North&nbsp;Macedonia"> North&nbsp;Macedonia</option>
    <option value="Norway"> Norway</option>
    <option value="Oman"> Oman</option>
    <option value="Pakistan"> Pakistan</option>
    <option value="Palau"> Palau</option>
    <option value="Panama"> Panama</option>
    <option value="Papua New Guinea"> Papua New Guinea</option>
    <option value="Paraguay"> Paraguay</option>
    <option value="Peru"> Peru</option>
    <option value="Philippines"> Philippines</option>
    <option value="Poland"> Poland</option>
    <option value="Portugal"> Portugal</option>
    <option value="Qatar"> Qatar</option>
    <option value="Republic of Korea"> Republic of Korea</option>
    <option value="Republic of Moldova"> Republic of Moldova</option>
    <option value="Romania"> Romania</option>
    <option value="Russian Federation&nbsp;"> Russian Federation&nbsp;</option>
    <option value="Rwanda"> Rwanda</option>
    <option value="Saint Kitts and Nevis"> Saint Kitts and Nevis</option>
    <option value="Saint Lucia"> Saint Lucia</option>
    <option value="Saint Vincent and the Grenadines"> Saint Vincent and the Grenadines</option>
    <option value="Samoa"> Samoa</option>
    <option value="San Marino"> San Marino</option>
    <option value="Sao Tome and Principe"> Sao Tome and Principe</option>
    <option value="Saudi Arabia"> Saudi Arabia</option>
    <option value="Senegal"> Senegal</option>
    <option value="Serbia&nbsp;"> Serbia&nbsp;</option>
    <option value="Seychelles"> Seychelles</option>
    <option value="Sierra Leone"> Sierra Leone</option>
    <option value="Singapore"> Singapore</option>
    <option value="Slovakia&nbsp;"> Slovakia&nbsp;</option>
    <option value="Slovenia&nbsp;"> Slovenia&nbsp;</option>
    <option value="Solomon Islands"> Solomon Islands</option>
    <option value="Somalia"> Somalia</option>
    <option value="South Africa"> South Africa</option>
    <option value="South Sudan"> South Sudan</option>
    <option value="Spain"> Spain</option>
    <option value="Sri Lanka"> Sri Lanka</option>
    <option value="Sudan"> Sudan</option>
    <option value="Suriname"> Suriname</option>
    <option value="Swaziland"> Swaziland</option>
    <option value="Switzerland"> Switzerland</option>
    <option value="Sweden"> Sweden</option>
    <option value="Syria&nbsp;"> Syria&nbsp;</option>
    <option value="Tajikistan"> Tajikistan</option>
    <option value="Thailand"> Thailand</option>
    <option value="Timor Leste"> Timor Leste</option>
    <option value="Togo"> Togo</option>
    <option value="Tonga"> Tonga</option>
    <option value="Trinidad and Tobago"> Trinidad and Tobago</option>
    <option value="Tunisia"> Tunisia</option>
    <option value="Turkey"> Turkey</option>
    <option value="Turkmenistan"> Turkmenistan</option>
    <option value="Tuvalu"> Tuvalu</option>
    <option value="Uganda"> Uganda</option>
    <option value="Ukraine"> Ukraine</option>
    <option value="United Arab Emirates"> United Arab Emirates</option>
    <option value="United Kingdom"> United Kingdom</option>
    <option value="United of Republic of Tanzania"> United of Republic of Tanzania</option>
    <option value="United States of America"> United States of America</option>
    <option value="Uruguay"> Uruguay</option>
    <option value="Uzbekistan"> Uzbekistan</option>
    <option value="Vanuatu"> Vanuatu</option>
    <option value="Venezuela"> Venezuela</option>
    <option value="Vietnam"> Vietnam</option>
    <option value="Yemen&nbsp;"> Yemen&nbsp;</option>
    <option value="Zambia"> Zambia</option>
    <option value="Zimbabwe"> Zimbabwe</option>
</select>
    </div>
    <div class="col-md-6">
        <label for="">{{e2("E-Mail")}}: </label><input  type="text" value="" name="email" id="e-mail" class="form-control">
    </div>
    <div class="col-md-6">
        <label for="">{{e2("Phone")}}: </label><input  type="text" value="" name="phone" id="phone" class="form-control">
    </div>
        </div>
    </div>
    
</div>









      Notes:
      <textarea name="note" id="" cols="30" rows="10" class="form-control">{{$userDetail->note}}</textarea>
    <br>
      <button type="submit" class="btn btn-primary btn-noborder btn-rounded">Update</button>
  <br>
  <br>
  </form>  
  <script>
    $(function(){
        <?php 
        unset($userDetail->password);
        unset($userDetail->json);
        foreach($userDetail AS $alan => $deger) {
             ?>
             try {
                $(".detail [name='{{$alan}}']").val("{{$deger}}");
             } catch (error) {
                
             }
            
             <?php 
        } ?>
        $(".reemail").remove();
    });
</script>
  <?php } ?>

 <?php } ?>

@include("scripts.serialize")
 {{_col()}}
