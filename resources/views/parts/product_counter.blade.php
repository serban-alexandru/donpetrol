<style>
form #input-wrap {
margin: 0px;
padding: 0px;
}

input#numberx{{$product->id}}, input#number{{$product->id}}, input#numberpota{{$product->id}}, input#numbermayo{{$product->id}} {
text-align: center;
border: none;
border-top: 1px solid #ddd;
border-bottom: 1px solid #ddd;
margin: 0px;
width: 40px;
height: 40px;
}

input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
</style>
<script>
function increaseValue{{$product->id}}() {
var value = parseInt(document.getElementById('number{{$product->id}}').value, 10);
value = isNaN(value) ? 0 : value;
value++;
document.getElementById('number{{$product->id}}').value = value;
}

function decreaseValue{{$product->id}}() {
var value = parseInt(document.getElementById('number{{$product->id}}').value, 10);
value = isNaN(value) ? 0 : value;
value < 1 ? value = 1 : '';
value--;
document.getElementById('number{{$product->id}}').value = value;
}

function increaseValuex{{$product->id}}() {
var value = parseInt(document.getElementById('numberx{{$product->id}}').value, 10);
value = isNaN(value) ? 0 : value;
value++;
document.getElementById('numberx{{$product->id}}').value = value;
}

function decreaseValuex{{$product->id}}() {
var value = parseInt(document.getElementById('numberx{{$product->id}}').value, 10);
value = isNaN(value) ? 0 : value;
value < 1 ? value = 1 : '';
value--;
document.getElementById('numberx{{$product->id}}').value = value;
}

// potatoes script
function increaseValuepota{{$product->id}}() {
var value = parseInt(document.getElementById('numberpota{{$product->id}}').value, 10);
value = isNaN(value) ? 0 : value;
value++;
document.getElementById('numberpota{{$product->id}}').value = value;
}

function decreaseValuepota{{$product->id}}() {
var value = parseInt(document.getElementById('numberpota{{$product->id}}').value, 10);
value = isNaN(value) ? 0 : value;
value < 1 ? value = 1 : '';
value--;
document.getElementById('numberpota{{$product->id}}').value = value;
}

// mayo script
function increaseValuemayo{{$product->id}}() {
var value = parseInt(document.getElementById('numbermayo{{$product->id}}').value, 10);
value = isNaN(value) ? 0 : value;
value++;
document.getElementById('numbermayo{{$product->id}}').value = value;
}

function decreaseValuemayo{{$product->id}}() {
var value = parseInt(document.getElementById('numbermayo{{$product->id}}').value, 10);
value = isNaN(value) ? 0 : value;
value < 1 ? value = 1 : '';
value--;
document.getElementById('numbermayo{{$product->id}}').value = value;
}
</script>