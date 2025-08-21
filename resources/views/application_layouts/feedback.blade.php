<div class="modal fade" id="feedback-modal">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header text-center d-block p-5 border-bottom-0">
					<h2 class="modal-title">Feedback</h2>
					<button type="button" class="close position-absolute" style="right: 15px; top: 8px;" data-dismiss="modal">&times;</button>
				</div>

				<!-- Modal body -->
				<div class="modal-body">
					<form action="" autocomplete="off">
						<div class="form-group">
							<label for="fdbk-name">Name:</label>
							<input type="text" class="form-control" id="fdbk-name" placeholder="Enter name" name="fdbk-name">
						</div>
						<div class="form-group">
							<label for="fdbk-email">Email:</label>
							<input type="email" class="form-control" id="fdbk-email" placeholder="Enter email" name="fdbk-email">
						</div>
						<div class="form-group">
							<label for="fdbk-subject">Subject:</label>
							<select class="form-control" id="fdbk-subject" name="fdbk-subject">
								<option>Application issue</option>
								<option>Design issue</option>
								<option>Any other</option>
							</select>
						</div>
						<div class="form-group">
							<label for="fdbk-comment">Comment:</label>
							<textarea class="form-control" id="fdbk-comment" placeholder="Enter feedback" name="fdbk-comment" rows="5" style="resize: none;"></textarea>
						</div>

						<div class="text-center py-4">
							<button type="submit" class="btn btn-primary b-btn">Submit</button>
						</div>
						
					</form>
				</div>


			</div>
		</div>
	</div>