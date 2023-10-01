<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cover letter') }}
        </h2>
    </x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <h1>Cover Letter</h1>
      <div class="col-lg-8 px-0">
        <p class="fs-5">Are you looking for job? Need help writing your cover letter? We can help you!</p>
        <hr class="col-1 my-4">
    </div>
    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" id="user-form" method="post" action="{{ route('generate') }}">
        @csrf

        
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" >Role You are looking for</label>
            <input type="text" class=" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username"" id="inputRole" name="inputRole">
        </div>
        <div class="mb-4">
            <label for="inputName" class="block text-gray-700 text-sm font-bold mb-2">Your name</label>
            <input type="text" class="form-control" id="inputName" name="inputName">
            @error('inputName')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="col-md-12">
            <label for="inputEmail" class="block text-gray-700 text-sm font-bold mb-2">Your Email</label>
            <input type="email" class="form-control" id="inputEmail" name="inputEmail">
        </div>
        <div class="col-md-12">
            <label for="inputPhone" class="block text-gray-700 text-sm font-bold mb-2">Your Phone No.</label>
            <input type="text" class="form-control" id="inputPhone" name="inputPhone">
        </div>
        <div class="col-12">
            <label for="inputAddress" class="block text-gray-700 text-sm font-bold mb-2">Address</label>
            <input type="text" class="form-control" id="inputAddress" name="inputAddress" placeholder="">
        </div>
        <div class="col-12">
            <label for="inputAddress2" class="block text-gray-700 text-sm font-bold mb-2">Address 2</label>
            <input type="text" class="form-control" id="inputAddress2" name="inputAddress2" placeholder="">
        </div>
        <div class="col-md-6">
            <label for="inputCity" class="block text-gray-700 text-sm font-bold mb-2">City</label>
            <input type="text" class="form-control" id="inputCity" name="inputCity">
        </div>
        <div class="col-md-4">
            <label for="inputState" class="block text-gray-700 text-sm font-bold mb-2">Zip</label>
            <input type="text" class="form-control" id="inputZip" name="inputZip">
        </div>
        <div class="col-md-2">
            <label for="inputCountry" class="block text-gray-700 text-sm font-bold mb-2">Country</label>
            <input type="text" class="form-control" id="inputCountry" name="inputCountry">
        </div>
        <div class="col-md-12">
            <label for="inputCompany" class="block text-gray-700 text-sm font-bold mb-2">Company name</label>
            <input type="text" class="form-control" id="inputCompany" name="inputCompany">
        </div>
        <div class="col-md-8">
            <label for="inputSkills" class="block text-gray-700 text-sm font-bold mb-2">Your Skills</label>
            <input type="text" class="form-control" id="inputSkills">
            <input type="hidden" name="submitSkill" id="submitSkill">
            <div id="addedSkill">

            </div>
        </div>
        <div class="col-md-4">
        <label for="" class="form-label">&nbsp;</label>
            <button type="button" id='btnAddSkill' class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"  onclick="addSkill()">Add</button>
        </div>
        <br />
        <div class="col-12">
            <button type="button" id="btn-generate" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Generate</button>
        </div>
        </form>
    </div></div>
</x-app-layout>
