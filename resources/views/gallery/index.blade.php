@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card p-5">
                <table class="table">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Gallery</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>

                      @foreach ($galleries as $gallery)
                        <tr>
                            <th>{{ $gallery->id }}</th>
                            <td><img style="max-width: 100px" src="{{ asset($gallery->name) }}"></td>
                            <td><a id="delete" class="btn btn-danger" onclick="return confirm('Are you sure?');" href="{{ route('gallery.delete', $gallery->id) }}">Delete</a></td>
                        </tr>
                      @endforeach

                    </tbody>
                  </table>
                  {{ $galleries->links() }}
            </div>

            <div class="my-3">
                <a href="#" class="btn btn-secondary">Create Gallery</a>
            </div>
        </div>
    </div>
</div>


@endsection
