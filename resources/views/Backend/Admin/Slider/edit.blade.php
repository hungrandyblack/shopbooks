@extends("Backend.Layout.App")
@section("content")
<h1 class="mt-4 text-center text-success">Chỉnh Sửa Slider</h1>
<div class="card mb-4 container">
    <div class="card-body">
        <form action="{{route('sliders.update',$slider->id)}}" enctype="multipart/form-data" method="post">
            @csrf
            @method("put")
            <div class="form-group">
                <label>Tên Slider:</label>
                <input type="text" value="{{$slider->name}}" class="form-control" placeholder="Tên Slider" name="name">
                @if ($errors)
                <div class="text-danger">{{$errors->first('name')}}</div>   
                @endif
            </div>
            <div class="form-group">
                <label>Ảnh:</label>
                <input type="file" class="form-control" id="upload_file_input" placeholder="Hình ảnh" value="{{$slider->image}}" name="image">
                <img style="width:190px;height:100px" src="{{asset('front-end/images/'.$slider->image)}}" alt="">

            </div>
            <div class="form-group">
                <label>Link:</label>
                <input type="text" value="{{$slider->link}}" class="form-control" placeholder="Link" name="link">
                @if ($errors)
                <div class="text-danger">{{$errors->first('link')}}</div>
                @endif
            </div>
            <br> <button type="submit" class="btn btn-primary"><i class="fas fa-download"></i> Lưu</button>
            <a href="{{route('sliders.index')}}" class="btn btn-success"><i class="fas fa-backward"></i> Quay lại</a>
        </form>
    </div>
</div>
@endsection

