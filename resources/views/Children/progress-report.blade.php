@extends('Children.layout2')
@section('Profile')
    <div class = "grid-container" style = "margin-right: 800px">
        <!-- Profile Picture -->
        <div class = "col mt-3 ms-3 | info">

        </div>
        <div class = "welcome">
            <p class = "mt-auto"> 
                Progress Report
        </div>

        <!-- Main Content Container --> 
   
            <div class="content-container-no-grid py-5 h-100">
                <div class="row g-3">
                    <div class="col-12 col-md-6">
                      <div class="card h-100">
                        <div class="card-body">
                          <div class="d-flex justify-content-between">
                            <div>
                              <h5 class="mb-1">Total orders</h5>
                              <h6 class="text-body-tertiary">Last 7 days</h6>
                            </div>
                            <h4>16,247</h4>
                          </div>
                          <div class="d-flex justify-content-center px-4 py-6">
                            <div class="echart-total-orders" style="height: 85px; width: 115px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); position: relative;" _echarts_instance_="ec_1703798064471"><div style="position: relative; width: 115px; height: 85px; padding: 0px; margin: 0px; border-width: 0px; cursor: default;"><canvas data-zr-dom-id="zr_0" width="172" height="127" style="position: absolute; left: 0px; top: 0px; width: 115px; height: 85px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div><div class="" style="position: absolute; display: block; border-style: solid; white-space: nowrap; z-index: 9999999; box-shadow: rgba(0, 0, 0, 0.2) 1px 2px 10px; background-color: rgb(239, 242, 246); border-width: 1px; border-radius: 4px; color: rgb(20, 24, 36); font: 14px / 21px &quot;Microsoft YaHei&quot;; padding: 7px 10px; top: 0px; left: 0px; transform: translate3d(-85px, 43px, 0px); border-color: rgb(203, 208, 221); pointer-events: none; visibility: hidden; opacity: 0;"><strong>03 May:</strong> 150</div></div>
                          </div>
                          <div class="mt-2">
                            <div class="d-flex align-items-center mb-2">
                              <div class="bullet-item bg-primary me-2"></div>
                              <h6 class="text-body fw-semibold flex-1 mb-0">Completed</h6>
                              <h6 class="text-body fw-semibold mb-0">52%</h6>
                            </div>
                            <div class="d-flex align-items-center">
                              <div class="bullet-item bg-primary-subtle me-2"></div>
                              <h6 class="text-body fw-semibold flex-1 mb-0">Pending payment</h6>
                              <h6 class="text-body fw-semibold mb-0">48%</h6>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="card h-100">
                        <div class="card-body">
                          <div class="d-flex justify-content-between">
                            <div>
                              <h5 class="mb-1">New customers<span class="badge badge-phoenix badge-phoenix-warning rounded-pill fs-9 ms-2"> <span class="badge-label">+26.5%</span></span></h5>
                              <h6 class="text-body-tertiary">Last 7 days</h6>
                            </div>
                            <h4>356</h4>
                          </div>
                          <div class="pb-0 pt-4">
                            <div class="echarts-new-customers" style="height: 180px; width: 100%; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); position: relative;" _echarts_instance_="ec_1703798064466"><div style="position: relative; width: 495px; height: 180px; padding: 0px; margin: 0px; border-width: 0px; cursor: default;"><canvas data-zr-dom-id="zr_0" width="742" height="270" style="position: absolute; left: 0px; top: 0px; width: 495px; height: 180px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div><div class="" style="position: absolute; display: block; border-style: solid; white-space: nowrap; z-index: 9999999; box-shadow: rgba(0, 0, 0, 0.2) 1px 2px 10px; background-color: rgb(239, 242, 246); border-width: 1px; border-radius: 4px; color: rgb(20, 24, 36); font: 14px / 21px &quot;Microsoft YaHei&quot;; padding: 10px; top: 0px; left: 0px; transform: translate3d(325px, 43px, 0px); border-color: rgb(203, 208, 221); pointer-events: none; visibility: hidden; opacity: 0;"><div class="ms-1">
                  <h6 class="fs-9 text-body-tertiary false"><svg class="svg-inline--fa fa-circle me-2" style="color: #5470c6;" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256z"></path></svg><!-- <span class="fas fa-circle me-2" style="color:#5470c6"></span> Font Awesome fontawesome.com -->
          May 07 : 250
        </h6><h6 class="fs-9 text-body-tertiary mb-0"><svg class="svg-inline--fa fa-circle me-2" style="color: #91cc75;" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256z"></path></svg><!-- <span class="fas fa-circle me-2" style="color:#91cc75"></span> Font Awesome fontawesome.com -->
          Apr 07 : 600
        </h6>
                </div></div></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="card h-100">
                        <div class="card-body">
                          <div class="d-flex justify-content-between">
                            <div>
                              <h5 class="mb-2">Top coupons</h5>
                              <h6 class="text-body-tertiary">Last 7 days</h6>
                            </div>
                          </div>
                          <div class="pb-4 pt-3">
                            <div class="echart-top-coupons" style="height: 115px; width: 100%; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); position: relative;" _echarts_instance_="ec_1703798064467"><div style="position: relative; width: 495px; height: 115px; padding: 0px; margin: 0px; border-width: 0px; cursor: default;"><canvas data-zr-dom-id="zr_0" width="742" height="172" style="position: absolute; left: 0px; top: 0px; width: 495px; height: 115px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div><div class=""></div></div>
                          </div>
                          <div>
                            <div class="d-flex align-items-center mb-2">
                              <div class="bullet-item bg-primary me-2"></div>
                              <h6 class="text-body fw-semibold flex-1 mb-0">Percentage discount</h6>
                              <h6 class="text-body fw-semibold mb-0">72%</h6>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                              <div class="bullet-item bg-primary-lighter me-2"></div>
                              <h6 class="text-body fw-semibold flex-1 mb-0">Fixed card discount</h6>
                              <h6 class="text-body fw-semibold mb-0">18%</h6>
                            </div>
                            <div class="d-flex align-items-center">
                              <div class="bullet-item bg-info-dark me-2"></div>
                              <h6 class="text-body fw-semibold flex-1 mb-0">Fixed product discount</h6>
                              <h6 class="text-body fw-semibold mb-0">10%</h6>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="card h-100">
                        <div class="card-body d-flex flex-column">
                          <div class="d-flex justify-content-between">
                            <div>
                              <h5 class="mb-2">Paying vs non paying</h5>
                              <h6 class="text-body-tertiary">Last 7 days</h6>
                            </div>
                          </div>
                          <div class="d-flex justify-content-center pt-3 flex-1">
                            <div class="echarts-paying-customer-chart" style="height: 100%; width: 100%; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); position: relative;" _echarts_instance_="ec_1703798064470"><div style="position: relative; width: 495px; height: 144px; padding: 0px; margin: 0px; border-width: 0px;"><canvas data-zr-dom-id="zr_0" width="742" height="216" style="position: absolute; left: 0px; top: 0px; width: 495px; height: 144px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div><div class=""></div></div>
                          </div>
                          <div class="mt-3">
                            <div class="d-flex align-items-center mb-2">
                              <div class="bullet-item bg-primary me-2"></div>
                              <h6 class="text-body fw-semibold flex-1 mb-0">Paying customer</h6>
                              <h6 class="text-body fw-semibold mb-0">30%</h6>
                            </div>
                            <div class="d-flex align-items-center">
                              <div class="bullet-item bg-primary-subtle me-2"></div>
                              <h6 class="text-body fw-semibold flex-1 mb-0">Non-paying customer</h6>
                              <h6 class="text-body fw-semibold mb-0">70%</h6>
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
                    <a class="nav-link active" aria-current="page" href="{{route('Parent.child_interface', ['id' => $child->id])}}" style = "color: white">
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
                    <a class="nav-link" href="{{ route('getProfile', ['id' => $child->id]) }}" style = "color: white">
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
                    <a class="nav-link" href="#" style="color: white">
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

