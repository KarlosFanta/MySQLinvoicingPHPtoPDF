<html>
<head>
    <!--Updated: Added new version of jQueryUI CDN.-->
    <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <style>
        p, div, input {
            font: 16px Calibri;
        }
        .ui-autocomplete { 
            cursor:pointer; 
            height:120px; 
            overflow-y:scroll;
        }    
    </style>
</head>
<body>
    <p>Setting focus in the below box will automatically show the dropdown list. <br /> Start type in the value to search for values!</p>

    <div>
        <input type="text" id="tbCountries" />
    </div>
</body>

<script>
    $(document).ready(function() {
        BindControls();
    });

    function BindControls() {
        var Countries = ['ARGENTINA', 
            'AUSTRALIA', 
            'BRAZIL', 
            'BELARUS', 
            'BHUTAN',
            'CHILE', 
            'CAMBODIA', 
            'CANADA', 
            'DENMARK', 
            'DOMINICA',
            'INDIA'];

        $('#tbCountries').autocomplete({
            source: Countries,
            minLength: 0,
            scroll: true
        }).mouseover(function() {
            $(this).autocomplete("search", "");
        });
    }
</script>
</html>