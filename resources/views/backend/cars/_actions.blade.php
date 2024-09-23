    <a href="#" id="clickModal" data-title="Show Car" data-attr="{{ route('admin.cars.show', $model) }}" class="btn btn-outline-primary">
        <i class="bi bi-eye"></i>
        View</a>
    <a class="btn btn-outline-warning" href="#" id="clickModal" data-title="Edit Car" data-attr="{{ route('admin.cars.edit', $model->id) }}"><i class="bi bi-pencil-fill"></i> Edit</a>

    <form action="{{ route('admin.cars.destroy', $model) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this car?');" style="margin-left: 10px; margin-top: -5px">
            <i class="bi bi-trash3" style="font-size: 15px"></i> Delete
        </button>
    </form>
