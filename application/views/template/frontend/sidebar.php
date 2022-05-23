<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img src="<?= base_url();?>assets/images/logo.svg" width="48" height="48" alt="Alpino"></div>
        <p>Please wait...</p>        
    </div>
</div>
<!-- Left Sidebar -->
<aside id="minileftbar" class="minileftbar">
    <ul class="menu_list">
        <li>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="<?= base_url();?>"><img src="<?= base_url();?>assets/images/logo.svg" alt="Alpino"></a>
        </li>
        <li class="power">        
            <a href="<?= site_url('logout');?>" class="mega-menu"><i class="zmdi zmdi-power"></i></a>
        </li>
    </ul>    
</aside>

<aside class="right_menu">
    <div id="leftsidebar" class="sidebar">
        <div class="menu">
            <ul class="list">
                <li>
                    <div class="user-info m-b-20">
                        <div class="image">
                            <a href="profile.html"><img src="<?= base_url();?>assets/images/profil.png" alt="<?= $this->session->username;?>"></a>
                        </div>
                        <div class="detail">
                            <h6><?= $this->session->username;?></h6>                   
                        </div>
                    </div>
                </li>
                <li class="header">MAIN</li>
                <li class="active <?= ($this->uri->segment(1) == "home" || empty($this->uri->segment(1)) ? "open" : "") ?>"> <a href="<?= site_url('home');?>"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>   
                <li class="active <?= ($this->uri->segment(1) == "member" ? "open" : "") ?>"> <a href="<?= site_url('member');?>"><i class="zmdi zmdi-accounts-alt"></i><span>Member</span></a></li>             
            </ul>
        </div>
    </div>
</aside>