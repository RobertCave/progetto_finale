 <header class="p-3 text-bg-dark">
     <div class="container">
         <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start"> <a
                 href="{{ route('homepage') }}"
                 class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                 <h1> <i class="bi bi-journal-text"> </i> </h1>
             </a>
             <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                 <li><a href={{ route('homepage') }} class="nav-link px-2 text-secondary">The Book Shop</a></li>
                 <li><a href="{{ route('shop') }}" class="nav-link px-2 text-white">Shop</a></li>

                 <li class="nav-item dropdown "> <a class="nav-link px-2 text-white dropdown-toggle" href="#"
                                data-bs-toggle="dropdown" aria-expanded="false">Generi letterari</a>
                            <ul class="dropdown-menu">

                                @foreach ( $categories as $category)
                                    <li><a class="dropdown-item" href="{{ route('shop.category', $category->id) }}">{{ $category['name'] }}</a></li>
                                @endforeach
                                
                            </ul>
                        </li>

                 <li><a href={{ route('faq') }} class="nav-link px-2 text-white">FAQs</a></li>
                 <li><a href={{ route('contact') }} class="nav-link px-2 text-white">Contattaci</a></li>
             </ul>

             

             <div class="text-end">
                 @auth
                     <div class="flex-shrink-0 dropdown "> <a href="#"
                             class="d-block link-body-emphasis text-decoration-none dropdown-toggle text-white"
                             data-bs-toggle="dropdown" aria-expanded="false"> <i
                                 class="bi bi-person-circle text-white display-6"></i></a>
                         <ul class="dropdown-menu text-small shadow">
                             <li class="dropdown-item" href="#">Utente: <strong>{{ Auth::user()->name }} </strong>
                             </li>
                             @if(Auth::user()->is_admin)
                             <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                             @endif
                             <li>
                                 <hr class="dropdown-divider">
                             </li>
                             <li><a class="dropdown-item" href="{{ route('cart') }}">Carrello</a></li>
                             <li><a class="dropdown-item" href="{{ route('user.orders') }}">Ordini</a></li>

                                 <hr class="dropdown-divider">
                             </li>
                             <li><a href="{{ route('logout') }}"
                                     onclick="event.preventDefault(); document.getElementById('form-logout').submit();"
                                     class="dropdown-item"> Logout</a></li>
                         </ul>
                         <form action="{{ route('logout') }}" method="POST" class="d-none" id="form-logout">
                             @csrf
                         </form>
                     </div>
                 @else
                     <a href="{{ route('login') }}" class="btn btn-outline-light me-2"><i
                             class="bi bi-box-arrow-in-right"></i> Login</a>
                     <a href="{{ route('register') }}" class="btn btn-warning"><i class="bi bi-plus"></i> Registrati</a>
                 </div>
             @endauth

         </div>
     </div>
 </header>
