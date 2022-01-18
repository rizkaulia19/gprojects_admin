<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    Dashboard
                </a>
                <a class="nav-link" href="{{ route('projects.index') }}">
                    Project
                </a>
                <a class="nav-link" href="{{ route('users.index') }}">
                    User
                </a>
                <a class="nav-link" href="{{ route('dss') }}">
                    SPK Spesialisasi
                </a>
                <div class="sb-sidenav-menu-heading">Master Data</div>
                <a class="nav-link" href="{{ route('specializations.index') }}">
                    Specializations
                </a>
                <a class="nav-link" href="{{ route('roles.index') }}">
                    Roles
                </a>
                <a class="nav-link" href="{{ route('banks.index') }}">
                    Banks
                </a>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseAdvertise" aria-expanded="false" aria-controls="collapseLayouts">
                    Advertises
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseAdvertise" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('advertises.index') }}">Advertises</a>
                        <a class="nav-link" href="{{ route('advertise-types.index') }}">Advertise Types</a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePaymentGateway" aria-expanded="false" aria-controls="collapseLayouts">
                    Payment Gateways
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePaymentGateway" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('payment-gateways.index') }}">Payment Gateways</a>
                        <a class="nav-link" href="{{ route('payment-types.index') }}">Payment Gateway Channels</a>
                    </nav>
                </div>
            </div>
        </div>
    </nav>
</div>