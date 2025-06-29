 @include('includes.admin_temp')

 <!-- Authentication -->
 <form method="POST" action="{{ route('logout') }}">
     @csrf

     <x-dropdown-link :href="route('logout')"
         onclick="event.preventDefault();
                                                this.closest('form').submit();">
         {{ __('Log Out') }}
     </x-dropdown-link>
 </form>


 <body class="sb-nav-fixed">
     @include('admin.navbar')
     <div id="layoutSidenav">
         @include('admin.sidebar')
         <div id="layoutSidenav_content">
             <form method="post" action="{{url('add_payment')}}" class="mx-5" enctype="multipart/form-data">
                 @csrf

                 <div class="mb-3">
                     <label for="member" class="form-label"> Member </label>
                     <select class="form-select" name="member">
                         <option disabled selected>member who has made the payments</option>
                         @foreach($all_users as $user)
                         <option value="{{$user->name}}">{{$user->name}}</option>
                         @endforeach
                     </select>

                     <div class="mb-3">
                         <label for="amount" class="form-label">Amount</label>
                         <input type="integer" class="form-control" id="amount" name="amount">
                     </div>

                     <select class="form-select" name="payment_method">
                         <option value="cash">Cash</option>
                         <option value="bank">Bank</option>
                     </select>

                 </div>
                 <button type="submit" class="btn btn-success">Register Payment</button>
             </form>
             @include('admin.footer')
         </div>
     </div>
     @include('admin.js')
 </body>

 </html>