/*!
Off Canvas Infinity Push, a infinity push mobile navigation jQuery plugin.

Version 1.0.2
Full source at https://github.com/marc-andrew/off-canvas-infinity-push
Copyright (c) 2014 Marc Andrew http://marcandrew.net/off-canvas-infinity-push

MIT License (http://www.opensource.org/licenses/mit-license.html)
*/

;
(function($) {
    $.fn.infinitypush = function(options) {
        var defaults = {
            offcanvas: true,
            offcanvasspeed: 400,
            offcanvasleft: true,
            openingspeed: 400,
            closingspeed: 400,
            spacing: 90,
            pushdirectionleft: true,
            autoScroll: true,
            scrollSpeed: 300,
            destroy: false
        };
        var infinityPushWrapper = this;
        var opts = $.extend({}, defaults, options);
        return this.each(function() {
            var oldposition = $(this).data('oldposition') || $('body'),
                navWrapper = 'ma-infinitypush-wrapper',
                navWrapperDiv = '<div class="' + navWrapper + '"></div>',
                navID = 'primary-navigation',
                navButtonActive = 'ma-infinitypush-active-button',
                navButton = 'ma-infinitypush-button',
                navButtonDiv = '<button type="button" aria-expanded="false" aria-controls="' + navID + '" aria-label="Reveal Navigation" class="' + navButton + '"></button>',
                navButtonLeft = 'ma-infinitypush-button-left',
                navButtonRight = 'ma-infinitypush-button-right',
                infinityPush = 'ma-infinitypush',
                infinityPushLeft = 'ma-infinitypush-left',
                infinityPushRight = 'ma-infinitypush-right',
                infinityPushOpen = 'ma-infinitypush-open',
                subOpen = 'ma-infinitypush-sub-open',
                inactiveList = 'ma-infinitypush-inactive',
                inactiveItem = 'ma-infinitypush-active-item',
                closeSubButton = 'ma-infinitypush-close-subnav';

            function destroy() {
                $('.' + navButton).unbind();
                $('.' + infinityPush).unbind();
                $('body').removeClass(infinityPushOpen);
                $('.' + navWrapper).next().removeAttr('style');
                $('.' + navWrapper).find('.' + inactiveList).removeClass(inactiveList).find('.' + inactiveItem).removeClass(inactiveItem).find('.' + closeSubButton).remove();
                $('.' + navWrapper).find('ul').removeAttr('style');
                infinityPushWrapper.prependTo(oldposition).removeClass(infinityPush + ' ' + subOpen);
                $('.' + navWrapper).remove();
                $(this).removeClass(infinityPush);
                infinityPushWrapper.stop().removeAttr('style');
            }

            function toggleState() {
                var btn = $('.' + navButton),
                    stateOff = 'off',
                    stateOn = 'on',
                    attrOff = 'Reveal Navigation',
                    attrOn = 'Close Navigation',
                    expandOff = 'false',
                    expandOn = 'true';
                btn.attr('data-state', btn.attr('data-state') === stateOff ? stateOn : stateOff);
                btn.attr('aria-label', btn.attr('aria-label') === attrOff ? attrOn : attrOff);
                btn.attr('aria-expanded', btn.attr('aria-expanded') === expandOff ? expandOn : expandOff);
            }

            function infinityPushToggle() {
                $('.' + navButton).on('click', function() {
                    if ($('body').hasClass(infinityPushOpen)) {
                        closingAnimation();
                    } else {
                        openingAnimation();
                        toggleState();
                    }
                });
            }

            function closingAnimation() {
                if (opts.offcanvasleft === true) {
                    $('.' + navWrapper).stop().animate({
                        left: '-' + navWidth + 'px'
                    }, opts.offcanvasspeed);
                } else {
                    $('.' + navWrapper).stop().animate({
                        right: '-' + navWidth + 'px'
                    }, opts.offcanvasspeed);
                }
                $('.' + infinityPush).stop().animate({
                    opacity: 'hide'
                }, opts.offcanvasspeed);
                if (opts.offcanvasleft === true) {
                    $('.' + navWrapper).next().stop().animate({
                        left: 0
                    }, opts.offcanvasspeed);
                } else {
                    $('.' + navWrapper).next().stop().animate({
                        right: 0
                    }, opts.offcanvasspeed);
                }
                $('body').removeClass(infinityPushOpen);
                toggleState();
            }

            function openingAnimation() {
                $('body').addClass(infinityPushOpen);
                if (opts.offcanvasleft === true) {
                    $('.' + navWrapper).stop().animate({
                        left: 0
                    }, opts.offcanvasspeed);
                } else {
                    $('.' + navWrapper).stop().animate({
                        right: 0
                    }, opts.offcanvasspeed);
                }
                $('.' + infinityPush).stop().animate({
                    opacity: 'show'
                }, opts.offcanvasspeed);
                if (opts.offcanvasleft === true) {
                    $('.' + navWrapper).next().stop().animate({
                        left: navWidth + 'px'
                    }, opts.offcanvasspeed);
                } else {
                    $('.' + navWrapper).next().stop().animate({
                        right: navWidth + 'px'
                    }, opts.offcanvasspeed);
                }
                clickOutside();
            }

            function clickOutside() {
                $('.' + infinityPushOpen).on("mousedown touchstart", function(e) {
                    if ($('.' + infinityPushOpen).length) {
                        if (!$('.' + navWrapper).is(e.target) && $('.' + navWrapper).has(e.target).length === 0) {
                            closingAnimation();
                        }
                    }
                });
            }
            if (opts.destroy) {
                if ($(this).hasClass(infinityPush)) destroy();
                return;
            }
            if (!$(this).hasClass(infinityPush)) {
                $(this).data('oldposition', $(this).parent());
                if (!$(this).parent().is('body')) {
                    $('body').prepend($(this));
                }
                $(this).before(navWrapperDiv).addClass(infinityPush).appendTo('.' + navWrapper);
                var navWidth = $('.' + navWrapper).width();
                if (opts.offcanvas === true) {
                    $(this).before(navButtonDiv);
                    if (opts.offcanvasleft === true) {
                        $('.' + navWrapper).css({
                            left: '-' + navWidth + 'px'
                        }).addClass(navButtonLeft);
                    } else {
                        $('.' + navWrapper).css({
                            right: '-' + navWidth + 'px'
                        }).addClass(navButtonRight);
                    }
                    if (opts.pushdirectionleft === true) {
                        $('.' + navWrapper).addClass(infinityPushLeft);
                    } else {
                        $('.' + navWrapper).addClass(infinityPushRight);
                    }
                    $('.' + navWrapper).addClass(navButtonActive);
                    infinityPushToggle();
                }
                $('.' + infinityPush).on('click', 'a', function() {
                    var navWidth = $(infinityPushWrapper).width(),
                        headParentUL = $(this).parents(infinityPushWrapper).children('ul'),
                        directParentUL = $(this).closest('ul'),
                        subUL = $(this).parent().find('ul').first(),
                        closeSubLink = '<a href="#" class="' + closeSubButton + '"></a>';
                    if (headParentUL.hasClass(inactiveList) && headParentUL.siblings().not(inactiveList)) {
                        if (directParentUL.hasClass(inactiveList)) {
                            if (opts.pushdirectionleft === true) {
                                directParentUL.find('ul').animate({
                                    right: -(navWidth - opts.spacing),
                                    opacity: 'hide'
                                }, opts.closingspeed);
                            } else {
                                directParentUL.find('ul').animate({
                                    left: -(navWidth - opts.spacing),
                                    opacity: 'hide'
                                }, opts.closingspeed);
                            }
                            if ($(this).parent().parent().parent().hasClass(subOpen)) {
                                $(infinityPushWrapper).removeClass(subOpen);
                            } else {
                                directParentUL.animate({
                                    width: navWidth - opts.spacing
                                }, opts.closingspeed);
                            }
                            directParentUL.removeClass(inactiveList);
                            directParentUL.find('ul').removeClass(inactiveList);
                            directParentUL.siblings().removeClass(inactiveList);
                            directParentUL.find('li').removeClass(inactiveItem);
                            directParentUL.find('.' + closeSubButton).animate({
                                opacity: 'hide'
                            }, opts.closingspeed, function() {
                                $(this).remove();
                            });
                            return false;
                        } else {
                            if ((subUL.length > 0) && (!subUL.is(':visible'))) {
                                var getScrollPositionSubUl = directParentUL.scrollTop();
                                $(this).parent().addClass(inactiveItem);
                                directParentUL.addClass(inactiveList);
                                if (opts.autoScroll === true) {
                                    if (getScrollPositionSubUl >= 1) {
                                        directParentUL.animate({
                                            scrollTop: 0
                                        }, opts.scrollSpeed);
                                    }
                                }
                                if (opts.autoScroll === true) {
                                    if (getScrollPositionSubUl >= 1) {
                                        $(closeSubLink).delay(opts.scrollSpeed).insertAfter($(this)).css('display', 'none').animate({
                                            opacity: 'show'
                                        }, opts.openingspeed);
                                    } else {
                                        $(closeSubLink).insertAfter($(this)).css('display', 'none').animate({
                                            opacity: 'show'
                                        }, opts.openingspeed);
                                    }
                                } else {
                                    if (getScrollPositionSubUl >= 1) {
                                        $(closeSubLink).insertAfter($(this)).css({
                                            display: 'none',
                                            top: getScrollPositionSubUl
                                        }).animate({
                                            opacity: 'show'
                                        }, opts.openingspeed);
                                    } else {
                                        $(closeSubLink).insertAfter($(this)).css({
                                            display: 'none',
                                            top: 0
                                        }).animate({
                                            opacity: 'show'
                                        }, opts.openingspeed);
                                    }
                                }
                                if (opts.pushdirectionleft === true) {
                                    if (opts.autoScroll === true) {
                                        if (getScrollPositionSubUl >= 1) {
                                            subUL.delay(opts.scrollSpeed).css({
                                                right: -(navWidth - opts.spacing)
                                            }).animate({
                                                right: 0,
                                                opacity: 'show',
                                                width: navWidth - opts.spacing
                                            }, opts.openingspeed);
                                        } else {
                                            subUL.css({
                                                right: -(navWidth - opts.spacing)
                                            }).animate({
                                                right: 0,
                                                opacity: 'show',
                                                width: navWidth - opts.spacing
                                            }, opts.openingspeed);
                                        }
                                    } else {
                                        if (getScrollPositionSubUl >= 1) {
                                            subUL.css({
                                                right: -(navWidth - opts.spacing),
                                                top: getScrollPositionSubUl
                                            }).animate({
                                                right: 0,
                                                opacity: 'show',
                                                width: navWidth - opts.spacing
                                            }, opts.openingspeed);
                                        } else {
                                            subUL.css({
                                                right: -(navWidth - opts.spacing),
                                                top: 0
                                            }).animate({
                                                right: 0,
                                                opacity: 'show',
                                                width: navWidth - opts.spacing
                                            }, opts.openingspeed);
                                        }
                                    }
                                } else {
                                    if (opts.autoScroll === true) {
                                        subUL.delay(opts.scrollSpeed).css({
                                            left: -(navWidth - opts.spacing)
                                        }).animate({
                                            left: 0,
                                            opacity: 'show',
                                            width: navWidth - opts.spacing
                                        }, opts.openingspeed);
                                    } else {
                                        if (getScrollPositionSubUl >= 1) {
                                            subUL.css({
                                                left: -(navWidth - opts.spacing),
                                                top: getScrollPositionSubUl
                                            }).animate({
                                                left: 0,
                                                opacity: 'show',
                                                width: navWidth - opts.spacing
                                            }, opts.openingspeed);
                                        } else {
                                            subUL.css({
                                                left: -(navWidth - opts.spacing),
                                                top: 0
                                            }).animate({
                                                left: 0,
                                                opacity: 'show',
                                                width: navWidth - opts.spacing
                                            }, opts.openingspeed);
                                        }
                                    }
                                }
                                directParentUL.animate({
                                    width: navWidth
                                }, opts.openingspeed);
                                return false;
                            }
                        }
                    } else {
                        if ((subUL.length > 0) && (!subUL.is(':visible'))) {
                            var getScrollPosition = $('.' + infinityPush).scrollTop();
                            $(this).parent().addClass(inactiveItem);
                            directParentUL.addClass(inactiveList);
                            directParentUL.siblings().addClass(inactiveList);
                            if ($(infinityPushWrapper).find('ul').is(':visible')) {
                                $(infinityPushWrapper).addClass(subOpen);
                            }
                            if (opts.autoScroll === true) {
                                if (getScrollPosition >= 1) {
                                    $('.' + infinityPush).animate({
                                        scrollTop: 0
                                    }, opts.scrollSpeed);
                                }
                            }
                            if (opts.autoScroll === true) {
                                if (getScrollPosition >= 1) {
                                    $(closeSubLink).delay(opts.scrollSpeed).insertAfter($(this)).css('display', 'none').animate({
                                        opacity: 'show'
                                    }, opts.openingspeed);
                                } else {
                                    $(closeSubLink).insertAfter($(this)).css('display', 'none').animate({
                                        opacity: 'show'
                                    }, opts.openingspeed);
                                }
                            } else {
                                if (getScrollPosition >= 1) {
                                    $(closeSubLink).insertAfter($(this)).css({
                                        display: 'none',
                                        top: getScrollPosition
                                    }).animate({
                                        opacity: 'show'
                                    }, opts.openingspeed);
                                } else {
                                    $(closeSubLink).insertAfter($(this)).css({
                                        display: 'none',
                                        top: 0
                                    }).animate({
                                        opacity: 'show'
                                    }, opts.openingspeed);
                                }
                            }
                            if (opts.pushdirectionleft === true) {
                                if (opts.autoScroll === true) {
                                    if (getScrollPosition >= 1) {
                                        subUL.delay(opts.scrollSpeed).css({
                                            right: -(navWidth - opts.spacing)
                                        }).animate({
                                            right: 0,
                                            opacity: 'show',
                                            width: navWidth - opts.spacing
                                        }, opts.openingspeed);
                                    } else {
                                        subUL.css({
                                            right: -(navWidth - opts.spacing)
                                        }).animate({
                                            right: 0,
                                            opacity: 'show',
                                            width: navWidth - opts.spacing
                                        }, opts.openingspeed);
                                    }
                                } else {
                                    if (getScrollPosition >= 1) {
                                        subUL.css({
                                            right: -(navWidth - opts.spacing),
                                            top: getScrollPosition
                                        }).animate({
                                            right: 0,
                                            opacity: 'show',
                                            width: navWidth - opts.spacing
                                        }, opts.openingspeed);
                                    } else {
                                        subUL.css({
                                            right: -(navWidth - opts.spacing),
                                            top: 0
                                        }).animate({
                                            right: 0,
                                            opacity: 'show',
                                            width: navWidth - opts.spacing
                                        }, opts.openingspeed);
                                    }
                                }
                            } else {
                                if (opts.autoScroll === true) {
                                    subUL.delay(opts.scrollSpeed).css({
                                        left: -(navWidth - opts.spacing)
                                    }).animate({
                                        left: 0,
                                        opacity: 'show',
                                        width: navWidth - opts.spacing
                                    }, opts.openingspeed);
                                } else {
                                    if (getScrollPosition >= 1) {
                                        subUL.css({
                                            left: -(navWidth - opts.spacing),
                                            top: getScrollPosition
                                        }).animate({
                                            left: 0,
                                            opacity: 'show',
                                            width: navWidth - opts.spacing
                                        }, opts.openingspeed);
                                    } else {
                                        subUL.css({
                                            left: -(navWidth - opts.spacing),
                                            top: 0
                                        }).animate({
                                            left: 0,
                                            opacity: 'show',
                                            width: navWidth - opts.spacing
                                        }, opts.openingspeed);
                                    }
                                }
                            }
                            return false;
                        }
                    }
                });
            }
        });
    };
})(jQuery);
