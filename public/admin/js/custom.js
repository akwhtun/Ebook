$(document).ready(function () {
    $('.editButton').on('click', function () {
        $(this).closest('.cat').addClass('edit');
    })

    $('.cancelBtn').on('click', function () {
        $(this).closest('.cat').removeClass('edit');
    })

    $('.li-group').slideUp();
    $('.down-arrow').on('click', function () {
        $(this).closest('.lists').find('.li-group').slideToggle(400);
    })

    $('.ano-list').on('click', function () {
      $('.left-col').find('.ano-list').removeClass('active');
        $(this).addClass('active');
    })

    //light dark mode
    $('.check-box').on('click', function() {
        if ($(this).is(':checked')) {
            $.ajax({
                type: 'get',
                url: '/mode/changeMode',
                data: {
                    'mode': 1
                },
                dataType: 'json',
                success: function(response) {
                    $('.bg-light').addClass('bg-dark');
                    $('.text-dark').addClass('text-white');
                    $('.border-dark').addClass('border-white');
                    $('.ch-bg').removeClass('con');
                    $('.ch-bg').addClass('bg-black');
                    $('.left-col').addClass('ano-left-col');
                    $('.mode').val(' dark-mode ');
                }
            })
        } else {
            $.ajax({
                type: 'get',
                url: '/mode/changeMode',
                data: {
                    'mode': 0
                },
                dataType: 'json',
                success: function(response) {
                    $('.bg-light').removeClass('bg-dark');
                    $('.text-dark').removeClass('text-white');
                    $('.border-dark').removeClass('border-white');
                    $('.ch-bg').addClass('con');
                    $('.ch-bg').remove('bg-black');
                    $('.left-col').removeClass('ano-left-col');
                     $('.mode').val(' light-mode ');
                }
            })
        }
    });




})
