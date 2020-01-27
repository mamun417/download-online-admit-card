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
<script src="{{ asset('dist/js/app-style-switcher.js') }}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{ asset('assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
<script src="{{ asset('assets/extra-libs/sparkline/sparkline.js') }}"></script>
<!--Wave Effects -->
<script src="{{ asset('dist/js/waves.js') }}"></script>
<!--Menu sidebar -->
<script src="{{ asset('dist/js/sidebarmenu.js') }}"></script>
<!--Custom JavaScript -->
<script src="{{ asset('dist/js/custom.min.js') }}"></script>
<!--This page JavaScript -->
<!--c3 charts -->
<script src="{{ asset('assets/extra-libs/c3/d3.min.js') }}"></script>
<script src="{{ asset('assets/extra-libs/c3/c3.min.js') }}"></script>
<script src="{{ asset('assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js') }}"></script>
<script src="{{ asset('assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js') }}"></script>

{{--Knob Chart--}}
<script src="{{ asset('assets/extra-libs/knob/jquery.knob.min.js') }}"></script>

{{--Summernote editor--}}
<script src="{{ asset('assets/libs/summernote/dist/summernote-bs4.min.js') }}"></script>

{{--Switch Button--}}
<script src="{{ asset('assets/libs/bootstrap-switch/dist/js/bootstrap-switch.min.js') }}"></script>

{{--Sweet Alert--}}
<script src="{{ asset('assets/libs/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('assets/libs/sweetalert2/sweet-alert.init.js') }}"></script>

<script>
    $(function()
    {
        // Sweet alert
        @if(session('successMsg'))
        Swal.fire("Successful!", "{{ session('successMsg') }}", "success");
        @endif

        @if(session('error'))
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
