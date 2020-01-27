<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label>Name</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon11"><i class="ti-user"></i></span>
                </div>
                <input type="text" name="name" value="{{ isset($student->name)?$student->name:old('name') }}" class="form-control" placeholder="Enter Name" required aria-describedby="basic-addon11">
                @if($errors->has('name')) <span class="text-danger">{{ $errors->first('name') }}</span> @endif
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label>Mobile</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon11"><i class="ti-mobile"></i></span>
                </div>
                <input type="text" name="mobile" value="{{ isset($student->name)?$student->name:old('mobile') }}" class="form-control" placeholder="Enter Mobile" required aria-describedby="basic-addon11">
                @if($errors->has('mobile')) <span class="text-danger">{{ $errors->first('mobile') }}</span> @endif
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label>Admit Card</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Upload</span>
                </div>
                <div class="custom-file">
                    <input name="admit" type="file" class="custom-file-input" id="inputGroupFile01">
                    <label class="custom-file-label font-weight-normal" for="inputGroupFile01">Choose file</label>
                </div>
                @if($errors->has('admit')) <span class="text-danger">{{ $errors->first('admit') }}</span> @endif
            </div>
        </div>
    </div>
</div>

