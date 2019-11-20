<div class="page-sidebar-wrapper"> 
	<div class="page-sidebar navbar-collapse collapse">
		<ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
			<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
			<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
			<li class="sidebar-toggler-wrapper hide">
				<div class="sidebar-toggler">
					<span></span>
				</div>
			</li>
			<?php $role =  $this->session->userdata('role'); ?>
			<li class="nav-item start active open">
				
				<a href="<?php echo site_url('dashboard'); ?>" class="nav-link nav-toggle">
					<span class="title">Dashboard</span>
				</a>
				
				<?php if($role==1): ?>
					<a href="<?php echo site_url('user'); ?>" class="nav-link nav-toggle">
						<span class="title">User</span>
					</a>
				<?php endif; ?>
				<?php if($role==1): ?>
					<a href="<?php echo site_url('sms_credit'); ?>" class="nav-link nav-toggle">
						<span class="title">SMS Credit</span>
					</a>
				<?php endif; ?>
				<a href="<?php echo site_url('single_sms'); ?>" class="nav-link nav-toggle">
					<span class="title">Single SMS</span>
				</a>
				<a href="<?php echo site_url('bulk_sms'); ?>" class="nav-link nav-toggle">
					<span class="title">Bulk SMS</span>
				</a>
				<a href="<?php echo site_url('single_sms/sms_report'); ?>" class="nav-link nav-toggle">
					<span class="title">SMS Report</span>
				</a>
				<a href="<?php echo site_url('send_mail'); ?>" class="nav-link nav-toggle">
					<span class="title">Send Mail</span>
				</a>
			</li>
		</ul>
	</div>
	<!-- END SIDEBAR -->
</div>