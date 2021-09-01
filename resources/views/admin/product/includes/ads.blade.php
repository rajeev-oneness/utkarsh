<div class="tile">
    <table class="table table-hover custom-data-table-style table-striped table-col-width" id="sampleTable">
        <tbody>
            <tr>
                <td>Author</td>
                <td>{{ $targetproduct->author }}</td>
            </tr>
            <tr>
                <td>Binding </td>
                <td>{{ empty($targetproduct->binding)? null:$targetproduct->binding }}</td>
            </tr>
            <tr>
                <td>Pages</td>
                <td>{{ empty($targetproduct->pages)? null:$targetproduct->pages }}</td>
            </tr>
            <tr>
                <td>Language</td>
                <td>{{ empty($targetproduct->language)? null:($targetproduct->language) }}</td>
            </tr>
            <tr>
                <td>ISBN No</td>
                <td>{{ empty($targetproduct->isbn_no)? null:$targetproduct->isbn_no }}</td>
            </tr>
            <tr>
                <td>Publish Year</td>
                <td>{{ empty($targetproduct->publish_year)? null:$targetproduct->publish_year }}</td>
            </tr>
            <tr>
                <td>Edition</td>
                <td>{{ empty($targetproduct->edition)? null:$targetproduct->edition }}</td>
            </tr>
            <tr>
                <td>Overview</td>
                <td>{!! empty($targetproduct->description)? null:$targetproduct->description !!}</td>
            </tr>
            <tr>
                <td>Keyword</td>
                <td>{{ empty($targetproduct->meta_key)? null:$targetproduct->meta_key }}</td>
            </tr>
            <tr>
                <td>Meta Description</td>
                <td>{{ empty($targetproduct->meta_description)? null:$targetproduct->meta_description }}</td>
            </tr>
        </tbody>
    </table>
</div>