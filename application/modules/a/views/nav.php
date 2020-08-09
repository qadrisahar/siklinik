<?php
$level=$this->session->userdata('level');
$tind_neks=$this->db->select('COUNT(no_registrasi) as total')->where('eksekusi','n')->get('registrasi')->row()->total;
if($tind_neks>0){
    $notif_tind_neks='<span class="badge badge-pill badge-danger">'.$tind_neks.'</span>'; 
}else{
    $notif_tind_neks='';
}
?>
<div class="app-sidebar sidebar-shadow sidebar-text-white">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
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
    <div class="logo-src">
        <!-- <img src="assets/images/logo.png" alt="Mysmartteam"> -->
    </div>
    
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner"><br>
        <img style="margin-left:50px;" src="<?=base_url()?>assets/images/logo/2.png" alt="" width="130">
        <p><h6 style="color:#ed5388; margin-left:10px;"><b>Hj. A. Nani Nurcahyani S.ST</b></h6></p>
            <ul class="vertical-nav-menu" style="margin-top: 25px !important;" id="navigation">
                <?php
                if($level=='mn'){
                ?>
                <li class="app-sidebar__heading">Dashboard</li>
                 <li>
                    <a href="<?=base_url().'a_dashboard_ds'?>" class="navigation-list">
                        <i class="metismenu-icon pe-7s-display1"></i>
                        Dashboard
                    </a>
                </li>
                <li class="app-sidebar__heading">Registrasi</li>
                 <li>
                    <a href="<?=base_url().'a_pasien_baru?func=reg'?>" class="navigation-list">
                        <i class="metismenu-icon pe-7s-plus"></i>
                        Pasien Baru
                    </a>
                </li>
                <li>
                    <a href="<?=base_url().'a_registrasi/add?p=0'?>" class="navigation-list">
                        <i class="metismenu-icon pe-7s-search"></i>
                        Pasien Terdaftar
                    </a>
                </li>
                <li>
                    <a href="<?=base_url().'a_registrasi?func=cancel'?>" class="navigation-list">
                        <i class="metismenu-icon pe-7s-close-circle"></i>
                        Pembatalan
                    </a>
                </li>
                <li>
                    <a href="<?=base_url().'a_registrasi?func=list'?>" class="navigation-list">
                        <i class="metismenu-icon pe-7s-menu"></i>
                        Daftar
                    </a>
                </li>
                <li class="app-sidebar__heading">Pasien</li>
                 <li>
                    <a href="<?=base_url().'a_pasien_baru?func=0'?>" class="navigation-list">
                        <i class="metismenu-icon pe-7s-plus"></i>
                        Input Pasien
                    </a>
                </li>
                <li>
                    <a href="<?=base_url().'a_reg_pasien_lama'?>" class="navigation-list">
                        <i class="metismenu-icon pe-7s-user"></i>
                        Data Pasien
                    </a>
                </li>
                <li class="app-sidebar__heading">Tindakan</li>
                <li>
                    <a href="<?=base_url().'a_tindakan_neks'?>" class="navigation-list">
                        <i class="metismenu-icon pe-7s-note2 icon-gradient bg-strong-bliss"></i>
                        Belum Dieksekusi <?=$notif_tind_neks?>
                    </a>
                </li>
                <li>
                    <a href="<?=base_url().'a_tindakan_eks'?>" class="navigation-list">
                        <i class="metismenu-icon pe-7s-note2 icon-gradient bg-grow-early"></i>
                        Telah Dieksekusi
                    </a>
                </li>
                <li class="app-sidebar__heading">Pembayaran</li>
                <li>
                    <a href="<?=base_url().'a_pembayaran_neks'?>" class="navigation-list">
                        <i class="metismenu-icon pe-7s-wallet icon-gradient bg-strong-bliss"></i>
                        Belum Dieksekusi <?=$notif_tind_neks?>
                    </a>
                </li>
                <li>
                    <a href="<?=base_url().'a_pembayaran_eks'?>" class="navigation-list">
                        <i class="metismenu-icon pe-7s-wallet icon-gradient bg-grow-early"></i>
                        Telah Dieksekusi
                    </a>
                </li>
                <li class="app-sidebar__heading">Inventori Obat</li>
                <li>
                    <a href="<?=base_url().'a_obat'?>" class="navigation-list">
                        <i class="metismenu-icon pe-7s-keypad"></i>
                        Data Obat 
                    </a>
                </li>
                <li>
                    <a href="<?=base_url().'a_data_stok'?>" class="navigation-list">
                        <i class="metismenu-icon pe-7s-note2"></i>
                        Stok Obat
                    </a>
                </li>
                <li>
                    <a href="<?=base_url().'a_stok_masuk'?>" class="navigation-list">
                        <i class="metismenu-icon pe-7s-download"></i>
                        Stok Masuk Obat
                    </a>
                </li>
                <li>
                    <a href="<?=base_url().'a_stok_keluar'?>" class="navigation-list">
                        <i class="metismenu-icon pe-7s-next-2"></i>
                        Stok Keluar Obat
                    </a>
                </li>

                <li class="app-sidebar__heading">Inventori Bahan dan Alkes</li>
                <li>
                    <a href="<?=base_url().'a_alkes'?>" class="navigation-list">
                        <i class="metismenu-icon pe-7s-keypad"></i>
                        Data Alkes 
                    </a>
                </li>
                <li>
                    <a href="<?=base_url().'a_data_stok_alkes'?>" class="navigation-list">
                        <i class="metismenu-icon pe-7s-note2"></i>
                        Stok Alkes
                    </a>
                </li>
                <li>
                    <a href="<?=base_url().'a_stok_masuk_alkes'?>" class="navigation-list">
                        <i class="metismenu-icon pe-7s-download"></i>
                        Stok Masuk Alkes
                    </a>
                </li>
                <li>
                    <a href="<?=base_url().'a_stok_keluar_alkes'?>" class="navigation-list">
                        <i class="metismenu-icon pe-7s-next-2"></i>
                        Stok Keluar Alkes
                    </a>
                </li>

                <li class="app-sidebar__heading">Pengaturan</li>
                <li>
                    <a href="<?=base_url().'a_layanan'?>" class="navigation-list">
                        <i class="metismenu-icon pe-7s-eyedropper"></i>
                        Pengaturan Layanan
                    </a>
                    </li>
                <li class="app-sidebar__heading">Master</li>
                <li>
                    <a href="<?=base_url().'a_admin'?>" class="navigation-list">
                        <i class="metismenu-icon pe-7s-users"></i>
                        Pengguna 
                    </a>
                </li>
                <li class="app-sidebar__heading">Pustaka</li>
                <li>
                    <a href="#o" class="navigation-list">
                        <i class="metismenu-icon pe-7s-file"></i>
                        Obat
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul class="mm-collapse">
                        <li>
                            <a href="<?=base_url().'a_kategori'?>">
                            <i class="metismenu-icon"></i>
                                Kategori Obat 
                            </a>
                        </li>
                        <li>
                            <a href="<?=base_url().'a_satuan'?>">
                                <i class="metismenu-icon"></i>
                                Data Satuan Obat
                            </a>
                            </li>
                        <li>
                            <a href="<?=base_url().'a_unit'?>">
                                <i class="metismenu-icon"></i>
                                Data Unit Obat
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#a" class="navigation-list">
                        <i class="metismenu-icon pe-7s-file"></i>
                        Bahan dan Alkes
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul class="mm-collapse">
                        <li>
                            <a href="<?=base_url().'a_kategori_alkes'?>">
                            <i class="metismenu-icon"></i>
                                Kategori Alkes 
                            </a>
                        </li>
                        <li>
                            <a href="<?=base_url().'a_satuan_alkes'?>">
                                <i class="metismenu-icon"></i>
                                Data Satuan Alkes
                            </a>
                            </li>
                        <li>
                            <a href="<?=base_url().'a_unit_alkes'?>">
                                <i class="metismenu-icon"></i>
                                Data Unit Alkes
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?=base_url().'a_pendidikan'?>" class="navigation-list">
                        <i class="metismenu-icon pe-7s-file"></i>
                        Data Pendidikan
                    </a>
                    </li>
                <li>
                    <a href="<?=base_url().'a_pekerjaan'?>" class="navigation-list">
                        <i class="metismenu-icon pe-7s-file"></i>
                        Data Pekerjaan
                    </a>
                </li>
                <?php
                }
                ?>
                
                
                   
              
            </ul>
        </div>
    </div>
</div> 

<script>
$(document).ready(function(){
    $('.navigation-list').on('click', function(e) {
        localStorage.setItem('activeNav', $(e.target).attr('href'));
    });
    var activeNav = localStorage.getItem('activeNav');
    $('#navigation a[href="' + activeNav + '"]').addClass('mm-active');

    var $container = $(".scrollbar-sidebar");
    var $scrollTo = $('.mm-active');

    $container.animate({scrollTop: $scrollTo.offset().top - ($container.offset().top+150) + $container.scrollTop(), scrollLeft: 0},300); 
});
</script>