<form id="carEditForm" class="" action="{{route('admin.cars.update', $car)}}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-sm-6 col-12">
                <div class="card-border">
                    <div class="card-border-title">General Information</div>
                    <div class="card-border-body">
                        <div class="row">
                            <div class="col-sm-6 col-12 {{ $errors->has('name') ? ' has-error' : '' }}">
                                <div class="mb-3">
                                    <label class="form-label">Car Name <span class="text-red">*</span></label>
                                    <input type="text" class="form-control" placeholder="Enter Car Name" name="name" value="{{$car->name}}">
                                </div>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                @endif
                            </div>
                            <div class="col-sm-6 col-12 {{ $errors->has('brand') ? ' has-error' : '' }}">
                                <div class="mb-3">
                                    <label class="form-label">Brand <span class="text-red">*</span></label>
                                    <input type="text" class="form-control" placeholder="Enter Car Brand" name="brand" value="{{$car->brand}}">
                                </div>
                                @if ($errors->has('brand'))
                                    <span class="help-block">
                                                        <strong>{{ $errors->first('brand') }}</strong>
                                                    </span>
                                @endif
                            </div>
                            <div class="col-sm-6 col-12 {{ $errors->has('model') ? ' has-error' : '' }}">
                                <div class="mb-3">
                                    <label class="form-label">Model <span class="text-red">*</span></label>
                                    <input type="text" class="form-control" placeholder="Enter Car Model" name="model" value="{{$car->model}}">
                                </div>
                                @if ($errors->has('model'))
                                    <span class="help-block">
                                                        <strong>{{ $errors->first('model') }}</strong>
                                                    </span>
                                @endif
                            </div>
                            <div class="col-sm-6 col-12 {{ $errors->has('year') ? ' has-error' : '' }}">
                                <div class="mb-3">
                                    <label class="form-label">Year <span class="text-red">*</span></label>
                                    <input type="number" class="form-control" placeholder="Enter Year of Manufacture" name="year" value="{{$car->year}}">
                                </div>
                                @if ($errors->has('year'))
                                    <span class="help-block">
                                                        <strong>{{ $errors->first('year') }}</strong>
                                                    </span>
                                @endif
                            </div>
                            <div class="col-sm-6 col-12 {{ $errors->has('car_type') ? ' has-error' : '' }}">
                                <div class="mb-3">
                                    <label class="form-label">Car Type <span class="text-red">*</span></label>
                                    <select class="form-control" name="car_type">
                                        <option value="Select Car Type">Select Car Type</option>
                                        <option value="SUV" {{$car->car_type == "SUV" ? 'selected' : ''}}>SUV</option>
                                        <option value="Sedan" {{$car->car_type == "Sedan" ? 'selected' : ''}}>Sedan</option>
                                    </select>
                                </div>
                                @if ($errors->has('car_type'))
                                    <span class="help-block">
                                                        <strong>{{ $errors->first('car_type') }}</strong>
                                                    </span>
                                @endif
                            </div>
                            <div class="col-sm-6 col-12 {{ $errors->has('daily_rent_price') ? ' has-error' : '' }}">
                                <div class="mb-3">
                                    <label class="form-label">Daily Rent Price <span class="text-red">*</span></label>
                                    <input type="number" class="form-control" step="0.01" placeholder="Enter Daily Rent Price" name="daily_rent_price" value="{{$car->daily_rent_price}}">
                                </div>
                                @if ($errors->has('daily_rent_price'))
                                    <span class="help-block">
                                                        <strong>{{ $errors->first('daily_rent_price') }}</strong>
                                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-12">
                <div class="card-border">
                    <div class="card-border-title">Car Image</div>
                    <div class="card-border-body">
                        <!--Image-->
                        <div>
                            <div class="mb-4 d-flex justify-content-center">
                                <img id="selectedImage" src="{{ $car->image ? asset($car->image) : 'https://mdbootstrap.com/img/Photos/Others/placeholder.jpg' }}"
                                     alt="example placeholder" style="width: 300px;" />
                            </div>
                            <div class="d-flex justify-content-center">
                                <div data-mdb-ripple-init class="btn btn-primary btn-rounded">
                                    <label class="form-label text-white m-1" for="customFile1">Change Image</label>
                                    <input type="file" class="form-control d-none" name="file" id="customFile1" onchange="displaySelectedImage(event, 'selectedImage')" />
                                </div>
                            </div>
                        </div>
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
