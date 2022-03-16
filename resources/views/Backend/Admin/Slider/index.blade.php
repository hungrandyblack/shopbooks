@extends("Backend.Layout.App")
@section("content")

<div class="container">
    <table class="table">
        <h1 class="mt-4 text-center text-danger">Danh Sách Slider</h1>
        <a href="{{route('sliders.create')}}" class="btn btn-success"><i class="fas fa-plus-square"></i> Thêm</a>
        <thead>
            <tr class="bg-danger">
                <th scope="col">Stt</th>
                <th scope="col">Tên</th>
                <th scope="col">Image</th>
                <th scope="col">Link</th>
                <th scope="col">Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sliders as $key => $slider)
            <tr>
                <th scope="row">{{ $key+1 }}</th>
                <td>{{$slider->name}}</td>
                <td><img style="width:190px;height:100px" src="{{asset('front-end/images/'.$slider->image)}}" alt=""></td>
                <td>{{$slider->link}}</td>
                <td>
                    <a href="{{route('sliders.edit',$slider->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                    <form action="{{route('sliders.destroy',$slider->id)}}" method="post" Style="display:inline">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" type="submit" onclick="return confirm('Bạn chắc chắn muốn xóa?')" title="Xoá"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection