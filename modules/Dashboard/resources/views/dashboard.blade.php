@extends('layouts.phoenix')
@section('title')
  {{ $title }}
@endsection
@section('css') 
    <link rel="stylesheet" href="{{assetPath()}}/css/line.css" />
    <link rel="stylesheet" href="{{assetPath()}}/css/theme-rtl.min.css" />
    <link rel="stylesheet" href="{{assetPath()}}/css/theme.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="{{asset('libs')}}/jquery/dist/jquery.min.js"></script>
   
    <script src="{{asset('libs')}}/inputmask/dist/jquery.inputmask.min.js"></script>    
    <script src="{{asset('vendor')}}/laravel-filemanager/js/stand-alone-button.js"></script>    
    <script src="{{asset('plugin')}}/ckeditor/ckeditor.js"></script> 

@endsection
@section('header')  
@endsection

@section('main')
    @include("Dashboard::".$uri)  
@endsection
@section('footer')  
@endsection
@section('js') 
    <script src="{{asset('phoenix')}}/vendors/popper/popper.min.js"></script>
    <script src="{{asset('phoenix')}}/vendors/bootstrap/bootstrap.min.js"></script>
    <script src="{{asset('phoenix')}}/vendors/fontawesome/all.min.js"></script>         
@endsection
