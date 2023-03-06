<!-- Page JS Plugins CSS -->
<link rel="stylesheet" href="{{ asset('assets/admin/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/js/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/js/plugins/jquery-tags-input/jquery.tagsinput.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/js/plugins/jquery-auto-complete/jquery.auto-complete.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/js/plugins/ion-rangeslider/css/ion.rangeSlider.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/js/plugins/ion-rangeslider/css/ion.rangeSlider.skinHTML5.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/js/plugins/dropzonejs/dist/dropzone.css') }}">

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

<link rel="stylesheet" id="css-main" href="{{ asset('assets/admin/css/pelinom6.min.css') }}">
<link rel="stylesheet" id="css-main" href="{{ asset('assets/admin/css/themes/pulse.min.css') }}">
<link rel="stylesheet" id="css-main" href="{{ asset('assets/admin/css/stellar.css?'.rand()) }}">


<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,400i,600,700">
<link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">


<link href="https://fonts.googleapis.com/css?family=Saira+Semi+Condensed:100,300,400,700,900&display=swap&subset=latin-ext" rel="stylesheet">

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/jquery.datetimepicker.min.css" />
<script src="{{ asset('assets/admin/js/pelinom6.core.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/pelinom6.app.min.js') }}"></script>

<script src="{{ asset('assets/admin/js/store.js') }}"></script>
<script src="{{ asset('assets/admin/js/resizable.js') }}"></script>

<link rel="stylesheet" href="{{ asset('assets/admin/js/resizable.css') }}">
<script>
    $(function(){
        $("table").resizableColumns({
            store: store
        });
    });
</script>

<link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" />
<script type="text/javascript" src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/fixedcolumns/3.3.1/js/dataTables.fixedColumns.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.19/sorting/datetime-moment.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.21/sorting/date-de.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/clusterize.js/0.18.0/clusterize.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/clusterize.js/0.18.0/clusterize.min.css" />

<script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>


<script src="{{ asset('assets/admin/js/plugins/dropzonejs/dropzone.min.js') }}"></script>
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

<script>
    $(function(){
        $("[name='orcid'],[name='ORCID No'],[name='ORCID_No'],#orcid").mask('AAAA-AAAA-AAAA-AAAA');
    });
</script>
<!-- use the latest version -->
<script lang="javascript" src="https://cdn.sheetjs.com/xlsx-latest/package/dist/xlsx.full.min.js"></script>
<script>
function ExportToExcel(type, fn, dl) {
    var elt = document.getElementById('excel');
    window.setTimeout(function(){
        var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
    return dl ?
        XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }) :
        XLSX.writeFile(wb, fn || ('{!! trim(strip_tags($__env->yieldContent('title'))) !!}.' + (type || 'xlsx')));
    }, 500);
    
}
</script>


<div class="script-zone">
    
    <script src="{{ asset('assets/admin/js/plugins/chartjs/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/plugins/slick/slick.min.js') }}"></script>
	<!-- include summernote css/js -->
	<script src="{{ asset('assets/admin/js/plugins/summernote/summernote-bs4.min.js') }}"></script>
	<link rel="stylesheet" href="{{ asset('assets/admin/js/plugins/summernote/summernote-bs4.css') }}">

	<script src="{{ asset('assets/admin/js/plugins/magnific-popup/jquery.magnific-popup.min.js') }}"></script>

	<link rel="stylesheet" href="{{ asset('assets/admin/js/plugins/magnific-popup/magnific-popup.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/admin/js/plugins/slick/slick.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/admin/js/plugins/slick/slick.css') }}">
	
	<!-- Page JS Plugins -->
        <!--<script src="{{ asset('assets/admin/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>-->
        <script src="{{ asset('assets/admin/js/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
        <script src="{{ asset('assets/admin/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
        <script src="{{ asset('assets/admin/js/plugins/select2/js/select2.full.min.js') }}"></script>
        <script src="{{ asset('assets/admin/js/plugins/jquery-tags-input/jquery.tagsinput.min.js') }}"></script>
        <script src="{{ asset('assets/admin/js/plugins/jquery-auto-complete/jquery.auto-complete.min.js') }}"></script>
        <script src="{{ asset('assets/admin/js/plugins/masked-inputs/jquery.maskedinput.min.js') }}"></script>
        <script src="{{ asset('assets/admin/js/plugins/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
        <script src="{{ asset('assets/admin/js/plugins/pwstrength-bootstrap/pwstrength-bootstrap.min.js') }}"></script>

        <script src="{{ asset('assets/admin/js/plugins/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/build/jquery.datetimepicker.full.min.js"></script>
		<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
		</div>