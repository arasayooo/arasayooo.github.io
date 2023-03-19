<?php

session_start();

if (($_SESSION["usertype"] !== 'user')) {
  header('Location: login.php');
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Powerec</title>
  <link rel="stylesheet" href="css/swiper-bundle.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
  <script src="https://unpkg.com/scrollreveal"></script>
</head>

<body>

  <!--=======Scroll to top button=======-->
  <div class="scrollToTop-btn flex-center">
    <i class="fas fa-arrow-up"></i>
  </div>

  <!--=======Light/Dark theme button=======-->
  <div class="theme-btn flex-center">
    <i class="fas fa-moon"></i>
    <i class="fas fa-sun"></i>
  </div>

  <!--=======Header=======-->
  <header>
    <div class="nav-bar">
      <a href="#" class="logo" style="font-size: 140%;color:orange;">POWEREC </a>
      <div class="navigation">
        <div class="nav-items">
          <div class="nav-close-btn"></div>
          <a class="active" href="#home">Home</a>
          <a href="#about">View Book</a>
          <a href="service.php">Services</a>
          <a href="../php/feedbackv.php">Feedback</a>
          <a href="#portfolio">Portfolio</a>
          <a href="../php/logout.php">Logout</a>
        </div>
      </div>
      <div class="nav-menu-btn"></div>
    </div>
  </header>

  <!--=======Home section=======-->
  <section class="home flex-center" id="home">
    <div class="home-container">
      <div class="media-icons">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
      </div>
      <div class="info" style="padding-left: 200px;">
        <h2 style="color: orange; font-size: 300%;">Hi,<?php echo $_SESSION["username"]; ?></h2>
        <h3 style="color: rgb(196, 130, 9);">Welcome to powerec</h3>
        <p>POWEREC provide various services provision such as electrical & electronic repair, air conditioning and refrigeration supply & repair etc...</p>
      </div>
      <div class="home-img">
        <img src="../html/images/1.png">
      </div>
    </div>
    <a href="#about" class="scroll-down">Scroll Down <i class="fas fa-arrow-down"></i></a>
  </section>



  <!-- service section -->
  <section class="home flex-center" id="home">
    <div class="home-container">

      <div class="home-img">
        <img src="../html/images/2.png" style="padding-left: 100px;">
      </div>
      <div class="info" style="padding-right: 200px;">
        <h2 style="color: orange;">Services</h2>
        <h3 style="color: rgb(196, 130, 9);">Set appointment date</h3>
        <p>Create, Update, Delete date and time for customers to book</p>
        <a href="serviceEmp.php" class="btn" style="color: black;">service page <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
  </section>

  <!--=======To-do List section=======-->
  <section class="home flex-center" id="home">
    <div class="home-container">
      <!-- <div class="media-icons">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
      </div> -->
      <div class="info" style="padding-left: 200px;">
        <h2 style="color: orange;">View Booking</h2>
        <h3 style="color: rgb(196, 130, 9);">View Appointment Date</h3>
        <p>View list of appointment date which customers had booked </p>
        <a href="serviceEmp.php" class="btn" style="color: black;">view booking <i class="fas fa-arrow-circle-right"></i></a>
      </div>
      <div class="home-img">
        <img src="../html/images/3.png" style="width: 75%;">
      </div>
    </div>
    <!-- <a href="#about" class="scroll-down">Scroll Down <i class="fas fa-arrow-down"></i></a> -->
  </section>

  <!--=======About section=======-->
  <!-- <section class="about section" id="about"> -->
  <!-- <div class="container flex-center">
      <h1 class="section-title-01">About us</h1>
      <h2 class="section-title-02">About us</h2>
      <div class="content flex-center">
        <div class="about-img">
          <img src="../image/powerec1.png" alt="">
        </div>
        <div class="about-info">
          <div class="description">
            <h3>Powerec</h3>
            <h4>A company with <span style="color: orange;"> various services provision </span> based in <span>Johor Baharu</span></h4>
            <p>POWEREC provide various services provision such as electrical & electronic repair, air conditioning and refrigeration supply & repair, power supply & telecommunications cabling works, fire fighting & fire alarm system, fogging maintenance work, sewage maintenance work, cleaning of buildings & cleaning area services and sanitary maintenance work.</p>
          </div>
          <ul class="professional-list">
            <li class="list-item">
              <h3>5+</h3>
              <span>Years of<br>Experience</span>
            </li>
            <li class="list-item">
              <h3>3K+</h3>
              <span>Happy<br>Customers</span>
            </li>
            <li class="list-item">
              <h3>5+</h3>
              <span>Success<br>Projects</span>
            </li>
          </ul>
          <a href="" class="btn">Download CV <i class="fas fa-download"></i></a>
        </div>
      </div>
    </div> -->
  <!-- </section> -->

  <!--=======Skills section=======-->
  <!-- <section class="skills section" id="skills"> -->
  <!-- <div class="container flex-center">
      <h1 class="section-title-01">Skills</h1>
      <h2 class="section-title-02">Skills</h2>
      <div class="content">
        <div class="skills-description">
          <h3>Education & Skills</h3>
          <p>For more than 5 years our experts have been accomplishing enough with modern Web Development, new generation web and app
            programming language.</p>
        </div>
        <div class="skills-info education-all">
          <div class="education">
            <h4><label>Education</label></h4>
            <ul class="edu-list">
              <li class="item">
                <span class="year">2020-2021</span>
                <p><span>Ph.D in Horriblensess</span> - Harvard University, Cambridge, MA</p>
              </li>
              <li class="item">
                <span class="year">2018-2019</span>
                <p><span>Computer Science</span> - Imperialize Technical Institute</p>
              </li>
              <li class="item">
                <span class="year">2016-2018</span>
                <p><span>Graphic Designer</span> - Web Graphy, Los Angeles, CA</p>
              </li>
            </ul>
          </div>
          <div class="education">
            <h4><label>Skills</label></h4>
            <ul class="bars">
              <li class="bar">
                <div class="info">
                  <span>HTML</span>
                  <span>95%</span>
                </div>
                <div class="line html"></div>
              </li>
              <li class="bar">
                <div class="info">
                  <span>CSS</span>
                  <span>85%</span>
                </div>
                <div class="line css"></div>
              </li>
              <li class="bar">
                <div class="info">
                  <span>Javascript</span>
                  <span>80%</span>
                </div>
                <div class="line javascript"></div>
              </li>
              <li class="bar">
                <div class="info">
                  <span>Jquery</span>
                  <span>80%</span>
                </div>
                <div class="line jquery"></div>
              </li>
              <li class="bar">
                <div class="info">
                  <span>PHP</span>
                  <span>75%</span>
                </div>
                <div class="line php"></div>
              </li>
            </ul>
          </div>
          <div class="education">
            <h4><label>Awards</label></h4>
            <ul class="edu-list">
              <li class="item">
                <span class="year">2021</span>
                <p><span>Best Developer</span> - University Of Melbourne, NA</p>
              </li>
              <li class="item">
                <span class="year">2020</span>
                <p><span>Best Writter</span> - Online Typodev Soluation Ltd.</p>
              </li>
              <li class="item">
                <span class="year">2019</span>
                <p><span>Best Freelancer</span> - Fiver & Upwork Level 2 & Top Rated</p>
              </li>
            </ul>
          </div>
        </div>
        <div class="skills-description">
          <h3>Work & Experience</h3>
        </div>
        <div class="skills-info">
          <div class="experience-card">
            <div class="upper">
              <h3>Sr. Graphic Designer</h3>
              <h5>Part Time | Office</h5>
              <span>2020 - 2021</span>
            </div>
            <div class="hr"></div>
            <h4><label>Avada Theme.</label></h4>
            <p>I design and develop services for customers of all sizes, specializing in creating stylish, modern websites</p>
          </div>
          <div class="experience-card">
            <div class="upper">
              <h3>Cr. Web Developer</h3>
              <h5>Full Time | InHouse</h5>
              <span>2019 - 2020</span>
            </div>
            <div class="hr"></div>
            <h4><label>ib-themes ltd.</label></h4>
            <p>I design and develop services for customers of all sizes, specializing in creating stylish, modern websites</p>
          </div>
          <div class="experience-card">
            <div class="upper">
              <h3>Jr. Web Developer</h3>
              <h5>Full Time | Remote</h5>
              <span>2018 - 2019</span>
            </div>
            <div class="hr"></div>
            <h4><label>Creative Gigs.</label></h4>
            <p>I design and develop services for customers of all sizes, specializing in creating stylish, modern websites</p>
          </div>
        </div>
      </div>
    </div> -->
  <!-- </section> -->

  <!--=======Services section=======-->
  <!-- <section class="services section" id="services">
    <div class="container flex-center">
      <h1 class="section-title-01">Services</h1>
      <h2 class="section-title-02">Services</h2>
      <div class="content">
        <div class="services-description">
          <h3>What we provide</h3>
        </div>
        <ul class="service-list">
          <li class="service-container">
            <div class="service-card">
              <i class="fas fa-pencil-ruler"></i>
              <h3>UI/UX Consultancy</h3>
              <div class="learn-more-btn">Learn More <i class="fas fa-long-arrow-alt-right"></i></div>
            </div>
            <div class="service-modal flex-center">
              <div class="service-modal-body">
                <i class="fas fa-times modal-close-btn"></i>
                <h3>Ui/UX Consultancy</h3>
                <h4>What is UX consulting?</h4>
                <p>UX consulting helps companies improve their product’s overall usability and optimize expenses by implementing the right UX processes, methods, and tools.</p>
                <h4>What I provide</h4>
                <ul>
                  <li><i class="fas fa-check-circle"></i> Establish the right UX processes</li>
                  <li><i class="fas fa-check-circle"></i> Create exceptional user experiences</li>
                  <li><i class="fas fa-check-circle"></i> Discover new business opportunities</li>
                  <li><i class="fas fa-check-circle"></i> Save resources</li>
                </ul>
              </div>
            </div>
          </li>
          <li class="service-container">
            <div class="service-card">
              <i class="fas fa-photo-video"></i>
              <h3>Branding & Design</h3>
              <div class="learn-more-btn">Learn More <i class="fas fa-long-arrow-alt-right"></i></div>
            </div>
            <div class="service-modal flex-center">
              <div class="service-modal-body">
                <i class="fas fa-times modal-close-btn"></i>
                <h3>Branding & Design</h3>
                <h4>What is Brand & Design?</h4>
                <p>Brand Design can be defined as one of the crucial marketing practices of creating the name, logo, design, and the symbolic elements related to the brand to create a distinctive identity in comparison to the other brands in the market and also providing impetus to the product differentiation.</p>
                <h4>What I provide</h4>
                <ul>
                  <li><i class="fas fa-check-circle"></i> Logo Design</li>
                  <li><i class="fas fa-check-circle"></i> Banner Design</li>
                  <li><i class="fas fa-check-circle"></i> Visual Identity Packages</li>
                  <li><i class="fas fa-check-circle"></i> Business Cards & Business Systems</li>
                </ul>
              </div>
            </div>
          </li>
          <li class="service-container">
            <div class="service-card">
              <i class="fas fa-file-code"></i>
              <h3>Web Development</h3>
              <div class="learn-more-btn">Learn More <i class="fas fa-long-arrow-alt-right"></i></div>
            </div>
            <div class="service-modal flex-center">
              <div class="service-modal-body">
                <i class="fas fa-times modal-close-btn"></i>
                <h3>Web Development</h3>
                <h4>What is Web Development?</h4>
                <p>Web development services are used to design, build, support, and evolve all types of web-based software.</p>
                <h4>What I provide</h4>
                <ul>
                  <li><i class="fas fa-check-circle"></i> Web application development</li>
                  <li><i class="fas fa-check-circle"></i> Testing</li>
                  <li><i class="fas fa-check-circle"></i> Maintenance</li>
                </ul>
              </div>
            </div>
          </li>
          <li class="service-container">
            <div class="service-card">
              <i class="fas fa-align-left"></i>
              <h3>Content Writing</h3>
              <div class="learn-more-btn">Learn More <i class="fas fa-long-arrow-alt-right"></i></div>
            </div>
            <div class="service-modal flex-center">
              <div class="service-modal-body">
                <i class="fas fa-times modal-close-btn"></i>
                <h3>Content Writing</h3>
                <h4>What is Content Writing?</h4>
                <p>Content writing is the process of planning, writing and editing web content, typically for digital marketing purposes.</p>
                <h4>What I provide</h4>
                <ul>
                  <li><i class="fas fa-check-circle"></i> Web content writing</li>
                  <li><i class="fas fa-check-circle"></i> Blog writing for websites</li>
                  <li><i class="fas fa-check-circle"></i> Social media content</li>
                </ul>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </section> -->

  <!--=======Portfolio section=======-->
  <section class="portfolio section" id="portfolio">
    <div class="container flex-center">
      <h1 class="section-title-01">Portfolio</h1>
      <h2 class="section-title-02">Portfolio</h2>
      <div class="content">
        <div class="portfolio-list">
          <div class="img-card-container">
            <div class="img-card">
              <div class="overlay"></div>
              <div class="info">
                <h3>Web Design</h3>
                <span>Youtube</span>
              </div>
              <img src="images/port-img1.jpg" alt="">
            </div>
            <div class="porfolio-model flex-center">
              <div class="portfolio-model-body">
                <i class="fas fa-times portfolio-close-btn"></i>
                <h3>Web Design</h3>
                <img src="images/port-img1.jpg" alt="">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                  aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              </div>
            </div>
          </div>
          <div class="img-card-container">
            <div class="img-card">
              <div class="overlay"></div>
              <div class="info">
                <h3>UI/UX Design</h3>
                <span>Youtube</span>
              </div>
              <img src="images/port-img2.jpg" alt="">
            </div>
            <div class="porfolio-model flex-center">
              <div class="portfolio-model-body">
                <i class="fas fa-times portfolio-close-btn"></i>
                <h3>UI/UX Design</h3>
                <img src="images/port-img2.jpg" alt="">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                  magna
                  aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                  consequat.</p>
              </div>
            </div>
          </div>
          <div class="img-card-container">
            <div class="img-card">
              <div class="overlay"></div>
              <div class="info">
                <h3>Branding & Design</h3>
                <span>Youtube</span>
              </div>
              <img src="images/port-img3.jpg" alt="">
            </div>
            <div class="porfolio-model flex-center">
              <div class="portfolio-model-body">
                <i class="fas fa-times portfolio-close-btn"></i>
                <h3>Branding & Design</h3>
                <img src="images/port-img3.jpg" alt="">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                  magna
                  aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                  consequat.</p>
              </div>
            </div>
          </div>
          <div class="img-card-container">
            <div class="img-card">
              <div class="overlay"></div>
              <div class="info">
                <h3>Web Development</h3>
                <span>Youtube</span>
              </div>
              <img src="images/port-img4.jpg" alt="">
            </div>
            <div class="porfolio-model flex-center">
              <div class="portfolio-model-body">
                <i class="fas fa-times portfolio-close-btn"></i>
                <h3>Web Development</h3>
                <img src="images/port-img4.jpg" alt="">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                  magna
                  aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                  consequat.</p>
              </div>
            </div>
          </div>
          <div class="img-card-container">
            <div class="img-card">
              <div class="overlay"></div>
              <div class="info">
                <h3>Content Writing</h3>
                <span>Youtube</span>
              </div>
              <img src="images/port-img5.jpg" alt="">
            </div>
            <div class="porfolio-model flex-center">
              <div class="portfolio-model-body">
                <i class="fas fa-times portfolio-close-btn"></i>
                <h3>Content Writing</h3>
                <img src="images/port-img5.jpg" alt="">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                  magna
                  aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                  consequat.</p>
              </div>
            </div>
          </div>
          <div class="img-card-container">
            <div class="img-card">
              <div class="overlay"></div>
              <div class="info">
                <h3>Interface Design</h3>
                <span>Youtube</span>
              </div>
              <img src="images/port-img6.jpg" alt="">
            </div>
            <div class="porfolio-model flex-center">
              <div class="portfolio-model-body">
                <i class="fas fa-times portfolio-close-btn"></i>
                <h3>Interface Design</h3>
                <img src="images/port-img6.jpg" alt="">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                  magna
                  aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                  consequat.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--=======Get-in-touct=======-->
    <!-- <div class="get-in-touch sub-section">
      <div class="container">
        <div class="content flex-center">
          <div class="contact-card flex-center">
            <div class="title">
              <h4>Let's Talk</h4>
              <h3>About Your</h3>
              <h2>Next Project</h2>
            </div>
            <div class="contact-btn">
              <a href="" class="btn">Get In Touch <i class="fas fa-paper-plane"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div> -->

    <!--=======Our Clients=======-->
    <!-- <div class="our-client sub-section">
      <div class="container flex-center">
        <h1 class="section-title-01">Our Clients</h1>
        <h2 class="section-title-02">Our Clients</h2>
        <div class="content">
          <div class="swiper client-swiper">
            <div class="swiper-wrapper">
              <div class="swiper-slide flex-center">
                <div class="client-img">
                  <img src="images/client1.jpg" alt="">
                </div>
                <div class="client-details">
                  <p>Hi, I’m Aria Collins and I am designer & developer who dream making the world better place by products. I am also very active for international clients.</p>
                  <h3>Aria Collins</h3>
                  <span>Marketing Manager</span>
                </div>
              </div>
              <div class="swiper-slide flex-center">
                <div class="client-img">
                  <img src="images/client2.jpg" alt="">
                </div>
                <div class="client-details">
                  <p>This is outstanding work. Everything I needed to do has been done by the makers. I really like this template and more importantly my clients are blown away by it.</p>
                  <h3>Cillian Metcalfe</h3>
                  <span>Graphic Designer</span>
                </div>
              </div>
              <div class="swiper-slide flex-center">
                <div class="client-img">
                  <img src="images/client3.jpg" alt="">
                </div>
                <div class="client-details">
                  <p>These people really know what they are doing! Great customer support availability and supperb kindness. I am very happy that I've purchased this liscense!!!</p>
                  <h3>Kianna Baird</h3>
                  <span>App Developer</span>
                </div>
              </div>
            </div>
            <div class="swiper-button-next">
              <i class="fas fa-chevron-right"></i>
            </div>
            <div class="swiper-button-prev">
              <i class="fas fa-chevron-left"></i>
            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>
      </div>
    </div> -->
  </section>

  <!--=======Contact section=======-->
  <section class="contact section" id="contact">
    <!-- <div class="container flex-center">
      <h1 class="section-title-01">Contact Me</h1>
      <h2 class="section-title-02">Contact Me</h2>
      <div class="content">
        <div class="contact-left">
          <h2>Let's discuss your project</h2>
          <ul class="contact-list">
            <li>
              <h3 class="item-title"><i class="fas fa-phone"></i> Phone</h3>
              <span>+00 123-777-9999</span>
            </li>
            <li>
              <h3 class="item-title"><i class="fas fa-envelope"></i> Email Address</h3>
              <span><a href="mailto:martian@email.com">martian@email.com</a></span>
            </li>
            <li>
              <h3 class="item-title"><i class="fas fa-map-marker-alt"></i> Official Address</h3>
              <span>7249 Brewery Ave. San Francisco, CA 94112</span>
            </li>
          </ul>
        </div>
        <div class="contact-right">
          <p>I'm always open to discussing product<br><span>design work or partnerships.</span></p>
          <form action="" class="contact-form">
            <div class="first-row">
              <input type="text" placeholder="Name">
            </div>
            <div class="second-row">
              <input type="email" placeholder="Email">
              <input type="text" placeholder="Subject">
            </div>
            <div class="third-row">
              <textarea name="message" id="" rows="7" placeholder="Message"></textarea>
            </div>
            <button class="btn" type="submit">Send Message <i class="fas fa-paper-plane"></i></button>
          </form>
        </div>
      </div>
    </div> -->
  </section>

  <!--=======Footer=======-->
  <footer>
    <div class="footer-container">
      <div class="about group">
        <h2>POWEREC</h2>
        <p>POWER • EXTRAORDINARY • COMMITTED</p>
      </div>
      <div class="hr"></div>
      <div class="info group" style="margin-right: 40px;">
        <h3>More</h3>
        <ul>
          <li><a href="#skills">To Do List</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#portfolio">Portfolio</a></li>
        </ul>
      </div>
      <div class="hr"></div>
      <div class="follow group">
        <h3>Follow</h3>
        <ul>
          <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
          <li><a href=""><i class="fab fa-instagram"></i></a></li>
          <li><a href=""><i class="fab fa-twitter"></i></a></li>
        </ul>
      </div>
    </div>
    <div class="footer-copyright group">
      <p style="margin-left:20px;">© 2021 by UTM Students. All rights reserved.</p>
    </div>
  </footer>

  <!--=======External scripts=======-->
  <script src="js/swiper-bundle.min.js"></script>
  <script src="js/main.js"></script>

</body>

</html>