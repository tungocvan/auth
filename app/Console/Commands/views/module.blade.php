@extends('layouts.phoenix')
@section('title')
  {{ $title }}
@endsection
@section('css') 
    <link rel="stylesheet" href="{{assetPath()}}/css/line.css" />
    <link rel="stylesheet" href="{{assetPath()}}/css/theme-rtl.min.css" />
    <link rel="stylesheet" href="{{assetPath()}}/css/theme.min.css" />
    <link rel="stylesheet" href="{{assetPath()}}/css/app.css" />
@endsection
@section('header')  
@endsection
@section('main')
    @include("Module::".$uri)  
@endsection
@section('footer')  
@endsection
@section('js') 
    <script src="{{asset('phoenix')}}/vendors/popper/popper.min.js"></script>
    <script src="{{asset('phoenix')}}/vendors/bootstrap/bootstrap.min.js"></script>
    <script src="{{asset('phoenix')}}/vendors/fontawesome/all.min.js"></script>    
    <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js"></script>
    <script src="{{assetPath()}}/js/app.js"></script>
    
@endsection
