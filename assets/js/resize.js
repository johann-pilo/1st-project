/*
supported unit
1. pixel
2. percent
3. cm
4. inch
5. mm
*/

var unit = ["pixel", "cm", "inch", "mm"];
var unitMultiplier = [1.0, 0.0254, 0.010, 0.254];


var height = document.getElementById('imgHeight').value;
var width = document.getElementById('imgWidth').value;
var dpi = document.getElementById('dpi').value/100.0;

//alert("OK" + height);
function setImgDimention(x, y) {
    height = x;
    width = y;
}

function getUnitMultiplier(){
    //alert(name);
    ind = unit.indexOf($('#unit').val());
    if($('#unit').val() != "pixel") return unitMultiplier[ind] / dpi;
    else return unitMultiplier[ind];
}
    

function getRelativeWidth(h){
  return ( ((h*1.0)/height) * width ).toFixed(2);;
}

function getRelativeHeight(w){
  return ( ((w*1.0)/width) * height).toFixed(2);;
}

function resetByUnit(){
    if($('#unit').val() == "percent"){
          $("#imgHeight").val(100.0);
          $("#imgWidth").val(100.0);
    }
    else{
          $("#imgHeight").val((height * getUnitMultiplier()).toFixed(2));
          $("#imgWidth").val((width * getUnitMultiplier()).toFixed(2));
    }
}

$(document).ready(function(){
  dpi = document.getElementById('dpi').value/100.0;

  // ratio changed
  $('#ratio').change(function() {
    if($('#ratio').is(":checked")){
      resetByUnit();
    }
  });

  $('#dpi').change(function() {
      dpi = $("#dpi").val()/100.0; // all calculation with respect to 100dpi
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
        h = Math.floor(percent * height);
        w = Math.floor(percent * width);
        $("#imgHeight").val( h );
        $("#imgWidth").val( w );
    }
    else{
        tmpHeight = Math.floor($("#imgHeight").val() / getUnitMultiplier());
        tmpWidth = Math.floor($("#imgWidth").val() / getUnitMultiplier());

        $("#imgHeight").val(tmpHeight);
        $("#imgWidth").val(tmpWidth);
        if($("#imgHeight").val() > 3000 || $("#imgWidth").val() > 3000){
            $("#imgHeight").val(height);
            $("#imgWidth").val(width);
        }
    }
  });
});
