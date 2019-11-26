

  <?php  
if($this->session->userdata('lang') != '') {
 $this->lang->load('main', $this->session->userdata('lang'));
} else {
  $this->lang->load('main','english');
}?><!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?=$this->lang->line('Manage');?>
        <small><?=$this->lang->line('Users');?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> <?=$this->lang->line('Home');?></a></li>
        <li class="active"><?=$this->lang->line('Users');?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">
          
          <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('success'); ?>
            </div>
          <?php elseif($this->session->flashdata('error')): ?>
            <div class="alert alert-error alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('error'); ?>
            </div>
          <?php endif; ?>

          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><?=$this->lang->line('Add User');?></h3>
            </div>
            <form role="form" action="<?php base_url('users/create') ?>" method="post">
              <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                <div class="box-body">

<?php echo validation_errors(); ?>

<div class="form-group">
  <label for="groups"><?=$this->lang->line('Groups');?></label>
  <select class="form-control" id="groups" name="groups">
    <option value=""><?=$this->lang->line('Select Groups');?></option>
    <?php foreach ($group_data as $k => $v): ?>
      <option value="<?php echo $v['id'] ?>"><?php echo $v['group_name'] ?></option>
    <?php endforeach ?>
  </select>
</div>

<div class="form-group">
  <label for="groups"><?=$this->lang->line('Store');?></label>
  <select class="form-control" id="store" name="store">
    <option value=""><?=$this->lang->line('Select Store');?></option>
    <?php foreach ($store_data as $k => $v): ?>
      <option value="<?php echo $v['id'] ?>"><?php echo $v['name'] ?></option>
    <?php endforeach ?>
  </select>
</div>

<div class="form-group">
  <label for="username"><?=$this->lang->line('Username');?></label>
  <input type="text" class="form-control" id="username" name="username" placeholder="<?=$this->lang->line('Username');?>" autocomplete="off">
</div>

<div class="form-group">
  <label for="email"><?=$this->lang->line('Email');?></label>
  <input type="email" class="form-control" id="email" name="email" placeholder="<?=$this->lang->line('Email');?>" autocomplete="off">
</div>

<div class="form-group">
  <label for="password"><?=$this->lang->line('Password');?></label>
  <input type="password" class="form-control" id="password" name="password" placeholder="<?=$this->lang->line('Password');?>" autocomplete="off">
</div>

<div class="form-group">
  <label for="cpassword"><?=$this->lang->line('Confirm Password');?></label>
  <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="<?=$this->lang->line('Confirm Password');?>" autocomplete="off">
</div>

<div class="form-group">
  <label for="fname"><?=$this->lang->line('First Name');?></label>
  <input type="text" class="form-control" id="fname" name="fname" placeholder="<?=$this->lang->line('First Name');?>" autocomplete="off">
</div>

<div class="form-group">
  <label for="lname"><?=$this->lang->line('Last Name');?></label>
  <input type="text" class="form-control" id="lname" name="lname" placeholder="<?=$this->lang->line('Last Name');?>" autocomplete="off">
</div>

<div class="form-group">
  <label for="phone"><?=$this->lang->line('Phone');?></label>
  <input type="text" class="form-control" id="phone" name="phone" placeholder="<?=$this->lang->line('Phone');?>" autocomplete="off">
</div>

<div class="form-group">
  <label for="gender"><?=$this->lang->line('Gender');?></label>
  <div class="radio">
    <label>
      <input type="radio" name="gender" id="male" value="1">
      <?=$this->lang->line('Male');?>
    </label>
    <label>
      <input type="radio" name="gender" id="female" value="2">
      <?=$this->lang->line('Female');?>
    </label>
  </div>
</div>

</div>

<div class="box-footer">
                <button type="submit" class="btn btn-primary btn-block"><?=$this->lang->line('Save_changes');?></button>
                <a href="<?php echo base_url('users/') ?>" class="btn btn-warning"><?=$this->lang->line('Back');?></a>
              </div>
                </div>
                <div class="col-lg-2"></div>
              </div>
              <!-- /.box-body -->

              
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!-- col-md-12 -->
      </div>
      <!-- /.row -->
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script type="text/javascript">
  // $(document).ready(function() {
  //   $("#groups").select2();

  //   $("#userMainNav").addClass('active');
  //   $("#createUserSubNav").addClass('active');
    
  // });
</script>
