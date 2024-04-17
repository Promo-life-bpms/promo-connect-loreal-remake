@extends('layouts.guest')

<div style="position: relative; background-image: url('{{asset('/img/lorealfondo.gif')}}'); background-repeat: no-repeat; background-size: cover; width: 100%; height: 100vh;">

    <img src="{{asset('img/logo_loreal_white.png')}}" alt="" style="width: 14%;; margin-left:43%; padding-top:60px;" class="flex justify-center items-center ">
    <div class="flex justify-center items-center" style="margin-top:120px;">
       
        <div class="p-3 mt-auto rounded overflow-hidden shadow-2xl bg-white px-10" style="width:460px; margin-top:-50px;">
    
                <div class="flex items-center justify-center">
                    <p class="text-3xl" style="margin-top:20px; font-weight: 100 !important;">
                        Bienvenido
                    </p>
                </div>
    
                <form class="w-full p-4" method="POST" action="{{ route('login') }}">
                    @csrf
                    
                    <label class="block text-gray-500  text-left mb-1 md:mb-0 pr-4 pb-2" for="inline-full-name">
                        Usuario
                    </label>
                    
                    <div class="w-full">
                        <input type="email" class="appearance-none rounded w-full py-2 px-4 text-gray-700 leading-tight focus:bg-white focus:border-[#000000]" name="email" value="{{ old('email') }}" placeholder="Ingrese su correo" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback " role="alert">
                            <p class="text-sm text-red-700 font-semibold">{{ $message }}</p>
                        </span>
                        @enderror
                    </div>
                    
                    <div class="separador mt-4"></div>
                    <label class="block pb-2 text-gray-500 text-left mb-1 md:mb-0 pr-4" for="inline-password">
                        Contraseña
                    </label>
                    
                    <div class="w-full mb-2">
                        <input id="password" type="password" class="appearance-none rounded w-full py-2 px-4 text-gray-700 leading-tight focus:bg-white focus:border-[#000000  ]" placeholder="Ingrese su contraseña" name="password" required autocomplete="current-password" >
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <p class="text-sm text-red-700 font-semibold">{{ $message }}</p>
                        </span>
                        @enderror
                    </div>
                    <p class="text-sm mt-4">¿Aún no tienes cuenta? <b class="text-secondary"><u>Registrate</u> </b></p>
                    <div class="flex justify-left text-sm mt-6 mb-10">
                        <input type="checkbox" name="" id="">
                        <p class="ml-2">He leído y acepto los <b>Términos y condiciones</b></p>
                    </div>

                    <div class="md:flex md:items-center mt-4">
                        <div class="w-full mb-2">
                            <button type="submit" class="text-white bg-primary hover:bg-white hover:text-black hover:border-black inline-block w-full rounded px-7 pb-2.5 pt-3 text-sm font-medium uppercase leading-normal shadow-[0_4px_9px_-4px_#000000] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] border-2" style="border-color: black !important;">
                                INICIAR SESIÓN
                            </button>
                        </div>
                    </div>
                </form>
            </div>
    
    </div>
       
    
</div>

