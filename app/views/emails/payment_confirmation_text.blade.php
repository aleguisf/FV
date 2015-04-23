{{ $clientName }},

{{ trans('texts.payment_message', ['amount' => $paymentAmount]) }}

@if ($emailFooter)
{{ $emailFooter }}
@else
{{ trans('texts.email_signature') }}
{{ $accountName }}
@endif

@if ($showNinjaFooter)
{{ trans('texts.ninja_email_footer', ['site' => 'Facturación Virtual']) }}
http://www.facturavirtual.com.bo
@endif