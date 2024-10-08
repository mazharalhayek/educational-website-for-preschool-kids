@extends('layouts.master')
@section('css')
    <style>
        .custom-timestamp {
            font-size: 0.5em;
            color: #888;
        }

        @media (min-width: 576px) {
            .custom-timestamp {
                font-size: 0.9em;
            }
        }

        @media (min-width: 768px) {
            .custom-timestamp {
                font-size: 0.7em;
            }
        }

        .sendbut {
            border: none;
            outline: none;
            background-color: transparent;
            margin-left: -44vw;
        }

        .sendbut:focus {
            outline: none;
            background-color: transparent;
        }

        .messcont {
            flex-grow: 1;
            margin-right: 10px;
        }

        .message-form {
            display: flex;
            align-items: center;
        }
    </style>
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Chat</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Chat with
                    others</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row row-sm main-content-app mb-4">
        <div class="col-xl-4 col-lg-5">
            <div class="card">
                <div class="main-content-left main-content-left-chat">
                    <nav class="nav main-nav-line main-nav-line-chat">
                        <a class="nav-link active" data-toggle="tab" href="">All Chats</a>
                    </nav>
                    @switch(Auth::user()->type)
                        @case('parent')
                            @foreach ($child->my_tutors as $tutor)
                                <div class="main-chat-list" id="ChatList{{ $tutor->id }}">
                                    <div class="media new">
                                        <div class="main-img-user online">
                                            <img alt="" src="{{ asset($tutor->image) }}"> <span>2</span>
                                        </div>
                                        <div class="media-body">
                                            <div class="media-contact-name">
                                                <span>{{ $tutor->name }}</span> <span><a
                                                        href="{{ route('Parent.chat', [$child->id, $tutor->id]) }}"
                                                        style="text-decoration: none"> 💬</a></span>
                                            </div>
                                            <span>{{ $tutor->subject }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @isset($tu)
                    <div class="col-xl-8 col-lg-7">
                        <div class="card">
                            <a class="main-header-arrow" href="" id="ChatBodyHide"><i class="icon ion-md-arrow-back"></i></a>
                            <div class="main-content-body main-content-body-chat">
                                <div class="main-chat-header">
                                    <div class="main-img-user"><img alt=""
                                            src="@isset($tu)
        {{ asset($tu->image) }}">
    @endisset
    </div>
    <div class="main-chat-msg-name">
                                        @isset($tu)
                                            <h6>{{ $tu->name }}</h6>
                                        @endisset
                                    </div>
                                    <nav class="nav">
                                        <a class="nav-link" href=""><i class="icon ion-md-more"></i></a> <a class="nav-link"
                                            data-toggle="tooltip" href="" title="Call"><i class="icon ion-ios-call"></i></a> <a
                                            class="nav-link" data-toggle="tooltip" href="" title="Archive"><i
                                                class="icon ion-ios-filing"></i></a> <a class="nav-link" 
                                            href="{{ route('deleteAllMessages', $tu->id) }}" title="Trash" style="text-decoration: none"><i class="icon ion-md-trash"></i></a> <a class="nav-link"
                                            data-toggle="tooltip" href="" title="View Info"><i
                                                class="icon ion-md-information-circle"></i></a>
                                    </nav>
                                </div><!-- main-chat-header -->
                                @isset($chat)
                                    @foreach ($chat as $message)
                                        @if ($message['senderId'] == Auth::id())
                                            <div class="media">
                                                <div class="main-img-user online"><img alt=""
                                                        src="{{ asset(Auth::user()->user_type->image) }}"></div>
                                                <div class="media-body">
                                                    <div class="main-msg-wrapper right">
                                                        {{ $message['content'] }}
                                                    </div>
                                                    <div>
                                                        <span class="custom-timestamp"><a href="{{ route('Tutor.editMessage',$message['id']) }}" title="Edit" data-toggle="modal"> <i
                                                                    class="fas fa-pencil-alt"></i></a>&nbsp;<a href="{{ route('Tutor.deleteMessage',$message['id']) }}"
                                                                title="Delete"><i class="fas fa-trash-alt"></i></a></span> <a
                                                            href=""><i class="icon ion-android-more-horizontal"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="media flex-row-reverse">
                                                <div class="main-img-user online"><img alt="" src="{{ asset($tu->image) }}">
                                                </div>
                                                <div class="media-body" align="left">
                                                    <a href="{{ route('reportMessage', $message['id']) }}" style="text-decoration: none">❗</a>
                                                    <div class="main-msg-wrapper right">
                                                        {{ $message['content'] }}
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        <div id="editmessage" class="modal fade">
                                            <div class="modal-dialog custom-modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{ route('Tutor.editMessage', $message['id']) }}" method="post" >
                                                        @csrf
                                                        @method('post')
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit child info</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" id="inputName" placeholder="message" name="content" value="{{$message['content']}}" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                                            <input type="submit" class="btn btn-success"value="Apply">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="main-chat-footer">
                                    <nav class="nav">
                                        <a class="nav-link" data-toggle="tooltip" href="" title="Add Photo"><i
                                                class="fas fa-camera"></i><input type="file" name="image" hidden> </a>
                                        <a class="nav-link" data-toggle="tooltip" href="" title="Attach a File"><i
                                                class="fas fa-paperclip"></i></a>
                                        <a class="nav-link" data-toggle="tooltip" href="" title="Add Emoticons"><i
                                                class="far fa-smile"></i></a>
                                        <a class="nav-link" href=""><i class="fas fa-ellipsis-v"></i></a>
                                    </nav>
                                    <form action="
    {{ route('sendMessage', $tu->id) }}
@endisset" method="post"
                                        class="message-form">
                                        @method('post')
                                        @csrf
                                        <input class="form-control messcont" placeholder="Type your message here..." type="text"
                                            name="content">
                                        <button type="submit" class="main-msg-send sendbut"> <i class="far fa-paper-plane"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endisset
                @break

                @case('tutor')
                    @foreach (Auth::user()->user_type->my_students as $student)
                        <div class="main-chat-list" id="ChatList">
                            <div class="media new">
                                <div class="main-img-user online">
                                    <img alt="" src="{{ asset($student->my_parent->image) }}"> <span>2</span>
                                </div>
                                <div class="media-body">
                                    <div class="media-contact-name">
                                        <span>{{ $student->my_parent->name }}</span> <span><a
                                                href="{{ route('Tutor.chating', [$student->id, $student->my_parent->id]) }}"
                                                style="text-decoration: none"> 💬</a></span>
                                    </div>
                                    <span>{{ $child->name }}'s parent</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                </div>
                </div>
                @isset($pu)
                    <div class="col-xl-8 col-lg-7">
                        <div class="card">
                            <a class="main-header-arrow" href="" id="ChatBodyHide"><i class="icon ion-md-arrow-back"></i></a>
                            <div class="main-content-body main-content-body-chat">
                                <div class="main-chat-header">
                                    <div class="main-img-user"><img alt=""
                                            src="@isset($pu)
{{ asset($pu->image) }}">
@endisset
</div>
<div class="main-chat-msg-name">
                                        @isset($pu)
                                            <h6>{{ $pu->name }}</h6>
                                        @endisset
                                    </div>
                                    <nav class="nav">
                                        <a class="nav-link" href=""><i class="icon ion-md-more"></i></a> <a class="nav-link"
                                            data-toggle="tooltip" href="" title="Call"><i class="icon ion-ios-call"></i></a> <a
                                            class="nav-link" data-toggle="tooltip" href="" title="Archive"><i
                                                class="icon ion-ios-filing"></i></a> <a class="nav-link" data-toggle="tooltip"
                                            href="{{ route('deleteAllMessages', $pu->id) }}" title="Trash" style="text-decoration: none"><i class="icon ion-md-trash"></i></a> <a class="nav-link"
                                            data-toggle="tooltip" href="" title="View Info"><i
                                                class="icon ion-md-information-circle"></i></a>
                                    </nav>
                                </div><!-- main-chat-header -->
                                @isset($chat)
                                    @foreach ($chat as $message)
                                        @if ($message['senderId'] == Auth::id())
                                            <div class="media">
                                                <div class="main-img-user online"><img alt=""
                                                        src="{{ asset(Auth::user()->user_type->image) }}"></div>
                                                <div class="media-body">
                                                    <div class="main-msg-wrapper right">
                                                        {{ $message['content'] }}
                                                    </div>
                                                    <div>
                                                        <span class="custom-timestamp"><a href="#editmessage" title="Edit" data-toggle="modal"> <i
                                                                    class="fas fa-pencil-alt"  ></i></a>&nbsp;<a href="{{ route('Tutor.deleteMessage',$message['id']) }}"
                                                                title="Delete"><i class="fas fa-trash-alt"></i></a></span> <a
                                                            href="{{ route('Tutor.editMessage',$message['id']) }}"><i class="icon ion-android-more-horizontal"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="editmessage" class="modal fade">
                                                <div class="modal-dialog custom-modal-dialog">
                                                    <div class="modal-content">
                                                        <form action="{{ route('Tutor.editMessage', $message['id']) }}" method="post" >
                                                            @csrf
                                                            @method('post')
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Edit child info</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control" id="inputName" placeholder="message" name="content" value="{{$message['content']}}" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                                                <input type="submit" class="btn btn-success"value="Apply">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="media flex-row-reverse">
                                                <div class="main-img-user online"><img alt="" src="{{ asset($pu->image) }}">
                                                </div>
                                                <div class="media-body" align="left">
                                                    <a href="{{ route('reportMessage', $message['id']) }}" style="text-decoration: none">❗</a>
                                                    <div class="main-msg-wrapper right">
                                                        {{ $message['content'] }}
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="main-chat-footer">
                                    <nav class="nav">
                                        <a class="nav-link" data-toggle="tooltip" href="" title="Add Photo"><i
                                                class="fas fa-camera"></i><input type="file" name="image" hidden> </a>
                                        <a class="nav-link" data-toggle="tooltip" href="" title="Attach a File"><i
                                                class="fas fa-paperclip"></i></a>
                                        <a class="nav-link" data-toggle="tooltip" href="" title="Add Emoticons"><i
                                                class="far fa-smile"></i></a>
                                        <a class="nav-link" href=""><i class="fas fa-ellipsis-v"></i></a>
                                    </nav>
                                    <form action="
{{ route('sendMessage', $pu->id) }}
@endisset" method="post" class="message-form">
                                        @method('post')
                                        @csrf
                                        <input class="form-control messcont" placeholder="Type your message here..." type="text"
                                            name="content">
                                        <button type="submit" class="main-msg-send sendbut"> <i class="far fa-paper-plane"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endisset
                @break

                @default
            @endswitch
            </div>
            </div>
            </div>
            </div>
            <!-- row -->
            </div>
            <!-- Container closed -->
            </div>
            <!-- main-content closed -->
        @endsection
        @section('js')
            <!--Internal  lightslider js -->
            <script src="{{ URL::asset('assets/plugins/lightslider/js/lightslider.min.js') }}"></script>
            <!--Internal  Chat js -->
            <script src="{{ URL::asset('assets/js/chat.js') }}"></script>
            <!-- Include jQuery -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        @endsection
