<div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-center">Chat Application Signup</h3>
                        <br>
                        <form action="<?php echo site_url('signup') ?>" method="POST">
                            <div class="mb-3">
                                <label class="form-label">First Name</label>
                                <input type="text" class="form-control" placeholder="First Name" name="firstname" value="<?php echo set_value('firstname'); ?>" autocomplete="off">
                                <small style="color:red;"><?php echo form_error('firstname'); ?></small>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Last Name</label>
                                <input type="text" class="form-control" placeholder="Last Name" name="lastname" value="<?php echo set_value('lastname'); ?>" autocomplete="off">
                                <small style="color:red;"><?php echo form_error('lastname'); ?></small>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control" placeholder="username" name="username" value="<?php echo set_value('username'); ?>" autocomplete="off">
                                <small style="color:red;"><?php echo form_error('username'); ?></small>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name="password">
                                <small style="color:red;"><?php echo form_error('password'); ?></small>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" name="cpassword">
                                <small style="color:red;"><?php echo form_error('cpassword'); ?></small>
                            </div>
                            <br>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-success">Sign Up</button>
                            </div>
                            <br>
                            <p class="text-center">You already have an account? <a href="<?php echo site_url('login'); ?>">Login</a></p>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    
</div>