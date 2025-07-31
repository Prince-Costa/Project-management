     <!-- Sidebar Start -->
     <div class="sidebar pe-4 pb-3">
        <nav class="navbar navbar-light">
            {{-- <a href="index.html" class="navbar-brand mx-4 mb-3">
                <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>DarkPan</h3>
            </a> --}}
            @auth
            <div class="d-flex align-items-center ms-4 mb-4">
                <div class="position-relative">
                    <img class="rounded-circle" src="{{asset('admin/img/user2.png')}}" alt="" style="width: 40px; height: 40px;">
                    <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                </div>
                <div class="ms-3">
                    <h6 class="mb-0 text-white">{{auth()->user()->name}}</h6>
                    <span>{{auth()->user()->role}}</span>
                </div>
            </div>


            <div class="navbar-nav w-100">
                <a href="{{route('dashboard')}}" class="nav-item nav-link {{Route::is('dashboard') ? 'active' : ''}}"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                @if (isAdmin())
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle {{ Route::is('contacts*') ? 'show active' : ''}}" data-bs-toggle="dropdown"><i class="fa-solid fa-address-book me-2"></i>Contact</a>
                    <div class="dropdown-menu bg-transparent border-0 {{Route::is('contacts*')  ? 'show' : ''}}">
                        <a href="{{route('contacts.create')}}" class="dropdown-item {{Route::is('contacts.create') ? 'active' : ''}}">Add Contact</a>
                        <a href="{{route('contacts.index')}}" class="dropdown-item {{Route::is('contacts.index') ? 'active' : ''}}">Contacts</a>  
                    </div>
                </div> 

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle {{Route::is('quotations*') ? 'show active' : ''}}" data-bs-toggle="dropdown">
                        <i class="fa-solid fa-file-invoice me-2"></i>Quote</a>
                    <div class="dropdown-menu bg-transparent border-0 {{Route::is('quotations*')  ? 'show' : ''}}">
                        <a href="{{route('quotations.create')}}" class="dropdown-item {{Route::is('quotations.create') ? 'active' : ''}}">Add Quote</a>
                        <a href="{{route('quotations.index')}}" class="dropdown-item {{Route::is('quotations.index') ? 'active' : ''}}">Quotes</a>  
                    </div>
                </div> 

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle {{Route::is('invoices*') ? 'show active' : ''}}" data-bs-toggle="dropdown">
                        <i class="fa-solid fa-file-invoice-dollar me-2"></i>Invoice</a>
                    <div class="dropdown-menu bg-transparent border-0 {{Route::is('invoices*')  ? 'show' : ''}}">
                        <a href="{{route('invoices.create')}}" class="dropdown-item {{Route::is('invoices.create') ? 'active' : ''}}">Add Invoice</a>
                        <a href="{{route('invoices.index')}}" class="dropdown-item {{Route::is('invoices.index') ? 'active' : ''}}">Invoices</a>  
                    </div>
                </div> 

                @endif

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle {{Route::is('projects*') ? 'show active' : ''}}" data-bs-toggle="dropdown"><i class="fa-solid fa-laptop-code me-2"></i>Project</a>
                    <div class="dropdown-menu bg-transparent border-0 {{Route::is('projects*')  ? 'show' : ''}}">
                        <a href="{{route('projects.create')}}" class="dropdown-item {{Route::is('projects.create') ? 'active' : ''}}">Add Project</a>
                        <a href="{{route('projects.index')}}" class="dropdown-item {{Route::is('projects.index') ? 'active' : ''}}">Projects</a>  
                    </div>
                </div> 

                @if (isAdmin())
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle {{ Route::is('transections*') ? 'show active' : ''}}" data-bs-toggle="dropdown"><i class="fa-solid fa-money-check-dollar me-2"></i>Transaction</a>
                    <div class="dropdown-menu bg-transparent border-0 {{Route::is('transections*')  ? 'show' : ''}}">
                        <a href="{{route('transections.create')}}" class="dropdown-item {{Route::is('transections.create') ? 'active' : ''}}">Add Transaction</a>
                        <a href="{{route('transections.index')}}" class="dropdown-item {{Route::is('transections.index') ? 'active' : ''}}">Transactions</a>
                        <a href="{{route('transections.dues')}}" class="dropdown-item {{Route::is('transections.dues') ? 'active' : ''}}">Dues</a>  
                    </div>
                </div> 

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle {{ Route::is('todos*') ? 'show active' : ''}}" data-bs-toggle="dropdown"><i class="fa-solid fa-list me-2"></i>Todo</a>
                    <div class="dropdown-menu bg-transparent border-0 {{Route::is('todos*')  ? 'show' : ''}}">
                        <a href="{{route('todos.create')}}" class="dropdown-item {{Route::is('todos.create') ? 'active' : ''}}">Add Todo</a>
                        <a href="{{route('todos.index')}}" class="dropdown-item {{Route::is('todos.index') ? 'active' : ''}}">Todos</a>  
                    </div>
                </div> 
          
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle {{Route::is('users*') ? 'show active' : ''}}" data-bs-toggle="dropdown"><i class="fa-solid fa-users me-2"></i>Users</a>
                    <div class="dropdown-menu bg-transparent border-0 {{Route::is('users*') ? 'show' : ''}}">
                        
                        <a href="{{route('users.index')}}" class="dropdown-item {{Route::is('users*') ? 'active' : ''}}">Users</a>
                    </div>
                </div>  

             
                <a href="{{route('settings.index')}}" class="nav-item nav-link {{Route::is('settings*') ? 'active' : ''}}"><i class="fa-solid fa-gear me-2"></i>Settings</a>
                @endif

                
            </div>

            @endauth

            @guest
            <a href="index.html" class="navbar-brand mx-4 mb-3 my-3">
                <p class="text-primary">Log In To Access</p>
            </a>
            <div class="navbar-nav w-100 mt-2">
                <a href="{{ route('login') }}" class="nav-item nav-link {{ Route::is('login') || Route::is('home') ? 'active' : '' }}"><i class="fa-solid fa-right-to-bracket me-2"></i>Sign In</a>     
                {{-- <a href="{{ route('register') }}" class="nav-item nav-link {{ Route::is('register') ? 'active' : '' }}"><i class="fa fa-edit me-2"></i>Sign Up</a> --}}           
            </div>
            @endguest          
        </nav>
    </div>
    <!-- Sidebar End -->