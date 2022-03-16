@extends("Backend.Layout.App")
@section("content")
<h1 class="mt-4 text-center text-success">Thêm Mới Danh Mục</h1>
<div class="card mb-4 container">
    <div class="card-body">
        <form action="{{route('categories.store')}}" enctype="multipart/form-data" method="post">
            @csrf
            <div class="form-group">
                <label>Tên:</label>
                <input type="text" class="form-control" placeholder="Tên Danh Mục" name="name">
                @if ($errors)
                <div class="text-danger">{{$errors->first('name')}}</div>
                @endif
            </div>
            <div class="form-group">
                <label>Hình Ảnh:</label>
                <input type="file" name="image" id="upload_file_input" class="form-control">
                @if ($errors)
                <div class="text-danger">{{$errors->first('image')}}</div>
                @endif
            </div>
            <div class="form-group">
                <label>Danh mục:</label>
                <select type="text" class="form-control" placeholder="danh mục" name="parent_id">
                    <option value="0">Danh Mục Cha</option>
                    @foreach($parentCategories as $parentCategory)
                    <option value="{{$parentCategory->id}}">{{$parentCategory->name}}</option>
                    @endforeach
                </select>
                @if ($errors)
                <div class="text-danger">{{$errors->first('category_id')}}</div>
                @endif
            </div>
            <button class="btn btn-primary"><i class="fas fa-download"></i> Lưu</button>
            <a class="btn btn-success" href="{{route('categories.index')}}"><i class="fas fa-backward"></i> Trở Về</a>
        </form>
    </div>
</div>
@endsection