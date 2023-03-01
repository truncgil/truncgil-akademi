<script>
    $(function(){
        $(".serialize").unbind();
        $(".serialize").on("submit",function(){
            for (var i in CKEDITOR.instances) {
                CKEDITOR.instances[i].updateElement();
            };
            var bu = $(this);
            bu.find(".right-fixed button").html("Processing...");
            bu.find("[type='submit']").html("Processing...");
            $.ajax({
                type : $(this).attr("method"),
                url : $(this).attr("action"),
                data : $(this).serialize(),
                success: function(d){
                    bu.find(".right-fixed button").html("Saved Changes");
                    bu.find("[type='submit']").html("Saved Changes");
                    $(".result-ajax").html(d);
                }

            });
            
            return false;

        });
    });
</script>