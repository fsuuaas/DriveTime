    <a href="#" id="clickModal" data-title="Show Customer" data-attr="{{ route('admin.users.show', $model) }}" data-btn-title="Save Change" data-btn-color="btn-success" class="btn btn-outline-primary">
        <i class="bi bi-eye"></i>
        View</a>
    <a class="btn btn-outline-warning" href="#" id="clickModal" data-title="Edit Customer" data-attr="{{ route('admin.users.edit', $model->id) }}" data-btn-title="Save Changes" data-btn-color="btn-success"><i class="bi bi-pencil-fill"></i> Edit</a>

    <form action="{{ route('admin.users.destroy', $model) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this customer?');" style="margin-left: 10px; margin-top: -5px">
            <i class="bi bi-trash3" style="font-size: 15px"></i> Delete
        </button>
    </form>
