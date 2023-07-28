<h3>Sửa thành viên</h3>
<hr />
<form action="{{route('admin.users.update')}}" method="POST">

@if ($errors->any())
    <div class="alert alert-outline-danger" role="alert">Đã có lỗi xãy ra</div>
@endif 
@if (session('msg'))
    <div class="alert alert-outline-success">{{session('msg')}}</div>
@endif 
<div class="mb-3">
    <label class="form-label" for="name">Full name</label>
    <input hidden name="id" class="form-control" id="id" type="text" value="{{$user->id}}">
    <input name="name" class="form-control" id="name" type="text" value="{{$user->name}}">
    @error('name')
        <span class="text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="mb-3">
    <label class="form-label" for="email">Email address </label>
    <input name="email" class="form-control" id="email" type="email" value="{{$user->email}}">
    @error('email')
        <span class="text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="mb-3">
    <label class="form-label" for="password">Mật khẩu</label>
    <input name="password" class="form-control" id="password" type="password" value="{{$user->password}}">
    @error('password')
        <span class="text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="mb-3">
    <label class="form-label" for="passwordConfrim">Nhập lại mật khẩu</label>
    <input name="password_confirmation" class="form-control" id="passwordConfrim" type="password" value="{{$user->password}}">
    @error('passwordConfrim')
        <span class="text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="mb-3">
    <label class="form-label">Chọn nhóm</label>
    <select class="form-select" aria-label="Default select example" name="group">        
        @if (getGroupAll()->count() > 0)
            @foreach (getGroupAll() as $item)
             <option value={{$item->id}} {{ $user->group_id === $item->id? "selected" : false}}>{{$item->name}}</option>
            @endforeach
        @endif          
      </select>
  
</div>
<div class="mb-3 d-flex justify-content-end">
    <button class="btn btn-success me-1 mb-1" type="submit">Cập nhật</button>  
</div>
@csrf
</form>