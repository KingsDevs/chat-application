<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script><script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<script>

$(document).ready(function(){
    $(".messages").animate({ scrollTop: $(document).height() }, "fast");

    $(document).on('click', '#searchUserBtn', function(e){
        e.preventDefault();
        var search = $('#searchUserBox').val();

        // $.ajax(
            
        // );

        $.ajax({
            url:<?php echo base_url(); ?>'search_user',
            type: "post",
            dataType: "json",
            data:{
                search : search
            },
            success : function(data)
            {
                console.log(data);
            }
        });
    });
});




</script>