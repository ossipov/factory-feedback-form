@extends('layouts.app')
{{----------------------------------------------------------------------------------------------------}}
@push('meta')
    <title>🤙 FeedBack Form</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
@endpush
{{----------------------------------------------------------------------------------------------------}}
@section('content')
    <h1 class="text-center text-3xl font-semibold mb-5">
        <a class="hover:underline" href="/">🤙 FeedBack Form</a>
    </h1>
    <section class="container mx-auto">
        <div class="max-w-screen-md mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
           <div id="app"></div>
        </div>
    </section>
@endsection
{{----------------------------------------------------------------------------------------------------}}
