<footer>
    <div class="content" id="footer-help">
      <div class="top">
        <div class="logo-details">
          <i class="fab fa-slack"></i>
          <!-- <span class="logo_name">CodingLab</span> -->
        </div>
        <div class="media-icons">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-linkedin-in"></i></a>
          <a href="#"><i class="fab fa-youtube"></i></a>
        </div>
      </div>
      <div class="link-boxes">
        <ul class="box">
          <li class="link_name">Công ty</li>
          <li><a href="#">Nhà</a></li>
          <li><a href="#">Liên hệ với chúng tôi</a></li>
          <li><a href="#">Về chúng tôi</a></li>
          <li><a href="#">Bắt đầu</a></li>
        </ul>
        <ul class="box">
          <li class="link_name">Dịch vụ</li>
          <li><a href="#">Thiết kế ứng dụng</a></li>
          <li><a href="#">Thiết kế web</a></li>
          <li><a href="#">Thiết kế logo</a></li>
          <li><a href="#">Thiết kế biểu ngữ</a></li>
        </ul>
        <ul class="box">
          <li class="link_name">Tài khoản</li>
          <li><a href="#">Hồ sơ</a></li>
          <li><a href="#">Tài khoản của tôi</a></li>
          <li><a href="#">Sở thích</a></li>
          <li><a href="#">Mua</a></li>
        </ul>

        <ul class="box input-box">
          <li class="link_name">Subscribe</li>
          <li><input type="text" placeholder="Enter your email"></li>
          <li><input type="button" value="Subscribe"></li>
        </ul>
      </div>
    </div>
    <div class="bottom-details">
      <div class="bottom_text">
        <span class="copyright_text">Design © 2021 by <a href="#">Nhóm 3</a></span>
        <span class="policy_terms">
          <a href="#">Chính sách bảo mật</a>
          <a href="#">Điều khoản & điều kiện</a>
        </span>
      </div>
    </div>
  </footer>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="./assets/resources/javascript/carouseller.js"></script>
<script src="./assets/resources/javascript/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="./assets/resources/library/fancybox/jquery.fancybox.min.js"></script>
<script>
    $(".quick-buy-form").submit(function(event) {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: './process_cart.php?action=add',
            data: $(this).serializeArray(),
            success: function(response) {
                response = JSON.parse(response);
                if (response.status == 0) { //Có lỗi
                    alert(response.message);
                } else { //Mua thành công
                    alert(response.message);
                    //                                    location.reload();
                }
            }
        });
    });
</script>
<script type="text/javascript">
    $(function() {
        $('#product-slide').carouseller();
    });
</script>
<script>
  // Js code to make color box enable or disable
  let colorIcons = document.querySelector(".color-icon"),
  icons = document.querySelector(".color-icon .icons");

  icons.addEventListener("click" , ()=>{
    colorIcons.classList.toggle("open");
  })

  // getting all .btn elements
  let buttons = document.querySelectorAll(".btn");

  for (var button of buttons) {
    button.addEventListener("click", (e)=>{ //adding click event to each button
      let target = e.target;

      let open = document.querySelector(".open");
      if(open) open.classList.remove("open");

      document.querySelector(".active").classList.remove("active");
      target.classList.add("active");

      // js code to switch colors (also day night mode)
      let root = document.querySelector(":root");
      let dataColor = target.getAttribute("data-color"); //getting data-color values of clicked button
      let color = dataColor.split(" "); //splitting each color from space and make them array

      //passing particular value to a particular root variable
      root.style.setProperty("--white", color[0]);
      root.style.setProperty("--black", color[1]);
      root.style.setProperty("--nav-main", color[2]);
      root.style.setProperty("--switchers-main", color[3]);
      root.style.setProperty("--light-bg", color[4]);

      let iconName = target.className.split(" ")[2]; //getting the class name of icon

      let coloText = document.querySelector(".home-content span");

      if(target.classList.contains("fa-moon")){ //if icon name is moon
        target.classList.replace(iconName, "fa-sun") //replace it with the sun
        colorIcons.style.display = "none";
        coloText.classList.add("darkMode");
      }else if (target.classList.contains("fa-sun")) { //if icon name is sun
        target.classList.replace("fa-sun", "fa-moon"); //replace it with the sun
        colorIcons.style.display = "block";
        coloText.classList.remove("darkMode");
        document.querySelector(".btn.blue").click();
      }
    });
  }
 </script>
</body>

</html>