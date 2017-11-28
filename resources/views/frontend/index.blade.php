<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Creative Agent test</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Angular -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>

    <link rel="stylesheet" href="{{asset('/css/index.css')}}" />

</head>
<body>

<header>
    <div class="wrapper">
        <div class="check_our_blog col-sm-6">
            Check our blog: <a href="#">How to become a designer?</a>
        </div>
        <div class="social_menu col-sm-6 text-right">
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-google-plus"></i></a>
            <a href="#"><i class="fa fa-github"></i></a>
            <a href="#"><i class="fa fa-dribbble"></i></a>
        </div>
        <div class="clearfix"></div>
    </div>
</header>

<div class="wrapper">
    <nav class="main_nav navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <a class="navbar-brand" href="#"><img src="{{asset('/images/logo.png')}}"></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="main_menu nav navbar-nav">
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Clients</a></li>
                    <li><a href="#">About us</a></li>
                    <li><a href="#">Resources</a></li>
                    <li><a href="#">Blog</a></li>
                    <li class="active"><a href="#">Career</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#" class="estimate_project_btn">Estimate project</a></li>
                </ul>
            </div>
        </div>
    </nav>


    <section class="grid_area resources text-center">
        <h1>Our resources</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

        <div class="col-sm-4 grid-item">
            <a href="#ebooks" class="item text-center">
                <img src="{{asset('/images/icon_ebooks.png')}}" />
                <h3>e-Books</h3>
            </a>
        </div>
        <div class="col-sm-4 grid-item">
            <a href="#open_sources" class="item text-center">
                <img src="{{asset('/images/icon_open_sources.png')}}" />
                <h3>Open source</h3>
            </a>
        </div>
        <div class="col-sm-4 grid-item">
            <a href="#apps" class="item text-center">
                <img src="{{asset('/images/icon_our_apps.png')}}" />
                <h3>Our apps</h3>
            </a>
        </div>
        <div class="clearfix"></div>
    </section>

    <section id="ebooks" class="grid_area popular_ebooks text-center">
        <h2>Popular e-Books</h2>
        <div class="col-sm-4 grid-item">
            <a href="#" class="item text-left">
                <img src="{{asset('/images/book_01.png')}}" />
                <h3>State of Stack Report</h3>
                <p>Report</p>
            </a>
        </div>
        <div class="col-sm-4 grid-item">
            <a href="#" class="item text-left">
                <img src="{{asset('/images/book_02.png')}}" />
                <h3>State of Stack Report</h3>
                <p>Report</p>
            </a>
        </div>
        <div class="col-sm-4 grid-item">
            <a href="#" class="item text-left">
                <img src="{{asset('/images/book_03.png')}}" />
                <h3>State of Stack Report</h3>
                <p>Report</p>
            </a>
        </div>
        <div class="clearfix"></div>
        <a href="#" class="view_all">View all</a>
    </section>

    <section id="open_sources" class="grid_area popular_open_sources text-center">
        <h2>Popular Open Source</h2>
        <div class="col-sm-4 grid-item">
            <div class="item text-left">
                <h3>Checker</h3>
                <p>A collection of modules designed to check syntax (mainly) on files to be commited via GIT.</p>
                <img src="{{asset('/images/people.png')}}" />
                <a href="#" class="github_link">View on GitHub</a>
            </div>
        </div>
        <div class="col-sm-4 grid-item">
            <div class="item text-left">
                <h3>Checker</h3>
                <p>A collection of modules designed to check syntax (mainly) on files to be commited via GIT.</p>
                <img src="{{asset('/images/people.png')}}" />
                <a href="#" class="github_link">View on Github</a>
            </div>
        </div>
        <div class="col-sm-4 grid-item">
            <div href="#" class="item text-left">
                <h3>Checker</h3>
                <p>A collection of modules designed to check syntax (mainly) on files to be commited via GIT.</p>
                <img src="{{asset('/images/people.png')}}" />
                <a href="#" class="github_link">View on Github</a>
            </div>
        </div>
        <div class="clearfix"></div>
        <a href="#" class="view_all">View all</a>
    </section>

    <section id="apps" class="grid_area popular_apps text-center">
        <h2>Our Popular Apps</h2>
        <div class="col-sm-4 grid-item">
            <a href="#" class="item text-left">
                <img src="{{asset('/images/app_01.png')}}" />
                <h3>Inbbox App for Android</h3>
                <p>iOS App</p>
            </a>
        </div>
        <div class="col-sm-4 grid-item">
            <a href="#" class="item text-left">
                <img src="{{asset('/images/app_02.png')}}" />
                <h3>Project Management Tactics for Pros</h3>
                <p>iOS App</p>
            </a>
        </div>
        <div class="col-sm-4 grid-item">
            <a href="#" class="item text-left">
                <img src="{{asset('/images/app_03.png')}}" />
                <h3>Picguard GEM</h3>
                <p>Web App</p>
            </a>
        </div>
        <div class="clearfix"></div>
        <a href="#" class="view_all">View all</a>
    </section>
