
 <?php 
if($this->session->userdata('lang') != '') {
 $this->lang->load('main', $this->session->userdata('lang'));
} else {
  $this->lang->load('main','english');
}?> <footer class="main-footer">
    <div class="pull-right hidden-xs">
        </div>
    <strong>Copyright &copy; 2019 - <?php echo date('Y'); ?>.</strong> All rights
    reserved for Ghafor Yaqubi
  </footer>

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

</body>
</html>
