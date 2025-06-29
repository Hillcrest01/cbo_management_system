 @include('includes.admin_temp')

 <body class="sb-nav-fixed">
     @include('admin.navbar')
     <div id="layoutSidenav">
         @include('admin.sidebar')
         <div id="layoutSidenav_content">


             <table class="table">
                 <thead>
                     <tr>
                         <th scope="col">No.</th>
                         <th scope="col">Amount</th>
                         <th scope="col">Description</th>
                         <th scope="col">Recorded by:</th>
                         <th scope="col">Withdrawal Date</th>

                         @if(Auth::user() && Auth::user()->role === 'admin')
                         <th scope="col">Edit</a></th>
                         <th scope="col">Delete</th>
                         @endif
                     </tr>
                 </thead>
                 <tbody>
                    @foreach($withdrawals as $withdrawal)
                     <tr>
                         <th scope="row"> {{ $withdrawal->id }} </th>
                         <td> {{$withdrawal->amount}} </td>
                         <td> {{$withdrawal->description}} </td>
                         <td> {{$withdrawal->admin_name}} </td>
                        <td> {{$withdrawal->created_at}} </td>

                         @if(Auth::user() && Auth::user()->role==='admin' )
                         <td><a href="#" class="btn btn-secondary">Edit</a></td>
                         <td><a href="#" class="btn btn-danger">Delete</a></td>
                         @endif
                     </tr>

                     <tr>
                        <td><strong>Total</strong></td>
                        <td><strong>{{$total_withdrawals}}</strong></td>

                     </tr>

                     @endforeach
                 </tbody>
             </table>
             @include('admin.footer')
         </div>
     </div>
     @include('admin.js')
 </body>

 </html>