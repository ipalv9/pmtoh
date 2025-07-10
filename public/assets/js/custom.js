/*
* Name:        Oscar
* Written by: 	Unifato - (http://unifato.com)
* Version:     1.0.0
*/

(function($) {
  'use strict';

  var Custom = {
    init: function() {
      this.enableSmoothScrollbar();
      this.enableSidebarAffix();
      this.enableTooltip();
      this.enablePluginDropdown();
    },

    enableSmoothScrollbar: function() {
      $('a[href*="#"]:not([href="#"])').click(function() {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
          if (target.length) {
            $('html,body').stop().animate({
              scrollTop: target.offset().top
            }, 300);
            return false;
          }
        }
      });
    },

    enableSidebarAffix: function() {
      var $sidebar = $('#sidebar');
      $sidebar.affix( {
        offset: {
          top: $sidebar.offset().top,
        },
      });
    },

    enableTooltip: function() {
      $('[data-toggle="tooltip"]').tooltip();
    },

    enablePluginDropdown: function() {
      var node = document.getElementById('plugin-dropdown');
      var NoResults = {
        view: function(vnode) {
          if( vnode.attrs.content.length == 0 ) 
          return m('span', 'No results to show');
          else
          return null;
        }
      };
      var Content = {
        view: function(vnode) {
          return m('div', [
            m('h4.mr-b-0', vnode.attrs.loaded.name),
            m('a', { href: vnode.attrs.loaded.url !== undefined ? vnode.attrs.loaded.url : '#' }, vnode.attrs.loaded.url !== undefined ? vnode.attrs.loaded.url : '' ),
            m('p.mr-t-20', vnode.attrs.loaded.description !== undefined ? vnode.attrs.loaded.description : ''), 
            m('h6', 'CSS Files'),
            m('pre.language-html', [
              m('code.language-html', [
                vnode.attrs.loaded.css.map(function(item) {
                  var content = '<link rel="stylesheet" href="' + item + '">\n';
                  var textarea = Prism.highlight( content, Prism.languages.html);
                  return m.trust(textarea);
                }),
                m(NoResults, { content: vnode.attrs.loaded.css } ),
              ]),
            ]),
            m('h6', 'JS Files'),
            m('pre.language-html', [
              m('code.language-html', [
                vnode.attrs.loaded.js.map(function(item) {
                  var content = '<script src="' + item + '"></script>\n';
                  var textarea = Prism.highlight( content, Prism.languages.html);
                  return m.trust(textarea);
                }),
                m(NoResults, { content: vnode.attrs.loaded.js }),
              ]),
            ]),
          ]);
        }
      };
      var Dropdown = {
        data: {
          list: [],
          loaded: {
            name: "",
            css: [],
            js: [],
          },
        },
        oninit: function(vnode) {
          var ctrl = this.ctrl(vnode);
          ctrl.getList();
        },
        view: function(vnode) {
          var ctrl = this.ctrl(vnode);
          return m('div', [
            m('select', { oninput: m.withAttr('value', ctrl.changeOption) }, vnode.state.data.list.map(function(item, index) {
              return m('option', { value: index }, item.name);
            })),
            m( Content, { loaded: vnode.state.data.loaded } ),
          ]);
        },
        ctrl: function(vnode) {
          return {
            getList: function() {
              m.request({
                url: "http://oscar.dharansh.in/documentation/assets/js/plugin-list.json",
                method: "GET"
              }).then(function(results) {
                vnode.state.data.list = results.plugins;
                vnode.state.data.loaded = vnode.state.data.list[0];
              });
            },

            changeOption: function(item) {
              vnode.state.data.loaded = vnode.state.data.list[item];
            },
          };
        },
      };


      m.mount(node, Dropdown);
    },
  }
  $(document).ready(function(){
    Custom.init();
  });
})(jQuery);
