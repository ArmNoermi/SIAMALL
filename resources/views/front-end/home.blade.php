@extends('front-end.layout.master')

@section('head')
<link href="{{asset('front-end/plugins/video-js/video-js.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{asset('front-end/styles/blog.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('front-end/styles/blog_responsive.css')}}">
@endsection

@section('content')
<div class="home">
    <div class="breadcrumbs_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="{{route('home')}}">Home</a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Blog -->

<div class="blog">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section_title_container text-center">
                    <h2 class="section_title">Selamat Datang di AL-AZHAR</h2>
                    <div class="section_subtitle">
                        <p>Mencerdaskan kehidupan bangsa</p>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br>
        <div class="row">
            <div class="col">
                <div class="blog_post_container">

                    @foreach($posts as $p)
                    <!-- Blog Post -->
                    <div class="blog_post trans_200">
                        <div class="blog_post_image"><img src="{{$p->thumbnail()}}" height="250px" width="100%"></div>
                        <div class="blog_post_body">
                            <div class="blog_post_title"><a href="{{route('home.single.post',$p->slug)}}">{{$p->title}}</a></div>
                            <div class="blog_post_meta">
                                <ul>
                                    <li><a href="#">{{$p->user->name}}</a></li>
                                    <li><a href="#">{{$p->created_at->format('D, d M Y')}}</a></li>
                                </ul>
                            </div>
                            <div class="blog_post_text">
                                <p>{{$p->highlight}} ...</p>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
        <!-- <div class="row">
            <div class="col text-center">
                <div class="load_more trans_200"><a href="#">load more</a></div>
            </div>
        </div> -->
    </div>
</div>



<!-- Team -->

<div class="team">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section_title_container text-center">
                    <h2 class="section_title">GURU</h2>
                    <div class="section_subtitle">

                    </div>
                </div>
            </div>
        </div>
        <div class="row team_row">

            @foreach($guru as $g)
            <!-- Team Item -->
            <div class="col-lg-3 col-md-6 team_col">
                <div class="team_item">
                    <div class="team_image"><img src="{{$g->getPhoto()}}" alt=""></div>
                    <div class="team_body">
                        <div class="team_title"><a href="#">{{$g->name}}</a></div>
                        <div class="team_subtitle">NIP : {{$g->r_guru_user->nip}}</div>
                    </div>
                </div>
            </div>
            @endforeach


        </div>
    </div>
</div>

<!-- Counter -->





<!-- Footer -->
@endsection

@section('foot')
<script src="{{asset('front-end/plugins/masonry/masonry.js')}}"></script>
<script src="{{asset('front-end/plugins/video-js/video.min.js')}}"></script>
<script src="{{asset('front-end/js/blog.js')}}"></script>
@endsection