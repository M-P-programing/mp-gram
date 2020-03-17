var url = location.protocol + "//" + location.host;
window.addEventListener('load', function () {
  $('.btn-like').css('cursor', 'pointer');
  $('.btn-dislike').css('cursor', 'pointer');

  //Like button
  function like() {
    $('.btn-dislike').unbind('click').click(function () {
      $(this).addClass('btn-like').removeClass('btn-dislike');
      $(this).attr('src', url + '/images/heart-red.png');

      $.ajax({
        url: url + "/like/" + $(this).data('id'),
        type: 'GET',
        success: function (response) {
          if (response.like) {
            console.log('like given');
          } else {
            console.log('error');
          }
        }
      });
      dislike();
    });
  }

  like();
  //Dislike button
  function dislike() {
    $('.btn-like').unbind('click').click(function () {
      $(this).addClass('btn-dislike').removeClass('btn-like');
      $(this).attr('src', url + '/images/heart-grey.png');
      $.ajax({
        url: url + "/dislike/" + $(this).data('id'),
        type: 'GET',
        success: function (response) {
          if (response.like) {
            console.log('dislike given');
          } else {
            console.log('dislike error');
          }
        }
      });
      like();
    });
  }

  dislike();

});