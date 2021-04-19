@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-5">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($sub_categories as $sub_category)
                            <tr>
                                <th>{{ $sub_category->name }}</th>
                                <th>Name</th>
                                <th>Name</th>
                                <td>
                                    <a href="#" class="btn btn-success">Edit</a>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                  </table>

            </div>

            <div class="my-3">
                <a href="#" class="btn btn-secondary">Create SubCategory</a>
            </div>
        </div>
    </div>
</div>
@endsection
