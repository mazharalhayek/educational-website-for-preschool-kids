@extends('Children.layout')
@section('dashboard1')
    <div class = "grid-container" style = "margin-right: 800px">
        <!-- Profile Picture -->
        <div class = "col mt-3 ms-3 | info">

        </div>
        <div class = "welcome">
            <p class = "mt-auto"> Books</p>
        </div>

        <!-- Main Content Container -->
        <div class = "content-container pt-3 content-container-fix">

            <div class="card" style="width: 24rem; max-height: 600px;">
                <img src="/images/books/lost-and-found.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Book title</h5>
                    <p class="card-text"
                        style="  font-size: 1rem; 
                    font-weight: 400; 
                    color: black;">
                        Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Read Book
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Book title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <embed type="application/pdf" src="/pdfs/Biometrics.pdf" class = "mx-auto"
                                        width="1100px" height="600" style = "position: relative">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- SideBar -->
            <div class = "col mt-3 ms-3  | sidebar fix">
                <ul class="nav flex-column mx-auto mt-3 pt-2">
                    <li class="nav-item mt-4">
                        <a class="nav-link active" aria-current="page"
                            href="{{ route('child_interface', ['id' => $child->id]) }}" style = "color: white">
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
                            <a class="nav-link" href="{{ route('getProfile', ['id' => $child->id]) }}"
                                style = "color: white">
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
                    <li class="nav-item pt-2">
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
