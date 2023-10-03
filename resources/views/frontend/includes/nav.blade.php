<section id="menu">
        <div class="container-lg navsection d-md-block d-none">
            <div class="row">
                <div class="col-12">
                    <ul>
                        <li><a id="active" href="{{route('front.index')}}">Home</a></li>
                        @foreach($categories as $category)
                        <li><a href="{{route('front.category',$category->slug)}}">{{$category->name}}</a></li>
                        @endforeach
                        <li><a href="{{route('front.about')}}">About</a></li>	
                        <li><a href="{{route('front.contact')}}">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
</section>