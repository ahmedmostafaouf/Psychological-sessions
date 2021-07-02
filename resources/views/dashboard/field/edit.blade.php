<x-dashboard.app>
@push('css')
    <!-- This Page CSS -->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/summernote/dist/summernote-bs4.css')}}">
    @endpush
    <div class="page-wrapper">
        <x-dashboard.bredcrumb currentPage="Class"></x-dashboard.bredcrumb>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">General Form</h4>
                            <h6 class="card-subtitle"> All with bootstrap element classies </h6>
                            <form class="mt-4" action="{{route('fields.update',$field->id)}}" method="post" enctype="multipart/form-data" >
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Field Name</label>
                                    <input type="text" name="name" value="{{$field->name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="name Enter">
                                    <small id="emailHelp" class="form-text text-muted">Enter Name Please.</small>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input"  name="photo" id="photo" placeholder="Photo">

                                    <label for="exampleInputPassword1"  class="custom-file-label form-control">Choose File</label>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Short Description</label>
                                    <textarea type="text" class="form-control" name="short_description" id="exampleInputPassword1" placeholder="Short Desc">{{$field->short_description}}</textarea>
                                </div>


                                <div class="form-group" name="description">
                                    <h4 class="card-title">Description</h4>
                                    <textarea class="summernote"  name="description">
                                               {{$field->description}}
                                            </textarea>
                                </div>



                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row -->
        </div>
        <x-dashboard.footer></x-dashboard.footer>
    </div>
    @push('scripts')
    <!-- This Page JS -->
        <script src="{{asset('assets/libs/summernote/dist/summernote-bs4.min.js')}}"></script>
        <script>
            /************************************/
            //default editor
            /************************************/
            $('.summernote').summernote({
                height: 350, // set editor height
                minHeight: null, // set minimum height of editor
                maxHeight: null, // set maximum height of editor
                focus: false // set focus to editable area after initializing summernote
            });

            /************************************/
            //inline-editor
            /************************************/
            $('.inline-editor').summernote({
                airMode: true
            });

            /************************************/
            //edit and save mode
            /************************************/
            window.edit = function() {
                $(".click2edit").summernote()
            },
                window.save = function() {
                    $(".click2edit").summernote('destroy');
                }

            var edit = function() {
                $('.click2edit').summernote({ focus: true });
            };

            var save = function() {
                var markup = $('.click2edit').summernote('code');
                $('.click2edit').summernote('destroy');
            };

            /************************************/
            //airmode editor
            /************************************/
            $('.airmode-summer').summernote({
                airMode: true
            });
        </script>
    @endpush
</x-dashboard.app>
