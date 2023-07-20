@if (session('msg'))
    <div class="alert alert-outline-success">{{session('msg')}}</div>
@endif 
<h3>Danh sách Bài viết</h3>
<hr />
@can('createPost', Modules\Posts\src\Models\Posts::class)
    <div class="row">
        <div class="col-2">
            <a class="btn btn-primary" href="{{route('admin.posts.add')}}">Thêm bài viết</a>
        </div>
    </div>
@endcan
<table class="table">
    <thead> 
      <tr>             
           <th>ID</th>
           <th>Title</th>
           <th>User_id</th>           
           <th>Action</th>   
      </tr>
    </thead>
    <tbody>
      @if ($posts->count() > 0)
        @foreach ($posts as $item)
        <tr>             
          <td>{{$item->id}}</td>
          <td width="40%">{{$item->title}}</td>
          <td>{{$item->user_id}}</td>
          @can('editPost', Modules\Posts\src\Models\Posts::class)
          <td>
            <div class="row">  
                @can('editPost', Modules\Posts\src\Models\Posts::class)            
                    <div class="col-2"><a href="{{route('admin.posts.edit',$item)}}">Sửa</a></div>
                @endcan
                @can('deletePost', Modules\Posts\src\Models\Posts::class) 
                   <div class="col-2"><a href="{{route('admin.posts.delete',$item->id)}}">Xóa</a></div>
                @endcan
            </div>
          </td>
          @endcan
        </tr>
        @endforeach
      @endif
      
    </tbody>
  </table>
<script>        
    document.addEventListener('DOMContentLoaded', function(event) {
        
    });
</script>