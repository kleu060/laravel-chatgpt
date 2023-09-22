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
    <form class="row g-3" method="Get" action="{{ route('chat') }}">
        <div class="col-md-12">
            <label for="inputRole" class="form-label">Role You are looking for</label>
            <input type="text" class="form-control" id="inputRole">
        </div>
        <div class="col-md-12">
            <label for="inputName" class="form-label">Your name</label>
            <input type="text" class="form-control" id="inputName" name="inputName">
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
            <input type="text" class="form-control" id="inputAddress" name="inputAddress" placeholder="1234 Main St">
        </div>
        <div class="col-12">
            <label for="inputAddress2" class="form-label">Address 2</label>
            <input type="text" class="form-control" id="inputAddress2" name="inputAddress2" placeholder="Apartment, studio, or floor">
        </div>
        <div class="col-md-6">
            <label for="inputCity" class="form-label">City</label>
            <input type="text" class="form-control" id="inputCity" name="inputCity">
        </div>
        <div class="col-md-4">
            <label for="inputState" class="form-label">State</label>
            <select id="inputState" class="form-select">
            <option selected>Choose...</option>
            <option>...</option>
            </select>
        </div>
        <div class="col-md-2">
            <label for="inputZip" class="form-label">Zip</label>
            <input type="text" class="form-control" id="inputZip" name="inputZip">
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
                <span>Skill 1 <a onlick='removeSkills()' href="#">X</a></span>
                <span>Skill 1 <a href="#">X</a></span>
                <span>Skill 1 <a href="#">X</a></span>
                <span>Skill 1 <a href="#">X</a></span>
            </div>
        </div>
        <div class="col-md-4">
        <label for="" class="form-label">&nbsp;</label>
            <button type="button" id='btnAddSkill' class="form-control"  onclick="addSkill()">Add</button>
        </div>
        
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Generate</button>
        </div>
        </form>
    </div></div>
@endsection

@section('after_script')
<script>
    function addSkill(){
        var skill = $("#inputSkills").val();
        console.log("skill: " + skill);
        if ( skill != "" ){
            var addSkills = $("#submitSkill").val();
            var newAddedSkills = addSkills+"+---+"+skill;
            $("#inputSkills").val("");
            $("#submitSkill").val(newAddedSkills);
        }
        // <span>Skill 1 <a onlick='removeSkills()' href="#">X</a></span>
    }
    $("document").ready(function(){
        
    });
</script>
<style>
    #addedSkill{
        margin-top:14px;
    }
    
    #addedSkill span{
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