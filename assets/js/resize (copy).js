/*
supported unit
1. pixel
2. percent
3. cm
4. inch
5. mm
*/

var unit = ["pixel", "cm", "inch", "mm"];
var unitMultiplier = [1.0, 0.026458333, 0.010416667, 0.264583333];


var height = document.getElementById('imgHeight').value;
var width = document.getElementById('imgWidth').value;

//alert("OK" + height);
function setImgDimention(x, y) {
    height = x;
    width = y;
}

function getUnitMultiplier(){
    //alert(name);
    ind = unit.indexOf($('#unit').val());
    //alert(unitMultiplier[ind]);
    return unitMultiplier[ind];
}

function getRelativeWidth(h){
  return Math.floor( ((h*1.0)/height) * width );
}

function getRelativeHeight(w){
  return Math.floor( ((w*1.0)/width) * height);
}

function resetByUnit(){
    if($('#unit').val() == "percent"){
          $("#imgHeight").val(100.0);
          $("#imgWidth").val(100.0);
    }
    else{
          $("#imgHeight").val(height * getUnitMultiplier());
          $("#imgWidth").val(width * getUnitMultiplier());
    }
}

$(document).ready(function(){
  // ratio changed
  $('#ratio').change(function() {

    if($('#ratio').is(":checked")){
      resetByUnit();
    }
  });
  // unit change
  $('#unit').change(function() {
    resetByUnit();
  });

/*
  $('.number').keypress(function(event) {
    if ((event.which < 48 || event.which > 57) && event.which != 8) {
      event.preventDefault();
    }
  }); */
  // height change
  $("#imgHeight" ).on('keyup keydown', function() {
    if($('#ratio').is(":checked")){
        if($('#unit').val() == "percent"){
            $("#imgWidth").val($("#imgHeight").val())
        }
        else{
            $("#imgWidth").val(getRelativeWidth( $("#imgHeight").val() ));
        }
    }
  });
  // height change
  $("#imgWidth" ).on('keyup keydown', function() {

    if($('#ratio').is(":checked")){
      if($('#unit').val() == "percent"){
          $("#imgHeight").val( $("#imgWidth").val() );
      }
      else{
          $("#imgHeight").val(getRelativeHeight( $("#imgWidth").val() ));
      }

    }
  });

  // on button click convert everything into pixel
  $( "#resizeButton" ).click(function() {
    if($('#unit').val() == "percent"){
        percent = $("#imgHeight").val() / 100.0;
        h = Math.round(percent * height);
        w = Math.round(percent * width);
        $("#imgHeight").val( h );
        $("#imgWidth").val( w );
    }
    else{
        $("#imgHeight").val( Math.round($("#imgHeight").val() / getUnitMultiplier()));
        $("#imgWidth").val( Math.round($("#imgWidth").val() / getUnitMultiplier()));
        if($("#imgHeight").val() > 3000 || $("#imgWidth").val() > 3000){
            $("#imgHeight").val(height);
            $("#imgWidth").val(width);
        }
    }
  });
});
