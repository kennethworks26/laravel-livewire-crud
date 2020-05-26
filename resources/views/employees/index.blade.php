@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex d-flex-wrap justify-content-between align-items-center">
                    <h3>Employees</h3>
                    <a class="btn btn-primary pull-right" href="{{ route('employees.create') }}"> Create Employee</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Company</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col" width="300">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $employee)
                                <tr>
                                    <th scope="row">{{ $employee->id }}</th>
                                    <td>{{ $employee->first_name }}</td>
                                    <td>{{ $employee->last_name }}</td>
                                    <td>{{ $employee->company->name }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>{{ $employee->phone }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a class="btn btn-info mr-1" href="{{ route('employees.show', $employee->id) }}">Show</a>
                                            <a class="btn btn-primary mr-1" href="{{ route('employees.edit', $employee->id) }}">Edit</a>
                                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $employees->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
