<?php if (!empty($_SESSION['current_user'])) { ?>
  <!-- Begin:Footer-->
  <footer class="footer">
    <p class="footer__copyright"><span>&copy;</span>Nhóm 3</p>
    <p>Design by <a href="" target="_blank" class="footer__signature" center >Mai Đức Long</a></p>
  </footer>
  <!-- End:Footer-->
<?php } else { ?>
  <div class="footer-container">
    <div class="footer-content">
      Bạn chưa đăng nhập. Mời bạn quay lại đăng nhập quản trị <a href="index.php">tại đây</a>
    </div>
  </div>
<?php } ?>
</body>

</html>