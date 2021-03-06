@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{asset('vendor/chat/css/chat.css')}}">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="row">
                {{--room start--}}
                <div class="col-sm-12 col-md-12">
                    <div class="thumbnail">
                        <div class="caption">
                            {{--头部--}}
                            <h4>{{$room->title}} <span class="pull-right number">(<span class="online"
                                    >0</span>/<span class="all">{{$memberNum}}</span>)
                                </span></h4>
                            {{--内容--}}
                            <div class="content">
                                @foreach($messages as $message)
                                    <div class="{{Auth::user()->id == $message->user_id ? 'chat-right' : 'chat-left'}}">
                                        <img src="https://ss1.bdstatic.com/70cFuXSh_Q1YnxGkpoWK1HF6hhy/it/u=195064397,4249755622&fm=27&gp=0.jpg" alt=""
                                             class="avatar pull-{{Auth::user()->id == $message->user_id ? 'right' : 'left'}}">
                                        <div class="{{Auth::user()->id == $message->user_id ? 'pull-right' : 'pull-left'}}">
                                            <span class="username username-{{Auth::user()->id == $message->user_id ? 'right' : 'left'}}">{{$message->user_name}}</span>
                                            <br>
                                            {{--防止换行符被转字符串--}}
                                            <div class="content-span">{!!$message->content!!}</div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                @endforeach
                            </div>

                            {{--底部--}}
                            <div class="form-group">
                                <textarea class="form-control wait-send" rows="3"></textarea>
                            </div>
                            <button class="btn btn-primary pull-right"
                                    role="button" id="send">发送
                            </button>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                {{--room end--}}
                <span class="default-value hide" data-default-avatar="{{config('room.default_avatar')}}"
                      data-user-id="{{Auth::user()->id}}" data-room-id="{{$room->id}}"></span>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="{{asset('vendor/chat/js/ws.js')}}"></script>   
@endsection