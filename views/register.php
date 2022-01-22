<h1> Register </h1>

<form action="" method="post">
  <div class="form-group">
    <label>First Name </label>
    <input type="text" name="firstname" value="<?php echo $model->firstname ?>" class="form-control<?php echo $model->hasError('firstname') ? ' is-invalid' : '' ?>">
    <div class="invalid-feedback">
      <?php echo $model->getFirstError('firstname') ?>
    </div>
  </div>

  <div class="form-group">
    <label>Last Name </label>
    <input type="text" name="lastName" class="form-control">
  </div>

  <div class="form-group">
    <label>Password </label>
    <input type="password" name="password" class="form-control">
  </div>

  <div class="form-group">
    <label>Confirm Password </label>
    <input type="password" name="confirmPassword" class="form-control">
  </div>
  <div class="form-group">
    <label>email </label>
    <input type="text" name="email" class="form-control">
  </div>

  <div class="form-group">
    <label>body</label>
    <input type="body" name="body" class="form-control">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>