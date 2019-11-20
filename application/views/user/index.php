<div class="row"> 
	<div class="portlet light portlet-fit bordered">
		<div class="portlet-title">
			<div class="caption">
				<i class="icon-bubble font-dark"></i>
				<span class="caption-subject font-dark bold uppercase">User List</span>
			</div>
		</div>
		<div class="portlet-body">
			<div class="table-scrollable">
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th> # </th>
							<th>Name</th>
							<th>Email</th>
							<th>Role</th>
							<th>Contact Number</th>
							<th>SMS Credit</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							if(!empty($data)){
							$i=1;
							foreach($data as $item){ ?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $item->first_name.' '.$item->last_name; ?></td>
									<td><?php echo $item->email; ?></td>
									<td><?php echo ($item->role==1)?'Admin':'Customer'; ?></td>
									<td><?php echo ($item->contact_number!='')?$item->contact_number:'----'; ?></td>
									<td><?php echo $item->sms_credit; ?></td>
									<td><?php echo ($item->status==1)?'Active':'Inactive'; ?></td>
									<td>
										<a href="<?php echo site_url('user/edit/'.$item->id); ?>" class="btn btn-xs red"><i class="fa fa-edit"></i></a>
										<a href="<?php echo site_url('user/delete/'.$item->id); ?>" class="btn btn-xs blue"><i class="fa fa-trash"></i></a>
									</td>
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