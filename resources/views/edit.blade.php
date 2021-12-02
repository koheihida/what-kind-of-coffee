@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">メモ編集
        <form class="card-body" action="{{ route('destroy')}}" method="POST">
            @csrf
            <input type="hidden" name="memo_id" value="{{$edit_memo['id']}}">
            <button type="submit">削除</button>
        </form>
    </div>
    <form class="card-body" action="{{ route('update')}}" method="POST">
        @csrf
        <input type="hidden" name="memo_id" value="{{$edit_memo['id']}}">
        <div class="form-floating">
            <textarea class="form-control" placeholder="ここにメモを入力" name="content" style="height: 100px">{{ $edit_memo['content'] }}</textarea>
        </div>
        <button type="submit" class="btn btn-outline-secondary">更新</button>
    </form>
</div>
@endsection
