                                    <main>
                                        <div class="container-fluid px-4">
                                            <h1 class="mt-4">Dashboard</h1>
                                            <ol class="breadcrumb mb-4">
                                                <li class="breadcrumb-item active">Dashboard</li>
                                            </ol>
                                            <div class="row">
                                                <div class="col-xl-3 col-md-6">
                                                    <div class="card bg-primary text-white mb-4">
                                                        <div class="card-body">All Members: &nbsp; &nbsp;  {{$total_members}}</div>
                                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                                            <a class="small text-white stretched-link" href="#">View Members</a>
                                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-md-6">
                                                    <div class="card bg-secondary text-white mb-4">
                                                        <div class="card-body">Total Payments:  &nbsp; &nbsp;  {{$total_payments}}</div>
                                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                                            <a class="small text-white stretched-link" href="{{url('view_payments')}}">View Payments</a>
                                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-md-6">
                                                    <div class="card bg-success text-white mb-4">
                                                        <div class="card-body">Withdrawals: &nbsp; &nbsp;  {{$total_withdrawals}}</div>
                                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                                            <a class="small text-white stretched-link" href="{{url('view_withdrawal')}}">View Withdrawals</a>
                                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-md-6">
                                                    <div class="card bg-danger text-white mb-4">
                                                        <div class="card-body">Amount Available: &nbsp; &nbsp;  {{$available_amount}}</div>
                                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                                            <a class="small text-white stretched-link" href="#">Recent Transactions</a>
                                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <div class="card mb-4">
                                                        <div class="card-header">
                                                            <i class="fas fa-chart-area me-1"></i>
                                                            Recent Meetings
                                                        </div>
                                                        <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">No.</th>
                                                                    <th scope="col">Title</th>
                                                                    <th scope="col">Date</th>
                                                                    <th scope="col">Description</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($meetings as $meeting)
                                                                <tr>
                                                                    <th scope="row" class="text-warning"> {{ $meeting->id }} </th>
                                                                    <td class="text-primary"> {{$meeting->title}} </td>
                                                                    <td class="text-danger"> {{$meeting->date}} </td>
                                                                    <td class="text-success"> {{$meeting->summary}} </td>
                                                                </tr>

                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <div class="card mb-4">
                                                        <div class="card-header">
                                                            <i class="fas fa-chart-bar me-1"></i>
                                                            Recent Minutes
                                                        </div>
                                                        <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">No.</th>
                                                                    <th scope="col">Title</th>
                                                                    <th scope="col">Meeting</th>
                                                                    <th scope="col">File</th>
                                                                    <th scope="col">Who Added</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($minutes as $minute)
                                                                <tr>
                                                                    <th scope="row" class="text-warning"> {{ $minute->id }} </th>
                                                                    <td class="text-primary"> {{$minute->title}} </td>
                                                                    <td class="text-danger"> {{$minute->meeting}} </td>
                                                                    <td> <a target="_blank" class="btn btn-success btn-sm" href="minutes/{{$minute->file_path}}">View Document</a> </td>
                                                                    <td class="text-success"> {{$minute->user->name}} </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </main>