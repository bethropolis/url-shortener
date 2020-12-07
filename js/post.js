$(document).ready(function () {
  // prevent the page from reloading but send post request
  $('.form').submit(function () {
    $.post('./inc/data.inc.php', {
      url: $('#url').val(),
      slug: $('#slug').val(), 
      id: user
    });

    $('#slug').val('');
    $('#url').val('');
    $('.urls li').remove();
    getLink();
    return false;
  });
});