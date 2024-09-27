    @if($model->status->isBooked())
        <a href="#" id="clickModal" data-title="Cancel Booking" data-attr="{{ route('admin.rentals.cancel', $model->id) }}" data-btn-title="Cancel Booking" data-btn-color="btn-danger" class="btn btn-outline-danger" style="padding: .5rem 1rem !important;">
            <i class="bi bi-backspace" style="font-size: 14px"></i>
            Cancel</a>
    @endif

    @if($model->status->isBooked() || $model->status->isOngoing())
        <a class="btn btn-outline-warning" href="#" id="clickModal" data-title="Edit Booking" data-attr="{{ route('admin.rentals.edit', $model->id) }}" data-btn-title="Edit Booking" data-btn-color="btn-success" style="padding: .5rem 1rem !important;"><i class="bi bi-pencil-fill"></i> Edit</a>
    @endif

    <form action="{{ route('admin.rentals.destroy', $model) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-outline-danger"  onclick="return confirm('Are you sure you want to delete this car?');" style="margin-top: -5px; padding: .5rem 1rem !important;">
            <i class="bi bi-trash3" style="font-size: 15px"></i> Delete
        </button>
    </form>
