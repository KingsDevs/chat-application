<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>

$(document).ready(function(){
    $(".messages").animate({ scrollTop: $(document).height() }, "fast");

    $(document).on('click', '#searchUserBtn', function(e){
        e.preventDefault();
        var search = $('#searchUserBox').val();

        if(search != '')
        {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('messaging/search_user'); ?>",
                data: {
                    search : search
                },
                dataType : "json",
                success: function(response){
                    console.log(response);
                }
            });
        }
        
        
        
    });
});




</script> 