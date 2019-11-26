<?php 
if($this->session->userdata('lang') != '') {
 $this->lang->load('main', $this->session->userdata('lang'));
} else {
  $this->lang->load('main','english');
}?><header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo"  style="background-color:#f39c12">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>ADN</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" style="background-color:#f39c12">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
    
      <span class="logo-lg" style="float:right;margin-right:10px;margin-top:5px;">
      <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown">Language
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="<?=base_url();?>Auth/change_lang/english">English</a></li>
    <li><a href="<?=base_url();?>Auth/change_lang/french">French</a></li>
  </ul>
</div>
      </span>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <script>
    $(document).ready(function(){
      
    });
  </script>
  