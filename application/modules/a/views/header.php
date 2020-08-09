    <?php
    $photo=$this->session->userdata('photo');
    if(!empty($photo)){
        $url=base_url().'assets/img/admins/80x80/'.$photo;
    }else{
        $url=base_url().'assets/images/user.png';
    }
    ?>
    <div class="app-header__logo">
                <!-- <div class="brand"><span class="brand-name-a">Smart</span><span class="brand-name-b">Pil</span><span class="brand-name-c">kada</span></div>                -->
                <img style="margin-left:30px;" src="<?=base_url()?>assets/images/logo/1.png" alt="" width="150">
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
            </div>    <div class="app-header__content">
                <div class="app-header-left">         
                <!-- <div class="search-wrapper">
                        <div class="input-holder">
                            <input type="text" class="search-input" id="k" placeholder="Cari By NIK/Nama Pemilih">
                            <button class="search-icon" type="submit" id="search"><span></span></button>
                        </div>
                        <button class="close"></button>
                    </div> -->
                    <ul class="header-menu nav">
                        <li class="btn-group nav-item">
                            <a href="<?=base_url().'a_profil'?>" class="nav-link" style="color:black">
                                <i style="color:black" class="nav-link-icon fa fa-user-circle"></i>
                                Profile
                            </a>
                        </li>
                        <li class="dropdown nav-item">
                            <a href="<?=base_url().'a_setting'?>" class="nav-link" style="color:black">
                                <i style="color:black" class="nav-link-icon fa fa-cog"></i>
                                Settings
                            </a>
                        </li>
                        <li class="dropdown nav-item">
                            <a href="<?=base_url().'login/logout'?>" class="nav-link" style="color:black">
                                <i style="color:black" class="nav-link-icon fa fa-power-off"></i>
                                Log Out
                            </a>
                        </li>
                    </ul>        </div>
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">                               
                                <div class="text-right widget-content-left  mr-3 header-user-info">
                                    <div class="widget-heading" style="color:black">
                                        <?php echo $this->session->userdata('nama'); ?>
                                    </div>
                                    <div class="widget-subheading" style="color:black">
                                        <?php if($this->session->userdata('level') == 'ad'){?>
                                            Admin
                                        <?php } else if($this->session->userdata('level') == 'mn') {?>
                                            Manager
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                            <img width="42" height="42" src="<?php echo $url;?>" id="img_header" style="border-radius: 100%;border: 1px solid white; object-fit: cover;">
                                            <i style="color:black" class="fa fa-angle-down ml-2 opacity-8"></i>
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right" >
                                            <a tabindex="0" class="dropdown-item" href="<?=base_url().'a_profil'?>" > <i class="fa fa-user-circle mr-2"></i> Profile</a>
                                            <div tabindex="-1" class="dropdown-divider"></div>
                                            <a href="<?=base_url().'login/logout'?>" tabindex="0" class="dropdown-item"><i class="fa fa-power-off mr-2"></i> Log Out</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content-right header-user-info ml-3">
                                    <!-- <button type="button" class="btn-shadow p-1 btn btn-primary btn-sm show-toastr-example">
                                        <i class="fa text-white fa-calendar pr-1 pl-1"></i>
                                    </button> -->
                                </div>
                            </div>
                        </div>
                    </div>       
                  </div>
            </div>
            
<script>
    // $('document').ready(function(){
    //     if($(".search-wrapper").hasClass("active")){
    //         $("#search").click(function() {
    //             location.replace("<?=base_url()?>search_data?q="+$("#k").val());
    //         });
    //     }
    // });
</script>