<div class="row"> 
	<div class="col-md-8 offset-md-2">
		<div class="portlet box blue bubt-margin">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-gift"></i>Single SMS</div>
			</div>
			<div class="portlet-body form " style="display: block;">
				<?=  form_open('single_sms/send',array('class'=>'bubt-form-width')); ?>
					<div class="form-body">
						<div class="form-group">
							<label class="control-label">Number</label>
							<input class="form-control" type="number" placeholder="8801XXXXXXXXX" name="number" /> 
						</div>
						<div class="form-group">
							<label>Message</label>
							<textarea id="message" name="message" class="form-control" rows="3"></textarea>
							<span class="btn btn-default"><strong class="Character">0</strong>/<strong class="message">0</strong></span>
						</div>
						
					</div>
					<div class="form-actions">
						<button type="submit" class="btn red">Send</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>