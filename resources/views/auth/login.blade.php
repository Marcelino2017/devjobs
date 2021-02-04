@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="flex flex-wrap justify-center">
        <div class="w-full max-w-sm">
            <div class="flex flex-col break-words bg-white boder border-2 shadow-md mt-20">
                <div class="bg-gray-300 text-gray-700 uppercase text-center py-3 px-6 mb-0">
                    {{ __('Login') }}
                </div>
                <form class="py-10 px-5" method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="flex flex-wrap mb-6">
                        <label for="email" class="block text-gray-700 text-sm mb-2">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="p-3 bg-gray-200 rounded form-input w-full @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        
                    </div>

                    <div class="flex flex-wrap mb-6">
                        <label for="password" class="block text-gray-700 text-sm mb-2">{{ __('Password') }}</label>
                        <input id="password" type="password" class="p-3 bg-gray-200 rounded form-input w-full  @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        
                    </div>

                    
                    <div class="flex flex-wrap mb-6 mt-2">   
                        <input class="mr-2 " type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="block text-gray-700 text-sm mb-1" for="remember">
                            {{ __('Remember Me') }}
                        </label>  
                    </div>
                    
                    <div class="flex flex-wrap mb-6">
                        <button type="submit" 
                                class="bg-teal-500 w-full hover:bg-teal-700 text-gray-100 p-3 focus:outline-none focus:shadow-outline uppercase font-bold">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="no-underline hover:underline text-gray-500 text-sm mt-5 text-center w-full" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                       
                </form>
            </div>
        </div>
    </div>
</div>
@endsection