<div class="row"> 
	<div class="col-md-8 offset-md-2">
		<div class="portlet box blue bubt-margin">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-gift"></i>Bulk SMS</div>
			</div>
			<div class="portlet-body form " style="display: block;">
				<?=  form_open_multipart('bulk_sms/send',array('class'=>'bubt-form-width')); ?>
					<div class="form-body">
						<div class="form-group">
							<label for="exampleInputFile" class="control-label">File input</label>
							<input type="file" name="contactfile" id="exampleInputFile">
							<p class="help-block bubt-helight">Only CSV File Allowed and File Size 50KB </p>
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