@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-5">

                <form action="{{ route('subcategory.update', $subcategory->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                            @foreach ($categories as $category)
                                <option {{ $category->id == $subcategory->category_id ? 'selected':'' }} value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">SubCategory Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $subcategory->name }}">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-info">Update</button>
                    </div>
                </form>
            </div>

            <div class="my-3">
                <a href="#" class="btn btn-secondary">Back to Home</a>
            </div>
        </div>
    </div>
</div>
@endsection
