<div>
    <div class="row mb-4">
        <div class="col-md-8 form-inline">
            Per Page: &nbsp;
            <select wire:model="perPage" class="form-control">
                <option>10</option>
                <option>15</option>
                <option>25</option>
            </select>
        </div>

        <div class="col-md-4">
            <input wire:model="search" class="form-control" type="text" placeholder="Search...">
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th wire:click.prevent="sortBy('first_name')" role="button" scope="col">Name</th>
                <th role="button" scope="col">Company</th>
                <th wire:click.prevent="sortBy('email')" role="button" scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col" width="150">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
            <tr>
                <td><a href="{{ route('employees.show', $employee->id) }}">{{ $employee->full_name }}</a></td>
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