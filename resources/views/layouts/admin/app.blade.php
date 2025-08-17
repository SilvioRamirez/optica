@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    
@stop

@section('content_top_nav_right')
    {{-- <livewire:calculadoradolar /> --}}
@endsection

@section('content')
    
    <p>Welcome to this beautiful admin panel.</p>

@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    {{-- Fonts --}}
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
@stop


@section('js')
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    @stack('scripts')
@stop

