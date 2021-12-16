<div class="d-flex flex-column justify-content-start mt-1">
    @forelse ($data_all_installment as $item)
        <div class="d-flex flex-column justify-content-start">
            <h5>Instalment {{ $item['count_installment'] }}</h5>
            <div class="container ml-2">
                <div class="row">
                  <p class="col-sm-4">Status</p>
                  <p class="col-sm-1">:</p>
                  <p class="col-sm-4">{{ $item['status'] }}</p>
                </div>
            </div>
            <div class="container ml-2">
                <div class="row">
                  <p class="col-sm-4">Ammount</p>
                  <p class="col-sm-1">:</p>
                  <p class="col-sm-4">{{ $item['ammount'] }}</p>
                </div>
            </div>
            <div class="container ml-2">
                <div class="row">
                  <p class="col-sm-4">Status</p>
                  <p class="col-sm-1">:</p>
                  <p class="col-sm-4">{{ $item['due_date'] }}</p>
                </div>
            </div>
        </div>
    @empty
        <h5>No data instalment</h5>
    @endforelse
</div>