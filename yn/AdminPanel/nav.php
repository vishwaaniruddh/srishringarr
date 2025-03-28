<?
if($_SESSION['username']){  ?>
    

<nav class="pcoded-navbar">
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="pcoded-navigatio-lavel">Navigation</div>
                            <ul class="pcoded-item pcoded-left-item">
                                
                                    
                                    
                                    <ul class="pcoded-item pcoded-left-item" item-border="true" item-border-style="none" subitem-border="true">
                                <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
                                    <a href="index.php">
                                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                        <span class="pcoded-mtext">Dashboard</span>
                                    </a>
                                </li>
                            </ul>

                                        
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="feather icon-layers"></i></span>
                                        <span class="pcoded-mtext">Home</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="banner.php">
                                                <span class="pcoded-mtext">Banner</span>
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                            
                                
                                
                                
                                <li class="">
                                    <a href="logout.php">
                                        <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                                        <span class="pcoded-mtext">Logout</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <? } ?>