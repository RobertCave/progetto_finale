<div class="container-fluid ">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start "
                    id="menu">
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link align-middle px-0 text-white">
                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline ">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard_orders') }}" class="nav-link px-0 align-middle text-white">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Ordini</span></a>
                    </li>
                    <li>
                        <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle text-white">
                            <i class="fs-4 bi-journal-richtext"></i> <span
                                class="ms-1 d-none d-sm-inline">Prodotti</span></a>
                        <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="{{ route('dashboard.books.create') }}" class="nav-link px-0 text-white"> <span
                                        class="d-none d-sm-inline">Aggiungi un prodotto</span></a>
                            </li>
                            <li class="w-100">
                                <a href="{{ route('dashboard.books.list') }}" class="nav-link px-0 text-white"> <span
                                        class="d-none d-sm-inline">Elenco prodotti</span></a>
                            </li>
                        </ul>
                    </li>
                   
                    <li>
                        <a href="{{ route('dashboard_customers') }}" class="nav-link px-0 align-middle text-white">
                            <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Clienti </span> </a>
                    </li>
                </ul>
                <hr>
                <div class="dropdown pb-1">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                        id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30"
                            class="rounded-circle">
                        <span class="d-none d-sm-inline mx-1">Utente</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('form-logout').submit();">Sign
                                out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <form action="{{ route('logout') }}" method="POST" class="d-none" id="form-logout">
            @csrf
        </form>
