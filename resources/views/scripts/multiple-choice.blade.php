<script>
    $(function(){
        $(".multiple-choice input[type='checkbox']").on("click", function(){

            var selected = [];
            var selector = $(this).parent().parent().find("input[type='checkbox']");
            var parent = $(this).parent().parent().parent().parent();
            selector.each(function() {
                if($(this).is(":checked")) {
                    selected.push($(this).val());
                }
                
            });
            var input = parent.find("input[type='text']");
            input.val(selected.join(input.attr("seperator"))).trigger("blur");
            //console.log(selected);
        });
        $(".multiple-choice .dropdown-toggle").on("click", function(){
            var parent = $(this).parent().parent();
            var input = parent.find("input[type='text']");
            var selected = input.val().split(input.attr("seperator"));
            console.log(selected);
            $.each(selected, function(e,i) {
                parent.find("input[type='checkbox'][value='"+i+"']").prop("checked", true);
            });
        });
        /*
        $(".multiple-choice input[type='text']").on("click", function(){

            var parent = $(this).parent();
            parent.find('[data-toggle=dropdown]').dropdown('toggle');
            //console.log(selected);
        });
        */
        $(document).on('click', 'someyourContainer .dropdown-menu', function (e) {
            e.stopPropagation();
        });
        
    });
</script>

