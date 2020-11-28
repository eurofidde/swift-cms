@extends('base.admin')

@section('title')
    Pages
@endsection

@section('content')
<div class="pages">
    {{-- <table class="table-solid" cellpadding="0" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Creation Date</th>
            <th>Last Updated</th>
            <th>Actions</th>
        </tr>
        @foreach ($pages as $page)
            <tr>
                <td>{{ $page->id }}</td>
                <td>{{ $page->title }}</td>
                <td>{{ $page->created_at }}</td>
                <td>{{ $page->updated_at }}</td>
                <td>
                    <a href="{{ url($page->slug) }}">View</a>
                    <a href="{{ url('admin/pages/edit', $page->id) }}">Edit</a>
                    <a href="{{ url('/admin/pages/delete', $page->id) }}" onclick="confirm('Are you sure?'); event.preventDefault(); document.getElementById('delete-form-{{ $page->id }}').submit();">Delete</a>
                    <form id="delete-form-{{ $page->id }}" action="{{ url('/admin/pages/delete', $page->id) }}" method="POST" style="display: none">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
        @endforeach
    </table> --}}

    {{-- <section class="pages__items">
        <div class="pages__items-head">
            <div class="pages__item">
                <div class="pages__item-row--id">ID</div>
                <div class="pages__item-row">Title</div>
                <div class="pages__item-row">Created At</div>
                <div class="pages__item-row">Updated At</div>
                <div class="pages__item-row--action"></div>
            </div>
        </div>
        <div class="pages__items-body">


            @foreach ($pages as $page)
            <div class="pages__item panel">
                <a class="" href="{{ url('admin/pages/edit', $page->id) }}">
                    <div class="pages__item-row--id">{{ $page->id }}</div>
                    <div class="pages__item-row">{{ $page->title }}</div>
                    <div class="pages__item-row">{{ $page->created_at }}</div>
                    <div class="pages__item-row">{{ $page->updated_at }}</div>
                </a>
                <div class="pages__item-row--action dropdown--light">
                    <div class="dropdown__toggle">
                        <i class="pages__item-dropdown-toggle fas fa-ellipsis-v"></i>
                    </div>
                    <div class="dropdown__content">
                        <a href="{{ url($page->slug) }}">View</a>
                        <a href="{{ url('admin/pages/edit', $page->id) }}">Edit</a>
                        <a href="{{ url('/admin/pages/delete', $page->id) }}" onclick="confirm('Are you sure?'); event.preventDefault(); document.getElementById('delete-form-{{ $page->id }}').submit();">Delete</a>
                        <form id="delete-form-{{ $page->id }}" action="{{ url('/admin/pages/delete', $page->id) }}" method="POST" style="display: none">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                </div>
            </div>
            {{-- <div class="pages__item-dropdown">
                <a href="{{ url($page->slug) }}">View</a>
                <a href="{{ url('admin/pages/edit', $page->id) }}">Edit</a>
                <a href="{{ url('/admin/pages/delete', $page->id) }}" onclick="confirm('Are you sure?'); event.preventDefault(); document.getElementById('delete-form-{{ $page->id }}').submit();">Delete</a>
                <form id="delete-form-{{ $page->id }}" action="{{ url('/admin/pages/delete', $page->id) }}" method="POST" style="display: none">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
            @endforeach

            <script>
                $('.pages__item-dropdown-toggle').hover(function(){
                    $('.pages__item-dropdown').slideDown(100);
                }, function(){
                    $(".pages__item-dropdown").stop().slideUp(100);
                });
            </script>
        </div>
    </section> --}}

    <section class="pages-content">

        @foreach ($pages as $page)
        <div class="pages-content__item panel">
            <a class="pages-content__item-info" href="{{ url('admin/pages/edit', $page->id) }}">
                <div class="pages-content__item-row--id">{{ $page->id }}</div>
                <div class="pages-content__item-row">{{ $page->title }}</div>
                <div class="pages-content__item-row">{{ $page->created_at }}</div>
                <div class="pages-content__item-row">{{ $page->updated_at }}</div>
            </a>
            <div class="pages-content__item-dropdown dropdown--light">
                <a class="dropdown--light__toggle fas fa-ellipsis-v"><!--<i class="pages__item-dropdown-toggle"></i>--></a>

                <div class="dropdown--light__content">
                    <a href="{{ url($page->slug) }}">View</a>
                    <a href="{{ url('admin/pages/edit', $page->id) }}">Edit</a>
                    <a href="{{ url('/admin/pages/delete', $page->id) }}" onclick="confirm('Are you sure?'); event.preventDefault(); document.getElementById('delete-form-{{ $page->id }}').submit();">Delete</a>
                    <form id="delete-form-{{ $page->id }}" action="{{ url('/admin/pages/delete', $page->id) }}" method="POST" style="display: none">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>
        </div>
        @endforeach

    </section>

    <a class="btn-primary pages__create-btn" href="{{ url('/admin/pages/create') }}">Create New Page</a>
</div>
@endsection