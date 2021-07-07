<?php 

include_once "./_db_config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["name"];
    $age = $_POST["age"];
    $mobileNo = $_POST["mobile_no"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $pincode = $_POST["pincode"];
    $education = $_POST["education"];
    $martialStatus = $_POST["martial_status"];

    $sql = "INSERT INTO `formtb` (`name`, `age`, `mobile`, `city`, `state`, `pin`, `education`, `mar_status`, `id`) VALUES 
    ('$name', '$age', '$mobileNo', '$city', '$state', '$pincode', '$education', '$martialStatus', null)";
    $result = mysqli_query($conn, $sql);

    if($result){
        header("location: thanks.html");
    }else{
        header("location: form.php");
    }
}

?>

<html>
    <head>
        <title>demographic survey</title>
    <link rel="stylesheet" href="form.css">
    </head>
    <body>
        <div class="container">
            <div id="form-container">
                <form id="form" action="./form.php" method="post">
                    <div id="step1">
                        <h3>Personal info</h3>
                        <input type="text" placeholder="Name" required name="name" id="name">
                        <input type="number" placeholder="Age" required name="age" id="age">
                        <input type="number" placeholder="Mobile No." required name="mobile_no" id="mobile_no">

                        <div class="btn-box">
                            <button type="button" id="Next1">NEXT</button>
                        </div>
                    </div>
                    <div id="step2">
                        <h3>Residential info</h3>
                        <input type="text" placeholder="City" name="city" id="city">
                        <input type="text" placeholder="State"name="state" id="state">
                        <input type="number" placeholder="Pin code" name="pincode" id="pincode">

                        <div class="btn-box">
                            <button type="button" id="Back1">BACK</button>
                            <button type="button" id="Next2">NEXT</button>
                        </div>
                    </div>
                    <div class="step3" id="step3">
                        <p>Education</p>
                        <h3 class="selecth3">
                        <select name="education">
                                    <option value="10th">10th</option>
                                        <option value="12th">12th</option>
                                        <option value="UG">Ug</option>
                                        <option value="PG">PG</option>
                                </select>
                        
                            </h3>
                            
                            <p>Martial Status</p>
                        <h3 >
                                <select name="martial_status">
                                        <option value="Unmarried">Unmarried</option>
                                        <option value="Married">Married</option>
                                </select>
                        
                            </h3>

                        <div class="btn-box">
                            <button type="button" id="Back2">BACK</button>
                            <input type="submit" id="input" onclick="handleForm()" value="SUBMIT">
                        </div>
                    </div>
                </form>
            </div>
            <dvi class="step-row">
                    <div id="progress"></div>
                    <div class="step-col" id="step_1"><small>Step 1</small></div>
                    <div class="step-col" id="step_2"><small>Step 2</small></div>
                    <div class="step-col" id="step_3"><small>Step 3</small></div>
            </dvi>
        </div>
</body>
    <script>
            var Form1 = document.getElementById("step1");
            var Form2 = document.getElementById("step2");
            var Form3 = document.getElementById("step3");

            let name = document.getElementById("name");
            let age = document.getElementById("age");
            let mobile_no = document.getElementById("mobile_no");

            let city = document.getElementById("city");
            let state = document.getElementById("state");
            let pincode = document.getElementById("pincode");

            document.getElementById("Next1").addEventListener('click', function(){
                if(!(name && name.value)) {
                    alert("Enter your name");
                    return;
                }
                else if (!(age && age.value)){
                    alert("Enter your age");
                    return;
                }
                else if (age.value<6 || age.value>100){
                    alert("Enter a valid age");
                    return;
                }
                else if (mobile_no.value.length!=10){
                    alert("Enter a valid mobile number");
                    return;
                }
                else if (!(mobile_no && mobile_no.value)){
                    alert("Enter mobile number");
                    return;
                }
                else {
                    document.getElementById("step1").style.display = "none";
                    document.getElementById("step2").style.display = "block";
                    progress.style.width ="240px";
                }
            })
            
            document.getElementById("Next2").addEventListener('click', function(){
                if(!(city && city.value)) {
                    alert("Enter your city");
                    return;
                }
                else if (!(state && state.value)){
                    alert("Enter your state");
                    return;
                }
                else if (!(pincode && pincode.value)){
                    alert("Enter a pincode");
                    return;
                }
                else if (pincode.value.length!=6){
                    alert("Enter a valid pincode");
                    return;
                }
                else{
                    document.getElementById("step2").style.display = "none";
                    document.getElementById("step3").style.display = "block";
                    progress.style.width ="360px";
                }
            })

            function handleForm(){
                if(name.value && age.value && mobile_no.value && city.value && state.value && pincode.value){
                    document.getElementById("form").submit();
                }
                else{
                    alert("Form is not complete! All feilds are required.");
                }
            }

            document.getElementById("Back1").addEventListener('click', function(){
                document.getElementById("step1").style.display = "block";
                document.getElementById("step2").style.display = "none";
                progress.style.width ="120px";
            })
            document.getElementById("Back2").addEventListener('click', function(){
                document.getElementById("step3").style.display = "none";
                document.getElementById("step2").style.display = "block";
                progress.style.width ="240px";
            })           
    </script>   
</html>