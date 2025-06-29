 @include('includes.admin_temp')


 <body class="sb-nav-fixed">
     @include('admin.navbar')
     <div id="layoutSidenav">
         @include('admin.sidebar')
         <div id="layoutSidenav_content">
             <form method="post" action="{{url('update_payment',$payment_to_edit->id)}}" class="mx-5" enctype="multipart/form-data">
                 @csrf

                 <div class="mb-3">
                     <label for="member" class="form-label">Member</label>
                     <select class="form-select" name="member">
                         <option disabled>member who has made the payment</option>
                         @foreach($all_users as $user)
                         <option value="{{$user->name}}" {{ $payment_to_edit->member == $user->name ? 'selected' : '' }}>
                             {{$user->name}}
                         </option>
                         @endforeach
                     </select>
                 </div>

                 <div class="mb-3">
                     <label for="amount" class="form-label">Amount</label>
                     <input value="{{ $payment_to_edit->amount }}" type="integer" class="form-control" id="amount" name="amount">
                 </div>

                 <div class="mb-3">
                     <label for="payment_method" class="form-label">Payment Method</label>
                     <select class="form-select" name="payment_method">
                         <option value="cash" {{ $payment_to_edit->payment_method == 'cash' ? 'selected' : '' }}>Cash</option>
                         <option value="bank" {{ $payment_to_edit->payment_method == 'bank' ? 'selected' : '' }}>Bank</option>
                     </select>
                 </div>

                 <button type="submit" class="btn btn-secondary">Save Changes</button>
             </form>
             @include('admin.footer')
         </div>
     </div>
     @include('admin.js')
 </body>

 </html>