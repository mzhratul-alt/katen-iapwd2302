@extends('layouts.backend_master')

@section('main_content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card-style mb-30">
                <h6 class="mb-10">All Categories</h6>
                <div class="table-wrapper table-responsive">
                    <table class="table striped-table">
                        <thead>
                            <tr>
                                <th>Sl. No.</th>
                                <th>
                                    <h6>Name</h6>
                                </th>
                                <th>
                                    <h6>Slug</h6>
                                </th>
                                <th>
                                    <h6>Status</h6>
                                </th>
                                <th>
                                    <h6>Action</h6>
                                </th>
                            </tr>
                            <!-- end table row-->
                        </thead>
                        <tbody>

                            @forelse ($categories as $key=> $category)
                                <tr>
                                    <td>
                                        <h6 class="text-sm">#{{ ++$key }}</h6>
                                    </td>
                                    <td>
                                        <p>{{ $category->name }}</p>
                                    </td>
                                    <td>
                                        <p>{{ $category->slug }}</p>
                                    </td>
                                    <td>
                                        <div class="form-check form-switch toggle-switch">
                                            <input class="form-check-input" type="checkbox" id="toggleSwitch2" {{ $category->status ? 'checked':'' }}>
                                        </div>
                                    </td>
                                    <td>

                                    </td>
                                </tr>
                                <!-- end table row -->
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-danger"><strong>No Data Found!</strong></td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                    <!-- end table -->
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card-style mb-30">
                <h6 class="mb-25">Create New Category</h6>
                <form action="{{ route('category.store') }}" method="POST">
                    @csrf
                    <div class="input-style-1">
                        <label>Category Name</label>
                        <input type="text" placeholder="Category Name" name="name">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- end input -->
                    <button type="submit" class="w-100 btn-sm main-btn primary-btn btn-hover">Add New Category</button>
                </form>
            </div>
        </div>
    </div>
@endsection