</div>

<section class="green_area text-center">
    <h2>Do you want start a new project?</h2>
    <a href="#" class="estimate_project_btn">Estimate project</a>
</section>


<section class="social_area text-center">
    <div class="wrapper">
        <div class="col-sm-2 col-sm-4 col-xs-6"><a href="#"><i class="fa fa-twitter"></i></a></div>
        <div class="col-sm-2 col-sm-4 col-xs-6"><a href="#"><i class="fa fa-facebook"></i></a></div>
        <div class="col-sm-2 col-sm-4 col-xs-6"><a href="#"><i class="fa fa-linkedin"></i></a></div>
        <div class="col-sm-2 col-sm-4 col-xs-6"><a href="#"><i class="fa fa-google-plus"></i></a></div>
        <div class="col-sm-2 col-sm-4 col-xs-6"><a href="#"><i class="fa fa-github"></i></a></div>
        <div class="col-sm-2 col-sm-4 col-xs-6"><a href="#"><i class="fa fa-dribbble"></i></a></div>
        <div class="clearfix"></div>
    </div>
</section>

<section class="newsletter text-center">
    <form class="form-inline">
        <div class="form-group">
            <label for="email">Newsletter</label>
            <input type="email" class="" placeholder="E-mail address" />
        </div>

        <button type="submit" class="btn btn-default">Subscribe</button>

    </form>
</section>

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img src="{{asset('/images/logo.png')}}" class="logo" />

                <div class="row">
                    <div class="col-sm-5">
                        <ul>
                            <li><a href="mailto:hi@netguru.co" class="active">hi@netguru.co</a></li>
                            <li class="phone">+48 884 382 983</li>
                        </ul>
                    </div>
                    <div class="col-sm-7">
                        <ul>
                            <li>ul. 27 Grudnia 3</li>
                            <li>61-737 Poznan, Poland</li>
                            <li></li>
                            <li>VAT-ID: PL7781454968</li>
                            <li>REGON: 300826280</li>
                            <li>KRS: 0000306593</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-2">
                <h3>Menu</h3>
                <ul>
                    <li><a href="#">Services</a></li>
                    <li><a href="#" class="active">Clients</a></li>
                    <li><a href="#">About us</a></li>
                    <li><a href="#">Resources</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="col-sm-2">
                <h3>Locations</h3>
                <ul>
                    <li><a href="#">Caribean</a></li>
                    <li><a href="#">USA</a></li>
                    <li><a href="#">London</a></li>
                    <li><a href="#">Berlin</a></li>
                    <li><a href="#">Helsinki</a></li>
                    <li><a href="#">Dublin</a></li>
                </ul>
            </div>
            <div class="col-sm-2">
                <h3>Technologies</h3>
                <ul>
                    <li><a href="#">HTML 5</a></li>
                    <li><a href="#">Ember</a></li>
                    <li><a href="#">Angular</a></li>
                    <li><a href="#">Android</a></li>
                    <li><a href="#">iOS</a></li>
                    <li><a href="#">Spree e-Commerce</a></li>
                </ul>
            </div>
            <div class="col-md-2">
                <h3>Awards</h3>
                <img src="{{asset('/images/deloitte.png')}}" />
            </div>
        </div>
    </div>
</footer>

</body>
</html>

