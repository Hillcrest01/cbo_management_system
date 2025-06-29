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
                         <th scope="col">Member</th>
                         <th scope="col">Amount</th>
                         <th scope="col">Mode</th>
                         <th scope="col">Recorded by:</th>
                         <th scope="col">Payment Date</th>

                         @if(Auth::user() && Auth::user()->role === 'admin')
                         <th scope="col">Edit</a></th>
                         <th scope="col">Delete</th>
                         @endif
                     </tr>
                 </thead>
                 <tbody>
                    @foreach($payments as $payment)
                     <tr>
                         <th scope="row"> {{ $payment->id }} </th>
                         <td> {{$payment->member}} </td>
                         <td> {{$payment->amount}} </td>
                         <td> {{$payment->payment_method}} </td>
                         <td> {{$payment->admin_name}} </td>
                        <td> {{$payment->created_at}} </td>

                         @if(Auth::user() && Auth::user()->role==='admin' )
                         <td><a href="{{url('edit_payment',$payment->id)}}" class="btn btn-secondary">Edit</a></td>
                         <td><a href="{{url('delete_payment',$payment->id)}}" class="btn btn-danger">Delete</a></td>
                         @endif
                     </tr>

                     @endforeach
                     <tr>
                        <td></td>
                        <td style="font-weight: bold;">Total</td>
                        <td style="font-weight: bold;">{{$total}}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                     </tr>
                 </tbody>
             </table>
             @include('admin.footer')
         </div>
     </div>
     @include('admin.js')
 </body>

 </html>