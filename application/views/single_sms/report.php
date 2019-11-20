<div class="row"> 
	<div class="portlet light portlet-fit bordered">
		<div class="portlet-title">
			<div class="caption">
				<i class="icon-bubble font-dark"></i>
				<span class="caption-subject font-dark bold uppercase">SMS Credit Sale</span>
			</div>
		</div>
		<div class="portlet-body">
			<div class="table-scrollable">
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th> # </th>
							<th>Send By</th>
							<th>Number</th>
							<th>Message</th>
							<th>Send Time</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						<?php
							if(!empty($data)){
							$i=1;
							foreach($data as $item){ ?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $item->username; ?></td>
									<td><?php echo $item->number; ?></td>
									<td><a class="btn btn-xs green" data-toggle="tooltip" title="<?= $item->message ?>">Message</a></td>
									<td><?php echo $item->created_at; ?></td>
									<td><?= ($item->status==1)?'<span class="btn btn-xs green">Success<span>':'<span class="btn btn-xs red">Failed<span>'; ?></td>
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