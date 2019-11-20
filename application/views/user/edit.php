<div class="row"> 
	<div class="col-md-8 offset-md-2">
		<div class="portlet box blue bubt-margin">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-gift"></i>User Edit</div>
			</div>
			<div class="portlet-body form " style="display: block;">
				<?=  form_open('user/update/'.$data->id); ?>
					<div class="form-body">
						<div class="form-group">
							<label class="control-label">First Name</label>
							<input class="form-control" value="<?= $data->first_name ?>" type="text" placeholder="First Name" name="first_name" /> 
						</div>
						<div class="form-group">
							<label class="control-label">Last  Name</label>
							<input class="form-control" value="<?= $data->last_name ?>" type="text" placeholder="Last Name" name="last_name" /> 
						</div>
						<div class="form-group">
							<label class="control-label">Email</label>
							<input class="form-control " value="<?= $data->email ?>" type="text" placeholder="Email" name="email" /> 
						</div>
						<div class="form-group">
							<label class="control-label">Ccntact Number</label>
							<input class="form-control" type="text" value="<?= $data->contact_number ?>" placeholder="Contact Number" name="contact_number" /> 
						</div>
						<div class="form-group">
							<label class="control-label">Username</label>
							<input class="form-control" value="<?= $data->username ?>" type="text" autocomplete="off" placeholder="Username" name="username" />
						</div>
						<div class="form-group">
							<label class="control-label">Password</label>
							<input class="form-control" type="password" autocomplete="off" id="register_password" placeholder="Password" name="password" />
						</div>
						<div class="form-group">
							<label class="control-label">Confirm Password</label>
							<input class="form-control" type="password" autocomplete="off" placeholder="Re-type Your Password" name="password_confirm" /> 
						</div>
						
						<div class="form-group">
							<label class="control-label">Status</label>
							<?php 
								$attr = 'class="form-control"';
								$options = array(
								  '0'  => 'Inactive',
								  '1'    => 'Active'
								);
							?>
							<?= form_dropdown('status', $options, $data->status, $attr); ?>
						</div>
						
					</div>
					<div class="form-actions">
						<button type="submit" class="btn red">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>