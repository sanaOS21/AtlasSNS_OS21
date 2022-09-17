'use strict';

{

  const open = document.getElementById('open');
  const search = document.getElementById('search');
  const overlay = document.querySelector('.overlay');
  const close = document.getElementById('close');


  open.addEventListener('click', () => {
    overlay.classList.add('show');
    open.classList.add('hide');
  });


  search.addEventListener('click', function (event) {
    event.stopPropagation();
  });
  close.addEventListener('click', () => {
    overlay.classList.remove('show');
    open.classList.remove('hide');
  });
}
$(function () {
  //編集(js-modal-open)
  $('.js-modal-open').on('click', function () {
    //内容を表示(js-modal)
    $('.js-modal').fadeIn();
    // 投稿内容取得→変数へ移動
    var post = $(this).attr('post');
    // 投稿ID取得→変数へ移動
    var post_id = $(this).attr('post_id');

    $('.modal_post').text(post);
    $('.modal_id').val(post_id);
    return false;
  });

  $('.js-modal-close').on('click', function () {
    // 通常時は非表示
    $('.js-modal').fadeOut();
    return false;
  });

});
