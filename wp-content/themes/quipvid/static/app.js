jQuery(function($){
  // Custom quip player control
  var quip_player = $('#quip_player'),
    quip_video = $('video', quip_player);

  quip_video.css('cursor', 'pointer');

  quip_video.on('ended', function () {
    quip_player.addClass('is_stopped');
  });

  quip_video.on('pause', function () {
    quip_player.addClass('is_paused');
  });

  quip_video.on('playing', function () {
    quip_player.removeClass('is_stopped');
  });

  quip_video.on('click', function () {
    if (quip_video[0].paused == false) {
      quip_video[0].pause();
    } else {
      quip_player.removeClass('is_stopped');
      quip_video[0].play();
    }
  });

  $('.replay', quip_player).on('click', function () {
    quip_video[0].play();
  });
})
