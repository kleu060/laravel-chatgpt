<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
                <!-- @yield('content') -->
            </main>
        </div>
    </body>
</html>
<script>
    function submitForm(){

    }

    function addSkill(){
        var skill = $("#inputSkills").val();
        console.log("skill: " + skill);
        if ( skill != "" ){
            var addSkills = $("#submitSkill").val();
            $("#addedSkill").append("<div class='d-inline-block skills'><span class='skill'>"+skill+"</span><a class='removeSkill'  href='#'>X</a></div>")
        }

    }

    $("document").ready(function(){
        $("#addedSkill").on("click", ".removeSkill", function(e){
            e.preventDefault();
            $(this).parent().remove();
        });

        $("#btn-generate").click(function(){
            var skills = "";
            $(".skill").each(function(){
                skills += $(this).text() + "+====+";
                
            });
            $("#submitSkill").val(skills);
            // data = $('#user-form').serialize()
            // $.post("{{ route('generate') }}", 
            //     {
            //         _token : "{{ csrf_token() }}",
            //         data: data
            //     }, 
            //     function(result){
                    
            //     }
            // );
            $('#user-form').submit();
        });
    });
</script>
<style>
    #addedSkill{
        margin-top:14px;
    }
    
    #addedSkill .skills{
        margin-right:20px;
        padding: 4px 20px;
        border:1px solid gray;
        background-color:gray;
        color:white;
        border-radius:10px;
    }

    #addedSkill a{
        margin-left:4px;
        color:white;
    }
</style>