<!-- Row start -->
<div class="row">
    <div class="col-sm-12 col-12">
        <div class="card-body">
            <form id="carAddForm" class="" action="{{route('admin.rentals.store')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-12 col-12">
                        <div class="card-border">
                            <div class="card-border-title">General Information</div>
                            <div class="card-border-body">
                                <div class="row">
                                    <div class="col-sm-6 col-12 {{ $errors->has('name') ? ' has-error' : '' }}">
                                        <div class="mb-3">
                                            <label class="form-label">Car Name <span class="text-red">*</span></label>
                                            <input type="text" class="form-control" placeholder="Customer Name" name="name">
                                        </div>
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-sm-6 col-12 {{ $errors->has('email') ? ' has-error' : '' }}">
                                        <div class="mb-3">
                                            <label class="form-label">Email <span class="text-red">*</span></label>
                                            <input type="text" class="form-control" placeholder="doe@example.com" name="email">
                                        </div>
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-sm-12 col-12 {{ $errors->has('phone') ? ' has-error' : '' }}">
                                        <div class="mb-3">
                                            <label class="form-label">Phone <span class="text-red">*</span></label>
                                            <input type="text" class="form-control" placeholder="Phone" name="phone">
                                        </div>
                                        @if ($errors->has('phone'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-sm-12 col-12 {{ $errors->has('address') ? ' has-error' : '' }}">
                                        <div class="mb-3">
                                            <label class="form-label">Address <span class="text-red">*</span></label>
                                            <textarea name="address" class="form-control" rows="3"></textarea>
                                        </div>
                                        @if ($errors->has('address'))
                                            <span class="help-block">
                                               <strong>{{ $errors->first('address') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="col-sm-6 col-12 {{ $errors->has('start_date') ? ' has-error' : '' }}">
                                        <div class="mb-3">
                                            <label class="form-label">Start Date<span class="text-red">*</span></label>
                                            <input type="date" class="form-control" placeholder="Start date" name="start_date">
                                        </div>
                                        @if ($errors->has('start_date'))
                                            <span class="help-block">
                                                 <strong>{{ $errors->first('start_date') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-sm-6 col-12 {{ $errors->has('end_date') ? ' has-error' : '' }}">
                                        <div class="mb-3">
                                            <label class="form-label">End Date<span class="text-red">*</span></label>
                                            <input type="date" class="form-control" placeholder="End date" name="end_date">
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
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Row end -->
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
        document.getElementById('carAddForm').submit();
    });
</script>
