

<style>
                        /*
                        .profile-update  .new-password, .profile-update .reemail {
                            display:none;
                        }
                        */
                    </style>
                    <script>
                        $(function() {
                            $(".profile-update  .new-password, .profile-update .reemail").remove();
                            <?php $user = u()->toArray(); 
                            
                            foreach($user AS $name => $value) {
                                if($name!="password")  {  ?>
                                <?php if(!is_array($value))  { 
                                  ?>
                                   $(".profile-update [name='{{$name}}']").val("<?php echo $value ?>");  
                                 <?php } ?>
                                <?php 
                                } 
                            }
                            

                            
                            ?>
                            $(".profile-update [name='name']").attr("disabled","disabled");  
                          //  $(".profile-update [name='prefix']").attr("disabled","disabled");  
                            $(".profile-update [name='surname']").attr("disabled","disabled");  
                            $(".profile-update [name='email']").attr("disabled","disabled");  
                        });
                    </script>
                    <div class="block-content profile-update"> 
                        
                        <div class="result-ajax"></div>
						<form action="?<?php if(getisset("t")) echo "t=".get("t") . '&'; ?>ajax=profile-update" method="post" class="serialize">
							@csrf 
                            @include("admin.users.form")
                            {{__('Password')}} <small>(If you don't want to change it, leave it blank.)</small>
                            <input type="password" name="password" id="password" onblur="
                                if($(this).val()!='') {
                                    $('#password2').attr('required','required');
                                } else {
                                    $('#password2').removeAttr('required');
                                }" class="form-control" value="" />

                            {{e2("Retype Password")}}
                            <input type="password" name="" onkeyup="
                                if($(this).val()!='') {
                                    if($(this).val()!=$('#password').val()) {
                                        $('.submit').addClass('d-none');
                                        $('.notmatch').removeClass('d-none');
                                    } else {
                                        $('.submit').removeClass('d-none');
                                        $('.notmatch').addClass('d-none');
                                    }
                                }
                                " id="password2" class="form-control" value="" />
							<br />
                                <div class="alert alert-danger d-none notmatch">Passwords do not match</div>
							<button type="submit" class="btn btn-primary submit">{{__('Update')}}</button>

						</form>
                    </div>