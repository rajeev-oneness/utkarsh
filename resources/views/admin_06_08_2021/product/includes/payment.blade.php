<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <table class="table table-hover custom-data-table-style table-striped" id="sampleTable2">
                    <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>User Name</th>
                            <th>Rating</th>
                            <th>Review Title</th>
                            <th>Review</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $slno=0; @endphp
                        @foreach($reviews as $reviews)
                            <tr>
                                <td>{{ $slno }}</td>
                                <td>{{ $reviews->name }}</td>
                                <td>{{ $reviews->rating }}</td>
                                <td>{{ $reviews->title }}</td>
                                <td>{{ $reviews->review }}</td>
                            </tr>
                            @php $slno ++; @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script type="text/javascript">$('#sampleTable2').DataTable({"ordering": false});</script>
@endpush