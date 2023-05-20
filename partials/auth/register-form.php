<form action="inc/auth/register.php" method="post">
  <div class="form-input-group">
    <label class="form-label" for="user_login">Login</label>
    <input class="form-input" type="text" name="user_login" id="user_login" placeholder="my_epic_login" required>
  </div>
  <div class="form-input-group">
    <label class="form-label" for="user_email">Email</label>
    <input class="form-input" type="email" name="user_email" id="user_email" placeholder="example@test.com" required>
  </div>
  <div class="form-input-group">
    <label class="form-label" for="user_password">Password</label>
    <input class="form-input" type="password" name="user_password" id="user_password" required placeholder="*************">
  </div>
  <div class="form-input-group">
    <input type="submit" value="Register" class="btn" name="reg_user">
  </div>
</form>

<div>
  Have an account? <span class="login-btn"> Login now <span>
</div>