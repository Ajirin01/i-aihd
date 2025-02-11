<div class="login-box">
    <div class="logo-container">
        <a href="/"><img src="images/logo.png" alt="logo" width="100" height="100"></a>
    </div>
    <!-- /.register-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Create an account</p>

            <form action="/register_handler.php" method="post">
                <!-- Full Name -->
                <div class="input-group mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Full Name" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>

                <!-- Email -->
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                <!-- Password -->
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <!-- Confirm Password -->
                <div class="input-group mb-3">
                    <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="register" value="register">
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <p class="mt-3 mb-1 text-center">
                Already have an account? <a href="/login.php">Login</a>
            </p>
        </div>
        <!-- /.register-card-body -->
    </div>
</div>
