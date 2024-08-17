<!-- main-sidebar for parent-->
@switch(Auth()->user()->type)
    @case('parent')
        :
        <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
        <aside class="app-sidebar sidebar-scroll">
            <div class="main-sidebar-header active"
                 style="background-image: url('{{asset('images/logo6.png')}}');background-size:cover">
                <a class="desktop-logo logo-dark active" href="{{ url('/' . $page='index') }}"><img
                        src="{{URL::asset('assets/img/brand/logo-white.png')}}" class="main-logo dark-theme" alt="logo"></a>
                <a class="logo-icon mobile-logo icon-light active" href="{{ url('/' . $page='index') }}"><img
                        src="{{URL::asset('assets/img/brand/favicon.png')}}" class="logo-icon" alt="logo"></a>
                <a class="logo-icon mobile-logo icon-dark active" href="{{ url('/' . $page='index') }}"><img
                        src="{{URL::asset('assets/img/brand/favicon-white.png')}}" class="logo-icon dark-theme"
                        alt="logo"></a>
            </div>
            <div class="main-sidemenu">
                <div class="app-sidebar__user clearfix">
                    <div class="dropdown user-pro-body">
                        <div class="">
                            <img alt="user-img" class="avatar avatar-xl brround"
                                 src="{{asset(Auth::user()->user_type->image)}}"><span
                                class="avatar-status profile-status bg-green"></span>
                        </div>
                        <div class="user-info">
                            <h4 class="font-weight-semibold mt-3 mb-0">{{auth()->user()->name}}</h4>
                            <span class="mb-0 text-muted">{{auth()->user()->type}}</span>
                        </div>
                    </div>
                </div>
                <ul class="side-menu">
                    <li class="side-item side-item-category">Main</li>
                    <li class="slide">
                        <a href="{{route('Parent.viewWallet')}}" class="side-menu__item" style="text-decoration:none">💵
                            &nbsp;<span class="side-menu__label">Wallet</span></a>
                    </li>
                    <li class="slide">
                        <a href="{{route('Parent.issueFeedback')}}" class="side-menu__item"
                           style="text-decoration:none">📰 &nbsp;<span class="side-menu__label">Issue Feedback</span></a>
                    </li>
                    <li class="side-item side-item-category">General</li>
                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="#" style="text-decoration:none">👪
                            &nbsp;<span class="side-menu__label">My Children</span><i
                                class="angle fe fe-chevron-down"></i></a>
                        <ul class="slide-menu">
                            <li><a class="slide-item" href="{{route('Parent.getchilds')}}">All </a></li>
                            <li><a class="slide-item" href="{{route('Parent.addchild')}}">Create Child Account</a></li>
                            <li><a class="slide-item" href="{{route('Parent.viewReports')}}">Progress Reports</a></li>
                        </ul>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"
                           style="text-decoration:none">📚 &nbsp;<span class="side-menu__label">Books</span><i
                                class="angle fe fe-chevron-down"></i></a>
                        <ul class="slide-menu">
                            <li><a class="slide-item" href="{{route('Parent.purchasedBooks')}}">My Books</a></li>
                            <li><a class="slide-item" href="{{route('Parent.buyBooks')}}">Add to cart</a></li>
                            <li><a class="slide-item" href="{{route('Parent.GetCart')}}">My cart</a></li>
                        </ul>
                    </li>
                    <li class="side-item side-item-category">Tutors</li>
                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="#" style="text-decoration: none">👨‍🏫 &nbsp;<span
                                class="side-menu__label">Tutors</span><i class="angle fe fe-chevron-down"></i></a>
                        <ul class="slide-menu">
                            <li><a class="slide-item" href="{{route('Parent.display_tutors')}}">Hire a new tutor</a>
                            </li>
                        </ul>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"
                           style="text-decoration:none">💬 &nbsp;<span class="side-menu__label">Chat</span><i
                                class="angle fe fe-chevron-down"></i></a>
                        <ul class="slide-menu">
                            @if (Auth::user()->user_type->mychidlren->isEmpty())
                                <li><a class="slide-item">No children added</a></li>
                            @else
                                @foreach (Auth::user()->user_type->mychidlren as $child)
                                    <li><a class="slide-item"
                                           href="{{route('Parent.chat',[$child->id,null])}}">{{$child->name}}'s
                                            tutors</a></li>
                                @endforeach
                            @endif

                        </ul>
                    </li>
                </ul>
            </div>
        </aside>
        @break
    @case('tutor')
        <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
        <aside class="app-sidebar sidebar-scroll">
            <div class="main-sidebar-header active"
                 style="background-image: url('{{asset('images/logo6.png')}}');background-size:cover">
                <a class="desktop-logo logo-dark active" href="{{ url('/' . $page='index') }}"><img
                        src="{{URL::asset('assets/img/brand/logo-white.png')}}" class="main-logo dark-theme" alt="logo"></a>
                <a class="logo-icon mobile-logo icon-light active" href="{{ url('/' . $page='index') }}"><img
                        src="{{URL::asset('assets/img/brand/favicon.png')}}" class="logo-icon" alt="logo"></a>
                <a class="logo-icon mobile-logo icon-dark active" href="{{ url('/' . $page='index') }}"><img
                        src="{{URL::asset('assets/img/brand/favicon-white.png')}}" class="logo-icon dark-theme"
                        alt="logo"></a>
            </div>
            <div class="main-sidemenu">
                <div class="app-sidebar__user clearfix">
                    <div class="dropdown user-pro-body">
                        <div class="">
                            <img alt="user-img" class="avatar avatar-xl brround"
                                 src="{{asset(Auth::user()->user_type->image)}}"><span
                                class="avatar-status profile-status bg-green"></span>
                        </div>
                        <div class="user-info">
                            <h4 class="font-weight-semibold mt-3 mb-0">{{auth()->user()->name}}</h4>
                            <span class="mb-0 text-muted">{{auth()->user()->type}}</span>
                        </div>
                    </div>
                </div>
                <ul class="side-menu">
                    <li class="side-item side-item-category">General</li>
                    <li class="slide">
                        <a class="side-menu__item" href="{{route('Tutor.get_students')}}" style="text-decoration:none">🧒
                            &nbsp;<span class="side-menu__label">My Students</span></a>
                    </li>
                    <li class="slide">
                        <a href="{{route('Tutor.getSched')}}" class="side-menu__item"
                           style="text-decoration:none">📆 &nbsp;<span class="side-menu__label">My Schedule</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"
                           style="text-decoration:none">📄 &nbsp;<span class="side-menu__label">Worksheets</span><i
                                class="angle fe fe-chevron-down"></i></a>
                        <ul class="slide-menu">
                            <li><a class="slide-item" href="#">Create a Worksheets</a></li>
                            <li><a class="slide-item" href="#">My worksheets</a></li>
                        </ul>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="#" style="text-decoration:none">💬
                            &nbsp;<span class="side-menu__label">Chat</span><i class="angle fe fe-chevron-down"></i></a>
                        @foreach (Auth::user()->user_type->my_students as $student)
                            <ul class="slide-menu">
                                <li><a class="slide-item"
                                       href="{{route('Tutor.chating',[$student->id,null])}}">{{$student->name}}'s
                                        parent</a></li>
                            </ul>
                        @endforeach
                    </li>
                </ul>
            </div>
        </aside>
        @break
    @case('admin')
        <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
        <aside class="app-sidebar sidebar-scroll">
            <div class="main-sidebar-header active"
                 style="background-image: url('{{asset('images/logo6.png')}}');background-size:cover">
                <a class="desktop-logo logo-dark active" href="{{ url('/' . $page='index') }}"><img
                        src="{{URL::asset('assets/img/brand/logo-white.png')}}" class="main-logo dark-theme" alt="logo"></a>
                <a class="logo-icon mobile-logo icon-light active" href="{{ url('/' . $page='index') }}"><img
                        src="{{URL::asset('assets/img/brand/favicon.png')}}" class="logo-icon" alt="logo"></a>
                <a class="logo-icon mobile-logo icon-dark active" href="{{ url('/' . $page='index') }}"><img
                        src="{{URL::asset('assets/img/brand/favicon-white.png')}}" class="logo-icon dark-theme"
                        alt="logo"></a>
            </div>
            <div class="main-sidemenu">
                <div class="app-sidebar__user clearfix">
                    <div class="dropdown user-pro-body">
                        <div class="">
                            <img alt="user-img" class="avatar avatar-xl brround"
                                 src="{{URL::asset('assets/img/faces/6.jpg')}}"><span
                                class="avatar-status profile-status bg-green"></span>
                        </div>
                        <div class="user-info">
                            <h4 class="font-weight-semibold mt-3 mb-0">{{auth()->user()->name}}</h4>
                            <span class="mb-0 text-muted">{{auth()->user()->type}}</span>
                        </div>
                    </div>
                </div>
                <ul class="side-menu">
                    <li class="side-item side-item-category">User Management</li>
                    <li class="slide">
                        <a class="side-menu__item" href="{{route('Admin.usersaccounts',$type='children')}}"
                           style="text-decoration:none">🧒 &nbsp;<span class="side-menu__label">Students</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" href="{{route('Admin.usersaccounts',$type='parent')}}"
                           style="text-decoration:none">👨‍👩‍👦 &nbsp;<span class="side-menu__label">Parents</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" href="{{route('Admin.usersaccounts',$type='tutor')}}"
                           style="text-decoration:none">👨‍🏫 &nbsp;<span class="side-menu__label">Tutors</span></a>
                    </li>
                    <li class="side-item side-item-category">Content Management</li>
                    <li class="slide">
                        <a href="{{route('Admin.addBook')}}" class="side-menu__item" style="text-decoration:none">📚
                            &nbsp;<span class="side-menu__label">Books</span></a>
                    </li>
                    <li class="slide">
                        <a href="{{route('Admin.media')}}" class="side-menu__item" style="text-decoration:none">📂
                            &nbsp;<span class="side-menu__label">Media requests</span></a>
                    </li>
                    <li class="side-item side-item-category">Services management</li>
                    <li class="slide">
                        <a href="{{route('Admin.displayFeedback',['type'=>'feedback'])}}" class="side-menu__item"
                           style="text-decoration:none">📰 &nbsp;<span class="side-menu__label">Feedbacks</span></a>
                    </li>
                    <li class="slide">
                        <a href="{{route('Admin.displayFeedback',['type'=>'report'])}}" class="side-menu__item"
                           style="text-decoration:none">💬 &nbsp;<span
                                class="side-menu__label">Message reports</span></a>
                    </li>
                </ul>
            </div>
        </aside>
        @break
    @default
@endswitch
