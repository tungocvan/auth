@if (session('msg'))
    <div class="alert alert-outline-success">{{session('msg')}}</div>
@endif 
<h3>Danh sách nhóm</h3>
<hr />
<table class="table">
  <thead>
    <tr>             
         <th>ID</th>
         <th>Group Name</th>
         <th>Action</th>
         
    </tr>
  </thead>
  <tbody>
    @if ($groups->count() > 0)
      @foreach ($groups as $item)
      <tr>             
        <td>{{$item->id}}</td>
        <td>{{$item->name}}</td>
        <td>
          <div class="row">
              <div class="col-3">
                <a href="{{route('admin.groups.permission',$item)}}">Phân quyền</a>
              </div>
              <div class="col-2"><a href="{{route('admin.groups.edit',$item)}}">Sửa</a></div>
              <div class="col-2"><a href="{{route('admin.groups.delete',$item->id)}}">Xóa</a></div>
          </div>
        </td>
      </tr>
      @endforeach
    @endif
    
  </tbody>
</table>
<script>        
    document.addEventListener('DOMContentLoaded', function(event) {
        
    });
</script>