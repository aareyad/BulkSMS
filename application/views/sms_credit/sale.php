<div class="row"> 
	<div class="col-md-8 offset-md-2">
		<div class="portlet box blue bubt-margin">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-gift"></i>Sale Credit</div>
			</div>
			<div class="portlet-body form " style="display: block;">
				<?=  form_open('sms_credit/sale',array('class'=>'bubt-form-width')); ?>
					<div class="form-body">
						<div class="form-group">
							<label class="control-label">User List</label>
							<?php 
								$attr = 'class="form-control"';
							?>
							<?= form_dropdown('client_id', $userlist,'', $attr); ?>
						</div>
						<div class="form-group">
							<label class="control-label">Amount</label>
							<input class="form-control" type="number" placeholder="Amount" name="amount" /> 
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