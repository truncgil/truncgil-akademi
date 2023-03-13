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
            parent.find("input[type='text']").val($(this).text().trim()).trigger("blur");
        });
    });
</script>