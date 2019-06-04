<div class="container">
  <div class="login-form-wrapper">
  <?php if ($login_error) : ?>
    <div class="alert alert-danger" role="alert">
      <?php echo $login_error; ?>
    </div>
  <?php endif; ?>
    <?php echo form_open('backend/validateLogin'); ?>
      <div class="form-group">
        <label for="email">Email address</label>
        <?php echo form_input([
          'type'  => 'email',
          'name'  => 'email',
          'id'    => 'email',
          'class' => 'form-control',
          'aria-describedby'=>'email',
          'placeholder' => 'Please ener your email...'
        ]); ?>
      </div>
      <div class="form-group">
        <label for="password">password</label>
        <?php echo form_password([
          'name'  => 'password',
          'id'    => 'emausernameil',
          'class' => 'form-control',
          'aria-describedby'=>'password',
          'placeholder' => 'Please ener your password...'
        ]); ?>
      </div>
    <?php echo form_input([
      'type'=>'submit', 
      'value'=>'Login',
      'class'=>'btn btn-primary'
    ]); ?>
    <?php echo form_close(); ?>
  </div>
</div>
