<div class="row"> 
	<div class="col-md-8 offset-md-2">
		<div class="portlet box blue bubt-margin">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-gift"></i>Send E-mail</div>
			</div>
			<div class="portlet-body form " style="display: block;">
				<?=  form_open('send_mail/send',array('class'=>'bubt-form-width')); ?>
					<div class="form-body">
						<div class="form-group">
							<label class="control-label">Email</label>
							<input class="form-control" type="email" name="email" /> 
						</div>
						<div class="form-group">
							<label class="control-label">Subject</label>
							<input class="form-control" type="text" name="subject" />
						</div>
						<div class="form-group">
							<label>Message</label>
							<textarea id="message" name="message" class="form-control" rows="3"></textarea>
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