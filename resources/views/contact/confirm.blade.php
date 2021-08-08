@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="about-box text-center">
            <h2>Is this alright with you?</h2>
            </br>
            <form method="POST" action="{{ route('contact.thanks') }}">
                @csrf
                <div class="form-group">
                <h4>Subject</h4>
                <p>{{ $inputs['title'] }}</p>
                <input
                    name="title"
                    value="{{ $inputs['title'] }}"
                    type="hidden" class="form-control contact-box input-container">
                </div>
                <div class="form-group">
                <h4>Mail-Adress</h4>
                <p>{{ $inputs['email'] }}</p>
                <input
                    name="email"
                    value="{{ $inputs['email'] }}"
                    type="hidden" class="form-control contact-box input-container">
                </div>
                <div class="form-group">
                <h4>Inquiry</h4>
                <p>{!! nl2br(e($inputs['body'])) !!}</p>
                <input
                    name="body"
                    value="{{ $inputs['body'] }}"
                    type="hidden" class="form-control contact-box input-container">
                </div>
                </br>
                <button type="submit" name="action" value="back" class="btn btn-primary send-button">
                    Revise
                </button>
                </br>
                <button type="submit" name="action" value="submit" class="btn btn-primary send-button">
                    <div class="alt-send-button">
                        <i class="fa fa-paper-plane"></i><span class="send-text"> SEND</span>
                    </div>
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
