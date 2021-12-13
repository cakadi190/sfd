<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Monthly Payment Confirmation</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="/dashboard/monthlyPaymentSuccess/{{ $userBorrower->id }}" method="POST">
    @csrf
    <div class="modal-body">
        <div class="d-flex flex-column justify-content-start mt-1">
          <label for="sequenceNumber" class="h6">Sequence Number</label>
          <input class="form-control" type="text" name="sequenceNumber" id="sequenceNumber" placeholder="Payment Sequence">
        </div>
        <div class="d-flex flex-column justify-content-start mt-4">
          <label for="paymentAmmount" class="h6">Ammount</label>
          <input class="form-control" type="text" name="paymentAmmount" id="paymentAmmount" placeholder="Payment Ammount">
        </div>
        <div class="d-flex flex-column justify-content-start mt-4">
            <label for="transferReceipt" class="h6">Transfer Receipt</label>
            <input type="file" class="form-control" id="transferReceipt" name="transferReceipt">
        </div>
        <div class="d-flex flex-column justify-content-start mt-4">
            <label for="paymentMethod" class="h6">Payment Method</label>
            <input class="form-control" type="text" name="paymentMethod" id="paymentMethod" placeholder="Payment Method">
        </div>
        <div class="d-flex flex-column justify-content-start mt-4">
            <label for="remark" class="h6">Remark</label>
            <textarea class="form-control" name="remark" id="remark" cols="30" rows="10" placeholder="Remark for this payment"></textarea>
        </div>
    </div>
    <div class="modal-footer">
      <a href="#" class="btn btn-primary" data-dismiss="modal">Cancel</a>
      <button type="submit" class="btn btn-primary">Confirm</button>
    </div>
</form>