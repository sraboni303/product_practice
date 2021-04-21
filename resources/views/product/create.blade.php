@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-5">

                <form action="" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name">

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- categories --}}
                    <div class="mb-3">
                        <select class="form-select @error('category_id') is-invalid @enderror" name="category_id">
                            <option disabled selected>-select category-</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>

                        @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- sub categories --}}
                    <div class="mb-3">
                        <select class="form-select @error('subcategory_id') is-invalid @enderror" name="subcategory_id">
                            {{-- <option disabled selected>-select sub-category-</option> --}}

                        </select>

                        @error('subcategory_id')
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
                <a href="#" class="btn btn-secondary">Back to Home</a>
            </div>
        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function(){

        $(document).on('change', 'select[name="category_id"]', function(){

            let cat_id = $(this).val();

            if(cat_id){
                $.ajax({
                    url : "{{ URL::route('subcategories.get', 'cat_id') }}",
                    type : "GET",
                    dataType : "json",
                    success: function(data){

                        alert(data);

                        // if(data){

                        //     alert('done');

                        //     // $('select[name="subcategory_id"]').empty();
                        //     // $.each(data, function(data,subcategories){
                        //     //    $('select[name="subcategory_id"]').append('<option value="'+ key +'">'+ subcategories +'</option>');
                        //     // });

                        // }
                        // else{
                        //     // $('select[name="subcategory_id"]').empty();
                        //     alert('wrong');
                        // }
                    }
                });
            }
        });

    });
</script>


@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function(){

        $(document).on('change', 'select[name="category_id"]', function(){

            let cat_id = $(this).val();


            // if(cat_id){
                $.ajax({
                    url : "{{ URL::route('subcategories.get', 'cat_id') }}",
                    success: function(data){

                        alert(data.subcategories);

                        // if(data){

                        //     alert('done');

                        //     // $('select[name="subcategory_id"]').empty();
                        //     // $.each(data, function(data,subcategories){
                        //     //    $('select[name="subcategory_id"]').append('<option value="'+ key +'">'+ subcategories +'</option>');
                        //     // });

                        // }
                        // else{
                        //     // $('select[name="subcategory_id"]').empty();
                        //     alert('wrong');
                        // }
                    }
                });
            // }
        });

    });
</script>
@endsection
