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
                    dump(get("command"));
                    $command = str_replace("\\","/",get("command"));
                    Artisan::call($command);
                    $output = Artisan::output();

                    ekle2([
                        'title' => $command,
                        'html' => $output,
                        'type' => 'ARTISAN',
                        'kid' => 'ARTISAN'
                    ],"contents");

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

            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th style="width:50%">Command</th>
                        <th>Output</th>
                    </tr>
                    <?php $query = db("contents")->where("type","ARTISAN")->orderBy("id","DESC")->simplePaginate(100);
                    foreach($query AS $q)  { 
                     
                     ?>
                     <tr>
                         <td><?php echo $q->title ?></td>
                         <td><?php echo $q->html ?></td>
                     </tr> 
                     <?php } ?>
                </table>
            </div>
            {{$query->links()}}
           
           
        </div>
    </div>
</div>
@endsection
