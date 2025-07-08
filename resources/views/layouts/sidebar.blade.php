 <!-- ========== Left Sidebar ========== -->
        <div class="main-menu">
            <!-- Brand Logo -->
            <div class="logo-box">
                <!-- Brand Logo Light -->
                <a href="index.html" class="logo-light">
                    <img src="{{url('assets/images/logo-light.png')}}" alt="logo" class="logo-lg" height="18">
                    <img src="{{url('assets/images/logo-sm.png')}}" alt="small logo" class="logo-sm" height="24">
                </a>

                <!-- Brand Logo Dark -->
                <a href="index.html" class="logo-dark">
                    <img src="{{url('assets/images/logo-dark.png')}}" alt="dark logo" class="logo-lg" height="18">
                    <img src="{{url('assets/images/logo-sm.png')}}" alt="small logo" class="logo-sm" height="24">
                </a>
            </div>

            <!--- Menu -->
            <div data-simplebar>
                <ul class="app-menu">

                    <li class="menu-title">Menu</li>

                    <li class="menu-item">
                        <a href="index.html" class="menu-link waves-effect">
                            <span class="menu-icon"><i data-lucide="airplay "></i></span>
                            <span class="menu-text"> Dashboards </span>
                            <span class="badge bg-info rounded-pill ms-auto">3</span>
                        </a>
                    </li>

                    <li class="menu-title">Custom</li>
                    <li class="menu-item">
                    <a href="#Ventes" data-bs-toggle="collapse" class="menu-link waves-effect">
                        <span class="menu-icon"><i data-lucide="product"></i></span>
                        <span class="menu-text"> Produit  </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="Ventes">
                        <ul class="sub-menu">
                            <li class="menu-item">
                                <a href="{{ route('ventes.create') }}" class="menu-link">
                                    <span class="menu-text">Creer Vente</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('ventes.index') }}" class="menu-link">
                                    <span class="menu-text">Liste Ventes</span>
                                </a>
                            </li>


                        </ul>
                    </div>
                </li>
                    <li class="menu-item">
                    <a href="#Produit" data-bs-toggle="collapse" class="menu-link waves-effect">
                        <span class="menu-icon"><i data-lucide="product"></i></span>
                        <span class="menu-text"> Produit  </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="Produit">
                        <ul class="sub-menu">
                            <li class="menu-item">
                                <a href="{{ route('produits.create') }}" class="menu-link">
                                    <span class="menu-text">Creer Produit</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('produits.index') }}" class="menu-link">
                                    <span class="menu-text">Liste Produits</span>
                                </a>
                            </li>


                        </ul>
                    </div>
                </li>
                    <li class="menu-item">
                        <a href="#Stocks" data-bs-toggle="collapse" class="menu-link waves-effect">
                            <span class="menu-icon"><i data-lucide=""></i></span>
                            <span class="menu-text">Stocks</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="Stocks">
                            <ul class="sub-menu">
                                <li class="menu-item">
                                    <a href="{{ route('mouvementStocks.create') }}" class="menu-link">
                                        <span class="menu-text">Nouveau Stock</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route('mouvementStocks.index') }}" class="menu-link">
                                        <span class="menu-text">Liste Stocks</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    <li class="menu-item">
                        <a href="#menuClients" data-bs-toggle="collapse" class="menu-link waves-effect">
                            <span class="menu-icon"><i data-lucide=""></i></span>
                            <span class="menu-text"> Clients </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="menuClients">
                            <ul class="sub-menu">
                                <li class="menu-item">
                                    <a href="{{ route('clients.create') }}" class="menu-link">
                                        <span class="menu-text">Nouveau Client</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route('clients.index') }}" class="menu-link">
                                        <span class="menu-text">Liste Clients</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    <li class="menu-item">
                        <a href="#menuExpages" data-bs-toggle="collapse" class="menu-link waves-effect">
                            <span class="menu-icon"><i data-lucide=""></i></span>
                            <span class="menu-text"> Ventes </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="menuExpages">
                            <ul class="sub-menu">
                                <li class="menu-item">
                                    <a href="pages-starter.html" class="menu-link">
                                        <span class="menu-text">Nouvelle Vente</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="pages-invoice.html" class="menu-link">
                                        <span class="menu-text">Liste Ventes</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
