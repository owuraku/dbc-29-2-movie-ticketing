<x-mail::message>
# Introduction

The body of your message.
<x-mail::panel>
    {{$name}}
</x-mail::panel>
<x-mail::table>
    |  ID |Movie Title   |Date & Time   |
    |---|---|---|
    |   |   |   |

</x-mail::table>


<x-mail::button :url="'https://google.com'" color="error">
Click Here
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
