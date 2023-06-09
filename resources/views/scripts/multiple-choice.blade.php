<script>
    $(function(){
        $(".multiple-choice .search").on("keyup", function(){
            var bu = $(this);
            var parent = bu.parent(); //tr
            var value = $(this).val().toLowerCase();
            parent.find('.dropdown-list .dropdown-item').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
            
        });
        $(".multiple-choice > input").on("click", function(e) {
            e.stopPropagation();
            $(this).parent().find('[data-toggle=dropdown]').dropdown('toggle');
        });

        $(".multiple-choice input[type='checkbox']").on("click", function(){

            var selected = [];
            var selector = $(this).parent().parent().find("input[type='checkbox']");
            var checkedSelector = $(this).parent().parent().find("input[type='checkbox']:checked");
            var parent = $(this).parent().parent().parent().parent().parent();
            var dataGroup = $(this).parent().attr("data-group");
            var dataGroupParent = $("." + dataGroup);
            var input = parent.find(".multiple-choice-input");

            var json = JSON.parse($(this).parent().attr("data-filter-value"));
            var affected = $(this).parent().parent().attr("affected");

            if(affected !== undefined) {
                affected = JSON.parse(affected);

                $.each(affected,function(key,value){
                    var replaceString = value;

                    $.each(json, function(resultKey, resultValue){
                        replaceString = replaceString.replace("{"+resultKey+"}",resultValue);
                    });
                    dataGroupParent.find("[name='"+key+"']").val(replaceString).trigger("blur");
                });
            }

            if(input.hasAttr("max")) {
                var max = input.attr("max");
                    if(checkedSelector.length>max) {
                        return false;
                    }
            }

            selector.each(function() {
                if($(this).is(":checked")) {
                    selected.push($(this).val());
                }
                
            });
            
            input.val(selected.join(input.attr("seperator"))).trigger("blur");
            //console.log(selected);
        });
        $(".multiple-choice .dropdown-toggle").on("click", function(){
            var parent = $(this).parent().parent();
            var input = parent.find("input[type='text']");
            var selected = input.val().split(input.attr("seperator"));
            parent.find("input[type='checkbox']").prop("checked", false);
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

