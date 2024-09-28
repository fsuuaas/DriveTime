<form id="carEditForm" class="" action="{{route('customer.rentals.update')}}" method="POST">
        @csrf
        <input type="hidden" name="rental_id" value="{{$rental->id}}" />
        <div class="d-flex justify-content-center">
            <div class="">
                <img id="selectedImage" src="{{ $rental->car->image ? asset($rental->car->image) : 'https://mdbootstrap.com/img/Photos/Others/placeholder.jpg' }}"
                     alt="example placeholder" style="width: 300px;" />
            </div>
            <div class="ml-5" style="margin-left: 30px">
                <div class="row">
                    <div class="col-sm-12 col-12 {{ $errors->has('name') ? ' has-error' : '' }}">
                        <div class="mb-3">
                            <label class="form-label">Booked Car Name <span class="text-red">*</span></label>
                            <select class="form-control" name="car_id" required>
                                @foreach($cars as $car)
                                    <option value="{{$car->id}}" {{ $car->id == $rental->car->id ? 'selected' : '' }}>{{$car->name}} | {{$car->model}} | {{$car->brand}}</option>
                                @endforeach
                            </select>
                        </div>
                        @if ($errors->has('car_id'))
                            <span class="help-block">
                                                        <strong>{{ $errors->first('car_id') }}</strong>
                                                    </span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-12 {{ $errors->has('start_date') ? ' has-error' : '' }}">
                        <div class="mb-3">
                            <label class="form-label">Start Date <span class="text-red">*</span></label>
                            <input type="date" class="form-control" name="start_date" value="{{$rental->start_date}}">
                        </div>
                        @if ($errors->has('start_date'))
                            <span class="help-block">
                                         <strong>{{ $errors->first('start_date') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="col-sm-6 col-12 {{ $errors->has('end_date') ? ' has-error' : '' }}">
                        <div class="mb-3">
                            <label class="form-label">End Date <span class="text-red">*</span></label>
                            <input type="date" class="form-control" name="end_date" value="{{$rental->end_date}}">
                        </div>
                        @if ($errors->has('end_date'))
                            <span class="help-block">
                                         <strong>{{ $errors->first('end_date') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
</form>
<script>
    document.getElementById('saveChangesBtn').addEventListener('click', function() {
        document.getElementById('carEditForm').submit();
    });
</script>
