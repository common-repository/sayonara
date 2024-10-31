(function($) {
  'use strict';

  function sayonara(el) {
    var id = el.getAttribute('data-id');
    var name = 'sayonara-' + id;
    var trigger = el.getAttribute('data-trigger');
    var cookie = el.getAttribute('data-cookie');
    var ruthless = el.hasAttribute('data-ruthless');
    var debug = el.hasAttribute('data-debug');
    var ruthlessDelay = el.hasAttribute('data-ruthless-delay') ? el.getAttribute('data-ruthless-delay') * 1000 : 200;
    var ruthlessTimer;
    var sayonaraDelay = el.hasAttribute('data-sayonara-delay') ? el.getAttribute('data-sayonara-delay') * 1000 : 10000;
    var sayonaraScroll = el.hasAttribute('data-sayonara-scroll') ? el.getAttribute('data-sayonara-scroll') : 50;

    if (debug) {
      console.log('ID: ' + id);
      console.log('Name: ' + name);
      console.log('Trigger type: ' + trigger);
      console.log('Cookie value: ' + cookie);
      console.log('Ruthless status: ' + ruthless);
      console.log('Ruthless delay: ' + ruthlessDelay);
      console.log('Delay: ' + sayonaraDelay);
      console.log('Scroll %: ' + sayonaraScroll);
    }

    $('.sayonara-overlay').click(function() {
      closePopup();
    });

    $('.sayonara-close-btn').click(function() {
      closePopup();
    });

    if (cookie) {
      setCookie();
    } else {
      eraseCookie();
    }

    if (trigger == 'exit') {
      if (getCookie() != null) {
        return;
      }
      document.documentElement.addEventListener('mouseleave', handleMouseleave);
      document.documentElement.addEventListener('mouseenter', handleMouseenter);
    }

    if (trigger == 'delay') {
      if (getCookie() != null) {
        return;
      }
      setTimeout(function() {
        popup();
      }, sayonaraDelay);
    }

    if (trigger == 'scroll') {
      if (getCookie() != null) {
        console.log(getCookie());
        return;
      }
      var height = parseFloat($(document).height());
      var zone = height * sayonaraScroll / 100;
      if (debug) {
        console.log(height);
        console.log(zone);
      }
      $(window).scroll(function() {
        var scrollAmount = $(window).scrollTop();
        if (debug) {
          console.log(scrollAmount);
        }
        if (scrollAmount >= zone) {
          popup();
        }
      });

    }

    function closePopup() {
      if (el) {
        el.style.display = 'none';
      }
    }

    function setCookie() { // https://www.quirksmode.org/js/cookies.html
      var date = new Date();
      date.setTime(date.getTime() + (cookie * 24 * 60 * 60 * 1000));
      var expires = "expires=" + date.toUTCString();
      document.cookie = name + "=" + cookie + "; " + expires + "; path=/";
    }

    function getCookie() { // https://www.quirksmode.org/js/cookies.html
      var nameEQ = name + "=";
      var ca = document.cookie.split(';');
      for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
      }
      return null;
    }

    function eraseCookie() {
      document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/";
    }

    function handleMouseleave(e) {
      if (debug) {
        console.log('Exited');
      }
      if (ruthless) {
        popup();
      } else {
        ruthlessTimer = setTimeout(function() {
          popup();
        }, ruthlessDelay);
      }
    }

    function handleMouseenter() {
      if (debug) {
        console.log('Entered');
      }

      if (!ruthless) {
        clearTimeout(ruthlessTimer);
      }
    }

    function scroll(id, fx, scroll) {
      var fired = 0;
      var docHeight = $(document).height();
      var percentage = scroll / 100;

      var num = parseFloat(docHeight);
      var val = num - (num * percentage);

      $(window).scroll(function() {
        var topOfWindow = $(window).scrollTop();
        if (fired == 0) {
          if (topOfWindow >= val) {
            d_id = id;
            showPopup(id, fx);
            fired = 1;
          }
        }

      });
    }

    function popup() {

      if (el) {
        el.style.display = 'block';
      }
    }

  }



  $(function() {

    $('.sayonara').each(function(index) {
      sayonara(this);
    });
  });
})(jQuery);