<!-- Row start -->
<div class="row">
    <div class="col-sm-12 col-12">
        <div class="card-body">
            <form id="customerEditForm" class="" action="{{route('admin.users.update', $user)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-sm-12 col-12">
                        <div class="card-border">
                            <div class="card-border-body">
                                <div class="row">
                                    <div class="col-sm-6 col-12 {{ $errors->has('name') ? ' has-error' : '' }}">
                                        <div class="mb-3">
                                            <label class="form-label">Car Name <span class="text-red">*</span></label>
                                            <input type="text" class="form-control" placeholder="Customer Name" name="name" value="{{ $user->name }}">
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
                                            <input type="text" class="form-control" placeholder="doe@example.com" name="email" value="{{ $user->email}}" />
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
                                            <input type="text" class="form-control" placeholder="Phone" name="phone" value="{{ $user->phone }}">
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
                                            <textarea name="address" class="form-control" rows="3">{{$user->address}}</textarea>
                                        </div>
                                        @if ($errors->has('address'))
                                            <span class="help-block">
                                               <strong>{{ $errors->first('address') }}</strong>
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
    document.getElementById('saveChangesBtn').addEventListener('click', function() {
        document.getElementById('customerEditForm').submit();
    });
</script>
