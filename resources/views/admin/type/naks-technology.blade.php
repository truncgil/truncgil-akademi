<?php 
use App\Models\NaksCenter; 
use App\Models\WeldingMethod; 
use App\Models\NaksCertificate; 

$path = "admin.type.naks-technology";

?>
<div class="content">

    <div class="row">   
        <div class="col-12">
        <?php 
        
        if(getisset("add")) {
            $post = $_POST;
            unset($post['_token']);

            try {
                NaksCertificate::create($post);
                bilgi("Certificate has been created","success");
            } catch (\Throwable $th) {
                dump($th);
            }
            
        } 
        if(getisset("delete")) {
            NaksCertificate::where('id', get('delete'))->delete();
        }

        

        
        
        $naksCertificates = NaksCertificate::paginate(setting('row_count'));
        $naksCenters = NaksCenter::all();
        $welding_method = WeldingMethod::all();
        
        $tableName = "naks_certificates";

        $columns = table_columns($tableName);
        
        
        $columnsList = [];

        $datas = [
            'short_name' => [
                'data' => $naksCenters,
                'value' => 'center_no',
                'html' => ['center_no', 'center_name'],
                'type' => 'select',
                'multiple' => false
            ],
            'welding_method' => [
                'data' => $welding_method,
                'value' => 'ru_short_name',
                'html' => ['ru_short_name', 'iso_short_name', 'aws_short_name'],
                'type' => 'select',
                'multiple' => false
            ],
        ];

        foreach($columns AS $column) {
            $columnType = table_column_type($tableName, $column);
            if($column!="id") {
                $columnsList[] = [
                    'name' => $column,
                    'type' => isset($datas[$column]) ? $datas[$column]['type'] : $columnType,
                    'relation' => isset($datas[$column]) ? $datas[$column] : ''
                ];
            }
        }

       // dump($columnsList);



       
        
         ?>   
        </div>
        {{col("col-md-12","Certificates",0,[
            'export' => $tableName
            ])}} 
            <?php  ; ?>
            @include("components.excel-file-input")
            <div class="table-responsive">
                <table style="table-layout:fixed;width:300%" class="table table-sm table-bordered table-striped table-hover">
                        
                        <tr>
                            <?php foreach($columns AS $column)  { 
                              ?>
                             <th data-resizable-column-id="{{str_slug($column)}}">{{e2($column)}}</th> 
                             <?php } ?>
                             <th data-resizable-column-id="opt">{{e2("Opt")}}</th>
                        </tr>
                        <tr class="table-warning">
                            <form action="?add" method="post">
                                @csrf
                            
                            <th>#</th>
                            <?php foreach($columnsList AS $column)  {  
                                ?>
                                <th>
                                    @include("components.columns.{$column['type']}")
                                </th> 
                             <?php } ?>
                             <th><button class="btn btn-outline-success btn-sm"><i class="fa fa-plus"></i></button></th>
                             </form>

                        </tr>
                        
                        <?php foreach($naksCertificates AS $listData) {
                             ?>
                            <tr>
                                <td>{{$listData->id}}</td>
                                <?php foreach($columnsList AS $column)  { ?>
                                <td>
                                    @include("components.columns.{$column['type']}")
                                </td> 
                                <?php } ?>
                                <td>
                                    <a href="?delete={{$listData->id}}" {{delete_teyit()}} class="btn btn-outline-danger btn-sm"><i class="fa fa-remove"></i></a>
                                </td>
                            </tr>
                             <?php 
                        } ?>
                    
                </table>
                
            </div>
            <div class="row">
                <div class="block-content block-content-full block-content-sm">
                    {{$naksCertificates->appends($_GET)->links()}}
                </div>
            </div>
            
        
        {{_col()}}
        
        
    </div>
</div>