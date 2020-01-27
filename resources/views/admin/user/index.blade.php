@extends('layouts.app')

@section('custom-meta')
    <title>Students - {{ config('APP_NAME') ?? 'Project Name' }}</title>
@endsection

@section('content')

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Students</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <a href="{{ route('admin.students.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Add New Student</a>
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
                                <form action="{{ route('admin.students.index') }}" method="get" class="">

                                    <div class="row">
                                        <div class="form-group mr-1">
                                            Records Per Page
                                            <select name="perPage" id="perPage" onchange="this.form.submit()" class="form-control" style="width: 115px;">
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

                            <table id="zero_config" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Mobile</th>
                                        <th class="text-center">Admit</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($students as $student)

                                        <tr class="text-center">
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->mobile }}</td>
                                            <td>{{ $student->admit }}</td>
                                            <td style="text-align: center">
                                                <a href="{{ route('admin.students.edit', $student->id) }}" title="Edit" class="btn btn-sm btn-success"><i class="fa fa-edit"></i> Edit</a>
                                                <a onclick="deleteRow({{ $student->id }})" href="JavaScript:void(0)" title="Delete" class="btn btn-sm btn-danger">
                                                    <i class="ti-trash"></i> Delete
                                                </a>
                                            </td>
                                        </tr>

                                        <form id="delete-form{{ $student->id }}" method="POST" action="{{ route('admin.students.destroy', $student->id) }}" style="display: none" >
                                            @method('DELETE')
                                            @csrf()
                                        </form>

                                    @endforeach
                                </tbody>

                            </table>
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



