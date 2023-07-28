@php
    $action = route($options['action']) ?? '#';
    $method = $options['method'] ?? 'post';
    $name = $options['name'] ?? 'name'.(string) rand(10,99);
    $value = $options['value'] ?? 'submit';

@endphp
<form action="{{ $action }}" method="{{ $method }}">
    <!-- CSRF token -->
    @csrf
    @if ($errors->any())
            <div class="alert alert-outline-danger" role="alert">Đã có lỗi xãy ra</div>
    @endif 
    @if (session('msg'))
        <div class="alert alert-outline-success">{{session('msg')}}</div>
    @endif 
    <!-- Render the content of the form -->
    {{ $slot }}
    <input class="btn btn-primary me-1 mb-1" type="submit" name="{{ $name }}" value="{{ $value }}" />
</form>
