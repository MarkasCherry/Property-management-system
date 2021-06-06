@component('mail::message')
    <h1>STATISTICS OF LAST WEEK</h1>
    <hr>
    <p>New clients: <b>{{ $statistic->new_clients_count }}</b></p>
    <p>New bookings: <b>{{ $statistic->bookings_count }}</b></p>
    <p>Total income: <b>{{ $statistic->total_income }}</b></p>
@endcomponent
