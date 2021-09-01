<input type="hidden" id="is_subscription_on" value="1">
<div class="modal fade" id="myModal1" class="windows">
<div class="modal-dialog modal-dialog-centered" role="document" id="myModals">
   <div class="modal-content">
      <div class="modal-header">
         <h6 class="modal-title">
            <!-- Subscribe to receive our emails and get a ₹100 discount on your next purchase on our website or any of our offline stores. -->
            Subscribe to our newsletters and get updates about our latest offers and schemes.
         </h6>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">×</span>
         </button>
      </div>
      <div class="modal-body">
         <div class="d-inline-block d-md-block " >
            <!--<form action="https://mashroostore.com/IN/subscribers/get_data" method="post" id="footer-form">-->
            <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
               <?php echo csrf_field(); ?>
               <div class="row">
                  <div class="col-md-12">
                     <label>First Name</label>
                     <input class="form-control" name="name" id="name" required>
                  </div>
               </div>
               <br>
               <div class="row">
                  <div class="col-md-12">
                     <label>Email</label>
                     <input class="form-control" name="email" id="email" required>
                  </div>
                  <div class="col-md-12">
                     <label>Phone</label>
                     <input class="form-control" name="mobile" id="mobile">
                     <br>
                  </div>
               </div>
               <input type="submit" class="btn btn-primary" value="Submit" style="float: right;">
            </form>
         </div>
      </div>
      <h4  style="text-align:center;">Valid for 3 Months</h4>
   </div>
</div>
</div>
<?php $__env->startPush('scripts'); ?>
<script>
   $(window).on('load', function(){
      var is_subscription_on = $('#is_subscription_on').val();
      if (is_subscription_on == 1){
      //$('#myModal1').modal('show');                  }
   });
</script>
<?php $__env->stopPush(); ?><?php /**PATH /home1/demo9tbi/utkarshelectricals.in/resources/views/site/partials/modal.blade.php ENDPATH**/ ?>