<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Companies') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container mt-2">
                        <div class="row">
                        <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                        <h2>Laravel 8 CRUD Example Tutorial</h2>
                        </div>
                       
                        </div>
                        </div>
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        <table class="table table-bordered">
                        <tr>
                        <th>S.No</th>
                        <th>Company Name</th>
                        <th>Company Email</th>
                        <th>Company Address</th>
                        <th width="280px">Action</th>
                        </tr>
                        @foreach ($companies as $company)
                        <tr>
                        <td>{{ $company->id }}</td>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->email }}</td>
                        <td>{{ $company->address }}</td>
                        <td>
                        <form action="{{ route('coys.destroy',$company->id) }}" method="Post">
                        <a class="btn btn-primary" href="{{ route('coys.edit',$company->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        </td>
                        </tr>
                        @endforeach
                        </table>
                        {!! $companies->links() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
