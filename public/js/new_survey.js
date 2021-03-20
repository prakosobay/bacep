$(document).ready(function(){
    $flag=1;
    $("#purpose_work").focusout(function(){
        if($(this).val()==''){
            $(this).css("border-color", "#FF0000");
                $('#submit').attr('disabled',true);
                 $("#error_purpose_work").text("* You have to enter your Purpose of Work!");
        }
        else
        {
            $(this).css("border-color", "#2eb82e");
            $('#submit').attr('disabled',false);
            $("#error_purpose_work").text("");

        }
   });
    $("#visitor_name").focusout(function(){
        if($(this).val()==''){
            $(this).css("border-color", "#FF0000");
                $('#submit').attr('disabled',true);
                $("#error_visitor_name").text("* You have to enter your Name!");
        }
        else
        {
            $(this).css("border-color", "#2eb82e");
            $('#submit').attr('disabled',false);
            $("#error_visitor_name").text("");
        }
   });
    $("#visitor_company").focusout(function(){
        if($(this).val()==''){
            $(this).css("border-color", "#FF0000");
                $('#submit').attr('disabled',true);
                $("#error_visitor_company").text("* You have to enter your Company!");
        }
        else
        {
            $(this).css("border-color", "#2eb82e");
            $('#submit').attr('disabled',false);
            $("#error_visitor_company").text("");
        }
   });
    $("#gender").focusout(function(){
        $(this).css("border-color", "#2eb82e");

   });
    $("#age").focusout(function(){
        if($(this).val()==''){
            $(this).css("border-color", "#FF0000");
                $('#submit').attr('disabled',true);
                $("#error_age").text("* You have to enter your Age!");
        }
        else
        {
            $(this).css({"border-color":"#2eb82e"});
            $('#submit').attr('disabled',false);
            $("#error_age").text("");

        }
        });

    $("#survey_lokasi").focusout(function(){
        if($(this).val()==''){
            $(this).css("border-color", "#FF0000");
                $('#submit').attr('disabled',true);
                $("#error_survey_lokasi").text("* You have to enter your Entry Area!");
        }
        else
        {
            $(this).css("border-color", "#2eb82e");
            $('#submit').attr('disabled',false);
            $("#error_survey_lokasi").text("");
        }
    });
    $("#phone").focusout(function(){
        $pho =$("#phone").val();
        if($(this).val()==''){
            $(this).css("border-color", "#FF0000");
                $('#submit').attr('disabled',true);
                $("#error_phone").text("* You have to enter your Phone Number!");
        }
        else if ($pho.length!=10)
        {
                $(this).css("border-color", "#FF0000");
                $('#submit').attr('disabled',true);
                $("#error_phone").text("* Lenght of Phone Number Should Be Ten");
        }
        else if(!$.isNumeric($pho))
        {
                $(this).css("border-color", "#FF0000");
                $('#submit').attr('disabled',true);
                $("#error_phone").text("* Phone Number Should Be Numeric");
        }
        else{
            $(this).css({"border-color":"#2eb82e"});
            $('#submit').attr('disabled',false);
            $("#error_phone").text("");
        }

    });

       $( "#submit" ).click(function() {
           if($("#myName" ).val()=='')
           {
            $("#myName").css("border-color", "#FF0000");
                $('#submit').attr('disabled',true);
                 $("#error_name").text("* You have to enter your first name!");
        }
        if($("#lastname" ).val()=='')
           {
            $("#lastname").css("border-color", "#FF0000");
                $('#submit').attr('disabled',true);
                 $("#error_lastname").text("* You have to enter your Last name!");
        }
           if($("#dob" ).val()=='')
           {
            $("#dob").css("border-color", "#FF0000");
                $('#submit').attr('disabled',true);
                 $("#error_dob").text("* You have to enter your Date of Birth!");
        }
           if($("#age" ).val()=='')
           {
            $("#age").css("border-color", "#FF0000");
                $('#submit').attr('disabled',true);
                 $("#error_age").text("* You have to enter your Age!");
        }
        if($("#phone" ).val()=='')
           {
            $("#phone").css("border-color", "#FF0000");
                $('#submit').attr('disabled',true);
                 $("#error_phone").text("* You have to enter your Phone Number!");
        }
        });



});
