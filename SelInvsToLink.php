<a href = "SelectedInvoicesTransactionsToLink.php?CustNo=1">SelectedInvoicesTransactionsToLink.php?CustNo=1</a>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Autocomplete - Combobox</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <style>
  .custom-combobox {
    position: relative;
    display: inline-block;
  }
  .custom-combobox-toggle {
    position: absolute;
    top: 0;
    bottom: 0;
    margin-left: -1px;
    padding: 0;
  }
  .custom-combobox-input {
    margin: 0;
    padding: 5px 10px;
  }
  </style>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
  <script>
  $( function() {
    $.widget( "custom.combobox", {
      _create: function() {
        this.wrapper = $( "<span>" )
          .addClass( "custom-combobox" )
          .insertAfter( this.element );
 
        this.element.hide();
        this._createAutocomplete();
        this._createShowAllButton();
      },
 
      _createAutocomplete: function() {
        var selected = this.element.children( ":selected" ),
          value = selected.val() ? selected.text() : "";
 
        this.input = $( "<input>" )
          .appendTo( this.wrapper )
          .val( value )
          .attr( "title", "" )
          .addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left" )
          .autocomplete({
            delay: 0,
            minLength: 0,
            source: this._source.bind( this )
          })
          .tooltip({
            classes: {
              "ui-tooltip": "ui-state-highlight"
            }
          });
 
        this._on( this.input, {
          autocompleteselect: function( event, ui ) {
            ui.item.option.selected = true;
            this._trigger( "select", event, {
              item: ui.item.option
            });
          },
 
          autocompletechange: "_removeIfInvalid"
        });
      },
 
      _createShowAllButton: function() {
        var input = this.input,
          wasOpen = false;
 
        $( "<a>" )
          .attr( "tabIndex", -1 )
          .attr( "title", "Show All Items" )
          .tooltip()
          .appendTo( this.wrapper )
          .button({
            icons: {
              primary: "ui-icon-triangle-1-s"
            },
            text: false
          })
          .removeClass( "ui-corner-all" )
          .addClass( "custom-combobox-toggle ui-corner-right" )
          .on( "mousedown", function() {
            wasOpen = input.autocomplete( "widget" ).is( ":visible" );
          })
          .on( "click", function() {
            input.trigger( "focus" );
 
            // Close if already visible
            if ( wasOpen ) {
              return;
            }
 
            // Pass empty string as value to search for, displaying all results
            input.autocomplete( "search", "" );
          });
      },
 
      _source: function( request, response ) {
        var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
        response( this.element.children( "option" ).map(function() {
          var text = $( this ).text();
          if ( this.value && ( !request.term || matcher.test(text) ) )
            return {
              label: text,
              value: text,
              option: this
            };
        }) );
      },
 
      _removeIfInvalid: function( event, ui ) {
 
        // Selected an item, nothing to do
        if ( ui.item ) {
          return;
        }
 
        // Search for a match (case-insensitive)
        var value = this.input.val(),
          valueLowerCase = value.toLowerCase(),
          valid = false;
        this.element.children( "option" ).each(function() {
          if ( $( this ).text().toLowerCase() === valueLowerCase ) {
            this.selected = valid = true;
            return false;
          }
        });
 
        // Found a match, nothing to do
        if ( valid ) {
          return;
        }
		
		//**KARl i added this code 
       if ( invalid ) {
          return;
        }
 
      /* */ // Remove invalid value
        this.input
          .val( "" )
          .attr( "title", value + " didn't match any item" )
          .tooltip( "open" );
        this.element.val( "" );
        this._delay(function() {
          this.input.tooltip( "close" ).attr( "title", "" );
        }, 2500 );
        this.input.autocomplete( "instance" ).term = "";
      },
 
      _destroy: function() {
      //  this.wrapper.remove();
       // this.element.show();
      }
	  
    });
 
    $( "#combobox" ).combobox();
    $( "#toggle" ).on( "click", function() {
      $( "#combobox" ).toggle();
    });
  } );
  </script>
</head>
<body>
<?php
$CustNo = "1";
$CustNo = $_GET['CustNo'];


	$InvContent= file("LinkingInvoices$CustNo.txt");
//echo "<br><br>";
//echo $InvContent[1];
//echo "<br><br>";
//$lines = explode($InvContent,'\n');//load string into array
$InvSecondLine = $InvContent[1]; ///reads 2nd line of file
//echo "<br><br>InvSecondLine: ";
//echo $InvSecondLine;
//echo "<br><br>";

//$Invarray = explode('NEXT', $InvSecondLine);//load string into Invarray
//$Invarray = array_pop($InvarrayM);  
//$Invarray = unset($InvarrayM[count($InvarrayM)-1];  

$Invarray = explode('NEXT', $InvSecondLine);//load string into array
$Invarray2 = array_pop($Invarray);  //this is so weird! it works even though it does not make any sense.




if (end($Invarray) == "") { 
    array_pop($Invarray); 
}
//echo '<pre>'; print_r($Invarray); echo '</pre>';
//echo '<br>a0:';
//echo $Invarray[0];
// echo 'end</br>';
//echo '<br>b'; 
//echo $Invarray[1]; echo '</br>';
//echo '<br>'; echo $Invarray[2] ; echo '</br>';



?>
<table>
<tr>
<td>
 Payment: <input type="text" id="TransNo" name="TransNo" >
 </td>
 <td>
<div class="ui-widget">
  <label>Choose related payment for this invoice:  </label>
  <select id="combobox">
    <option value="Select one...">Select one...</option>
		<?php	for($i=0;$i<(count($Invarray));$i++){
echo "<option value='".$Invarray[$i]."'>InvNo ".$Invarray[$i]."</option>"; } ?></option>
  </select>
</div>
<button id="toggle" hidden>Show underlying select</button>
 
 </td>
 </tr>
 </table>
</body>
</html>