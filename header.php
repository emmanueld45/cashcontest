 <!-- Header section -->
 <header class="header-section clearfix">
     <a href="./" class="site-logo">
         <!-- <img src="img/logo.png" alt=""> -->
         <span class="header-logo w">Cash<span class="r">contest</span></span>
     </a>
     <div class="header-right">
         <?php
         if(isset($_SESSION['id'])){
        echo "<a href='logout' class='hr-btn'>Logout?</a>";
         }
         ?>
         <span>|</span>
         <div class="user-panel">
             <?php
             if(!isset($_SESSION['id'])){
            echo "<a href='auth/login' class='login'>Login</a>
             <a href='auth/signup' class='register'>Create an account</a>
             ";
             }else{
                echo "<a href='account' class='register'>My account</a>";
             }
             ?>
         </div>
     </div>
     <ul class="main-menu">
         <li><a href="./">Home</a></li>
         <li><a href="how-it-works.php">How it works?</a></li>
         <!-- <li><a href="#">Pages</a>
             <ul class="sub-menu">
                 <li><a href="category.html">Category</a></li>
                 <li><a href="playlist.html">Playlist</a></li>
                 <li><a href="artist.html">Artist</a></li>
                 <li><a href="blog.html">Blog</a></li>
                 <li><a href="contact.html">Contact</a></li>
             </ul>
         </li> -->
         <li><a href="faq.php">FAQ</a></li>
         <!-- <li><a href="contact.html">Contact</a></li> -->
     </ul>
 </header>
 <!-- Header section end -->