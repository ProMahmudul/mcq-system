@extends('layouts.app')
@section('title', 'Add New Quiz')

@section('content')

<div class="card card-body">
    <div>
        <div>
            <form method="post" action="{{route('store.quiz')}}">
                @csrf
                @if($errors->any())
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>
                        {!! implode('<br />', $errors->all('<span>:message</span>')) !!}
                    </strong>
                </div>
                @endif
                <div class="form-group">
                    <input type="text" placeholder="Quiz Title" name="title" required class="form-control">
                    <label>Valid From</label>
                    <input name="from_time" class="form-control" type="datetime-local">
                    <label>Valid Till</label>
                    <input name="to_time" class="form-control" type="datetime-local">

                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="Duration in Minute" name="duration" type="number" required>
                </div>
                <div class="text-center">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection