<form action="inc/auth/login.php" method="post">
  <div class="form-input-group">
    <label class="form-label" for="user_email">Email</label>
    <input class="form-input" type="email" name="user_email" id="user_email" placeholder="example@test.com" required>
  </div>
  <div class="form-input-group">
    <label class="form-label" for="user_password">Password</label>
    <input class="form-input" type="password" name="user_password" id="user_password" required placeholder="*************">
  </div>
  <div class="form-input-group">
    <input type="submit" value="Login" class="btn" name="log_user">
  </div>
</form>

<div>
  Don't have an account? <span class="register-btn"> Register now <span>
</div>