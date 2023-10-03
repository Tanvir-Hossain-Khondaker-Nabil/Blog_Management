<!doctype html>
<html lang="en">
<head>
  <style>    
    .card{
        background: #007babc4 !important;
        color: white!important;
    }

    .background{
        background:#0027362e!important;
    }

    .form-group input[type="text"],.form-group input[type="email"] {
      width: 242px;
    }
  </style>
@include('frontend.includes.head')
</head>
  <body>
  <!-- Blog Starts Here -->
	<div class="container-fluid px-md-2 p-0 bg-container-fluid">
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

        @include('frontend.includes.nav')

      <section id="main_section">
        <div class="container-lg p-md-0 px-2 background">
              <div class="row justify-content-center py-5">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="card card-primary ">
                <div class="card-header">
                <h3 class="card-title">Contact Us</h3>               
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{route('contact.store')}}"">
                  @csrf                                  
                  <div class="card-body">
                      <div class="row justify-content-center">
                        <div class="col-sm-6">
                          <!-- text input -->
                          <div class="form-group">
                            <label>Name</label>
                            <input  type="text" name="name" class="form-control" placeholder="Name" >
                            @error('name')
                            <code>*{{$message}}</code>
                            @enderror
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Email">
                            @error('email')
                            <code>*{{$message}}</code>
                            @enderror
                          </div>
                        </div>
                      </div>
                      <div class="row justify-content-center">
                        <div class="col-sm-6">
                          <!-- text input -->
                          <div class="form-group">
                            <label>Mobile</label>
                            <input  type="text" name="mobile" class="form-control" placeholder="Mobile" >
                            @error('mobile')
                            <code>*{{$message}}</code>
                            @enderror
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Adress</label>
                            <input type="text" name="adress" class="form-control" placeholder="Adress">
                            @error('email')
                            <code>*{{$message}}</code>
                            @enderror
                          </div>
                        </div>
                      </div>
                      <div class="row justify-content-center">
                        <div class="col-sm-12">
                          <!-- text input -->
                          <div class="form-group">
                            <label>Message</label>
                            <textarea  name="message" class="form-control" placeholder="Message" rows="3"></textarea>
                            @error('mobile')
                            <code>*{{$message}}</code>
                            @enderror
                          </div>
                        </div>
                      </div>

                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
              <!-- /.card -->
            </div>
          </div>
            
        </div>
      </section>
        
        @include('frontend.includes.footer')
	</div>

    <!-- Optional JavaScript -->
    <!-- jQuery, then Bootstrap JS -->     

@include('frontend.includes.script')
  </body>
</html>