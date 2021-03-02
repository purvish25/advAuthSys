/**
 * bootstrap-colorpalette.js
 * (c) 2013~ Jiung Kang
 * Licensed under the Apache License, Version 2.0 (the "License");
 */

(function($) {
  "use strict";
  var aaColor = [
  ['#000000','#0C090A','#2C3539','#2B1B17','#34282C','#253803C','#3B3131','#413839','#3D3C3A','#463E3F','#4C4646','#504A4B','#565051'],
['#5C5858','#625D5D','#666362','#6D6968','#726E6D','#736F6E','#837E7C','#848482','#B6B6B4','#D1D0CE','#E5E4E2','#BCC6CC','#98AFC7'],
['#6D7B8D','#657383','#616D7E','#646D7E','#566D7E','#737CA1','#4863A0','#2B547E','#2B3856','#151B54','#000080','#342D7E','#15317E'],
['#151B8D','#0000A0','#0020C2','#0041C2','#2554C7','#1569C7','#2B60DE','#1F45FC','#6960EC','#736AFF','#357EC7','#368BC1','#488AC7'],
['#3090C7','#659EC7','#87AFC7','#95B9C7','#728FCE','#2B65EC','#306EFF','#157DEC','#1589FF','#6495ED','#6698FF','#38ACEC','#56A5EC'],
['#5CB3FF','#3BB9FF','#79BAEC','#82CAFA','#82CAFF','#A0CFEC','#B7CEEC','#B4CFEC','#C2DFFF','#C6DEFF','#AFDCEC','#ADDFFF','#BDEDFF'],
['#CFECEC','#E0FFFF','#EBF4FA','#F0F8FF','#F0FFFF','#CCFFFF','#93FFE8','#9AFEFF','#7FFFD4','#00FFFF','#7DFDFE','#57FEFF','#8EEBEC'],
['#50EBEC','#4EE2EC','#81D8D0','#92C7C7','#77BFC7','#78C7C7','#48CCCD','#43C6DB','#46C7C7','#7BCCB5','#43BFC7','#3EA99F','#3B9C9C'],
['#438D80','#348781','#307D7E','#5E7D7E','#4C787E','#008080','#4E8975','#78866B','#848b79','#617C58','#728C00','#667C26','#254117'],
['#306754','#347235','#437C17','#387C44','#347C2C','#347C17','#348017','#4E9258','#6AA121','#4AA02C','#41A317','#3EA055','#6CBB3C'],
['#E238EC','#C38EC7','#C8A2C8','#E6A9EC','#E0B0FF','#C6AEC7','#F9B7FF','#D2B9D3','#E9CFEC','#EBDDE2','#E3E4FA','#FDEEF4','#FFF5EE','#FEFCFF','#FFFFFF']];

  var createPaletteElement = function(element, _aaColor) {
    element.addClass('bootstrap-colorpalette');
    var aHTML = [];
    $.each(_aaColor, function(i, aColor){
      aHTML.push('<div>');
      $.each(aColor, function(i, sColor) {
        var sButton = ['<button type="button" class="btn-color" style="background-color:', sColor,
          '" data-value="', sColor,
          '" title="', sColor,
          '"></button>'].join('');
        aHTML.push(sButton);
      });
      aHTML.push('</div>');
    });
    element.html(aHTML.join(''));
  };

  var attachEvent = function(palette) {
    palette.element.on('click', function(e) {
      var welTarget = $(e.target),
          welBtn = welTarget.closest('.btn-color');

      if (!welBtn[0]) { return; }

      var value = welBtn.attr('data-value');
      palette.value = value;
      palette.element.trigger({
        type: 'selectColor',
        color: value,
        element: palette.element
      });
    });
  };

  var Palette = function(element, options) {
    this.element = element;
    createPaletteElement(element, options && options.colors || aaColor);
    attachEvent(this);
  };

  $.fn.extend({
    colorPalette : function(options) {
      this.each(function () {
        var $this = $(this),
            data = $this.data('colorpalette');
        if (!data) {
          $this.data('colorpalette', new Palette($this, options));
        }
      });
      return this;
    }
  });
})(jQuery);
