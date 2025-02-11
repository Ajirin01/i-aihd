<div class="owl-carousel-wrapper">

      

      <div class="box-92819">
        <h1 class="text-white mb-3">Join the Movement to Ensure Health and Human Rights</h1>
        <p><a href="#" class="btn btn-primary py-3 px-4 rounded-0">Donate Now</a></p>
      </div>

      <div class="owl-carousel owl-1 ">
        <div class="ftco-cover-1 overlay" style="background-image: url('images/hero_1.jpg');"></div>
        <div class="ftco-cover-1 overlay" style="background-image: url('images/hero_2.jpg');"></div>
        <div class="ftco-cover-1 overlay" style="background-image: url('images/hero_3.jpg');"></div>
        
      </div>
    </div>
    

    <div class="container">
      <div class="feature-29192-wrap d-md-flex" style="margin-top: -20px; position: relative; z-index: 2;">
    
        <a href="#" class="feature-29192 overlay-danger" style="background-image: url('images/img_3_gray.jpg');">
          <div class="text">
            <span class="meta">Outreach</span>
            <h3 class="text-cursive text-white h1">Community Testing and Awareness</h3>
          </div>
        </a>
    
        <a class="feature-29192 overlay-success" style="background-image: url('images/img_2_gray.jpg');">
          <div class="text">
            <span class="meta">GBV</span>
            <h3 class="text-cursive text-white h1">Stop Gender-Based Violence</h3>
          </div>
        </a>
    
        <div class="feature-29192 overlay-warning" style="background-image: url('images/img_1_gray.jpg');">
          <div class="text">
            <span class="meta">Health</span>
            <h3 class="text-cursive text-white h1">HIV Self-Testing Kits Supply</h3>
          </div>
        </div>
    
      </div>
    </div>
    

    <!-- letest project -->
    <div class="site-section">
      <div class="container">
        
        <div class="row mb-5 align-items-st">
          <div class="col-md-4">
            <div class="heading-20219">
              <h2 class="title text-cursive">Latest Projects</h2>
            </div>
          </div>
          <div class="col-md-8">
            <p>We are currently implementing impactful initiatives to improve healthcare and human rights for vulnerable communities. Our ongoing projects include:</p>
          </div>
        </div>
        

        <div class="row">
          <div class="col-md-4">
            <div class="cause shadow-sm">
                <a href="#" class="cause-link d-block">
                  <img src="images/img_2.jpg" alt="Image" class="img-fluid">
                  <div class="custom-progress-wrap">
                    <div class="custom-progress-inner">
                      <div class="custom-progress bg-warning" style="width: 80%;"></div>
                    </div>
                  </div>
                </a>

                <div class="px-3 pt-3 border-top-0 border border shadow-sm">
                  <h3 class="mb-4"><a href="#">APIN aCARES CDC Project</a></h3>
                  <p>Focused on expanding access to comprehensive HIV care and treatment.</p>
                </div>
              
              </div>

          </div>
          <div class="col-md-4">
            <div class="cause shadow-sm">
                <a href="#" class="cause-link d-block">
                  <img src="images/img_3.jpg" alt="Image" class="img-fluid">
                  <div class="custom-progress-wrap">
                    <!-- <span class="caption">Ongoing</span> -->
                    <div class="custom-progress-inner">
                      <div class="custom-progress bg-warning" style="width: 80%;"></div>
                    </div>
                  </div>
                </a>

                <div class="px-3 pt-3 border-top-0 border border ">
                  <h3 class="mb-4"><a href="#">ECEWS SPEED CDC Project</a></h3>
                  <p>Strengthening health systems and community-based interventions for disease prevention and treatment.</p>
                </div>
              
              </div>

          </div>
        </div>
      </div>
    </div>

    <!-- why choose us -->
    <div class="bg-image overlay site-section" style="background-image: url('images/hero_1.jpg');">
      <div class="container">
    
        <div class="row align-items-center">
          <div class="col-12">
            <div class="row mb-5">
              <div class="col-md-7">
                <div class="heading-20219">
                  <h2 class="title text-white mb-4 text-cursive">Why Choose Us</h2>
                  <p class="text-white">At I-AIHD, we are dedicated to improving healthcare services and advocating for the human rights of vulnerable people. Through strategic partnerships, advocacy, and direct service delivery, we work to create a society where everyone receives the care and support they deserve.</p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-5">
                <div class="feature-29012 d-flex">
                  <div class="number mr-4"><span>1</span></div>
                  <div>
                    <h3>Comprehensive Healthcare Support</h3>
                    <p>We provide direct healthcare services, including HIV self-testing kits, counseling, and community health outreach programs to ensure everyone has access to quality care.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 mb-5">
                <div class="feature-29012 d-flex">
                  <div class="number mr-4"><span>2</span></div>
                  <div>
                    <h3>Advocacy for Human Rights</h3>
                    <p>We fight for the rights of marginalized groups by raising awareness, pushing for policy changes, and working with key stakeholders to uphold human dignity.</p>
                  </div>
                </div>
              </div>
    
              <div class="col-md-6 mb-5">
                <div class="feature-29012 d-flex">
                  <div class="number mr-4"><span>3</span></div>
                  <div>
                    <h3>Building Stronger Communities</h3>
                    <p>Through education, training, and outreach, we empower individuals and communities to take control of their health and well-being, fostering long-term sustainability.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 mb-5">
                <div class="feature-29012 d-flex">
                  <div class="number mr-4"><span>4</span></div>
                  <div>
                    <h3>Partnerships & Collaborations</h3>
                    <p>We work with healthcare institutions, government agencies, and non-profits to expand our impact and ensure that no one is left behind in the fight for equitable healthcare.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    

    </div>
    
    <?php
        include_once 'config.php';

        // Fetch the latest 2 publications
        $query = "SELECT * FROM publications ORDER BY created_at DESC LIMIT 2";
        $result = $db->query($query);
    ?>

    <div class="site-section">
        <div class="container">
            <div class="heading-20219 mb-5">
                <h2 class="title text-cursive">Latest Publications</h2>
            </div>

            <div class="row">
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="col-md-6">
                        <div class="event-29191 mb-5">
                            <a href="publication?id=<?php echo $row['id']; ?>" class="d-block mb-3">
                                <img src="assets/images/publication/<?php echo $row['photo']; ?>" alt="<?php echo $row['title']; ?>" class="img-fluid rounded">
                            </a>
                            <div class="px-3 d-flex">
                                <div class="bg-primary p-3 d-inline-block text-center rounded mr-4 date">
                                    <span style="padding-top: 30px" class="text-white h3 m-0 d-block"><?php echo date('d', strtotime($row['created_at'])); ?></span>
                                    <span class="text-white small"><?php echo date('M Y', strtotime($row['created_at'])); ?></span>
                                </div>
                                <div>
                                    <h3><a href="publication?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></h3>
                                    <p>
                                        <?php 
                                            $words = explode(' ', $row['intro']); 
                                            echo implode(' ', array_slice($words, 0, 20)) . (count($words) > 20 ? '...' : ''); 
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>

            <div class="text-center mt-4">
                <a href="publications" class="btn btn-primary">View More</a>
            </div>
        </div>
    </div>



    <div class="site-section bg-image overlay-primary" style="background-image: url('images/img_1.jpg');">
      <div class="container">
        <div class="row align-items-stretch">
          <div class="col-md-6">
            <img src="images/camp1.jpg" alt="Image" class="img-fluid shadow">
          </div>
          <div class="col-md-6">
            <div class="bg-white h-100 p-4 shadow">
              <h3 class="mb-4 text-cursive">Donate Now</h3>
              <form action="#">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Name">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Amount in dollar">
                </div>
                <div class="form-group">
                  <input type="submit" value="Donate Now" class="btn btn-primary">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>