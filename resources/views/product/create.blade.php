@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-5">

                <form action="{{ route('product.store') }}" method="POST">
                    @csrf

                    {{-- categories --}}
                    <div class="mb-3">
                        <select id="category_id" onchange="category_select()" class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                            <option value="">Select category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>

                    {{-- sub categories --}}
                    <div class="mb-3">
                        <select id="subcategory" name="subcategory_id" class="form-control @error('subcategory_id') is-invalid @enderror">
                            <option value="">Select Subcategory</option>
                        </select>
                        @error('subcategory_id')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name">

                        @error('name') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-info">Submit</button>
                    </div>
                </form>
            </div>

            <div class="my-3">
                <a href="#" class="btn btn-secondary">Back to Home</a>
            </div>
        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
<script>
        function category_select() {
            var id = $('#category_id').val();

            $.ajax({
                type: "GET",
                dataType: "json",
                url: "{{route('subcategories.fetch')}}",
                data: {
                    id:id,
                },
                success: function (data) {
                    $('#subcategory').empty();
                    $.each(data.subcategories, function (index, subcategory) {
                        $('#subcategory').append('<option value="' + subcategory.id + '">' + subcategory.name + '</option>');
                    })
                },
            })
        };
</script>
@endsection
