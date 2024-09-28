<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="car-card bg-light align-items-center">
            <div class="car-image">
                <img src="{{asset($rental->car->image)}}" alt="{{$rental->car->name}}" class="car-img img-fluid">
            </div>
            <div class="table-responsive" style="margin-top: 10px;">
                <table class="table table-bordered">
                    <tr>
                        <th>Brand</th>
                        <th>Model</th>

                    </tr>
                    <tr>
                        <td>{{$rental->car->brand}}</td>
                        <td>{{$rental->car->model}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="car-info ml-4">
            <!-- Table start -->
            <div class="table-responsive">
                <table class="table table-bordered align-middle m-0">
                    <thead>
                    <tr>
                        <th width="120px" class="text-center" colspan="2"><h3 class="car-name">{{$rental->car->name}}</h3></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th>Customer</th>
                        <td>{{$rental->user->name}}</td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>{{$rental->user->phone}}</td>
                    </tr>
                    <tr>
                        <th>Start</th>
                        <td>{{$rental->start_date}}</td>
                    </tr>
                    <tr>
                        <th>End</th>
                        <td>{{$rental->end_date}}</td>
                    </tr>
                    <tr>
                        <th>Total Price</th>
                        <td> ৳ {{$rental->total_cost}}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            {!! $rental->status->getLabelHTML() !!}
                        </td>
                    </tr>
                    </tbody>
                </table>

            </div>
            <!-- Table end -->
        </div>
    </div>
    <div class="col-lg-12">
        <form class="" id="cancelForm" action="{{route('customer.rentals.cancel', $rental->id)}}" method="post">
            @csrf
            <input type="hidden" name="rental_id" value="{{$rental->id}}">
            <div class="form-group">
                <label class="form-label">Cancel Reason <span class="text-red">*</span></label>
                <textarea class="form-control" rows="2" required name="remark"></textarea>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    function displaySelectedImage(event, elementId) {
        const selectedImage = document.getElementById(elementId);
        const fileInput = event.target;

        if (fileInput.files && fileInput.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                selectedImage.src = e.target.result;
            };

            reader.readAsDataURL(fileInput.files[0]);
        }
    }

    document.getElementById('saveChangesBtn').addEventListener('click', function() {
        document.getElementById('cancelForm').submit();
    });
</script>
