@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Employee Details</div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">First Name: {{ $employee->first_name }}</li>
                        <li class="list-group-item">Last Name: {{ $employee->last_name }}</li>
                        <li class="list-group-item">Company: {{ $employee->company->name }}</li>
                        <li class="list-group-item">Email: {{ $employee->email }}</li>
                        <li class="list-group-item">Phone: {{ $employee->phone }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection