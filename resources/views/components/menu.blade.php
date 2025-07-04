<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu"
        aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5> <button type="button" class="btn-close"
                data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto ">
            <ul class="nav flex-column ">
                <li class="nav-item"> 
                    <a class="nav-link d-flex  gap-2 " 
                        href="{{ route('dashboard') }}"> 
                        <i class="bi bi-speedometer"></i> Dashboard 
                    </a> </li>

                <li class="nav-item"> 
                    <a class="nav-link d-flex gap-2"
                        href="{{ route('dashboard_orders') }}"> 
                        <i class="bi bi-list-ol"></i> Ordini
                    </a> </li>

                <li class="nav-item"> <a class="nav-link d-flex gap-2" 
                    href="{{ route('dashboard_products') }}"> 
                    <i class="bi bi-journal-richtext"></i>
                        Prodotti
                    </a> </li>

                <li class="nav-item"> <a class="nav-link d-flex gap-2" 
                     href="{{ route('dashboard_customers') }}">
                    <i class="bi bi-people-fill"></i>
                        Clienti
                    </a> </li>
                
            </ul>
            <hr class="my-3">
            <ul class="nav flex-column mb-auto">
                <li class="nav-item"> <a class="nav-link d-flex gap-2" href="#">
                      <i class="bi bi-box-arrow-left"></i>
                        Disconnettiti
                    </a> </li>
            </ul>
        </div>
    </div>
</div>