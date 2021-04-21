@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h3>Dependent Dropdown</h3>
                <hr>
                <div class="form-group">
                    <label>Category</label>
                    <select class="form-control input-sm" name="category_id">
                        <option value="">--select--</option>
                        @foreach ($categories as $row)
                            <option value="{{$row->id}}">{{$row->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group" style="position:relative">
                    <label>Sub-Category</label>
                    <select class="form-control input-sm" name="subcategory_id"></select>
                    {{-- <img id="loader" src="{{url('/images/ajax-loader.gif')}}" alt="loader"> --}}
                </div>

            </div>
        </div>
    </div>

    {{-- <style>
        #loader {
            position: absolute;
            right: 18px;
            top: 30px;
            width: 20px;
        }
    </style> --}}

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

    <script>
        $(function () {
            var loader = $('#loader'),
                category = $('select[name="category_id"]'),
                subcategory = $('select[name="subcategory_id"]');

            loader.hide();
            subcategory.attr('disabled','disabled')

            subcategory.change(function(){
                var id = $(this).val();
                if(!id){
                    subcategory.attr('disabled','disabled')
                }
            })

            category.change(function() {
                var id= $(this).val();
                if(id){
                    loader.show();
                    subcategory.attr('disabled','disabled')

                    $.get('{{url('/dropdown-data?cat_id=')}}'+id)
                        .success(function(data){
                            var s='<option value="">---select--</option>';
                            data.forEach(function(row){
                                s +='<option value="'+row.id+'">'+row.name+'</option>'
                            })
                            subcategory.removeAttr('disabled')
                            subcategory.html(s);
                            loader.hide();
                        })
                }

            })
        })
    </script>
@endsection​
