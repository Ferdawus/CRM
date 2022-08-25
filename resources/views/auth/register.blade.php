<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>

{{-- 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap"rel="stylesheet");

    @import url("https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700");

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        overflow: hidden;
        background-color: #f4f6ff;
    }

    .container {
        width: 100vw;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: "Poppins", sans-serif;
        position: relative;
        left: 6vmin;
        text-align: center;
    }

    .cog-wheel1,
    .cog-wheel2 {
        transform: scale(0.7);
    }

    .cog1,
    .cog2 {
        width: 40vmin;
        height: 40vmin;
        border-radius: 50%;
        border: 6vmin solid #f3c623;
        position: relative;
    }


    .cog2 {
        border: 6vmin solid #4f8a8b;
    }

    .top,
    .down,
    .left,
    .right,
    .left-top,
    .left-down,
    .right-top,
    .right-down {
        width: 10vmin;
        height: 10vmin;
        background-color: #f3c623;
        position: absolute;
    }

    .cog2 .top,
    .cog2 .down,
    .cog2 .left,
    .cog2 .right,
    .cog2 .left-top,
    .cog2 .left-down,
    .cog2 .right-top,
    .cog2 .right-down {
        background-color: #4f8a8b;
    }

    .top {
        top: -14vmin;
        left: 9vmin;
    }

    .down {
        bottom: -14vmin;
        left: 9vmin;
    }

    .left {
        left: -14vmin;
        top: 9vmin;
    }

    .right {
        right: -14vmin;
        top: 9vmin;
    }

    .left-top {
        transform: rotateZ(-45deg);
        left: -8vmin;
        top: -8vmin;
    }

    .left-down {
        transform: rotateZ(45deg);
        left: -8vmin;
        top: 25vmin;
    }

    .right-top {
        transform: rotateZ(45deg);
        right: -8vmin;
        top: -8vmin;
    }

    .right-down {
        transform: rotateZ(-45deg);
        right: -8vmin;
        top: 25vmin;
    }

    .cog2 {
        position: relative;
        left: -10.2vmin;
        bottom: 10vmin;
    }

    h1 {
        color: #142833;
    }

    .first-four {
        position: relative;
        left: 6vmin;
        font-size: 40vmin;
    }

    .second-four {
        position: relative;
        right: 18vmin;
        z-index: -1;
        font-size: 40vmin;
    }

    .wrong-para {
        font-family: "Montserrat", sans-serif;
        position: absolute;
        bottom: 15vmin;
        padding: 3vmin 12vmin 3vmin 3vmin;
        font-weight: 600;
        color: #092532;
    }
</style>


<body>
    <div class="container">
        <h1 class="first-four">4</h1>
        <div class="cog-wheel1">
            <div class="cog1">
                <div class="top"></div>
                <div class="down"></div>
                <div class="left-top"></div>
                <div class="left-down"></div>
                <div class="right-top"></div>
                <div class="right-down"></div>
                <div class="left"></div>
                <div class="right"></div>
            </div>
        </div>

        <div class="cog-wheel2">
            <div class="cog2">
                <div class="top"></div>
                <div class="down"></div>
                <div class="left-top"></div>
                <div class="left-down"></div>
                <div class="right-top"></div>
                <div class="right-down"></div>
                <div class="left"></div>
                <div class="right"></div>
            </div>
        </div>
        <h1 class="second-four">4</h1>
        <p class="wrong-para">Uh Oh! Page not found!</p>
    </div>

    
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.3.1/gsap.min.js"></script>
<script src="../assets/custom/custom.js"></script>
</html> --}}
