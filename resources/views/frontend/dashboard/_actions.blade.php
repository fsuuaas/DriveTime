    @if($model->status->isBooked())
        <a href="#" id="clickModal" data-title="Cancel Booking" data-attr="{{ route('customer.rentals.get-cancel', $model->id) }}"
           data-btn-title="Cancel Booking" data-btn-color="btn-danger"
           class="btn btn-outline-danger" style="max-width: 50px">
            <i class="bi bi-backspace" style="font-size: 14px"></i>
        </a>
    @endif

    @if($model->status->isBooked() || $model->status->isOngoing())
        <a class="btn btn-outline-warning" href="#" id="clickModal"
           data-title="Edit Booking" data-attr="{{ route('customer.rentals.edit', $model->id) }}"
           data-btn-title="Edit Booking" data-btn-color="btn-success" style="max-width: 50px">
            <i class="bi bi-pencil-fill" style="font-size: 14px"></i>
        </a>
    @endif

