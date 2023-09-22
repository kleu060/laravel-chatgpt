@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="container">
    <div class="container my-5">
      <h1>Reference Letter</h1>
      <div class="col-lg-8 px-0">
        <p class="fs-5">Are you looking for job? Need help writing your reference letter? We can help you?</p>
        <hr class="col-1 my-4">
    </div>
    <form class="row g-3" id="user-form" method="post" action="{{ route('generate') }}">
        @csrf
        <div class="col-md-12">
            <label for="inputRole" class="form-label">Role You are looking for</label>
            <input type="text" class="form-control" id="inputRole" name="inputRole">
        </div>
        <div class="col-md-12">
            <label for="inputName" class="form-label">Your name</label>
            <input type="text" class="form-control" id="inputName" name="inputName">
            @error('inputName')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="col-md-12">
            <label for="inputEmail" class="form-label">Your Email</label>
            <input type="email" class="form-control" id="inputEmail" name="inputEmail">
        </div>
        <div class="col-md-12">
            <label for="inputPhone" class="form-label">Your Phone No.</label>
            <input type="phone" class="form-control" id="inputPhone" name="inputPhone">
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">Address</label>
            <input type="text" class="form-control" id="inputAddress" name="inputAddress" placeholder="">
        </div>
        <div class="col-12">
            <label for="inputAddress2" class="form-label">Address 2</label>
            <input type="text" class="form-control" id="inputAddress2" name="inputAddress2" placeholder="">
        </div>
        <div class="col-md-6">
            <label for="inputCity" class="form-label">City</label>
            <input type="text" class="form-control" id="inputCity" name="inputCity">
        </div>
        <div class="col-md-4">
            <label for="inputState" class="form-label">Zip</label>
            <input type="text" class="form-control" id="inputZip" name="inputZip">
        </div>
        <div class="col-md-2">
            <label for="inputCountry" class="form-label">Country</label>
            <input type="text" class="form-control" id="inputCountry" name="inputCountry">
        </div>
        <div class="col-md-12">
            <label for="inputCompany" class="form-label">Company name</label>
            <input type="text" class="form-control" id="inputCompany" name="inputCompany">
        </div>
        <div class="col-md-8">
            <label for="inputSkills" class="form-label">Your Skills</label>
            <input type="text" class="form-control" id="inputSkills">
            <input type="hidden" name="submitSkill" id="submitSkill">
            <div id="addedSkill">

            </div>
        </div>
        <div class="col-md-4">
        <label for="" class="form-label">&nbsp;</label>
            <button type="button" id='btnAddSkill' class="form-control"  onclick="addSkill()">Add</button>
        </div>
        
        <div class="col-12">
            <button type="button" id="btn-generate" class="btn btn-primary">Generate</button>
        </div>
        </form>
    </div></div>
@endsection

@section('after_script')
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
@endsection