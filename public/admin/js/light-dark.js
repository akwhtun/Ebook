$view = $('.mode').val();
if ($view == ' light-mode ') {
$('.bg-light').removeClass('bg-dark');
$('.text-dark').removeClass('text-white');
$('.border-dark').removeClass('border-white');
$('.ch-bg').addClass('con');
$('.ch-bg').remove('bg-black');
$('.left-col').removeClass('ano-left-col');
}
if ($view == ' dark-mode ') {
$('.bg-light').addClass('bg-dark');
$('.text-dark').addClass('text-white');
$('.border-dark').addClass('border-white');
$('.ch-bg').removeClass('con');
$('.ch-bg').addClass('bg-black');
$('.left-col').addClass('ano-left-col');

}
