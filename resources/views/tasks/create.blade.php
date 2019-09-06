@extends('layouts.app')
@section('content')
    <p>新規タスク作成</p>
    <div class="row">
        <div class="col-6">
            {!! Form::open(['route'=>'tasks.store']) !!}
                <div class="form-group">
                    {!! Form::label('title', 'タイトル : ') !!}
                    {!! Form::text('title', null, ['class'=>'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('content', 'タスク : ') !!}
                    {!! Form::text('content', null, ['class'=>'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('status','ステータス') !!}
                    {!! Form::text('status','no',['class'=>'form-control']) !!}
                </div>
                
                {!! Form::submit('投稿', ['class'=>'btn btn-primary']) !!}
        
            {!! Form::close() !!}
            
            
        </div>
    </div>
@endsection