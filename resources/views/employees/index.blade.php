@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(session('success'))
            <div class="alert alert-success mb-4" role="alert">
                {{ session('success') }}
            </div>
            @endif
            <div class="card">
                <div class="card-header d-flex d-flex-wrap justify-content-between align-items-center">
                    <h3>Employees</h3>
                    <a class="btn btn-primary pull-right" href="{{ route('employees.create') }}"> Create Employee</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Company</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col" width="150">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $employee)
                            <tr>
                                <td><a href="{{ route('employees.show', $employee->id) }}">{{ $employee->first_name }} {{ $employee->last_name }}</a></td>
                                <td><a href="{{ route('companies.show', $employee->company->id) }}">{{ $employee->company->name }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->phone }}</td>
                                <td>
                                    <div class="d-flex">
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
                    @if($employees && count($employees))
                    {{ $employees->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection