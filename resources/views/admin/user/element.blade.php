<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label>Name</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon11"><i class="ti-user"></i></span>
                </div>
                <input type="text" name="name" value="{{ isset($student->name)?$student->name:old('name') }}" class="form-control" placeholder="Enter Name" aria-describedby="basic-addon11">
            </div>
            @if($errors->has('name')) <span class="text-danger">{{ $errors->first('name') }}</span> @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label>Mobile</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon11"><i class="ti-mobile"></i></span>
                </div>
                <input type="text" name="mobile" value="{{ isset($student->name)?$student->name:old('mobile') }}" class="form-control" placeholder="Enter Mobile" required aria-describedby="basic-addon11">
            </div>
            @if($errors->has('mobile')) <span class="text-danger">{{ $errors->first('mobile') }}</span> @endif
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
                    <input name="admit_card" type="file" onchange="checkImageType(this)" accept="application/pdf" class="custom-file-input" id="inputGroupFile01">
                    <label class="custom-file-label font-weight-normal" for="inputGroupFile01">Choose file</label>
                </div>
            </div>
            @if($errors->has('admit_card')) <span class="text-danger">{{ $errors->first('admit_card') }}</span> @endif
        </div>
    </div>
</div>

@section('custom-js')
    <script>

        function checkImageType(e) {
            var file = e.files[0];
            var fileType = file["type"];
            var validFileTypes = "application/pdf";

            if (fileType !== validFileTypes) {
                alert("Invalid file type! Please chose pdf file.");
                $(e).closest('form').get(0).reset();
                return;
            }
        }
    </script>
@endsection
