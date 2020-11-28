@extends('base.admin')

@section('title')
    Create Page
@endsection

@section('content')
    <form action="{{ url('/admin/pages/create/submit') }}" method="POST">
        @csrf
        <div class="form-group">
            <input name="title" type="text" placeholder="Title">
        </div>
        <div class="form-group">
            <textarea name="body" rows="10" placeholder="Content"></textarea>
        </div>
        <div class="form-group">
            <button class="btn-primary" type="submit">Create</button>
        </div>
    </form>
@endsection