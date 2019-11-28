$(function () {
    
    $('#rango_costo').ionRangeSlider({
      min     : 10000,
      max     : 200000,
      from    : 10000,
      type    : 'double',
      step    : 1000,
      postfix : '$',
      prettify: false,
      hasGrid : true
    })

    $('#rango_capacidad').ionRangeSlider({
        min     : 10,
        max     : 1000,
        from    : 0,
        type    : 'double',
        step    : 10,
        postfix : 'Personas',
        prettify: false,
        hasGrid : true
      })

  })