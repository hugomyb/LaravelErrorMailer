<x-mail::message>
## Environment :
# {{ env('APP_URL') ?? "" }}

## Error :
# {{ $exception ? $exception->getMessage() : "" }}

## File :
# {{ $exception ? $exception->getFile() : "" }}

## Line :
# {{ $exception ? $exception->getLine() : "" }}

## URL :
# {{ request()->url() ?? "" }}

## Trace :
{{ $exception || $stackTrace ? $stackTrace : "" }}
</x-mail::message>
