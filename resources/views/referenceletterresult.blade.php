@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="container">
    <div class="container my-5">
        <div>
            <h1 class="d-inline-block">Cover Letter</h1>
            <button class="btn d-inline-block" type="button" onclick="generatePDF()">Generate PDF</button>
        </div>
        <textarea class="form-control" id="txtarea" style="height:500px;"></textarea>
        <div style="display:none;" id="content">{!! $content !!}</div>
    </div> 
</div>
@endsection

@section('after_script')
<script>

    function generatePDF(){
        var txt = $("#content").html();
        $.ajax({
            type: 'post',
            url: "{{route('createPDF')}}",
            data: {
                content: txt,
                _token : "{{ csrf_token() }}",
            },
            xhrFields: {
                responseType: 'blob'
            },
            success: function(response){
                var blob = new Blob([response]);
                var link = document.createElement('a');
                link.href = window.URL.createObjectURL(blob);
                link.download = "reference_letter.pdf";
                link.click();
            },
            error: function(blob){
                console.log(blob);
            }
        });
    }

    $("document").ready(function(){
        $(document).ready(function()
        {
            var tmp = "{!! $content !!}";
            var name = tmp.replace(/<br \/>/g, '\n');

            
            
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