<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>

$(document).ready(function(){
    $(".messages").animate({ scrollTop: $(document).height() }, "fast");

    $(document).on('click', '#searchUserBtn', function(e){
        e.preventDefault();
        var search = $('#searchUserBox').val();

        if(search != '')
        {
            // $.ajax({
            // url:<?php echo base_url(); ?>'search_user',
            // type: "post",
            // dataType: "json",
            // data:{
            //     search : search
            // },
            // success : function(data)
            // {
            //     console.log(data);
            // }
        // });
        alert(search);
        }
       

        
    });
});




</script>