@extends('admin.master')
@section("title","Modules")
@section("desc","Bu sayfada içerik türlerini yönetebilirsiniz")
@section('content')

<div class="content">
	<div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">{{__('Modules')}}</h3>
            <div class="block-options">
                <div class="block-options-item">
                    <a href="{{ url('admin/action/add/types') }}" class="btn btn-default"><i class="fa fa-plus"></i></a>
                </div>
            </div>
        </div>
        <div class="block-content">
            
            <div class="table-responsive">
               
                <table class="table table-striped table-hover table-bordered table-vcenter table-sm">
                    <thead>
                        <tr>
                            <th>{{__("Icon")}}</th>
                            <th>{{__("Icon Name")}}</th>
                            <th>{{__("Title")}}</th>
                            <th>{{__("Parent")}}</th>
                            <th>{{__("ID")}}</th>
                            <th>{{__("Order")}}</th>
                            <th>{{__("Full Control")}} </th>
                            <th>{{__("Write")}} </th>
                            <th>{{__("Read")}} </th>
                        <th>{{__("Modify")}} </th>
                            <th class="text-center" style="width: 100px;">{{__("İşlemler")}}</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($types AS $a)
                        <tr>
                            <td class="text-center">
                                
                                <img src="{{url("assets/icons/". $a->icon .".png")}}" width="24" alt="">
                            </td>
                            <td>
                            
                            <input type="text" name="icon" value="{{$a->icon}}" table="types" id="{{$a->id}}" class="icon form-control edit" /></td>
                            <td><input type="text" name="title" value="{{$a->title}}" table="types" id="{{$a->id}}" class="title{{$a->id}} form-control edit" /></td>
                            <td><input type="text" name="kid" value="{{$a->kid}}" table="types" id="{{$a->id}}" class="title{{$a->id}} form-control edit" /></td>
                            <td>
                            <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="btn btn-default" onclick="$.get('{{url('admin-ajax/slug?title='.$a->breadcrumb)}}'+$('.title{{$a->id}}').val(),function(d){
                                                                $('.slug{{$a->id}}').val(d).blur();
                                                            })"><i class="si si-refresh"></i></div>
                                                        </div>
                                                        <input type="text" name="slug" value="{{$a->slug}}" table="types" id="{{$a->id}}" class="slug{{$a->id}} form-control edit" />
                                                    </div>
                                
                                </td>
                            <td><input type="number" name="s" value="{{$a->s}}" table="types" id="{{$a->id}}" class="title{{$a->id}} form-control edit" /></td>
                        
                            <td>
                                <textarea name="full_control" table="types" id="{{$a->id}}" class="form-control edit" cols="30" rows="2">{{$a->full_control}}</textarea>
                            </td>
                            <td>
                                <textarea name="write" table="types" id="{{$a->id}}" class="form-control edit" cols="30" rows="2">{{$a->write}}</textarea>
                            </td>
                            <td>
                                <textarea name="read" table="types" id="{{$a->id}}" class="form-control edit" cols="30" rows="2">{{$a->read}}</textarea>
                            </td>
                            <td>
                                <textarea name="modify" table="types" id="{{$a->id}}" class="form-control edit" cols="30" rows="2">{{$a->modify}}</textarea>
                            </td>
                        
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{ url('admin/types/'. $a->slug) }}" type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">
                                        <i class="fa fa-link"></i>
                                    </a>
                                    <a href="{{ url('admin/types/'. $a->id.'/delete') }}" type="button" teyit="{{$a->title}} tipini silmek istediğinizden emin misiniz?" title="{{$a->title}} Silinecek!" class=" btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Delete">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
