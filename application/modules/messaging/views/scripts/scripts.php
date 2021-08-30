<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="<?php echo base_url('/node_modules/socket.io/client-dist/socket.io.js'); ?>"></script>

<script>

$(document).ready(function(){
    $(".messages").animate({ scrollTop: $(document).height() }, "fast");

    $(document).on('click', '#searchUserBtn', function(e){
        e.preventDefault();
        var search = $('#searchUserBox').val();

        if(search != '')
        {
            $.ajax({
                type: "GET",
                url: "<?php echo base_url('messaging/search_user'); ?>",
                data: {
                    search : search
                },
                dataType : "json",
                success: function(data){
                    console.log(data);
                    var body = '';
                    //var user_id = "<?php echo $this->session->userdata('userdata')['user_id'];?>";
                    var firstname = "<?php echo $this->session->userdata('userdata')['firstname'];?>";
                    var lastname = "<?php echo $this->session->userdata('userdata')['lastname'];?>";
                    var username = "<?php echo $this->session->userdata('userdata')['username'];?>";
                    var imgpath = "<?php echo base_url("/assets/uploads/profile");?>/";
                    var cname = firstname + lastname + username;
                    for(i in data)
                    {
                        var searched_cname = data[i]['firstname'] + data[i]['lastname'] + data[i]['username'];
                        if(searched_cname != cname)
                        {
                            body += '<li class="list-group-item d-flex justify-content-between align-items-start">';
                            body += '<img src="' + imgpath + data[i]['profile_pic'] + '" style="width:5em;"  class="float-start" alt="...">';
                            body += '<div class="ms-2 me-auto">';
                            body += '<div class="fw-bold">';
                            body += data[i]['firstname'] +' '+ data[i]['lastname'];
                            body += '</div>';
                            body += '<button class="btn btn-primary btn-sm addContactBtn" value="'+data[i]['user_id']+'">Add</button>';
                            body += '</div>';
                            body += '</li>';
                        }
                    }
                    
                    $('#searchedUsers').html(body);
                    
                }
            });
            console.log('adas');
        }
        
        
        
    });

    $(document).on('click', '.addContactBtn', function(e){
        var user_id = $(this).val();
        
        const addbtn = $(this);
        
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('messaging/add_contact'); ?>",
            data: {
                user_id : user_id
            },
            dataType: "json",
            success: function (data) {
                console.log(data);
                addbtn.replaceWith( "<small>requested</small>" );
                //const socket = io.connect( '<?php echo base_url(); ?>');

            }
        });
    });
});




</script> 