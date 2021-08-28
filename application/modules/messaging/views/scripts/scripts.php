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
                success: function(data){
                    console.log(data);
                    var body = '';
                    var firstname = "<?php echo $this->session->userdata('userdata')['firstname'];?>";
                    var lastname = "<?php echo $this->session->userdata('userdata')['lastname'];?>";
                    var username = "<?php echo $this->session->userdata('userdata')['username'];?>";
                    var cname = firstname + lastname + username;
                    for(i in data)
                    {
                        var searched_cname = data[i]['firstname'] + data[i]['lastname'] + data[i]['username'];
                        if(searched_cname != cname)
                        {
                            body += '<li class="list-group-item d-flex justify-content-between align-items-start">';
                            body += '<div class="ms-2 me-auto">';
                            body += '<div class="fw-bold">';
                            body += data[i]['firstname'] +' '+ data[i]['lastname'];
                            body += '</div>';
                            body += '<a href="#" class="btn btn-primary btn-sm">Add</a>';
                            body += '</div>';
                            body += '</li>';
                        }
                    }
                    $('#searchedUsers').html(body);
                }
            });
        }
        
        
        
    });
});




</script> 