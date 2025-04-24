<!-- donation -->
<div class="site-section">
      <div class="container">
        
            <div class="d-md-flex cta-20101 align-self-center bg-light p-5">
              <div class=""><h4 class="text-cursive">Kindly make a donation to support our work...</h4></div>
              <div class="ml-auto"><a href="/#donate" class="btn btn-primary">Donate Now</a></div>
            </div>
        
      </div>
    </div>

<footer class="site-footer bg-white">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-7">
                <h2 class="footer-heading mb-4">About Us</h2>
                <p>Initiative for the Advancement of Improved Health and Development (I-AIHD) is a registered human rights and healthcare services non governmental and not for profit organisation for vulnerable people in Nigeria with registration number CAC/IT/NO100634.</p>

              </div>
              <div class="col-md-4 ml-auto">
                <h2 class="footer-heading mb-4">Features</h2>
                <ul class="list-unstyled">
                  <li><a href="/about">About Us</a></li>
                  <!-- <li><a href="#">Testimonials</a></li> -->
                  <li><a href="/terms">Terms of Service</a></li>
                  <li><a href="/privacy">Privacy</a></li>
                  <li><a href="/contact">Contact Us</a></li>
                </ul>
              </div>

            </div>
          </div>
          <div class="col-md-4 ml-auto">

            <div class="mb-5">
              <h2 class="footer-heading mb-4">Subscribe to Newsletter</h2>
              <form id="newsletter-form" method="post">
                    <div class="input-group mb-3">
                        <input type="email" name="email" id="newsletter-email" class="form-control rounded-0 border-secondary text-white bg-transparent" placeholder="Enter Email" required>
                        <div class="input-group-append">
                            <button class="btn btn-primary text-white" type="submit" id="subscribe-btn">Subscribe</button>
                        </div>
                    </div>
                    <p id="subscription-message"></p>
                </form>

            </div>


            <h2 class="footer-heading mb-4">Follow Us</h2>
            <a href="https://web.facebook.com/IAIHD/" class="smoothscroll pl-0 pr-3"><span class="icon-facebook"></span></a>
            <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
            <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
            <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="pt-5">
              <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <a href="https://ajirinibi.com.ng" target="_blank" >Initiative for the Advancement of Improved Health and Development</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
            </div>
          </div>

        </div>
      </div>
    </footer>

    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/aos.js"></script>

    <script src="js/main.js"></script>

    <script>
        if(window.location.pathname == "/"){
            document.getElementById("home").setAttribute("class", "active")
        }else if(window.location.pathname == "/about"){
            document.getElementById("about").style.color = "green"
        }else if(window.location.pathname == "/contact"){
            document.getElementById("contact").setAttribute("class", "active")
        }else if(window.location.pathname == "/gallery"){
            document.getElementById("gallery").setAttribute("class", "active")
        }else if(window.location.pathname == "/publications"){
            document.getElementById("publications").setAttribute("class", "active")
        }


        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("newsletter-form").addEventListener("submit", function(e) {
                e.preventDefault();
                var emailInput = document.getElementById("newsletter-email").value;
                var messageBox = document.getElementById("subscription-message");

                fetch("subscribe.php", {
                    method: "POST",
                    headers: { "Content-Type": "application/x-www-form-urlencoded" },
                    body: "email=" + encodeURIComponent(emailInput)
                })
                .then(response => response.json())
                .then(data => {
                    messageBox.innerText = data.message;
                    messageBox.style.color = (data.status === "success") ? "green" : "red";
                    if (data.status === "success") document.getElementById("newsletter-form").reset();
                })
                .catch(error => {
                    messageBox.innerText = "An error occurred. Please try again.";
                    messageBox.style.color = "red";
                });
            });
        });

    </script>

  </body>

</html>



