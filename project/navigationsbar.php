    <div class="topbar"> <div class="log-out"><p><?php echo utf8_encode($_SESSION['fname']. " " .$_SESSION['sname']) ?></p><a href="php/login-action.php">Log ud</a></div></div>
    <div class="sidebar">
     <ul> 
        <li class="header"><img src="images/UCL_vertical.png" class="icontop"></li>
        <a href="index.php"><li><img src="images/task.png" class="iconside"><p>Registrering</p></li></a>
        <a href="backlog.php"><li><img src="images/log.png" class="iconside"><p>Registreringer</p></li></a>
        <a href="#"><li><img src="images/statistics.png" class="iconside"><p>Statistik</p></li></a>
        <?php if ($_SESSION['auth'] == 1) { ?>
         <a href="useroverview.php"><li><img src="images/add-user.png" class="iconside"><p>Brugere</p></li></a>
      <?php } ?>
   </ul>
</div>  
