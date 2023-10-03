<section id='top-bar'>
    <div class="container-lg header-section">
        <div class="row align-items-center">
            <div class="col-md-6 text-center">
                <a href="#">
                    <div class="logo">
                        <img src="{{asset('dist/frontend/images/logo.png')}}" alt="Logo"/>
                        <div class="d-block">
                            <h2>Munirul Islam Ibn Jakir</h2>
                            <p>Activist | Teacher | Social Worker</p>
                        </div>								
                    </div>
                </a>
                    <div class="topnav mt-5 d-md-none  d-block">
                    <!-- Navigation links (hidden by default) -->
                    <div id="myLinks">
                    <a id="active" href="index.html">Home</a>
                    @foreach($categories as $category)
                    <a href="#">{{$category->name}}</a>
                    @endforeach
                    <a href="about.html">About</a>
                    <a href="contact.html">Contact</a>
                    </div>
                    <!-- "Hamburger menu" / "Bar icon" to toggle the navigation links -->
                    <button href="#" class="icon" onclick="myFunction()">
                    <i id="icon" class="fa fa-bars "></i>
                    </button>
                </div>
                <div class="searchbtn search-btn d-md-none d-block">
                <form action="{{route('front.search')}}" method="get">
                    <input type="search" name="keyword" placeholder="Search keyword..."/>
                    <input type="submit" name="submit" value="Search"/>
                </form>
                </div>
            </div>
            <div class="col-md-6 d-md-block d-none">
            
                <div class="social ">
                    <div class="icon">
                        <a href="#" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
                        <a href="#" target="_blank"><i class="fa-brands fa-whatsapp"></i></a>
                    </div>
                    <div class="searchbtn">
                    <form action="" method="post">
                        <input type="text" name="keyword" placeholder="Search keyword..."/>
                        <input type="submit" name="submit" value="Search"/>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>	    			
</section>