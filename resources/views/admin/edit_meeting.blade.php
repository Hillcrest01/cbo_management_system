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
             <form method="post" action="{{url('update_meeting', $meeting->id)}}" class="mx-5">
                @csrf

                
                 <div class="mb-3">
                    <h2>Edit a Meeting</h2>
                     <label for="title" class="form-label">Title</label>
                     <input value="{{$meeting->title}}" type="text" class="form-control" id="title" name="title">
                 </div>
                 <div class="mb-3">
                     <label for="date" class="form-label"> Date </label>
                     <input value="{{$meeting->date}}" type="date" class="form-control" id="date" name="date">
                 </div>
                 <div class="mb-3">
                     <label for="summary" class="form-label">Summary</label>
                     <input value="{{$meeting->summary}}" type="textarea" class="form-control" id="summary" name="summary">
                 </div>
                 <button type="submit" class="btn btn-secondary">Update Meeting</button>
             </form>
             @include('admin.footer')
         </div>
     </div>
     @include('admin.js')
 </body>

 </html>