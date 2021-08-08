@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="about-box text-center">
            <h2>CONTACT</h2>
            </br>
            <form method="POST" action="{{ route('contact.confirm') }}">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control contact-box input-container" id="name" placeholder="Title" name="title" value="{{ old('title') }}" required>
                    @if ($errors->has('title'))
                        <p class="error-message">{{ $errors->first('title') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <input type="text" class="form-control contact-box input-container" id="email" placeholder="Email" name="email" value="{{ old('email') }}" required>
                    @if ($errors->has('email'))
                        <p class="error-message">{{ $errors->first('email') }}</p>
                    @endif
                </div>
                <textarea class="form-control contact-box input-container" rows="10" placeholder="Message" name="body" required>{{ old('body') }}</textarea>
                    @if ($errors->has('body'))
                    <p class="error-message">{{ $errors->first('body') }}</p>
                    @endif
                </br>
                <button class="btn btn-primary send-button" id="submit" type="submit" value="SEND">
                    <div class="alt-send-button">
                        <i class="fa fa-paper-plane"></i><span class="send-text"> SEND</span>
                    </div>
                </button>
            </form>
        </div>
    </div>
</div>

@endsection
