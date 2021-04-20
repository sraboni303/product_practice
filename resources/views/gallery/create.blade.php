@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card p-5">

                    <form action="" method="post" enctype="multipart/form-data" class="dropzone" id="dropzoneForm">
                        @csrf
                    </form>
                    <div class="text-center mt-3">
                        <button type="button" class="btn btn-success" id="submit-all"> Upload Gallery</button>
                    </div>

                </div>

                <div class="my-3">
                    <a href="#" class="btn btn-secondary">Back to Home</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/dropzone.js"></script>

    <script type="text/javascript">
        Dropzone.options.dropzoneForm = {
            autoProcessQueue : false,
            uploadMultiple: true,
            parallelUploads: 10,
            thumbnailHeight: 120,
            thumbnailWidth: 120,
            maxFilesize: 3,
            filesizeBase: 1000,
            addRemoveLinks: true,
            renameFile: function (file) {
                var dt = new Date();
                var time = dt.getTime();
                return time + file.name;
            },
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            init:function(){
                myDropzone = this;
                $('#submit-all').on('click', function(){
                    myDropzone.processQueue();
                });
                this.on("complete", function(){
                    if(this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0){
                        var _this = this;
                        _this.removeAllFiles();
                        console.log()
                    }
                });
            },
            success: function (file, response) {
                console.log(response)
                window.location.href = response.url;
                // toastr.success(response.message,'Success');
            },
            error: function (file, response) {
                // toastr.success('Image upload failed','Success');
            }
        };
    </script>
@endsection
