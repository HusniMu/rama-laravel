<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="ml-auto header__pane">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu mt-4">
            {{-- home --}}
                <li>
                    <a href="#">
                        {{-- <i class="metismenu-icon pe-7s-diamond"></i> --}}
                        Home
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('dashboard') }}"  class="{{ request()->url() === route('dashboard') ? "active": "false"}}" >
                                <i class="metismenu-icon"></i>
                                Meja Kerja
                            </a>
                        </li>
                        <li>
                            <a href="elements-dropdowns.html">
                                <i class="metismenu-icon"></i>
                                Ubah Password
                            </a>
                        </li>
                        <li>
                            <a href="elements-icons.html">
                                <i class="metismenu-icon"></i>
                                Profil Saya
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- piutang --}}
                <li>
                    <a href="#">
                        Piutang
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="components-tabs.html">
                                <i class="metismenu-icon">
                                </i>Tabs
                            </a>
                        </li>
                        <li>
                            <a href="components-accordions.html">
                                <i class="metismenu-icon">
                                </i>Accordions
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- jurnal penyesuaian --}}
                <li>
                    <a href="#">
                        Jurnal Penyesuaian
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('riwayat-crosscheck') }}">
                                <i class="metismenu-icon">
                                </i>Riwayat Jurnal Koreksi Crosscheck
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('create-crosscheck') }}">
                                <i class="metismenu-icon">
                                </i>Buat Jurnal Koreksi Crosscheck
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- DO --}}
                <li>
                    <a href="#">
                        DO (Order Pekerjaan)
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="components-tabs.html">
                                <i class="metismenu-icon">
                                </i>Tabs
                            </a>
                        </li>
                        <li>
                            <a href="components-accordions.html">
                                <i class="metismenu-icon">
                                </i>Accordions
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- Laporan --}}
                <li class="{{ request()->url() === route('barangmasuk') ? 'mm-active' : '' }}">
                    <a href="#"
                        aria-expanded="{{ request()->url() === route('barangmasuk') ? 'true' : '' }}"
                    >
                        Cetak
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul class="{{ request()->url() === route('barangmasuk') ? 'mm-show' : '' }}">
                        <li>
                            <a href="{{ route('labarugi') }}" class="{{ request()->url() === route('labarugi') ? "active": "false"}}">
                                <i class="metismenu-icon">
                                </i>Laporan Laba Rugi
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('rekapstok') }}" class="{{ request()->url() === route('rekapstok') ? "active": "false"}}">
                                <i class="metismenu-icon">
                                </i>Laporan Rekapitulasi Stok
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('barangmasuk') }}" class="{{ request()->url() === route('barangmasuk') ? "active": "false"}}">
                                <i class="metismenu-icon">
                                </i>Laporan Barang Masuk
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('pajak') }}" class="{{ request()->url() === route('pajak') ? "active": "false"}}">
                                <i class="metismenu-icon">
                                </i>Laporan Pajak
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('rapotmekanik') }}" class="{{ request()->url() === route('rapotmekanik') ? "active": "false"}}">
                                <i class="metismenu-icon">
                                </i>Rapot Mekanik
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- fast moving item --}}
                <li>
                    <a href="tables-regular.html">
                        Fast Moving Item
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
