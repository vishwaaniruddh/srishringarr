<?php
    $oldimgid=$_GET['oldimgid'];
?>
<table>
    <tr>
        <td>Product Image:</td>
        <td>
            <input type="file" id="image" name="image[]" > 
        <td>rank:</td>
        <td>
            <input type="text" id="rank" name="rank[]" > 
            <?php 
            if($oldimgid!="")
            { ?>
                <input type="hidden" name="oldimgid[]"  />
            <?php } ?>
        </td>
        <td>Choose color : </td>
        <td>
            <!--<form action="/action_page.php">-->
              <input type="color" id="color[]" name="color[]" value="#FFFFFF">
            <!--</form>-->
        </td>
    </tr>
</table>