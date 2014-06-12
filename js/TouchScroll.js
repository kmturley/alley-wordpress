// http://paulirish.com/2011/requestanimationframe-for-smart-animating/
// http://my.opera.com/emoller/blog/2011/12/20/requestanimationframe-for-smart-er-animating
// requestAnimationFrame polyfill by Erik Möller. fixes from Paul Irish and Tino Zijdel
// MIT license
(function() {
    var lastTime = 0;
    var vendors = ['ms', 'moz', 'webkit', 'o'];
    for(var x = 0; x < vendors.length && !window.requestAnimationFrame; ++x) {
        window.requestAnimationFrame = window[vendors[x]+'RequestAnimationFrame'];
        window.cancelAnimationFrame = window[vendors[x]+'CancelAnimationFrame'] 
                                   || window[vendors[x]+'CancelRequestAnimationFrame'];
    }
 
    if (!window.requestAnimationFrame)
        window.requestAnimationFrame = function(callback, element) {
            var currTime = new Date().getTime();
            var timeToCall = Math.max(0, 16 - (currTime - lastTime));
            var id = window.setTimeout(function() { callback(currTime + timeToCall); }, 
              timeToCall);
            lastTime = currTime + timeToCall;
            return id;
        };
 
    if (!window.cancelAnimationFrame)
        window.cancelAnimationFrame = function(id) {
            clearTimeout(id);
        };
}());

/*
 * TouchScroll - using dom overflow:scroll
 * by kmturley
 */

/*globals window, document */

var TouchScroll = function () {
    'use strict';
    
    var module = {
        axis: 'x',
        drag: false,
        isIE: window.navigator.userAgent.toLowerCase().indexOf('msie') > -1,
        isFirefox: window.navigator.userAgent.toLowerCase().indexOf('firefox') > -1,
        init: function (options) {
            var me = this;
            if (options && options.id) {
                this.el = document.getElementById(options.id);
            } else {
                if (this.isIE || this.isFirefox) {
                    this.el = document.documentElement;
                } else {
                    this.el = document.body;
                }
            }
            this.addEvent('mousedown', this.el, function (e) { me.onMouseDown(e); });
			this.addEvent('mousemove', this.el, function (e) { me.onMouseMove(e); });
			this.addEvent('mouseup', this.el, function (e) { me.onMouseUp(e); });
        },
        addEvent: function (name, el, func) {
            if (el.addEventListener) {
                el.addEventListener(name, func, false);
            } else if (el.attachEvent) {
                el.attachEvent('on' + name, func);
            } else {
                el[name] = func;
            }
        },
        onMouseDown: function (e) {
            if (!e) { e = window.event; }
            this.startx = e.clientX + this.el.scrollLeft;
            this.starty = e.clientY + this.el.scrollTop;
            this.diffx = 0;
            this.diffy = 0;
            this.drag = true;
        },
        onMouseMove: function (e) {
            if (this.drag === true) {
                if (!e) { e = window.event; }
                this.diffx = (this.startx - (e.clientX + this.el.scrollLeft));
                this.diffy = (this.starty - (e.clientY + this.el.scrollTop));
                this.el.scrollLeft += this.diffx;
                this.el.scrollTop += this.diffy;
            }
        },
        onMouseUp: function (e) {
            if (!e) { e = window.event; }
            this.drag = false;
            var me = this,
                start = 1,
                animate = function () {
                    var step = Math.sin(start);
                    if (step <= 0) {
                        window.cancelAnimationFrame(animate);
                    } else {
                        me.el.scrollLeft += me.diffx * step;
                        me.el.scrollTop += me.diffy * step;
                        start -= 0.02;
                        window.requestAnimationFrame(animate);
                    }
                };
            animate();
        }
    };
    return module;
};

// init touch scroll instance for all pages
var touch = new TouchScroll();
touch.init();