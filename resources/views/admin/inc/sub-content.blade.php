<div class="block">

        <div class="block-header block-header-default">

            <h3 class="block-title">{{$c->title}} {{__('Contents')}}</h3>

            <div class="block-options">

                <div class="block-options-item">

                    <a href="{{ url('admin/contents/'. $c->slug.'/add') }}" class="btn-block-option"><i class="fa fa-plus"></i></a>

                </div>

            </div>

        </div>

		



        <div class="block-content">

			<div class="js-gallery ">

			<div class="table-responsive">

			<a name="alt"></a>

            <table class="table table-striped table-hover table-bordered table-vcenter">

                <thead>

                    <tr>

                        <th class="text-center" style="width: 50px;">{{__("Cover")}}</th>

                        <th>{{__("Title")}}</th>

						

                        <th>{{__("ID")}}</th>

                     <th>{{__("Category")}}</th>

                        <th class="d-none d-sm-table-cell" style="width: 15%;">{{__("Type")}}</th>

                        <th class="d-none d-sm-table-cell" style="width: 15%;">{{__("Columns")}}</th>

						<th>{{__("Status")}}</th>

						
						<th>{{__("Order")}}</th>

                        <th class="text-center" style="width: 100px;">{{__("Transactions")}}</th>

                    </tr>

                </thead>

                <tbody>

				<?php if($alt->count()==0) {
					 ?>
					 <script>
						$(function(){
							$('.ana-icerik').removeClass("hidden");
						});

					 </script>
					 
					 <?php 
				} ?>

				@foreach($alt AS $a)

					<tr class="" id="t{{$a->id}}">

                        <th class="text-center cover" scope="row">

						@if($a->cover!='')

						<a href="{{url('cache/large/'.$a->cover)}}" class="img-link img-link-zoom-in img-thumb img-lightbox"  target="_blank" >

							<img src="{{url('cache/small/'.$a->cover)}}" alt="" />

						</a>

						<hr />

						@endif

						<div class="btn-group">

						<button type="button" class="btn  btn-secondary btn-sm" onclick="$('#c{{$a->id}}').trigger('click');" title="{{__('Resim Yükle')}}"><i class="fa fa-upload"></i></button>

						@if($a->cover!='')

						<a teyit="{{__('Resmi kaldırmak istediğinizden emin misiniz')}}" title="Resmi kaldır" href="{{url('admin-ajax/cover-delete?id='.$a->id)}}" class="btn btn-secondary btn-sm "><i class="fa fa-times"></i></a>

						<a title="{{__('Resmi indir')}}" href="{{url('cache/download/'.$a->cover)}}" class="btn btn-secondary btn-sm"><i class="fa fa-download"></i></a>

						@endif

						</div>

						<form action="{{url('admin-ajax/cover-upload')}}" id="f{{$a->id}}"  class="hidden-upload" enctype="multipart/form-data" method="post">

							<input type="file" name="cover" id="c{{$a->id}}" onchange="$('#f{{$a->id}}').submit();" required />

							<input type="hidden" name="id" value="{{$a->id}}" />

							<input type="hidden" name="slug" value="{{$a->slug}}" />

							{{csrf_field()}}

						</form>

						</th>

                        <td><input type="text" name="title" value="{{$a->title}}" table="contents" id="{{$a->id}}" class="title{{$a->id}} form-control edit" /></td>

                        <td>

						<div class="input-group">

							<div class="input-group-prepend">

									<div class="btn btn-default" onclick="$.get('{{url('admin-ajax/slug?title='.$a->breadcrumb)}}'+encodeURI($('.title{{$a->id}}').val()),function(d){

										$('.slug{{$a->id}}').val(d).blur(); 

									})"><i class="si si-refresh"></i></div>

								</div>

								<input type="text" name="slug" value="{{$a->slug}}" table="contents" id="{{$a->id}}" class="slug{{$a->id}} form-control edit" />

							</div>

							

						</td>


						<td><input type="text" name="kid" value="{{$a->kid}}" table="contents" id="{{$a->id}}" class="form-control edit" /></td>

                        <td class="d-none d-sm-table-cell">

                          

							<select name="type" id="{{$a->id}}" class="form-control edit" table="contents" >

							@foreach(@$types AS $t)

								<option value="{{$t->title}}" @if($t->title==$a->type) selected @endif>{{$t->title}}</option>

							@endforeach

							</select>

                        </td>

						<td>

							<input type="text" name="fields" value="{{$a->fields}}" table="contents" id="{{$a->id}}" class="form-control edit" />

						</td>

						<td>

							<select name="y" id="{{$a->id}}" class="form-control edit" table="contents" >

								<option value="0" @if($a->y==0) selected @endif>{{__("Disabled")}}</option>

								<option value="1" @if($a->y==1) selected @endif>{{__("Enabled")}}</option>

							</select>

						</td>

 						<td><input type="number" name="s" value="{{$a->s}}" table="contents" id="{{$a->id}}" class="form-control edit" /></td>

                       <td class="text-center">

                            <div class="btn-group">

                                <a href="{{ url('admin/contents/'. $a->id) }}" class="btn btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">

                                    <i class="fa fa-edit"></i>

                                </a>
                                <?php if($a->slug!="") { ?>
                                <a title="{{$a->title}} preview its content" href="{{ url($a->slug) }}" target="_blank" class="btn btn-secondary js-tooltip-enabled d-none" data-toggle="tooltip" title="" data-original-title="Edit">

                                    <i class="fa fa-eye"></i>

                                </a>
                                <?php } ?>

                                <a href="{{ url('admin/contents/'. $a->id .'/delete') }}" ajax="#t{{$a->id}}" teyit="{{$a->title}} Are you sure you want to delete its content?" title="{{$a->title}} {{__('To be deleted!')}}" class=" btn  btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Delete">

                                    <i class="fa fa-times"></i>

                                </a>

                            </div>

                        </td>

                    </tr>

				@endforeach

				

                                     

                                    </tbody>

            </table>

		

			{{$alt->fragment('alt')->links() }}

			</div>

			</div>

        </div>

		

    </div>