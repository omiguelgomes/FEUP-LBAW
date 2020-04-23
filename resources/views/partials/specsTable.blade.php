<table class="table">
    <tbody>
         <tr>
            <td colspan ="2">Screen size</td>
            <td colspan ="2">
            {{$product->screensize->value}}"
            </td>
        </tr>
        <tr>
            <td colspan ="2">Screen resolution</td>
            <td colspan ="2">
            {{$product->screenres->value}} pixels
            </td>
        </tr>
        <tr>
            <td colspan ="2">OS</td>
            <td colspan ="2">
            {{$product->os->name}}
            </td>
        </tr>
        <tr>
            <td colspan ="2">RAM</td>
            <td colspan ="2">
            {{$product->ram->value}}GB 
            </td>
        </tr>
        <tr>
            <td colspan ="2">Weight</td>
            <td colspan ="2">
            {{$product->weight->value}}g
            </td>
        </tr>
        <tr>
            <td colspan ="2">CPU</td>
            <td colspan ="2">
                {{$product->cpu->cores}}-core 
                {{$product->cpu->freq}} GHz
                {{$product->cpu->name}}
            </td>
        </tr>
         <tr>
            <td colspan ="2">GPU</td>
            <td colspan ="2">
            {{$product->gpu->name}}
            </td>
        </tr>
       <tr>
            <td colspan ="2">Water resistance rating</td>
            <td colspan ="2">
            {{$product->waterproofing->value}}
            </td>
        </tr>
        <tr>
            <td colspan ="2">Camera resolution</td>
            <td colspan ="2">
            {{$product->camerares->value}}MP
            </td>
        </tr>
        <tr>
            <td colspan ="2">Fingerprint Type</td>
            <td colspan ="2">
            {{$product->fingerprinttype->value}}
            </td>
        </tr>
        <tr>
            <td colspan ="2">Storage</td>
            <td colspan ="2">
            {{$product->storage->value}}GB
            </td>
        </tr>
        <tr>
            <td colspan ="2">Battery</td>
            <td colspan ="2">
            {{$product->battery->value}}mAh
            </td>
        </tr>
    </tbody>
</table>
