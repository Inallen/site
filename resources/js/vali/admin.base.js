$(".form-check-parent").on("change",function(){
    if ($(this).prop('checked')) {
        $(".form-check-child").prop("checked",true);
    } else {
        $(".form-check-child").prop("checked",false);
    }
});




