@extends('layouts.layout-admin')

@section('title', 'Book Return')
    
@section('header', 'Book Return')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<div id="controller">
    <div class="col-md-6">
        <form action="/book-return" method="POST">
            <div>
                @if (session('message'))
                    <div class="alert {{ session('alert-class') }}">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ session('message') }}
                    </div>
                @endif
                @if ($errors->any())
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
            @csrf
            <div class="mb-3 form-group">
                <label>
                    User : 
                </label>
                <select class="form-control selectUser" name="user_id" id="user">
                    <option value="">Select user...</option>
                    @foreach ($users as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Book : </label>
                <select class="form-control selectUser" name="book_id" id="book">
                    <option value="">Select book...</option>
                    @foreach ($books as $book)
                        <option value="{{ $book->id }}">{{ $book->book_code }} | {{ $book->title }}</option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>
    
</div>

@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
    $('.selectUser').select2();
});
</script>
@endsection