
        jQuery(document).ready(function($) {
            $("button").click(function(){
                var username=$('#user_login').val();
            var first_name=$('#first_name').val();
            var last_name=$('#last_name').val();
            var phone_number=$('#input_box_1629364945').val();

            // var state=$('#state').val();
            // var city=$('#city').val();
            // var village=$('#village').val();
        

            var address=$('#textarea_address').val();
            var pincode=$('#pincode').val();
          

          //regular expression is here..
    //var pattern_firstname=/^[a-zA-Z]+$/;
    var username_regex = /^[a-zA-Z]([.@#_](?![.@#_])|[a-zA-Z0-9]){1,18}[a-zA-Z0-9]$/; //username not start from spacil characer and number start only character
    var pattern_firstname=/^[a-zA-Z]([._](?![._])|[a-zA-Z]){1,18}[a-zA-Z]$/;//dot and character is allow
    var pattern_mobile = /^[6-9][0-9]{9}$/;
    var specials=/[*|\":<>[\]{}`\\()';#%^*@&$]/;
    var pincode_regex = /^[A-Za-z0-9_]{6}$/;
    //var state_regex=/^(\w+\s?)*\s*$/;
    var state_regex=/^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$/;

   
    if(!username_regex.test(username))
    {
        $('input[name=user_login]').after('<div id="usernamediv"><i style="color:red">*Invlid username</div></i>');

        window.setTimeout(function(){
            document.getElementById("usernamediv").style="display:none";
           },5000);
    }

    if(!pattern_firstname.test(first_name))
    {
        $('input[name=first_name]').after('<div id="firstnamediv"><i style="color:red">**only character and . is allow in first_name</div></i>');

        window.setTimeout(function(){
            document.getElementById("firstnamediv").style="display:none";
           },5000);
        
      
    }
    if(!pattern_firstname.test(last_name))
    {
        $('input[name=last_name]').after('<div id="lastnamediv"><i style="color:red">**only a-z and A-Z test and . is allow in last_name</div></i>');
        window.setTimeout(function(){
            document.getElementById("lastnamediv").style="display:none";
           },5000);
      
    }
    if(!pattern_mobile.test(phone_number)){
        $('input[name=input_box_1629364945]').after('<div id="phonenumberdiv"><i style="color:red">**Enter the Valid Mobile number</div></i>');
        window.setTimeout(function(){
            document.getElementById("phonenumberdiv").style="display:none";
           },5000);
    } 
    
    
 if(!pincode_regex.test(pincode))
    {
        $('input[name=pincode]').after('<div id="pincodediv"><i style="color:red">***pincode is invalid</div></i>');
        window.setTimeout(function(){
            document.getElementById("pincodediv").style="display:none";
           },5000);
       
    }

      if(specials.test(address)){
        $('label[for=textarea_address]').after('<div id="addressdiv"><i style="color:red;">**spacial character is not allow in address</div></i>');
        window.setTimeout(function(){
            document.getElementById("addressdiv").style="display:none";
           },5000);
      
    }
    // if(!state_regex.test(state))
    // {
    //     $('input[name=state]').after('<div id="statediv"><i style="color:red">***please Enter valid state</div></i>');
    //      window.setTimeout(function(){
    //         document.getElementById("statediv").style="display:none";
    //         },5000);
    //     return true;
    // }
    // if(!state_regex.test(city))
    // {
    //     $('input[name=city]').after('<div id="citydiv"><i style="color:red">***please Enter valid city name</div></i>');
    //      window.setTimeout(function(){
    //         document.getElementById("citydiv").style="display:none";
    //        },5000);
    //     return true;
    // }
    // if(!state_regex.test(village))
    // {
    //     $('input[name=village]').after('<div id="villagediv"><i style="color:red">***please Enter valid village name</div></i>');
    //      window.setTimeout(function(){
    //          document.getElementById("villagediv").style="display:none";
    //       },5000);
    //     return true;
    // }

    //on change is closed
      });     
//ready function closed
        });
