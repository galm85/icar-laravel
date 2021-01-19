
String.prototype.permalink = function(){
    return this.toString().trim().toLowerCase().replace(/\s/g,'-');
}

$('.origin-text').on('focusout',function(){
    $('.target-text').val( $(this).val().permalink() );
})



$('.sm-box').delay(3000).slideUp();


$('.add-to-cart-btn').on('click',function(){



    $.ajax({
        url:BASE_URL+"shop/add-to-cart",
        type:"GET",
        dataType:"html",
        data:{id: $(this).data('id')},
        success:function(response){
            location.reload();
        }
    });

})


$('.update-cart').on('click',function(){
    $.ajax({
        url:BASE_URL+'shop/update-cart',
        type:"GET",
        dataType:"html",
        data:{
            id:$(this).data('id'),
            op:$(this).val(),
    },
        success:function(response){
            location.reload();
        },
    })
})
