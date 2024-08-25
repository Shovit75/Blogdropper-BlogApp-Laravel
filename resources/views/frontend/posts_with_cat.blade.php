@extends('frontend.partials.body')

@section('body')

<style>
    .blog-grid {
        position: relative;
        box-shadow: 0 1rem 1.75rem 0 rgba(45, 55, 75, 0.1);
        height: 100%;
        border: 0.0625rem solid rgba(220, 224, 229, 0.6);
        border-radius: 0.25rem;
        transition: all .2s ease-in-out;
        background: #ffffff;
    }
    .blog-grid span {
        color: #292dc2
    }
    .blog-grid-img {
        position: relative;
        object-fit: cover;
        width: 100%;
        border-top-left-radius: 0.25rem;
        border-top-right-radius: 0.25rem
    }
    .blog-grid-text {
        position: relative
    }
    .blog-grid-text>span {
        color: #292dc2;
        font-size: 13px;
        padding-right: 5px
    }
    .blog-grid-text h4 {
        line-height: normal;
        margin-bottom: 15px
    }
    .blog-grid-text ul {
        margin: 0;
        padding: 0
    }
    .blog-grid-text ul li {
        display: inline-block;
        font-size: 14px;
        font-weight: 500;
        margin: 5px 10px 5px 0
    }
    .blog-grid-text ul li:last-child {
        margin-right: 0
    }
    .blog-grid-text ul li i {
        font-size: 14px;
        font-weight: 600;
        margin-right: 5px
    }
    .blog-grid-text p {
        font-weight: 400;
        padding: 0
    }
    .blog-list-left-heading:after,
    .blog-title-box:after {
        content: '';
        height: 2px
    }
    .blog-grid-simple-content a:hover {
        color: #1d184a
    }
    .blog-grid-simple-content a:hover:after {
        color: #1d184a
    }
    .blog-grid-text {
        position: relative
    }
    .blog-grid-text>span {
        color: #292dc2;
        font-size: 13px;
        padding-right: 5px
    }
    .blog-grid-text h4 {
        line-height: normal;
        margin-bottom: 15px
    }
    .blog-grid-text .meta-style2 {
        border-top: 1px dashed #cee1f8 !important;
        padding-top: 15px
    }
    .blog-grid-text .meta-style2 ul li {
        margin-bottom: 0;
        font-weight: 500
    }
    .blog-grid-text .meta-style2 ul li:last-child {
        margin-right: 0
    }
    .blog-grid-text ul {
        margin: 0;
        padding: 0
    }
    .blog-grid-text ul li {
        display: inline-block;
        font-size: 14px;
        font-weight: 500;
        margin: 5px 10px 5px 0
    }
    .blog-grid-text ul li:last-child {
        margin-right: 0
    }
    .blog-grid-text ul li i {
        font-size: 14px;
        font-weight: 600;
        margin-right: 5px
    }
    .blog-grid-text p {
        font-weight: 400;
        padding: 0
    }

    .mt-6, .my-6 {
        margin-top: 3.5rem;
    }

    .cattitle{
    font-style: italic;
    font-size: larger;
    padding: 0 1rem;
    margin-top: 2rem;
    }

</style>

 <!-- Page Header-->
<section class="background"> <!-- Color -->
<section data-aos="fade-in">
    <div class="container">
        <div class="row gx-4 gx-lg-5 justify-content-between align-items-end">
            <div class="col-lg-6 col-xl-6 col-md-6 col-sm-6 col-12">
                <h2 class="cattitle">All posts in {{$category->name}} category</h2>
            </div>
            <div class="col-lg-4 col-xl-4 col-md-6 col-sm-6 col-12 mt-3">
                <form class="d-flex">
                    <input name="search" class="form-control me-2" type="search" placeholder="Search from {{$category->name}}" aria-label="Search" value="{{$search}}">
                    <button class="btn btn-secondary" type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>
</section>

@if($posts->isEmpty())
<div class="text-center py-5" data-aos="slide-up">
    <span>No posts available for {{$category->name}} Category</span>
</div>
@else
<section>
<div class="container">
    <div class="row mt-n5">
        @foreach ($posts as $p)
        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 mt-4" data-aos="slide-up">
            <div class="blog-grid cardbackground">
                <a href="{{ url('blog/title/' . $p->slug) }}">
                <div class="blog-grid-img"><img alt="img" class="custom-img" src="{{ asset('storage/'.$p->banner) }}"></div>
                <div class="blog-grid-text p-4">
                    <h2 class="h5 mb-3">{{$p->title}}</h2>
                    <p class="display-30">{{$p->description}}</p>
                    <div>
                        <ul>
                            <li><i class="fas fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($p->date)->format('d-M-Y') }}</li>
                            <li><i class="fas fa-user"></i> {{$p->author}}</li>
                        </ul>
                    </div>
                </div>
            </a>
            </div>
        </div>
        @endforeach
    </div>
    <div class="mt-5 row justify-content-center">
        <div class="col-12">
            <div class="d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</div>
</section>
@endif
 </section>
@endsection
@section('head')
        <?php $canonicalUrl = str_replace('{category}', $category->name, env('CAT_CANONICAL_URL')); ?>
        <link rel="canonical" href="{{ $canonicalUrl }}" />
@endsection
