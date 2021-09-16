@extends('front-end.layout.master')

@section('head')
<link rel="stylesheet" type="text/css" href="{{asset('front-end/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('front-end/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('front-end/plugins/OwlCarousel2-2.2.1/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('front-end/styles/course.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('front-end/styles/course_responsive.css')}}">


@endsection

@section('content')
<div class="home">
    <div class="breadcrumbs_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>Tentang Kami</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Course -->

<div class="course">
    <div class="container">
        <div class="row">

            <!-- Course -->
            <div class="col-lg-8">

                <div class="course_container">
                    <div class="course_title">Madrasah Aliyyah Al-Azhar</div>


                    <!-- Course Image -->
                    <div class="course_image"><img src="{{asset('front-end/images/alazhar.jpeg')}}" alt=""></div>

                    <!-- Course Tabs -->
                    <div class="course_tabs_container">
                        <div class="tabs d-flex flex-row align-items-center justify-content-start">

                        </div>
                        <div class="tab_panels">

                            <!-- Description -->
                            <div class="tab_panel active">
                                <div class="tab_panel_title">Tentang Kami</div>
                                <div class="tab_panel_content">
                                    <div class="tab_panel_text">
                                        <p>Pada awalnya Madrasah Aliyyah Al-Azhar adalah sebuah pondok pesantren yang mengutamakan anak-anak yatim ataupun kurang mampu sebagai peserta didik. Kemudian karena zaman yang makin maju menyebabkan persaingan semakin ketat, maka dibutuhkan solusi agar anak-anak ini memiliki kemampuan yang tinggi.
                                            Untuk menyelesaikan permasalahan yang dihadapi, maka Ketua Yayasan pondok pesantren Al-Azhar yang bernama bapak Marhani Umar berkeinginan meningkatkan Pendidikan pada lembaga yang, kemudian dibentuklah Madrasah Aliyyah Al-Azhar pada tahun 2013. Dengan kebijakan tersebut diharapkan lulusan dari Madrasah Aliyyah Al-Azhar memiliki ilmu pengetahuan dan wawasan yang luas meliputi pengetahuan umum dan agama..</p>
                                    </div>


                                </div>
                            </div>

                            <!-- Curriculum -->
                            <div class="tab_panel tab_panel_2">
                                <div class="tab_panel_content">
                                    <div class="tab_panel_title">Software Training</div>
                                    <div class="tab_panel_content">
                                        <div class="tab_panel_text">
                                            <p>Lorem Ipsn gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auci elit consequat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio.</p>
                                        </div>

                                        <!-- Dropdowns -->
                                        <ul class="dropdowns">
                                            <li class="has_children">
                                                <div class="dropdown_item">
                                                    <div class="dropdown_item_title"><span>Lecture 1:</span> Lorem Ipsn gravida nibh vel velit auctor aliquet.</div>
                                                    <div class="dropdown_item_text">
                                                        <p>Lorem Ipsn gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auci elit consequat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus.</p>
                                                    </div>
                                                </div>
                                                <ul>
                                                    <li>
                                                        <div class="dropdown_item">
                                                            <div class="dropdown_item_title"><span>Lecture 1.1:</span> Lorem Ipsn gravida nibh vel velit auctor aliquet.</div>
                                                            <div class="dropdown_item_text">
                                                                <p>Lorem Ipsn gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auci elit consequat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus.</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="dropdown_item">
                                                            <div class="dropdown_item_title"><span>Lecture 1.2:</span> Lorem Ipsn gravida nibh vel velit auctor aliquet.</div>
                                                            <div class="dropdown_item_text">
                                                                <p>Lorem Ipsn gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auci elit consequat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus.</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="has_children">
                                                <div class="dropdown_item">
                                                    <div class="dropdown_item_title"><span>Lecture 2:</span> Lorem Ipsn gravida nibh vel velit auctor aliquet.</div>
                                                    <div class="dropdown_item_text">
                                                        <p>Lorem Ipsn gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auci elit consequat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus.</p>
                                                    </div>
                                                </div>
                                                <ul>
                                                    <li>
                                                        <div class="dropdown_item">
                                                            <div class="dropdown_item_title"><span>Lecture 2.1:</span> Lorem Ipsn gravida nibh vel velit auctor aliquet.</div>
                                                            <div class="dropdown_item_text">
                                                                <p>Lorem Ipsn gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auci elit consequat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus.</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="dropdown_item">
                                                            <div class="dropdown_item_title"><span>Lecture 2.2:</span> Lorem Ipsn gravida nibh vel velit auctor aliquet.</div>
                                                            <div class="dropdown_item_text">
                                                                <p>Lorem Ipsn gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auci elit consequat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus.</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <div class="dropdown_item">
                                                    <div class="dropdown_item_title"><span>Lecture 3:</span> Lorem Ipsn gravida nibh vel velit auctor aliquet.</div>
                                                    <div class="dropdown_item_text">
                                                        <p>Lorem Ipsn gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auci elit consequat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus.</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="dropdown_item">
                                                    <div class="dropdown_item_title"><span>Lecture 4:</span> Lorem Ipsn gravida nibh vel velit auctor aliquet.</div>
                                                    <div class="dropdown_item_text">
                                                        <p>Lorem Ipsn gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auci elit consequat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus.</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="dropdown_item">
                                                    <div class="dropdown_item_title"><span>Lecture 5:</span> Lorem Ipsn gravida nibh vel velit auctor aliquet.</div>
                                                    <div class="dropdown_item_text">
                                                        <p>Lorem Ipsn gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auci elit consequat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus.</p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Reviews -->
                            <div class="tab_panel tab_panel_3">
                                <div class="tab_panel_title">Course Review</div>

                                <!-- Rating -->
                                <div class="review_rating_container">
                                    <div class="review_rating">
                                        <div class="review_rating_num">4.5</div>
                                        <div class="review_rating_stars">
                                            <div class="rating_r rating_r_4"><i></i><i></i><i></i><i></i><i></i></div>
                                        </div>
                                        <div class="review_rating_text">(28 Ratings)</div>
                                    </div>
                                    <div class="review_rating_bars">
                                        <ul>
                                            <li><span>5 Star</span>
                                                <div class="review_rating_bar">
                                                    <div style="width:90%;"></div>
                                                </div>
                                            </li>
                                            <li><span>4 Star</span>
                                                <div class="review_rating_bar">
                                                    <div style="width:75%;"></div>
                                                </div>
                                            </li>
                                            <li><span>3 Star</span>
                                                <div class="review_rating_bar">
                                                    <div style="width:32%;"></div>
                                                </div>
                                            </li>
                                            <li><span>2 Star</span>
                                                <div class="review_rating_bar">
                                                    <div style="width:10%;"></div>
                                                </div>
                                            </li>
                                            <li><span>1 Star</span>
                                                <div class="review_rating_bar">
                                                    <div style="width:3%;"></div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Comments -->
                                <div class="comments_container">
                                    <ul class="comments_list">
                                        <li>
                                            <div class="comment_item d-flex flex-row align-items-start jutify-content-start">
                                                <div class="comment_image">
                                                    <div><img src="{{asset('front-end/images/comment_1.jpg')}}" alt=""></div>
                                                </div>
                                                <div class="comment_content">
                                                    <div class="comment_title_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="comment_author"><a href="#">Milley Cyrus</a></div>
                                                        <div class="comment_rating">
                                                            <div class="rating_r rating_r_4"><i></i><i></i><i></i><i></i><i></i></div>
                                                        </div>
                                                        <div class="comment_time ml-auto">1 day ago</div>
                                                    </div>
                                                    <div class="comment_text">
                                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have alteration in some form, by injected humour.</p>
                                                    </div>
                                                    <div class="comment_extras d-flex flex-row align-items-center justify-content-start">
                                                        <div class="comment_extra comment_likes"><a href="#"><i class="fa fa-heart" aria-hidden="true"></i><span>15</span></a></div>
                                                        <div class="comment_extra comment_reply"><a href="#"><i class="fa fa-reply" aria-hidden="true"></i><span>Reply</span></a></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul>
                                                <li>
                                                    <div class="comment_item d-flex flex-row align-items-start jutify-content-start">
                                                        <div class="comment_image">
                                                            <div><img src="{{asset('front-end/images/comment_2.jpg')}}" alt=""></div>
                                                        </div>
                                                        <div class="comment_content">
                                                            <div class="comment_title_container d-flex flex-row align-items-center justify-content-start">
                                                                <div class="comment_author"><a href="#">John Tyler</a></div>
                                                                <div class="comment_rating">
                                                                    <div class="rating_r rating_r_4"><i></i><i></i><i></i><i></i><i></i></div>
                                                                </div>
                                                                <div class="comment_time ml-auto">1 day ago</div>
                                                            </div>
                                                            <div class="comment_text">
                                                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have alteration in some form, by injected humour.</p>
                                                            </div>
                                                            <div class="comment_extras d-flex flex-row align-items-center justify-content-start">
                                                                <div class="comment_extra comment_likes"><a href="#"><i class="fa fa-heart" aria-hidden="true"></i><span>15</span></a></div>
                                                                <div class="comment_extra comment_reply"><a href="#"><i class="fa fa-reply" aria-hidden="true"></i><span>Reply</span></a></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <div class="comment_item d-flex flex-row align-items-start jutify-content-start">
                                                <div class="comment_image">
                                                    <div><img src="{{asset('front-end/images/comment_3.jpg')}}" alt=""></div>
                                                </div>
                                                <div class="comment_content">
                                                    <div class="comment_title_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="comment_author"><a href="#">Milley Cyrus</a></div>
                                                        <div class="comment_rating">
                                                            <div class="rating_r rating_r_4"><i></i><i></i><i></i><i></i><i></i></div>
                                                        </div>
                                                        <div class="comment_time ml-auto">1 day ago</div>
                                                    </div>
                                                    <div class="comment_text">
                                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have alteration in some form, by injected humour.</p>
                                                    </div>
                                                    <div class="comment_extras d-flex flex-row align-items-center justify-content-start">
                                                        <div class="comment_extra comment_likes"><a href="#"><i class="fa fa-heart" aria-hidden="true"></i><span>15</span></a></div>
                                                        <div class="comment_extra comment_reply"><a href="#"><i class="fa fa-reply" aria-hidden="true"></i><span>Reply</span></a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="add_comment_container">
                                        <div class="add_comment_title">Add a review</div>
                                        <div class="add_comment_text">You must be <a href="#">logged</a> in to post a comment.</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Course Sidebar -->
            <div class="col-lg-4">
                <div class="sidebar">

                    <!-- Feature -->
                    <div class="sidebar_section">
                        <div class="sidebar_section_title">Kepala Sekolah</div>
                        <div class="sidebar_teacher">
                            <div class="teacher_title_container d-flex flex-row align-items-center justify-content-start">
                                <div class="teacher_image"><img src="{{asset('front-end/images/team_2.jpg')}}" alt=""></div>
                                <div class="teacher_title">
                                    <div class="teacher_name"><a href="#">Marhani Umar, S.Pd.I</a></div>

                                </div>
                            </div>
                            <div class="teacher_info">
                                <p>Bapak Marhani Umar S.Pd.I adalah pendiri sekaligus kepala sekolah Madrasah Aliyyah Al-Azhar.</p>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
</div>

<!-- Newsletter -->




@endsection

@section('foot')
<script src="{{asset('front-end/js/course.js')}}"></script>
@endsection