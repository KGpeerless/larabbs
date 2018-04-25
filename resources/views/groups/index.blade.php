@extends('layouts.app')

@section('title', isset($category) ? $category->name : '话题列表')

@section('content')

<div class="row">
    <div class="col-lg-9 col-md-9 topic-list">
        <div class="panel panel-default">
            <div class="panel-body" style="padding: 0px">
                <div class="col-md-12 padding-0 group">
                    <div class="col-md-3 padding-0 group-friends">
                        @foreach($groups as $key => $group)
                            @foreach($group->users as $user)
                                @if ($user->id != Auth::id())
                                <div class="col-md-12 group-friend @if($key == 0) group-action @endif">
                                    <div class="col-md-4 padding-0">
                                        <img src="{{ $user->avatar }}" class="group-avatar"> 
                                    </div>
                                    <div class="col-md-8 padding-0">
                                        <span>{{ $user->name }}</span>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        @endforeach
                    </div>
                    <div class="col-md-9 padding-0 group-messages">
                        <div class="col-md-12 padding-0 group-messages-up">
                            <div class="group-message-left">
                                <img src="{{ $user->avatar }}" class="group-avatar"> 
                                <span class="group-message">哈哈哈哈哈</span>
                            </div>
                            
                            <div class="group-message-right mt-70">
                                <span class="group-message">哈哈哈哈哈</span>
                                <img src="{{ Auth::user()->avatar }}" class="group-avatar"> 
                            </div>
                        </div>
                        <div class="col-md-12 padding-0 group-messages-down">
                            <textarea class="col-md-12">
                                
                            </textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-3 sidebar">
        @include('topics._sidebar')
    </div>
</div>

@endsection