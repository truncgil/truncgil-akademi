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
        $(".select-dropdown .dropdown-item").on("click", function(){
            var parent = $(this).parent().parent().parent().parent();
            var json = JSON.parse($(this).attr("data-filter-value"));
            var affected = $(this).attr("affected");
            $.each(affected,function(key,value){
                    //var value = d.
                    var replaceString = value;
                    //console.log(replaceString
                    $.each(result, function(resultKey, resultValue){
                        replaceString = replaceString.replace("{"+resultKey+"}",resultValue);
                    });
                    parent.find("[name='"+key+"']").val(replaceString).trigger("blur");
                });
            
            console.log(json);

            parent.find("input[type='text']").val($(this).text().trim()).trigger("blur");
        });
    });
</script>