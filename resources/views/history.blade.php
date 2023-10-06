
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('History') }}
        </h2>
    </x-slot>
    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <table class="border-collapse border border-slate-500 ">
            <thead>
                <th class="p-2 border border-slate-600">ID</th>
                <th class="p-2 border border-slate-600">Content</th>
                <th class="p-2 border border-slate-600">Create Date</th>
                <th class="p-2 border border-slate-600">Action</th>
            </head>
            <tbody>
                @foreach($letters as $letter)
                    <tr>
                        <td class="p-2  border border-slate-600">{{ $letter->id }}</td>
                        <td class="p-2 border border-slate-600" style=" max-width: 400px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $letter->content }}</td>
                        <td class="p-2 border border-slate-600"> {{ $letter->created_at }}</td>
                        <td class="p-2 border border-slate-600"><a href="{{ route('ViewLetter', $letter->id ) }}">View</a>
                    </tr>    
                @endforeach
            </tbody>
        </table>
    </div> 
</div>
</x-app-layout>
