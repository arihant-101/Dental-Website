/**
 * SmileCare Dental — dental.js
 * Uses: jQuery (WordPress), slick.js (parent theme), magnific-popup (parent theme)
 */
(function($) {
  'use strict';

  /* ════════════════════════════════════════
     TESTIMONIALS CAROUSEL (slick.js)
     ════════════════════════════════════════ */
  function initTestimonialsSlider() {
    var $slider = $('.sc-testimonials-slider');
    if (!$slider.length) return;

    // Only init if slick is available (parent theme loads it)
    if (typeof $.fn.slick === 'undefined') {
      // Fallback: just show all cards in a flex wrap
      $slider.css({ display: 'flex', flexWrap: 'wrap', gap: '20px' });
      return;
    }

    $slider.slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 5000,
      pauseOnHover: true,
      dots: true,
      arrows: false,
      infinite: true,
      speed: 600,
      cssEase: 'cubic-bezier(0.4, 0, 0.2, 1)',
      responsive: [
        {
          breakpoint: 1024,
          settings: { slidesToShow: 2 }
        },
        {
          breakpoint: 640,
          settings: { slidesToShow: 1 }
        }
      ]
    });
  }

  /* ════════════════════════════════════════
     ANIMATED COUNTERS
     ════════════════════════════════════════ */
  function initCounters() {
    var $counters = $('.sc-counter');
    if (!$counters.length) return;

    var animated = false;

    function animateCounters() {
      if (animated) return;
      animated = true;

      $counters.each(function() {
        var $el = $(this);
        var target = parseInt($el.data('target'), 10) || 0;
        var duration = 2000;
        var startTime = null;

        function step(timestamp) {
          if (!startTime) startTime = timestamp;
          var progress = Math.min((timestamp - startTime) / duration, 1);
          // Ease out cubic
          progress = 1 - Math.pow(1 - progress, 3);
          $el.text(Math.floor(progress * target).toLocaleString());
          if (progress < 1) {
            requestAnimationFrame(step);
          } else {
            $el.text(target.toLocaleString());
          }
        }
        requestAnimationFrame(step);
      });
    }

    // Use IntersectionObserver for trigger-on-scroll
    if ('IntersectionObserver' in window) {
      var observer = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
          if (entry.isIntersecting) {
            animateCounters();
            observer.disconnect();
          }
        });
      }, { threshold: 0.3 });

      var $section = $('.sc-stats-section');
      if ($section.length) {
        observer.observe($section[0]);
      }
    } else {
      animateCounters();
    }
  }

  /* ════════════════════════════════════════
     SCROLL ENTRANCE ANIMATIONS
     (graceful degradation — content is visible
      by default; JS adds animation as enhancement)
     ════════════════════════════════════════ */
  function initScrollAnimations() {
    var $elements = $('.sc-fade-up');
    if (!$elements.length) return;

    // Mark body so CSS knows JS is working
    document.body.classList.add('sc-js-ready');

    if ('IntersectionObserver' in window) {
      var observer = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
          if (entry.isIntersecting) {
            entry.target.classList.add('sc-visible');
          }
        });
      }, { threshold: 0.1, rootMargin: '0px 0px -20px 0px' });

      $elements.each(function() {
        // If already in viewport on load, mark visible immediately
        var rect = this.getBoundingClientRect();
        if (rect.top < window.innerHeight && rect.bottom > 0) {
          this.classList.add('sc-visible');
        } else {
          observer.observe(this);
        }
      });
    } else {
      // No IntersectionObserver: show all immediately
      $elements.addClass('sc-visible');
    }
  }

  /* ════════════════════════════════════════
     STICKY HEADER ENHANCEMENT
     ════════════════════════════════════════ */
  function initStickyHeader() {
    var $header = $('#mainHeader, .mainHeader');
    if (!$header.length) return;

    var lastScroll = 0;
    var threshold = 80;

    $(window).on('scroll.dental', function() {
      var current = $(this).scrollTop();

      if (current > threshold) {
        $header.addClass('btSticky btStickyHeaderActive');
      } else {
        $header.removeClass('btSticky btStickyHeaderActive');
      }

      lastScroll = current;
    });
  }

  /* ════════════════════════════════════════
     SMOOTH SCROLL (anchor links)
     ════════════════════════════════════════ */
  function initSmoothScroll() {
    $(document).on('click', 'a[href^="#"]', function(e) {
      var target = $(this.getAttribute('href'));
      if (!target.length) return;
      e.preventDefault();
      var offset = 80; // header height
      $('html, body').animate({
        scrollTop: target.offset().top - offset
      }, 600, 'swing');
    });
  }

  /* ════════════════════════════════════════
     FORM ENHANCEMENTS
     ════════════════════════════════════════ */
  function initFormEnhancements() {
    // Add floating label effect
    $('input, textarea, select').on('focus', function() {
      $(this).closest('.sc-form-group, .sc-hero-form-group').addClass('sc-focused');
    }).on('blur', function() {
      $(this).closest('.sc-form-group, .sc-hero-form-group').removeClass('sc-focused');
    });

    // Form validation feedback
    $('form').on('submit', function(e) {
      var $form = $(this);
      var valid = true;

      $form.find('[required]').each(function() {
        if (!$(this).val().trim()) {
          $(this).css('border-color', '#e74c3c');
          valid = false;
        } else {
          $(this).css('border-color', '');
        }
      });

      if (!valid) {
        e.preventDefault();
        var $firstInvalid = $form.find('[required]:not([value])').first();
        if ($firstInvalid.length) {
          $('html, body').animate({
            scrollTop: $firstInvalid.offset().top - 100
          }, 400);
        }
      }
    });
  }

  /* ════════════════════════════════════════
     GALLERY FILTER (handles both CSS & hidden)
     ════════════════════════════════════════ */
  function initGalleryFilter() {
    var $filterBtns = $('#scGalleryFilter .sc-filter-btn');
    var $items = $('#scGalleryGrid .sc-gallery-item');
    if (!$filterBtns.length) return;

    $filterBtns.on('click', function() {
      var filter = $(this).data('filter');
      $filterBtns.removeClass('sc-active');
      $(this).addClass('sc-active');

      $items.each(function() {
        var $item = $(this);
        var cat = $item.data('category');
        if (filter === 'all' || cat === filter) {
          $item.css({ opacity: 0, transform: 'scale(0.9)', display: '' });
          setTimeout(function() {
            $item.css({ opacity: '', transform: '' });
          }, 10);
        } else {
          $item.css({ opacity: 0, transform: 'scale(0.9)' });
          setTimeout(function() {
            $item.hide();
          }, 300);
        }
      });
    });
  }

  /* ════════════════════════════════════════
     GALLERY LIGHTBOX (magnific-popup)
     ════════════════════════════════════════ */
  function initGalleryLightbox() {
    if (typeof $.fn.magnificPopup === 'undefined') return;

    $('#scGalleryGrid .sc-gallery-item').magnificPopup({
      delegate: 'a',
      type: 'image',
      gallery: { enabled: true },
      mainClass: 'mfp-with-zoom',
      zoom: { enabled: true }
    });
  }

  /* ════════════════════════════════════════
     LIVE "OPEN NOW" STATUS
     ════════════════════════════════════════ */
  function initOpenStatus() {
    if (typeof SmileCare === 'undefined') return;

    var $badges = $('.sc-open-badge, .sc-closed-badge');
    if (!$badges.length) return;

    // SmileCare.isOpen is set by PHP at page render time
    // Just ensure visibility is correct
    if (SmileCare.isOpen === '1') {
      $('.sc-closed-badge').replaceWith('<span class="sc-open-badge">Open Now</span>');
    } else {
      $('.sc-open-badge').replaceWith('<span class="sc-closed-badge">Closed</span>');
    }
  }

  /* ════════════════════════════════════════
     PHONE CLICK TRACKING
     ════════════════════════════════════════ */
  function initPhoneTracking() {
    $('a[href^="tel:"]').on('click', function() {
      var phone = $(this).attr('href').replace('tel:', '');
      // Google Analytics 4
      if (typeof gtag !== 'undefined') {
        gtag('event', 'phone_click', {
          event_category: 'Contact',
          event_label: phone
        });
      }
    });
  }

  /* ════════════════════════════════════════
     APPOINTMENT BUTTON TRACKING
     ════════════════════════════════════════ */
  function initApptTracking() {
    $('.btBtn.btSolidButton, .sc-header-appt-btn').each(function() {
      var href = $(this).attr('href') || '';
      if (href.indexOf('appointment') !== -1 || href.indexOf('book') !== -1) {
        $(this).on('click', function() {
          if (typeof gtag !== 'undefined') {
            gtag('event', 'appointment_click', {
              event_category: 'Conversion',
              event_label: 'Book Appointment Button'
            });
          }
          // AJAX ping for internal tracking
          if (typeof SmileCare !== 'undefined' && SmileCare.ajaxurl) {
            $.post(SmileCare.ajaxurl, {
              action: 'smilecare_track_appt',
              nonce: SmileCare.nonce
            });
          }
        });
      }
    });
  }

  /* ════════════════════════════════════════
     SERVICE CARD HOVER EFFECT
     ════════════════════════════════════════ */
  function initServiceCards() {
    $('.sc-service-card').each(function() {
      $(this).on('mouseenter', function() {
        $(this).find('.sc-service-icon').css('background', 'var(--dp)');
      }).on('mouseleave', function() {
        if (!$(this).hasClass('sc-featured')) {
          $(this).find('.sc-service-icon').css('background', '');
        }
      });
    });
  }

  /* ════════════════════════════════════════
     NAV UNDERLINE ANIMATION
     ════════════════════════════════════════ */
  function initNavHighlight() {
    var currentPath = window.location.pathname;
    $('.smilecare-nav li a').each(function() {
      var linkPath = new URL($(this).attr('href') || '', window.location.origin).pathname;
      if (linkPath === currentPath || (currentPath !== '/' && linkPath !== '/' && currentPath.indexOf(linkPath) === 0)) {
        $(this).closest('li').addClass('current-menu-item');
      }
    });
  }

  /* ════════════════════════════════════════
     INIT ALL
     ════════════════════════════════════════ */
  $(document).ready(function() {
    initTestimonialsSlider();
    initCounters();
    initScrollAnimations();
    initStickyHeader();
    initSmoothScroll();
    initFormEnhancements();
    initGalleryFilter();
    initGalleryLightbox();
    initOpenStatus();
    initPhoneTracking();
    initApptTracking();
    initServiceCards();
    initNavHighlight();
  });

})(jQuery);
