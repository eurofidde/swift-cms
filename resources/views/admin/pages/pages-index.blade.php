@extends('admin.layouts.app')

@section('title')
    Pages
@endsection

@section('content')
    <div class="pages-index">
        @if (count($pages) > 0)
            <div class="wrapper-full">
                <div class="pages-index__head">
                    <button class="btn-primary" id="create-page-btn">Create New Page</button>
                </div>
                @foreach ($pages as $page)
                    <a class="panel pages-index__page">
                        <div class="pages-index__page-col">
                            {{ $page->title }}
                        </div>
                        <div class="pages-index__page-col">
                            {{ $page->created_at }}
                        </div>
                        <div class="pages-index__page-col">
                            {{ $page->updated_at }}
                        </div>
                        <div class="pages-index__page-col">
                            <button class="btn-ellipsis fas fa-ellipsis-v"></button>
                        </div>
                    </a>
                @endforeach
            </div>
        @else
        <!-- No content -->
            <div class="pages-index--no-content">
                <div class="pages-index--no-content__inner">
                    <h1>No Pages found.</h1>
                    <button class="btn-primary" id="create-page-btn">Create Page</button>
                </div>
            </div>
        <!-- /No content -->
        @endif

        <!-- Create Page -->
        <div class="pages-index__create-page" id="create-page-box">
            <div class="box-btn">
                <form action="{{ url('/admin/pages/submit') }}" method="POST">
                    @csrf
                    <div class="box-btn__content">
                        <button class="box-btn__close-btn fas fa-times" id="create-page-close"></button>
                        <h2>Create a Page</h2>
                            <input name="title" type="text" placeholder="Title">
                        
                    </div>
                    <button class="box-btn__btn" type="submit">
                        <span>Create</span>
                    </button>
                </form>
            </div>
        </div>
        <!-- /Create Page -->

        <script>
            $('#create-page-box').hide();

            $('#create-page-btn').click(function() {
                if($('#create-page-box').is(':hidden')) {
                    $('#create-page-box').show();
                    $('.box-btn').addClass('enabled');
                }
            });

            $('#create-page-close').click(function() {
                event.preventDefault();

                if($('#create-page-box').is(':visible')) {
                    // $('.box-btn').addClass('disabled');
                    $('.box-btn').removeClass('enabled');
                    $('#create-page-box').delay(1).hide();
                }
            });
        </script>
    </div>
@endsection