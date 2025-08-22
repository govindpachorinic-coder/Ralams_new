<div class="modal fade" id="login-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header text-center d-block p-5 border-bottom-0">
                <h2 class="modal-title">Log In</h2>
                <button type="button" class="close position-absolute" style="right: 15px; top: 8px;" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="dashboard.html" autocomplete="off" method="POST">
                    <div class="form-group">
                        <label for="login-email">Email:</label>
                        <input type="email" class="form-control" id="login-email" placeholder="Enter email" name="login-email">
                    </div>
                    <div class="form-group">
                        <label for="login-pwd">Password:</label>
                        <input type="password" class="form-control" id="login-pwd" placeholder="Enter password" name="login-pwd">
                    </div>
                    <div class="form-group form-check">
                        <label class="form-check-label" for="login-rem">
                            <input class="form-check-input" type="checkbox" id="login-rem" name="remember"> Remember me
                        </label>
                    </div>
                    <p class="text-right b-notreg">Don't have an account? <a href="" data-toggle="modal" data-target="#signup-modal" data-dismiss="modal">Sign Up</a></p>
                    <div class="text-center py-4">
                        <button type="submit" class="btn btn-primary b-btn">Log In</button>
                    </div>
                    
                </form>
            </div>


        </div>
    </div>
</div>