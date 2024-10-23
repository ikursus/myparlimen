<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">MENU UTAMA</div>
            <a class="nav-link" href="{{ route('panel.dashboard') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            <div class="sb-sidenav-menu-heading">MENU PENGGUNA</div>

            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#ahliCollapse" aria-expanded="false" aria-controls="ahliCollapse">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Ahli Parlimen
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="ahliCollapse" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{ route('ahli.index') }}">Senarai Ahli Parlimen</a>
                    <a class="nav-link" href="{{ route('ahli.create') }}">Tambah Ahli Parlimen</a>
                    <a class="nav-link" href="{{ route('ahli.parlimen') }}">Parlimen</a>
                </nav>
            </div>

            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#usersCollapse" aria-expanded="false" aria-controls="usersCollapse">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Pengguna
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="usersCollapse" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{ route('users.index') }}">Senarai Pengguna</a>
                    <a class="nav-link" href="{{ route('users.create') }}">Tambah Pengguna</a>
                </nav>
            </div>

            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                Pengurusan Data
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">

                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#jawatanCollapse" aria-expanded="false" aria-controls="jawatanCollapse">
                        Jawatan
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="jawatanCollapse" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{ route('jawatan.index') }}">Senarai Jawatan</a>
                            <a class="nav-link" href="{{ route('jawatan.create') }}">Tambah Jawatan Baru</a>
                        </nav>
                    </div>

                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#gelaranCollapse" aria-expanded="false" aria-controls="gelaranCollapse">
                        Gelaran
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="gelaranCollapse" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{ route('gelaran.index') }}">Senarai Gelaran</a>
                            <a class="nav-link" href="{{ route('gelaran.create') }}">Tambah Gelaran Baru</a>
                        </nav>
                    </div>

                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#partiCollapse" aria-expanded="false" aria-controls="partiCollapse">
                        Parti
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="partiCollapse" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{ route('parti.index') }}">Senarai Parti</a>
                            <a class="nav-link" href="{{ route('parti.create') }}">Tambah Parti</a>
                        </nav>
                    </div>

                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#unitCollapse" aria-expanded="false" aria-controls="unitCollapse">
                        Unit
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="unitCollapse" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{ route('unit.index') }}">Senarai Unit</a>
                            <a class="nav-link" href="{{ route('unit.create') }}">Tambah Unit</a>
                        </nav>
                    </div>

                </nav>
            </div>

            <div class="sb-sidenav-menu-heading">Akaun</div>

            <a class="nav-link" href="{{ route('logout') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-sign-out"></i></div>
                Logout
            </a>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        Start Bootstrap
    </div>
</nav>
