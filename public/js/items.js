$(document).ready(function() {

    $('#slider-size, #slider-factor').change(function() {

        var ItemID = $("#item-id").text();
        var Size   = $('#slider-size').val();
        var Factor = $('#slider-factor').val();

        CalcItem(ItemID, Size, Factor);
    });

    $('#slider-bolus').change(function() {

        var ItemID = $("#item-id").text();
        var Carbs  = $("#item-carbs").text();
        var Factor = $('#slider-factor').val();
        var Bolus  = $('#slider-bolus').val();
        var Size   = ((Bolus * 10) / (Carbs / 100 * Factor)).toFixed(0);

        CalcItem(ItemID, Size, Factor);
    });

    $('#slider-size').on('input', function() {
        UpdateLabel('#slider-value-size', $(this).val());
    });

    $('#slider-factor').on('input', function() {
        UpdateLabel('#slider-value-factor', $(this).val());
    });

    $('#slider-bolus').on('input', function() {
        UpdateLabel('#slider-value-bolus', $(this).val());
    });
});

function ClosePreviosItem() {
  if ($('#item-titles-container').find(".Open").length) {
    $('.item-selection').removeClass('Open');
    $('.item-selection').removeClass('MediumFont');
    $('.item-selection .item-icon[src*="down.svg"]').attr('src', '../icons/right.svg');
  } 
  $('#item-container').css("display", "none");
}

function openItem(ItemID) {

  var SelectionID = '#selection-id-' + ItemID;
  var FactorValue = $("#slider-factor").val();
  var ItemContainer = '#item-container';

  console.log('Open ' + SelectionID);

  ClosePreviosItem();
  ScrollToTop(SelectionID);

  $(ItemContainer).insertAfter(SelectionID);
  $(SelectionID).addClass('MediumFont');
  $(SelectionID).addClass('Open');
  $(SelectionID).find(".item-icon").attr("src", "../icons/down.svg");

  $(ItemContainer).css("display", "block");
  $('#slider-size').val(100);

  GetItemData(ItemID, function(ItemData) {

    var ItemCarbs = ItemData.Carbs;

    $('#item-id').text(ItemID);
    $('#item-carbs').text(ItemCarbs);
    $("#item-box-third").empty();

    CalcItem(ItemID, 100, FactorValue);

    $("#item-box-third").append("<p class='NutritionalValuesTitle'>Berechne</p>");

    GetServingData(ItemID, function(ServingData) {

      var ServingID    = ServingData.ID;
      var ServingTxtID = 'Serving' + ServingID;
      var ServingName  = ServingData.ServingName;
      var ServingSize  = ServingData.ServingSize;

      var ServingLink  = "<p id='Serving" + ServingTxtID + "' class='ServingLink' ";
      ServingLink     += "onclick='CalcItem(" + ItemID + "," + ServingSize + "," + FactorValue + ")';>";
      ServingLink     += ServingName;
      ServingLink     += "</p>";

      $("#item-box-third").append(ServingLink);

    });
    
  });
}

function CalcItem(ItemID, Size, Factor) {

  GetItemData(ItemID, function(ItemData) {

    var ItemCarbs     = ItemData.Carbs;
    var ItemSugar     = ItemData.Sugar;
    var ItemFibers    = ItemData.Fibers;
    var ItemFat       = ItemData.Fat;
    var Unit          = ItemData.Unit;
    var CalcCarbs     = (Size / 100 * ItemCarbs).toFixed(0);
    var CalcSugar     = (Size / 100 * ItemSugar).toFixed(0);
    var CalcFibers    = (Size / 100 * ItemFibers).toFixed(0);
    var CalcFat       = (Size / 100 * ItemFat).toFixed(0);
    var OutputUnits   = 'g/' + Size + Unit;
    var SliderFactor  = $("#slider-factor").val();
    var CalcBolus     = CalcCarbs / 10 * SliderFactor;
    var RoundedBolus  = Math.round(CalcBolus * 10) / 10;

    $("#item-box-second").empty();
    $("#item-box-second").append("<p class='PaddingTopSmall'>" + CalcCarbs + OutputUnits + "</p>");
    $("#item-box-second").append("<p>" + CalcSugar + OutputUnits + "</p>");
    $("#item-box-second").append("<p>" + CalcFibers + OutputUnits + "</p>");
    $("#item-box-second").append("<p>" + CalcFat + OutputUnits + "</p>");

    $('#slider-size').val(Size);
    $('#slider-bolus').val(RoundedBolus);

    UpdateLabel('#slider-value-size', Size);
    UpdateLabel('#slider-value-bolus', RoundedBolus);

  });
}

function fetchData(Endpoint, ItemID, callback) {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var responseData = JSON.parse(this.responseText);
      callback(responseData);
    }
  };

  var BaseUrl = window.location.hostname === 'localhost' ? 'http://localhost:8000' : 'https://www.carbs.ch';
  var URL     = BaseUrl + Endpoint + "?id=" + ItemID;

  xmlhttp.open("GET", URL, true);
  xmlhttp.send();
}

function GetItemData(ItemID, callback) {
  fetchData("/AjaxFoodItems", ItemID, callback);
  console.log('Item data for item ' + ItemID);
}

function GetServingData(ItemID, callback) {
  fetchData("/AjaxFoodServings", ItemID, function(ArrayServingData) {
    for (var i = 0; i < ArrayServingData.length; i++) {
      callback(ArrayServingData[i]);
    }
  });
  console.log('Serving data for item ' + ItemID);
}

function UpdateLabel(ID, Value) {
  $(ID).text(Value);
}

function ScrollToTop(Div) {
  $([document.documentElement, document.body]).animate({
    scrollTop: $(Div).offset().top - 50
  }, 700);
}