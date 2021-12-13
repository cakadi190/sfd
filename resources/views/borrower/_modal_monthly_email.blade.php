<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Monthly Email Reminder</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="sendMonthlyEmail/{{ $userBorrower->id }}" method="POST">
    @csrf
    <div class="modal-body">
        <div class="d-flex flex-column justify-content-start mt-1">
          <label for="subjectEmail" class="h6">Subject Email</label>
          <input class="form-control" type="text" name="subjectEmail" id="subjectEmail" placeholder="Subject for the Email">
        </div>
        <div class="d-flex flex-column justify-content-start mt-4">
          <label for="loanPeriod" class="h6">Loan Period</label>
          <input class="form-control" type="text" name="loanPeriod" id="loanPeriod" placeholder="Loan Period Payment">
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