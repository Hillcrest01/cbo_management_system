                                <div id="layoutSidenav_nav">
                                    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                                        <div class="sb-sidenav-menu">
                                            <div class="nav">
                                                <div class="sb-sidenav-menu-heading">Core</div>
                                                <a class="nav-link" href="@if(Auth::user() && Auth::user()->role==='admin' ){{url('admin/dashboard')}}@endif" href="{{url('dashboard')}}">
                                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                                    Dashboard
                                                </a>
                                                <div class="sb-sidenav-menu-heading">Interface</div>
                                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                                    Meetings
                                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                                </a>
                                                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                                    <nav class="sb-sidenav-menu-nested nav">
                                                         @if(Auth::user() && Auth::user()->role==='admin' )
                                                        <a class="nav-link" href="{{url('add_meeting')}}">Add a Meeting</a>
                                                        @endif
                                                        <a class="nav-link" href="{{url('view_meetings')}}">View Meetings</a>
                                                    </nav>
                                                </div>
                                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                                    Documents
                                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                                </a>
                                                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                                            Meeting Minutes
                                                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                                        </a>
                                                        <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                                            <nav class="sb-sidenav-menu-nested nav">
                                                                 @if(Auth::user() && Auth::user()->role==='admin' )
                                                                <a class="nav-link" href="{{url('add_minutes')}}">Add Minutes</a>
                                                                @endif
                                                                <a class="nav-link" href="{{url('view_minutes')}}">View Minutes</a>
                                                            </nav>
                                                        </div>
                                                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                                            CBO Constitution
                                                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                                        </a>
                                                        <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                                            <nav class="sb-sidenav-menu-nested nav">
                                                                <a class="nav-link" target="_blank" href="https://mag.wcoomd.org/uploads/2018/05/blank.pdf">The Constitution</a>
                                                                <a class="nav-link" target="_blank" href="https://mag.wcoomd.org/uploads/2018/05/blank.pdf">Registered Members</a>
                                                                <a class="nav-link" target="_blank" href="https://mag.wcoomd.org/uploads/2018/05/blank.pdf">Our Projects</a>
                                                            </nav>
                                                        </div>

                                                    </nav>
                                                </div>
                                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                                    Payments
                                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                                </a>
                                                <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                                    <nav class="sb-sidenav-menu-nested nav">
                                                         @if(Auth::user() && Auth::user()->role==='admin' )
                                                        <a class="nav-link" href="{{url('register_payment')}}">Register Payment</a>
                                                        @endif
                                                        <a class="nav-link" href="{{url('my_payments',$user->id)}}">My Payments</a>
                                                    </nav>
                                                </div>

                                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pageCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                                    Withdrawals
                                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                                </a>
                                                <div class="collapse" id="pageCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                                    <nav class="sb-sidenav-menu-nested nav">
                                                         @if(Auth::user() && Auth::user()->role==='admin' )
                                                        <a class="nav-link" href="{{url('make_withdrawal')}}">Make Withdrawal</a>
                                                        @endif
                                                        <a class="nav-link" href="{{url('view_withdrawal')}}">View Withdawals</a>
                                                    </nav>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sb-sidenav-footer">
                                            <div class="small">Logged in as:</div>
                                            {{$user->name}}
                                        </div>
                                    </nav>
                                </div>