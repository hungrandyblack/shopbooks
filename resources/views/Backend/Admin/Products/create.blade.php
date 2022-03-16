@extends("Backend.Layout.App")
@section("content")
<h1 class="mt-4 text-center text-success">Thêm Mới Sản Phẩm</h1>
<div class="card mb-4 container">
    <div class="card-body">
        <form action="{{route('products.store')}}" enctype="multipart/form-data" method="post">
            @csrf
            <div class="form-group">
                <label>Tên:</label>
                <input type="text" class="form-control" placeholder="Tên Sản Phẩm" name="name">
                @if ($errors)
                <div class="text-danger">{{$errors->first('name')}}</div>
                @endif
            </div>
            <div class="form-group">
                <label>Ảnh:</label>
                <input type="file" name="image" id="upload_file_input" class="form-control">
                @if ($errors)
                <div class="text-danger">{{$errors->first('image')}}</div>
                @endif
            </div>
            <div class="form-group">
                <label>Số Lương:</label>
                <input type="number" class="form-control" placeholder="Số Lương" name="quantity">
                @if ($errors)
                <div class="text-danger">{{$errors->first('quantity')}}</div>
                @endif
            </div>
            <div class="form-group">
                <label>Giá:</label>
                <input type="number" class="form-control" placeholder="Giá" name="price">
                @if ($errors)
                <div class="text-danger">{{ $errors->first('price') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label>Giảm giá:</label>
                <input type="number" class="form-control" placeholder="Giảm giá" name="discount_price">
                @if ($errors)
                <div class="text-danger">{{ $errors->first('discount_price') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label>Trạng thái:</label>
                <input type="text" class="form-control" placeholder="Trạng thái" name="status">
                @if ($errors)
                <div class="text-danger">{{$errors->first('status')}}</div>
                @endif
            </div>
            <div class="form-group">
                <label>Tác Giả:</label>
                <input type="text" class="form-control" placeholder="Tác Giả" name="author_id">
                @if ($errors)
                <div class="text-danger">{{$errors->first('author_id')}}</div>
                @endif
            </div>
            <div class="form-group">
                <label>Nhà cung cấp:</label>
                <input type="text" class="form-control" placeholder="nhà cung cấp" name="supplier_id">
                @if ($errors)
                <div class="text-danger">{{$errors->first('supplier_id')}}</div>
                @endif

            </div>
            <div class="form-group">
                <label>Mô tả:</label>
                <input type="text" class="form-control" placeholder="Mô tả" name="description">
                @if ($errors)
                <div class="text-danger">{{$errors->first('description')}}</div>
                @endif
            </div>
            <div class="form-group">
                <label>Danh mục:</label>
                <select type="text" class="form-control" placeholder="danh mục" name="category_id">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                @if ($errors)
                <div class="text-danger">{{$errors->first('category_id')}}</div>
                @endif
            </div>

            <br> <button class="btn btn-primary"><i class="fas fa-download"></i> Lưu</button>
            <a href="{{route('products.index')}}" class="btn btn-success"><i class="fas fa-backward"></i> Quay lại</a>
        </form>
    </div>
</div>
@endsection