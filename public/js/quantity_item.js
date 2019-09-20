function incrementValue(price)
{
    var value = parseInt(document.getElementById('quantity_pole').value);
    value++;
    document.getElementById('quantity_pole').value = value;
    price = price*value;
    document.getElementById('price').value = price;
}
function decrementValue(price)
{
    var value = parseInt(document.getElementById('quantity_pole').value);
    if (value>1)
    {
        value --;
        document.getElementById('quantity_pole').value = value;
        price = price*value;
        document.getElementById('price').value = price;
    }
}