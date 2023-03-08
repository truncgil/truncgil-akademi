@extends('admin.master')
@section("title","Artisan")
@section("desc","")
@section('content')

<div class="content">
	<div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">{{__('Artisan Command Panel')}}</h3>
            <div class="block-options">
               
            </div>
        </div>
        <div class="block-content">
            <?php if(getisset("command")) {
                try {
                    Artisan::call(get("command"));
                    $output = Artisan::output();
                    dump($output);
                } catch (\Throwable $th) {
                    dump($th);
                }
                
            } ?>
            <form action="" method="get">
                
                <div class="input-group">
                    <input type="text" name="command" value="{{get("command")}}" required id="" class="form-control">
                    <button class="btn btn-primary"><i class="fa fa-cog"></i></button>
                </div>
            </form>
           
           
        </div>
    </div>
</div>
@endsection
