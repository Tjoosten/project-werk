@component('mail::message')
#### Iemand heeft contact opgenomen doormiddle van het contact formulier.

{{ $input['bericht'] }}

Met vriendelijke groet,<br>
{{ $input['email'] }}
@endcomponent
