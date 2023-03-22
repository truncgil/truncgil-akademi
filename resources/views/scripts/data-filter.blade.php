<script>
    $(".dropdown-list .dropdown-item").on("click", function(){
        var parent = $(this).parent().parent().parent().parent().parent().parent(); //tr
        var value = $(this).text().trim();
        var filterColumns = $(this).attr("filter-columns").split(",");
        $.each(filterColumns, function(index, column){
            console.log(column);
            parent.find("." + column + " [data-filter-value]").addClass("d-none");
            parent.find("." + column + " [data-filter-value*='"+value+"']").removeClass("d-none");
        });
        
    });
</script>