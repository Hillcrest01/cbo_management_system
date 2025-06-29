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
             <form method="post" action="{{url('upload_minutes')}}" class="mx-5" enctype="multipart/form-data">
                 @csrf


                 <div class="mb-3">
                     <label for="title" class="form-label">Title</label>
                     <input type="text" class="form-control" id="title" name="title">
                 </div>
                 <div class="mb-3">
                     <label for="meeting" class="form-label"> Meeting </label>
                     <select class="form-select" name="meeting">
                         <option disabled selected>select meeting agreed</option>
                         @foreach($meeting as $meeting)
                         <option value="{{$meeting->title}}">{{$meeting->title}}</option>
                         @endforeach
                     </select>
                 </div>
                 <div class="mb-3">
                     <label for="document" class="form-label">Document</label>
                     <input type="file" class="form-control" id="document" name="document">
                 </div>
                 <button type="submit" class="btn btn-secondary">Add Minutes</button>
             </form>
             @include('admin.footer')
         </div>
     </div>
     @include('admin.js')
 </body>

 </html>