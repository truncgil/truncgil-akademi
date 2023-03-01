@extends('admin.master')
<?php if(isset($c))   { 
 ?>
 <?php $slug = str_slug($c->title); ?>
 @section("title")
 
 <i class="fa fa-{{$c->icon}}"></i> {{@e2($c->title)}}
 @endsection
 @section("desc",@$c->title." ". __("türüne ait içerikler")) 
 <?php } ?>
@section('content')

@if(View::exists("admin.type.$slug")) 
		@include("admin.type.$slug")
@else 
	@include("admin.type.default")
@endif
@endsection
