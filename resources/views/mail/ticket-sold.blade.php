<x-mail::message>
    # Welcome {{$name}},

<x-mail::panel>
        Thank you for your purchase. Hope to see you soon. This is the information for your tickets
</x-mail::panel>

<x-mail::table>
    |Movie Title   |Date & Time   | QR Code|
    |---|---|---|
    @foreach ($tickets as $ticket)
    | {{$ticket->showing->movie->title}}   |{{$ticket->showing->formattedDate()}} @ {{$ticket->showing->formattedTime()}}   | <img src="{{(new chillerlan\QRCode\QRCode)->render(route('verify.ticket', $ticket->id))}}" alt="QR Code" /> |
    @endforeach
</x-mail::table>
</x-mail::message>