@extends('layouts.app')
@section('content')
    <p class="text-center">{{ $task->title }} 詳細ページ [task_id {{ $task->task_id }}]</p>
    <table class="table table-bordered">
        <tr>
            <th>タイトル</th>
            <td>{{ $task->title }}</td>
        </tr>
        <tr>
            <th>内容</th>
            <td>{{ $task->content }}</td>
        </tr>
        <tr>
            <th>ステータス</th>
            <td>{{ $task->status }}</td>
        </tr>
    </table>
    
    {!! link_to_route('tasks.edit','このタスクを編集',['task_id'=>$task->task_id],['class'=>'btn btn-info mb-3']) !!}
    {!! Form::model($task,['route'=>['tasks.destroy',$task->task_id],'method'=>'delete']) !!}
        {!! Form::submit('このタスクを削除',['class'=>'btn btn-danger']) !!}
    {!! Form::close() !!}    
@endsection