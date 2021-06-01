@component('mail::message')
    <p>{{ $question->answer }}</p>
    <br><br>
    <hr>
    <p>We hope we were able to answer your question. You asked us:</p>
    <br><br>
    <p><i>"{{ $question->question }}"</i></p>
@endcomponent
