@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Task
                </div>
                    <!-- bootstrap定形コード -->
                    <div class="panel-body">
                        <!-- バリデーションエラー表示 -->
                        @include('common.errors')

                        <!-- 新タスクフォーム -->
                        <form action="/task" method="POST" class="form-horizontal">
                            {{ csrf_field() }}

                            <!-- タスク名 -->
                            <div class="form-group">
                                <label for="task" class="col-sm-3 control-label">Task</label>

                                <div class="col-sm-6">
                                    <input type="text" name="name" id="task-name" class="form-control">
                                </div>
                            </div>

                            <!-- タスク追加ボタン -->
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fa fa-plus"></i> タスク追加
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- 現在のタスク -->
                    @if (count($tasks) > 0)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                現在のタスク
                            </div>
                        </div>

                        <div class="panel-body">
                            <table class="table table-striped task-table">
                                <thead>
                                    <th>Task</th>
                                    <th>&nbsp;</th>
                                </thead>

                                <tbody>
                                    @foreach ($tasks as $task)
                                        <tr>
                                            <td class="table-text">
                                                <div>{{ $task->name }}</div>
                                            </td>
                                            <!-- 削除ボタン -->
                                            <td>
                                                <form action="/task/{{ $task->id }}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    
                                                    <button>タスク削除</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection