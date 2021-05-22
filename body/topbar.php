<?php
    if(isLogged()== 1){
        $username = $_SESSION['social'];
    }
?>        
        <link rel="stylesheet" href="./assets/fontawesome/css/all.min.css">
        <div class="topbar">
           <nav class="menu">
               <div class="menuleft">
                   <link rel="stylesheet" href="./styles/headStyle.css">
                   <img src="./assets/logoss.png" height="80px" width="90px">
                   <span><i>Welcome Back <?php if(isset($username)){echo $username;}else{header('Location:index.php?page=login');}  ?>!!</i></span>
                   <!-- <input type="search" id="recher" placeholder="Rechercher"> -->
               </div>
               <div class="menuright">
                <ul>
                    <li>
                        <a href="index.php?page=home">
                            <div class="icon">
                                <i class="fa fa-home" aria-hidden="true"></i>
                                <i class="fa fa-home" aria-hidden="true"></i>
                            </div>
                            <div class="name"> <span data-text="Acceuil">Acceuil</span></div>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?page=membres">
                            <div class="icon">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </div>
                            <div class="name"> <span data-text="Membres">Membres</span></div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="icon">
                                <i class="fa fa-comments" aria-hidden="true"></i>
                                <i class="fa fa-comments" aria-hidden="true"></i>
                            </div>
                            <div class="name"> <span data-text="Discussions">Discussions</span></div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="icon">
                                <i class="fa fa-bell" aria-hidden="true"></i>
                                <i class="fa fa-bell" aria-hidden="true"></i>
                            </div>
                            <div class="name"> <span data-text="Notifications">Notifications</span></div>
                        </a>
                    </li>
                    <!-- <li>
                        <a href="#">
                            <div class="icon">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </div>
                            <div class="name"> <span data-text="plus">plus</span></div>
                        </a>
                    </li> -->
                    <li>
                        <a href="index.php?page=logout">
                            <div id="logout" class="icon">
                                <img src="./assets/logout.svg" width="20px">
                            </div>
                            <div class="name"> <span data-text="Deconnexion">Deconnexion</span></div>
                        </a>
                    </li>
                </ul>
               </div>
               <script src="./js/2dda698767.js"></script>
            </nav>
        </div>
