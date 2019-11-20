						<div class="clearfix"></div>
				</div>
				<!-- END CONTENT BODY -->
			</div>
		</div> 
		<!-- END CONTAINER -->
		<!-- BEGIN FOOTER -->
		<div class="page-footer">
			<div class="scroll-to-top">
				<i class="icon-arrow-up"></i>
			</div>
		</div>
		<!-- END FOOTER -->
	</div>
	<div class="quick-nav-overlay"></div>
	<script src="<?php echo base_url(); ?>/webroot/js/jquery.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>/webroot/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>/webroot/js/jquery.slimscroll.min.js" type="text/javascript"></script>
	
	<script src="<?php echo base_url(); ?>/webroot/js/bootstrap-switch.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>/webroot/js/moment.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>/webroot/js/daterangepicker.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>/webroot/js/app.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>/webroot/js/layout.min.js" type="text/javascript"></script>
	
	<script src="<?php echo base_url(); ?>/webroot/js/quick-sidebar.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>/webroot/js/quick-nav.min.js" type="text/javascript"></script>
	<script>
	$(document).ready(function(){ 
			$('[data-toggle="tooltip"]').tooltip();
		$("#message").on('keyup',function(){
			getchar(this);
		  });
		$("#message").on('keydown',function(){
			getchar(this);
		  });
		function getchar(e){
		  var a = $(e).val();
		  var len = a.length;
		  var message = Math.ceil(parseFloat(len/160));
			$(".Character").html(len);
			$(".message").html(message);
		}
	});
	</script>
	</body>
</html>