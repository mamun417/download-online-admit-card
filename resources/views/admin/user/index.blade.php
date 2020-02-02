@extends('admin.layouts.app')

@section('custom-meta')
    <title>Users - {{ env('APP_NAME', 'Project Name') }}</title>
@endsection

@section('content')

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Users</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <a href="{{ route('admin.users.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Add New User</a>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="table-responsive">
                            <div class="col-sm-12">
                                <form action="{{ route('admin.users.index') }}" method="get" class="">

                                    <div class="row">
                                        <div class="form-group mr-1">
                                            Records Per Page
                                            <select name="perPage" id="perPage" onchange="submit()" class="form-control" style="width: 115px;">
                                                <option value="10"{{ request('perPage') == 10 ? ' selected' : '' }}>10</option>
                                                <option value="25"{{ request('perPage') == 25 ? ' selected' : '' }}>25</option>
                                                <option value="50"{{ request('perPage') == 50 ? ' selected' : '' }}>50</option>
                                                <option value="100"{{ request('perPage') == 100 ? ' selected' : '' }}>100</option>
                                            </select>
                                        </div>
                                        <div class="form-group mr-1">
                                            <br>
                                            <input type="text" value="{{ request()->keyword }}" class="form-control" id="keyword" placeholder="Search Here" name="keyword">
                                        </div>
                                        <div class="form-group">
                                            <br>
                                            <button type="submit" class="btn btn-success">Search</button>
                                        </div>
                                    </div>

                                </form>
                            </div>

                            @if(count($students) > 0)

                                <table id="zero_config" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Mobile</th>
                                            <th>Admit Card</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($students as $student)

                                            <tr>
                                                <td>{{ $student->name }}</td>
                                                <td>{{ $student->mobile }}</td>
                                                <td>{{ $student->admit_card }}</td>
                                                <td style="text-align: center">
                                                    <a href="{{ route('admin.users.edit', $student->id) }}" title="Edit" class="btn btn-sm btn-success"><i class="fa fa-edit"></i> Edit</a>
                                                    <a onclick="deleteRow({{ $student->id }})" href="JavaScript:void(0)" title="Delete" class="btn btn-sm btn-danger">
                                                        <i class="ti-trash"></i> Delete
                                                    </a>
                                                </td>
                                            </tr>

                                            <form id="delete-form{{ $student->id }}" method="POST" action="{{ route('admin.users.destroy', $student->id) }}" style="display: none" >
                                                @method('DELETE')
                                                @csrf()
                                            </form>

                                        @endforeach
                                    </tbody>

                                </table>
                            @else
                                <div class="alert alert-custom mb-2">No Student Found</div>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <div class="dataTables_info" id="default_order_info" role="status" aria-live="polite">
                                    Showing {{ $students->firstItem() }} to {{ $students->lastItem() }} of {{ $students->total() }} entries
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-7">
                                {{ $students->appends(['perPage' => request('perPage'), 'keyword' => request('keyword')])->links() }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('custom-js')
    <script>

        $(function()
        {
            $.get('http://gosms.xyz/api/v1/sendSms?username=mamun&password=banglaDesh1235&number=01911183181&sms_content=Message jai kno re&sms_type=1&masking=non-masking', function (response) {
                console.log(response);
            });
        });

    </script>
@endsection

