<h3>Groups Module</h3>
@foreach ($lists as $item)
<p>{{ $item->name}}</p>
<p>{{ $item->email}}</p>
<p>{{ $item->group->name }}</p>

@endforeach
