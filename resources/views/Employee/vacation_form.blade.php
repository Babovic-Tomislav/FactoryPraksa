@extends('.dashboard')
@section('header')
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $( ".datepicker" ).datepicker({
                changeMonth: true,
                changeYear: true
            });
        } );
    </script>
    <style>
        table, td, tr, th { border: 1px solid black}
        td, tr, th {width: 500px; text-align: center}
    </style>
@endsection
@section('body')
    <div class="p-6 bg-white border-b border-gray-200">
        <p>Vacation days left this year: {{ $days }}</p>
    </div>
    <form action="/employee" method="POST">
        {{ csrf_field() }}
        <div class="p-6 bg-white border-b border-gray-200">
            <label for="start_date">Start date:</label><br>
            <input type="text" id="start_date" class="datepicker" name="start_date">
        </div>

        <div class="p-6 bg-white border-b border-gray-200">
            <label for="end_date">End date:</label><br>
            <input type="text" id="end_date" class="datepicker" name="end_date">
        </div>

        <div class="p-6 bg-white border-b border-gray-200">
            <input type="submit" id="submit" name="submit" value="Send">
        </div>
    </form>
    <br><br>
    <div class="p-6 bg-white border-b border-gray-200">
        <table >
            <tr >
                <th>Start date</th>
                <th>End date</th>
                <th>Status</th>
            </tr>
            @forelse($vacationRequests as $request)
                <tr>
                    <td>{{ $request->start_date }}aaaaaaaaaa</td>
                    <td>{{ $request->end_date }}</td>
                    <td>{{ $request->status }}</td>
                </tr>
            @empty

            @endforelse
        </table>

    </div>

@endsection