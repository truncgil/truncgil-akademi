<script>
    
    $(function(){
        $(".table-select").on("change", function(){
            var bu = $(this);
            var parent = bu.parent().parent(); //tr
            var affected = JSON.parse(bu.attr("affected"));
        //    var affectedKeys = Object.keys()
            var url = bu.attr("data-url");
            $.getJSON(url, {
                value: bu.val()
            }, function(result){
                $.each(affected,function(key,value){
                    //var value = d.
                    var replaceString = value;
                    //console.log(replaceString
                    $.each(result, function(resultKey, resultValue){
                        replaceString = replaceString.replace("{"+resultKey+"}",resultValue);
                    });
                    parent.find("[name='"+key+"']").val(replaceString).trigger("blur");
                });
            });
            
        });
    });
</script>