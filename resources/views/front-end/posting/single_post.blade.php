@extends('front-end.layout.master')

@section('head')
<link rel="stylesheet" type="text/css" href="{{asset('front-end/styles/blog_single.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('front-end/styles/blog_single_responsive.css')}}">
@endsection

@section('content')
<div class="home">
    <div class="breadcrumbs_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li>Blog</li>

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

            <!-- Blog Content -->
            <div class="col-lg-8">
                <div class="blog_content">
                    <div class="blog_title">{{$post->title}}</div>
                    <div class="blog_meta">
                        <ul>
                            <li>Diposting pada <a href="#">{{$post->created_at->format('D, d M Y')}}</a></li>
                            <li>By <a href="#"></a>{{$post->user->name}}</li>
                        </ul>
                    </div>
                    <div class="blog_image"><img src="{{$post->thumbnail()}}" alt="" height="500px" width="100%"></div>
                    {!!$post->konten!!}

                </div>
                <div class="blog_extra d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
                    <!-- <div class="blog_tags">
                        <span>Tags: </span>
                        <ul>
                            <li><a href="#">Education</a>, </li>
                            <li><a href="#">Math</a>, </li>
                            <li><a href="#">Food</a>, </li>
                            <li><a href="#">Schools</a>, </li>
                            <li><a href="#">Religion</a>, </li>
                        </ul>
                    </div>
                    <div class="blog_social ml-lg-auto">
                        <span>Share: </span>
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                        </ul>
                    </div> -->
                </div>
                <!-- Comments -->
                <div class="comments_container">
                    <div class="comments_title"><span></span> Komentar</div>
                    <ul class="comments_list">
                        <li>
                            <div class="comment_item d-flex flex-row align-items-start jutify-content-start">
                                <div class="comment_image">
                                    <div><img src="front-end/images/comment_1.jpg" alt=""></div>
                                </div>
                                <div class="comment_content">
                                    <div class="comment_title_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="comment_author"><a href="#">Jennifer Aniston</a></div>
                                        <div class="comment_rating">
                                            <div class="rating_r rating_r_4"><i></i><i></i><i></i><i></i><i></i></div>
                                        </div>
                                        <div class="comment_time ml-auto">October 19,2018</div>
                                    </div>
                                    <div class="comment_text">
                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have alteration in some form, by injected humour.</p>
                                    </div>
                                    <div class="comment_extras d-flex flex-row align-items-center justify-content-start">
                                        <div class="comment_extra comment_likes"><a href="#"><i class="fa fa-thumbs-up" aria-hidden="true"></i><span>108</span></a></div>
                                        <div class="comment_extra comment_reply"><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i><span>Reply</span></a></div>
                                    </div>
                                </div>
                            </div>
                            <ul>
                                <li>
                                    <div class="comment_item d-flex flex-row align-items-start jutify-content-start">
                                        <div class="comment_image">
                                            <div><img src="front-end/images/comment_2.jpg" alt=""></div>
                                        </div>
                                        <div class="comment_content">
                                            <div class="comment_title_container d-flex flex-row align-items-center justify-content-start">
                                                <div class="comment_author"><a href="#">John Smith</a></div>
                                                <div class="comment_rating">
                                                    <div class="rating_r rating_r_4"><i></i><i></i><i></i><i></i><i></i></div>
                                                </div>
                                                <div class="comment_time ml-auto">October 19,2018</div>
                                            </div>
                                            <div class="comment_text">
                                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have alteration in some form, by injected humour.</p>
                                            </div>
                                            <div class="comment_extras d-flex flex-row align-items-center justify-content-start">
                                                <div class="comment_extra comment_likes"><a href="#"><i class="fa fa-thumbs-up" aria-hidden="true"></i><span>108</span></a></div>
                                                <div class="comment_extra comment_reply"><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i><span>Reply</span></a></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <div class="comment_item d-flex flex-row align-items-start jutify-content-start">
                                <div class="comment_image">
                                    <div><img src="front-end/images/comment_3.jpg" alt=""></div>
                                </div>
                                <div class="comment_content">
                                    <div class="comment_title_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="comment_author"><a href="#">Jane Austen</a></div>
                                        <div class="comment_rating">
                                            <div class="rating_r rating_r_4"><i></i><i></i><i></i><i></i><i></i></div>
                                        </div>
                                        <div class="comment_time ml-auto">October 19,2018</div>
                                    </div>
                                    <div class="comment_text">
                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have alteration in some form, by injected humour.</p>
                                    </div>
                                    <div class="comment_extras d-flex flex-row align-items-center justify-content-start">
                                        <div class="comment_extra comment_likes"><a href="#"><i class="fa fa-thumbs-up" aria-hidden="true"></i><span>108</span></a></div>
                                        <div class="comment_extra comment_reply"><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i><span>Reply</span></a></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="add_comment_container">
                        <div class="add_comment_title">Tulis Komentar Anda</div>
                        <div class="add_comment_text">Email anda tidak akan dipublish untuk keamanan pengguna *</div>
                        <form action="#" class="comment_form">
                            <div>
                                <div class="form_title">Komen*</div>
                                <textarea class="comment_input comment_textarea" required="required"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6 input_col">
                                    <div class="form_title">Nama*</div>
                                    <input type="text" class="comment_input" required="required">
                                </div>
                                <div class="col-md-6 input_col">
                                    <div class="form_title">Email*</div>
                                    <input type="text" class="comment_input" required="required">
                                </div>
                            </div>
                            <div class="comment_notify">
                                <input type="checkbox" id="checkbox_notify" name="regular_checkbox" class="regular_checkbox checkbox_account" checked>

                            </div>
                            <div>
                                <button type="submit" class="comment_button trans_200">submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Blog Sidebar -->
            <div class="col-lg-4">
                <div class="sidebar">

                    <!-- Categories -->
                    <div class="sidebar_section">
                        <div class="sidebar_section_title">Kategori</div>
                        <div class="sidebar_categories">
                            <ul class="categories_list">
                                <li><a href="#" class="clearfix">Pengumuman<span>(25)</span></a></li>
                                <li><a href="#" class="clearfix">Berita<span>(10)</span></a></li>

                            </ul>
                        </div>
                    </div>



                    <!-- Gallery -->


                    <!-- Tags -->
                    <!-- <div class="sidebar_section">
                        <div class="sidebar_section_title">Tags</div>
                        <div class="sidebar_tags">
                            <ul class="tags_list">
                                <li><a href="#">creative</a></li>
                                <li><a href="#">unique</a></li>
                                <li><a href="#">photography</a></li>
                                <li><a href="#">ideas</a></li>
                                <li><a href="#">wordpress</a></li>
                                <li><a href="#">startup</a></li>
                            </ul>
                        </div>
                    </div> -->



                </div>
            </div>
        </div>
    </div>
</div>

<!-- Newsletter -->


@endsection

@section('foot')
<script src="{{asset('front-end/js/blog_single.js')}}"></script>
@endsection