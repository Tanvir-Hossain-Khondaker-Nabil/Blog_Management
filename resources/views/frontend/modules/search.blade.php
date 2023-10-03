<!doctype html>
<html lang="en">
<head>
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

        @include('frontend.includes.slider')

        <section id="main_section" class="mt-4" >
			<div class="container-lg p-md-0 px-2 ">
				<div class="row justify-content-between">
					<div class="col-lg-8 col-md-8  mt-md-0 mt-4 ">
						<div class="post-container">
						<div class="post-content">					
							<div class="row ">							
								@foreach($posts as $post)
									<div class="col-lg-4 gap-bottom">
										<a class="post-img" href="{{route('front.post',$post->slug)}}"><img src="{{$post->photo}}" alt=""/></a>
									</div>                          
									<div class="col-lg-8 gap-bottom">
										
										<div class="inner-content ">
												<h3><a href="{{route('front.post',$post->slug)}}">{{$post->title}}</a></h3>
												<div class="post-information">
													<span>
														<i class="fa fa-tags" aria-hidden="true"></i>
														<a href="{{route('front.category',$category->slug)}}">{{$post->category->name}}</a>
													</span>
													<span>
														<i class="fa fa-user" aria-hidden="true"></i>
														<a href='author.php'>{{$post->user->name}}</a>
													</span>
													<span>
														<i class="fa fa-calendar" aria-hidden="true"></i>
														{{$post->created_at->format('d m Y')}}
													</span>
												</div>
												<!-- <p class="description">{!!strip_tags( Str::limit($post->description,400, '...'))!!}</p> -->
												<!-- <p class="description">{!!strip_tags( substr($post->description,0,700))!!}...</p> -->
												<p class="description">{!!strip_tags( Str::words($post->description,50, '...'))!!}</p>
												<a class='read-more' href="{{route('front.post',$post->slug)}}">read more</a>
											</div> 
										</div>
								@endforeach			
							</div> 						
							{{$posts->links()}}
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-4 mt-md-0 mt-5">
					<div class="samesidebar ">
						<h2>Categories</h2>
						<ul class="sidebar-category">
						@foreach($subcategories as $subcategory)
							<li><a href="{{route('front.subcategory',[$category->slug ,$subcategory->slug])}}">{{$subcategory->name}}</a></li>
						@endforeach
						</ul>
					</div>
					<!-- recent posts box -->
					<div class="recent-post-container mt-md-0 mt-5">
						<h4>Recent Posts</h4>
						@foreach($recent_posts as $post)
							<div class="recent-post">									
								<a class="post-img" href="">
									<img src="{{$post->photo}}" alt=""/>
								</a>
								<div class="post-content">
									<h5><a href="{{route('front.post',$post->slug)}}">{{Str::words($post->title,2,' ')}}</a></h5>
									<span>
										<i class="fa fa-tags" aria-hidden="true"></i>
										<a href="{{route('front.category',$category->slug)}}">{{$post->category->name}}</a>
									</span>
									<span>
										<i class="fa fa-calendar" aria-hidden="true"></i>
										{{$post->created_at->format('d m Y')}}
									</span>
									<a class="read-more" href="{{route('front.post',$post->slug)}}">read more</a>
								</div>							
							</div>
						@endforeach
					</div>
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
