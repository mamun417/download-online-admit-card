<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{ asset('assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- apps -->
<script src="{{ asset('dist/js/app.min.js') }}"></script>
<script src="{{ asset('dist/js/app.init.js') }}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{ asset('assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
<script src="{{ asset('assets/extra-libs/sparkline/sparkline.js') }}"></script>

<!--Menu sidebar -->
<script src="{{ asset('dist/js/sidebarmenu.js') }}"></script>
<!--Custom JavaScript -->
<script src="{{ asset('dist/js/custom.min.js') }}"></script>
<!--This page JavaScript -->

{{--Summernote editor--}}
<script src="{{ asset('assets/libs/summernote/dist/summernote-bs4.min.js') }}"></script>

{{--toastr alert--}}
<script src="{{ asset('assets/libs/toastr/build/toastr.min.js') }}"></script>

{{--Sweet Alert--}}
<script src="{{ asset('assets/libs/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('assets/libs/sweetalert2/sweet-alert.init.js') }}"></script>

<script>
    $(function(){

         toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 3000
        };

        //Toastr message
        @if(session('tSuccessMsg'))
            toastr.success('{{ session('tSuccessMsg') }}');
        @endif

        @if(session('tErrorMsg'))
            toastr.error('{{ session('tSuccessMsg') }}');
        @endif


        // Sweet alert
        @if(session('successMsg'))
            Swal.fire("Successful!", "{{ session('successMsg') }}", "success");
        @endif

        @if(session('errorMsg'))
            Swal.fire("Warning!", "{{ session('error') }}", "error");
        @endif
    });

    //show confirm message when delete table row
    function deleteRow(rowId) {

        Swal.fire({
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this!',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#dd3333',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                document.getElementById('delete-form'+rowId).submit();
            }
        })
    }
</script>
