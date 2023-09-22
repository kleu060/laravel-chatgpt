@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="container">
    <div class="container my-5">
        <h1>Reference Letter</h1>
        <div id="cover-letter-content" class="col-lg-8 px-0">
            <!-- {!! $content !!} -->
        </div>
        <textarea class="form-control" id="txtarea" style="height:500px;"></textarea>
    
    </div>
</div>
@endsection

@section('after_script')
<script>
    $("document").ready(function(){
        $(document).ready(function()
        {
            var tmp = "{!! $content !!}";
            var name = tmp.replace(/<br>/g, '\n')
            
            function typeName(name, iteration) {
                // Prevent our code executing if there are no letters left
                if (iteration === name.length)
                    return;
                
                setTimeout(function() {
                    // Set the name to the current text + the next character
                    // whilst incrementing the iteration variable
                    $('#txtarea').text( $('#txtarea').text() + name[iteration++] );
                    
                    // Re-trigger our function
                    typeName(name, iteration);
                }, 5);
            }
            
            // Call the function to begin the typing process
            typeName(name, 0);
            //$('#cover-letter-content').html( $('#cover-letter-content').text());
        });
    });
</script>
<style>
    
</style>
@endsection