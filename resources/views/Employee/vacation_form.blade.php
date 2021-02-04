
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
        $('.datepicker').datepicker({
            autoclose: true
        });
        $('.end-date').datepicker({
            autoclose: true
        });
    </script>
    <style>
        table, td, tr, th { border: 1px solid black}
        td, tr, th {width: 500px; text-align: center}
    </style>

    <div class="p-6 bg-white border-b border-gray-200">
        <p>Vacation days left this year: {{ $days }}</p>
    </div>
    <form action="{{ route('employeeVacationRequest') }}" method="POST" accept-charset="UTF-8">
        @csrf
        <div class="p-6 bg-white border-b border-gray-200">
            <label for="start_date">Start date:</label><br>
            <input type="text" id="startDate" class="datepicker" name="startDate" value="{{ old('startDate') }}">
            @error('startDate')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="p-6 bg-white border-b border-gray-200">
            <label for="endDate">End date:</label><br>
            <input type="text" id="endDate" class="datepicker" name="endDate" value="{{ old('endDate') }}">
            @error('endDate')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
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
                    <td>{{ $request->start_date }}</td>
                    <td>{{ $request->end_date }}</td>
                    <td>{{ $request->status }}</td>
                </tr>
            @empty

            @endforelse
        </table>

    </div>
