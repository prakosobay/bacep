$(document).ready(function(){
    $flag=1;
    $("#survey_work").focusout(function(){
        if($(this).val()==''){
            $(this).css("border-color", "#FF0000");
                $('#submit').attr('disabled',true);
                $("#error_survey_work").text("* You have to enter your Purpose of Work!");
        }
        else
        {
            $(this).css("border-color", "#2eb82e");
            $('#submit').attr('disabled',false);
            $("#error_survey_work").text("");

        }
});
    $("#survey_name").focusout(function(){
        if($(this).val()==''){
            $(this).css("border-color", "#FF0000");
                $('#submit').attr('disabled',true);
                $("#error_survey_name").text("* You have to enter your Name!");
        }
        else
        {
            $(this).css("border-color", "#2eb82e");
            $('#submit').attr('disabled',false);
            $("#error_survey_name").text("");
        }
});
    $("#survey_company").focusout(function(){
        if($(this).val()==''){
            $(this).css("border-color", "#FF0000");
                $('#submit').attr('disabled',true);
                $("#error_survey_company").text("* You have to enter your Company!");
        }
        else
        {
            $(this).css("border-color", "#2eb82e");
            $('#submit').attr('disabled',false);
            $("#error_survey_company").text("");
        }
});
    $("#gender").focusout(function(){
        $(this).css("border-color", "#2eb82e");

});
    $("#survey_department").focusout(function(){
        if($(this).val()==''){
            $(this).css("border-color", "#FF0000");
                $('#submit').attr('disabled',true);
                $("#error_survey_department").text("* You have to enter your Department!");
        }
        else
        {
            $(this).css({"border-color":"#2eb82e"});
            $('#submit').attr('disabled',false);
            $("#error_survey_department").text("");
        }
});

    $("#survey_id").focusout(function(){
        if($(this).val()==''){
            $(this).css("border-color", "#FF0000");
                $('#submit').attr('disabled',true);
                $("#error_survey_id").text("* You have to enter your ID Number!");
        }
        else
        {
            $(this).css("border-color", "#2eb82e");
            $('#submit').attr('disabled',false);
            $("#error_survey_id").text("");
        }
});

    $("#survey_phone").focusout(function(){
        $pho =$("#survey_phone").val();
        if($(this).val()==''){
            $(this).css("border-color", "#FF0000");
                $('#submit').attr('disabled',true);
                $("#error_survey_phone").text("* You have to enter your Phone Number!");
        }
        else if ($pho.length > 12)
        {
                $(this).css("border-color", "#FF0000");
                $('#submit').attr('disabled',true);
                $("#error_survey_phone").text("* Lenght of Phone Number is Too Long");
        }
        else if ($pho.length < 11)
        {
                $(this).css("border-color", "#FF0000");
                $('#submit').attr('disabled',true);
                $("#error_survey_phone").text("* Lenght of Phone Number is Too Short");
        }
        else if(!$.isNumeric($pho))
        {
                $(this).css("border-color", "#FF0000");
                $('#submit').attr('disabled',true);
                $("#error_survey_phone").text("* survey_phone Number Should Be Numeric");
        }
        else{
            $(this).css({"border-color":"#2eb82e"});
            $('#submit').attr('disabled',false);
            $("#error_survey_phone").text("");
        }
});

$("#survey_date_from").focusout(function(){
    if($(this).val()==''){
        $(this).css("border-color", "#FF0000");
            $('#submit').attr('disabled',true);
            $("#error_survey_date_from").text("* You have to enter your Time Visit!");
    }
    else
    {
        $(this).css({"border-color":"#2eb82e"});
        $('#submit').attr('disabled',false);
        $("#error_survey_date_from").text("");
    }
});

$("#survey_date_to").focusout(function(){
    if($(this).val()==''){
        $(this).css("border-color", "#FF0000");
            $('#submit').attr('disabled',true);
            $("#error_survey_date_to").text("* You have to enter your Time Visit!");
    }
    else
    {
        $(this).css({"border-color":"#2eb82e"});
        $('#submit').attr('disabled',false);
        $("#error_survey_date_to").text("");
    }
});


    $( "#submit" ).click(function() {
        if($("#survey_work" ).val()=='')
        {
        $("#survey_work").css("border-color", "#FF0000");
            $('#submit').attr('disabled',true);
                $("#error_survey_work").text("* You have to enter your Purpose of Work!");
        }
        if($("#survey_name" ).val()=='')
        {
        $("#survey_name").css("border-color", "#FF0000");
            $('#submit').attr('disabled',true);
                $("#error_survey_name").text("* You have to enter your Name!");
        }
        if($("#survey_company" ).val()=='')
        {
        $("#survey_company").css("border-color", "#FF0000");
            $('#submit').attr('disabled',true);
                $("#error_survey_company").text("* You have to enter your Company!");
        }
        if($("#survey_department" ).val()=='')
        {
        $("#survey_department").css("border-color", "#FF0000");
            $('#submit').attr('disabled',true);
                $("#error_survey_department").text("* You have to enter your Department!");
        }
        if($("#survey_id" ).val()=='')
        {
        $("#survey_id").css("border-color", "#FF0000");
            $('#submit').attr('disabled',true);
                $("#error_survey_id").text("* You have to enter your ID Number!");
        }
        if($("#survey_phone" ).val()=='')
        {
        $("#survey_phone").css("border-color", "#FF0000");
            $('#submit').attr('disabled',true);
                $("#error_survey_phone").text("* You have to enter your Phone Number!");
        }
        if($("#survey_date_from" ).val()=='')
        {
        $("#survey_date_from").css("border-color", "#FF0000");
            $('#submit').attr('disabled',true);
                $("#error_survey_date_from").text("* You have to enter your Time Visit!");
        }
        if($("#survey_date_to" ).val()=='')
        {
        $("#survey_date_to").css("border-color", "#FF0000");
            $('#submit').attr('disabled',true);
                $("#error_survey_date_to").text("* You have to enter your Time Visit!");
        }
    });
});
