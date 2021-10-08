<div class="tile">
    <table class="table table-hover custom-data-table-style table-striped table-col-width" id="sampleTable">
        <tbody>
            <tr>
                <td>Title</td>
                <td>{{ $targetproduct->name }}</td>
            </tr>
            <tr>
                <td>Brand</td>
                <td>{{ empty($targetproduct->brand)? null:$targetproduct->brand }}</td>
            </tr>
            <tr>
                <td>Sku Code</td>
                <td>{{ empty($targetproduct->code)? null:$targetproduct->code }}</td>
            </tr>
            <tr>
                <td>HSN Code</td>
                <td>{{ empty($targetproduct->hsn)? null:$targetproduct->hsn }}</td>
            </tr>
            <tr>
                <td>Price</td>
                <td>{{ empty($targetproduct->inprice)? null:($targetproduct->inprice) }}</td>
            </tr>
            <tr>
                <td>Offered Price</td>
                <td>{{ empty($targetproduct->inoffered_price)? null:$targetproduct->inoffered_price }}</td>
            </tr>
            <tr>
                <td>GST Rate</td>
                <td>{{ empty($targetproduct->gst)? null:$targetproduct->gst }}</td>
            </tr>
            
        </tbody>
    </table>
</div>