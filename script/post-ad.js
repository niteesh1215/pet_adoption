$('#postAdLink').click(function()
        {
            $('.background-blur').css({'display':'inherit','opacity':'0.5'});
            $('.imageUploadDiv').css({'top':'10px'});
        });

$('.imageUploadDiv header span').click( function ()
{
    $('.background-blur').css({'display':'none','opacity':'0'});
    $('.imageUploadDiv').css({'top':'-200vh'});
});