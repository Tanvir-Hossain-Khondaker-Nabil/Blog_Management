<!doctype html>
<html lang="en">

<head>
    <style>
        .section-row {
            margin-bottom: 30px;
        }

        .section-title {
            position: relative;
            margin-bottom: 20px;
        }

        .section-title .title {
            position: relative;
            display: inline-block;
            background-color: #fff;
            font-size: 19px;
            text-transform: uppercase;
            margin-top: 0px;
            margin-bottom: 0px;
            padding-right: 10px;
            z-index: 20;
            font-weight: 700;
        }

        .post-comments .media:nth-child(1) {
            margin-top: 0px;
        }

        .post-comments .media .media-left {
            position: relative;
            padding-right: 15px;
        }

        .post-comments .media .media-left {
            position: relative;
            padding-right: 15px;
        }

        .media-body,
        .media-left {
            display: table-cell;
            vertical-align: top;
        }

        .media-left {
            padding-right: 10px;
        }

        .post-comments .media .media-left .media-object {
            width: 50px;
            border-radius: 50%;
            position: relative;
            z-index: 20;
        }

        .media-body,
        .media-left {
            display: table-cell;
            vertical-align: top;
        }

        .media-body {
            width: 10000px;
        }

        .media {
            display: flex;
            align-items: flex-start;
        }

        .media,
        .media-body {
            overflow: hidden;
            zoom: 1;
        }

        .media-heading {
            margin-top: 0;
            margin-bottom: 5px;
        }

        .media-heading h4 {
            font-size: 16px;
            text-transform: uppercase;
            font-weight: 700;
        }

        .media-body p {
            font-size: 16px;
            font-weight: 400;
            color: #000000bd;
        }

        .post-comments .media .media-heading .time {
            color: #97989b;
            margin-left: 10px;
            font-size: 12px;
        }

        .post-comments .media .reply {
            text-transform: uppercase;
            display: inline-block;
            padding: 6px 11px;
            font-size: 12px;
            font-weight: 700;
            color: #fff;
            background-color: #323335;
            border-radius: 2px;
            -webkit-transition: 0.2s opacity;
            transition: 0.2s opacity;
            margin-top: -1px;
            height: 33px;
            border-radius: 0px 5px 5px 0px;
        }

        .post-comments .media {
            margin-top: 30px;
        }

        .post-comments .media .media-left:after {
            content: '';
            position: absolute;
            left: calc(50% - 9px);
            top: 80px;
            bottom: 15px;
            width: 1px;
            height: 40px;
        }

        .post-comments .media.media-author .media-left:after {
            background-color: #ee4266 !important;
        }

        .section-title:after {
            content: "";
            display: inline-block;
            height: 2px;
            background-color: #0000002e;
            position: absolute;
            left: 0;
            right: 0;
            top: 10px;
            z-index: 10;
        }

        .form-group {
            margin-bottom: 15px;
        }

        textarea.input {
            padding: 15px;
            height: 150px;
        }

        .input {
            width: 100%;
            height: 40px;
            padding: 0px 15px;
            background-color: #fff;
            border-radius: 2px;
            border: 1px solid #0000002b;
        }

        .primary-button,
        .secondary-button {
            display: inline-block;
            padding: 10px 40px;
            border-radius: 2px;
            border: none;
            font-weight: 700;
            font-size: 14px;
            text-transform: uppercase;
            -webkit-transition: 0.2s all;
            transition: 0.2s all;
        }

        form {
            display: block;
            margin-top: 0em;
        }

        .primary-button {
            background-color: #ee4266;
            color: #fff;
            -webkit-box-shadow: 0px 0px 0px 2px #ee4266 inset;
            box-shadow: 0px 0px 0px 2px #ee4266 inset;
        }

        .post-comments .media.media-author .media-heading h4 {
            color: #ee4266;
        }

        .form-control:focus {
            box-shadow: none !important;
        }

        .form-control {
            border: 1px solid #323335 !important;
        }

        .reply-from {
            margin-right: -1px !important;
            border-radius: 5px 0px 0px 5px !important;
        }

        table tr td p {
            width: 1100px !important;
        }

        .post-container {
            padding: 0 !important;
        }

        .card-img-overlay {
            background: #000000ad !important;
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
                                <img src="{{ asset('dist/frontend/images/logo.png') }}" alt="Logo" />
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
                                @foreach ($categories as $category)
                                    <a href="#">{{ $category->name }}</a>
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
                            <form action="{{ route('front.search') }}" method="get">
                                <input type="search" name="keyword" placeholder="Search keyword..." />
                                <input type="submit" name="submit" value="Search" />
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
                                    <input type="text" name="keyword" placeholder="Search keyword..." />
                                    <input type="submit" name="submit" value="Search" />
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('frontend.includes.nav')


        <section id="main_section">
            <div class="container-lg p-md-0 px-2 ">

                <div class="card bg-dark text-white ">
                    <img src="{{ asset($posts->photo) }}" class="card-img " data-src="{{ asset($posts->photo) }}"
                        style="width:100%;height:300px;object-fit: cover;" alt="{{ $posts->title }}">
                    <div class="card-img-overlay">
                        <p class="card-text" style="font-weight:900;font-size:30px;text-align:center;padding-top:70px;">
                            {{ $posts->title }}</p>
                        <div class="text-center mt-4">
                            <p class="card-text" style="font-size:15px">
                                <th>Tags :</th>
                                <td>
                                    @foreach ($posts->tag as $tag)
                                        <span class="badge rounded-pill bg-info text-dark">{{ $tag->name }}</span>
                                    @endforeach
                                </td>
                            </p>
                            <p class="card-text my-3" style="font-size:15px">
                                <th>Category :</th>
                                <td><span class="badge bg-success text-dark">{{ $posts->category->name }}</span> ➧ <span
                                        class="badge bg-success text-dark">{{ $posts->sub_category->name }}</span></td>
                            </p>
                            <p class="card-text" style="font-size:15px">
                                <th>Author :</th>
                                <td><span class="badge rounded-pill bg-dark">{{ $posts->user->name }}</span></td>
                            </p>
                        </div>

                    </div>
                </div>

                <!-- <img src="{{ asset($posts->photo) }}" data-src="{{ asset($posts->photo) }}" style="width:100%;height:300px;object-fit: cover;" alt="{{ $posts->title }}"> -->
                <div class="row justify-content-center mt-3">
                    <div class="col-12">
                        <div class="post-container">

                            <table class="table ">
                                <tbody>
                                    <!-- <tr> -->
                                    <!-- <th style="width:200px">Title</th> -->
                                    <!-- <td style="font-weight:900;font-size:25px;">{{ $posts->title }}</td> -->
                                    <!-- </tr>                                -->
                                    <tr>
                                        <!-- <th style="width:200px">Description</th> -->
                                        <td>{!! $posts->description !!}</td>
                                    </tr>
                                    <!-- <tr>
                                        <th style="width:200px">Tags </th>
                                        <td>
                                            @foreach ($posts->tag as $tag)
<span class="badge rounded-pill bg-info text-dark">{{ $tag->name }}</span>
@endforeach
                                        </td>
                                    </tr> -->

                                </tbody>
                            </table>

                            <div class="section-row mt-5">
                                <div class="section-title">
                                    <h3 class="title">{{ $count }} Comments</h3>
                                </div>
                                <div class="post-comments">
                                    @foreach ($posts->comment as $comment)
                                        <div class="media">
                                            <div class="media-left">
                                                <img class="media-object" src="{{ asset('dist/img/avatar4.png') }}"
                                                    alt="">
                                            </div>
                                            <div class="media-body">
                                                <div class="media-heading">
                                                    <h4>{{ $comment->user->name }}</h4>
                                                    <span
                                                        class="time">{{ $comment->created_at->diffForHumans() }}</span>
                                                </div>
                                                <p>{{ $comment->message }}</p>
                                                <form method="post" action="{{ route('reply.store') }}">
                                                    @csrf
                                                    <input type="hidden" name="post_id"
                                                        value="{{ $posts->id }}">
                                                    <input type="hidden" name="comment_id"
                                                        value="{{ $comment->id }}">
                                                    <div style="width:200px" class="input-group input-group-sm my-3">
                                                        <input type="text" name="message"
                                                            class="form-control reply-from"
                                                            aria-label="Sizing example input"
                                                            aria-describedby="inputGroup-sizing-sm"
                                                            placeholder="reply here...">
                                                        <button type="submit" class="input-group-text reply"
                                                            id="inputGroup-sizing-sm">Reply</button>
                                                    </div>
                                                </form>

                                                <!-- <a href="#" class="reply">Reply</a> -->
                                                @foreach ($posts->reply as $reply)
                                                    <div class="media media-author">
                                                        <div class="media-left">
                                                            <img class="media-object"
                                                                src="{{ asset('dist/img/avatar3.png') }}"
                                                                alt="">
                                                        </div>
                                                        <div class="media-body">
                                                            <div class="media-heading">
                                                                <h4>{{ $reply->user->name }}</h4>
                                                                <span
                                                                    class="time">{{ $reply->created_at->diffForHumans() }}</span>
                                                            </div>
                                                            <p>{{ $reply->message }}</p>
                                                            <a href="#" class="reply mt-4 mb-2"
                                                                style="padding:7px 13px;border-radius:0px">Reply By</a>
                                                        </div>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="section-row mt-5">
                                <div class="section-title">
                                    <h3 class="title">Leave a reply</h3>
                                </div>
                                <form class="post-reply" method="post" action="{{ route('comment.store') }}">
                                    @csrf
                                    <input type="hidden" name="post_id" value="{{ $posts->id }}">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea class="input" name="message" placeholder="Message"></textarea>
                                            </div>
                                        </div>
                                        <!-- <div class="col-md-4">
                                            <div class="form-group">
                                                <input class="input" type="text" name="name" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input class="input" type="email" name="email" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input class="input" type="text" name="website" placeholder="Website">
                                            </div>
                                        </div> -->
                                        <div class="col-md-12">
                                            <button type="submit" class="primary-button">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                    <!-- <div class="col-lg-3 col-md-4">
      <div class="samesidebar ">
       <h2>Categories</h2>
       <ul class="sidebar-category">
       @foreach ($subcategories as $subcategory)
<li><a href="{{ route('front.subcategory', [$category->slug, $subcategory->slug]) }}">{{ $subcategory->name }}</a></li>
@endforeach
       </ul>
      </div> -->
                    <!-- recent posts box -->
                    <!-- <div class="recent-post-container mt-md-0 mt-5">
       <h4>Recent Posts</h4>
       @foreach ($recent_posts as $recent_post)
<div class="recent-post">
         <a class="post-img" href="">
          <img src="{{ asset($recent_post->photo) }}" alt=""/>
         </a>
         <div class="post-content">
          <h5><a href="{{ route('front.post', $recent_post->slug) }}">{{ Str::words($recent_post->title, 2, ' ') }}</a></h5>
          <span>
           <i class="fa fa-tags" aria-hidden="true"></i>
           <a href="{{ route('front.category', $category->slug) }}">{{ $recent_post->category->name }}</a>
          </span>
          <span>
           <i class="fa fa-calendar" aria-hidden="true"></i>
           {{ $recent_post->created_at->format('d m Y') }}
          </span>
          <a class="read-more" href="{{ route('front.post', $recent_post->slug) }}">read more</a>
         </div>
        </div>
@endforeach
      </div>
     </div> -->
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
