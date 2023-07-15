@if (session('msg'))
    <div class="alert alert-outline-success">{{session('msg')}}</div>
@endif 
<h3>Phân quyền nhóm - {{ $group->name}}</h3>
<hr />
<form method="POST">
<table class="table">
    <thead>
      <tr>             
           
           <th>Modules</th>
           <th>Quyền</th>
           
      </tr>
    </thead>
    <tbody>
@if ($modules->count() > 0)

    @foreach ($modules as $module)
        <tr>
            <td>{{$module->title}}</td>
            <td>
                <div class="row">
                    @if (!empty($roleListArr))
                      @foreach ($roleListArr as $roleName => $roleLabel)
                          <div class="col-2">
                            <label for="role_{{$module->name}}_{{$roleName}}">
                                <input type="checkbox" name="role[{{$module->name}}][]" id="role_{{$module->name}}_{{$roleName}}" value="{{$roleName}}"
                                {{ isRole($roleArr,$module->name,$roleName) ? 'checked':false }}
                                />
                                {{$roleLabel}}
                            </label>
                          </div>
                      @endforeach  
                    @endif
                    @if ($module->name == 'groups')
                        <div class="col-3">
                            <label for="role_{{$module->name}}_permission">
                                <input type="checkbox" name="role[{{$module->name}}][]" id="role_{{$module->name}}_permission" value="permission" 
                                {{ isRole($roleArr,$module->name,'permission') ? 'checked':false }}
                            />
                            Phân quyền
                            </label>
                        </div>
                    @endif
                </div>
            </td>

        </tr>
    @endforeach
    
@endif
</tbody>
</table>
<button type="submit">Phân quyền</button>
@csrf
</form>
<script>        
    document.addEventListener('DOMContentLoaded', function(event) {
        
    });
</script>