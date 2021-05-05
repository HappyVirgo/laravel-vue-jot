@extends('layouts.app')

@section('content')
<div class="mx-auto bg-gray-400 flex justify-center items-center h-full">
    <div class="bg-blue-900 p-6 w-96">
        <svg class="fill-current text-white w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path d="M3.9 4.2c-.5 0-.8.3-.8.8s.4.8.8.8c.5 0 .8-.4.8-.8.1-.5-.3-.8-.8-.8zM3.3 18.6c0 1.4-.2 2.1-1.5 2.1-.3 0-.7 0-.9-.1l-.3 1.1c.3.1.7.2 1.1.2 1.9 0 2.7-1.2 2.7-3.2V8.1H3.3v10.5zM9.4 17.5c1.4 0 2.3-.4 3-1.2.8-1 1.1-2.1 1.1-3.8 0-1.4-.2-2.7-1-3.5-.6-.7-1.5-1.1-2.9-1.1s-2.3.4-3 1.2c-.8 1-1.1 2.2-1.1 3.8 0 1.5.2 2.6 1 3.5.6.7 1.5 1.1 2.9 1.1zM7.5 9.7c.3-.4.9-.8 2-.8 1 0 1.6.3 1.9.7.5.6.7 1.7.7 2.9s-.2 2.4-.7 3.1c-.3.4-.9.8-2 .8-1 0-1.6-.3-1.9-.7-.5-.6-.7-1.6-.7-2.9 0-1.2.2-2.4.7-3.1zM15 14.4c0 2.1.4 3.1 2.5 3.1.6 0 1.3-.1 1.8-.2l-.1-1c-.5.1-1 .2-1.5.2-1.4 0-1.5-.6-1.5-2.1v-5h3V8.3h-3v-3l-1.2.2v2.7h-1.8v1.1H15v5.1zM6 18h17v1H6z"/>
        </svg>
        <h1 class="text-3xl text-white pt-8">Oh no!</h1>
        <h2 class="text-blue-500">Enter your email to reset password</h2>
        <form class="pt-8" method="POST" action="{{ route('password.email') }}">
            {{ csrf_field() }}

            <div class="relative">
                <label for="email" class="uppercase font-bold text-blue-500 text-xs pt-2 pl-3 absolute">E-Mail</label>

                <div>
                    <input id="email" type="email" class="p-3 pt-8 text-gray-100 bg-blue-800 w-full focus:bg-blue-700" placeholder="your@email.com" name="email" value="{{ old('email') }}">

                    @if ($errors->has('email'))
                        <span class="text-red-600 text-sm font-bold pt-1">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="pt-8">
                <button type="submit" class="font-bold w-full uppercase bg-gray-300 text-blue-700 px-3 py-2 text-left">
                    Send Reset Email
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
