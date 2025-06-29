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
             <form method="post" action="{{url('update_minutes', $minute->id)}}" class="mx-5" enctype="multipart/form-data">
                 @csrf


                 <div class="mb-3">
                     <label for="title" class="form-label">Title</label>
                     <input type="text" class="form-control" value="{{$minute->title}}" id="title" name="title">
                 </div>
                 <div class="mb-3">
                     <label for="meeting" class="form-label">Meeting</label>
                     <select class="form-select" name="meeting" id="meeting">
                         <option disabled>Select meeting agreed</option>
                         @foreach($meeting as $m)
                         <option value="{{$m->title}}" {{ ($minute->meeting == $m->title) ? 'selected' : '' }}>
                             {{$m->title}}
                         </option>
                         @endforeach
                     </select>
                 </div>

                 <div class="mb-3">
                     <label for="document" class="form-label">Document</label>
                     <input type="file" class="form-control" id="document" name="document">

                     @if($minute->file_path)
                     <p>Current Document: <a href="/minutes/{{$minute->file_path}}" target="_blank">View</a></p>
                     @endif
                 </div>

                 <button type="submit" class="btn btn-secondary">Update Minutes</button>
             </form>
             @include('admin.footer')
         </div>
     </div>
     @include('admin.js')
 </body>

 </html>