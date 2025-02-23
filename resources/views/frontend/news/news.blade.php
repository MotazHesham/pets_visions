@extends('layouts.frontend')

@section('content')
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2> {{ trans('frontend.news.news') }}</h2>
                            <ul>
                                <li><a href="{{ route('frontend.home') }}">{{ trans('frontend.news.home') }}</a></li>

                                <li><i class="fa fa-angle-double-left"></i></li>
                                <li><a href="javascript:void(0)"> {{ trans('frontend.news.news') }} </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <section class="section-big-py-space blog-page ratio2_3">
        <div class="custom-container">
            <div class="row">
                <!--Blog sidebar start-->
                <div class="col-xl-3 col-lg-4 col-md-5">
                    <div class="blog-sidebar">
                        <div class="theme-card">
                            <h4>{{ trans('frontend.news.latest') }}</h4>
                            <ul class="recent-blog">
                                @foreach($latesNews as $row)
                                    <li>
                                        <div class="media">
                                            <img class="img-fluid " src="{{ $row->photo ? $row->photo->getUrl() : '' }}"
                                                onerror="this.onerror=null;this.src='{{ asset('no-image.png') }}';"
                                                alt="Generic placeholder image">
                                            <div class="media-body align-self-center">
                                                <h6>{{ \Carbon\Carbon::parse($row->created_at)
                                                    ->locale('ar')
                                                    ->translatedFormat('d F Y') }}</h6>
                                                <p>{{ $row->newsNewsComments()->count() ?? 0 }} {{ trans('frontend.news.comments') }}</p>
                                            </div>
                                        </div>
                                    </li> 
                                @endforeach
                            </ul>
                        </div> 
                        <div class="theme-card">
                            <h4>{{ trans('frontend.news.featured') }}</h4>
                            <ul class="popular-blog">
                                @foreach($featuredNews as $row)
                                    <li>
                                        <div class="media">
                                            <div class="blog-date">
                                                <h6><span>{{ \Carbon\Carbon::parse($row->created_at)
                                                    ->locale('ar')
                                                    ->translatedFormat('d F') }}
                                                </span></h6>
                                            </div>
                                            <div class="media-body align-self-center">
                                                <h6>{{ $row->title }}</h6>
                                                <p>{{ $row->newsNewsComments()->count() ?? 0 }} {{ trans('frontend.news.comments') }}</p>
                                            </div>
                                        </div> 
                                    </li> 
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <!--Blog sidebar start-->

                <!--Blog List start-->
                <div class="col-xl-9 col-lg-8 col-md-7 order-sec"> 
                    @foreach($newss as $index => $row)
                        <div class="row blog-media @if($index % 2 == 1) media-change @endif">
                            <div class="col-xl-6 ">
                                <div class="blog-left">
                                    <a href="{{ route('frontend.news.show',$row->id) }}">
                                        <img src="{{ $row->photo ? $row->photo->getUrl() : '' }}"
                                        onerror="this.onerror=null;this.src='{{ asset('no-image.png') }}';" class="img-fluid  "
                                            alt=""></a>
                                    <div class="date-label"> 
                                        {{ \Carbon\Carbon::parse($row->created_at)
                                            ->locale('ar')
                                            ->translatedFormat('d F Y') }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 ">
                                <div class="blog-right">
                                    <div>
                                        <a href="{{ route('frontend.news.show',$row->id) }}">
                                            <h4>{{ $row->title }}</h4>
                                        </a>
                                        <ul class="post-social">
                                            <li>{{ trans('frontend.news.added_by') }} : {{ $row->added_by ? \App\Models\News::ADDED_BY_SELECT[$row->added_by] : '' }}</li>
                                            <li><i class="fa fa-comments"></i> {{ $row->newsNewsComments()->count() ?? 0 }} {{ trans('frontend.news.comments') }}</li>
                                        </ul>
                                        <p>
                                            {!! $row->short_description !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    @endforeach
                </div>
                <!--Blog List start-->
                <div>{{ $newss->links() }}</div>
            </div>
        </div>
    </section>
@endsection
