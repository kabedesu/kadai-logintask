@extends('layouts.app')

@section('content')
    @if(\Auth::check())
        @include('tasks.tasktop')
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <p>welcome to LoginTask</p>
                {!! link_to_route('signup.get','Sign up now!',[],['class'=>'btn btn-lg btn-primary']) !!}
            </div>    
        </div>
    @endif
@endsection