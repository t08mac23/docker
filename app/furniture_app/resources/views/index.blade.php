<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>FurnitureApp</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <!-- tailwind -->
        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item">
                            @if (Auth::guard('masters')->check())
                              <a class="nav-link" href="{{ route('master.index') }}">
                                {{ Auth::guard('masters')->user()->master_name }}でログイン中
                              </a>
                            @else
                              @if (Route::has('login'))
                                @auth
                                    <a class="nav-link" href="{{ url('/dashboard') }}" >Dashboard</a>
                                @else
                                    <a class="nav-link" href="{{ route('login') }}" >Log in</a>

                                    @if (Route::has('register'))
                                    <li class="nav-item">
                                      <a class="nav-link" href="{{ route('register') }}" >Register</a>
                                    </li>
                                    @endif
                                @endauth
                              @endif
                            @endif
                        </li>
                        <li class="nav-item">
                            @auth
                            <a class="nav-link" href="{{ ('user/profile') }}">ようこそ、{{ Auth::user()->name }}さん</a>
                            @endauth
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                        <li class="nav-item"><a class="nav-link" href="#portfolio">Portfolio</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#team">Team</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Welcome To Our Furniture App!</div>
                <div class="masthead-heading text-uppercase">It's Nice To Meet You</div>
            </div>
        </header>
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Services</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
                <div class="row text-center">
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">E-Commerce</h4>
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Responsive Design</h4>
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Web Security</h4>
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Portfolio Grid-->
        <section class="page-section bg-light" id="portfolio">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Portfolio</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Portfolio item 1-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="{{ asset('img/portfolio/07.jpeg') }}" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Threads</div>
                                <div class="portfolio-caption-subheading text-muted">Illustration</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Portfolio item 2-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal2">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="{{ asset('img/portfolio/06.jpeg') }}" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Explore</div>
                                <div class="portfolio-caption-subheading text-muted">Graphic Design</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Portfolio item 3-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal3">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="{{ asset('img/portfolio/03.jpeg') }}" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Finish</div>
                                <div class="portfolio-caption-subheading text-muted">Identity</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                  <a class="btn btn-primary btn-xl text-uppercase" href="{{ route('furniture.index') }}">Let Me See</a>
                </div>
                <div class="bg-white py-6 sm:py-8 lg:py-12">
                  <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                    <!-- text - start -->
                    <div class="mb-10 md:mb-16">
                      <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">Models</h2>

                      <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">This is a section of some simple filler text, also known as placeholder text. It shares some characteristics of a real written text but is random or otherwise generated.</p>
                    </div>
                    <!-- text - end -->

                    <div class="grid gap-4 sm:grid-cols-2 md:gap-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-8">
                      <!-- article - start -->
                      <a href="#" class="group relative flex h-48 flex-col overflow-hidden rounded-lg bg-gray-100 shadow-lg md:h-64 xl:h-96">
                        <img src="{{ asset('img/portfolio/02.jpeg') }}" loading="lazy" alt="Photo by Minh Pham" class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />

                        <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-gray-800 to-transparent md:via-transparent"></div>

                        <div class="relative mt-auto p-4">
                          <span class="block text-sm text-gray-200">July 19, 2021</span>
                          <h2 class="mb-2 text-xl font-semibold text-white transition duration-100">New trends in Tech</h2>

                          <span class="font-semibold text-indigo-300">Read more</span>
                        </div>
                      </a>
                      <!-- article - end -->

                      <!-- article - start -->
                      <a href="#" class="group relative flex h-48 flex-col overflow-hidden rounded-lg bg-gray-100 shadow-lg md:h-64 xl:h-96">
                        <img src="{{ asset('img/portfolio/04.jpeg') }}" loading="lazy" alt="Photo by Lorenzo Herrera" class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />

                        <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-gray-800 to-transparent md:via-transparent"></div>

                        <div class="relative mt-auto p-4">
                          <span class="block text-sm text-gray-200">April 07, 2021</span>
                          <h2 class="mb-2 text-xl font-semibold text-white transition duration-100">Working with legacy stacks</h2>

                          <span class="font-semibold text-indigo-300">Read more</span>
                        </div>
                      </a>
                      <!-- article - end -->

                      <!-- article - start -->
                      <a href="#" class="group relative flex h-48 flex-col overflow-hidden rounded-lg bg-gray-100 shadow-lg md:h-64 xl:h-96">
                        <img src="{{ asset('img/portfolio/05.jpeg') }}" loading="lazy" alt="Photo by Magicle" class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />

                        <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-gray-800 to-transparent md:via-transparent"></div>

                        <div class="relative mt-auto p-4">
                          <span class="block text-sm text-gray-200">March 15, 2021</span>
                          <h2 class="mb-2 text-xl font-semibold text-white transition duration-100">10 best smartphones for devs</h2>

                          <span class="font-semibold text-indigo-300">Read more</span>
                        </div>
                      </a>
                      <!-- article - end -->

                      <!-- article - start -->
                      <a href="#" class="group relative flex h-48 flex-col overflow-hidden rounded-lg bg-gray-100 shadow-lg md:h-64 xl:h-96">
                        <img src="{{ asset('img/portfolio/08.jpeg') }}" loading="lazy" alt="Photo by Martin Sanchez" class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />

                        <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-gray-800 to-transparent md:via-transparent"></div>

                        <div class="relative mt-auto p-4">
                          <span class="block text-sm text-gray-200">January 27, 2021</span>
                          <h2 class="mb-2 text-xl font-semibold text-white transition duration-100">8 High performance Notebooks</h2>

                          <span class="font-semibold text-indigo-300">Read more</span>
                        </div>
                      </a>
                      <!-- article - end -->
                    </div>
                  </div>
                </div>

                <div class="bg-white py-6 sm:py-8 lg:py-12">
                  <div class="mx-auto max-w-screen-md px-4 md:px-8">
                    <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-8 lg:text-3xl xl:mb-12">Customer Reviews</h2>


                    <div class="divide-y">
                      <!-- review - start -->
                      <!-- 繰り返し処理の回数制限 -->
                      <?php $counter = 0; ?>
                      @foreach($posts as $post)
                      <?php
                      //ループが指定回数回ったらbreakする
                      if ($counter >= 2) {
                        break;
                      }
                      //変数にループ回数分足していく
                      $counter++;
                      ?>
                        <div class="flex flex-col gap-3 py-4 md:py-8">
                          <div>
                            <span class="block text-sm font-bold">レビュー：{{ $post->review }}</span>
                            <span class="block text-sm font-bold">ニックネーム{{ $post->nickname }}</span>
                            <span class="block text-sm text-gray-500">投稿日：{{ $post->created_at }}</span>
                          </div>
                          <p class="text-gray-600">{!! nl2br(e($post->body)) !!}</p>
                        </div>
                      @endforeach
                      <!-- review - end -->
                      <a href="{{ route('post.index') }}" class="inline-block rounded-lg border bg-white px-4 py-2 text-center text-sm font-semibold text-gray-500 outline-none ring-indigo-300 transition duration-100 hover:bg-gray-100 focus-visible:ring active:bg-gray-200 md:px-8 md:py-3 md:text-base">More</a>
                    </div>
                  </div>
                </div>
            </div>
        </section>

        <!-- About-->
        <section class="page-section" id="about">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">About</h2>
                    <h3 class="section-subheading text-muted">Only 3 steps.</h3>
                </div>
                <ul class="timeline">
                    <li>
                        <div class="timeline-image"><h4>1 <br />FIRST <br />STEP</h4></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>2009-2011</h4>
                                <h4 class="subheading">Our Humble Beginnings</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><h4>2 <br />SECOND <br />STEP</h4></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>March 2011</h4>
                                <h4 class="subheading">An Agency is Born</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p></div>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-image"><h4>3 <br />THIRD <br />STEP</h4></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>December 2015</h4>
                                <h4 class="subheading">Transition to Full Service</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image">
                            <h4>
                                GET
                                <br />
                                YOUR
                                <br />
                                FURNITURE!
                            </h4>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        <!-- Team-->
        <section class="page-section bg-light" id="team">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Our Amazing Team</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="{{ asset('img/team/1.jpg') }}" />
                            <h4>Parveen Anand</h4>
                            <p class="text-muted">Lead Designer</p>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Parveen Anand Twitter Profile"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Parveen Anand Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Parveen Anand LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="{{ asset('img/team/2.jpg') }}" />
                            <h4>Diana Petersen</h4>
                            <p class="text-muted">Lead Marketer</p>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Diana Petersen Twitter Profile"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Diana Petersen Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Diana Petersen LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="{{ asset('img/team/3.jpg') }}" />
                            <h4>Larry Parker</h4>
                            <p class="text-muted">Lead Developer</p>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker Twitter Profile"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center"><p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p></div>
                </div>
            </div>
        </section>
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Contact Us</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
                <!-- * * * * * * * * * * * * * * *-->
                <!-- * * SB Forms Contact Form * *-->
                <!-- * * * * * * * * * * * * * * *-->
                <!-- This form is pre-integrated with SB Forms.-->
                <!-- To make this form functional, sign up at-->
                <!-- https://startbootstrap.com/solution/contact-forms-->
                <!-- to get an API token!-->
                <form action="{{ route('post.store') }}" method="POST" id="contactForm" >
                    @csrf
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- Name input-->
                                <input class="form-control" name="nickname" value="{{ old('nickname') }}"id="nickname" type="text" placeholder="ニックネーム *" data-sb-validations="required" />
                                @if ($errors->has('nickname'))
                                  <p class="alert alert-danger">{{ $errors->first('nickname') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <!-- Email address input-->
                                <input class="form-control" name="email" value="{{ old('email') }}" id="email" type="email" placeholder="メールアドレス *" data-sb-validations="required,email" />
                                @if ($errors->has('email'))
                                  <p class="alert alert-danger">{{ $errors->first('email') }}</p>
                                @endif
                            </div>
                            <div class="form-group mb-md-0">
                                <!-- Phone number input-->
                                <select class="form-control" name="review" value="{{ old('review') }}" id="review" type="review" placeholder="▼選択してください *" data-sb-validations="required" >
                                  <option value="">▼選択してください</option>
                                  <option value="★☆☆☆☆">★☆☆☆☆</option>
                                  <option value="★★☆☆☆">★★☆☆☆</option>
                                  <option value="★★★☆☆">★★★☆☆</option>
                                  <option value="★★★★☆">★★★★☆</option>
                                  <option value="★★★★★">★★★★★</option>
                                </select>
                                @if ($errors->has('review'))
                                  <p class="alert alert-danger">{{ $errors->first('review') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-textarea mb-md-0">
                                <!-- Message input-->
                                <textarea class="form-control" name="body" value="{{ old('body') }}" id="body" placeholder="コメント *" data-sb-validations="required"></textarea>
                                @if ($errors->has('body'))
                                  <p class="alert alert-danger">{{ $errors->first('body') }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- Submit success message-->
                    <!---->
                    <!-- This is what your users will see when the form-->
                    <!-- has successfully submitted-->
                    <div class="d-none" id="submitSuccessMessage">
                        <div class="text-center text-white mb-3">
                            <div class="fw-bolder">Form submission successful!</div>
                            To activate this form, sign up at
                            <br />
                            <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                        </div>
                    </div>
                    <!-- Submit error message-->
                    <!---->
                    <!-- This is what your users will see when there is-->
                    <!-- an error submitting the form-->
                    <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                    <!-- Submit Button-->
                    @auth
                      <div class="text-center">
                        <button class="btn btn-primary btn-xl text-uppercase" id="submitButton" type="submit" value="submit">Send Message</button>
                      </div>
                    @else
                      <div class="text-center">
                        <button class="btn btn-primary btn-xl text-uppercase" id="submitButton" type="submit">ログインへ</button>
                      </div>
                    @endauth
                </form>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright &copy; Your Website 2023</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                        <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Portfolio Modals-->
        <!-- Portfolio item 1 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="{{ asset('img/portfolio/07.jpeg') }}" alt="..." />
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-inline">
                                        <li>
                                          <div class="text-center">
                                            <a class="btn btn-primary bg-green-700 btn-xl text-uppercase" href="{{ route('furniture.index') }}"></i>Let Me See</a>
                                          </div>
                                        </li>
                                        <li>
                                          <button class="btn btn-primary bg-red-500 btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                              <i class="fas fa-xmark me-1"></i>
                                              Close Project
                                          </button>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio item 2 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="{{ asset('img/portfolio/06.jpeg') }}" alt="..." />
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Client:</strong>
                                            Explore
                                        </li>
                                        <li>
                                            <strong>Category:</strong>
                                            Graphic Design
                                        </li>
                                    </ul>
                                    <ul class="list-inline">
                                        <li>
                                          <div class="text-center">
                                            <a class="btn btn-primary bg-green-700 btn-xl text-uppercase" href="{{ route('furniture.index') }}"></i>Let Me See</a>
                                          </div>
                                        </li>
                                        <li>
                                          <button class="btn btn-primary bg-red-500 btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                              <i class="fas fa-xmark me-1"></i>
                                              Close Project
                                          </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio item 3 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="{{ asset('img/portfolio/03.jpeg') }}" alt="..." />
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Client:</strong>
                                            Finish
                                        </li>
                                        <li>
                                            <strong>Category:</strong>
                                            Identity
                                        </li>
                                    </ul>
                                    <ul class="list-inline">
                                        <li>
                                          <div class="text-center">
                                            <a class="btn btn-primary bg-green-700 btn-xl text-uppercase" href="{{ route('furniture.index') }}"></i>Let Me See</a>
                                          </div>
                                        </li>
                                        <li>
                                          <button class="btn btn-primary bg-red-500 btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                              <i class="fas fa-xmark me-1"></i>
                                              Close Project
                                          </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>