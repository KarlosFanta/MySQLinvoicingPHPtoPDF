<html >
<head id="Head1">
    <title></title>

    <script type="text/javascript"
            src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>

    <script type="text/javascript">
     /*   $(function()
        {
            // Prevent accidental navigation away
            $(':input').bind(
                'change', function() { setConfirmUnload(true); });
            $('.noprompt-required').click(
                function() { setConfirmUnload(false); });

            function setConfirmUnload(on)
            {
                window.onbeforeunload = on ? unloadMessage : null;
            }
            function unloadMessage()
            {
                return ('You have entered new data on this page. ' +
                        'If you navigate away from this page without ' +
                        'first saving your data, the changes will be lost.');
            }

            window.onerror = UnspecifiedErrorHandler;
            function UnspecifiedErrorHandler()
            {
                return true;
            }

        });
*/
  window.onbeforeunload = function() {
    return "You have attempted to leave this page. "
           + "If you have made any changes to the fields without "
           + "clicking the Save button, your changes will be lost. "
           + "Are you sure you want to exit this page?";
};

window.onunload = function() {
    // Ending up here means that the user chose to leave
    try {
        JQObj.ajax({
            type: "POST",
            url: "http://your.url.goes/here",
            success: function() {}
        });
    } catch(ignored) {}
    console.log("AJAX request sent ! You can leave now...");
};

document.getElementById("id1")
        .addEventListener("click", function(evt) {
    location.href = location.href;
});

  </script>

</head>
<body>
    <form id="form1" name="myForm" runat="server">
    <div>
	<h3 id="id1"><a href="#">Please, don't leave me !</a></h3>
<div class="footnote">
    (If you open the console, you will get feedback
     on when the AJAX request is actually sent.)
</div>

	<textarea name="TextBox1" id="TextBox1"  style='white-space:pre-wrap;font-family:arial;font-size: 10pt'  rows="<?php echo $rowsE; ?>" cols="110" onkeypress="changeTest(this.form)"><?php echo $item1b; ?></textarea>
         <br />
        Last Name :<asp:TextBox ID="TextBox2" runat="server"></asp:TextBox><br />
        <br />
        IsMarried :<asp:CheckBox ID="CheckBox1" runat="server" /><br />
        <br />
        <asp:Button runat="server" ID="TestButton" Text="Submit" CssClass="noprompt-required" /><br />
        <br />
        <br />
        <br />
        <br />
        <asp:Button runat="server" ID="AnotherPostbackButton" Text="AnotherPostbackButton"
             /><br />
        <br />
        <asp:CheckBox runat="server" ID="CheckboxWhichCausePostback" Text="CheckboxWhichCausePostback"
            AutoPostBack="true" /><br />
        <br />
        DropdownWhichCausePostback<asp:DropDownList runat="server" ID="DropdownWhichCausePostback"
            AutoPostBack="true">
            <asp:ListItem Text="Text1"></asp:ListItem>
            <asp:ListItem Text="Text2"></asp:ListItem>
        </asp:DropDownList>
        <br />
        <br />
    </div>
    </form>
</body>
