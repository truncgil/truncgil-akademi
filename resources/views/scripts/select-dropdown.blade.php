<script>
    
    $(function(){
        $(".select-dropdown .search").on("keyup", function(){
            var bu = $(this);
            var parent = bu.parent(); //tr
            var value = $(this).val().toLowerCase();
            parent.find('.dropdown-list .dropdown-item').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
            
        });
        $(".select-dropdown > input").on("click", function(e) {
            e.stopPropagation();
            $(this).parent().find('[data-toggle=dropdown]').dropdown('toggle');
        });
        $(".select-dropdown .dropdown-item").on("click", function(){
            var parent = $(this).parent().parent().parent().parent();
            var parentGroupName = parent.attr("data-group");
            var dataGroupParent = $("." + parentGroupName);
            var json = JSON.parse($(this).attr("data-filter-value"));
            var affected = $(this).parent().attr("affected");
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
            
            

            parent.find(".select-dropdown-input").val($(this).text().trim()).trigger("blur");
        });
    });
</script>