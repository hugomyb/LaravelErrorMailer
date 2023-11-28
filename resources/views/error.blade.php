<x-mail::message>
## Error :
# {{ $exception ? $exception->getMessage() : "" }}

## File :
# {{ $exception ? $exception->getFile() : "" }}

## Line :
# {{ $exception ? $exception->getLine() : "" }}

## Trace :
# {{ $exception || $stackTrace ? $stackTrace : "" }}
</x-mail::message>
