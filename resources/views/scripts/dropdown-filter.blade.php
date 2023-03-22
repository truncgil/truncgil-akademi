<script>
    $(function(){
        $(".dropdown-filter").on("click", function() {
            var parent = $(this).parent().parent().parent().parent();
            var column = $(this).attr("data-target-column");
            var filterColumn = $(this).attr("data-filter-column");
            var table = $(this).attr("data-table");
            var pattern = $(this).attr("data-pattern");
            var targetInput = parent.find("[name='"+column+"']");
            var targetInputSeperator = targetInput.attr("seperator");
            var targetValue = targetInput.val();
            var dropdownList = $(this).parent().find(".dropdown-list");
            if(targetInputSeperator === undefined) {
                targetInputSeperator = "";
            } else {
                targetValue = targetValue.split(targetInputSeperator);
            }


            $.getJSON("{{url("admin/detail/")}}" + "/" + table + "/" + filterColumn, {
                value : targetValue

            }, function(d) {
                dropdownList.html("");
                var addedItems = [];
                $.each(d, function(index,item) {
                    console.log(item);
                    var thisPattern = pattern;
                    
                    $.each(item, function(itemColumn, itemValue) {
                        console.log(itemColumn);
                        console.log(itemValue);
                        thisPattern = thisPattern.replace("{"+itemColumn+"}", itemValue);
                        

                    });
                    
                    if(!addedItems.includes(thisPattern)) {
                        var thisItem = '<label class="dropdown-item">'+thisPattern+'</label>';
                        dropdownList.append(thisItem);
                        addedItems.push(thisPattern);
                        dropdownList.find(".dropdown-item").on("click", function(){
                            var parent = $(this).parent().parent().parent().parent();
                            parent.find("input[type='text']").val($(this).text().trim()).trigger("blur");
                        });
                        
                    }
                    
                })
            })


            //console.log(parent);

        });
    });
</script>