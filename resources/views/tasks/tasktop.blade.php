<p class="text-center">{{ $user->name }} 's Task  (user_id: {{ $user->id }} tasks: {{$count_tasks}}) </p>

@if(count($tasks) > 0)
<table class="table table-striped">
    <thead>
        <tr>
            <th>task_no</th>
            <th>title</th>
            <th>task</th>
            <th>status</th>
        </tr>
    </thead>
    <tbody>
        <?php $num=count($tasks); ?>
        @foreach($tasks as $task)
            <tr>
                <td>{!! link_to_route('tasks.show',$num,['task_id'=>$task->task_id]) !!}</td>
                <td>{{ $task->title }}</td>
                <td>{{ $task->content }}</td>
                <td>{{ $task->status }}</td>
            </tr>
            <?php $num--; ?>
        @endforeach
    </tbody>
</table>
{!! link_to_route('tasks.create','新規タスク作成',['class'=>'btn btn-primary']) !!}
@else

    <p>No Task</p>
    
@endif