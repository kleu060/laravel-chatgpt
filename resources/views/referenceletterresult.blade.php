<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cover letter') }}
        </h2>
    </x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounde" type="button" onclick="generatePDF()">Generate PDF</button>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounde" type="button" onclick="saveLetter()">Save Letter</button>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounde" type="button" onclick="history.back()">Back</button>
        </div>
        <textarea class="w-full" id="txtarea" style="height:500px;"></textarea>
        <div style="display:none;" id="content">{!! $content !!}</div>
    </div> 
</div>



<script>

    function saveLetter(){
        var txt = $("#content").html();
        $.ajax({
            type: 'post',
            url: "{{route('SaveLetter')}}",
            data: {
                content:txt,
                _token : "{{csrf_token() }}",
            },
            success: function(response){
                alert(response);
            }
        })
    }

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
            console.log(tmp);
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
</x-app-layout>
