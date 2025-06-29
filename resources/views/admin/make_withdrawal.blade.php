 @include('includes.admin_temp')

 <body class="sb-nav-fixed">
     @include('admin.navbar')
     <div id="layoutSidenav">
         @include('admin.sidebar')
         <div id="layoutSidenav_content">
             <form method="post" action="{{url('withdraw')}}" class="mx-5" enctype="multipart/form-data">
                 @csrf

                 <div class="mb-3">
                     <div class="mb-3">
                         <label for="amount" class="form-label">Amount</label>
                         <input type="integer" class="form-control" id="amount" name="amount">
                     </div>

                     <div class="mb-3">
                         <label for="amount" class="form-label">Description</label>
                         <input type="text" class="form-control" id="description" name="description">
                     </div>

                 </div>
                 <button type="submit" class="btn btn-success">Make Withdrawal</button>
             </form>
             @include('admin.footer')
         </div>
     </div>
     @include('admin.js')
 </body>

 </html>