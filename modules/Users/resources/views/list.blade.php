@if (session('msg'))
    <div class="alert alert-outline-success">{{session('msg')}}</div>
  @endif 
<form class="row g-3 card shadow-none border border-300 my-4" method="GET">
  
<table class="table">
    <thead>
       <tr>             
            <th colspan="5"></th>
            <th colspan="4">
                <a class="btn btn-phoenix-success btn-sm" href="{{route('admin.users.add')}}">
                    <svg class="svg-inline--fa fa-plus" data-fa-transform="shrink-3 down-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="" style="transform-origin: 0.4375em 0.625em;"><g transform="translate(224 256)"><g transform="translate(0, 64)  scale(0.8125, 0.8125)  rotate(0 0 0)"><path fill="currentColor" d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z" transform="translate(-224 -256)"></path></g></g></svg><span class="ms-1">Thêm mới</span></a>
                <a class="btn btn-phoenix-success btn-sm" href="#">
                    <svg class="svg-inline--fa fa-plus" data-fa-transform="shrink-3 down-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="" style="transform-origin: 0.4375em 0.625em;"><g transform="translate(224 256)"><g transform="translate(0, 64)  scale(0.8125, 0.8125)  rotate(0 0 0)"><path fill="currentColor" d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z" transform="translate(-224 -256)"></path></g></g></svg><span class="ms-1">Xóa chọn</span></a>
            </th>  
       </tr>  
       <tr>
            <th colspan="2">
              <select class="form-select" aria-label="Default select example" name="status">
                <option value="-1">Trạng thái</option>
                <option value="0" {{ request()->status === "0"? "selected" : false}}>Chưa kích hoạt</option>
                <option value="1" {{ request()->status === "1"? "selected" : false}}>Đã kích hoạt</option>                
              </select>
            </th>  
            <th colspan="2">
              <select class="form-select" aria-label="Default select example" name="group">
                <option value="-1">Nhóm người dùng</option>    
                @if (getGroupAll()->count() > 0)
                    @foreach (getGroupAll() as $item)
                     <option value={{$item->id}} {{ request()->group ===(String)$item->id? "selected" : false}}>{{$item->name}}</option>
                    @endforeach
                @endif          
              </select>
            </th>  
            <th colspan="2">
                <div class="search-box">
                    <div class="position-relative"><input name="keyword" value="{{request()->keyword}}" class="form-control search-input search" type="search" placeholder="Search user" aria-label="Search">
                      <svg class="svg-inline--fa fa-magnifying-glass search-box-icon" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="magnifying-glass" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M500.3 443.7l-119.7-119.7c27.22-40.41 40.65-90.9 33.46-144.7C401.8 87.79 326.8 13.32 235.2 1.723C99.01-15.51-15.51 99.01 1.724 235.2c11.6 91.64 86.08 166.7 177.6 178.9c53.8 7.189 104.3-6.236 144.7-33.46l119.7 119.7c15.62 15.62 40.95 15.62 56.57 0C515.9 484.7 515.9 459.3 500.3 443.7zM79.1 208c0-70.58 57.42-128 128-128s128 57.42 128 128c0 70.58-57.42 128-128 128S79.1 278.6 79.1 208z"></path></svg><!-- <span class="fas fa-search search-box-icon"></span> Font Awesome fontawesome.com -->
                    </div>
                  </div>
            </th>    
            <th colspan="2">
              <button class="btn btn-phoenix-success btn-sm" type="submit">
                Tìm kiếm
              </button>
            </th>     
       </tr>  
      <tr>
        <th scope="col">
            <div class="form-check mb-0 fs-0"><input class="form-check-input" type="checkbox" /></div>
        </th>
        <th scope="col"><a href="?sortBy=name&sortType={{$sortType}}">Name<span class="{{$sortIcon}}"></span></a></th>
        <th scope="col">Email</th>
        <th scope="col">status</th>
        <th scope="col">Group</th>
        <th scope="col" colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      @if ($users->count() > 0)
          @foreach ($users as $item)
          <tr>
            <td scope="row"><input style="margin-left: 0.5rem" class="form-check-input" type="checkbox" /> {{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->status}}</td>
            <td>{{$item->group->name}}</td>      
            <td>
                <a href="{{route('admin.users.edit',$item)}}" class="btn btn-sm btn-primary px-4 ms-2" type="button" data-list-pagination="next"><span>Sửa</span></a>  
                <a href="{{route('admin.users.delete',$item->id)}}" class="btn btn-sm btn-primary px-4 ms-2" type="button" data-list-pagination="next"><span>Xóa</span></a>                
            </td>                 
          </tr>
          @endforeach                       
        
      @endif  
    </tbody>
  </table>
  <div class="row">    
    <div class="col-4">
        <button class="btn btn-link text-900 me-2 px-0"><svg class="svg-inline--fa fa-file-export fs--1 me-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="file-export" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M192 312C192 298.8 202.8 288 216 288H384V160H256c-17.67 0-32-14.33-32-32L224 0H48C21.49 0 0 21.49 0 48v416C0 490.5 21.49 512 48 512h288c26.51 0 48-21.49 48-48v-128H216C202.8 336 192 325.3 192 312zM256 0v128h128L256 0zM568.1 295l-80-80c-9.375-9.375-24.56-9.375-33.94 0s-9.375 24.56 0 33.94L494.1 288H384v48h110.1l-39.03 39.03C450.3 379.7 448 385.8 448 392s2.344 12.28 7.031 16.97c9.375 9.375 24.56 9.375 33.94 0l80-80C578.3 319.6 578.3 304.4 568.1 295z"></path></svg><!-- <span class="fa-solid fa-file-export fs--1 me-2"></span> Font Awesome fontawesome.com -->Export</button>
        <button class="btn btn-link text-900 me-2 px-0"><svg class="svg-inline--fa fa-file-export fs--1 me-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="file-export" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M192 312C192 298.8 202.8 288 216 288H384V160H256c-17.67 0-32-14.33-32-32L224 0H48C21.49 0 0 21.49 0 48v416C0 490.5 21.49 512 48 512h288c26.51 0 48-21.49 48-48v-128H216C202.8 336 192 325.3 192 312zM256 0v128h128L256 0zM568.1 295l-80-80c-9.375-9.375-24.56-9.375-33.94 0s-9.375 24.56 0 33.94L494.1 288H384v48h110.1l-39.03 39.03C450.3 379.7 448 385.8 448 392s2.344 12.28 7.031 16.97c9.375 9.375 24.56 9.375 33.94 0l80-80C578.3 319.6 578.3 304.4 568.1 295z"></path></svg><!-- <span class="fa-solid fa-file-export fs--1 me-2"></span> Font Awesome fontawesome.com -->Import</button>
    </div>     
    <div class="col-8">       
                      
                      {{ $users->links() }}
    </div>
   </div>
  @csrf
</form>

<script>        
    document.addEventListener('DOMContentLoaded', function(event) {
        
    });
</script>