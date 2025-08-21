<div class="b-bg-image py-5" style="padding-bottom: 200px!important">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex b-heading-sec">
                <div class="align-self-center pr-5 b-head-in">
                    <h1 class="text-right mt-5 b-left-head">Rajasthan Agriculture Land Allotment Management System <br> (Tagline goes here)</h1>
                </div>
            </div>


            <div class="col-lg-6 b-login-sec">
                <div class="d-block px-5 pt-5 pb-4 border-bottom-0">
                    <h2 class="b-login-head">Log In</h2>
                </div>

                <div class="">
                    <form action="{{ route('dashboard') }}" autocomplete="off" method="GET" class="px-5">
                        <div class="form-group ">
                            <label for="login-email-1" class="text-white">Email:</label>
                            <input type="email" class="form-control" id="login-email-1" placeholder="Enter email" name="login-email">
                        </div>
                        <div class="form-group">
                            <label for="login-pwd-1" class="text-white">Password:</label>
                            <input type="password" class="form-control" id="login-pwd-1" placeholder="Enter password" name="login-pwd">
                        </div>
                        <div class="form-group custom-control custom-checkbox">
                            <input class="custom-control-input" id="login-rem-1" type="checkbox" name="remember"> 
                            <label class="custom-control-label text-white" for="login-rem-1">Remember me</label>
                        </div>


                        <!-- <p class="text-right b-notreg ">Don't have an account? <a href="">Sign Up</a></p> -->
                        <div class="text-center py-4">
                            <button type="submit" class="btn btn-primary b-btn">Log In</button>
                        </div>
                        
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>