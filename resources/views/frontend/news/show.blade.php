@extends('layouts.frontend')

@section('content')
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>{{ $news->title }}</h2>
                            <ul>
                                <li><a href="{{ route('frontend.home') }}">{{ trans('frontend.news.home') }}</a></li>
                                <li><i class="fa fa-angle-double-left"></i></li>
                                <li><a href="javascript:void(0)">{{ $news->title }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->
    <!-- section start -->
    <section class="blog-detail-page section-big-py-space ratio2_3">
        <div class="container">
            <div class="row section-big-pb-space">
                <div class="col-sm-12 blog-detail">
                    <div class="creative-card">
                        <img src="{{ $news->photo ? $news->photo->getUrl() : '' }}" 
                        onerror="this.onerror=null;this.src='{{ asset('no-image.png') }}';" class="img-fluid w-100 " alt="blog">
                        <h3>{{ $news->title }}</h3>
                        <ul class="post-social">
                            <li>
                                {{ \Carbon\Carbon::parse($news->created_at)
                                    ->locale('ar')
                                    ->translatedFormat('d F Y') }}
                            </li>
                            <li>{{ trans('frontend.news.added_by') }} : {{ $news->added_by ? \App\Models\News::ADDED_BY_SELECT[$news->added_by] : '' }}</li>

                            <li><i class="fa fa-comments"></i> {{ $news->newsNewsComments()->count() ?? 0 }} {{ trans('frontend.news.comments') }}</li>
                        </ul>
                        <p>
                            {!! $news->description !!}
                        </p> 
                    </div>
                </div>
            </div>

            <div class="row section-big-pb-space">
                <div class="col-sm-12 ">
                    <div class="creative-card">
                        <ul class="comment-section">
                            @foreach($news->newsNewsComments as $comment)
                                <li>
                                    <div class="media"> 
                                        <div class="media-body"> 
                                            <h6>{{ $comment->name }}<span>({{ \Carbon\Carbon::parse($comment->created_at)
                                                ->locale('ar')
                                                ->translatedFormat('d F Y') }})</span></h6>
                                            <p>
                                                {{ $comment->comment }}
                                            </p>
                                        </div>
                                    </div>
                                </li> 
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class=" row blog-contact">
                <div class="col-sm-12  ">
                    <div class="creative-card">
                        <h2>{{ trans('frontend.news.leave_ur_comment') }}</h2>
                        @if ($errors->count() > 0)
                            <div class="alert alert-danger">
                                <ul class="list-unstyled">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form class="theme-form" method="POST" action="{{ route('frontend.news-comments.store') }}">
                            @csrf
                            <input type="hidden" name="news_id" value="{{ $news->id }}" id="">
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label for="name">{{ trans('frontend.news.name') }}</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="{{ trans('frontend.news.name') }}"
                                        required="">
                                </div> 
                                <div class="col-md-12">
                                    <label for="exampleFormControlTextarea1">{{ trans('frontend.news.comment') }}</label>
                                    <textarea class="form-control" name="comment" id="exampleFormControlTextarea1" rows="6" required></textarea>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-normal" type="submit"> {{ trans('frontend.news.write_comment') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
