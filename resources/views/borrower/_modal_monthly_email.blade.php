<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Monthly Statement Email</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="sendMonthlyEmail/{{ $borrower->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal-body">
        <div class="d-flex flex-column justify-content-start mt-1">
          <label for="subjectEmail" class="h6">Subject Email</label>
          <input class="form-control" type="text" name="subjectEmail" id="subjectEmail" placeholder="Subject for the Email">
        </div>
        <div class="d-flex flex-column justify-content-start mt-4">
          <label for="paymentSeq" class="h6">Payment Sequence</label>
          <input class="form-control" type="text" name="paymentSeq" id="paymentSeq" placeholder="Payment Sequence" value="{{ $borrower->payment_seq()->get()->last()->current_payment_seq }}" disabled>
        </div>
        <div class="d-flex flex-column justify-content-start mt-4">
            <label for="attachmentFile" class="h6">File Attachment</label>
            <input type="file" class="form-control" id="attachmentFile" name="attachmentFile">
        </div>
    </div>
    <div class="modal-footer">
      <a href="#" class="btn btn-primary" data-dismiss="modal">Cancel</a>
      <button type="submit" class="btn btn-primary">Send</button>
    </div>
</form>