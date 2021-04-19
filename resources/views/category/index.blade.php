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
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($categories as $category)
                        <tr>
                            <th>{{ $loop->index+1 }}</th>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>

            </div>

            <div class="my-3">
                <a href="{{ route('category.create') }}" class="btn btn-secondary">Create Category</a>
            </div>
        </div>
    </div>
</div>
@endsection
