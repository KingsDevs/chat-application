<div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                    <?php if($this->session->flashdata('status') !== NULL) : ?>
                        <div class="alert alert-warning" role="alert">
                            <?php echo $this->session->flashdata('status'); ?>
                            <?php $this->session->set_flashdata('status', NULL); ?>
                        </div>
                    <?php endif ; ?>
                        <h3 class="card-title text-center">Chat Application Login</h3>
                        <br>
                        <form action="<?php echo site_url('login') ?>" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control" placeholder="username" name="username">
                                <small style="color:red;"><?php echo form_error('username'); ?></small>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name="password">
                                <small style="color:red;"><?php echo form_error('password'); ?></small>
                            </div>
                            <br>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-success">Login</button>
                            </div>
                            <br>
                            <p class="text-center">You don't have an account? <a href="<?php echo site_url('signup'); ?>">Sign Up</a></p>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    
</div>