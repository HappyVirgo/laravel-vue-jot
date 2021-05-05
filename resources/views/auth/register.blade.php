@extends('layouts.app')

@section('content')
<div class="mx-auto h-full flex justify-center items-center bg-gray-300">
    <div class="w-96 bg-blue-900 rounded-lg shadow-xl p-6">
        <svg class="fill-current text-white w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path d="M3.9 4.2c-.5 0-.8.3-.8.8s.4.8.8.8c.5 0 .8-.4.8-.8.1-.5-.3-.8-.8-.8zM3.3 18.6c0 1.4-.2 2.1-1.5 2.1-.3 0-.7 0-.9-.1l-.3 1.1c.3.1.7.2 1.1.2 1.9 0 2.7-1.2 2.7-3.2V8.1H3.3v10.5zM9.4 17.5c1.4 0 2.3-.4 3-1.2.8-1 1.1-2.1 1.1-3.8 0-1.4-.2-2.7-1-3.5-.6-.7-1.5-1.1-2.9-1.1s-2.3.4-3 1.2c-.8 1-1.1 2.2-1.1 3.8 0 1.5.2 2.6 1 3.5.6.7 1.5 1.1 2.9 1.1zM7.5 9.7c.3-.4.9-.8 2-.8 1 0 1.6.3 1.9.7.5.6.7 1.7.7 2.9s-.2 2.4-.7 3.1c-.3.4-.9.8-2 .8-1 0-1.6-.3-1.9-.7-.5-.6-.7-1.6-.7-2.9 0-1.2.2-2.4.7-3.1zM15 14.4c0 2.1.4 3.1 2.5 3.1.6 0 1.3-.1 1.8-.2l-.1-1c-.5.1-1 .2-1.5.2-1.4 0-1.5-.6-1.5-2.1v-5h3V8.3h-3v-3l-1.2.2v2.7h-1.8v1.1H15v5.1zM6 18h17v1H6z"/>
        </svg>
        <h1 class="text-white text-3xl pt-8">Join Us</h1>
        <h2 class="text-blue-300">Enter your information below</h2>
        <form method="POST" action="{{ route('register') }}" class="pt-8">
            {{ csrf_field() }}

            <div class="relative">
                <label for="name" class="uppercase text-xs font-bold text-blue-500 absolute pt-2 pl-3">Full Name</label>

                <div>
                    <input id="name" type="text" class="pt-8 w-full text-gray-100 p-3 bg-blue-800 focus:bg-blue-700 outline-none" placeholder="Your Name" name="name" value="{{ old('name') }}" autofocus>

                    @if ($errors->has('name'))
                        <span class="text-red-600 text-xs font-bold pt-1">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="relative pt-3">
                <label for="email" class="uppercase text-xs font-bold text-blue-500 pt-2 pl-3 absolute">E-Mail</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="pt-8 w-full text-gray-100 p-3 bg-blue-800 focus:bg-blue-700 outline-none" placeholder="your@email.com" name="email" value="{{ old('email') }}">

                    @if ($errors->has('email'))
                        <span class="text-red-600 text-xs font-bold pt-1">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="relative pt-3">
                <label for="password" class="pt-2 pl-3 uppercase font-bold text-blue-500 text-xs absolute">Password</label>

                <div>
                    <input id="password" type="password" class="w-full bg-blue-800 pt-8 p-3 text-gray-100 focus:bg-blue-700 outline-none" placeholder="Password" name="password">

                    @if ($errors->has('password'))
                        <span class="text-red-600 text-xs font-bold pt-1">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="relative pt-3">
                <label for="password-confirm" class="pt-2 pl-3 uppercase font-bold text-blue-500 text-xs absolute">Re-enter Password</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="w-full bg-blue-800 pt-8 p-3 text-gray-100 focus:bg-blue-700 outline-none" placeholder="Confirm" name="password_confirmation">
                </div>
            </div>
            <div class="pt-8">
                <button type="submit" class="uppercase font-bold w-full text-blue-700 bg-gray-400 text-left py-2 px-3 rounded">
                    Register
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
