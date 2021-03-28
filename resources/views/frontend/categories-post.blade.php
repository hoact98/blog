@extends('frontend.template.main')

@section('title', count($postCate)>0?$postCate[0]->category->name:'')


@section('content')


<div class="hero-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-lg-8">

                <div class="breaking-news-area d-flex align-items-center">
                    <div class="news-title">
                        <p>Tin mới nhất</p>
                    </div>
                    <div id="breakingNewsTicker" class="ticker">
                        <ul>
                           @foreach($postNews as $new)
                           <li><a href="{{url($new->post_url.'.'.$new->id.'.html')}}">{{$new->title}}</a></li>
                           @endforeach
                           
                        </ul>
                    </div>
                </div>

                <div class="breaking-news-area d-flex align-items-center mt-15">
                    @if(count($postWorld)>0)
                    <div class="news-title title2">
                        <a href="{{url($postWorld[0]->category->cate_url)}}"><p>{{$postWorld[0]->category->name}}</p></a>

                    </div>
                    <div id="internationalTicker" class="ticker">
                        <ul>
                            @foreach($postWorld as $w)
                           <li><a href="{{url($w->post_url.'.'.$w->id.'.html')}}">{{$w->title}}</a></li>
                           @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="hero-add">
                    <a href="http://dulichsummertrip.com/"><img src="{{asset('images/bg-img/hero-add.gif')}}" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="blog-area section-padding-0-80">
    <div class="container">
        <div class="row">
          
           <div class="col-12 col-md-6 col-lg-8">
            <div class="blog-posts-area">
                @if(count($postCate)>0)
                @foreach($postCate as $item)
                <div class="single-blog-post featured-post mb-30">
                    <div class="post-thumb">
                        <a href="{{url($item->post_url.'.'.$item->id.'.html')}}"><img src="{{asset($item->image)}}" style="width:730px;height:353px;" alt=""></a>
                    </div>
                    <div class="post-data">
                        <a href="{{url($item->category->cate_url)}}" class="post-catagory">{{$item->category->name}}</a>
                        <a href="{{url($item->post_url.'.'.$item->id.'.html')}}" class="post-title">
                            <h6>{{$item->title}}</h6>
                        </a>
                        <div class="post-meta">
                            <p class="post-author">By {{$item->author}}</p>
                            <p class="post-excerp">{!!$item->short_desc!!}</p>

                            <div class="d-flex align-items-center">
                                <a href="#" class="post-like">{{$item->created_at->isoFormat('l')}}</a>
                                <a href="#" class="post-comment"><img src="{{asset('images/core-img/view.png')}}" alt=""> <span>{{$item->view->sum('views')}}</span></a>
                                <a href="#" class="post-comment"><img src="{{asset('images/core-img/chat.png')}}" alt=""> <span>{{count($item->comments)}}</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
           @endif

            </div>
            <div class="mt-50">
                {{$postCate->links()}}
            </div>
    </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="blog-sidebar-area">

                    <div class="latest-posts-widget mb-50">
                        <h3>Tin phổ biến</h3>
                        @foreach($postView as $view)
                            <div class="single-blog-post small-featured-post d-flex">
                                <div class="post-thumb">
                                    <a href="{{url($view->post_url.'.'.$view->id.'.html')}}"><img src="{{asset($view->image)}}" style="width:90px;height:90px;" alt=""></a>
                                </div>
                                <div class="post-data">
                                    <a href="{{url($view->category->cate_url)}}" class="post-catagory">{{$view->category->name}}</a>
                                    <div class="post-meta">
                                        <a href="{{url($view->post_url.'.'.$view->id.'.html')}}" class="post-title">
                                            <h6>{{$view->title}}</h6>
                                        </a>
                                        <p class="post-date">
                                            <span>{{$view->created_at->toTimeString()}}</span> | 
                                            <span>{{$view->created_at->toFormattedDateString()}}</span>
                                            <img src="{{asset('images/core-img/view.png')}}" class="ml-3 pr-2" alt=""> <span>{{$view->view}}</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="popular-news-widget mb-50">
                        <h3>Tin tức mới nhất</h3>
                        @foreach($postNews as $key => $n)
                        <div class="single-popular-post">
                            <a href="{{url($n->post_url.'.'.$n->id.'.html')}}">
                                <h6><span>{{$key+1}}.</span>{{$n->title}}</h6>
                            </a>
                            <p>{{$n->created_at}}
                                <img src="{{asset('images/core-img/view.png')}}" alt="" class="ml-3"> <span>{{$n->view->sum('views')}}</span>
                            </p>
                        </div>
    
                        @endforeach
    
                    </div>
    
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
