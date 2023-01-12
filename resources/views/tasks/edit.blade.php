@extends('layout')

@section('styles')
    @include('share.flatpickr.styles')
@endsection

@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
          <div class="panel-heading">タスクを編集する</div>
          <div class="panel-body">
            @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                  <p>{{ $message }}</p>
                @endforeach
              </div>
            @endif
            <form
                action="{{ route('tasks.edit', ['id' => $task->folder_id, 'task_id' => $task->id]) }}"
                method="POST"
            >
              @csrf
              <div class="form-group">
                <label for="title">タイトル</label>
                <input type="text" class="form-control" name="title" id="title"
                       value="{{ old('title') ?? $task->title }}" />
              </div>
              <div class="form-group">
                <label for="status">状態</label>
                <select name="status" id="status" class="form-control">
                  @foreach(\App\Models\Task::STATUS as $key => $val)
                    <option
                        value="{{ $key }}"
                        {{ $key == old('status', $task->status) ? 'selected' : '' }}
                    >
                      {{ $val['label'] }}
                    </option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="start_date">開始日</label>
                <input type="text" class="form-control" name="start_date" id="start_date"
                       value="{{ old('start_date') ?? $task->formatted_start_date }}" />
              </div>
              <div class="form-group">
                <label for="end_date">終了日</label>
                <input type="text" class="form-control" name="end_date" id="end_date"
                       value="{{ old('end_date') ?? $task->formatted_end_date }}" />
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-primary">送信</button>
              </div>
            </form>
          </div>
        </nav>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
   @include('share.flatpickr.scripts')
@endsection