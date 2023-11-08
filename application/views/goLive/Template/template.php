<!-- header -->
<?php echo @$_header; ?>

<div class="container-fluid">
  <div class="row">
    
    <!-- sidebar -->
     <?php echo @$_sidebar; ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <!-- content -->
           <?php echo @$_content; ?>
    </main>
  </div>
</div>
  
<!-- footer -->
 <?php echo @$_footer; ?>