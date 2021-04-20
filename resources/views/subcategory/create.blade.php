@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-5">

                <form action="{{ route('subcategory.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">SubCategory Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name">

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-info" value="Submit">
                    </div>
                </form>
            </div>

            <div class="my-3">
                <a href="{{ route('subcategory.index') }}" class="btn btn-secondary">Back to Home</a>
            </div>
        </div>
    </div>
</div>
@endsection
