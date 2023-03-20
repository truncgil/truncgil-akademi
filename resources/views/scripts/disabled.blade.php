<script>
    $(function(){
        $("[data-disabled-condition-column]").each(function(){
            var parent = $(this).parent().parent().parent(); // tr
            var column = $(this).attr("data-disabled-condition-column");
            var type = $(this).attr("data-disabled-condition-type");
            var value = $(this).attr("data-disabled-condition-value");
            var bu = $(this);
            console.log(column);
            console.log(type);
            console.log(value);
            var conditionColumn = parent.find("[name='"+column+"']");
            conditionColumn.on("blur", function(){
                switch (type) {
                    case "!=":
                        if($(this).val()!=value) {
                            bu.prop("disabled","disabled");
                            bu.parent().find(".dropdown").addClass("d-none");
                            console.log("disabled");
                        } else {
                            bu.removeAttr("disabled");
                            bu.parent().find(".dropdown").removeClass("d-none");
                        }
                        
                        break;
                    case "==":
                        if($(this).val()==value) {
                            bu.prop("disabled","disabled");
                            bu.parent().find(".dropdown").addClass("d-none");
                            console.log("disabled");
                        } else {
                            bu.removeAttr("disabled");
                            bu.parent().find(".dropdown").removeClass("d-none");
                        }
                        
                        break;
                
                    default:
                        break;
                }

            });
        });
    });
</script>