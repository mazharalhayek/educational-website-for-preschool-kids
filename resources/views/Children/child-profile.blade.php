@extends('Children.layout2')
@section('Profile')
    <div class = "grid-container" style = "margin-right: 800px">
        <!-- Profile Picture -->
        <div class = "col mt-3 ms-3 | info">

        </div>
        <div class = "welcome">
            <p class = "mt-auto"> 
                Profile
        </div>

        <!-- Main Content Container --> 
   
            <div class="content-container-no-grid py-5 h-100">
                <div class="row justify-content-center align-items-center h-100">
                  <div class="col col-lg-6 mb-4 mb-lg-0 w-100 h-100">
                    <div class="card mb-3  " style="border-radius: .5rem; min-height: 720px">
                      <div class="row g-0">
                        <div class="col-md-4 gradient-custom text-center text-white"
                          style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                            alt="Avatar" class="img-fluid my-5" style="width: 400px;" />
                          <h5 class = "fw-7 fs-2">{{$child->name}}</h5>
                          <p class = "fw-7 fs-2"> Age: {{$child->age}}</p>
                          <i class="far fa-edit mb-5"></i>
                        </div>
                        <div class="col-md-8 my-auto">
                          <div class="card-body p-7" >
                            <h6>Information</h6>
                            <hr class="mt-0 mb-4">
                            <div class="row pt-1">
                              <div class="col-6 mb-3">
                                <h6>Parent's Name</h6>
                                <p class="text-muted">{{$child->my_parent->name}}</p>
                              </div>
                             
                            </div>
                        
                            <div class="row pt-1">
                              <div class="col-6 mb-3">
                                <h6>Created At</h6>
                                <p class="text-muted">{{$child->created_at}}</p>
                              </div>
                              <div class="col-6 mb-3">
                                <h6>Last Updated At</h6>
                                <p class="text-muted">{{$child->updated_at}}</p>
                              </div>
                            </div>
                        
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            
        </div>


        <!-- SideBar -->
        <div class = "col mt-3 ms-3  | sidebar">
            <ul class="nav flex-column mx-auto mt-3 pt-2">
                <li class="nav-item mt-4">
                    <a class="nav-link active" aria-current="page" href="{{route('child_interface', ['id' => $child->id])}}" style = "color: white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor"
                            class="bi bi-house-door" viewBox="0 0 16 16">
                            <path
                                d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4z" />

                        </svg>
                        <br>
                        Home
                    </a>
                </li>
                <li class="nav-item pt-2">
                    <form action="{{ route('getProfile', ['id' => $child->id]) }}" method="GET">
                    @csrf
                    <a class="nav-link" href="#" style = "color: white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor"
                            class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                        </svg>
                        <br>
                        Profile
                    </a>
                   </form>
                </li>
                <li class="nav-item pt-2">
                    <a class="nav-link" href="#" style = "Color: white"> <svg xmlns="http://www.w3.org/2000/svg"
                            width="70" height="70" fill="currentColor" class="bi bi-chat-left-dots"
                            viewBox="0 0 16 16">
                            <path
                                d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                            <path
                                d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0m4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0m4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0" />
                        </svg>
                        <br>
                        Chat</a>
                </li>
                <li class="nav-item pt-2">
                    <a class="nav-link" href="#" style="color: white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor"
                            class="bi bi-file-earmark" viewBox="0 0 16 16">
                            <path
                                d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z" />
                        </svg>
                        <br> Tests</a>
                </li>
                <li class="nav-item pt-2">
                    <a class="nav-link" href="{{route('viewReport', ['id' => $child->id])}}" style="color: white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor"
                            class="bi bi-graph-up-arrow" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M0 0h1v15h15v1H0zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5" />
                        </svg>
                        <br>
                        Progress Report
                    </a>
                </li>
                <li class="nav-item pt-2" >
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">
                        <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor"
                            class="bi bi-door-closed-fill" viewBox="0 0 16 16">
                            <path
                                d="M12 1a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2a1 1 0 0 1 1-1zm-2 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                        </svg>
                        <br>
                        Logout
                    </a>
                </li>
            </ul>
        </div>

    </div>

    </div>
@endsection

