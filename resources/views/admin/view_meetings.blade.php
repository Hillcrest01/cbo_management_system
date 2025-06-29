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
                         <th scope="col">Date</th>
                         <th scope="col">Description</th>

                         @if(Auth::user() && Auth::user()->role === 'admin')
                         <th scope="col">Edit</a></th>
                         <th scope="col">Delete</th>
                         @endif
                     </tr>
                 </thead>
                 <tbody>
                    @foreach($meetings as $meeting)
                     <tr>
                         <th scope="row"> {{ $meeting->id }} </th>
                         <td> {{$meeting->title}} </td>
                         <td> {{$meeting->date}} </td>
                         <td> {{$meeting->summary}} </td>

                         @if(Auth::user() && Auth::user()->role==='admin' )
                         <td><a href="{{url('edit_meeting',$meeting->id)}}" class="btn btn-secondary">Edit</a></td>
                         <td><a href="{{url('delete_meeting',$meeting->id)}}" class="btn btn-danger">Delete</a></td>
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