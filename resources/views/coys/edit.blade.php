<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Company Information') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container mt-2">
                        <div class="row">
                        <div class="col-lg-12 margin-tb">
                        </div>
                        </div>
                        @if(session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        <form action="{{ route('coys.update',$company->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 m-3">
                        <div class="form-group">
                        <strong>Company Name:</strong>
                        <input type="text" name="name" value="{{ $company->name }}" class="form-control" placeholder="Company name">
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 m-3">
                        <div class="form-group">
                        <strong>Company Email:</strong>
                        <input type="email" name="email" class="form-control" placeholder="Company Email" value="{{ $company->email }}">
                        @error('email')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 m-3">
                        <div class="form-group">
                        <strong>Company Address:</strong>
                        <input type="text" name="address" value="{{ $company->address }}" class="form-control" placeholder="Company Address">
                        @error('address')
                        <div class="alert alert-danger my-2">{{ $message }}</div>
                        @enderror
                        </div>
                        </div>
                        <button type="submit" class="btn btn-primary m-3">Edit</button>
                        </div>
                        </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

