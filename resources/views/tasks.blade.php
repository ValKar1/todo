@extends('layouts.app')

@section('content')
<script>
    function create() {

        let data = {
            'status': 'open',
            'name': document.getElementById('new-task-name').value,
            'description': document.getElementById('new-task-description').value,
            '_token': document.getElementById(`task-crf`).value
        };

        $.ajax({
            type:'POST',
            url:'/task',
            data: data,
            success:function(data) {
                //alert('success');
                window.location.href = "/tasks";
            }, error: function (request, status, error) {
                alert(request.responseText);
            }
        });
    }

    function update(id) {

        let data = {
            'id': document.getElementById(`task-id-${id}`).value,
            'status': document.getElementById(`task-status-${id}`).value,
            'name': document.getElementById(`task-name-${id}`).value,
            'description': document.getElementById(`task-description-${id}`).value,
            '_token': document.getElementById(`task-crf`).value
        };

        $.ajax({
            type:'PUT',
            url:`/task`,
            data: data,
            success:function(data) {
                //alert('success');
                window.location.href = "/tasks";
            }, error: function (request, status, error) {
                alert(request.responseText);
            }
        });
    }

    function dellete(id) {
            
        let data = {
            '_token': document.getElementById(`task-crf`).value
        };

        $.ajax({
            type:'DELETE',
            url:`/task/${id}`,
            data: data,
            success:function(data) {
                //alert('success');
                window.location.href = "/tasks";
            }, error: function (request, status, error) {
                alert(request.responseText);
            }
        });
    }
</script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <input id="task-crf" type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#form" aria-expanded="false" aria-controls="form">Create Task</button>
                    <br><br>
                    <div class="row">
                        <div class="col">
                            <div class="collapse multi-collapse" id="form" style="border: 1px solid grey; padding: 10px;">
                                    <div class="form-group">
                                        <label for="new-task-name">Name</label>
                                        <input type="text" class="form-control" name="name" id="new-task-name">
                                    </div>
                                    <div class="form-group">
                                        <label for="new-task-description">Description</label>
                                        <textarea class="form-control" name="description" id="new-task-description" rows="2"></textarea>
                                    </div>
                                    <button class="btn btn-primary" onclick="create()" type="submit">Save</button>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <h2><span class="badge badge-secondary">Open</span></h2>
                                @foreach ($tasks as $task)
                                    @if ($task->status == 'open')
                                        <div style="border: 1px solid grey; padding: 5px;">
                                            <div class="row">
                                                <div class="col">
                                                    {{$task->name}}
                                                </div>
                                                <div class="col-2">
                                                    <button type="submit" onclick="dellete({{$task->id}})">&#128465;</button>
                                                </div>
                                                <div class="col-2" style="padding:0">
                                                  <button type="submit" style="padding: 0 10px;" onclick="update({{$task->id}})">&#10004;</button>
                                                </div>
                                                <input id="task-id-{{$task->id}}" type="hidden" name="id" value="{{$task->id}}">
                                                <input id="task-status-{{$task->id}}" type="hidden" name="status" value="done">
                                                <input id="task-name-{{$task->id}}" type="hidden" name="name" value="{{$task->name}}">
                                                <input id="task-description-{{$task->id}}" type="hidden" name="description" value="{{$task->description}}">
                                            </div>
                                            <div>
                                                {{$task->description}}
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>

                            <div class="col">
                                <h2><span class="badge badge-secondary">Done</span></h2>
                                @foreach ($tasks as $task)
                                    @if ($task->status == 'done')
                                        <div style="border: 1px solid grey; padding: 5px;">
                                            <div class="row">
                                                <div class="col">
                                                    {{$task->name}}
                                                </div>
                                                <div class="col-3">
                                                    <button type="submit" onclick="dellete({{$task->id}})" >&#128465;</button>
                                                </div>
                                                <input id="task-id-{{$task->id}}" type="hidden" name="id" value="{{$task->id}}">
                                            </div>
                                            <div>
                                                {{$task->description}}
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
