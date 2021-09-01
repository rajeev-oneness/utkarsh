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
                <td>Code</td>
                <td>{{ empty($targetproduct->code)? null:$targetproduct->code }}</td>
            </tr>
            <tr>
                <td>Price</td>
                <td>{{ empty($targetproduct->price)? null:($targetproduct->price) }}</td>
            </tr>
            <tr>
                <td>Offered Price</td>
                <td>{{ empty($targetproduct->offered_price)? null:$targetproduct->offered_price }}</td>
            </tr>
            <tr>
                <td>GST Rate</td>
                <td>{{ empty($targetproduct->gst)? null:$targetproduct->gst }}</td>
            </tr>
            <tr>
                <td>Weight</td>
                <td>{{ empty($targetproduct->weight)? null:$targetproduct->weight }}</td>
            </tr>
            <tr>
                <td>Views</td>
                <td>{{ empty($targetproduct->views)? null:$targetproduct->views }}</td>
            </tr>
        </tbody>
    </table>
</div>