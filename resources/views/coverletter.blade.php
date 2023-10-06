
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

        <div class="md:items-center mb-6">
                <label class="block text-gray-500 font-bold  mb-1 md:mb-0 pr-4" for="inputRole">
                    Role You are looking for
                </label>
                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inputRole" name="inputRole" type="text" value="">

        </div>

        <div class="md:items-center mb-6">
            
            <label class="block text-gray-500 font-bold  mb-1 md:mb-0 pr-4" for="inputName">
                Your Name
            </label>

            <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inputName" name="inputName" type="text" value="">
            @error('inputName')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0 ">

                <label class="block text-gray-500 font-bold  mb-1 md:mb-0 pr-4" for="inputEmail">
                    Your Email
                </label>

                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" " id="inputEmail" type="text" placeholder="" name="inputEmail">
            </div>
            <div class="w-full md:w-1/2 px-3">
                <label class="block text-gray-500 font-bold  mb-1 md:mb-0 pr-4" for="inputPhone">
                    Your Phone No.
                </label>
                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"  id="inputPhone" type="text" placeholder="" name="inputPhone">
            </div>
        </div>



        <div class="md:items-center mb-6">
                <label class="block text-gray-500 font-bold  mb-1 md:mb-0 pr-4" for="inputAddress">
                    Address
                </label>
                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inputRole" name="inputAddress" type="inputAddress" value="">

        </div>

        <div class="md:items-center mb-6">
                <label class="block text-gray-500 font-bold  mb-1 md:mb-0 pr-4" for="inputAddress2">
                    Address 2
                </label>
                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inputAddress2" name="inputAddress2" type="text" value="">

        </div>
        

        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0 ">
                <label class="block text-gray-500 font-bold  mb-1 md:mb-0 pr-4" for="inputCity">
                    City
                </label>

                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" " id="inputCity" type="text" placeholder="" name="inputCity">
            </div>
            <div class="w-full md:w-1/3 px-3">
                <label class="block text-gray-500 font-bold  mb-1 md:mb-0 pr-4" for="inputZip">
                    Zip
                </label>
                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"  id="inputZip" type="text" placeholder="" name="inputZip">
            </div>
            <div class="w-full md:w-1/3 px-3">
                <label class="block text-gray-500 font-bold  mb-1 md:mb-0 pr-4" for="inputCountry">
                    Country
                </label>
                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"  id="inputCountry" type="text" placeholder="" name="inputCountry">
            </div>
        </div>

        <div class="md:items-center mb-6">
            <label class="block text-gray-500 font-bold  mb-1 md:mb-0 pr-4" for="inputCompany">
                Company Name
            </label>
            <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inputCompany" name="inputCompany" type="text" value="">

        </div>

        <div class="md:items-center mb-6">
            <label class="block text-gray-500 font-bold  mb-1 md:mb-0 pr-4" for="inputSkills">
            Your Skills
            </label>
            <div class="flex flex-wrap px-4 -mx-3 mb-6">
                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded md:w-1/3 py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inputSkills" name="inputSkills" type="text" value="">
                <button type="button" id='btnAddSkill' class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"  onclick="addSkill()">Add</button>
            </div>
            <div  class="flex flex-wrap -mx-3 mb-6" id="addedSkill"></div>

        </div>

        <br />
        <div class="col-12">
            <button type="button" id="btn-generate" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Generate</button>
        </div>
        </form>
    </div></div>
</x-app-layout>
