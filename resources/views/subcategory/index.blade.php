@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card p-5">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($sub_categories as $sub_category)
                            <tr>
                                <td>{{ $sub_category->id }}</td>
                                <td>{{ $sub_category->category->name }}</td>
                                <td>{{ $sub_category->name }}</td>
                                <td>
                                    <a href="{{ route('subcategory.edit', $sub_category->id) }}" class="btn btn-success">Edit</a>

                                    <form class="d-inline-block" action="{{ route('subcategory.destroy', $sub_category->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                  </table>
                  {{ $sub_categories->links() }}

            </div>

            <div class="my-3">
                <a href="{{ route('subcategory.create') }}" class="btn btn-secondary">Create SubCategory</a>
            </div>
        </div>
    </div>
</div>
@endsection
