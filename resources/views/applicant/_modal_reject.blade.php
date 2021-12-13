    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Rejection Email</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form action="reject-applicant/{{ $data['applicant']->id }}" method="POST">
        @csrf
        <div class="modal-body">
            <div class="d-flex flex-column justify-content-start mt-1">
              <label for="subjectEmail" class="h6">Subject Email</label>
              <input class="form-control" type="text" name="subjectEmail" id="emailSubject" id="subjectEmail" placeholder="Subject for the Email" value="{{ $data['is_rejected'] ? $data['subject_email'] : '' }}">
            </div>
            <div class="d-flex flex-column justify-content-start mt-4">
              <label for="bodyEmail" class="h6">Body Email</label>
              <textarea class="form-control" name="bodyEmail" id="bodyEmail" cols="30" rows="10" placeholder="Body for the Email">{{ $data['is_rejected'] ? $data['body_email'] : '' }}</textarea>
            </div>
        </div>
        <div class="modal-footer">
          <a href="#" class="btn btn-primary" data-dismiss="modal">Cancel</a>
          @if($data['is_rejected'])
            <button type="submit" class="btn btn-primary" disabled>Send</button>
          @else
            <button type="submit" class="btn btn-primary">Send</button>
          @endif
        </div>
    </form>