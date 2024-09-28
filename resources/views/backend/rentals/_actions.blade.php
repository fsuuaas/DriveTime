    @if($model->status->isBooked())
        <a href="#" id="clickModal" data-title="Cancel Booking"
           data-attr="{{ route('admin.rentals.cancel', $model->id) }}"
           data-btn-title="Cancel Booking" data-btn-color="btn-danger"
           class="btn btn-outline-danger clickBTN">
            <i class="bi bi-backspace" style="font-size: 12px"></i>
            Cancel</a>
    @endif

    @if($model->status->isBooked() || $model->status->isOngoing())
        <a class="btn btn-outline-warning clickBTN" href="#" id="clickModal"
           data-title="Edit Booking" data-attr="{{ route('admin.rentals.edit', $model->id) }}"
           data-btn-title="Edit Booking" data-btn-color="btn-success">
            <i class="bi bi-pencil-fill" style="font-size: 14px"></i> Edit</a>
    @endif

    <form action="{{ route('admin.rentals.destroy', $model) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-outline-danger clickBTN"
                onclick="return confirm('Are you sure you want to delete this car?');">
            <i class="bi bi-trash3" style="font-size: 14px"></i> Delete
        </button>
    </form>
    <style>
        .clickBTN{
            padding: 5px 10px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
