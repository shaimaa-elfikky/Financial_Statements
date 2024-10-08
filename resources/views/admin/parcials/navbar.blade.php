 <nav class="topnav navbar navbar-light">
     <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
         <i class="fe fe-menu navbar-toggler-icon"></i>
     </button>
     <form class="form-inline mr-auto searchform text-muted">
         <input class="form-control mr-sm-2 bg-transparent border-0 pl-4 text-muted" type="search"
             placeholder="Type something..." aria-label="Search">
     </form>
     @php
         $local = LaravelLocalization::getCurrentLocale()== 'ar' ? 'en' : 'ar' ;
     @endphp
     <ul class="nav">
         <li class="nav-item">
            @include('admin.parcials.langauge')
         </li>
         <li class="nav-item">
             <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-shortcut">
                 <span class="fe fe-grid fe-16"></span>
             </a>
         </li>

         <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink"
                 role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <span class="avatar avatar-sm mt-2">
                     <i class="fe fe-user-check" style=" font-size: 1.5rem;"></i>
                 </span>
             </a>
             <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                 <a class="dropdown-item" href="#">Profile</a>
                 <a class="dropdown-item" href="#">Settings</a>
                 <a class="dropdown-item" href="#">Activities</a>
                 <form action="{{ route('logout') }}" method="POST">
                     @csrf
                     <button class="dropdown-item text-danger" type="submit"> Logout </button>
                 </form>
             </div>
         </li>
     </ul>
 </nav>
