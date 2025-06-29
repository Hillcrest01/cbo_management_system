 @include('includes.admin_temp')
 
                        <body class="sb-nav-fixed">
                            @include('admin.navbar')
                            <div id="layoutSidenav">
                            @include('admin.sidebar')
                                <div id="layoutSidenav_content">
                                @include('admin.main_content')
                                    @include('admin.footer')
                                </div>
                            </div>
                                    @include('admin.js')
                        </body>

                        </html>