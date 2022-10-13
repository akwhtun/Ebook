$(document).ready(function () {
    $('.editButton').on('click', function () {
        $(this).closest('.cat').addClass('edit');
    })

    $('.cancelBtn').on('click', function () {
        $(this).closest('.cat').removeClass('edit');
    })

    $('.down-arrow').on('click', function () {
       $(this).closest('.lists').find('.li-group').slideToggle(400);
    })
})
