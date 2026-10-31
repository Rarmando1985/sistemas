<html>

<script>
function calcular() {
    mont=eval(document.getElementById('monto').value);
    plaz1=eval(document.getElementById('plazo').value);
    tas=eval(document.getElementById('tasa').value);
    plaz= plaz1/12;
    tas1=(tas+0.0044)/100;
    tiv = mont + plaz+ tas;
    tot = (mont*(tas1/12)*(1+tas1/12)**(plaz*12))/((1+tas1/12)**(plaz*12)-1);

    document.getElementById('total').value=tot;
}
</script>

<body>
<input type="text" id="monto" value="0" onkeyup="calcular()" />
<select id="plazo" >
<option>6</option>
<option>12</option>
<option>18</option>
<option>24</option>
<option>30</option>
<option>36</option>
<option>42</option>
<option>48</option>
<option>54</option>
<option>60</option>
</select>
<input type="text" id="tasa" value="0" onkeyup="calcular()" />
<input type="text" id="total" disabled="disabled" />


</body>
</html>
