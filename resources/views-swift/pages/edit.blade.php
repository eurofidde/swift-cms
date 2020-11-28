@extends('base.admin')

@section('title')
    Editing Page - {{ $page->title }}
@endsection

@section('content')
<form action="{{ url('/admin/pages/edit/submit', $page->id) }}" method="POST">
    @csrf
    @method('patch')

    <div class="pages-edit">
        <div class="form-group">
            <button class="btn-primary" type="submit">Update</button>
            <a class="btn-secondary" href="{{ url('/admin/pages/delete', $page->id) }}" onclick="confirm('Are you sure?'); event.preventDefault(); document.getElementById('delete-form').submit();">Delete</a>
        </div>
        <div class="form-group">
            <input name="title" type="text" value="{{ $page->title }}">
        </div>
        <div class="form-group">
            <textarea name="body" rows="10">{{ $page->body }}</textarea>
        </div>

        <div class="widget pages-edit__info">
            <div class="widget-head">
                Page Information
            </div>
            <div class="widget-body">
                <ul class="info-list">
                    <li>
                        <strong>Creation Data: </strong>{{ $page->created_at }}
                    </li>
                    <li>
                        <strong>Last Updated: </strong>{{ $page->updated_at }}
                    </li>
                    <li>
                        <strong>Created By: </strong>{{ $user->name}}
                    </li>
                </ul>
            </div>
        </div>

        <div class="widget">
            <div class="widget-head">
                Page Settings
            </div>
            <div class="widget-body">
                <div class="form-group">
                    <label for="template">Template: </label>
                    <select name="template">
                        @if ($templates)
                            @foreach ($templates as $template)
                                <option value="{{ $template }}">{{ $template }}</option>
                            @endforeach
                        @else
                            <option disabled>No Templates Found</option>
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input name="slug" type="text" placeholder="hello-world" value="{{ $page->slug }}">
                </div>
            </div>
        </div>
    </div>
</form>
<form action="{{ url('/admin/pages/delete', $page->id) }}" method="POST" id="delete-form" style="display: none">
    @csrf
    @method('DELETE')
</form>
@endsection