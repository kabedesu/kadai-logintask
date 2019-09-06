@extends('layouts.app')
@section('content')
    <p>{{ $task->title }}の編集 [task_id {{ $task->task_id }}]</p>
    <div class="row">
        <div class="col-6">
            {!! Form::model($task,['route'=>['tasks.update',$task->task_id],'method'=>'put']) !!}
                <div class="form-group">
                    {!! Form::label('title', 'タイトル : ') !!}
                    {!! Form::text('title',null, ['class'=>'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('content', 'タスク : ') !!}
                    {!! Form::text('content',null, ['class'=>'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('status','ステータス') !!}
                    {!! Form::text('status',null,['class'=>'form-control']) !!}
                </div>
                
                {!! Form::submit('更新', ['class'=>'btn btn-primary']) !!}
                
            {!! Form::close() !!}
            
            
        </div>
    </div>
@endsection