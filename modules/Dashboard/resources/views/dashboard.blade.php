@extends('layouts.phoenix')
@section('title')
  {{ $title }}
@endsection
@section('css') 
    <link rel="stylesheet" href="{{assetPath()}}/css/line.css" />
    <link rel="stylesheet" href="{{assetPath()}}/css/theme-rtl.min.css" />
    <link rel="stylesheet" href="{{assetPath()}}/css/theme.min.css" />
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
