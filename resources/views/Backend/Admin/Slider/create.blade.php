@extends("Backend.Layout.App")
@section("content")
<div class="container " style="width:900px">
    <h1 class="mt-4 text-center text-success">Thêm Mới Slider</h1>
    <div class="card mb-4 ">
        <div class="card-body">
            <form action="{{route('sliders.store')}}" enctype="multipart/form-data" method="post">
                @csrf 
                <div class="form-group">
                    <label>Tên:</label>
                    <input type="text" class="form-control" placeholder="Tên slider" name="name">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('name') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>Image:</label>
                    <input type="file" class="form-control" name="image">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('image') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>Link:</label>
                    <input type="text" class="form-control" placeholder="Link" name="link">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('link') }}</p>
                    @endif
                </div>
        </div>
        <br>

        <button class="btn btn-primary"><i class="fas fa-download"></i> Lưu</button>
        <a class="btn btn-danger" href="{{route('sliders.index')}}"> <i class="fas fa-backward"></i> Trở về </a>
        </form>
    </div>
</div>
</div>
@endsection