function BasketCounter()
{
    var count = "<?php echo count($_SESSION['basket']);?>";
    document.getElementById('basketCounter').value = count;
}