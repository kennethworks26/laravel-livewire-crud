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
                <th wire:click.prevent="sortBy('name')" role="button" scope="col">Name</th>
                <th wire:click.prevent="sortBy('email')" role="button" scope="col">Email</th>
                <th wire:click.prevent="sortBy('website')" role="button" scope="col">Website</th>
                <th scope="col"># of Employees</th>
                <th scope="col" width="150">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($companies as $company)
            <tr>
                <td><a href="{{ route('companies.show', $company->id) }}">{{ $company->name }}</a></td>
                <td>{{ $company->email }}</td>
                <td>{{ $company->website }}</td>
                <td>{{ $company->employees_count }}</td>
                <td>
                    <div class="d-flex">
                        <a class="btn btn-primary mr-1" href="{{ route('companies.edit', $company->id) }}">Edit</a>
                        <form action="{{ route('companies.destroy', $company->id) }}" method="POST">
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

    <div class="row">
        <div class="col">
            {{ $companies->links() }}
        </div>

        <div class="col text-right text-muted">
            Showing {{ $companies->firstItem() }} to {{ $companies->lastItem() }} out of {{ $companies->total() }} results
        </div>
    </div>
</div>