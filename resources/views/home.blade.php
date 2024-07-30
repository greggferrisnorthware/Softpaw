@extends('layouts.app')

@section('content')

<div class="large-break"></div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>     

    <div class="large-break"></div>

    <div class="row justify-content-center">
        <ul class="controls">
            <li><a href="{{ route('blog') }}">{{ __('Blog') }}</a></li>
            <li><a href="{{ route('view-everything') }}">{{ __('View Everything') }}</a></li>
            <li><a href="{{ route('add-posts') }}">{{ __('Add Post') }}</a></li>
            <li><a href="{{ route('add-affiliates') }}">{{ __('Add Product') }}</a></li>
            <li><a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a></li>
        </ul>
    </div>
</div>
@endsection
