<div class="row"> 
	<div class="portlet light portlet-fit bordered">
		<div class="portlet-title">
			<div class="caption">
				<i class="icon-bubble font-dark"></i>
				<span class="caption-subject font-dark bold uppercase">SMS Credit Sale</span>
				
			</div>
			<div class="caption f-right">
				<a href="<?= base_url()?>sms_credit/sale_view" class="caption-subject bold uppercase btn btn-primary">Sale Credit</a>
			</div>
		</div>
		<div class="portlet-body">
			<div class="table-scrollable">
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th> # </th>
							<th>Client Name</th>
							<th>Sales By</th>
							<th>SMS Credit</th>
						</tr>
					</thead>
					<tbody>
						<?php
							if(!empty($data)){
							$i=1;
							foreach($data as $item){ ?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $item->first_name .' '. $item->last_name; ?></td>
									<td><?php echo $item->admin; ?></td>
									<td><?php echo $item->sale_credit; ?></td>
								</tr>
						<?php $i++; } ?>
						<?php }else {
							echo "NO Data Found";
						} ?>
							
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>