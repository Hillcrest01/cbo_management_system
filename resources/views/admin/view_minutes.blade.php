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


             <table class="table">
                 <thead>
                     <tr>
                         <th scope="col">No.</th>
                         <th scope="col">Title</th>
                         <th scope="col">Meeting</th>
                         <th scope="col">File</th>
                         <th scope="col">Who Added</th>

                         @if(Auth::user() && Auth::user()->role === 'admin')
                         <th scope="col">Edit</a></th>
                         <th scope="col">Delete</th>
                         @endif
                     </tr>
                 </thead>
                 <tbody>
                    @foreach($minutes as $minute)
                     <tr>
                         <th scope="row"> {{ $minute->id }} </th>
                         <td> {{$minute->title}} </td>
                         <td> {{$minute->meeting}} </td>
                        <td> <a target="_blank" class="btn btn-success" href="minutes/{{$minute->file_path}}">View Document</a> </td>
                         <td> {{$minute->user->name}} </td>


                         @if(Auth::user() && Auth::user()->role==='admin' )
                         <td><a href="{{url('edit_minutes',$minute->id)}}" class="btn btn-secondary">Edit</a></td>
                         <td><a href="{{url('delete_minutes',$minute->id)}}" class="btn btn-danger">Delete</a></td>
                         @endif
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