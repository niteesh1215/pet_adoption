
//post ad start
var breed = [['Siamese','Persian','Maine Coons','Ragdoll','Bengals','Abyssinian','Birmans'],['Labrador Retrievers','German Shepherds','Golden Retrievers','French Bulldogs','Bulldogs','Beagles','Poodles','Rottweilers'],['Betta','Goldfish','Angelfish','Catfish','Guppies']];
var reloadHTML;

$(document).ready(function(){
    reloadHTML = $('#uploadImage').html();
});


$(document).on('click', '#postAdLink', function()
{
    
    $('.background-blur').css({'display': 'inherit', 'opacity': '0.5'});
    $('.UploadDiv').css({'top': '90px'});

});        

$(document).on('click', '.close_window',close_ad_window);

function close_ad_window()
{
    $('.background-blur').css({'display':'none','opacity':'0'});
    $('.UploadDiv').css({'top':'-200vh'});
}

$(document).on('click', '.previous_window', function()
{
    $('.ad-details').css("display","inherit");
    $('.imageUploadDiv').css("display","none");
});

$(document).on('click', '.next-page', function()
{
    $('.invalid-feedback').addClass("hidden");
    //console.log($('.pet_category_input').val());
    if($('.pet_name_input').val()== "")
    {
        $('.pet_name_empty').removeClass('hidden');
    }
    else if($('.pet_category_input').val()== "")
    {
        $('.pet_category_empty').removeClass('hidden');
    }
    else  if($('.breed_input').val()== "")
    {
        $('.breed_empty').removeClass('hidden');
    }
    else  if($('.age_input').val()== "")
    {
        $('.age_empty').removeClass('hidden');
    } 
    else  if($('.size_input').val()== "")
    {
        $('.size_empty').removeClass('hidden');
    }
    else  if($('.weight_input').val()== "")
    {
        $('.weight_empty').removeClass('hidden');
    } 
    else  if($('.gender_input').val()== "")
    {
        $('.gender_empty').removeClass('hidden');
    }
    else  if($('.vaccinated_input').val()== "")
    {
        $('.vaccinated_empty').removeClass('hidden');
    }
    else  if($('.neutured_input').val()== "")
    {
        $('.neutured_empty').removeClass('hidden');
    }
    else  if($('.city_village_input').val()== "")
    {
        $('.city_village_empty').removeClass('hidden');
    }
    else  if($('.district_input').val()== "")
    {
        $('.district_empty').removeClass('hidden');
    }
    else  if($('.state_input').val()== "")
    {
        $('.state_empty').removeClass('hidden');
    }
    else  if($('.description_input').val()== "")
    {
        $('.description_empty').removeClass('hidden');
    }
    else
    {
        $('.ad-details').css("display","none");
        $('.imageUploadDiv').css("display","inherit");
       
    }
});

var elem,input_field,option_field;
function displayOptions(el,in_field,op_field)
{
    
    option_field= document.querySelector(op_field);
    if(option_field.style.height != '150px')
    {
        $('.options').css({'height':'0','padding':'0'});
        $('.form-group p span').css({'transform':'translateY( -50% ) rotate(-90deg)','color':'#F9575C'});
        option_field.style='height:150px;padding:4px;';
        el.lastChild.style='transform:translateY( -50% ) rotate(90deg); color:#b6b6b6;';
    }
    else
    {
        option_field.style='height:0px;padding:0;';
        el.lastChild.style='transform:translateY( -50% ) rotate(-90deg); color:#F9575C;';
    }
    elem=el;
    input_field= document.querySelector(in_field);
    
}

function updateBreed(petCategory)
{
    var choice;
    switch(petCategory)
    {
        case "Cat" : choice=0;break;
        case "Dog" : choice=1;break;
        case "Fish" : choice=2;break;   
        //default:   console.log("error");
            
    }
    $('.breed').empty();
    $('.breed').append("<p onclick='selectOption(this)'>Unknown</p>");
    for(var i=0;i<breed[choice].length;i++)
    {
        $('.breed').append("<p onclick='selectOption(this)'>"+breed[choice][i]+"</p>");
    }
}

function selectOption(el)
{
    if(el.innerText == 'Unknown')
    {
        input_field.setAttribute('value',-1);
        elem.firstChild.textContent=el.innerText;
    }
    else
    {
        input_field.setAttribute('value',el.innerText);
        if(elem.classList.contains("age_dummy"))
            elem.firstChild.textContent=el.innerText+' '+$('input[name="age_type"]:checked').val();
        else
            elem.firstChild.textContent=el.innerText;
    }
    
    //alert($('input[name="age_type[]"]:checked').val())
    
    option_field.style='height:0px;padding:0;';
    elem.lastChild.style='transform:translateY( -50% ) rotate(-90deg); color:#F9575C;';
    
    if(elem.classList.contains("pet_category_dummy"))
    {
        updateBreed(elem.firstChild.textContent);
    }
}
//post ad end 


//wishlist start
function favorite_toggle(elem,id)
{
    var str = elem.innerHTML;
    if (!str.localeCompare("favorite_border"))
    {
        wishlist_toggle(id,1,elem);
    } else
    {
        wishlist_toggle(id,0,elem);
    }
    
}

function wishlist_toggle(id,flag,elem)
{
        
        const formData = new FormData();
        formData.append('id',id);
        formData.append('flag',flag);
                $.ajax({
                    url: 'wishlist_add_remove.php',
                    method: 'POST',
                    data: formData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function (data) 
                    {   if(data && flag)
                        {
                            elem.innerHTML = "favorite";
                            elem.style.color = "#f9575c";
                        }
                        else if(data && !flag)
                        {
                             elem.innerHTML = "favorite_border";
                             elem.style.color = "#cccccc";
                        }
                    },
                    error(data) {
                        console.log(data);
                    }
                });     
}
function remove_from_wishlist(id,flag,row_id)
{
    const formData = new FormData();
        formData.append('id',id);
        formData.append('flag',flag);
                $.ajax({
                    url: 'wishlist_add_remove.php',
                    method: 'POST',
                    data: formData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function (data) 
                    {  
                        if(data){ 
                            $('#'+row_id).remove();
                            
                        }
                    },
                    error(data) {
                        console.log(data);
                    }
                });   
}
// wishlist end

function close_dynamic_window()
{
    $("#dynamic_content").css("visibility","hidden");
    $("#dynamic_content").empty();
    
}

//profile
function close_update_profile_window()
{
    $(".update_profile").css({'top': '-110vh', 'visibility': 'hidden'});
    $(".update_profile_content").empty();
    
}
function update_profile_img()
{
    $(".update_profile").css({'top': '0', 'visibility': 'visible'});
    $(".update_profile_content").load("update_profile_img_form.php");
}
//profile end